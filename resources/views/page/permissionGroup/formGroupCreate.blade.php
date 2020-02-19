
<div class="m-portlet">
    <form class="m-form" action="{{route('permission.permissionGroup.postCreate')}}" method="POST">
        @csrf
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Tạo nhóm phân quyền
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <div class="col-lg-6">
                    <label for="name">Tên nhóm</label>
                    <input type="text" class="form-control m-input" name="name" placeholder="Enter group name">
                </div>
                <div class="col-lg-6">
                    <label for="exampleSelect1">Nhóm cha</label>
                    <select class="form-control m-input" name="parent" id="exampleSelect1">
                        <option value="">Không chọn</option>
                        @foreach($items as $v)
                            <option value="{{$v->id}}">{{$v->levelMark('--', $v->level)}} {{$v->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>