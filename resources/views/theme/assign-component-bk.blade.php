@extends('layouts.app')

@section('body')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                            <h6>{{__('messages.themePageAssignComponent')}}</h6>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="btn-group me-2">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @include('layouts.message')
                        <br>
                        @if(count($themePages)>0)
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($themePages as $page)
                                    <a class="btn btn-danger" data-bs-toggle="collapse" href="#{{$page['slug']}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        {{$page['name']}}
                                    </a>
                                @endforeach
                            </div>

                        @foreach($themePages as $page)
                                <div class="collapse" id="{{$page['slug']}}">
                                    <div class="card card-body" style="margin-bottom: 0px">
                                        <h2>{{$page['name']}}</h2>
                                        @if(count($page['components'])>0)
                                            <div class="container text-center">
                                                <div class="row">

                                                @foreach($page['components'] as $component)

                                                        <div class="col" style="padding: 10px;box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);">
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

                                        <div class="form-group row mg-top">
                                            <div class="col-sm-2">
                                                <label for="" class="form-label">{{__('messages.persistent_footer_buttons')}}</label>
                                            </div>

                                            <div class="col-sm-4">
                                                <a data-href="{{route('theme_page_inline_update')}}" id="persistent_footer_buttons_route"></a>
                                                <input type="number" value="{{$page['persistent_footer_buttons']}}" class="form-control persistent_footer_buttons" placeholder="{{__('messages.persistent_footer_buttons')}}" name="persistent_footer_buttons" data-id="{{$page['theme_page_id']}}" id="persistent_footer_buttons_{{$page['theme_page_id']}}">
                                            </div>
                                        </div>

                                        <div class="form-group row mg-top">
                                            <div class="col-sm-2">
                                                <label for="" class="form-label">{{__('messages.pageSortOrder')}}</label>
                                            </div>

                                            <div class="col-sm-4">
                                                <input type="text" value="{{$page['sort_order']}}" class="form-control page_sort_order" placeholder="{{__('messages.pageSortOrder')}}" name="sort_order" data-id="{{$page['theme_page_id']}}" id="persistent_footer_buttons_{{$page['sort_order']}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mg-top">
                                    <div class="col-md-10" >
                                        <a href="{{route('theme_list')}}" class="btn btn-primary">
                                            Submit
                                        </a>
                                    </div>
                                </div>
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
        .customButton{
            color: #000;
            background-color: #fff;
            border-color: #6c757d;
        }
        .imageText{
            background: blue;
            color: #fff;
            padding: 5px 5px;
            display: block;
            margin-top: 2px;
        }
        .textRed{
            color: #ff0000;
        }

        .height29{
            height: 29px;
        }
        .textCenter{
            text-align: center;
        }
        .displayNone{
            display: none;
        }

    </style>
@endpush

@section('footer.scripts')
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
    </script>

@endsection
