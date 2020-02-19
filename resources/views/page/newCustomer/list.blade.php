
@extends('layouts.homemaster')

@section('content')

@include('page.newCustomer.modalUploadNewCustomer')
@include('page.newCustomer.modalShareNewCustomer')

<!--Begin::Section-->
<div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <div class="m-portlet__nav-item">
						<a class="btn btn-info" data-toggle="modal" id="btn-modalShareNewCustomer" data-target="#modalShareNewCustomer"><span><i class="fa fa-share-square"></i><span> Chia khách hàng </span></span></a>
						<a class="btn btn-success" data-toggle="modal" data-target="#uploadkhach"><span><i class="la la-user-plus"></i><span> Upload Khách Hàng </span></span></a>
					</div>
                </ul>
            </div>
        </div>
		<div class="m-portlet__body">
			{{-- @include('page.newCustomer.searchBox') --}}

			<div id="listCustomer">
				<table class="table table-ordered">
					<thead>
						<tr>
							<th>
								<label class="m-checkbox m-checkbox--single m-checkbox--all m-checkbox--solid m-checkbox--brand ">
									<input type="checkbox" id="selectAllCustomer"><span></span>
								</label>
							</th>
							<th class=""><span>Họ Tên</span></th>
							<th class=""><span>Phone</span></th>
							<th class=""><span>Email</span></th>
							<th class=""><span>Dự án</span></th>
							<th class=""><span>Mô tả</span></th>
							<th class=""><span>Nguồn khách</span></th>
							<th>Người thêm</th>
							<th>Ngày thêm</th>
						</tr>
					</thead>

					<tbody>
						@foreach($items as $item)
							<tr style="border-bottom: 1px solid #f0f3ff;">
								<td>
									<label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
										<input class="selectCustomer" type="checkbox" dataId="{{$item->id}}"><span></span>
									</label>
								</td>
								<td class="text-left">{{$item->customer_name}}</td>
								<td class="text-left">{{$item->phone}}</td>
								<td class="text-left">{{$item->email}}</td>
								<td class="text-left">{{$item->duan}}</td>
								<td class="text-left">{{$item->note}}</td>
								<td class="text-left">{{$item->customer_resources}}</td>
								<td>{{$item->userAdd->username}}</td>
								<td>{{$item->created_at}}</td>
							</tr>
						@endforeach
					</tbody>



				</table>

				<div class="paginate">
					{{ $items->links() }}
				</div>

			</div>
		</div>
	</div>
</div>

<!--Begin::Section-->
<div class="m-content">
    <div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__body">
			<div id="listCustomer">
				<table class="table table-ordered">
					<thead>
						<tr>
							<th class=""><span>Họ Tên</span></th>
							<th class=""><span>Phone</span></th>
							<th class=""><span>Dữ Liệu</span></th>
							<th>Ngày Phát hiện</th>
						</tr>
					</thead>

					<tbody>
						@foreach($customererror as $customererrors)
							<tr style="border-bottom: 1px solid #f0f3ff;">
								<td class="text-left">{{$customererrors->customer_name}}</td>
								<td class="text-left">{{$customererrors->phone}}</td>
								<td class="text-left">{!! $customererrors->error_status !!}</td>
								<td>{{$customererrors->created_at}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>



@endsection


@push('scripts')

<script type="text/javascript">
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
			var userShare = $("#selectUserShare").val();
			if(!userShare){
				alert("Bạn chưa chọn nhân viên");
				return;
			}

			if(listCustomerSelected.length > 0 ){
				saving();
				$.ajax({
					url: "{{route('listcustomernew.shareCustomer')}}",
					method: "POST",
					dataType: "json",
					data: {
						'_token': '{{ csrf_token() }}',
						'_method': 'post',
						'userShare' : userShare,
						'listShare': listCustomerSelected
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
