
@extends('layouts.homemaster')

@section('content')

	<div class="m-content">
				<div class="row">
            		<div class="col-xl-12 col-lg-12">
  										<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
  									<div class="m-portlet__head">

  										<div class="m-portlet__head-tools">
												@if ($errors->any())
															<div class="alert alert-danger">
																	<ul>
																			@foreach ($errors->all() as $error)
																					<li style="text-align: center;">{{ $error }}</li>
																			@endforeach
																	</ul>
															</div>
													@endif
  											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">



													<li class="nav-item m-tabs__item">
  													<a class="nav-link m-tabs__link active show" data-toggle="tab" href="#nhomkhachhang" role="tab" aria-selected="true">
  														<i class="flaticon-share m--hide"></i>
  														Nhóm Khách Hàng
  													</a>
  												</li>



  												<li class="nav-item m-tabs__item">
  													<a class="nav-link m-tabs__link" data-toggle="tab" href="#nguonkhachhang" role="tab" aria-selected="false">
  														Nguồn Khách Hàng
  													</a>
  												</li>


													<li class="nav-item m-tabs__item">
														<a class="nav-link m-tabs__link" data-toggle="tab" href="#nhomsanpham" role="tab" aria-selected="false">
															Nhóm Sản Phẩm
														</a>
													</li>

													<li class="nav-item m-tabs__item">
														<a class="nav-link m-tabs__link" data-toggle="tab" href="#sanpham" role="tab" aria-selected="false">
															Sản Phẩm
														</a>
													</li>

													<li class="nav-item m-tabs__item">
														<a class="nav-link m-tabs__link" data-toggle="tab" href="#donvitinh" role="tab" aria-selected="false">
															Đơn Vị Tính
														</a>
													</li>

													<li class="nav-item m-tabs__item">
														<a class="nav-link m-tabs__link" data-toggle="tab" href="#moiquanhe" role="tab" aria-selected="false">
															Mối Quan Hệ
														</a>
													</li>

													<li class="nav-item m-tabs__item">
														<a class="nav-link m-tabs__link" data-toggle="tab" href="#hinhthucthanhtoan" role="tab" aria-selected="false">
															Hình Thức Thanh Toán
														</a>
													</li>

  											</ul>


  										</div>

  						</div>



					  					<div class="tab-content">

					  										<div class="tab-pane active show" id="nhomkhachhang">
																	<div class="row">
																		<div class="col-xl-8">
																				<div class="m-portlet__body">
																					<!--begin: Datatable -->
																							<div class="m_datatable m-datatable m-datatable--default m-datatable--error m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="position: static;">
																								<table class="m-datatable__table" style="display: block; min-height: 300px; ">
																								<thead class="m-datatable__head">
																									<tr class="m-datatable__row" style="left: 0px;">
																										<th class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 40px;">#</span></th>
																										<th class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 150px;">Nhóm Khách Hàng<i class="la la-arrow-up"></i></span></th>
																										<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Mã</span></th>
																										<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Thao Tác</span></th>
																									</tr>
																								</thead>
																									<tbody style="padding:0" class="m-datatable__body">
																											@foreach($customer_group as $customer_groups)
																										<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded" style="border-bottom: 1px solid #f0f3ff;">
																										<td class="m-datatable__cell"><span style="width: 40px;"></span>{{$customer_groups->id}}</td>
																										<td class="m-datatable__cell"><span style="width: 120px	;">{{$customer_groups->name}}</span></td>
																										<td class="m-datatable__cell"><span style="width: 200px;">{{$customer_groups->code}}</span></td>
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
																							<form class="m-form m-form--fit m-form--label-align-right" action="{{route('addcustomergroup')}}" method="POST">
																								@csrf
																									<div class="m-portlet__body">
																										<div class="form-group m-form__group">
																											<label>
																												Thêm nhóm khách hàng <span style="color:red;">(*)</span>
																											</label>
																											<div class="m-input-icon m-input-icon--left">
																												<input type="text" name="name" class="form-control m-input" >
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

																<div class="tab-pane" id="nguonkhachhang">
																				<div class="row">
																					<div class="col-xl-8">
																							<div class="m-portlet__body">
																								<!--begin: Datatable -->
																										<div class="m_datatable m-datatable m-datatable--default m-datatable--error m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="position: static;">
																											<table class="m-datatable__table" style="display: block; min-height: 300px; ">
																											<thead class="m-datatable__head">
																												<tr class="m-datatable__row" style="left: 0px;">
																													<th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 40px;">#</span></th>
																													<th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 150px;">Nguồn Khách<i class="la la-arrow-up"></i></span></th>
																													<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Mã</span></th>
																													<th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 95px;">Thao Tác</span></th>
																												</tr>
																											</thead>
																												<tbody style="max-height: 327px;padding:0" class="m-datatable__body">
																														@foreach($customer_resource as $customer_resources)
																													<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded" style="border-bottom: 1px solid #f0f3ff;">
																													<td class="m-datatable__cell"><span style="width: 40px;"></span></td>
																													<td class="m-datatable__cell"><span style="width: 110px	;">{{ $customer_resources->name }}</span></td>
																													<td class="m-datatable__cell"><span style="width: 200px;">{{ $customer_resources->code }}</span></td>
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

																						<form class="m-form m-form--fit m-form--label-align-right" action="{{route('addcustomerresource')}}" method="POST">
																									@csrf
																								<div class="m-portlet__body">
																									<div class="form-group m-form__group">
																										<label>
																											Thêm Nguồn Khách <span style="color:red;">(*)</span>
																										</label>
																										<div class="m-input-icon m-input-icon--left">
																											<input type="text" name="name" class="form-control m-input">
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

																<div class="tab-pane" id="nhomsanpham">
																	<div class="row">


																		<div class="col-xl-8">
																				<div class="m-portlet__body">
																					<!--begin: Datatable -->
																							<div class="m_datatable m-datatable m-datatable--default m-datatable--error m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="position: static;">
																								<table class="m-datatable__table" style="display: block; min-height: 300px; ">
																								<thead class="m-datatable__head">
																									<tr class="m-datatable__row" style="left: 0px;">
																										<th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 40px;">#</span></th>
																										<th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 150px;">Nhóm Sản Phẩm<i class="la la-arrow-up"></i></span></th>
																										<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Mã</span></th>
																										<th data-field="Status" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Thao Tác</span></th>
																									</tr>
																								</thead>
																									<tbody style="max-height: 327px;padding:0" class="m-datatable__body">
																										@foreach($product_group as $product_groups)
																										<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded" style="border-bottom: 1px solid #f0f3ff;">
																										<td class="m-datatable__cell"><span style="width: 40px;"></span></td>
																										<td class="m-datatable__cell"><span style="width: 120px	;">{{ $product_groups->name}}</span></td>
																										<td class="m-datatable__cell"><span style="width: 200px;">{{ $product_groups->code }}</span></td>
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

																			<form class="m-form m-form--fit m-form--label-align-right" action="{{route('addproductgroup')}}" method="POST">
																					@csrf
																					<div class="m-portlet__body">
																						<div class="form-group m-form__group">
																							<label>
																							Thêm Nhóm sản phẩm <span style="color:red;">(*)</span>
																							</label>
																							<div class="m-input-icon m-input-icon--left">
																								<input type="text" name="name" class="form-control m-input" >
																								<span class="m-input-icon__icon m-input-icon__icon--left">
																									<span>
																										<i class="la la-tag"></i>
																									</span>
																								</span>
																							</div>
																						</div>
																						<!-- <div class="form-group m-form__group">
																							<label>
																							Mô tả
																							</label>
																							<div class="m-input-icon m-input-icon--left">
																								<textarea class="form-control m-input m-input--air" id="exampleTextarea" rows="1"></textarea>
																							</div>
																						</div> -->
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

																<div class="tab-pane" id="sanpham">
																	<div class="row">


																		<div class="col-xl-8">
																				<div class="m-portlet__body">
																					<!--begin: Datatable -->
																							<div class="m_datatable m-datatable m-datatable--default m-datatable--error m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="position: static;">
																								<table class="m-datatable__table" style="display: block; min-height: 300px; ">
																								<thead class="m-datatable__head">
																									<tr class="m-datatable__row" style="left: 0px;">
																										<th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 40px;">#</span></th>
																										<th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 120px;">Tên Sản Phẩm<i class="la la-arrow-up"></i></span></th>
																										<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 173px;">Nhóm Sản Phẩm</span></th>
																										<th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Mã Sản Phẩm</span></th>
																										<th data-field="Status" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 85px;">Thao Tác</span></th>
																									</tr>
																								</thead>
																									<tbody style="max-height: 327px;padding:0" class="m-datatable__body">
																										@foreach($products as $product)
																										<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded" style="border-bottom: 1px solid #f0f3ff;">
																										<td class="m-datatable__cell"><span style="width: 40px;"></span></td>
																										<td class="m-datatable__cell"><span style="width: 95px	;">{{ $product->name }}</span></td>
																										<td class="m-datatable__cell"><span style="width: 165px;"></span></td>
																										<td class="m-datatable__cell"><span style="width: 167px;">{{ $product->code }}</span></td>
																											<td data-field="Actions" class="m-datatable__cell">
																												<span style="width: 140px;">
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

																			<form class="m-form m-form--fit m-form--label-align-right" action="{{route('addproduct')}}" method="POST">
																					@csrf
																					<div class="m-portlet__body">
																						<div class="form-group m-form__group">
																							<label>
																								Tên sản phẩm <span style="color:red;">(*)</span>
																							</label>
																							<div class="m-input-icon m-input-icon--left">
																								<input type="text" name="name" class="form-control m-input" >
																								<span class="m-input-icon__icon m-input-icon__icon--left">
																									<span>
																										<i class="la la-tag"></i>
																									</span>
																								</span>
																							</div>
																						</div>
																						<div class="form-group m-form__group">
																									<label>
																										Nhóm Sản phẩm <span style="color:red;">(*)</span>
																									</label>
																									<select class="form-control m-input" name="nhomsanpham" required>
																											<option value="">---------</option>
																											@foreach($product_group as $product_groups)
																											<option value="{{$product_groups->id}}">{{$product_groups->name}}</option>
																											@endforeach
																									</select>
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

																<div class="tab-pane" id="donvitinh">
																	<div class="row">


																		<div class="col-xl-8">
																				<div class="m-portlet__body">
																					<!--begin: Datatable -->
																							<div class="m_datatable m-datatable m-datatable--default m-datatable--error m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="position: static;">
																								<table class="m-datatable__table" style="display: block; min-height: 300px;">
																								<thead class="m-datatable__head">
																									<tr class="m-datatable__row" style="left: 0px;">
																										<th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 40px;">#</span></th>
																										<th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 150px;">Đơn vị Tính<i class="la la-arrow-up"></i></span></th>
																										<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Mã</span></th>
																										<th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 110px;">Thao Tác</span></th>

																									</tr>
																								</thead>
																									<tbody style="max-height: 327px;padding:0" class="m-datatable__body">
																											@foreach($unit as $units)
																										<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded" style="border-bottom: 1px solid #f0f3ff;">
																										<td class="m-datatable__cell"><span style="width: 40px;"></span></td>
																										<td class="m-datatable__cell"><span style="width: 100px	;">{{ $units->name }}</span></td>
																										<td class="m-datatable__cell"><span style="width: 200px;">{{ $units->code }}</span></td>
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

																			<form class="m-form m-form--fit m-form--label-align-right" action="{{route('addunit')}}" method="POST">
																					@csrf
																					<div class="m-portlet__body">
																						<div class="form-group m-form__group">
																							<label>
																								Tên Đơn Vị Tính <span style="color:red;">(*)</span>
																							</label>
																							<div class="m-input-icon m-input-icon--left">
																								<input type="text" name="name" class="form-control m-input" >
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

																<div class="tab-pane" id="moiquanhe">
																	<div class="row">


																		<div class="col-xl-8">
																				<div class="m-portlet__body">
																					<!--begin: Datatable -->
																							<div class="m_datatable m-datatable m-datatable--default m-datatable--error m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="position: static;">
																								<table class="m-datatable__table" style="display: block;">
																								<thead class="m-datatable__head">
																									<tr class="m-datatable__row" style="left: 0px;">
																										<th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 40px;">#</span></th>
																										<th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 150px;">Tên Mối Quan Hệ<i class="la la-arrow-up"></i></span></th>
																										<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Màu Sắc</span></th>
																										<th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 90px;">Thao Tác</span></th>
																									</tr>
																								</thead>
																									<tbody style="padding:0" class="m-datatable__body">
																										@foreach($relationships as $relationship)
																										<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded" style="border-bottom: 1px solid #f0f3ff;">
																										<td class="m-datatable__cell"><span style="width: 40px;"></span></td>
																										<td class="m-datatable__cell"><span style="width: 135px	;">{{ $relationship->name }}</span></td>
																										<td class="m-datatable__cell"><span style="width: 200px;"><span class="m-badge  m-badge--success m-badge--wide" style="background-color: {{ $relationship->color }}; font-size: 14px;font-family: inherit;padding: 6px;border-radius: 0; ">{{ $relationship->name }}</span></span></td>
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

																			<form class="m-form m-form--fit m-form--label-align-right" action="{{route('addrelationships')}}" method="POST">
																						@csrf
																					<div class="m-portlet__body">
																						<div class="form-group m-form__group">
																							<label>
																								Thêm Mối Quan Hệ <span style="color:red;">(*)</span>
																							</label>
																							<div class="m-input-icon m-input-icon--left">
																								<input type="text" name="name" class="form-control m-input" >
																								<span class="m-input-icon__icon m-input-icon__icon--left">
																									<span>
																										<i class="la la-tag"></i>
																									</span>
																								</span>
																							</div>
																						</div>

																						<div class="form-group m-form__group">
																								<label >
																									Màu Sắc <span style="color:red;">(*)</span>
																								</label>
																								<div class="col-12">
																									<input class="form-control m-input" type="color" name="color" style="height: 39px;">
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

																<div class="tab-pane" id="hinhthucthanhtoan">
																	<div class="row">


																		<div class="col-xl-8">
																				<div class="m-portlet__body">
																					<!--begin: Datatable -->
																							<div class="m_datatable m-datatable m-datatable--default m-datatable--error m-datatable--loaded m-datatable--scroll" id="m_datatable_latest_orders" style="position: static;">
																								<table class="m-datatable__table" style="display: block; min-height: 300px; ">
																								<thead class="m-datatable__head">
																									<tr class="m-datatable__row" style="left: 0px;">
																										<th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 40px;">#</span></th>
																										<th data-field="OrderID" class="m-datatable__cell m-datatable__cell--sort" data-sort="asc"><span style="width: 150px;">Hình Thức Thanh Toán<i class="la la-arrow-up"></i></span></th>
																										<th data-field="ShipName" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 150px;">Mã</span></th>
																										<th data-field="ShipDate" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 110px;">Thao Tác</span></th>

																									</tr>
																								</thead>
																									<tbody style="max-height: 327px;padding:0" class="m-datatable__body">
																										@foreach($method_payment as $method_payments)
																										<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded" style="border-bottom: 1px solid #f0f3ff;">
																										<td class="m-datatable__cell"><span style="width: 40px;"></span></td>
																										<td class="m-datatable__cell"><span style="width: 100px	;">{{ $method_payments->name }}</span></td>
																										<td class="m-datatable__cell"><span style="width: 200px;">{{ $method_payments->code }}</span></td>
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

																			<form class="m-form m-form--fit m-form--label-align-right" action="{{route('addmethodpayment')}}" method="POST">
																						@csrf
																					<div class="m-portlet__body">
																						<div class="form-group m-form__group">
																							<label>
																							Thêm Hình thức thanh toán<span style="color:red;">(*)</span>
																							</label>
																							<div class="m-input-icon m-input-icon--left">
																								<input type="text" name="name" class="form-control m-input" >
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
