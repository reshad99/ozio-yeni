<script>
    let RegSelect2 = $('#reg-select2');
    let OrgSelect = $('#org-select');
    let OrgSelect2 = $('#org-select2');
    let RegSelect = $('#reg-select');
    //add orgselect on changed change region select
    OrgSelect.on('change', function() {
        let orgId = $(this).val();
        let regionSelect = $('#reg-select');
        regionSelect.html('');
        let option = document.createElement('option');
        option.value = 0;
        option.innerHTML = '{{ __('admin::general.pages.users.list.none') }}';
        regionSelect.append(option);
        if (orgId == 0) return;
        for (var i = 0; i < Regions.length; i++) {
            if (Regions[i].organisation.id == orgId) {
                let option = document.createElement('option');
                option.value = Regions[i].id;
                option.innerHTML = Regions[i].name;
                regionSelect.append(option);
            }
        }
        //trigger change event for region select
        regionSelect.trigger('change');
    });
    //add regselect on changed change department select
    RegSelect.on('change', function() {
        let regId = $(this).val();
        let departmentSelect = $('#department-select');
        departmentSelect.html('');
        let option = document.createElement('option');
        option.value = 0;
        option.innerHTML = '{{ __('admin::general.pages.users.list.none') }}';
        departmentSelect.append(option);
        if (regId == 0) return;
        for (var i = 0; i < Departments.length; i++) {
            if (Departments[i].region.id == regId) {
                let option = document.createElement('option');
                option.value = Departments[i].id;
                option.innerHTML = Departments[i].name;
                departmentSelect.append(option);
            }
        }
    });
    //add orgselect on changed change region select
    OrgSelect2.on('change', function() {
        let orgId = $(this).val();
        let regionSelect = $('#reg-select2');
        regionSelect.html('');
        let option = document.createElement('option');
        option.value = 0;
        option.innerHTML = '{{ __('admin::general.pages.users.list.none') }}';
        regionSelect.append(option);
        if (orgId == 0) return;
        for (var i = 0; i < Regions.length; i++) {
            if (Regions[i].organisation.id == orgId) {
                let option = document.createElement('option');
                option.value = Regions[i].id;
                option.innerHTML = Regions[i].name;
                regionSelect.append(option);
            }
        }
        //trigger change event for region select
        regionSelect.trigger('change');
    });
    RegSelect2.on('change', function() {
        let regId = $(this).val();
        let departmentSelect = $('#department-select2');
        departmentSelect.html('');
        let option = document.createElement('option');
        option.value = 0;
        option.innerHTML = '{{ __('admin::general.pages.users.list.none') }}';
        departmentSelect.append(option);
        if (regId == 0) return;
        for (var i = 0; i < Departments.length; i++) {
            if (Departments[i].region.id == regId) {
                let option = document.createElement('option');
                option.value = Departments[i].id;
                option.innerHTML = Departments[i].name;
                departmentSelect.append(option);
            }
        }
    });


    // module-select
    let ModuleSelect = $('#module-select');
    //set multiple select2
    ModuleSelect.select2({
        multiple: true,
    });

</script>
