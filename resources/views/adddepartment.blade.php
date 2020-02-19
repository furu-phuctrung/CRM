
@extends('layouts.homemaster')

@section('content')

<div class="m-content">
						<div class="row">

							<div class="col-xl-12 col-lg-12">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
														<i class="flaticon-share m--hide"></i>
													 Thêm Phòng Ban
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active">

											<form class="m-form m-form--fit m-form--label-align-right" action="{{route('adddepartment')}}" method="POST">
													@csrf
												<div class="m-portlet__body">
                        	<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
														 Tên Phòng Ban <span style="color:red;">(*)</span>
														</label>
														<div class="col-6">
															<input class="form-control m-input" name="name" type="text">
														</div>
													</div>
                          <div class="form-group m-form__group row">
														<label for="example-text-input" class="col-3 col-form-label">
														 Chọn Phòng Ban Trực Thuộc<span style="color:red;">(*)</span>
														</label>
                            <div class="col-lg-6 ">
                              <div class="form-group m-form__group">
                                <select class="form-control m-input" name="parent" >
																		@foreach($phongban as $phongbans)
																		<option value="{{$phongbans->id}}">{{$phongbans->name}}</option>
																		@endforeach
                                </select>
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
										<div class="tab-pane " id="m_user_profile_tab_2"></div>
										<div class="tab-pane " id="m_user_profile_tab_3"></div>
									</div>
								</div>
							</div>
						</div>
					</div>


@endsection
