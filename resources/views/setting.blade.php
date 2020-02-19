
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
													<a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_user_profile_tab_1" role="tab" aria-selected="true">
														<i class="flaticon-share m--hide"></i>
														Quốc Gia
													</a>
												</li>

												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab" aria-selected="false">
														Thành Phố
													</a>
												</li>


												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab" aria-selected="false">
														Quận Huyện
													</a>
												</li>



											</ul>


										</div>

						</div>



										<div class="tab-content">

															<div class="tab-pane active show" id="m_user_profile_tab_1">
																<div class="row">


																	<div class="col-xl-8">
																			<div class="m-portlet__body">
																				<!--begin: Datatable -->
																						<div class="m_datatable m-datatable m-datatable--default m-datatable--error m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="position: static;">
																							<table class="m-datatable__table" style="display: block; min-height: 300px; max-height: 380px;">
																							<thead class="m-datatable__head">
																								<tr class="m-datatable__row" style="left: 0px;">
																									<th class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 40px;">#</span></th>
																									<th class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 150px;">Tên Quốc Gia<i class="la la-arrow-up"></i></span></th>
																									<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Mã</span></th>
																									<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Thao Tác</span></th>
																								</tr>
																							</thead>
																								<tbody style="max-height: 380px;padding:0" class="m-datatable__body">
																									@foreach($country as $countrys)
																									<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded" style="border-bottom: 1px solid #f0f3ff;">
																									<td class="m-datatable__cell"><span style="width: 40px;">{{$countrys->id}}</span></td>
																									<td class="m-datatable__cell"><span style="width: 100px	;">{{$countrys->name}}</span></td>
																									<td class="m-datatable__cell"><span style="width: 200px;"></span></td>
																										<td data-field="Actions" class="m-datatable__cell">
																											<span style="width: 160px;">
																											<span style="overflow: visible; position: relative;padding: 20px;">
																											<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" style="background: #96f9f4;"><i class="la la-edit"></i></a>
																										</span>
																											<span style="overflow: visible; position: relative;">
																											<a class="btn btn-sm btn-danger" ><i class="flaticon-delete-2"></i></a>
																												</span>
																												</span>
																										</td>
																									</tr>
																									@endforeach
																								</tbody>
																							</table>
																						</div>
																				<!--end: Datatable -->
																			</div>
																	</div>




																	<div class="col-xl-4">

																					<!--start::Form-->
																						<form class="m-form m-form--fit m-form--label-align-right" action="{{route('addquocgia')}}" method="POST">
																									@csrf
																								<div class="m-portlet__body">
																									<div class="form-group m-form__group">
																										<label>
																											Thêm Quốc Gia <span style="color:red;">(*)</span>
																										</label>
																										<div class="m-input-icon m-input-icon--left">
																											<input type="text" name="quocgia" class="form-control m-input" required>
																											<span class="m-input-icon__icon m-input-icon__icon--left">
																												<span>
																													<i class="la la-tag"></i>
																												</span>
																											</span>
																										</div>
																									</div>
																									<div class="m-form__actions">
																										<button type="submit" class="btn btn-success">
																											Thêm
																										</button>
																										<button type="reset" class="btn btn-secondary">
																											reset
																										</button>
																									</div>
																								</div>

																							</form>
																							<!--end::Form-->
																	</div>


																</div>
															</div>




															<div class="tab-pane" id="m_user_profile_tab_2">

																			<div class="row">


																				<div class="col-xl-8">
																						<div class="m-portlet__body">
																							<!--begin: Datatable -->
																									<div class="m_datatable m-datatable m-datatable--default m-datatable--error m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="position: static;">
																										<table class="m-datatable__table" style="display: block;">
																										<thead class="m-datatable__head">
																											<tr class="m-datatable__row" style="left: 0px;">
																												<th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 40px;">#</span></th>
																												<th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 150px;">Tỉnh/Thành Phố<i class="la la-arrow-up"></i></span></th>
																												<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Mã</span></th>
																												<th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 95px;">Thao Tác</span></th>
																											</tr>
																										</thead>

																											<tbody style="padding:0" class="m-datatable__body">
																												@foreach($province as $provinces)
																												<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded" style="border-bottom: 1px solid #f0f3ff;">
																												<td class="m-datatable__cell"><span style="width: 40px;">{{$provinces->id}}</span></td>
																												<td class="m-datatable__cell"><span style="width: 110px	;">{{$provinces->name}}</span></td>
																												<td class="m-datatable__cell"><span style="width: 200px;"></span></td>
																													<td data-field="Actions" class="m-datatable__cell">
																														<span style="width: 160px;">
																														<span style="overflow: visible; position: relative;padding: 20px;">
																														<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" style="background: #96f9f4;"><i class="la la-edit"></i></a>
																													</span>
																														<span style="overflow: visible; position: relative;">
																														<a class="btn btn-sm btn-danger" ><i class="flaticon-delete-2"></i></a>
																															</span>
																															</span>
																													</td>
																												</tr>
																												@endforeach
																											</tbody>


																										</table>
																									</div>
																							<!--end: Datatable -->
																						</div>
																				</div>




																				<div class="col-xl-4">

																					<form class="m-form m-form--fit m-form--label-align-right" action="{{route('addthanhpho')}}" method="POST">
																								@csrf
																							<div class="m-portlet__body">
																								<div class="form-group m-form__group">
																									<label>
																										Quốc Gia <span style="color:red;">(*)</span>
																									</label>
																									<select class="form-control m-input" name="quocgia" required>

																											<option value="">---------</option>
																											@foreach($country as $countrys)
																											<option value="{{$countrys->id}}">{{$countrys->name}}</option>
																											@endforeach
																									</select>
																								</div>
																								<div class="form-group m-form__group">
																									<label>
																										Thêm Thành Phố <span style="color:red;">(*)</span>
																									</label>
																									<div class="m-input-icon m-input-icon--left">
																										<input type="text" name="thanhpho" class="form-control m-input" required>
																										<span class="m-input-icon__icon m-input-icon__icon--left">
																											<span>
																												<i class="la la-tag"></i>
																											</span>
																										</span>
																									</div>
																								</div>
																								<div class="m-form__actions">
																									<button type="submit" class="btn btn-success">
																										Submit
																									</button>
																									<button type="reset" class="btn btn-secondary">
																										Cancel
																									</button>
																								</div>
																							</div>

																						</form>
																						<!--end::Form-->
																				</div>


																	</div>
															</div>



															<div class="tab-pane" id="m_user_profile_tab_3">
																<div class="row">


																	<div class="col-xl-8">
																			<div class="m-portlet__body">
																				<!--begin: Datatable -->
																						<div class="m_datatable m-datatable m-datatable--default m-datatable--error m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="position: static;">
																							<table class="m-datatable__table" style="display: block;">
																							<thead class="m-datatable__head">
																								<tr class="m-datatable__row" style="left: 0px;">
																									<th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 40px;">#</span></th>
																									<th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 150px;">Quận/ Huyện<i class="la la-arrow-up"></i></span></th>
																									<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Mã</span></th>
																									<th data-field="Status" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Thao Tác</span></th>
																								</tr>
																							</thead>
																								<tbody style="padding:0" class="m-datatable__body">
																									@foreach($district as $districts)
																									<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded" style="border-bottom: 1px solid #f0f3ff;">
																									<td class="m-datatable__cell"><span style="width: 40px;">{{$districts->id}}</span></td>
																									<td class="m-datatable__cell"><span style="width: 115px	;">{{$districts->name}}</span></td>
																									<td class="m-datatable__cell"><span style="width: 200px;"></span></td>
																										<td data-field="Actions" class="m-datatable__cell">
																											<span style="width: 160px;">
																											<span style="overflow: visible; position: relative;padding: 20px;">
																											<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" style="background: #96f9f4;"><i class="la la-edit"></i></a>
																										</span>
																											<span style="overflow: visible; position: relative;">
																											<a class="btn btn-sm btn-danger" ><i class="flaticon-delete-2"></i></a>
																												</span>
																												</span>
																										</td>
																									</tr>
																									@endforeach
																								</tbody>
																							</table>
																						</div>
																				<!--end: Datatable -->
																			</div>
																	</div>




																	<div class="col-xl-4">

																		<form class="m-form m-form--fit m-form--label-align-right"  action="{{route('addquanhuyen')}}" method="POST">
																			@csrf
																			<div class="m-portlet__body">

																					<div class="form-group m-form__group">
																						<label>
																						 Tỉnh Thành <span style="color:red;">(*)</span>
																						</label>
																						<select class="form-control m-input" name="thanhpho" required>
																								<option value="">---------</option>
																									@foreach($province as $provinces)
																													<option value="{{$provinces->id}}">{{$provinces->name}}</option>
																									@endforeach

																						</select>
																					</div>

																					<div class="form-group m-form__group">
																						<label>
																							 Quận Huyện <span style="color:red;">(*)</span>
																						</label>
																						<div class="m-input-icon m-input-icon--left">
																							<input type="text" name="quanhuyen" class="form-control m-input" required>
																							<span class="m-input-icon__icon m-input-icon__icon--left">
																								<span>
																									<i class="la la-tag"></i>
																								</span>
																							</span>
																						</div>
																					</div>
																					<div class="m-form__actions">
																						<button type="submit" class="btn btn-success">
																							Submit
																						</button>
																						<button type="reset" class="btn btn-secondary">
																							Cancel
																						</button>
																					</div>
																				</div>

																			</form>
																			<!--end::Form-->
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

@endsection
