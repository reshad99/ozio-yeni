<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new3_target" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <div class="modal-content rounded">
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <h2 class="w-100 text-start modal-title text-white">
                    {{ __('admin::general.pages.emergencyCall.list.new_emergencycall') }}</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-solid ki-cross text-white fs-2hx"></i>
                </div>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-5 pb-15">
                <form id="kt_modal_new3_target_form" class="form" action="">
                    <input type="hidden" name="edit_id" value="">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row g-9">
                                <div class="col-md-6 fv-row">
                                    <label
                                        class="required fs-6 fw-semibold mb-3 mt-3">{{ __('admin::general.pages.emergencyCall.list.category') }}</label>
                                    <select disabled class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" name="category_id">
                                        @foreach ($mainAccidentCategories as $mainAccidentCategory)
                                            <option value="{{ $mainAccidentCategory->id }}">
                                                {{ $mainAccidentCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label
                                        class="required fs-6 mb-3 mt-3 fw-semibold">{{ __('admin::general.pages.emergencyCall.list.sub_category') }}</label>
                                    <select disabled class="form-select form-select-solid" data-control="select2"
                                        data-hide-search="true" name="sub_category_id">
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <label
                                    class="fs-6 fw-semibold  mb-3 mt-3">{{ __('admin::general.pages.emergencyCall.list.accident_description') }}</label>
                                <textarea disabled class="form-control  accident_description" rows="3"
                                    name="accident_description"></textarea>
                            </div>
                            <div class="separator border-3 my-5"></div>

                            <div id="fieldModal" class="row border border-2 py-5" style="border-radius: 6px">
                                <div class="row g-3">
                                    <div class="col-md-4 fv-row">
                                        <label
                                            class="required fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_first_name') }}</label>
                                        <input disabled class="form-control "
                                            name="subscriber_caller_first_name">
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label
                                            class="required fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_last_name') }}</label>
                                        <input disabled class="form-control "
                                            name="subscriber_caller_last_name">
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label
                                            class="required fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_father_name') }}</label>
                                        <input disabled class="form-control "
                                            name="subscriber_caller_father_name">
                                    </div>
                                </div>


                                <input disabled type="hidden" name="subscriber_city" value="">
                                <input disabled type="hidden" name="subscriber_region" value="">
                                <input disabled type="hidden" name="subscriber_street" value="">
                                <input disabled type="hidden" name="subscriber_house_number" value="">
                                <input disabled type="hidden" name="subscriber_flat_number" value="">

                                <div class="row g-9">
                                    <div class="col-md-12">
                                        <input class="form-control " disabled
                                            name="subscriber_accident_address">
                                    </div>
                                </div>

                                <div class="row g-9">
                                    <div class="col-md-8 fv-row">
                                        <label class="required fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.assign_modal.orientation') }}</label>
                                        <input disabled class="form-control " name="address">
                                    </div>
                                    <div class="col-md-4 fv-row">
                                        <label
                                            class="required fs-5 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.caller_phone_number') }}</label>
                                        <input disabled type="tel" class="form-control "
                                            name="caller_phone_number">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="separator border-3 my-5"></div>

                        <div class="col-12 col-lg-12 m-auto">
                            <label
                                class="required fs-6 fw-semibold mb-2">{{ __('admin::general.pages.emergencyCall.list.assign_new_worker') }}</label>
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                name="staff_id">
                                <option value="">{{ __('admin::general.pages.emergencyCall.list.assign_modal.select_worker') }}</option>
                                @foreach ($workers as $worker)
                                    <option value="{{ $worker->id }}">
                                        {{ $worker->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="button" id="kt_modal_new3_target_submit" class="btn btn-primary">
                            <span
                                class="indicator-label">{{ __('admin::general.pages.emergencyCall.list.save') }}</span>
                            <span
                                class="indicator-progress">{{ __('admin::general.pages.emergencyCall.list.wait') }}...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="reset" id="kt_modal_new3_target_cancel"
                            class="btn btn-light me-3">{{ __('admin::general.pages.emergencyCall.list.cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end::Modal - New Target-->
