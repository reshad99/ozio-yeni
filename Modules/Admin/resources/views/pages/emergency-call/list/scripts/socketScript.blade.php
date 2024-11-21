 {{-- //Socket IO CDN --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.3/socket.io.js"
     integrity="sha512-jDUVpk2awjMnyrpY2xZguylQVRDeS9kRBImn0M3NJaZzowzUpKr6i62ynwPG0vNS1+NsTk4ji+iznbc5m0ZCKQ=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script>
     //connect socket io server {{ env('SOCKET_SERVER_URL') }}
     var socket = io("{{ env('SOCKET_SERVER') }}");
 </script>

 <script>
     var audio = new Audio('https://cdn.freesound.org/previews/320/320654_5260872-lq.mp3');
     const container = document.getElementById('kt_docs_toast_stack_container');
     const targetElement = document.querySelector(
         '[data-kt-docs-toast="stack"]'); // Use CSS class or HTML attr to avoid duplicating ids

     // Remove base element markup
     targetElement.parentNode.removeChild(targetElement);
     $(document).ready(function() {
         //socket on emergencyCallCaseChange
         console.log('socket on emergencyCallCaseChange');
         socket.on('UpdateDataTable', (data) => {
             window.datatable.draw();
         });
         socket.on('emergencyCallStatusChange', (data) => {
             audio.play();
             console.log(data);

             // Create new toast element
             let newToast = targetElement.cloneNode(true);

             //get toast-body and toast-title change text
             let toastBody = newToast.querySelector('.toast-body'); //    
             let toastIcon = newToast.querySelector('.toast-icon'); //    
             let toastTitle = newToast.querySelector('.toast-title'); //Keenthemes
             let toastDate = newToast.querySelector('.toast-date'); //11 min ago
             //     {
             //     customId: data.customId,
             //     newStatus: data.newStatus,
             //     oldStatus: data.oldStatus,
             //     worker: data.worker
             // }
             //current date

             let date = new Date();
             let currentDate = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
             let lastPart = '';
             if (data.newStatus == 'DECLINED') {
                 toastTitle.innerHTML = '<span class="badge badge-danger"><b>İmtina</b></span>'
                 lastPart = 'imtina edilib';

                 toastIcon.innerHTML =
                     '<i class="ki-solid ki-abstract-11 fs-2 text-danger me-3"></i>';
             } else if (data.newStatus == "COMPLETED") {
                 toastTitle.innerHTML = '<span class="badge badge-success">Tamamlanıb</span>'
                 lastPart = 'Tamamlanıb';
                 toastIcon.innerHTML =
                     '<i class="ki-solid ki-check fs-2 text-success me-3"></i>';
             }
             toastDate.innerHTML = currentDate;
             toastBody.innerHTML = '<b>' + data.customId + '</b> çağırışı' + " " + data.worker
                 .first_name + ' ' + data.worker.last_name +
                 ' tərəfindən ' + lastPart + `
                <div class="d-flex justify-content-center pt-3" data-kt-docs-table-toolbar="base">
                            <button data-bs-toggle="modal" data-bs-target="#kt_modal_view_info" data-id="${data.id}" class="btn btn-primary view-modal-btn">Bax</button>
                        </div>`;
             //  + StatusTranslates[data.newStatus] + ' statusuna dəyişdirildi';
             // 
             container.append(newToast);

             // Create new toast instance --- more info: https://getbootstrap.com/docs/5.1/components/toasts/#getorcreateinstance
             let toast = bootstrap.Toast.getOrCreateInstance(newToast);

             // Toggle toast to show --- more info: https://getbootstrap.com/docs/5.1/components/toasts/#show
             toast.show();

             window.datatable.draw();
         })
     });
 </script>
