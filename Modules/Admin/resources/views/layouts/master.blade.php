<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../" />
    <title>Manage Fields</title>
    <meta charset="utf-8" />
    <meta name="description"
          content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
          content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
          content="Metronic - The World's #1 Selling Bootstrap Admin Template - Metronic by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('admin/assets/media/logos/gas.png') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    {{-- meta[name="csrf-token"] --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Vendor Stylesheets(used for this page only)-->
    @yield('styles')
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
    <style>
        :root {
            --bs-primary: #006bb4;
        }

        * {
            font-size: 1.2rem !important;
        }

        input.form-control[readonly] {
            background-color: var(--bs-gray-200) !important;
        }

        input.form-control[disabled] {
            background-color: var(--bs-gray-200) !important;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
<!--begin::Theme mode setup on page load-->
<script>
    var defaultThemeMode = "light";
    var themeMode;

    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }

        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }

        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
</script>
<!--end::Theme mode setup on page load-->
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <!--begin::Header-->
        @include('admin::partials.header')
        <!--end::Header-->
        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <!--begin::Sidebar-->
            @include('admin::partials.sidebar')
            <!--end::Sidebar-->
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                @yield('content')
                <!--end::Content wrapper-->
                <!--begin::Footer-->
                @include('admin::partials.footer')
                <!--end::Footer-->
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--begin::Javascript-->
<script>
    var hostUrl = "admin/assets/";
    var datatableLanguage={
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
                                "1": " 1 hücrə seçildi",
                                "_": " %d hücrə seçildi"
                            },
                            "columns": {
                                "1": " 1 sütun seçildi",
                                "_": " %d sütun seçildi"
                            },
                            "rows": {
                                "1": " 1 qeyd seçildi",
                                "_": " %d qeyd seçildi"
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
                    }
</script>



<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var customSwal = {
        normalError: function() {
            return Swal.fire({
                text: "{{ __('admin::general.shared.sorry_looks_like_there_are_some_errors_detected') }} {{ __('admin::general.shared.please_check_the_errors_and_try_again') }}",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        },
        dataError: function(xhr) {
            return Swal.fire({
                text: "{{ __('admin::general.shared.sorry_looks_like_there_are_some_errors_detected') }} " +
                    xhr
                        .responseJSON
                        .message,
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        },
        cancelIt: function() {
            return Swal.fire({
                text: " {{ __('admin::general.shared.are_you_sure_you_would_like_to_cancel') }}",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "{{ __('admin::general.shared.yes_cancel') }}",
                cancelButtonText: "{{ __('admin::general.shared.no_return') }}",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            })
        },
        formSuccess: function() {
            return Swal.fire({
                text: "{{ __('admin::general.shared.form_has_been_successfully_submitted') }}",
                icon: "success",
                buttonsStyling:
                    !1,
                confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        },
        formSuccessWithMessage: function(message) {
            return Swal.fire({
                text: message,
                icon: "success",
                buttonsStyling:
                    !1,
                confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        },
        formCancel: function() {
            return Swal.fire({
                text: "{{ __('admin::general.shared.your_form_has_not_been_cancelled') }}",
                icon: "error",
                buttonsStyling: !1,
                confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            })
        }
    }

    function removeNullValuesFromObj(obj) {
        for (var key in obj) {
            if (obj[key] === null || obj[key] === undefined) {
                delete obj[key];
            } else if (typeof obj[key] === 'object') {
                removeNullValuesFromObj(obj[key]);
                // Eğer iç obje şu anda boşsa, ana objeden de silinmesi gerekebilir.
                if (Object.keys(obj[key]).length === 0) {
                    delete obj[key];
                }
            }
        }
    }

    function removeNullKeys(serializedFormData) {
        // Convert serialized form data to an object
        let formDataObject = {};
        serializedFormData.split("&").forEach(function(item) {
            const parts = item.split("=");
            const key = decodeURIComponent(parts[0]);
            const value = decodeURIComponent(parts[1]);
            formDataObject[key] = value;
        });

        // Remove keys with null values from the object
        Object.keys(formDataObject).forEach(function(key) {
            if (formDataObject[key] === "null" || formDataObject[key] === null || formDataObject[key] === "") {
                delete formDataObject[key];
            }
        });

        // Convert the object back to a serialized string
        let updatedFormData = $.param(formDataObject);

        return updatedFormData;
    }
</script>

{{-- //TRANSLATES --}}
<script> 
    var StatusTranslates = {
        'OPEN': "{{ __('admin::general.shared.status.OPEN') }}",
        'DISPATCHED': "{{ __('admin::general.shared.status.DISPATCHED') }}",
        'DECLINED': "{{ __('admin::general.shared.status.DECLINED') }}",
        'APPROVED': "{{ __('admin::general.shared.status.APPROVED') }}",
        'DEPARTED': "{{ __('admin::general.shared.status.DEPARTED') }}",
        'ARRIVED': "{{ __('admin::general.shared.status.ARRIVED') }}",
        'COMPLETED': "{{ __('admin::general.shared.status.COMPLETED') }}",
        'CANCELLED': "{{ __('admin::general.shared.status.CANCELLED') }}",
    };
    //ADMIN MANAGER DISPATCHER WORKER
    var RolesTranslates = {
        'Admin': "{{ __('admin::general.shared.roles.ADMIN') }}",
        'Manager': "{{ __('admin::general.shared.roles.MANAGER') }}",
        'Dispatcher': "{{ __('admin::general.shared.roles.DISPATCHER') }}",
        'Worker': "{{ __('admin::general.shared.roles.WORKER') }}",
        'Super Admin': "{{ __('admin::general.shared.roles.SUPER_ADMIN') }}",
        'Organisation Manager': "{{ __('admin::general.shared.roles.ORGANISATION_MANAGER') }}",
        'Region Manager': "{{ __('admin::general.shared.roles.REGION_MANAGER') }}",

    };
</script>

@yield('scripts')
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
