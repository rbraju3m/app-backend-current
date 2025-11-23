@extends('layouts.app')

@section('body')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h6>{{__('messages.themePageAssignComponent')}}</h6>
                    </div>

                    <div class="card-body">
                        @include('layouts.message')
                        <br>

                        @if(count($themePages) > 0)
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($themePages as $page)
                                    <a class="btn accordion-btn"
                                       data-bs-toggle="collapse"
                                       href="#{{$page['slug']}}"
                                       role="button"
                                       style="background-color: #F7921D">
                                        {{$page['name']}}
                                    </a>
                                @endforeach
                            </div>

                            <div id="accordionPages">
                                @foreach($themePages as $page)
                                    <div class="collapse" id="{{$page['slug']}}" data-bs-parent="#accordionPages">
                                        <div class="card card-body" style="margin-bottom: 0px">
                                            <h2 style="border-bottom: 1px solid #F7921D;padding: 5px">
                                                {{$page['name']}}
                                            </h2>

                                            <!-- Components -->
                                            @if(count($page['components']) > 0)
                                                <div class="container text-center">
                                                    <div class="row">
                                                        @foreach($page['components'] as $component)
                                                            <div class="col" style="padding: 10px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
                                                                <h5><span class="badge bg-secondary display_name_{{$component['id']}}">{{$component['display_name']}}</span></h5>

                                                                <h5>
                                                                    {{--<div class="form-check form-check-inline">
                                                                        <input type="text" name="display_name" value="{{$component['display_name']}}" class="form-control" id="display_name" placeholder="Display name" data-id="{{$component['id']}}">
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input type="text" name="clone_component" value="{{$component['clone_component']}}" class="form-control" id="clone_component" placeholder="Clone component" data-id="{{$component['id']}}">
                                                                    </div>
                                                                    <br>--}}

                                                                    <a data-href="{{route('theme_assign_component_update')}}" id="theme_component_update"></a>
                                                                    <div class="form-check form-check-inline">
                                                                        <input style="margin-top: 0px" class="form-check-input selected_id checked_id_{{$component['id']}}" name="selected_id" type="checkbox" id="{{$component['display_name'].$component['id']}}" value="{{$component['id']}}"
                                                                        @if($component['selected'] == 1)
                                                                            {{'checked'}}
                                                                            @endif
                                                                        >
                                                                        <label class="form-check-label" for="{{$component['display_name'].$component['id']}}">Selected</label>
                                                                    </div>

                                                                    <br>
                                                                    <div class="form-check form-check-inline">
                                                                        <input type="text" name="sort_ordering" value="{{$component['sort_ordering']}}" class="form-control" id="sort_ordering" placeholder="Sort Order" data-id="{{$component['id']}}">
                                                                    </div>
                                                                </h5>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Persistent footer & page sort -->
                                            <div class="form-group row mg-top">
                                                <div class="col-sm-2">
                                                    <label class="form-label">{{__('messages.persistent_footer_buttons')}}</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <a data-href="{{route('theme_page_inline_update')}}" id="persistent_footer_buttons_route"></a>
                                                    <input type="number" value="{{$page['persistent_footer_buttons']}}" class="form-control persistent_footer_buttons" data-id="{{$page['theme_page_id']}}" name="persistent_footer_buttons">
                                                </div>
                                            </div>

                                            <div class="form-group row mg-top">
                                                <div class="col-sm-2">
                                                    <label class="form-label">{{__('messages.pageSortOrder')}}</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" value="{{$page['sort_order']}}" class="form-control page_sort_order" data-id="{{$page['theme_page_id']}}" name="sort_order">
                                                </div>
                                            </div>

                                            <!-- SCREEN STATUS -->
                                            <div class="form-group row mg-top">
                                                <div class="col-sm-2"><label>Screen Status</label></div>
                                                <div class="col-sm-4">
                                                    <select class="form-control screen_status" data-id="{{$page['theme_page_id']}}">
                                                        <option value="dynamic" {{ $page['screen_status']=='dynamic'?'selected':'' }}>Dynamic</option>
                                                        <option value="static" {{ $page['screen_status']=='static'?'selected':'' }}>Static</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- STATIC SCREEN MESSAGE -->
                                            <div class="form-group row mg-top static_message_section">
                                                <div class="col-sm-2"><label>Static Screen Message</label></div>
                                                <div class="col-sm-4">
                                                    <textarea class="form-control static_screen_message" data-id="{{$page['theme_page_id']}}" rows="3">{{$page['static_screen_message']}}</textarea>
                                                </div>
                                            </div>

                                            <!-- IMAGE UPLOAD FOR STATIC -->
                                            <div class="form-group row mg-top upload_section {{ $page['screen_status']=='static'?'':'d-none' }}">
                                                <div class="col-sm-2"><label>Static Image Upload</label></div>
                                                <div class="col-sm-4">
                                                    <input type="file" class="form-control static_image_upload" data-id="{{$page['theme_page_id']}}" name="static_screen_image" id="static_image_{{$page['theme_page_id']}}" {{ $page['screen_status']=='static'?'required':'' }}>
                                                </div>
                                                <div class="col-sm-4">
                                                    <img id="preview_{{$page['theme_page_id']}}" src="{{ config('app.image_public_path').$page['static_screen_image'] ?? '' }}" style="max-width:150px;{{ isset($page['static_screen_image']) ? '' : 'display:none;' }}border:1px solid #ddd;padding:4px;">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="row mg-top">
                            <div class="col-md-10">
                                <a href="{{route('theme_list')}}" class="btn btn-primary">Submit</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('CustomStyle')
    <style>
        .accordion-btn.active {background-color: #d97a12 !important;color: white !important;}
        .d-none {display: none;}
    </style>
@endpush

@section('footer.scripts')
    <script>
        $(document).ready(function(){

            // Accordion buttons
            $('.collapse').on('show.bs.collapse', function () {
                let id = $(this).attr('id');
                $('.accordion-btn').removeClass('active');
                $('a[href="#'+id+'"]').addClass('active');
            });
            $('.collapse').on('hide.bs.collapse', function () {
                let id = $(this).attr('id');
                $('a[href="#'+id+'"]').removeClass('active');
            });

            // Screen status
            $(document).on('change', '.screen_status', function(){
                let id = $(this).data('id');
                let value = $(this).val();
                let container = $(this).closest('.card-body');

                if(value === 'static'){
                    container.find('.upload_section').removeClass('d-none');
                    container.find('.static_image_upload').attr('required', true);
                } else {
                    container.find('.upload_section').addClass('d-none');
                    container.find('.static_image_upload').removeAttr('required');
                }

                // optional ajax
                let route = $('#persistent_footer_buttons_route').data('href');
                $.get(route, { id, value, fieldName:'screen_status' });
            });

            // Static message
            $(document).on('blur', '.static_screen_message', function(){
                let id = $(this).data('id');
                let value = $(this).val();
                let route = $('#persistent_footer_buttons_route').data('href');
                $.get(route, { id, value, fieldName:'static_screen_message' });
            });
            // Instant image preview
            $(document).on('change', '.static_image_upload', function(e){
                let id = $(this).data('id');
                let imgTag = $('#preview_'+id);
                let file = e.target.files[0];
                if(file){
                    let reader = new FileReader();
                    reader.onload = function(e){
                        imgTag.attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(file);

                    // Upload to backend
                    let route = "{{ route('theme_page_inline_image_upload') }}"; // create this route
                    let formData = new FormData();
                    formData.append('theme_page_id', id);
                    formData.append('static_screen_image', file);

                    $.ajax({
                        url: route,
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response){
                            if(response.status == 'ok'){
                                console.log('Image uploaded successfully');
                            } else {
                                alert('Upload failed!');
                            }
                        },
                        error: function(){
                            alert('Something went wrong!');
                        }
                    });
                }
            });

        });
    </script>

    <script type="text/javascript">
        $(document).delegate('.selected_id','click',function(){
            let isChecked = 0
            if($(this).is(':checked')){isChecked = 1}
            let id = $(this).attr('value')
            let route = $('#theme_component_update').attr('data-href');
            $.ajax({
                url: route,
                method: "get",
                dataType: "json",
                data: {id: id,isChecked:isChecked,fieldName:'selected_id'},
                beforeSend: function( xhr ) {

                }
            }).done(function( response ) {
                if(response.status=='ok') {
                    isChecked == 1 ? $('.checked_id_' + id).prop('checked', true) : $('.checked_id_' + id).prop('checked', false)
                }
            }).fail(function( jqXHR, textStatus ) {

            });
            return false;
        });

        $(document).delegate('#display_name','blur',function(){
            let id = $(this).attr('data-id')
            let value = $(this).val();
            let route = $('#theme_component_update').attr('data-href');
            $.ajax({
                url: route,
                method: "get",
                dataType: "json",
                data: {id: id,value:value,fieldName:'display_name'},
                beforeSend: function( xhr ) {

                }
            }).done(function( response ) {
                if(response.status == 'ok') {
                    $('.display_name_'+id).text(value)
                }
            }).fail(function( jqXHR, textStatus ) {

            });
            return false;
        });

        $(document).delegate('#clone_component','blur',function(){
            let id = $(this).attr('data-id')
            let value = $(this).val();
            let route = $('#theme_component_update').attr('data-href');
            $.ajax({
                url: route,
                method: "get",
                dataType: "json",
                data: {id: id,value:value,fieldName:'clone_component'},
                beforeSend: function( xhr ) {

                }
            }).done(function( response ) {
                if(response.status == 'ok') {
                    // $('.display_name_'+id).text(value)
                }
            }).fail(function( jqXHR, textStatus ) {

            });
            return false;
        });

        $(document).delegate('#sort_ordering','keyup',function(){
            let id = $(this).attr('data-id')
            let value = $(this).val();
            let route = $('#theme_component_update').attr('data-href');
            if (value != ''){
                $.ajax({
                    url: route,
                    method: "get",
                    dataType: "json",
                    data: {id: id,value:value,fieldName:'sort_ordering'},
                    beforeSend: function( xhr ) {

                    }
                }).done(function( response ) {
                    if(response.status == 'ok') {
                        // $('.display_name_'+id).text(value)
                    }
                }).fail(function( jqXHR, textStatus ) {

                });
                return false;
            }
        });

        $(document).on('blur', '.persistent_footer_buttons, .page_sort_order', function() {
            let id = $(this).attr('data-id')
            let fieldName = $(this).attr('name')
            let value = $(this).val();
            let route = $('#persistent_footer_buttons_route').attr('data-href');
            $.ajax({
                url: route,
                method: "get",
                dataType: "json",
                data: {id: id,value:value,fieldName:fieldName},
                beforeSend: function( xhr ) {

                }
            }).done(function( response ) {
                if(response.status == 'ok') {
                    $('#persistent_footer_buttons_'+id).text(value)
                }
            }).fail(function( jqXHR, textStatus ) {

            });
            return false;
        });

    </script>
@endsection
