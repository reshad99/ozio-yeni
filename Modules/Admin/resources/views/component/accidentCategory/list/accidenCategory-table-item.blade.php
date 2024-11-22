<tr data-category-id="{{ $category->id }}">
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-solid">
            <input class="form-check-input" type="checkbox" value="1" />
        </div>
    </td>
    <td>
        <div class="d-flex">
            <!--end::Thumbnail-->
            <div class="ms-5">
                <!--begin::Title-->
                <a href="apps/ecommerce/catalog/edit-category.html"
                    class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                    data-kt-ecommerce-category-filter="category_name">{{ $category->name }}</a>
                <!--end::Title-->
                <!--begin::Description-->
                {{-- <div class="text-muted fs-7 fw-bold">Our computers and tablets include all the
                    big brands.</div> --}}
                <!--end::Description-->
            </div>
        </div>
    </td>
    <td>
        @if ($category->status == Modules\Shared\app\Enums\AccidentCategoryStatusEnum::PUBLISHED->name)
            <div class="badge badge-light-success">{{__("admin::general.components.accidentCategory_item.published")}}</div>
        @elseif ($category->status == Modules\Shared\app\Enums\AccidentCategoryStatusEnum::UNPUBLISHED->name)
            <div class="badge badge-light-danger">{{__("admin::general.components.accidentCategory_item.unpublished")}}</div>
        @endif

    </td>
    <td class="text-end">
        <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center"
            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">{{__("admin::general.shared.actions")}}
            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
            data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="{{ route('admin.accident.category.read', ['id' => $category->id]) }}"
                    class="menu-link px-3">{{__("admin::general.shared.edit")}}</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row">{{__("admin::general.shared.delete")}}</a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu-->
    </td>
</tr>
