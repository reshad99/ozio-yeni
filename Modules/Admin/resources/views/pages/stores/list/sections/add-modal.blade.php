<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-md-5 border-0 justify-content-end">
                <!--begin::Title-->
                <h2 class="w-100 text-start modal-title fw-bold">
                    {{ __('admin::general.pages.stores.list.add_new_store') }}</h2>
                <!-- Title added here -->
                <!--end::Title-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-5 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new_target_form" class="form" action="">
                    <div class="row">
                        <div class="col-6 col-lg-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="module_id"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.module') }}</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-solid module-select2" data-control="select2"
                                        data-hide-search="true" id="module_id" name="module_id">
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-6 col-lg-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="store_category_id"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.store_category') }}</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-solid store-category-select2"
                                        data-control="select2"
                                        data-hide-search="true" id="store_category_id" name="store_category_id">
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="name"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.name') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" id="name"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="{{__('admin::general.pages.stores.list.table.name')}}"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-6 col-lg-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="store_code"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.store_code') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="store_code" id="store_code"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="12345678"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-6 col-lg-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="currency_id"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.currency') }}</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-solid currency-select2" data-control="select2"
                                        data-hide-search="true" id="currency_id" name="currency_id">
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-4 col-lg-4">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="country_id"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.country') }}</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-solid country-select2" data-control="select2"
                                        data-hide-search="true" id="country_id" name="country_id">
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-4 col-lg-4">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="city_id"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.city') }}</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-solid city-select2" data-control="select2"
                                        data-hide-search="true" id="city_id" name="city_id">
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-4 col-lg-4">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="phone"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.admins.list.table.phone') }}</label>
                                <!--end::Label-->
                                <br>
                                <!--begin::Input-->
                                <input name="phone" id="phone"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="example@domain.com"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="email"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.email') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email" id="email"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="{{ __('admin::general.pages.stores.list.table.email') }}"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="password"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.password') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="password" name="password" id="password"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="{{ __('admin::general.pages.stores.list.table.password') }}"/>
                                <!--end::Input-->
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="password_confirmation"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.password_confirmation') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="{{ __('admin::general.pages.stores.list.table.password_confirmation') }}"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-4 col-lg-4">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="status"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.status') }}</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-solid status-select2" data-control="select2"
                                        data-hide-search="true" id="status" name="status">
                                    @foreach(\App\Enums\StatusEnum::cases() as $case)
                                        <option value="{{$case->value}}">{{ucfirst($case->value)}}</option>
                                    @endforeach
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-4 col-lg-4">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="lat"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.lat') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="lat" id="lat"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="{{ __('admin::general.pages.stores.list.table.lat') }}"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-4 col-lg-4">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="lng"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.lng') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="lng" id="lng"
                                       class="form-control form-control-solid mb-3 mb-lg-0"
                                       placeholder="{{ __('admin::general.pages.stores.list.table.lng') }}"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-6 col-lg-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" name="have_vegan"/>
                                    <span
                                        class="form-check-label fw-semibold text-gray-700 ms-2">{{ __('admin::general.pages.stores.list.table.have_vegan') }}</span>
                                </label>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-6 col-lg-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" name="have_not_vegan"/>
                                    <span
                                        class="form-check-label fw-semibold text-gray-700 ms-2">{{ __('admin::general.pages.stores.list.table.have_not_vegan') }}</span>
                                </label>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-6 col-lg-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="open_time"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.open_time') }}</label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid mb-3 mb-lg-0" id="open_time"
                                       name="open_time" placeholder="Select time" type="text"/>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-6 col-lg-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="close_time"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.close_time') }}</label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid mb-3 mb-lg-0" id="close_time"
                                       name="close_time"
                                       placeholder="Select time" type="text"/>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-6 col-lg-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="zone_id"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.zone') }}</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-solid zone-select2" data-control="select2">
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <div class="col-6 col-lg-6">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label for="branch_id"
                                       class="required fw-semibold fs-6 mb-2">{{ __('admin::general.pages.stores.list.table.branch') }}</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-solid store-branches-select2" data-control="select2"
                                        data-hide-search="true" id="branch_id" name="branch_id">
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--begin::Actions-->
                        <div class="text-center mt-5">
                            <button type="button" id="kt_modal_new_target_submit" class="btn btn-primary">
                                <span class="indicator-label">{{ __('admin::general.shared.save') }}</span>
                                <span class="indicator-progress">{{ __('admin::general.shared.please_wait') }}...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="reset" id="kt_modal_new_target_cancel"
                                    class="btn btn-light me-3">{{ __('admin::general.shared.cancel') }}</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
