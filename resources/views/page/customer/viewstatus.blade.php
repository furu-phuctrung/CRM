
@extends('layouts.homemaster')

@section('content')

<!--Begin::Section-->


<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
										<div class="m-portlet__head">
												<div class="m-portlet__head-tools">
													<ul class="m-portlet__nav">
														<div class="m-portlet__nav-item">
												 				<a href="{{ route('getaddcustomer')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"><span><i class="la la-user-plus"></i><span> Thêm Khách Mới </span></span></a>
											 				</div>
													</ul>
												</div>
											</div>
									<div class="m-portlet__body">
										<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
											<div class="row align-items-center">


													<!-- <div class="col-lg-4 ">
														<div class="form-group m-form__group row align-items-center">
															<div class="col-lg-12">
																<div class="m-input-icon m-input-icon--left">
															<input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
															<span class="m-input-icon__icon m-input-icon__icon--left">
																<span>
																	<i class="la la-search"></i>
																</span>
															</span>
														</div>
													</div>
												</div>
											</div> -->

												<!-- <div class="col-lg-4">
														<div class="form-group m-form__group row">

																	<div class="col-lg-12 ">
																		<div class="dropdown bootstrap-select form-control m-bootstrap-select m_"><select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" tabindex="-98">
																			<option data-tokens="ketchup mustard">
																			Chọn Nhóm Khách Hàng
																			</option>
																			<option data-tokens="mustard">
																				Burger, Shake and a Smile
																			</option>
																			<option data-tokens="frosting">
																				Sugar, Spice and all things nice
																			</option>
																		</select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Hot Dog, Fries and a Soda" aria-expanded="false"><div class="filter-option"><div class="filter-option-inner">
																				Chọn Nhóm Khách Hàng
																			</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu" role="combobox" style="max-height: 134.117px; overflow: hidden; min-height: 58px; position: absolute; will-change: transform; min-width: 264px; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);" x-placement="bottom-start"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1" style="max-height: 62.1167px; overflow-y: auto; min-height: 0px;"><ul class="dropdown-menu inner show"><li class="selected active"><a role="option" class="dropdown-item selected active" aria-disabled="false" tabindex="0" aria-selected="true"><span class=" bs-ok-default check-mark"></span><span class="text">
																				Hot Dog, Fries and a Soda
																			</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">
																				Burger, Shake and a Smile
																			</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">
																				Sugar, Spice and all things nice
																			</span></a></li></ul></div></div></div>
																</div>
															</div>
													</div> -->


									<!-- <div class="col-lg-4">
											<div class="form-group m-form__group row">
														<div class="col-lg-12">
															<div class="dropdown bootstrap-select form-control m-bootstrap-select m_"><select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" tabindex="-98">
																<option data-tokens="ketchup mustard">
																Chọn Nhóm Trạng Thái
																</option>
																<option data-tokens="mustard">
																	Burger, Shake and a Smile
																</option>
																<option data-tokens="frosting">
																	Sugar, Spice and all things nice
																</option>
															</select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Hot Dog, Fries and a Soda" aria-expanded="false"><div class="filter-option"><div class="filter-option-inner">
																	Chọn Nhóm Trạng Thái
																</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu" role="combobox" style="max-height: 134.117px; overflow: hidden; min-height: 58px; position: absolute; will-change: transform; min-width: 264px; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);" x-placement="bottom-start"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1" style="max-height: 62.1167px; overflow-y: auto; min-height: 0px;"><ul class="dropdown-menu inner show"><li class="selected active"><a role="option" class="dropdown-item selected active" aria-disabled="false" tabindex="0" aria-selected="true"><span class=" bs-ok-default check-mark"></span><span class="text">
																	Hot Dog, Fries and a Soda
																</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">
																	Burger, Shake and a Smile
																</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">
																	Sugar, Spice and all things nice
																</span></a></li></ul></div></div></div>
													</div>
												</div>
										</div> -->
									</div>
								</div>

                  <div class="m_datatable m-datatable m-datatable--default m-datatable--brand m-datatable--subtable m-datatable--loaded" id="child_data_local" style="">
                   <table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
                  		<thead class="m-datatable__head">
                  			 <tr class="m-datatable__row">
													 <th data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand "><input type="checkbox"><span></span></label></span></th>
													 <th data-field="edit"  class="m-datatable__cell m-datatable__cell--sort"><span style="width: 35px;" ></span></th>
														<th data-field="LastName" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 127px;">Họ Tên</span></th>
                  					<th data-field="Company" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 109px;">Phone</span></th>
                  					<th data-field="Email" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 145px;text-align: center;">Email</span></th>
                  					<th data-field="Phone" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 166px;text-align: center;">Trạng Thái</span></th>
                  					<th data-field="Status" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 193px;">Thông Tin Trao Đổi</span></th>
                  					<th data-field="Type" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 120px;text-align: center;">Nhóm Khách</span></th>
                  					<th data-field="Actions" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 106px;text-align: center;">Nguồn Khách</span></th>
                  			 </tr>
                  		</thead>

                  		<tbody style="" class="m-datatable__body">
												 	@foreach($data as $data)
                  			 <tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded m-datatable__row--hover" style="border-bottom: 1px solid #f0f3ff;">


													 <td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check" data-field="RecordID"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" name="RecordID" value="{{$data->ID}}" data-id="{{$data->ID}}"><span></span></label></span></td>


													 <td class="kt-datatable__cell--sorted kt-datatable__cell">
														 	<div class="m-widget19">
																			<div class="m-widget19__content" style="margin: 0;">
																				 <div class="m-widget19__header" >
																					 <div class="m-widget19__user-img">
																						 <a href="https://crm.longdienland.com/customer/{{$data->ID}}" title="Edit Customer details">

																							 @if($data->gender == null)
																												<img class="m-widget19__img" src="https://crm.longdienland.com/assets/demo/media/img/logo/ico.png">
																							 @elseif($data->gender == 'Nam')
																							 					<img class="m-widget19__img" src="../../assets/app/media/img//users/user2.jpg">
																							 @else
																						 						<img class="m-widget19__img" src="../../assets/app/media/img//users/user1.jpg">
																							@endif

																					 </a>
																					 </div>
																				 </div>
																			 </div>
																</div>
													 </td>

                  					<td class="m-datatable__cell--sorted m-datatable__cell" data-field="FirstName"><span style="width: 132px;"><a href="https://crm.longdienland.com/customer/{{$data->ID}}" title="Edit Customer details">{{ $data->customer_name}}</span></td>
                  					<td data-field="Company" class="m-datatable__cell"><span style="width: 130px;">{{$data->phone}}</span></td>
                  					<td data-field="Email" class="m-datatable__cell"><span style="width: 142px;">@if($data->email != '' ){{$data->email}} @else N/A @endif</span></td>
                  					<td data-field="Phone" class="m-datatable__cell"><span style="width: 140px;text-align: center;"><span class="m-badge  m-badge--success m-badge--wide" style="background-color: {{$data->color}} ; ">{{$data->name}}</span></span></span></td>
														<td data-field="Actions" class="m-datatable__cell"><span style="overflow: visible; position: relative; width: 179px;">
												    					<a href="#" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"  data-toggle="modal" data-target="#m_modal_4"  style="height: 19px;">{{$data->customer_name}}</a>
										      			</span>
														</td>
                  					<td data-field="Type" class="m-datatable__cell"><span style="width: 126px;text-align: center;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">{{$data->duan}}</span></span></td>
														<td data-field="Type" class="m-datatable__cell"><span style="width: 112px;text-align: center;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">@if($data->customer_resources != '' ){{$data->customer_resources}} @else N/A @endif</span></span></td>
                  			 </tr>
												 	@endforeach
                  		</tbody>



                   </table>




               <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
              		<ul class="m-datatable__pager-nav">
              			 <li><a title="First" class="m-datatable__pager-link m-datatable__pager-link--first m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-double-left"></i></a></li>
              			 <li><a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-left"></i></a></li>
              			 <li><a class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active" data-page="1" title="1">1</a></li>
              			 <li><a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-right"></i></a></li>
              			 <li><a title="Last" class="m-datatable__pager-link m-datatable__pager-link--last m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-double-right"></i></a></li>
              		</ul>
              		<div class="m-datatable__pager-info">

              			 <span class="m-datatable__pager-detail">Displaying 1 records</span>
              		</div>
               </div>

              </div>

			<!--end: Datatable -->
		</div>
	</div>
</div>





<!--begin::Modal-->
						<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">

										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
										</button>
									</div>


									<div class="modal-body">
										<div class="m-widget1__item">
											<div class="row m-row--no-padding align-items-center">
												<div class="m-portlet__body" style="width:100%;">
																					<div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide _mCS_4" data-scrollbar-shown="true" data-scrollable="true" data-max-height="300" style="overflow: visible; height: 300px; max-height: 300px; position: relative;">
																						<div id="mCSB_4" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0">
																						<div id="mCSB_4_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
																						<!--Begin::Timeline 2 -->
																						<div class="m-timeline-2">
																							<div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
																								<div class="m-timeline-2__item">
																									<span class="m-timeline-2__item-time">
																										10:00
																									</span>
																									<div class="m-timeline-2__item-cricle">
																										<i class="fa fa-genderless m--font-danger"></i>
																									</div>
																									<div class="m-timeline-2__item-text  m--padding-top-5">
																										Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																										<br>
																										incididunt ut labore et dolore magna
																									</div>
																								</div>
																								<div class="m-timeline-2__item m--margin-top-30">
																									<span class="m-timeline-2__item-time">
																										12:45
																									</span>
																									<div class="m-timeline-2__item-cricle">
																										<i class="fa fa-genderless m--font-success"></i>
																									</div>
																									<div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
																										AEOL Meeting With
																									</div>
																									<div class="m-list-pics m-list-pics--sm m--padding-left-20">
																										<a href="../../#">
																											<img src="assets/app/media/img/users/100_4.jpg" title="" class="mCS_img_loaded">
																										</a>
																										<a href="../../#">
																											<img src="assets/app/media/img/users/100_13.jpg" title="" class="mCS_img_loaded">
																										</a>
																										<a href="../../#">
																											<img src="assets/app/media/img/users/100_11.jpg" title="" class="mCS_img_loaded">
																										</a>
																										<a href="../../#">
																											<img src="assets/app/media/img/users/100_14.jpg" title="" class="mCS_img_loaded">
																										</a>
																									</div>
																								</div>
																								<div class="m-timeline-2__item m--margin-top-30">
																									<span class="m-timeline-2__item-time">
																										14:00
																									</span>
																									<div class="m-timeline-2__item-cricle">
																										<i class="fa fa-genderless m--font-brand"></i>
																									</div>
																									<div class="m-timeline-2__item-text m--padding-top-5">
																										Make Deposit
																										<a href="#" class="m-link m-link--brand m--font-bolder">
																											USD 700
																										</a>
																										To ESL.
																									</div>
																								</div>
																								<div class="m-timeline-2__item m--margin-top-30">
																									<span class="m-timeline-2__item-time">
																										16:00
																									</span>
																									<div class="m-timeline-2__item-cricle">
																										<i class="fa fa-genderless m--font-warning"></i>
																									</div>
																									<div class="m-timeline-2__item-text m--padding-top-5">
																										Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																										<br>
																										incididunt ut labore et dolore magna elit enim at minim
																										<br>
																										veniam quis nostrud
																									</div>
																								</div>
																								<div class="m-timeline-2__item m--margin-top-30">
																									<span class="m-timeline-2__item-time">
																										17:00
																									</span>
																									<div class="m-timeline-2__item-cricle">
																										<i class="fa fa-genderless m--font-info"></i>
																									</div>
																									<div class="m-timeline-2__item-text m--padding-top-5">
																										Placed a new order in
																										<a href="#" class="m-link m-link--brand m--font-bolder">
																											SIGNATURE MOBILE
																										</a>
																										marketplace.
																									</div>
																								</div>
																								<div class="m-timeline-2__item m--margin-top-30">
																									<span class="m-timeline-2__item-time">
																										16:00
																									</span>
																									<div class="m-timeline-2__item-cricle">
																										<i class="fa fa-genderless m--font-brand"></i>
																									</div>
																									<div class="m-timeline-2__item-text m--padding-top-5">
																										Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																										<br>
																										incididunt ut labore et dolore magna elit enim at minim
																										<br>
																										veniam quis nostrud
																									</div>
																								</div>
																								<div class="m-timeline-2__item m--margin-top-30">
																									<span class="m-timeline-2__item-time">
																										17:00
																									</span>
																									<div class="m-timeline-2__item-cricle">
																										<i class="fa fa-genderless m--font-danger"></i>
																									</div>
																									<div class="m-timeline-2__item-text m--padding-top-5">
																										Received a new feedback on
																										<a href="#" class="m-link m-link--brand m--font-bolder">
																											FinancePro App
																										</a>
																										product.
																									</div>
																								</div>
																							</div>
																						</div>
																						<!--End::Timeline 2 -->
																					</div></div><div id="mCSB_4_scrollbar_vertical" class="mCSB_scrollTools mCSB_4_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_4_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 193px; max-height: 360px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
																				</div>

															<div class="modal-footer col-lg-12" style="margin-top: 20px;">

																<div class="form-group col-lg-12">


																			<div class="m-widget19__stats">
																		<span class="m-widget19__number m--font-brand">
																			18
																		</span>
																		<span class="m-widget19__comment">
																			Comments
																		</span>
																	</div>


																<textarea class="col-lg-12" style="border: 1px solid burlywood;height: 160px;"></textarea>
															</div>

															</div>

															<button type="button" class="btn btn-primary" style="margin-left: 40px;">
																Thêm Mô Tả
															</button>
											</div>
										</div>
									</div>




								</div>
							</div>
						</div>
						<!--end::Modal-->









						<!--begin::Modal-->
												<div class="modal fade" id="m_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg" role="document">
														<div class="modal-content">
															<div class="modal-header">

																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">
																		&times;
																	</span>
																</button>
															</div>





															<div class="row m-row--no-padding m-row--col-separator-xl">
																	<div class="col-md-12 col-lg-12 col-xl-6">
																		<!--begin:: Widgets/Stats2-1 -->
																		<div class="m-widget1">
																				<div class="m-portlet__body">
																						<div class="m-widget19">

																							<div class="m-widget19__content">
																								<div class="m-widget19__header" style="margin: 0;">
																									<div class="m-widget19__user-img">
																										<img class="m-widget19__img" src="../../assets/app/media/img//users/user1.jpg" alt="">
																									</div>
																									<div class="m-widget19__info">
																										<span class="m-widget19__username">
																										<i class="la la-user" style="margin-left: 13px;"></i> Khách Hàng
																								  	</span>



																										<div class="col-lg-8">
																										<div class="dropdown bootstrap-select form-control m-bootstrap-select m_"><select class="form-control m-bootstrap-select m_selectpicker" data-size="4" tabindex="-98">
																											<option>
																												Mustard
																											</option>
																											<option>
																												Ketchup
																											</option>
																											<option>
																												Relish
																											</option>
																											<option>
																												Tent
																											</option>
																											<option>
																												Flashlight
																											</option>
																											<option>
																												Toilet Paper
																											</option>
																										</select><button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="button" title="Mustard" aria-expanded="false"><div class="filter-option"><div class="filter-option-inner">
																												Mustard
																											</div></div>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu" role="combobox" style="max-height: 166px; overflow: hidden; min-width: 293px; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);" x-placement="bottom-start"><div class="inner show" role="listbox" aria-expanded="false" tabindex="-1" style="max-height: 152px; overflow-y: auto;"><ul class="dropdown-menu inner show"><li class="selected active"><a role="option" class="dropdown-item selected active" aria-disabled="false" tabindex="0" aria-selected="true"><span class=" bs-ok-default check-mark"></span><span class="text">
																												Mustard
																											</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">
																												Ketchup
																											</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">
																												Relish
																											</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">
																												Tent
																											</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">
																												Flashlight
																											</span></a></li><li><a role="option" class="dropdown-item" aria-disabled="false" tabindex="0" aria-selected="false"><span class=" bs-ok-default check-mark"></span><span class="text">
																												Toilet Paper
																											</span></a></li></ul></div></div></div>
																									</div>



																									</br>

																										<span class="m-widget19__time">
																										<i class="la la-user"></i>  Lê Văn Võ
																										</span>

																										<span class="m-widget19__time" style="margin-top: 28px;">
																										<i class="la la-phone"></i>   +84998897812
																								  	</span>

																										<span class="m-widget19__time" style="margin-top: 28px;">
																										<i class="la la-mail-forward"></i>   AnnaKrox@gmail.com
																								  	</span>


																									</div>

																								</div>

																							</div>




																			<div class="m-widget19__action"  style="margin: 10px 60px;">
																				<button  type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">
																					<span><a href=""><span style="color: black;">Xem Chi Tiết </span></a>	</span>
																				</button>
																			</div>
																				<div class="modal-footer" style="margin-right: 55px;">
																							</div>
																					<div class="m-widget19">

																						<div class="m-widget19__content">
																							<div class="m-widget19__header" style="margin: 0;">
																								<div class="m-widget19__user-img">
																									<img class="m-widget19__img" src="../../assets/app/media/img//users/user1.jpg" alt="">
																								</div>
																								<div class="m-widget19__info">
																									<span class="m-widget19__username">
																									<i class="la la-user"></i> Người Phụ Trách
																									</span></br>

																									<span class="m-widget19__time">
																									<i class="la la-user"></i>  Lê Văn Võ
																									</span>


																									<span class="m-widget19__time" style="margin-top: 28px;">
																									<i class="la la-phone"></i>   +84998897812
																									</span>

																									<span class="m-widget19__time" style="margin-top: 28px;">
																									<i class="la la-mail-forward"></i>   AnnaKrox@gmail.com
																									</span>

																								</div>

																							</div>

																						</div>

																</div>

																<form class="m-form m-form--fit m-form--label-align-right" >
																	<div class="m-portlet__body" >


																		<div class="form-group m-form__group row has-danger">
																			<span  style="margin-top: 28px;margin-left: 20px;margin-bottom: 20px;">
																			<i class="la la-user"></i>  Thêm Người Chăm Sóc Khách
																			</span>

																			<div class="col-lg-12" >
																				<select class="form-control m-select2 select2-hidden-accessible" id="m_select2_3_validate" name="param" multiple="" style="width: 250px;" >

																					<optgroup label="Alaskan/Hawaiian Time Zone" ata-select2-id="85">
																						<option value="AK" data-select2-id="86">
																							Alaska
																						</option>
																						<option value="HI" data-select2-id="87">
																							Hawaii
																						</option>
																					</optgroup>


																					<optgroup label="Pacific Time Zone" data-select2-id="88">
																						<option value="CA" data-select2-id="89">
																							California
																						</option>
																						<option value="NV" data-select2-id="90">
																							Nevada
																						</option>
																						<option value="OR" data-select2-id="91">
																							Oregon
																						</option>
																						<option value="WA" data-select2-id="92">
																							Washington
																						</option>
																					</optgroup>


																					<optgroup label="Mountain Time Zone" data-select2-id="93">
																						<option value="AZ" data-select2-id="94">
																							Arizona
																						</option>
																						<option value="CO" data-select2-id="95">
																							Colorado
																						</option>
																						<option value="ID" data-select2-id="96">
																							Idaho
																						</option>
																						<option value="MT" data-select2-id="97">
																							Montana
																						</option>
																						<option value="NE" data-select2-id="98">
																							Nebraska
																						</option>
																						<option value="NM" data-select2-id="99">
																							New Mexico
																						</option>
																						<option value="ND" data-select2-id="100">
																							North Dakota
																						</option>
																						<option value="UT" data-select2-id="101">
																							Utah
																						</option>
																						<option value="WY" data-select2-id="102">
																							Wyoming
																						</option>
																					</optgroup>


																					<optgroup label="Central Time Zone" data-select2-id="103">
																						<option value="AL" data-select2-id="104">
																							Alabama
																						</option>
																						<option value="AR" data-select2-id="105">
																							Arkansas
																						</option>
																						<option value="IL" data-select2-id="106">
																							Illinois
																						</option>
																						<option value="IA" data-select2-id="107">
																							Iowa
																						</option>
																						<option value="KS" data-select2-id="108">
																							Kansas
																						</option>
																						<option value="KY" data-select2-id="109">
																							Kentucky
																						</option>
																						<option value="LA" data-select2-id="110">
																							Louisiana
																						</option>
																						<option value="MN" data-select2-id="111">
																							Minnesota
																						</option>
																						<option value="MS" data-select2-id="112">
																							Mississippi
																						</option>
																						<option value="MO" data-select2-id="113">
																							Missouri
																						</option>
																						<option value="OK" data-select2-id="114">
																							Oklahoma
																						</option>
																						<option value="SD" data-select2-id="115">
																							South Dakota
																						</option>
																						<option value="TX" data-select2-id="116">
																							Texas
																						</option>
																						<option value="TN" data-select2-id="117">
																							Tennessee
																						</option>
																						<option value="WI" data-select2-id="118">
																							Wisconsin
																						</option>
																					</optgroup>


																					<optgroup label="Eastern Time Zone" data-select2-id="119">
																						<option value="CT" data-select2-id="120">
																							Connecticut
																						</option>
																						<option value="DE" data-select2-id="121">
																							Delaware
																						</option>
																						<option value="FL" data-select2-id="122">
																							Florida
																						</option>
																						<option value="GA" data-select2-id="123">
																							Georgia
																						</option>
																						<option value="IN" data-select2-id="124">
																							Indiana
																						</option>
																						<option value="ME" data-select2-id="125">
																							Maine
																						</option>
																						<option value="MD" data-select2-id="126">
																							Maryland
																						</option>
																						<option value="MA" data-select2-id="127">
																							Massachusetts
																						</option>
																						<option value="MI" data-select2-id="128">
																							Michigan
																						</option>
																						<option value="NH" data-select2-id="129">
																							New Hampshire
																						</option>
																						<option value="NJ" data-select2-id="130">
																							New Jersey
																						</option>
																						<option value="NY" data-select2-id="131">
																							New York
																						</option>
																						<option value="NC" data-select2-id="132">
																							North Carolina
																						</option>
																						<option value="OH" data-select2-id="133">
																							Ohio
																						</option>
																						<option value="PA" data-select2-id="134">
																							Pennsylvania
																						</option>
																						<option value="RI" data-select2-id="135">
																							Rhode Island
																						</option>
																						<option value="SC" data-select2-id="136">
																							South Carolina
																						</option>
																						<option value="VT" data-select2-id="137">
																							Vermont
																						</option>
																						<option value="VA" data-select2-id="138">
																							Virginia
																						</option>
																						<option value="WV" data-select2-id="139">
																							West Virginia
																						</option>
																					</optgroup>



																				</select>

																				<span class="select2 select2-container select2-container--default select2-container--focus " dir="ltr"  style="width: 292.983px;" > </span>

																			</div>
																		</div>
																	</div>

																</form>
															</div>
														</div>
													</div>
																											<!--end:: Widgets/Stats2-1 -->
											</div>


																	<div class="col-md-12 col-lg-12 col-xl-6">
																		<!--begin:: Widgets/Stats2-2 -->
																		<div class="m-widget1">
																			<div class="m-widget1__item">
																				<div class="row m-row--no-padding align-items-center">
																					<div class="m-portlet__body" style="width:100%;">
																														<div class="m-scrollable mCustomScrollbar _mCS_5 mCS-autoHide _mCS_4" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200" style="overflow: visible; height: 200px; max-height: 200px; position: relative;">
																															<div id="mCSB_4" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0">
																															<div id="mCSB_4_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
																															<!--Begin::Timeline 2 -->
																															<div class="m-timeline-2">
																																<div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">



																																	<div class="m-timeline-2__item">
																																		<span class="m-timeline-2__item-time">
																																			10:00
																																		</span>
																																		<div class="m-timeline-2__item-cricle">
																																			<i class="fa fa-genderless m--font-danger"></i>
																																		</div>
																																		<div class="m-timeline-2__item-text  m--padding-top-5">
																																			Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																																			<br>
																																			incididunt ut labore et dolore magna
																																		</div>
																																	</div>



																																	<div class="m-timeline-2__item m--margin-top-30">
																																		<span class="m-timeline-2__item-time">
																																			12:45
																																		</span>
																																		<div class="m-timeline-2__item-cricle">
																																			<i class="fa fa-genderless m--font-success"></i>
																																		</div>
																																		<div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
																																			AEOL Meeting With
																																		</div>
																																		<div class="m-list-pics m-list-pics--sm m--padding-left-20">
																																			<a href="../../#">
																																				<img src="assets/app/media/img/users/100_4.jpg" title="" class="mCS_img_loaded">
																																			</a>
																																			<a href="../../#">
																																				<img src="assets/app/media/img/users/100_13.jpg" title="" class="mCS_img_loaded">
																																			</a>
																																			<a href="../../#">
																																				<img src="assets/app/media/img/users/100_11.jpg" title="" class="mCS_img_loaded">
																																			</a>
																																			<a href="../../#">
																																				<img src="assets/app/media/img/users/100_14.jpg" title="" class="mCS_img_loaded">
																																			</a>
																																		</div>
																																	</div>


																																	<div class="m-timeline-2__item m--margin-top-30">
																																		<span class="m-timeline-2__item-time">
																																			14:00
																																		</span>
																																		<div class="m-timeline-2__item-cricle">
																																			<i class="fa fa-genderless m--font-brand"></i>
																																		</div>
																																		<div class="m-timeline-2__item-text m--padding-top-5">
																																			Make Deposit
																																			<a href="#" class="m-link m-link--brand m--font-bolder">
																																				USD 700
																																			</a>
																																			To ESL.
																																		</div>
																																	</div>


																																	<div class="m-timeline-2__item m--margin-top-30">
																																		<span class="m-timeline-2__item-time">
																																			16:00
																																		</span>
																																		<div class="m-timeline-2__item-cricle">
																																			<i class="fa fa-genderless m--font-warning"></i>
																																		</div>
																																		<div class="m-timeline-2__item-text m--padding-top-5">
																																			Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																																			<br>
																																			incididunt ut labore et dolore magna elit enim at minim
																																			<br>
																																			veniam quis nostrud
																																		</div>
																																	</div>



																																	<div class="m-timeline-2__item m--margin-top-30">
																																		<span class="m-timeline-2__item-time">
																																			17:00
																																		</span>
																																		<div class="m-timeline-2__item-cricle">
																																			<i class="fa fa-genderless m--font-info"></i>
																																		</div>
																																		<div class="m-timeline-2__item-text m--padding-top-5">
																																			Placed a new order in
																																			<a href="#" class="m-link m-link--brand m--font-bolder">
																																				SIGNATURE MOBILE
																																			</a>
																																			marketplace.
																																		</div>
																																	</div>



																																	<div class="m-timeline-2__item m--margin-top-30">
																																		<span class="m-timeline-2__item-time">
																																			16:00
																																		</span>
																																		<div class="m-timeline-2__item-cricle">
																																			<i class="fa fa-genderless m--font-brand"></i>
																																		</div>
																																		<div class="m-timeline-2__item-text m--padding-top-5">
																																			Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
																																			<br>
																																			incididunt ut labore et dolore magna elit enim at minim
																																			<br>
																																			veniam quis nostrud
																																		</div>
																																	</div>


																																	<div class="m-timeline-2__item m--margin-top-30">
																																		<span class="m-timeline-2__item-time">
																																			17:00
																																		</span>
																																		<div class="m-timeline-2__item-cricle">
																																			<i class="fa fa-genderless m--font-danger"></i>
																																		</div>
																																		<div class="m-timeline-2__item-text m--padding-top-5">
																																			Received a new feedback on
																																			<a href="#" class="m-link m-link--brand m--font-bolder">
																																				FinancePro App
																																			</a>
																																			product.
																																		</div>
																																	</div>



																																</div>
																															</div>
																															<!--End::Timeline 2 -->
																														</div></div><div id="mCSB_4_scrollbar_vertical" class="mCSB_scrollTools mCSB_4_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_4_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 193px; max-height: 360px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
																													</div>

																													<div class="modal-footer col-lg-12" style="margin-top: 20px;">

																											<div class="form-group col-lg-12">


																												<div class="m-widget19__stats">
																											<span class="m-widget19__number m--font-brand">
																												18
																											</span>
																											<span class="m-widget19__comment">
																												Comments
																											</span>
																										</div>


																									<textarea class="col-lg-12" style="border: 1px solid burlywood;height: 160px;"></textarea>
																								</div>

																								</div>

																								<button type="button" class="btn btn-primary" style="margin-left: 40px;">
																									Send message
																								</button>
																				</div>
																			</div>
																		</div>
																		<!--begin:: Widgets/Stats2-2 -->
																	</div>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

@endsection


@push('scripts')

<script type="text/javascript">
// let elements = document.getElementsByClassName('getTitle')
//                 let input = document.getElementById('change_value')
//                     Array.from(elements).forEach(a => {
//                         a.addEventListener('click', (el) => {
//                         input.value = el.target.title
//                     })
//                 })

		$(document).ready(function(){
		  $('.send-btn').click(function(){
				  var RecordID = $(this).data("id");
					    $.ajax({
					      url: 'login',
					      type: "get",

					      data: {'id':RecordID, '_token': $('input[name=_token]').val(),'_method': 'get'},
					      success: function(data){
					      	console.log(RecordID);
					        alert(RecordID);
					      }
				    });
				  });
				});


</script>

@endpush
