<div class="d-flex fv-row">
    <!--begin::Radio-->
    <div class="form-check form-check-custom form-check-solid">
        <!--begin::Input-->
        <input class="form-check-input me-3" name="roles[]" type="radio" data-role-name="{{ $role->name }}" value="{{ $role->name }}" />
        <!--end::Input-->
        <!--begin::Label-->
        <label class="form-check-label">
            <div class="fw-bold text-gray-800">{{ $role->name }}</div>
            {{-- <div class="text-gray-600">Best for business owners and company administrators</div> --}}
        </label>
        <!--end::Label-->
    </div>
    <!--end::Radio-->
</div>
