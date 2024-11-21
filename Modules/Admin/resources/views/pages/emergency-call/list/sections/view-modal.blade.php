<div class="modal fade" id="kt_modal_view_info" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered min-w-1000px">
        <div class="modal-content rounded">
            <div class="modal-header pb-md-5 border-0 justify-content-end bg-primary">
                <h2 class="w-100 text-start modal-title text-white">
                    Qəza çağırışı</h2>

                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-solid ki-cross text-white fs-2hx"></i>
                </div>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-5 pb-15">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="py-5">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 gy-7">
                                    <tbody>
                                        <tr>
                                            <td class="w-50 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.category') }}</p>
                                                <h5 id="category" class="text-black"></h5>
                                            </td>
                                            <td class="w-50 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.sub_category') }}</p>
                                                <h5 id="sub_category" class="text-black"></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.call_number') }}</p>
                                                <h5 id="custom_id" class="text-black"></h5>
                                            </td>
                                            <td class="w-50 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.status') }}</p>
                                                <h5 id="status" class="text-black"></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.full_name') }}</p>
                                                <h5 id="fullname" class="text-black"></h5>
                                            </td>
                                            <td class="w-50 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.fin') }}</p>
                                                <h5 id="fin" class="text-black"></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.phone_number') }}</p>
                                                <h5 id="phone" class="text-black"></h5>
                                            </td>
                                            <td class="w-50 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.subscriber_code') }}</p>
                                                <h5 id="passport" class="text-black"></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.passport_number') }}</p>
                                                <h5 id="subscriber_number" class="text-black"></h5>
                                            </td>
                                            <td class="w-50 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.meter_number') }}</p>
                                                <h5 id="meter_number" class="text-black"></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="w-100 p-0 pt-2">
                                                <p class="text-gray-600">
                                                    {{ __('admin::general.pages.emergencyCall.list.accident_description') }}
                                                </p>
                                                <h5 id="accident_description" class="text-black"></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="w-100 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.address') }}</p>
                                                <h5 id="caller_address" class="text-black"></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="w-100 p-0 pt-2">
                                                <p class="text-gray-600">{{ __('admin::general.pages.emergencyCall.list.view.orientation') }}</p>
                                                <h5 id="address" class="text-black"></h5>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="separator border-3 mb-5 mt-0"></div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-12">
                        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                            <li class="nav-item">
                                <a class="btn btn-light-primary nav-link active" data-bs-toggle="tab"
                                    href="#kt_tab_pane_11">{{ __('admin::general.pages.emergencyCall.list.view.statuses') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-light-primary nav-link" data-bs-toggle="tab"
                                    href="#kt_tab_pane_22">{{ __('admin::general.pages.emergencyCall.list.view.images') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-light-primary nav-link" data-bs-toggle="tab"
                                    href="#kt_tab_pane_33">{{ __('admin::general.pages.emergencyCall.list.view.documents') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-light-primary nav-link" data-bs-toggle="tab"
                                    href="#kt_tab_pane_44">{{ __('admin::general.pages.emergencyCall.list.view.map') }}</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContentNeü">
                            <div class="tab-pane fade show active" id="kt_tab_pane_11" role="tabpanel">
                                <div class="col-12 col-lg-12">
                                    <div class="py-0">
                                        <div class="table-responsive">
                                            <table class="table table-row-dashed table-row-gray-300 gy-7">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-gray-800">
                                                        <th class="pt-0">{{ __('admin::general.pages.emergencyCall.list.view.worker') }}</th>
                                                        <th class="pt-0">{{ __('admin::general.pages.emergencyCall.list.view.status') }}</th>
                                                        <th class="pt-0">{{ __('admin::general.pages.emergencyCall.list.view.time') }}</th>
                                                        <th class="pt-0">{{ __('admin::general.pages.emergencyCall.list.view.difference') }}</th>
                                                        <th class="pt-0">{{ __('admin::general.pages.emergencyCall.list.view.note') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="status_section">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_22" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="card card-flush mb-5 mb-xl-8">
                                            <div class="card-header pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-gray-900">{{ __('admin::general.pages.emergencyCall.list.view.accident_images') }}</span>
                                                </h3>
                                                {{-- <div class="card-toolbar">
                                                    <a href="" class="btn btn-sm btn-light">Bütün şəkillər</a>
                                                </div> --}}
                                            </div>
                                            <div class="card-body">
                                                <div id="arrived-photos" class="row g-3 g-lg-6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card card-flush mb-5 mb-xl-8">
                                            <div class="card-header pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-gray-900">{{ __('admin::general.pages.emergencyCall.list.view.repair_images') }}</span>
                                                </h3>
                                                {{-- <div class="card-toolbar">
                                                    <a href="" class="btn btn-sm btn-light">Bütün şəkillər</a>
                                                </div> --}}
                                            </div>
                                            <div class="card-body">
                                                <div id="completed-photos" class="row g-3 g-lg-6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_33" role="tabpanel">
                                <div class="row">
                                    <div class="col-2">
                                        <div id='acts_section' class="card-body d-flex justify-content-center text-center flex-column p-0">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_44" role="tabpanel">
                                {{-- //add map --}}
                                <div id="map" style="height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
