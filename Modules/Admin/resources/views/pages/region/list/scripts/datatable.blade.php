<script>
    $(document).ready(function() {
        // @foreach (Modules\Shared\app\Enums\RegionEnum::values() as $key => $value)
        //                                     <option value="{{ $key }}">{{ $value }}
        //                                         ({{ $key }})</option>
        //                                 @endforeach

        "use strict";
        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var regionEnum = @json(Modules\Shared\app\Enums\RegionEnum::values());
            var table;
            var dt;
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                window.datatable = dt = $("#kt_datatable_example_1").DataTable({
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    stateSave: false,
                    language: {
                        "emptyTable": "Cədvəldə heç bir məlumat yoxdur",
                        "infoEmpty": "Nəticə Yoxdur",
                        "infoFiltered": "( _MAX_ Nəticə İçindən Tapılanlar)",
                        "loadingRecords": "Yüklənir...",
                        "processing": "Gözləyin...",
                        "search": "Axtarış:",
                        "zeroRecords": "Nəticə Tapılmadı.",
                        "paginate": {
                            "first": "İlk",
                            "last": "Axırıncı",
                            "previous": "Öncəki",
                            "next": "Sonrakı"
                        },
                        "aria": {
                            "sortDescending": ": sütunu azalma sırası üzərə aktiv etmək",
                            "sortAscending": ": sütunu artma sırası üzərə aktiv etmək"
                        },
                        "autoFill": {
                            "fill": "Bütün hücrələri <i>%d<\/i> ile doldur",
                            "fillHorizontal": "Hücrələri üfiqi olaraq doldur",
                            "fillVertical": "Hücrələri şaquli olara1 doldur",
                            "cancel": "Ləğv et"
                        },
                        "buttons": {
                            "collection": "Kolleksiya <span class=\"\\\"><\/span>",
                            "colvis": "Sütun baxışı",
                            "colvisRestore": "Baxışı əvvəlki vəziyyətinə gətir",
                            "copy": "Kopyala",
                            "copyKeys": "Cədvəldəki qeydi kopyalamaq üçün CTRL və ya u2318 + C düymələrinə basın. Ləğv etmək üçün bu mesajı vurun və ya ESC düyməsini vurun.",
                            "copySuccess": {
                                "1": "1 sətir panoya kopyalandı",
                                "_": "%ds sətir panoya kopyalandı"
                            },
                            "copyTitle": "Panoya kopyala",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pageLength": {
                                "-1": "Bütün sətirlari göstər",
                                "_": "%d sətir göstər"
                            },
                            "pdf": "PDF",
                            "print": "Çap Et"
                        },
                        "decimal": ",",
                        "info": "",
                        "infoThousands": ".",
                        "searchBuilder": {
                            "add": "Koşul Ekle",
                            "button": {
                                "0": "Axtarış Yaradıcı",
                                "_": "Axtarış Yaradıcı (%d)"
                            },
                            "clearAll": "Filtrləri Təmizlə",
                            "condition": "Şərt",
                            "conditions": {
                                "date": {
                                    "after": "Növbəti",
                                    "before": "Öncəki",
                                    "between": "Arasında",
                                    "empty": "Boş",
                                    "equals": "Bərabərdir",
                                    "not": "Deyildir",
                                    "notBetween": "Xaricində",
                                    "notEmpty": "Dolu"
                                },
                                "number": {
                                    "between": "Arasında",
                                    "empty": "Boş",
                                    "equals": "Bərabərdir",
                                    "gt": "Böyükdür",
                                    "gte": "Böyük bərabərdir",
                                    "lt": "Kiçikdir",
                                    "lte": "Kiçik bərabərdir",
                                    "not": "Deyildir",
                                    "notBetween": "Xaricində",
                                    "notEmpty": "Dolu"
                                },
                                "string": {
                                    "contains": "Tərkibində",
                                    "empty": "Boş",
                                    "endsWith": "İlə bitər",
                                    "equals": "Bərabərdir",
                                    "not": "Deyildir",
                                    "notEmpty": "Dolu",
                                    "startsWith": "İlə başlayar"
                                },
                                "array": {
                                    "equals": "Bərabərdir",
                                    "empty": "Boş",
                                    "contains": "Tərkibində",
                                    "not": "Deyildir",
                                    "notEmpty": "Dolu",
                                    "without": "Xaric"
                                }
                            },
                            "data": "Qeyd",
                            "deleteTitle": "Filtrləmə qaydasını silin",
                            "leftTitle": "Meyarı xaricə çıxarmaq",
                            "logicAnd": "və",
                            "logicOr": "vəya",
                            "rightTitle": "Meyarı içəri al",
                            "title": {
                                "0": "Axtarış Yaradıcı",
                                "_": "Axtarış Yaradıcı (%d)"
                            },
                            "value": "Değer"
                        },
                        "searchPanes": {
                            "clearMessage": "Hamısını Təmizlə",
                            "collapse": {
                                "0": "Axtarış Bölməsi",
                                "_": "Axtarış Bölməsi (%d)"
                            },
                            "count": "{total}",
                            "countFiltered": "{shown}\/{total}",
                            "emptyPanes": "Axtarış Bölməsi yoxdur",
                            "loadMessage": "Axtarış Bölməsi yüklənir ...",
                            "title": "Aktiv filtrlər - %d"
                        },
                        "select": {
                            "cells": {
                                "1": "1 hücrə seçildi",
                                "_": "%d hücrə seçildi"
                            },
                            "columns": {
                                "1": "1 sütun seçildi",
                                "_": "%d sütun seçildi"
                            },
                            "rows": {
                                "1": "1 qeyd seçildi",
                                "_": "%d qeyd seçildi"
                            }
                        },
                        "thousands": ".",
                        "datetime": {
                            "previous": "Öncəki",
                            "next": "Növbəti",
                            "hours": "Saat",
                            "minutes": "Dəqiqə",
                            "seconds": "Saniyə",
                            "unknown": "Naməlum",
                            "amPm": [
                                "am",
                                "pm"
                            ]
                        },
                        "editor": {
                            "close": "Bağla",
                            "create": {
                                "button": "Təzə",
                                "title": "Yeni qeyd yarat",
                                "submit": "Qeyd Et"
                            },
                            "edit": {
                                "button": "Redaktə Et",
                                "title": "Qeydi Redaktə Et",
                                "submit": "Yeniləyin"
                            },
                            "remove": {
                                "button": "Sil",
                                "title": "Qeydləri sil",
                                "submit": "Sil",
                                "confirm": {
                                    "_": "%d ədəd qeydi silmək istədiyinizə əminsiniz?",
                                    "1": "Bu qeydi silmək istədiyinizə əminsiniz?"
                                }
                            },
                            "error": {
                                "system": "Sistem xətası baş verdi (Ətraflı Məlumat)"
                            },
                            "multi": {
                                "title": "Çox dəyər",
                                "info": "Seçilmiş qeydlər bu sahədə fərqli dəyərlər ehtiva edir. Bütün seçilmiş qeydlər üçün bu sahəyə eyni dəyəri təyin etmək üçün buraya vurun; əks halda hər qeyd öz dəyərini saxlayacaqdır.",
                                "restore": "Dəyişiklikləri geri qaytarın",
                                "noMulti": "Bu sahə qrup şəklində deyil, ayrı-ayrılıqda təşkil edilə bilər."
                            }
                        },
                        "lengthMenu": "Səhifədə _MENU_ nəticə göstər",
                        "searchPlaceholder": "Nəyi axtarırsınız?"
                    },
                    ajax: function(data, callback, settings) {
                        // AJAX isteğini manuel olarak yap
                        data.with = ['organisation'];
                        $.ajax({
                            url: "{{ route('admin.ajax.region.datatable') }}", // AJAX isteğinin yapılacağı URL
                            data: data,
                            success: function(response) {
                                console.log(response); // Veriyi konsola log et
                                callback(
                                    response
                                ); // DataTables'ın veriyi işlemesini sağla
                            },
                            error: function(error) {
                                console.error(
                                    error
                                ); // Hata durumunda hatayı konsola log et
                            }
                        });
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'name'

                        },
                        {
                            data: 'organisation.org_name'

                        },
                        {
                            data: 'created_at',
                            render: function(data, type, row) {
                                return moment(row.created_at).format(
                                    'DD.MM.YYYY HH:mm');
                            },
                        },
                        {
                            data: 'action',
                            orderable: false,
                        },
                    ],
                    order: [
                        [3, 'desc']
                    ],
                    columnDefs: [
                        // {
                        //     targets: 0,
                        //     orderable: false,
                        //     render: function(data) {
                        //         return `
                        //     <div class="form-check form-check-sm form-check-custom form-check-solid">
                        //         <input class="form-check-input" type="checkbox" value="${data}" />
                        //     </div>`;
                        //     }
                        // },
                        {
                            targets: -1,
                            data: null,
                            orderable: false,
                            className: 'text-end',
                            render: function(data, type, row) {
                                return `
                            <a href="#" class="btn btn-light-primary btn-active-primary btn-sm w-150px" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                {{ __('admin::general.shared.actions') }}
                                <span class="svg-icon fs-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true">
                                @can('update-region')
                                    <div class="menu-item px-3">
                                        <a data-bs-toggle="modal" data-bs-target="#kt_modal_new2_target" data-id="${row.id}" data-kt-docs-table-filter="edit_row" class="menu-link px-3">{{ __('admin::general.shared.edit') }}</a>
                                    </div>
                                @endcan
                                @can('delete-region')
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                                            {{ __('admin::general.shared.delete') }}
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        `;
                            },
                        },
                    ]
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    //initToggleToolbar();
                    toggleToolbars();
                    handleDeleteRows();
                    KTMenu.createInstances();

                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = function() {
                const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    dt.search(e.target.value).draw();
                });
            }

            // Filter Datatable
            var handleFilterDatatable = () => {
                // Select filter options
                filterPayment = document.querySelectorAll(
                    '[data-kt-docs-table-filter="payment_type"] [name="payment_type"]');
                const filterButton = document.querySelector('[data-kt-docs-table-filter="filter"]');

                // Filter datatable on submit
                filterButton.addEventListener('click', function() {
                    // Get filter values
                    let paymentValue = '';

                    // Get payment value
                    filterPayment.forEach(r => {
                        if (r.checked) {
                            paymentValue = r.value;
                        }

                        // Reset payment value if "All" is selected
                        if (paymentValue === 'all') {
                            paymentValue = '';
                        }
                    });

                    // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
                    dt.search(paymentValue).draw();
                });
            }

            // Delete customer
            var handleDeleteRows = () => {
                // Select all delete buttons
                const deleteButtons = document.querySelectorAll(
                    '[data-kt-docs-table-filter="delete_row"]');

                deleteButtons.forEach(d => {
                    // Delete button on click
                    d.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Select parent row
                        const parent = e.target.closest('tr');

                        // Get customer name
                        const customerName = parent.querySelectorAll('td')[1].innerText;

                        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "{{ __('admin::general.pages.region.list.are_you_sure_you_want_to_delete_this') }} " +
                                customerName + "?",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "{{ __('admin::general.shared.yes_delete') }}",
                            cancelButtonText: "{{ __('admin::general.shared.no_cancel') }}",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then(function(result) {
                            if (result.value) {

                                // <input class="form-check-input" type="checkbox" value="${data}" />
                                let id = parent.querySelectorAll('td')[0]
                                    .innerText;


                                let url =
                                    `{{ route('admin.ajax.region.delete', ['id' => '-1']) }}`;
                                console.log(url);
                                url = url.replace("-1", id);
                                //ajax
                                $.ajax({
                                    url: url,
                                    type: "DELETE",
                                    success: function(response) {
                                        Swal.fire({
                                            text: "" +
                                                customerName +
                                                " {{ __('admin::general.pages.region.list.region_was_successfully_deleted') }}" +
                                                "!.",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function() {
                                            // ajax reload
                                            dt.draw();

                                        });
                                    },
                                    error: function(xhr) {
                                        Swal.fire({
                                            text: customerName +
                                                "{{ __('admin::general.pages.region.list.region_was_not_deleted') }}" +
                                                xhr
                                                .responseJSON
                                                .message,
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        });
                                    }
                                });
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: customerName +
                                        "{{ __('admin::general.pages.emergencyCall.list.region_was_not_deleted') }}",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                });
                            }
                        });
                    })
                });
            }

            // Reset Filter
            var handleResetForm = () => {
                // Select reset button
                const resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');

                // Reset datatable
                resetButton.addEventListener('click', function() {
                    // Reset payment type
                    filterPayment[0].checked = true;

                    // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                    dt.search('').draw();
                });
            }

            // Init toggle toolbar
            var initToggleToolbar = function() {
                // Toggle selected action toolbar
                // Select all checkboxes
                const container = document.querySelector('#kt_datatable_example_1');
                const checkboxes = container.querySelectorAll('[type="checkbox"]');

                // Select elements
                const deleteSelected = document.querySelector(
                    '[data-kt-docs-table-select="delete_selected"]');

                // Toggle delete selected toolbar
                checkboxes.forEach(c => {
                    // Checkbox on click event
                    c.addEventListener('click', function() {
                        setTimeout(function() {
                            toggleToolbars();
                        }, 50);
                    });
                });

                // Deleted selected rows
                deleteSelected.addEventListener('click', function() {
                    // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Are you sure you want to delete selected customers?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        showLoaderOnConfirm: true,
                        confirmButtonText: "{{ __('admin::general.shared.yes_cancel') }}",
                        cancelButtonText: "{{ __('admin::general.shared.no_return') }}",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        },
                    }).then(function(result) {
                        if (result.value) {
                            // Simulate delete request -- for demo purpose only
                            Swal.fire({
                                text: "Deleting selected customers",
                                icon: "info",
                                buttonsStyling: false,
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                Swal.fire({
                                    text: "You have deleted all selected customers!.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function() {
                                    // delete row data from server and re-draw datatable
                                    dt.draw();
                                });

                                // Remove header checked box
                                const headerCheckbox = container
                                    .querySelectorAll('[type="checkbox"]')[0];
                                headerCheckbox.checked = false;
                            });
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: "Selected customers was not deleted.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });
                });
            }

            // Toggle toolbars
            var toggleToolbars = function() {
                // Define variables
                const container = document.querySelector('#kt_datatable_example_1');
                const toolbarBase = document.querySelector('[data-kt-docs-table-toolbar="base"]');
                const toolbarSelected = document.querySelector(
                    '[data-kt-docs-table-toolbar="selected"]');
                const selectedCount = document.querySelector(
                    '[data-kt-docs-table-select="selected_count"]');

                // Select refreshed checkbox DOM elements
                const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');

                // Detect checkboxes state & count
                let checkedState = false;
                let count = 0;

                // Count checked boxes
                allCheckboxes.forEach(c => {
                    if (c.checked) {
                        checkedState = true;
                        count++;
                    }
                });

                // Toggle toolbars
                if (checkedState) {
                    selectedCount.innerHTML = count;
                    toolbarBase.classList.add('d-none');
                    toolbarSelected.classList.remove('d-none');
                } else {
                    toolbarBase.classList.remove('d-none');
                    toolbarSelected.classList.add('d-none');
                }
            }

            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                    handleDeleteRows();
                    //initToggleToolbar();
                    //handleFilterDatatable();
                    //handleResetForm();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    });
</script>
