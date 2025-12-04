@extends('layouts.app')

@section('body')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="margin-bottom: 50px !important;">

                    <div class="card-header">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                            <h6>{{__('messages.componentList')}}</h6>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">
                                    <a href="{{route('component_add')}}" title="" class="module_button_header">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-plus-circle"></i> {{__('messages.createNew')}}
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @include('layouts.message')

                        <!-- Search Form -->
                        <form method="GET" action="{{ route('component_list') }}" id="search-form" class="mb-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="search" class="form-control" placeholder="{{__('messages.searchPlaceholder')}}" value="{{ request('search') }}">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{__('messages.search')}}
                                    </button>
                                    <a href="{{ route('component_list') }}" class="btn btn-secondary">
                                        {{__('messages.clear')}}
                                    </a>
                                </div>
                            </div>
                        </form>

                        <table id="leave_settings" class="table table-bordered datatable table-responsive mainTable text-center">
                            <thead class="thead-dark">
                            <tr>
                                <th>{{__('messages.SL')}}</th>
                                <th>Plugin Name</th>
                                <th>Component Name</th>
{{--                                <th>{{__('messages.slug')}}</th>--}}
{{--                                <th>{{__('messages.label')}}</th>--}}
                                <th>{{__('messages.scope')}}</th>
                                <th scope="col text-center" class="sorting_disabled" rowspan="1" colspan="1">
                                    <i class="fas fa-cog"></i>
                                </th>
                            </tr>
                            </thead>
                            @php
                                $currentPage = $components->currentPage();
                                $perPage = $components->perPage();
                                $serial = ($currentPage - 1) * $perPage + 1;
                            @endphp

                            @if(isset($components) && count($components)>0)
                                <tbody>
                                @foreach($components as $component)
                                    <tr>
                                        <td>{{$serial++}}</td>
                                        <td>{{$component->plugin_name}}</td>
                                        <td>{{$component->name}}</td>
{{--                                        <td>{{$component->slug}}</td>--}}
{{--                                        <td>{{$component->label}}</td>--}}
                                        <td>{{$component->scope ? implode(', ', json_decode($component->scope)) : null}}</td>
                                        <td>
                                            <div class="btn-group">
{{--                                                <a href="{{ route('component.migrate.export', $component->id) }}" class="btn btn-sm btn-outline-primary">--}}
                                                <a href="{{ route('component_migration_export', $component->id) }}" class="btn btn-sm btn-outline-primary">
                                                    Export JSON
                                                </a>

                                                {{--<button class="btn btn-sm btn-primary js-send-to-prod"
                                                        data-id="{{ $component->id }}"
                                                        data-name="{{ $component->name }}">
                                                    Send to Prod
                                                </button>--}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>
                        @if(isset($components) && count($components) > 0)
                            <div class="justify-content-right">
                                {{ $components->appends(request()->query())->links('layouts.pagination') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for send to production -->
    <div class="modal fade" id="sendToProdModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send to Production</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to send <strong id="componentName"></strong> to production?</p>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="overwriteCheck">
                        <label class="form-check-label" for="overwriteCheck">
                            Overwrite if already exists
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmSend">Send</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('sendToProdModal'));
            const sendButtons = document.querySelectorAll('.js-send-to-prod');
            const confirmButton = document.getElementById('confirmSend');
            const componentNameEl = document.getElementById('componentName');
            const overwriteCheck = document.getElementById('overwriteCheck');
            let currentId = null;

            sendButtons.forEach(button => {
                button.addEventListener('click', function() {
                    currentId = this.dataset.id;
                    componentNameEl.textContent = this.dataset.name;
                    overwriteCheck.checked = false;
                    modal.show();
                });
            });

            confirmButton.addEventListener('click', function() {
                if (!currentId) return;

                fetch(`/component/${currentId}/migrate/send-to-prod`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        overwrite: overwriteCheck.checked
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Component sent to production successfully!');
                        } else {
                            alert('Error: ' + data.message);
                        }
                        modal.hide();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Request failed');
                        modal.hide();
                    });
            });
        });
    </script>
@endsection
