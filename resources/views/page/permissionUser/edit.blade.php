@extends('layouts.homemaster')

@section('content')
@php
$listGroupPermissions = [];
foreach($user->permissionGroups as $group){
    foreach($group->getPermissionCode() as $code){
        if (!in_array($code, $listGroupPermissions)){ //not in lock
            $listGroupPermissions[] = $code;
        }
    }
}
@endphp

<div class="m-content">
    <div class="row">
        <div class="col-md-12">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <a href="{{route('permission.user.getList')}}">Danh sách nhóm quyền</a> / Sửa quyền nhân viên
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <form class="m-form m-form--fit m-form--label-align-right" action="{{route('permission.user.postEdit')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}" />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input class="form-control m-input" value="{{$user->username}}" readonly="true"/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control m-input" value="{{$user->email}}" readonly="true"/>
                                </div>
                                <div class="form-group">
                                    <label>Nhóm quyền</label>
                                    <select class="form-control m-input" name="parent">
                                        <option value=""></option>
                                        @foreach($groups as $g)
                                            <option value="{{$g->id}}" @if($user->permissionGroups->count() > 0 && $user->permissionGroups[0]->id == $g->id) selected @endif>{{$g->levelMark('--', $g->level)}} {{$g->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <div class="col-md-4">
                                <div class="m-portlet m-portlet--mobile">
                                  <div class="m-portlet__head">
                                   <div class="m-portlet__head-caption">
                                     <div class="m-portlet__head-title">
                                       <h4 class="m-portlet__head-text m--font-info">Quyền riêng</h4>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                    <div class="m-checkbox-list">
                                        @foreach($permissions as $p)
                                        <label class="m-checkbox">
                                            <input name="permissions[{{$p->code}}]" value="{{$p->id}}" type="checkbox" @if(in_array($p->id,$userPermissionIds) > 0) checked="true" @endif>
                                            {{$p->name}} @if(array_search($p->code,$listGroupPermissions) === false ? false : true) <small class="text-info"> [có trong nhóm]</small> @endif
                                            <span></span>
                                        </label>
                                        @endforeach
                                    </div>
                              </div>
                            <div class="col-md-4">
                                  <div class="m-portlet m-portlet--mobile">
                                    <div class="m-portlet__head">
                                     <div class="m-portlet__head-caption">
                                       <div class="m-portlet__head-title">
                                    <h4 class="m-portlet__head-text m--font-danger" style="color:red!important">Khóa quyền</h4>
                                    </div>
                                  </div>
                                </div>
                               </div>
                                  <div class="m-checkbox-list">

                                      @foreach($permissions as $p)
                                      <label class="m-checkbox">
                                          <input
                                            name="lockPermissions[{{$p->code}}]"
                                            value="{{$p->id}}"
                                            type="checkbox"
                                            @if(in_array($p->id,$userLockPermissionIds) > 0) checked="true" @endif>
                                          {{$p->name}} @if(array_search($p->code,$listGroupPermissions) === false ? false : true) <small class="text-info"> [có trong nhóm]</small> @endif
                                          <span></span>
                                      </label>
                                      @endforeach
                                  </div>
                            </div>



                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-info">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
