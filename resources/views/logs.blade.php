
@extends('layouts.homemaster')

@section('content')

<!--Begin::Section-->


<div class="m-content">
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__body">
								<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
									<div class="row align-items-center">

									<div class="col-lg-3">
										<div class="form-group m-form__group row align-items-center">
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



								<div class="col-lg-4">
									<div class="form-group m-form__group">
										<select class="form-control m-input" name="thanhpho" required>
												<option value="">---------</option>
										</select>
									</div>
									</div>


									<div class="col-lg-4">
										<div class="form-group m-form__group">
											<select class="form-control m-input" name="thanhpho" required>
													<option value="">---------</option>
											</select>
										</div>
										</div>
										<div class="col-lg-1" id="bts">
											<button class="btn m-btn m-btn--gradient-from-warning m-btn--gradient-to-danger" type="botton"> Search..</button>
										</div>
									</div>
								</div>

                  <div class="m_datatable m-datatable m-datatable--default m-datatable--brand m-datatable--subtable m-datatable--loaded" id="child_data_local" style="">
                   <table class="m-datatable__table" style="display: block; min-height: 300px;">
                  		<thead class="m-datatable__head">
                  			 <tr class="m-datatable__row">
													  <th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 35px;">ID</span></th>
														<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 500px;">Thao tác</span></th>
                  					<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 142px;">Địa chỉ IP</span></th>
                  					<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 130px;">Nhân viên</span></th>
                  					<th class="m-datatable__cell m-datatable__cell--sort"><span style="width: 125px;">Thời gian</span></th>
                  			 </tr>
                  		</thead>

											@foreach($log as $logs)
                  		<tbody style="" class="m-datatable__body">
                  			 <tr class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded m-datatable__row--hover" style="border-bottom: 1px solid #ddd;">
                  					<td class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 30px;">{{ $logs->id }}</span></td>
                  					<td class="m-datatable__cell"><span style="width: 500px;">{!! $logs->thaotac !!}</span></td>
                  					<td class="m-datatable__cell"><span style="width: 142px;">@if($logs->ip != null) {{ $logs->ip }} @else N/A @endif</span></td>
                  					<td class="m-datatable__cell"><span style="width: 109px;"><span class="m-badge">{{ $logs->nhanvien }}</span></span></span></td>
                  					<td class="m-datatable__cell"><span style="width: 144px;text-align: center;"><span class="m-badge m-badge--danger m-badge--dot"></span>{{ $logs->thoigian }}</span></td>
                  			 </tr>
                  		</tbody>
											@endforeach

                   </table>




               <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
              		<ul class="m-datatable__pager-nav">
              				{!! $log->render() !!}
              		</ul>

               </div>

              </div>

			<!--end: Datatable -->
		</div>
	</div>
</div>








@endsection
