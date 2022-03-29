<x-office-layout title="{{__('auth.title')}}">
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <a href="{{route('web.home')}}" class="mb-12">
            <img alt="Logo" src="{{asset('img/icon.png')}}" class="h-40px" />
        </a>
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <div id="login_page">
                <form class="form w-100" id="form_login">
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">{{config('app.name')}} Office</h1>
                        <div class="text-gray-400 fw-bold fs-4">{{ __('auth.new_here') }}
                        <a href="javascript:;" onclick="auth_content('register_page');" class="link-primary fw-bolder">{{ __('auth.create_an_account') }}</a></div>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" id="email_login" name="email" autocomplete="off" data-login="1" />
                    </div>
                    <div class="fv-row mb-10">
                        <div class="d-flex flex-stack mb-2">
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('field.password') }}</label>
                            <a href="javascript:;" onclick="auth_content('forgot_page');" class="link-primary fs-6 fw-bolder">{{ __('auth.forgot_password') }}</a>
                        </div>
                        <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" data-login="2" />
                    </div>
                    <div class="text-center">
                        <button id="tombol_login" onclick="handle_post('#tombol_login','#form_login','{{route('office.auth.login')}}','POST');" class="btn btn-lg btn-primary w-100 mb-5" data-login="3">
                            <span class="indicator-label">{{ __('button.continue') }}</span>
                            <span class="indicator-progress">{{ __('button.please_wait') }}...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <div class="text-center text-muted text-uppercase fw-bolder mb-5">{{ __('auth.or') }}</div>
                        <a href="javascript:;" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                            <img alt="Logo" src="{{asset('keenthemes/media/svg/brand-logos/google-icon.svg')}}" class="h-20px me-3" />{{ __('auth.continue_with_google') }}
                        </a>
                    </div>
                </form>
            </div>
            <div id="register_page" style="display:none;">
                <form class="form w-100" novalidate="novalidate" id="form_register">
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">{{ __('auth.create_an_account') }}</h1>
                        <div class="text-gray-400 fw-bold fs-4">{{ __('auth.already_have_an_account') }}
                        <a href="javascript:;" onclick="auth_content('login_page');" class="link-primary fw-bolder">{{ __('auth.sign_in_here') }}</a></div>
                    </div>
                    <a href="javascript:;" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                        <img alt="Logo" src="{{asset('keenthemes/media/svg/brand-logos/google-icon.svg')}}" class="h-20px me-3" />{{ __('auth.continue_with_google') }}
                    </a>
                    <div class="d-flex align-items-center mb-10">
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        <span class="fw-bold text-gray-400 fs-7 mx-2">{{ __('auth.or') }}</span>
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    </div>
                    <div class="row fv-row mb-7">
                        <div class="col-xl-12">
                            <label class="form-label fw-bolder text-dark fs-6">{{ __('field.fullname') }}</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" name="full-name" autocomplete="off" />
                        </div>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">Email</label>
                        <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" />
                    </div>
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <div class="mb-1">
                            <label class="form-label fw-bolder text-dark fs-6">{{ __('field.password') }}</label>
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            </div>
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                        </div>
                        <div class="text-muted">{{ __('auth.message_password') }}</div>
                    </div>
                    <div class="fv-row mb-5">
                        <label class="form-label fw-bolder text-dark fs-6">{{ __('field.re_enter') }} {{ __('field.password') }}</label>
                        <input class="form-control form-control-lg form-control-solid" type="password" name="confirm-password" autocomplete="off" />
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1" />
                            <span class="form-check-label fw-bold text-gray-700 fs-6">{{ __('field.i_agree') }}
                            <a href="javascript:;" id="terms_condition_button" class="ms-1 link-primary">{{ __('menu.term_condition') }}</a>.</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <button id="tombol_daftar" class="btn btn-lg btn-primary w-100 mb-5" data-login="3">
                            <span class="indicator-label">{{ __('button.register') }}</span>
                            <span class="indicator-progress">{{ __('button.please_wait') }}...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
            <div id="forgot_page" style="display:none;">
                <form class="form w-100" novalidate="novalidate" id="form_forgot">
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">{{ __('auth.forgot_password') }}</h1>
                        <div class="text-gray-400 fw-bold fs-4">{{ __('auth.desc_forgot_page') }}</div>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">Email</label>
                        <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" />
                    </div>
                    <div class="text-center">
                        <button id="tombol_forgot" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">{{ __('button.submit') }}</span>
                            <span class="indicator-progress">{{ __('button.please_wait') }}...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <a href="javascript:;" onclick="auth_content('login_page');" class="btn btn-lg btn-light-primary w-100 mb-5">
                            <span class="indicator-label">{{ __('button.cancel') }}</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-office-layout>