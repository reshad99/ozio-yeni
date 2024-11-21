<div id='role_id_{{ $role->id }}' class="col-md-4">
    <!--begin::Card-->
    <div class="card card-flush h-md-100">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>{{ $role->name }}</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-1">
            <!--begin::Users-->
            <div class="fw-bold text-gray-600 mb-5">{{__("admin::general.components.role_card.total_users_with_this_role")}}:
                {{ count($role->users) }}</div>
            <!--end::Users-->
            <!--begin::Permissions-->
            <div class="d-flex flex-column text-gray-600">
                @for ($i = 0; $i < (count($role->permissions) > 5 ? 5 : count($role->permissions)); $i++)
                    <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ $role->permissions[$i]->name }}
                    </div>
                @endfor

                @if (count($role->permissions) > 5)
                    <div class='d-flex align-items-center py-2'>
                        <span class='bullet bg-primary me-3'></span>
                        <em>{{__("admin::general.components.role_card.and")}} {{ count($role->permissions) - 5 }} {{__("admin::general.components.role_card.more")}}...</em>
                    </div>
                @endif
            </div>
            <!--end::Permissions-->
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer flex-wrap pt-0">
            {{-- <a href="apps/user-management/roles/view.html" class="btn btn-light btn-active-primary my-1 me-2">View
                Role</a> --}}
            <button type="button" class="btn btn-light btn-active-light-primary my-1" data-bs-toggle="modal"
                data-bs-target="#kt_modal_update_role">{{__("admin::general.shared.edit")}} {{__("admin::general.components.role_card.role")}}</button>
        </div>
        <!--end::Card footer-->
    </div>
    <!--end::Card-->
</div>
<!--end::Col-->
