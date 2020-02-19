
@extends('layouts.homemaster')

@section('content')

<div class="m-content">
    <div class="row">
        <div class="col-xl-12">
            @include('page.permissionGroup.formGroupCreate',['items'=>$items])
        </div>
        <div class="col-xl-4">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Danh sách nhóm quyền
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-section">
                        <div class="m-section__content">
                            <table id="ctpgl">
                                @foreach($items as $item)
                                    <tr>
                                        <td>
                                            {{$item->levelMark(' --', $item->level)}}
                                            <b>{{$item->name}}</b> <br/><small>{{$item->description}}</small>
                                        </td>
                                        <td class="text-right">
                                            <button type="button" class="btn btn-sm btn-info groupItem" data-id="{{$item->id}}">Xem quyền</button>
                                            <a class="btn btn-sm btn-danger" href="{{route('permission.permissionGroup.getDelete',['id'=>$item->id])}}" onclick="return confirmDelete()">
                                                <i class="flaticon-delete-2"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div id="pgEdit"></div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <style>
        #ctpgl{width:100%;}
        #ctpgl td{padding:3px;}
        #ctpgl tr:hover{background-color: #f9f9f9;}
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function(){
            $(".groupItem").click(function(){
                $("#pgEdit").html('đang tải...');
                var group = $(this).attr('data-id');
                var iframe = '<iframe src="{{route('permission.permissionGroup.getEdit')}}?id='+group+'" width="100%" height="500" style="border: unset;"></iframe>';
                $("#pgEdit").html(iframe);
            });
        });

        function confirmDelete(){
            return confirm("Are you sure you want to delete?");
        }
    </script>
@endpush
