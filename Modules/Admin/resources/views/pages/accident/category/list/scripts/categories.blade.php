<script>
    //document ready with jquery
    $(document).ready(function() {
        "use strict";

        // Class definition
        var KTAppEcommerceCategories = function() {
            // Shared variables
            var table;
            var datatable;

            // Private functions
            var initDatatable = function() {
                // Init datatable --- more info on datatables: https://datatables.net/manual/
                datatable = $(table).DataTable({
                    "info": false,
                    'order': [],
                    'pageLength': 10,
                    'columnDefs': [{
                            orderable: false,
                            targets: 0
                        }, // Disable ordering on column 0 (checkbox)
                        {
                            orderable: false,
                            targets: 3
                        }, // Disable ordering on column 3 (actions)
                    ]
                });

                // Re-init functions on datatable re-draws
                datatable.on('draw', function() {
                    handleDeleteRows();
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector(
                    '[data-kt-ecommerce-category-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    datatable.search(e.target.value).draw();
                });
            }

            // Delete cateogry
            var handleDeleteRows = () => {
                // Select all delete buttons
                const deleteButtons = table.querySelectorAll(
                    '[data-kt-ecommerce-category-filter="delete_row"]');

                deleteButtons.forEach(d => {
                    // Delete button on click
                    d.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Select parent row
                        const parent = e.target.closest('tr');

                        // Get category name
                        const categoryName = parent.querySelector(
                                '[data-kt-ecommerce-category-filter="category_name"]')
                            .innerText;

                        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "{{ __('admin::general.pages.accident.category.list.are_you_sure_you_want_to_delete_this') }}" +
                                categoryName + "?",
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

                                let categoryId = parent.getAttribute(
                                    'data-category-id');

                                let url =
                                    `{{ route('admin.ajax.accident.category.delete', ['id' => '-1']) }}`;
                                url = url.replace("-1", categoryId);
                                //ajax
                                $.ajax({
                                    url: url,
                                    type: "DELETE",
                                    success: function(response) {
                                        Swal.fire({
                                            text: "" +
                                                categoryName +
                                                " {{ __('admin::general.pages.accident.category.list.category_was_successfully_deleted') }}" +
                                                "!.",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "{{ __('admin::general.shared.got_it') }}",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        }).then(function() {
                                            // Remove current row
                                            datatable.row($(
                                                    parent
                                                ))
                                                .remove()
                                                .draw();
                                        });
                                    },
                                    error: function(xhr) {
                                        Swal.fire({
                                            text: categoryName +
                                                "{{ __('admin::general.pages.accident.category.list.category_was_not_deleted') }}" +
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
                                    text: categoryName +
                                        "{{ __('admin::general.pages.accident.category.list.category_was_not_deleted') }}",
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


            // Public methods
            return {
                init: function() {
                    table = document.querySelector('#kt_ecommerce_category_table');

                    if (!table) {
                        return;
                    }

                    initDatatable();
                    handleSearchDatatable();
                    handleDeleteRows();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTAppEcommerceCategories.init();
        });


    });
</script>
