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
													Two-Factor Authentication
													</a>
												</li>
											</ul>
										</div>

									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="m_user_profile_tab_1">
											<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{ route('postdisable2fa') }}">
                        @csrf
												<div class="m-portlet__body">
													<div class="form-group m-form__group m--margin-top-10 m--hide">
														<div class="alert m-alert m-alert--default" role="alert">
															The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
														</div>
													</div>
                            <p style="text-align: center;">Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code </p>

                          <p style="text-align: center;">You must set up your Google Authenticator app before continuing. You will be unable to login otherwise</p>
													<div class="form-group m-form__group row" >
														<label for="example-text-input" class="col-4 col-form-label">
														current Password
														</label>
														<div class="col-4">
															<input class="form-control m-input" type="password" value="" name="current-password" placeholder=" password" required autofocus>
															<span class="m-form__help">
																You need view App app google Authenticator this your phone
															</span>
														</div>
													</div>


												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-12" style="text-align: center;">
																<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																	Disable 2FA
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


</div>
</div>
</div>
@endsection
