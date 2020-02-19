

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
		Hệ Thống Quản Lý Khách Hàng
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="{{ asset('/assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('/assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="{{ asset('/assets/demo/default/media/img/logo/favicon.ico')}}" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >




  	<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img src="{{ asset('/assets/app/media/img/logos/l.png')}}" style="height: 60px;">
							</a>
						</div>
						<div class="m-login__signin">
              <form method="POST" class="m-login__form m-form" action="{{ route('login') }}">
                  @csrf
								<div class="form-group m-form__group">
									<input class="form-control m-input  @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" name="email" autocomplete="email" autofocus>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
								</div>
								<div class="form-group m-form__group">

									<input class="form-control m-input m-login__form-input--last  @error('password') is-invalid @enderror" id="password" type="password" name="password" required placeholder="Password" autocomplete="current-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left m-login__form-left">
										<label class="m-checkbox  m-checkbox--focus">
											<input type="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
											Remember me
											<span></span>

										</label>
									</div>
                  @if (Route::has('password.request'))
                      <div class="col m--align-right m-login__form-right">
                        <a href="{{ route('password.request') }}" id="m_login_forget_password" class="m-link">
                          {{ __('Forgot Your Password?') }}
                        </a>
                      </div>
                  @endif
								</div>
								<div class="m-login__form-action">
									<button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
										Sign In
									</button>
								</div>
							</form>
						</div>





						<div class="m-login__signup">
							  <form method="POST" class="m-login__form m-form" action="{{ route('register') }}">
									@csrf
								<div class="form-group m-form__group">
									<input class="form-control m-input @error('name') is-invalid @enderror" type="text" placeholder="Tên Họ" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input @error('username') is-invalid @enderror" type="text" placeholder="Tên Tài khoản" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input @error('email') is-invalid @enderror" placeholder="Địa Chỉ Email" name="email" type="email"  value="{{ old('email') }}" required autocomplete="email">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input @error('password') is-invalid @enderror" type="password" placeholder="Mật Khẩu" name="password" required autocomplete="new-password">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Xác Nhận Lại Mật Khẩu" name="password_confirmation" required autocomplete="new-password">
								</div>
								<div class="row form-group m-form__group m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--focus">
											<input type="checkbox" name="agree">
											I Agree the
											<a href="#" class="m-link m-link--focus">
												terms and conditions
											</a>
											.
											<span></span>
										</label>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="m-login__form-action">
									<button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
										Sign Up
									</button>
									&nbsp;&nbsp;
									<button id="m_login_signup_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">
										Cancel
									</button>
								</div>
							</form>
						</div>





						<div class="m-login__forget-password">
							<div class="m-login__head">
								<h3 class="m-login__title">
									Forgotten Password ?
								</h3>
								<div class="m-login__desc">
									Enter your email to reset your password:
								</div>
							</div>
							<form class="m-login__form m-form" action="">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
								</div>
								<div class="m-login__form-action">
									<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">
										Request
									</button>
									&nbsp;&nbsp;
									<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">
										Cancel
									</button>
								</div>
							</form>
						</div>




						<div class="m-login__account">
							<span class="m-login__account-msg">
								Don't have an account yet ?
							</span>
							&nbsp;&nbsp;
							<a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">
								Sign Up
							</a>
						</div>



					</div>
				</div>
			</div>
		</div>
    </form>
		<script src="{{ asset('/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
		<script src="{{ asset('/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
		<script src="{{ asset('/assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>
	</body>
</html>
