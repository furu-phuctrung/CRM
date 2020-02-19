
@extends('layouts.homemaster')

@section('content')

<!--Begin::Section-->
@include('page.customer.modalUploadCustomer')

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
											<form action="{{route('searchcustomerdepartment')}}" method="POST">
												@csrf
											<div class="row align-items-center">
													<div class="col-lg-4">
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-5 col-form-label">
														Nhóm Khách Hàng
														</label>
														<div class="col-7">
															<select class="form-control m-input" name="nhomkhachhang" >
																		<option value="">-------------</option>
																		@foreach($customer_group as $customer_groups)
																			<option value="{{ $customer_groups->id }}">{{ $customer_groups->name }}</option>
																		@endforeach
															</select>
														</div>
													</div>
													</div>

													<div class="col-lg-4">
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-5 col-form-label">
														Người Phụ Trách
														</label>
														<div class="col-7">
															<select class="form-control m-input" name="nguoiphutrach" >
																		<option value="">-------------</option>
																		@foreach($userdepartment as $user)
																		<option value="{{ $user->id }}">{{ $user->username }}</option>
																		@endforeach
															</select>
														</div>
													</div>
												</div>

													<div class="col-lg-4">

														<div class="form-group m-form__group row align-items-center">
															<div class="col-lg-9">
																<div class="m-input-icon m-input-icon--left">
																	<input type="text" name="generalSearch" class="form-control m-input" placeholder="Số điện thoại" id="generalSearch">
																		<span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-search"></i></span></span>
																</div>
															</div>
															<div class="col-lg-1">
																<button class="bts btn m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger" type="submit"> Search..</button>
															</div>
														</div>


													</div>
												</div>
										</form>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<div class="m-portlet__nav-item">
											<div class="col-lg-12">
												<div class="row">
												<div class="col-lg-4">
												<a class="btn btn-info" data-toggle="modal" id="btn-modalShareNewCustomer" data-target="#modalShareNewCustomer"><span><i class="fa fa-share-square"></i><span> Chuyễn Khách  </span></span></a>
												</div>
											</div>
											</div>
											</div>
									</ul>
								</div>
				          	<div class="m_datatable m-datatable m-datatable--default m-datatable--brand m-datatable--subtable m-datatable--loaded" id="child_data_local" >
				              	<table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
				                  	 <thead class="m-datatable__head">
				                  			 <tr class="m-datatable__row">
																	 <th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 50px;" >#STT</span></th>
																	 <th class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check" ><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand "><input id="selectAllCustomer" type="checkbox"><span></span></label></span></th>
																	 <th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 35px;" ></span></th>
																		<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 200px;">Họ Tên</span></th>
																		<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 200px;">Phone</span></th>
																		<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 300px;">Mô Tả</span></th>
																		<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 200px;">Trạng Thái</span></th>
                                    <th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 200px;text-align: center;">Người Phụ Trach</span></th>
				                  					<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 200px;text-align: center;">Nhóm Khách</span></th>
				                  					<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 200px;text-align: center;">Nguồn Khách</span></th>
																		<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 190px;">Email</span></th>
																 </tr>
				                  		</thead>  
				                  		<tbody style="" class="m-datatable__body">
											@foreach($datas as $data)
												<tr data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded m-datatable__row--hover" style="border-bottom: 1px solid #f0f3ff;">
													<td class="m-datatable__cell"><span style="width: 50px;text-align: center;">{{ $loop->iteration + $datas->firstItem() - 1 }}</span></td>
													<td class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check" style="background-color: {{$data->color}} !important;"><span style="width: 50px;"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" class="selectCustomer" dataId="{{$data->ID}}" id="ID" value="{{$data->ID}}"><span></span></label></span></td>
													<td class="kt-datatable__cell--sorted kt-datatable__cell">
															<div class="m-widget19">
																			<div class="m-widget19__content" style="margin: 0;">
																				<div class="m-widget19__header" >
																					<div class="m-widget19__user-img customer">
																						<a href="#" customer-id="{{$data->ID}}" data-toggle="modal" data-target="#m_modal_4" title="Xem Thông Tin Trao Đổi">
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
													<td class="m-datatable__cell--sorted m-datatable__cell" data-field="FirstName"><span style="width: 200px;"><a href="https://crm.longdienland.com/customer/{{$data->ID}}" title="Edit Customer details">{{ $data->customer_name}}</span></td>
														<td class="m-datatable__cell"><span style="width: 200px;">{{$data->phone}}</span></td>
														<td class="m-datatable__cell"><span style="overflow: visible; position: relative; width: 300px;">
															<input class="inputNote-old" type="hidden" value="{{$data->note}}" />
															<textarea class="form-control m-input m-input--air inputNote" data-id="{{$data->ID}}" style="width: 300px; height: 54px;">{{$data->note}}</textarea>
															<div class="inputNoteResult"></div>
														</td>
														<td class="m-datatable__cell">
															<span style="width: 200px;text-align: center;">
																<input name="idcustomer_change_relation_ship" value="{{$data->ID}}" type="hidden" />
																		<select  class="form-control m-input moiquanhe" name="moiquanhe">
																						<option value="{{$data->id}}">{{$data->name}}</option>
																				@foreach($relation as $relations)
																						@if($relations->name != $data->name )
																							<option value="{{ $relations->id }}">{{ $relations->name }}</option>
																						@endif
																				@endforeach
																			</select>
															</span>
														</td>

                          <td class="m-datatable__cell"><span style="width: 200px;text-align: center;">{{$data->username}}</span></td>
													<td class="m-datatable__cell"><span style="width: 200px;text-align: center;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">{{$data->duan}}</span></span></td>
													<td class="m-datatable__cell"><span style="width: 200px;text-align: center;"><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">@if($data->customer_resources != '' ){{$data->customer_resources}} @else N/A @endif</span></span></td>
													<td class="m-datatable__cell"><span style="width: 200px;">@if($data->email != '' ){{$data->email}} @else N/A @endif</span></td>

												</tr>
											@endforeach




				                  		</tbody>
				                   </table>
					               <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
					              		<ul class="m-datatable__pager-nav">
					              						{{  $datas->links()  }}
					              		</ul>

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
																							<div id="comments" class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
																							</div>
																						</div>
																						<!--End::Timeline 2 -->
																					</div>
																				</div>
																				<div id="mCSB_4_scrollbar_vertical" class="mCSB_scrollTools mCSB_4_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;">
																					<div class="mCSB_draggerContainer">
																						<div id="mCSB_4_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 193px; max-height: 360px; top: 0px;">
																							<div class="mCSB_dragger_bar" style="line-height: 50px;">
																							</div>
																						</div>
																						<div class="mCSB_draggerRail">
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>

															<div class="modal-footer col-lg-12" style="margin-top: 20px;">
																<div class="postcomment">

																</div>
																<div class="userscomment">
																	<input type="hidden" name="usercomment" value="{{ Auth::user()->username }}" required>
																</div>
																<div class="form-group col-lg-12">
																			<div class="m-widget19__stats">
																		<span id="count" class="m-widget19__number m--font-brand">
																			0
																		</span>

																		<span class="m-widget19__comment">
																			Comments
																		</span>

																	</div>
																<textarea id="commentinput" class="col-lg-12" style="border: 1px solid burlywood;height: 160px;"></textarea>
															</div>
													</div>
													<button type="button" id="btn-them-trao-doi" type="submit" class="btn btn-primary btn-them-trao-doi" style="margin-left: 40px;">Thêm Trao Đổi</button>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!--end::Modal-->

						<div class="modal fade" id="modalShareNewCustomer" tabindex="-1" role="dialog" aria-labelledby="modalShareNewCustomer" style="display: none;" aria-hidden="true">
								<div class="modal-dialog" role="document">
										<div class="modal-content">
												<div class="modal-header">
														<h5 class="modal-title" id="modalShareNewCustomer">
																Chuyễn khách hàng
														</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">
																×
																</span>
														</button>
												</div>
												<div class="modal-body">
														<form class="m-form m-form--fit m-form--label-align-right">
																<div class="m-portlet__body">
																		<div class="form-group m-form__group">
																				<div>
																						<b>
																								Đã chọn <span id="countCustomer">0</span> khách hàng để Chuyễn
																						</b>
																				</div>
																				<hr/>
																				<label for="exampleSelect1">
																						Chọn Ngươi Cần Chuyễn Khách
																				</label>
																				<select class="form-control m-input m-input--square" id="selectUser">
																						<option value=""></option>
																						@foreach($userdepartment as $user)
																								<option value="{{$user->id}}">{{$user->username}} </option>
																						@endforeach
																				</select>
																		</div>
																</div>
																<div class="m-portlet__foot m-portlet__foot--fit">
																		<div class="m-form__actions text-center">
																				<button type="button" class="btn btn-primary" id="btn-chiaKhach">
																						Chuyễn khách
																				</button>
																				<span id="saving" style="display:none;">Đang lưu...</span>
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
		</div>
	</div>

@endsection

@push('css')
    <style>
        	@media(max-width:769px)
					{
						.bts
						{
							width:100%
						}
					}
    </style>
@endpush
@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('.customer a').click(function(){
			$("#comments").html('<img src="https://media3.giphy.com/media/l0Iy29zHAcTFJ7jXO/giphy.webp?cid=790b761123320c974489f41fb79cf3eb0ea76133ef474c62&rid=giphy.webp" style="width: 700px;height: 100px;z-index: 99999;position: fixed;padding: 0;" alt="loading">');
				$("#count").html('Loading....');
					$.ajaxSetup({
		    	headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
					var customerid = $(this).attr('customer-id');
					$.ajax({
							type: "POST",
							url: "https://crm.longdienland.com/get-comment",
							data: {RecordID:$(this).attr('customer-id')},
							dataType: "JSON",
							cache: false,
							success: function(comment) {
									var a = "";
									comment.sort(function(a, b){return b-a});
									$.each(comment, function(comment, c) {
											a += '<div class="m-timeline-2__item" style="color: #271e8f;padding-top: 5px;padding-bottom: 17px;font-size: 15px;"><div class="m-timeline-2__item-cricle"><i class="fa fa-genderless m--font-danger"></i></div><div class="m-timeline-2__item-text  m--padding-top-5 "><a href="#" class="m-link m-link--brand m--font-bolder">' + c.username + '<span style="padding: 30px;color: red;">' + c.created_at + '</span></a><br><span style="color: #271e8f;">' + c.comment + '</span></div></div>'
									}),
									$("#comments").html(a),
									$("#count").html(comment.length),
									$(".postcomment").html('<input type="hidden" name="idpostcomment" value="'+ customerid +'" idpostcomment="'+ customerid +'" required>');
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
									alert("some error");
							}
						})
					});
				});

	$(document).ready(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$(".btn-them-trao-doi").click(function(e){
			e.preventDefault();
			var btn = document.getElementById('btn-them-trao-doi');
			btn.disabled = true;
			btn.innerText = 'Sending.....';
			var id = $("input[name=idpostcomment]").val();
			var comment = $('#commentinput').val();
			var today = new Date();
			var user = $("input[name=usercomment]").val();
			var datetime = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+' '+today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
			$.ajax({
				type:'POST',
				url:'https://crm.longdienland.com/post-comment',
				data:{id:id, comment:comment},
				success:function(data){
					$("#comments").prepend('<div class="m-timeline-2__item" style="color: #271e8f;padding-top: 5px;padding-bottom: 17px;font-size: 15px;"><div class="m-timeline-2__item-cricle"><i class="fa fa-genderless m--font-danger"></i></div><div class="m-timeline-2__item-text  m--padding-top-5 "><a href="#" class="m-link m-link--brand m--font-bolder">' + user + '<span style="padding: 30px;color: red;">' + datetime + '</span></a><br><span style="color: #271e8f;">' + comment + '</span></div></div>'),
					btn.disabled = false,
					btn.innerText = 'Thêm Trao Đổi',
					$("#count").html(data.length),
					alert('Thêm Thông Tin Trao Đổi Thành Công');
				},error: function(XMLHttpRequest, textStatus, errorThrown) {
							alert("some error");
				}
			});
		});

		$(".inputNote").change(function(){
			var textarea = $(this);
			var value = textarea.val();
			var message = textarea.next('.inputNoteResult');
			message.html('đang lưu...');

			$.ajax({
				type:'POST',
				url:"{{route('customer.postMota')}}",
				data:{
					id : textarea.attr('data-id'),
					note: value
				},
				success:function(data){
					data = JSON.parse(data);
					if(data.isSuccess){
						message.html('<span style="color:green;">'+data.message+'</span>');
					}else{
						message.html('<span style="color:red;">'+data.message+'</span>');
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					textarea.val(textarea.prev(".inputNote-old").val());
					message.html('<span style="color:red;">Không thể lưu</span>');
				}
			});
		});

		$("select.moiquanhe").change(function(){
			var moiquanhe = $('select.moiquanhe').val();
			var customerid = $("input[name=idcustomer_change_relation_ship]").val();
			$.ajax({
				type:'POST',
				url:"{{route('change_relation')}}",
				data:{
					customerid : customerid,
					moiquanhe: moiquanhe
				},
				success:function(data){
					if(data.isSuccess){
							 location.reload();
					}else{
						location.reload();
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert('error');
				}
			});
		});

	});





	var listCustomerSelected = [];
	updateCustomerCount();

	function saving(){
		$("#saving").show();
		$("#btn-chiaKhach").hide();
	}

	function unSaving(){
		$("#saving").hide();
		$("#btn-chiaKhach").show();
	}

	function updateCustomerCount(){
		if(listCustomerSelected.length > 0){
			$("#btn-chiaKhach").show();
		}else{
			$("#btn-chiaKhach").hide();
		}
		$("#countCustomer").html(listCustomerSelected.length);
	}

		$(document).ready(function(){
		$(".selectCustomer").change(function(){
			var dataId = $(this).attr('dataId');
			var indexOf = listCustomerSelected.indexOf(dataId);
			if($(this).is(":checked")){
				//add customer
				if(indexOf === -1){
					listCustomerSelected.push(dataId);
				}
			}else{
				//remove customer
				if(indexOf >= 0){
					listCustomerSelected.splice(indexOf, 1);
				}
			}
			updateCustomerCount();
		});
		$("#selectAllCustomer").change(function(){
			listCustomerSelected = [];
			var check = $(this).is(":checked");
			$(".selectCustomer").each(function(){
				$(this).prop("checked", check);
				if(check){
					listCustomerSelected.push($(this).attr('dataId'));
				}
				updateCustomerCount();
			});
		});
				$('#btn-chiaKhach').click(function(){
			var userchange = $("#selectUser").val();
			if(!userchange){
				alert("Bạn chưa chọn nhân viên");
				return;
			}

			if(listCustomerSelected.length > 0 ){
				saving();
				$.ajax({
					url: "{{route('postchangeusersowner')}}",
					method: "POST",
					dataType: "json",
					data: {
						'_token': '{{ csrf_token() }}',
						'_method': 'post',
						'userchange' : userchange,
						'listcustomerchange': listCustomerSelected
					}
				}).done(function( result ) {
					alert(result.message);
					if(result.isSuccess){
						location.reload();
					}else{
						unSaving();
					}
				});
			}else{
				alert("Bạn chưa chọn khách hàng");
			}
				});
		});

</script>

@endpush
