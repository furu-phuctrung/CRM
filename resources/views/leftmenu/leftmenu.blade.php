<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
  <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " data-menu-vertical="true" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="font-family: initial;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">


      @if(Auth::user()->havePermission('ViewallCustomer'))

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
              <a  href="{{ route('customerall')}}" class="m-menu__link">
                <i class="m-menu__link-icon flaticon-users"></i>
                <span class="m-menu__link-text">
                  Quản Lý Tất Cả Khách
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                      <a  href="{{ route('customerall')}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="m-menu__link-text">
                        Quản Lý Tất Cả Khách
                        </span>
                      </a>
                    </li>
                    @foreach($mqh as $mqhs)
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                      <a  href="{{route('viewstatusmanager',['id'=> $mqhs->id])}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="m-menu__link-text">
                          <span class="m-badge  m-badge--success m-badge--wide" style="font-size: 12px;background-color: {{ $mqhs->color }} ; ">DS {{ $mqhs->name }}</span>
                        </span>
                      </a>
                    </li>
                    @endforeach
                  </ul>
              </div>
            </li>

              @elseif(Auth::user()->havePermission('Viewallcustomerdepartment') && Auth::user()->havePermission('ViewallCustomer') === false)

              <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                <a  href="{{ route('customerdepartment')}}" class="m-menu__link">
                  <i class="m-menu__link-icon  flaticon-user-settings"></i>
                  <span class="m-menu__link-text">
                    Quản Lý Khách Phòng
                  </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                  <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                      <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                        <a  href="{{ route('customerdepartment')}}" class="m-menu__link ">
                          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="m-menu__link-text">
                          Quản Lý Khách Phòng
                          </span>
                        </a>
                      </li>
                      @foreach($mqh as $mqhs)
                      <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                        <a  href="{{route('viewstatusdepartment',['id'=> $mqhs->id])}}" class="m-menu__link ">
                          <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                            <span></span>
                          </i>
                          <span class="m-menu__link-text">
                            <span class="m-badge  m-badge--success m-badge--wide" style="font-size: 12px;background-color: {{ $mqhs->color }} ; ">DS {{ $mqhs->name }}</span>
                          </span>
                        </a>
                      </li>
                      @endforeach
                    </ul>
                </div>
              </li>

              @endif

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
              <a  href="/" class="m-menu__link">
                <i class="m-menu__link-icon   flaticon-user-ok "></i>
                <span class="m-menu__link-text">
                  Khách Hàng
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                      <a  href="/" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="m-menu__link-text">
                          DS Khách Hàng
                        </span>
                      </a>
                    </li>
                    @foreach($mqh as $mqhs)
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                      <a  href="{{route('viewstatus',['id'=> $mqhs->id])}}" class="m-menu__link ">
                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                          <span></span>
                        </i>
                        <span class="m-menu__link-text">
                          <span class="m-badge  m-badge--success m-badge--wide" style="font-size: 12px;background-color: {{ $mqhs->color }} ; ">DS {{ $mqhs->name }}</span>
                        </span>
                      </a>
                    </li>
                    @endforeach
                  </ul>
              </div>
            </li>



      @if(Auth::user()->havePermission('WiewSetting'))
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
              <i class="m-menu__link-icon flaticon-settings-1"></i>
              <span class="m-menu__link-title">
                <span class="m-menu__link-wrap">
                  <span class="m-menu__link-text">
                    SETTING
                  </span>
                </span>
              </span>
              <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
              <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  m-menu-link-redirect="1">
                  <span class="m-menu__link">
                    <span class="m-menu__link-title">
                      <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">
                          SETTING
                        </span>
                      </span>
                    </span>
                  </span>
                </li>



                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                  <a  href="{{route('setting')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                      CẤU HÌNH CHUNG
                    </span>
                  </a>
                </li>

                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                  <a  href="{{route('permission.user.getList')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                    QUYỀN NGƯỜI DÙNG
                    </span>
                  </a>
                </li>

                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                  <a  href="{{route('permission.permissionGroup.getList')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                    QUYỀN NHÓM
                    </span>
                  </a>
                </li>

                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                  <a  href="{{route('settingcrm')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                    CÀI ĐẶT CRM
                    </span>
                  </a>
                </li>

                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                  <a  href="{{route('department')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                    QUÀN LÝ PHÒNG BAN
                    </span>
                  </a>
                </li>

                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                  <a  href="{{route('settingusers')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                    QUẢN LÝ NGƯỜI DÙNG
                    </span>
                  </a>
                </li>

                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                  <a  href="{{route('thongtincongty')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                     THÔNG TIN CÔNG TY
                    </span>
                  </a>
                </li>

                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                  <a  href="{{route('settinglogs')}}" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                    LOGS HỆ THỐNG
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
      @endif

      <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
        <a  href="/" class="m-menu__link">
          <i class="m-menu__link-icon  la la-info"></i>
          <span class="m-menu__link-text">
            Hướng Dẫn Sử Dụng
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
        </a>
        <div class="m-menu__submenu ">
          <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
              <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                <a  href="/" class="m-menu__link ">
                  <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                    <span></span>
                  </i>
                  <span class="m-menu__link-text">
                    Hướng Dẫn Sử Dụng
                  </span>
                </a>
              </li>

            </ul>
        </div>
      </li>



    </ul>
  </div>
</div>
