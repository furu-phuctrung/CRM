
@extends('layouts.homemaster')

@section('content')

	@foreach($infocompany as $infocompanys)
		<div class="m-content">
						<div class="row">
							<div class="col-xl-3 col-lg-4">
								<div class="m-portlet m-portlet--full-height  ">
									<div class="m-portlet__body">
										<div class="m-card-profile">

											<div style="padding: 0 5px 0 0;text-align: center;">
												<div class="m-card-profile__pic-wrapper">
													<img src="https://longdienland.com/img/logos/black-logo.png" style="height: 79px;width: 200px;">
												</div>
											</div>
											<div class="m-card-profile__details" style="padding-top: 20px;">

													<a href="" class="btn btn-primary">Upload Logo</a>
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
														 Thông Tin Công Ty
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active">
											<form class="m-form m-form--fit m-form--label-align-right">
												<div class="m-portlet__body">
													<div class="form-group m-form__group m--margin-top-10 m--hide">
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Tên công ty:
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="{{ $infocompanys->name }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Trụ sở chính:
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="{{ $infocompanys->headquarters }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Chi nhánh:
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="{{ $infocompanys->branch }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Email:
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="{{ $infocompanys->email }}">
														</div>
													</div>
													<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Điện thoại:
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="{{ $infocompanys->phone }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Mã số thuế:
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="{{ $infocompanys->taxcode }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Fax:
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="{{ $infocompanys->fax }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Website:
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="{{ $infocompanys->website }}">
														</div>
													</div>
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2"></div>
															<div class="col-7">
																<button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">
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
	@endforeach

@endsection
