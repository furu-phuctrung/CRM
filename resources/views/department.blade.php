
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
                          Quản Lý Phòng Ban
                          </a>
                        </li>





                      </ul>
                      <ul class="m-portlet__nav">
                        <div class="m-portlet__nav-item">
                            <a href="{{ route('adddepartment')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"><span><i class="la la-user-plus"></i><span> Thêm Phòng Ban </span></span></a>
                          </div>
                      </ul>


                    </div>

            </div>



                    	<div class="tab-content">

                              <div class="tab-pane active show" id="m_user_profile_tab_1">
                                <div class="row">
                                  <div class="col-xl-12">
                                      <div class="m-portlet__body">

																				<div id="chart"/>

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
@push('scripts')
<script>
$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "https://crm.longdienland.com/phong-ban",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        cache: false,
        success: function(data) {
          var chart = new OrgChart(document.getElementById("chart"), {
              scaleInitial: 0.5,
    					nodeBinding: {
    							field_0: "name"
    					},
              'nodes' : data
    			});
        }})
      });
</script>

@endpush
