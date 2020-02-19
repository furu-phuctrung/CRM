
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
                            Đang Sử Dụng
                          </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                          <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab" aria-selected="false">
                            Benned
                          </a>
                        </li>
                      </ul>
                      <ul class="m-portlet__nav">
                        <div class="m-portlet__nav-item">
                            <a href="{{ route('addusers')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"><span><i class="la la-user-plus"></i><span> Thêm Người Dùng Mới </span></span></a>
                          </div>
                      </ul>


                    </div>
            </div>

                    <div class="tab-content">
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
                              <div class="tab-pane active show" id="m_user_profile_tab_1">
                                <div class="row">


                                  <div class="col-xl-12">
                                      <div class="m-portlet__body">

                                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        							<div class="row align-items-center">

                                            <!-- <div class="col-lg-6">
                                              <form class="m-form m-form--fit m-form--label-align-right" action="{{route('adddepartment')}}" method="POST">
                                                  <div class="form-group m-form__group row align-items-center">
                        														<div class="col-lg-8">
                        															<div class="m-input-icon m-input-icon--left">
                        														<input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                        														<span class="m-input-icon__icon m-input-icon__icon--left">
                        															<span>
                        																<i class="la la-search"></i>
                        															</span>
                        														</span>
                        													</div>
                        												</div>
                                                <div class="col-lg-4">
                                                      <button class="btn btn-success">
                                                        search
                                                      </button>
                                                </div>
                        											</div>
                                            </form>
                        									</div>

                                            <div class="col-lg-6">
                                              <form class="m-form m-form--fit m-form--label-align-right" action="{{route('adddepartment')}}" method="POST">
                                              <div class="form-group m-form__group row">
                                                  <div class="col-lg-8 ">
                                                    <div class="form-group m-form__group">
                                                      <select class="form-control m-input" name="parent" >
                                                          @foreach($department as $departments)
                                                          <option value="{{ $departments->id }}">-- {{ $departments->name}} --</option>
                                                          @endforeach
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                      <button class="btn btn-success">
                                                        search
                                                      </button>
                                                </div>
                                              </div>
                                              </form>
                                            </div> -->

                    									  </div>
                    								</div>


                                        <!--begin: Datatable -->
                                        <div class="m_datatable m-datatable m-datatable--default m-datatable--brand m-datatable--subtable m-datatable--loaded" id="child_data_local" style="">
                                         <table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
                                            <thead class="m-datatable__head">

                                               <tr class="m-datatable__row">
                                                 <th data-field="edit" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 35px;"></span></th>
                                                  <th data-field="Company" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 250px;">Họ và tên</span></th>
                                                  <th data-field="Email" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 250px;">Email</span></th>
                                                  <th data-field="Phone" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 300px;">Phòng ban</span></th>
                                                  <th data-field="Status" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 280px;">Sửa / Khoá Quyền Sử Dụng</span></th>
                                                  <th data-field="Status" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 250px;">Đăng nhập cuối</span></th>
                                               </tr>

                                            </thead>

                                            <tbody style="" class="m-datatable__body">
                                                @foreach($user as $users)
                                               <tr style="border-bottom: 1px solid #e8e8e8;" data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded m-datatable__row--hover">
                                                 <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 35px;">{{ $users->iduser }}</span></td>
                                                  <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell"><span style="width: 250px;">{{ $users->fullname }}</span></td>
                                                  <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell"><span style="width: 250px;">{{ $users->email }}</span></td>
                                                  <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell"><span style="width: 250px;">{{ $users->department_name }}</span></td>
                                                  <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell"><span style="width: 250px;text-align: center;">
                                                    <span>
																											<span style="overflow: visible; position: relative;padding: 20px;"><a href="{{route('edituser',$users->iduser )}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" style="background: #96f9f4;"><i class="la la-wrench "></i></a></span>
																											<span style="overflow: visible; position: relative;"><a href="{{route('banned',$users->iduser )}}" class="btn btn-sm btn-danger" style="background: #ff9104;"><i class="la la-lock"></i></a></span>
																										</span>

                                                  </span></td>
                                                  <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell"><span style="width: 250px;text-align: center;">{{ $users->updated_at }}</span></td>
                                                  </td>
                                               </tr>
                                                  @endforeach
                                            </tbody>
                                         </table>

                                         <!-- <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
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
                                         </div> -->

                                       </div>

                                        <!--end: Datatable -->
                                      </div>
                                  </div>

                        </div>
                      </div>




                              <div class="tab-pane" id="m_user_profile_tab_2">
                                      <div class="row">
                                        <div class="col-xl-12">
                                            <div class="m-portlet__body">
                                              <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                  							<div class="row align-items-center">


                              									  </div>
                              								</div>
                                              <!--begin: Datatable -->
                                              <div class="m_datatable m-datatable m-datatable--default m-datatable--brand m-datatable--subtable m-datatable--loaded" id="child_data_local" style="">
                                               <table class="m-datatable__table" style="display: block; min-height: 300px; overflow-x: auto;">
                                                  <thead class="m-datatable__head">
                                                     <tr class="m-datatable__row">
                                                       <th data-field="edit" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 35px;"></span></th>
                                                        <th data-field="Company" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 250px;">Họ và tên</span></th>
                                                        <th data-field="Email" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 250px;">Email</span></th>
                                                        <th data-field="Status" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 250px;">Mở Khoá Quyền Sử Dụng</span></th>
                                                        <th data-field="Status" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 250px;">Đăng nhập cuối</span></th>
                                                     </tr>
                                                  </thead>
                                                  <tbody style="" class="m-datatable__body">
                                                    @foreach($userbanned as $userbanneds)
                                                    <tr style="border-bottom: 1px solid #e8e8e8;" data-row="0" class="m-datatable__row m-datatable__row--even m-datatable__row--subtable-expanded m-datatable__row--hover">
                                                      <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell--sorted m-datatable__cell"><span style="width: 35px;">{{ $userbanneds->id }}</span></td>
                                                       <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell"><span style="width: 250px;">{{ $userbanneds->username}}</span></td>
                                                       <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell"><span style="width: 250px;">{{ $userbanneds->email}}</span></td>
                                                       <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell"><span style="width: 250px;text-align: center;">
                                                         <span>
                                                           <span style="overflow: visible; position: relative;"><a href="{{route('activeuser',$userbanneds->id )}}" class="btn btn-sm btn-danger" style="background: #70dbe6;border: 1px solid black;"><i class="la la-unlock-alt"></i></a></span>
                                                         </span>

                                                       </span></td>
                                                       <td style="border-left: 1px solid #d7d7d7;" class="m-datatable__cell"><span style="width: 250px;text-align: center;">{{ $userbanneds->updated_at}}</span></td>
                                                       </td>
                                                    </tr>

                                                     @endforeach
                                                  </tbody>
                                               </table>
                                               <!-- <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
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
                                               </div> -->

                                             </div>

                                              <!--end: Datatable -->
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
            </div>


@endsection
