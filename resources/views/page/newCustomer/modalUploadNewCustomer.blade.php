
<div class="modal fade" id="uploadkhach" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Upload Khách Hàng Mới
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                  ×
                  </span>
                </button>
            </div>
            <div class="modal-body">
              <form class="m-form m-form--fit m-form--label-align-right" action="{{route('listcustomernew.postUploadCustomer')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="m-portlet__body">
                  <div class="form-group m-form__group m--margin-top-10">
                    <div class="alert m-alert m-alert--default" role="alert">

                      Chú ý:<br>

                      - Giới hạn mỗi lần upload tối đa 1000 Khách hàng<br>

                      - Chỉ cập nhật người giới thiệu thông qua mã tiếp thị liên kết đối với:<br>

                      + khách hàng mới<br>

                      + khách hàng đã có trên hệ thống nhưng chưa có giới thiệu<br>

                      - Trong file upload, hủy cập nhật cuối trong liên kết vòng<br>

                      + Ký hiệu A - B là: A là người giới thiệu của B<br>

                      + Nếu A - B và B - C và C - A => Hủy cập nhật C - A<br>

                    </div>
                  </div>
                  <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">File Browser</label>
                    <div></div>
                    <div class="custom-file">
                      <input type="file" name="customerNew" class="custom-file-input btn m-btn--pill m-btn--air btn-primary btn-block" required="true">
                      <label class="custom-file-label" for="customFile">
                        Choose file
                      </label>
                    </div>
                  </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions text-right">
                    <button type="submit" class="btn btn-primary">
                      Upload
                    </button>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
