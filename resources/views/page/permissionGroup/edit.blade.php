@include('head.head')

<div style="padding:40px 0px 40px 0px; ">
    @if($permissionGroup)
        <form class="m-form m-form--fit m-form--label-align-right" action="{{route('permission.permissionGroup.postEdit')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$permissionGroup->id}}" />
            <div class="text-center" style="position:fixed; top:0px; padding:10px; width:100%; background-color:white; z-index: 100;font-family: initial;border-bottom: 1px solid #eee;">


                <h3 class="m-portlet__head-text" style="vertical-align: middle;font-size: 1.3rem;font-weight: 500;font-family: Roboto;color: #6E6F77;text-align: center;text-align: center;">Phân quyền cho nhóm : <b>{{$permissionGroup->name}}</b></h3>
            </div>

            <div class="p-1">
                <div class="m-form__group form-group">
                    <div class="m-checkbox-list">
                        @php
                            $listPermission = $permissionGroup->getPermissionCode();
                        @endphp
                        @foreach($allPermission as $p)
                            <label class="m-checkbox">
                                <input name="permissions[{{$p->code}}]" value="{{$p->id}}" type="checkbox" @if(in_array($p->code,$listPermission) > 0) checked="true" @endif>
                                {{$p->name}}<span></span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-right" style="position:fixed; bottom:0px; padding:10px; width:100%; background-color:white; z-index: 100;">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    @else
        <div>Không tìm thấy nhóm quyền</div>
    @endif
</div>

@include('javascript.javascript')
