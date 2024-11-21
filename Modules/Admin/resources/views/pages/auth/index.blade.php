@extends('admin::layouts.auth')

@section('content')
    <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
        <!--begin::Form-->
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-500px p-10">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" method="post" action="{{route('admin.authenticate')}}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-gray-900 fw-bolder mb-3">{{__('admin::general.pages.login.title')}}</h1>
                        <!--end::Title-->
                        <!--begin::Subtitle-->
                        {{--<div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>--}}
                        <!--end::Subtitle=-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input type="text" placeholder="{{__('admin::general.pages.login.form.email')}}" name="email"
                               autocomplete="off" class="form-control bg-transparent" value="{{old('email')}}"/>
                        <!--end::Email-->
                    </div>
                    <!--end::Input group=-->
                    <div class="fv-row mb-3">
                        <!--begin::Password-->
                        <input type="password" placeholder="{{__('admin::general.pages.login.form.password')}}"
                               name="password" autocomplete="off" class="form-control bg-transparent"/>
                        <!--end::Password-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Checkbox group=-->
                    <div class="d-flex flex-stack">
                        <!--begin::Label-->
                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="remember_me"/>
                            <span class="form-check-label fw-semibold text-gray-700 ms-2">Remember me</span>
                        </label>
                        <!--end::Label-->
                    </div>
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        <!--begin::Link-->
                        {{--<a href="authentication/layouts/corporate/reset-password.html" class="link-primary">Forgot Password ?</a>--}}
                        <!--end::Link-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">{{__('admin::general.pages.login.form.submit')}}</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    <!--end::Submit button-->
                    <!--begin::Sign up-->
                    {{--<div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                        <a href="authentication/layouts/corporate/sign-up.html" class="link-primary">Sign up</a></div>--}}
                    <!--end::Sign up-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Form-->
        <!--begin::Footer-->
        <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
            <!--begin::Links-->
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
@endsection
