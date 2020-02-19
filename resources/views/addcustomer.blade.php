
@extends('layouts.homemaster')

@section('content')

<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-content">
				<form class="m-form m-form--fit m-form--label-align-right" action="{{route('postcustomer')}}" method="POST">
						@csrf
						<div class="row">
              <div class="col-xl-6 col-lg-12">
  								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
  									<div class="tab-content">
  										<div class="tab-pane active" id="m_user_profile_tab_1">
  												<div class="m-portlet__body">
  													<div class="form-group m-form__group m--margin-top-10 m--hide">
  														<div class="alert m-alert m-alert--default" role="alert">
                                @if ($errors->any())
                                      <div class="alert alert-danger">
                                          <ul>
                                              @foreach ($errors->all() as $error)
                                                  <li style="text-align: center;">{{ $error }}</li>
                                              @endforeach
                                          </ul>
                                      </div>
                                  @endif
  														</div>
  													</div>
  													<div class="form-group m-form__group row">
  														<div class="col-10 ml-auto">
  															<h3 class="m-form__section">
  																1. Thông tin khách hàng
  															</h3>
  														</div>
  													</div>

                          	<div class="form-group m-form__group row">
  														<label for="example-text-input" class="col-4 col-form-label">
  															Tên Khách Hàng <span style="color:red;font-size: 14px;">*</span>
  														</label>
  														<div class="col-7">
                                <input type="text" name="namekhachhang" class="form-control m-input" placeholder=" VD: Võ Thị Cúc " required>
  														</div>
  													</div>

                          	<div class="form-group m-form__group row">
  														<label for="example-text-input" class="col-4 col-form-label">
  															Số Điện Thoại Khách Hàng <span style="color:red;font-size: 14px;">*</span>
  														</label>
  														<div class="col-7">
  															<input type="text" name="phonekhachhang" class="form-control m-input" placeholder="VD: 0908240211" required>
  														</div>
  													</div>

                          	<div class="form-group m-form__group row">
  														<label for="example-text-input" class="col-4 col-form-label">
  															Email Khách Hàng
  														</label>
  														<div class="col-7">
  															<input type="email" name="emailkhachhang" class="form-control m-input" placeholder=" VD: vothicuc@gmail.com ">
  														</div>
  													</div>

                          	<div class="form-group m-form__group row">
  														<label for="example-text-input" class="col-4 col-form-label">
  															Mô tả
  														</label>
  														<div class="col-7">
  															<textarea name="mota" class="form-control m-input m-input--air" id="exampleTextarea" style="height: 120px;"></textarea>
  														</div>
  													</div>

                            <div class="form-group m-form__group row">
  														<label for="example-text-input" class="col-4 col-form-label">
  															Địa chỉ nhà Khách Hàng
  														</label>
  														<div class="col-7">
  															<input type="text" name="addresskhachhang" class="form-control m-input" placeholder="Nhập địa chỉ nhà Khách Hàng">
  														</div>
  													</div>

                            <div class="form-group m-form__group row">
  														 <label for="example-text-input" class="col-4 col-form-label">Sinh Nhật Khách Hàng</label>
  														     <div class="col-7">
                                    <div class="input-group date">
                                     <input type="text" name"namsinh" class="form-control m-input" placeholder="Select date" id="m_datepicker_2">
                                      <div class="input-group-append">
                                       <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                       </span>
                                     </div>
                                   </div>
  														   </div>
  											    </div>

                            <div class="form-group m-form__group row">
                              <label for="example-text-input" class="col-4 col-form-label">
                                Giới tính Khách Hàng
                              </label>
                              <div class="col-7">
                                <select class="form-control m-input" name="gioitinhkhachhang" >
                                      <option value="">Giới tính Khách Hàng</option>
                                      <option value="Nam">Nam </option>
                                      <option value="Nữ">Nữ </option>
                                      <option value="Khác">Khác</option>
                                </select>
                              </div>
                            </div>

                           <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                            <div class="form-group m-form__group row">
                              <label for="example-text-input" class="col-4 col-form-label">
                                 Người phụ trách
                              </label>
                              <div class="col-7">
                                <select class="form-control m-input" name="nguoiphutrach" required>
                                      <option value="{{ Auth::user()->id }}">{{ Auth::user()->username }}</option>
                                      @foreach($user as $users)
                                            @if($users->id != Auth::user()->id)
                                              <option value="{{ $users->id }}">{{ $users->username }}</option>
                                            @endif
                                      @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group m-form__group row">
                              <label for="example-text-input" class="col-4 col-form-label">
                                 Nhóm khách hàng
                              </label>
                              <div class="col-7">
                                <select class="form-control m-input" name="nhomkhachhang" required>
                                      <option value="">Nhóm Khách Hàng</option>
                                      @foreach($customergroup as $customergroups)
                                      <option value="{{ $customergroups->id }}">{{ $customergroups->name }}</option>
                                      @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group m-form__group row">
                              <label for="example-text-input" class="col-4 col-form-label">
                                 Nguồn khách hàng
                              </label>
                              <div class="col-7">
                                <select class="form-control m-input" name="nguonkhachhang" required>
                                      <option value="">Nguồn Khách Hàng</option>
                                      @foreach($customerresource as $customerresources)
                                      <option value="{{ $customerresources->id}}">{{ $customerresources->name }} </option>
                                      @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group m-form__group row">
                              <label for="example-text-input" class="col-4 col-form-label">
                                 Mối quan hệ
                              </label>
                              <div class="col-7">
                                <select class="form-control m-input" name="moiquanhe" >
                                      <option value="1">Khách Mới</option>
                                      @foreach($relationships as $relationship)
                                          <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                                      @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

  													<div class="form-group m-form__group row">
  														<label for="example-text-input" class="col-4 col-form-label">
  															Chọn Quốc Gia
  														</label>
  														<div class="col-7">
                                <select class="form-control m-input" name="quocgia" >
                                      <option value="">  Chọn Quốc Gia</option>
                                      @foreach($country as $countrys)
                                      <option value="{{ $countrys->id }}">{{ $countrys->name }}</option>
                                      @endforeach
                                </select>
  														</div>
  													</div>

                          	<div class="form-group m-form__group row">
  														<label for="example-text-input" class="col-4 col-form-label">
  															Chọn Tỉnh , Thành
  														</label>
  														<div class="col-7">
                                <select class="form-control m-input" name="thanhpho" >
                                      <option value="">Chọn Tỉnh , Thành</option>

																			@foreach($province as $provinces)
																			<option value="{{ $provinces->id }}">{{ $provinces->name }}</option>
																			@endforeach
                                </select>
  														</div>
  													</div>

                          	<div class="form-group m-form__group row">
  														<label for="example-text-input" class="col-4 col-form-label">
  															Chọn Quận , Huyện
  														</label>
  														<div class="col-7">
                                <select class="form-control m-input" name="quanhuyen" >
                                      <option value="">Chọn Quận , Huyện</option>
																			@foreach($district as $districts)
																			<option value="{{ $districts->id }}">{{ $districts->name }}</option>
																			@endforeach
                                </select>
  														</div>
  													</div>

  									<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                          	<div class="form-group m-form__group row">
  														<div class="col-10 ml-auto">
  															<h3 class="m-form__section">
  																3. Social Links
  															</h3>
  														</div>
  													</div>

  													<div class="form-group m-form__group row">
  														<label for="example-text-input" class="col-4 col-form-label">
  															Facebook
  														</label>
  														<div class="col-7">
                                <input name="linkfb" type="text" class="form-control m-input" placeholder="www.facebook.com/Mark.Andre">
  														</div>
  													</div>


  												</div>
  										</div>
  									</div>
  								</div>
							</div>

							<div class="col-xl-6 col-lg-12">
								<div class="m-portlet m-portlet--tabs  ">
									<div class="tab-content">
										<div class="tab-pane active" id="m_user_profile_tab_1">
												<div class="m-portlet__body">
													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">
																2. Người giới thiệu
															</h3>
														</div>
													</div>
                          <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-4 col-form-label">
                              Mã KH Người Giới Thiệu
                            </label>
                            <div class="col-7">
                              <input type="text" name="makh" class="form-control m-input" placeholder="VD: KH-0COwdIURrG">
                            </div>
                          </div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-4 col-form-label">
															Tên Người Giới Thiệu
														</label>
														<div class="col-7">
															<input type="text" name="nguoigioithieu" class="form-control m-input" placeholder="Nhập Tên Người Giới Thiệu">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-4 col-form-label">
														Điện thoại Người Giới Thiệu
														</label>
														<div class="col-7">
															<input type="text" name="phonenguoigioithieu" class="form-control m-input" placeholder="VD:0908240211">
														</div>
													</div>
                          <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-4 col-form-label">
														Email Người Giới Thiệu
														</label>
														<div class="col-7">
															<input name="emailnguoigioithieu" type="text" class="form-control m-input" placeholder="Nhập Email Người Giới Thiệu">
														</div>
													</div>
                          <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-4 col-form-label">
														Giới Tính Người Giới Thiệu
														</label>
														<div class="col-7">
                              <select class="form-control m-input" name="gioitinhnguoigioithieu" >
                                    <option value="">--------------- </option>
                                    <option value="Nam">Nam </option>
                                    <option value="Nữ">Nữ </option>
                                    <option value="Khác">Khác</option>
                              </select>
														</div>
													</div>

													<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">
																3. Liên Hệ
															</h3>
														</div>
													</div>

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-4 col-form-label">
															Tên Người Liên Hệ
														</label>
														<div class="col-7">
															<input type="text" name="hotennguoilienhe" class="form-control m-input" placeholder="Nhập Tên Người Liên Hệ">
														</div>
													</div>


													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-4 col-form-label">
															Email Người Liên Hệ
														</label>
														<div class="col-7">
															<input type="text" name="emailnguoilienhe" class="form-control m-input" placeholder="Nhập Email Người Liên Hệ">
														</div>
													</div>


													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-4 col-form-label">
															Điện thoại Người Liên Hệ
														</label>
														<div class="col-7">
															<input type="text" name="phonenguoilienhe" class="form-control m-input" placeholder="Điện thoại Người Liên Hệ">
														</div>
													</div>


													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-4 col-form-label">
															Ghi Chú
														</label>
														<div class="col-7">
															<textarea name="ghichu" style="height: 90px;" class="form-control m-input m-input--air"></textarea>
														</div>
													</div>
                          <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-4 col-form-label">
                              Giới tính Người Liên Hệ
														</label>
														<div class="col-7">
                              <select class="form-control m-input" name="gioitinhnguoilienhe" >
                                    <option value="">Giới tính Liên Hệ</option>
                                    <option value="Nam">Nam </option>
                                    <option value="Nữ">Nữ </option>
                                    <option value="Khác">Khác</option>
                              </select>
														</div>
													</div>

												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
            <div class="col-xl-12 col-lg-12">
              <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                <div class="tab-content">
                  <div class="tab-pane active">
                      <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                          <div class="row">
                            <div class="col-4"></div>
                            <div class="col-7">
                              <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                Save changes
                              </button>
                              &nbsp;&nbsp;
                              <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                Cancel
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
						</div>
			</form>
		</div>
</div>

@endsection
