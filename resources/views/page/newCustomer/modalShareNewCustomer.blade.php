
<div class="modal fade" id="modalShareNewCustomer" tabindex="-1" role="dialog" aria-labelledby="modalShareNewCustomer" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalShareNewCustomer">
                    Chia khách hàng
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                    ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <div>
                                <b>
                                    Đã chọn <span id="countCustomer">0</span> khách hàng để chia sẻ
                                </b>
                            </div>
                            <hr/>
                            <label for="exampleSelect1">
                                Chọn nhân viên
                            </label>
                            <select class="form-control m-input m-input--square" id="selectUserShare">
                                <option value=""></option>
                                @foreach($allUser as $user)
                                    <option value="{{$user->id}}">{{$user->username}} - {{$user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions text-center">
                            <button type="button" class="btn btn-primary" id="btn-chiaKhach">
                                Chia khách
                            </button>
                            <span id="saving" style="display:none;">Đang lưu...</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
