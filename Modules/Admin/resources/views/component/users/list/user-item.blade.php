<tr data-user-id="{{$user->id}}">
    <td>
        <div class="form-check form-check-sm form-check-custom form-check-solid">
            <input class="form-check-input" type="checkbox" value="{{$user->id}}" />
        </div>
    </td>
    <td class="d-flex align-items-center">
        <!--begin:: Avatar -->
        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
            <a href="{{ route('admin.user.view', $user->id) }}">
                <div class="symbol-label fs-3 bg-light-danger text-danger">
                    {{ strtoupper($user->first_name[0]) . strtoupper($user->last_name[0]) }}</div>
            </a>
        </div>
        <!--end::Avatar-->
        <!--begin::User details-->
        <div class="d-flex flex-column">
            <a href="{{ route('admin.user.view', $user->id) }}"
                class="text-gray-800 text-hover-primary mb-1">{{ $user->full_name }}</a>
            <span>{{ $user->email }}</span>
        </div>
        <!--begin::User details-->
    </td>
    <td>
        {{-- /check user roles isset --}}
        @if (isset($user->roles))
            {{-- /check user roles count --}}
            @if (count($user->roles) > 0)
                {{-- /loop user roles --}}
                @foreach ($user->roles as $role)
                    <div class="badge badge-light-green badge-inline">{{ $role->name }}</div>
                @endforeach
            @else
                <div class="badge badge-light-danger badge-inline">{{__("admin::general.components.user_item.no_role")}}</div>
            @endif
        @endif

    </td>

    {{-- //show created at like DD MMM YYYY, LT --}}
    <td>{{ date('d M Y, h:i a', strtotime($user->created_at)) }}</td>
    <td class="text-end">
        <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">{{__("admin::general.shared.actions")}}
            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
            data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a data-bs-toggle="modal"
                data-bs-target="#kt_modal_update_user" class="menu-link px-3" >{{__("admin::general.shared.edit")}}</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">{{__("admin::general.shared.delete")}}</a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu-->
    </td>
</tr>
