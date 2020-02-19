
@extends('layouts.homemaster')

@section('content')


<div class="m-content">
    <div class="row">
        <div class="col-md-12">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Quyền nhân viên
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <form action="{{route('permission.user.getList')}}" method="GET">
                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label for="name">Tên người dùng</label>
                                    <input type="text" class="form-control m-input" name="name" @if(isset($searchParams['name'])) value="{{$searchParams['name']}}" @endif placeholder="">
                                </div>
                                <div class="col-lg-4">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control m-input" name="email" @if(isset($searchParams['email'])) value="{{$searchParams['email']}}" @endif placeholder="">
                                </div>
                                <div class="col-lg-4">
                                    <label for="exampleSelect1">Nhóm quyền</label>
                                    <select class="form-control m-input" name="parent">
                                        <option value=""></option>
                                        @foreach($groups as $g)
                                            <option value="{{$g->id}}" @if(isset($searchParams['parent']) && $searchParams['parent'] == $g->id) selected @endif>{{$g->levelMark('--', $g->level)}} {{$g->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>


                    <div class="m-datatable m-datatable--default m-datatable--brand">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Nhóm quyền</th>
                                    <th>Quyền</th>
                                    <th>Chặn quyền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt = ($users->currentPage() - 1) * $users->perPage(); @endphp
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{++$stt}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>@if($user->permissionGroups->count() > 0) {{$user->permissionGroups[0]->name}} @endif</td>
                                        <td>{{$user->permissions->count()}}</td>
                                        <td>{{$user->permissionLocks->count()}}</td>
                                        <td>
                                            <a href="{{route('permission.user.getEdit',['id'=>$user->id])}}" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            @php

                            @endphp
                            {{ $users->appends($searchParams)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
