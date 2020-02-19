
@extends('layouts.homemaster')

@section('content')
@foreach($customer as $customers)
<!-- <div class="m-grid__item m-grid__item--fluid m-wrapper" style="margin-bottom: 0;">
		<div class="m-content" style="padding-bottom: 0;padding-top: 0px;">
			<div class="row">
					<div class="col-xl-12 col-lg-12">
				<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
					<div class="m-wizard m-wizard--1 m-wizard--success m-wizard--step-first" id="m_wizard">
								<div class="m-wizard__head m-portlet__padding-x" style="padding: 1px 2.2rem;">
									<div class="m-wizard__nav">
										<div class="m-wizard__steps">
											<div class="m-wizard__step @if( $customers->customer_status == 1) m-wizard__step--current @endif" m-wizard-target="m_wizard_form_step_1">
												<div class="m-wizard__step-info">
													<a href="#" class="m-wizard__step-number">
														<span>
															<span>
																1
															</span>
														</span>
													</a>
													<div class="m-wizard__step-line">
														<span></span>
													</div>
													<div class="m-wizard__step-label">
														Giử Chổ
													</div>

												</div>

											</div>


											<div class="m-wizard__step @if( $customers->customer_status == 2) m-wizard__step--current @endif" m-wizard-target="m_wizard_form_step_2">
												<div class="m-wizard__step-info">
													<a href="#" class="m-wizard__step-number">
														<span>
															<span>
																2
															</span>
														</span>
													</a>
													<div class="m-wizard__step-line">
														<span></span>
													</div>
													<div class="m-wizard__step-label">
														Ký Cọc
													</div>
												</div>
											</div>


											<div class="m-wizard__step @if( $customers->customer_status == 3) m-wizard__step--current @endif" m-wizard-target="m_wizard_form_step_3">
												<div class="m-wizard__step-info">
													<a href="#" class="m-wizard__step-number">
														<span>
															<span>
																3
															</span>
														</span>
													</a>
													<div class="m-wizard__step-line">
														<span></span>
													</div>
													<div class="m-wizard__step-label">
														Ký HĐ Mua Bán
													</div>
												</div>
											</div>


											<div class="m-wizard__step @if( $customers->customer_status == 4) m-wizard__step--current @endif" m-wizard-target="m_wizard_form_step_4">
												<div class="m-wizard__step-info">
													<a href="#" class="m-wizard__step-number">
														<span>
															<span>
																4
															</span>
														</span>
													</a>
													<div class="m-wizard__step-line">
														<span></span>
													</div>
													<div class="m-wizard__step-label">
															Hoàn Tiền
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
					</div>
				</div>
		</div>
	</div>
</div>
</div> -->

				<div class="m-content" style="padding-bottom: 0;">
					<div class="row">
									<div class="col-xl-3 col-lg-4">
										<div class="m-portlet m-portlet--full-height  ">
											<div class="m-portlet__body">
												<div class="m-card-profile">
													<div class="m-card-profile__title m--hide">
														Your Profile
													</div>
													<div class="m-card-profile__pic">
														<div class="m-card-profile__pic-wrapper">
															<img src="../assets/app/media/img/users/user4.jpg" alt="">
														</div>
													</div>
													<div class="m-card-profile__details">
														<span class="m-card-profile__name" style="font-weight: 400;">
															{{ $customers->customer_name }}
														</span>
														<a class="m-card-profile__email m-link" style="font-weight: 400;">
															{{ $customers->email }}
														</a>
													</div>

												</div>
												<ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
											<li class="m-nav__separator m-nav__separator--fit"></li>
											<li class="m-nav__section m--hide">
												<span class="m-nav__section-text">
													Section
												</span>
											</li>
											<!-- <li class="m-nav__item">
												<a href="../header/profile&amp;demo=default.html" class="m-nav__link">
													<i class="m-nav__link-icon flaticon-profile-1"></i>
													<span class="m-nav__link-title">
														<span class="m-nav__link-wrap">
															<span class="m-nav__link-text">
																Hợp Đồng
															</span>
															<span class="m-nav__link-badge">
																<span class="m-badge m-badge--success">
																	2
																</span>
															</span>
														</span>
													</span>
												</a>
											</li> -->

										</ul>
											</div>
										</div>
									</div>

    							<div class="col-xl-9 col-lg-8">
  										<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
  									<div class="m-portlet__head">
  										<div class="m-portlet__head-tools">
  											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
  												<li class="nav-item m-tabs__item">
  													<a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_user_profile_tab_1" role="tab" aria-selected="true">
  														<i class="flaticon-share m--hide"></i>
  														Thông Tin Khách Hàng
  													</a>
  												</li>

  											</ul>
  										</div>

  									</div>
  									<div class="tab-content" style="padding-bottom: 0;">



  										<div class="tab-pane active show" id="m_user_profile_tab_1">
												<!--begin:: Widgets/Stats2-2 -->
												<div class="m-widget1">
														<div class="m-widget1__item">
																<div class="row m-row--no-padding align-items-center">
																		<div class="m-portlet__body" style="width:100%;">
																								<div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide _mCS_4" data-scrollbar-shown="true" data-scrollable="true" data-max-height="300" style="overflow: visible; height: 300px; max-height: 300px; position: relative;">
																									<div id="mCSB_4" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0">
																									<div id="mCSB_4_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
																									<!--Begin::Timeline 2 -->
																									<div class="m-timeline-2">
																										<div class="m-timeline-2__items  m--padding-top-30 m--padding-bottom-30">

																											@foreach($comments as $comment)
																											<div class="m-timeline-2__item">

																												<div class="m-timeline-2__item-cricle">
																													<i class="fa fa-genderless m--font-danger"></i>
																												</div>
																												<div class="m-timeline-2__item-text  m--padding-top-5 ">
																													<a href="#" class="m-link m-link--brand m--font-bolder">
																														{{ $comment->username }} <span style="padding: 30px;color: red;">{{ $comment->created_at }}</span>
																													</a>
																													<br>
																													<span style="color: #271e8f;">{{ $comment->comment }}</span>
																												</div>
																											</div>
																											@endforeach
																										</div>
																									</div>
																									<!--End::Timeline 2 -->
																								</div></div><div id="mCSB_4_scrollbar_vertical" class="mCSB_scrollTools mCSB_4_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_4_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 193px; max-height: 360px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
																							</div>
																							<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="{{route('addcomment')}}" style="width: 100%;" method="POST">
																										@csrf
																											<div class="modal-footer col-lg-12" style="margin-top: 20px;">
																												<input type="hidden" name="customer_id" value="{{ $customers->ID }}"/>
																														<div class="form-group col-lg-12">
																															<div class="m-widget19__stats">
																																<span class="m-widget19__number m--font-brand">
																																18
																																</span>
																																<span class="m-widget19__comment">
																																Comments
																														</span>
																													</div>
																											<textarea name="comment" class="col-lg-12" style="border: 1px solid burlywood;height: 160px;"></textarea>
																										</div>
																									</div>
																								 <button type="submit" class="btn btn-primary" style="margin-left: 40px;">
																										Thêm Thông Tin Trao Đổi
																							</button>
																						</form>
																					</div>
																				</div>
																			</div>

  																	</div>

							  									</div>
							  								</div>
							  							</div>
							  						</div>
												</div>
												<div class="m-grid__item m-grid__item--fluid m-wrapper">
														<div class="m-content">
																<form class="m-form m-form--fit m-form--label-align-right" action="{{route('postupdatecustomer')}}" method="POST">
																		@csrf
																		<input type="hidden" name="customer_id" value="{{ $customers->ID }}"/>

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
												  															Tên Khách Hàng <span style="color:red;font-size: 14px;"></span>
												  														</label>
												  														<div class="col-7">
												                                <input type="text" name="namekhachhang" class="form-control m-input" placeholder="{{ $customers->customer_name }}" >
												  														</div>
												  													</div>

												                          	<div class="form-group m-form__group row">
												  														<label for="example-text-input" class="col-4 col-form-label">
												  															Số Điện Thoại Khách Hàng <span style="color:red;font-size: 14px;"></span>
												  														</label>
												  														<div class="col-7">
												  															<input type="text" class="form-control m-input" value="{{ $customers->phone }}" >
												  														</div>
												  													</div>

												                          	<div class="form-group m-form__group row">
												  														<label for="example-text-input" class="col-4 col-form-label">
												  															Email Khách Hàng
												  														</label>
												  														<div class="col-7">
												  															<input type="email" name="emailkhachhang" class="form-control m-input" placeholder=" {{ $customers->email }}">
												  														</div>
												  													</div>



												                            <div class="form-group m-form__group row">
												  														<label for="example-text-input" class="col-4 col-form-label">
												  															Địa chỉ nhà Khách Hàng
												  														</label>
												  														<div class="col-7">
												  															<input type="text" name="addresskhachhang" class="form-control m-input" placeholder="{{ $customers->address }}">
												  														</div>
												  													</div>

												                            <div class="form-group m-form__group row">
												  														 <label for="example-text-input" class="col-4 col-form-label">Sinh Nhật Khách Hàng</label>
												  														     <div class="col-7">
												                                    <div class="input-group date">
												                                     <input type="text" name"namsinh" class="form-control m-input" placeholder="{{ $customers->sinhnhat }}" id="m_datepicker_2">
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
												                                      <option value="">{{ $customers->gender }}</option>
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
												                                <select class="form-control m-input" name="nguoiphutrach"	>
																													@if(Auth::user()->havePermission('ViewallCustomer') )
																													<option value="">{{ $usersowner->username }}</option>

																															@foreach($user as $users)
												                                            @if($users->id != $usersowner->id)
												                                              <option value="{{ $users->id }}">{{ $users->username }}</option>
												                                            @endif
												                                      @endforeach
																													@else


																														<option value="">{{ $usersowner->username }}</option>
																															@foreach($userdepartment as $userdepartments)
												                                            @if($usersowner->id != $userdepartments->id)
												                                              <option value="{{ $userdepartments->id }}">{{ $userdepartments->username }}</option>
												                                            @endif
												                                      @endforeach

																													@endif



												                                </select>
												                              </div>
												                            </div>

												                            <div class="form-group m-form__group row">
												                              <label for="example-text-input" class="col-4 col-form-label">
												                                 Nhóm khách hàng
												                              </label>
												                              <div class="col-7">
												                                <select class="form-control m-input" name="nhomkhachhang">
																															<option value="">{{ $customers->duan }}</option>

																															@foreach($customergroup as $customergroups)
																															 	@if($customergroups->id != $customers->duan)
												                                      		<option value="{{ $customergroups->id }}">{{ $customergroups->name }}</option>
																																@endif
																															@endforeach
												                                </select>
												                              </div>
												                            </div>

												                            <div class="form-group m-form__group row">
												                              <label for="example-text-input" class="col-4 col-form-label">
												                                 Nguồn khách hàng
												                              </label>
												                              <div class="col-7">
												                                <input type="text" class="form-control m-input" placeholder=" {{ $customers->customer_resources }}">
												                              </div>
												                            </div>





												                            <div class="form-group m-form__group row">
												                              <label for="example-text-input" class="col-4 col-form-label">
												                                 Mối quan hệ
												                              </label>
												                              <div class="col-7">

												                                <select class="form-control m-input" name="moiquanhe" >
																																	<option value="">{{ $customers->name }}</option>
																															@foreach($relationships as $relationship)
																																		@if($relationship->id != $customers->relationship_id)
												                                      				<option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
																																		@endif
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
																																<option value="">{{ $customers->country_id }}</option>
																															@foreach($country as $countrys)
																																<option value="{{ $countrys->name }}">{{ $countrys->name }}</option>
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
																													<option value="">{{ $customers->province_id }}</option>

																														@foreach($province as $provinces)
																														 <option value="{{ $provinces->name }}">{{ $provinces->name }}</option>
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
																													<option value="">{{ $customers->district_id }}</option>

																														@foreach($district as $districts)
												                                      <option value="{{ $districts->name }}">{{ $districts->name }}</option>
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
												                                <input name="linkfb" type="text" class="form-control m-input" placeholder="{{ $customers->fb }}">
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
																											Tên Người Giới Thiệu
																										</label>
																										<div class="col-7">
																											<input type="text" name="nguoigioithieu" class="form-control m-input" placeholder="{{ $customers->nguoigioithieu }}">
																										</div>
																									</div>
																									<div class="form-group m-form__group row">
																										<label for="example-text-input" class="col-4 col-form-label">
																										Điện thoại Người Giới Thiệu
																										</label>
																										<div class="col-7">
																											<input type="text" name="phonenguoigioithieu" class="form-control m-input" placeholder="{{ $customers->phonenguoigioithieu }}">
																										</div>
																									</div>
												                          <div class="form-group m-form__group row">
																										<label for="example-text-input" class="col-4 col-form-label">
																										Email Người Giới Thiệu
																										</label>
																										<div class="col-7">
																											<input name="emailnguoigioithieu" type="text" class="form-control m-input" placeholder="{{ $customers->emailnguoigioithieu }}">
																										</div>
																									</div>
												                          <div class="form-group m-form__group row">
																										<label for="example-text-input" class="col-4 col-form-label">
																										Giới Tính Người Giới Thiệu
																										</label>
																										<div class="col-7">
												                              <select class="form-control m-input" name="gioitinhnguoigioithieu" >
												                                    <option value=""> {{ $customers->gioitinhnguoigioithieu }}</option>
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
																											<input type="text" name="hotennguoilienhe" class="form-control m-input" placeholder="{{ $customers->hotennguoilienhe }}">
																										</div>
																									</div>


																									<div class="form-group m-form__group row">
																										<label for="example-text-input" class="col-4 col-form-label">
																											Email Người Liên Hệ
																										</label>
																										<div class="col-7">
																											<input type="text" name="emailnguoilienhe" class="form-control m-input" placeholder="{{ $customers->emailnguoilienhe }}">
																										</div>
																									</div>


																									<div class="form-group m-form__group row">
																										<label for="example-text-input" class="col-4 col-form-label">
																											Điện thoại Người Liên Hệ
																										</label>
																										<div class="col-7">
																											<input type="text" name="phonenguoilienhe" class="form-control m-input" placeholder="{{ $customers->phonenguoilienhe }}">
																										</div>
																									</div>


																									<div class="form-group m-form__group row">
																										<label for="example-text-input" class="col-4 col-form-label">
																											Ghi Chú
																										</label>
																										<div class="col-7">
																											<textarea name="ghichu" style="height: 90px;" class="form-control m-input m-input--air" placeholder="{{ $customers->ghichu }}" ></textarea>
																										</div>
																									</div>
												                          <div class="form-group m-form__group row">
																										<label for="example-text-input" class="col-4 col-form-label">
												                              Giới tính Người Liên Hệ
																										</label>
																										<div class="col-7">
												                              <select class="form-control m-input" name="gioitinhnguoilienhe" >
												                                    <option value="">{{ $customers->gioitinhnguoilienhe }}</option>
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
												                                 Lưu Thay Đổi
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



	@endforeach
@endsection
