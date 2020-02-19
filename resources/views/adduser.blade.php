
@extends('layouts.homemaster')

@section('content')

<div class="m-content">
						<div class="row">
							<div class="col-xl-12 col-lg-12">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
														<i class="flaticon-share m--hide"></i>
													 Thêm Người Dùng
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active">
											<form class="m-form m-form--fit m-form--label-align-right" action="{{route('adduser')}}" method="POST">
												@csrf
												<div class="m-portlet__body">
													@if ($errors->any())
																<div class="alert alert-danger">
																		<ul>
																				@foreach ($errors->all() as $error)
																						<li style="text-align: center;">{{ $error }}</li>
																				@endforeach
																		</ul>
																</div>
														@endif
											
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
														 Họ và tên <span style="color:red;">(*)</span>
														</label>
														<div class="col-6">
															<input class="form-control m-input" type="text" name="name" placeholder=" Họ và tên ">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Email <span style="color:red;">(*)</span>
														</label>
														<div class="col-6">
															<input class="form-control m-input" type="text" name="email" placeholder="Email">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Phone <span style="color:red;">(*)</span>
														</label>
														<div class="col-6">
															<input class="form-control m-input" type="text" name="phone" placeholder="Phone">
														</div>
													</div>

													<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-3 col-form-label">
															password <span style="color:red;">(*)</span>
														</label>
														<div class="col-6">
															<input id="password" type="password" class="form-control m-input" name="password" placeholder="password" required autocomplete="new-password" >
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-3 col-form-label">
															password confirmed <span style="color:red;">(*)</span>
														</label>
														<div class="col-6">
															<input id="password-confirm" type="password"  class="form-control m-input"  name="password_confirmation" placeholder="password confirmation" required autocomplete="new-password">
														</div>
													</div>
                          <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                          <div class="col-lg-12">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                  <label for="example-text-input">
                                    Chọn Phòng Ban <span style="color:red;">(*)</span>
                                  </label>
                                  <div class="form-group m-form__group">

                                    <select class="form-control m-input" name="department" >
																			@foreach($department as $departments)
																					<option value="{{ $departments->id }}">{{ $departments->name }}</option>
																			@endforeach
                                    </select>
                                  </div>
                                </div>
																<div class="col-lg-4">
																	<label for="example-text-input"s>
																		Vị trí <span style="color:red;">(*)</span>
																	</label>
																	<div class="form-group m-form__group">

																		<select class="form-control m-input" name="position" required>
																				@foreach($position as $positions)
																						<option value="{{ $positions->id }}">{{ $positions->name }}</option>
																				@endforeach
																		</select>
																	</div>
															 </div>

                              <div class="col-lg-4">
                                <label for="example-text-input"s>
                                  Chọn Nhóm Quyền <span style="color:red;">(*)</span>
                                </label>
                                <div class="form-group m-form__group">
                                  <select class="form-control m-input" name="parent" required>
																		@foreach($items as $v)
																				<option value="{{$v->id}}">{{$v->levelMark('--', $v->level)}} {{$v->name}}</option>
																		@endforeach
                                  </select>
                                </div>
                             </div>
                            </div>
                          </div>
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2"></div>
															<div class="col-7">
																<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																	Save changes
																</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>


@endsection
