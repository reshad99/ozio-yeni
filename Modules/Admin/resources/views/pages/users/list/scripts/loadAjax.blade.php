<script>
    var firstTimeClick = true;
    window.loadAjax = async function() {
        if (firstTimeClick) {
            console.log('load ajax');
            KTApp.showPageLoading();
            let promise = new Promise(function(resolve, reject) {
                firstTimeClick = false;
                //get department list and roles list
                //ajax read role data
                resolve();
                $.ajax({
                    type: "GET",
                    //TODO ROUTE
                    url: "", // Update with your API endpoint
                    data: {},
                    success: function(response) {
                        response = JSON.parse(JSON.stringify(response));
                        console.log(response);
                        resolve();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        customSwal.dataError(xhr);
                        resolve();
                    },
                });

            });
            await promise;
            // // AddRoles();
            // // AddModules();
            KTApp.hidePageLoading();
        }
    }
</script>
