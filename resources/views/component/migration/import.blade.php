@extends('layouts.app')

@section('body')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Import Component</h1>
            <a href="{{ route('component_migrate_logs') }}" class="btn btn-outline-secondary">
                <i class="fas fa-history me-2"></i>View Import Logs
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(auth()->user()->user_type === 'DEVELOPER' && config('app.is_component_import'))
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Upload Component JSON</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('component_migrate_import_file') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Component JSON File</label>
                            <input type="file" class="form-control" id="file" name="file" required accept=".json">
                            <div class="form-text">Select the JSON file exported from the development server. Max 10MB</div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="overwrite" name="overwrite" value="1">
                            <label class="form-check-label" for="overwrite">Overwrite if component already exists</label>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-2"></i>Import Component</button>
                    </form>
                </div>
            </div>
        @endif

        {{-- Recent Imports --}}
        <div class="card">
            <div class="card-body p-0">
                @php
                    $recentLogs = \App\Models\ComponentImportLog::latest()->take(10)->get();
                @endphp

                @if($recentLogs->count())
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Component</th>
                                <th>Status</th>
                                <th>Source</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($recentLogs as $log)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{ \Carbon\Carbon::parse($log->created_at)->format('M j, Y g:i:s A') }}</td>
                                    <td>{{ $log->component_name }}</td>
                                    <td>
                                        @if($log->success)
                                            <span class="badge bg-success">Success</span>
                                        @else
                                            <span class="badge bg-danger">Failed</span>
                                        @endif
                                    </td>
                                    <td>{{ $log->source }}</td>
                                    <td class="text-truncate" style="max-width: 200px;" title="{{ $log->message }}">
                                        {{ $log->message }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#messageModal"
                                                data-message="{{ $log->message }}"
                                                data-component="{{ $log->component_name }}"
                                                data-status="{{ $log->success ? 'Success' : 'Failed' }}">
                                            <i class="fas fa-eye"></i> View
                                        </button>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <p class="text-muted mb-0">No import history found</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Fullscreen Modal --}}
    <div class="modal fade" id="messageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Log Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <h6>Component: <span id="modalComponentName" class="fw-bold"></span></h6>
                        <h6>Status: <span id="modalStatus"></span></h6>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Import History:</label>
                        <div id="jsonViewer" class="p-3 bg-light border rounded" style="height: 80vh; overflow-y: auto;">
                            <pre id="formattedJson" class="mb-0"></pre>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="copyMessageBtn">
                        <i class="fas fa-copy me-2"></i>Copy JSON
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const messageModal = document.getElementById('messageModal');

            messageModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const message = button.getAttribute('data-message');
                const componentName = button.getAttribute('data-component');
                const status = button.getAttribute('data-status');

                document.getElementById('modalComponentName').textContent = componentName;
                document.getElementById('modalStatus').textContent = status;

                const formattedJson = document.getElementById('formattedJson');
                formattedJson.innerHTML = ''; // clear previous content

                try {
                    const jsonData = JSON.parse(message);

                    jsonData.forEach((step, index) => {
                        const stepDiv = document.createElement('div');
                        stepDiv.classList.add('mb-2', 'p-2', 'border', 'rounded');

                        // Format date & time
                        let stepTime = new Date(step.time);
                        const options = {
                            year: 'numeric', month: 'short', day: 'numeric',
                            hour: 'numeric', minute: 'numeric', second: 'numeric',
                            hour12: true
                        };
                        const formattedTime = stepTime.toLocaleString('en-US', options);

                        const statusBadge = step.success
                            ? '<span class="badge bg-success">Success</span>'
                            : '<span class="badge bg-danger">Failed</span>';

                        stepDiv.innerHTML = `
                    <div><strong>Step ${index + 1}:</strong> ${step.step} ${statusBadge}</div>
                    <div><strong>Time:</strong> ${formattedTime}</div>
                    <div><strong>Data:</strong> <pre style="white-space: pre-wrap;">${JSON.stringify(step.data, null, 2)}</pre></div>
                `;

                        formattedJson.appendChild(stepDiv);
                    });
                } catch {
                    formattedJson.textContent = message; // fallback if not JSON
                }
            });

            document.getElementById('copyMessageBtn').addEventListener('click', function() {
                const formattedContent = document.getElementById('formattedJson').textContent;
                navigator.clipboard.writeText(formattedContent);
            });
        });


    </script>
@endsection
