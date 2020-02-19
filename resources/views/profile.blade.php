
@extends('layouts.homemaster')

@section('content')
@foreach($user as $users)
<div class="m-content">
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
												<span class="m-card-profile__name">
													{{ Auth::user()->name}}
												</span>
												<a href="" class="m-card-profile__email m-link">
													{{ Auth::user()->email}}
												</a>
											</div>
											<div class="m-card-profile__details" style="padding-top: 20px;">
													@if (Auth::user()->google2fa_enable != 0)
													<a href="{{route('getdisable2fa')}}" class="btn btn-warning">Disable 2FA</a>
													@else
													<a href="{{route('generate2faSecret')}}" class="btn btn-primary">Enable 2FA</a>
													@endif
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-9 col-lg-8">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">


									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
														<i class="flaticon-share m--hide"></i>
													 	Thông Tin Cá Nhân
													</a>
												</li>
											</ul>
										</div>
									</div>
									@if ($errors->any())
									    <div class="alert alert-danger">
									        <ul>
									            @foreach ($errors->all() as $error)
									                <li>{{ $error }}</li>
									            @endforeach
									        </ul>
									    </div>
									@endif
									@if(session()->has('success'))
									<div class="alert alert-success">
											<ul>
															<li>{{Session::get('success')}}</li>
											</ul>
									</div>
                  @endif

									<div class="tab-content">
										<div class="tab-pane active" id="m_user_profile_tab_1">
											<form class="m-form m-form--fit m-form--label-align-right" action="{{ route('changeprofile') }}" method="POST">
												@csrf
												<div class="m-portlet__body">
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-3 col-form-label">
														 Họ và tên
														</label>
														<div class="col-6">
															<input class="form-control m-input" name="name" type="text" placeholder="{{ $users->fullname}}" value="">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-3 col-form-label">
															Email
														</label>
														<div class="col-6">
															<input class="form-control m-input" name="email" type="text" placeholder="{{ $users->email}}" value="">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-3 col-form-label">
															Phone
														</label>
														<div class="col-6">
															<input class="form-control m-input" name="phone" type="text" placeholder="{{ $users->phone}}" value="">
														</div>
													</div>

														<div class="m-form__actions">
															<div class="row">
																<div class="col-4"></div>
																<div class="col-7">
																	<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																		Save changes
																	</button>
																</div>
															</div>
														</div>
													</form>

													<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-3 col-form-label">
															Phòng Ban
														</label>
														<div class="col-6">
															<input class="form-control m-input" type="text" value="{{ $users->department_name}}">
														</div>
													</div>

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-3 col-form-label">
															Chức Vụ
														</label>
														<div class="col-6">
															<input class="form-control m-input" type="text" value="{{ $users->position_name}}">
														</div>
													</div>

													<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
													<form class="m-form m-form--fit m-form--label-align-right" action="{{route('changepass')}}" method="POST">
														@csrf
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-3 col-form-label">
																password
															</label>
															<div class="col-6">
																<input id="password" type="password" class="form-control m-input" name="password" type="text" value="">
															</div>
														</div>
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-3 col-form-label">
																password confirmed
															</label>
															<div class="col-6">
																<input id="password-confirm" type="password"  class="form-control m-input"  name="password_confirmation" type="text" value="">
															</div>
														</div>
															<div class="m-form__actions">
																<div class="row">
																	<div class="col-4"></div>
																	<div class="col-7">
																		<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																			Save changes
																		</button>
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
					</div>

@endforeach
@endsection
