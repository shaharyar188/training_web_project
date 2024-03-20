// $(document).ready(function() {
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     function move() {
        //         var elem = document.getElementById("myBar");
        //         var width = 1;
        //         var id = setInterval(frame, 10);

        //         function frame() {
        //             if (width >= 100) {
        //                 clearInterval(id);
        //             } else {
        //                 width++;
        //                 elem.style.width = width + "%";
        //             }
        //             if (width >= 100 && elem.style.width !== "100%") {
        //                 clearInterval(id);
        //                 elem.style.width = "0%";
        //                 width = 1;
        //             }
        //         }

        //         return {
        //             stop: function() {
        //                 clearInterval(id);
        //                 elem.style.width = "0%";
        //                 width = 1;
        //             }
        //         };
        //     }

        //     $(document).on("click", "#uploadButton", function(e) {
        //         e.preventDefault();
        //         $("#myProgress").show();
        //         var progressBar = move();
        //         const button = document.getElementById("uploadButton");
        //         button.innerHTML =
        //             "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
        //         button.setAttribute("disabled", "disabled");

        //         setTimeout(function() {
        //             button.removeAttribute("disabled");
        //             button.innerHTML = "+Upload";

        //             var Data = new FormData(formData);
        //             $.ajax({
        //                 url: `{{ url('/upload_video') }}`,
        //                 method: "POST",
        //                 data: Data,
        //                 processData: false,
        //                 contentType: false,
        //                 success: function(res) {
        //                     if (res.message == 200) {
        //                         button.removeAttribute("disabled");
        //                         button.innerHTML = "Upload";
        //                         Swal.fire({
        //                             toast: true,
        //                             icon: "success",
        //                             title: "Video Uploaded Successfully..!",
        //                             animation: false,
        //                             position: "top-right",
        //                             showConfirmButton: false,
        //                             timer: 3000,
        //                             timerProgressBar: true,
        //                         });
        //                         setInterval(function() {
        //                             window.location.reload();
        //                         }, 2000);
        //                     } else {
        //                         progressBar.stop();
        //                         Swal.fire({
        //                             toast: true,
        //                             icon: "error",
        //                             title: "Video not inserted Successfully..!",
        //                             animation: false,
        //                             position: "top-right",
        //                             showConfirmButton: false,
        //                             timer: 3000,
        //                             timerProgressBar: true,
        //                         });
        //                     }
        //                 },
        //                 error: function(error) {
        //                     progressBar.stop();
        //                     var error = error.responseJSON;
        //                     $.each(error.errors, function(key, value) {
        //                         $("#" + key).empty();
        //                         $("#" + key).append(value);
        //                     });
        //                 }
        //             });
        //         }, 1000);
        //     });
        // });
