<div class="modal fade" id="kt_modal_select_users" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mt-20" style="min-width: 1300px">
        <div class="modal-content" style="min-height: 84vh">
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <h2 class="w-100 text-start modal-title text-white">
                    Abunə axtarışı</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-solid ki-cross text-white fs-2hx"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                <form id="select-user-modal" action="#">
                    <div class="card mb-7 mt-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="position-relative me-md-2">
                                    <input type="text" class="form-control  ps-10" name="name"
                                        value="" placeholder="Ad">
                                </div>
                                <div class="position-relative me-md-2">
                                    <input type="text" class="form-control  ps-10" name="surname"
                                        value="" placeholder="Soyad">
                                </div>
                                <div class="position-relative me-md-2">
                                    <input type="text" class="form-control  ps-10" name="fin"
                                        value="" placeholder="Fin">
                                </div>
                                <div class="position-relative me-md-2">
                                    <input type="text" class="form-control  ps-10"
                                        name="subscribeNumber" value="" placeholder="Abunə kodu">
                                </div>
                                <div class="position-relative me-md-2">
                                    <input type="text" class="form-control  ps-10" name="meterNum"
                                        value="" placeholder="Sayğac nömrəsi">
                                </div>
                                <div class="d-flex align-items-center">
                                    <button id="search-user-select" type="button"
                                        class="btn btn-primary me-5">{{ __('admin::general.pages.emergencyCall.list.select_user_modal.search') }}</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <div class="mh-800px scroll-y me-n7 pe-7">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="sticky-header">
                                <tr class="fw-bold fs-6 text-gray-800">
                                    <th>{{ __('admin::general.pages.emergencyCall.list.select_user_modal.full_name') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th>{{ __('admin::general.pages.emergencyCall.list.select_user_modal.father_name') }} &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th>{{ __('admin::general.pages.emergencyCall.list.select_user_modal.phone_number') }} &nbsp;&nbsp;&nbsp;</th>
                                    <th>{{ __('admin::general.pages.emergencyCall.list.select_user_modal.fin') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th>{{ __('admin::general.pages.emergencyCall.list.select_user_modal.passport_number') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th>{{ __('admin::general.pages.emergencyCall.list.select_user_modal.meter_number') }}</th>
                                    <th>{{ __('admin::general.pages.emergencyCall.list.select_user_modal.subscriber_code') }}</th>
                                    <th>{{ __('admin::general.pages.emergencyCall.list.select_user_modal.building') }}</th>
                                    <th>{{ __('admin::general.pages.emergencyCall.list.select_user_modal.apartment') }}</th>
                                    <th>{{ __('admin::general.pages.emergencyCall.list.select_user_modal.action') }}</th>
                                </tr>
                            </thead>
                            <tbody id="select-user-modal-user-list"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
