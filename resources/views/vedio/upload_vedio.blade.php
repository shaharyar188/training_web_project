@extends('layouts.app')
@section('main-content')
    <div class="row mt-5">
        <div class="col-lg-12 col-md-12 mx-auto">
            <div class="card custom-card">
                <div class="card-header">
                    <h5>Upload Videos</h5>

                </div>
                <div class="card-body">
                    <form id="formData">
                        @csrf
                        <div class="row ">
                            <div class="col-md-4">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Your Title"
                                       required>
                                <strong id="title" class="text-danger"></strong> <br>
                            </div>
                            <div class="col-md-4">
                                <label for=""> Select Category </label>
                                <select name="category" id="get_category" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach($allcategory as $category)
                                        <option value="{{$category->id}}">{{ucfirst($category->category_name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for=""> Select Subcategory </label>
                                <select name="subcategory" id="get_subcategory" class="form-control">
                                    <option value="">--Select Category First--</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for=""> Select File </label>
                                <select name="video_source" id="video_source" class="form-control">
                                    <option value="">Select option</option>
                                    <option value="get_url">UPLOAD FILE</option>
                                    <option value="online_url">URL</option>

                                </select>
                            </div>
                            <div class="col-md-6 mt-2" id="upload_video" style="display: none">
                                <label for="">Upload Video</label>
                                <input type="file" name="upload_video" onchange="FileValidation(this)"
                                       class="form-control">
                                <strong id="upload_video" class="text-danger"></strong>
                                <div id="myProgress" class="mt-5 progress">
                                    <div id="myBar" class="progress-bar progress-bar-striped progress-bar-animated"
                                         role="progressbar"></div>
                                </div>
                                <style>
                                    #myProgress {
                                        width: 100%;
                                        background-color: whitesmoke;
                                        border-radius: 20px;
                                        display: none;
                                    }

                                    #myBar {
                                        height: 10px;
                                        background-color: #11235A;
                                        width: 1%;
                                    }
                                </style>
                            </div>
                            <div class="col-md-6 mt-2" id="online_url_section" style="display: none">
                                <label for="">Enter Video Url </label>
                                <input type="url" name="video_url" class="form-control" placeholder="Enter Video Url"
                                       onchange="FileValidation(this)">
                            </div>
                            <div class="col-md-12 mt-4">
                                <h4><i class="fa fa-video-camera"></i>
                                    {{ ucwords('Video Details') }}</h4>
                                <hr>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div id="campaign_fields">
                                    <div id="campaign_fields_attr_1" class="mt-3 mb-3 ps-3 pe-3"
                                         style="background-color: whitesmoke">
                                        <div class="row mt-3 p-3">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mt-3"
                                                        onclick="add_more();">Add Section</button>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label for="form-label">Title <span class="text-muted">(Heading)</span> *
                                                </label>
                                                <input type="hidden" value="1" name="side[]" multiple>
                                                <input type="text" name="video_detail_heading[]" multiple class="form-control"
                                                       placeholder="Enter Template Title" required>
                                                <strong class="text-danger" id="video_detail_heading"></strong>
                                            </div>
                                            <div class="col-12 mt-2 mb-3">
                                                <label for="form-label">Description * </label>
                                                <div id="description_fields_1">
                                                    <div id="description_fields_attr_1">
                                                        <div class="input-group">
                                                            <input type="text" name="video_detail_description_1[]" multiple
                                                                   oninput="get_description()" class="form-control"
                                                                   placeholder="Enter the Description" aria-label="Username"
                                                                   aria-describedby="basic-addon1" required>
                                                            <span
                                                                class="input-group-text cursor-pointer bg-primary text-white"
                                                                id="basic-addon1" style="cursor: pointer" onclick="add_more_field();">+</span>
                                                        </div>
                                                    </div>
                                                    <strong class="text-danger" id="email_template_description"></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4 d-flex justify-content-end">
                                <button class="btn rounded text-white btn-primary"
                                        id="uploadButton"><i class="fas fa-upload"></i> Upload Video</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function FileValidation(element) {
            var fileInput = element;
            var file = fileInput.files[0];
            var ext = file.name.split('.').pop().toLowerCase();
            var allowedExtensions = ["mp4", "avi", "mkv"];
            if (!allowedExtensions.includes(ext)) {
                Swal.fire({
                    toast: true,
                    icon: 'error',
                    title: 'Please select a file with a valid video extension (mp4, avi, mkv)...!',
                    animation: false,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
                fileInput.value = "";
                return false;
            }
            return true;
        }
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function move() {
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 10);

                function frame() {
                    if (width >= 100) {
                        clearInterval(id);
                    } else {
                        width++;
                        elem.style.width = width + "%";
                    }
                    if (width >= 100 && elem.style.width !== "100%") {
                        clearInterval(id);
                        elem.style.width = "0%";
                        width = 1;
                    }
                }

                return {
                    stop: function() {
                        clearInterval(id);
                        elem.style.width = "0%";
                        width = 1;
                    },
                    getCurrentWidth: function() {
                        return width;
                    },
                    reset: function(originalWidth) {
                        clearInterval(id);
                        elem.style.width = originalWidth + "%";
                        width = originalWidth;
                    }
                };
            }

            $(document).on("click", "#uploadButton", function(e) {
                e.preventDefault();
                $("#myProgress").show();
                var progressBar = move();
                const button = document.getElementById("uploadButton");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                var originalWidth = progressBar.getCurrentWidth();

                setTimeout(function() {
                    button.removeAttribute("disabled");
                    button.innerHTML = "+Upload";
                    var Data = new FormData(formData);
                    $.ajax({
                        url: `{{ url('/upload_video') }}`,
                        method: "POST",
                        data: Data,
                        contentType: false,
                        processData: false,
                        success: function(res) {
                            if (res.message == 200) {
                                button.removeAttribute("disabled");
                                button.innerHTML = "Upload";
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title: "Video Uploaded Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                setInterval(function() {
                                    window.location.reload();
                                }, 2000);
                            } else {
                                progressBar.stop();
                                Swal.fire({
                                    toast: true,
                                    icon: "error",
                                    title: "Video not inserted Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });

                                progressBar.reset(originalWidth);
                            }
                        },
                        error: function(error) {
                            progressBar.stop();
                            var error = error.responseJSON;
                            $.each(error.errors, function(key, value) {
                                $("#" + key).empty();
                                $("#" + key).append(value);

                            });
                        }
                    });
                }, 1000);
            });
        });
        $(document).on("change", "#video_source", function() {
            var selectedOption = $(this).val();
            $("#upload_video").css('display', 'none');
            $("#online_url_section").css('display', 'none');
            if (selectedOption == "get_url") {
                $("#upload_video").fadeOut(0, function() {
                    $("#upload_video").fadeIn(1000);
                });
            } else if (selectedOption == "online_url") {
                $("#online_url_section").fadeOut(0, function() {
                    $("#online_url_section").fadeIn(1000);
                });
            }

        })
        $(document).on("change", "#get_category", function(stop) {
            stop.preventDefault();
            var selectedOption = $(this).val();
            $.ajax({
                url:`{{url('/get_subcategory/${selectedOption}')}}`,
                method:"GET",
                success:function(response){
                    $("#get_subcategory").empty();
                    $("#get_subcategory").append("<option value='' disabled>--Select Subcategory--</option>");
                    $.each(response,function (key,value){
                        $("#get_subcategory").append("<option value='"+value.id+"'>"+value.subcat_name+"</option>");
                    });
                }
            })
        })
        var count_filed = 1;

        function add_more() {
            count_filed++;
            var field_html = "<div id='campaign_fields_attr_" + count_filed +
                "' class='mt-3 mb-3 ps-3 pe-3'  style='background-color: whitesmoke'><div class='row mt-3 p-3'><div class='col-12 d-flex justify-content-end'><button type='button' class='btn btn-danger waves-effect waves-light mt-3' onclick='remove(" +
                count_filed +
                ");'>Remove Section</button></div><div class='col-12 mt-3'><label for='form-label'>Title <span class='text-muted'>(Heading)</span> *</label><input type='hidden' value='" +
                count_filed +
                "' name='side[]' multiple><input type='text' name='video_detail_heading[]' multiple class='form-control' placeholder='Enter Template Title' required><strong class='text-danger' id='video_detail_heading'></strong></div><div class='col-12 mt-2 mb-3'><label for='form-label'>Description * </label><div id='description_fields_" +
                count_filed +
                "'><div id='description_fields_attr_1'><div class='input-group'><input type='text' name='video_detail_description_" +
                count_filed +
                "[]' multiple class='form-control' placeholder='Enter the Description' aria-label='Username' aria-describedby='basic-addon1' required><span class='input-group-text cursor-pointer bg-primary text-white' id='basic-addon1' style='cursor: pointer' onclick='add_more_field();'>+</span></div></div><strong class='text-danger' id='email_template_description'></strong></div></div></div></div>";
            jQuery("#campaign_fields").append(field_html);
        }

        function remove(count) {
            jQuery("#campaign_fields_attr_" + count).remove();
        }
        var count = 1;

        function add_more_field() {
            count++;
            var html =
                "<div id='description_fields_attr_" + count +
                "'><div class='input-group mt-2'><input type='text' name='video_detail_description_" + count_filed +
                "[]' multiple   class='form-control' placeholder='Enter the Description' aria-label='Username' aria-describedby='basic-addon1' required><span class='input-group-text cursor-pointer bg-danger text-white' id='basic-addon1' style='cursor: pointer' onclick='remove_field(" +
                count +
                ");'>-</span></div></div><strong class='text-danger' id='email_template_description'></strong>"
            jQuery("#description_fields_" + count_filed).append(html);
        }

        function remove_field(count) {
            jQuery("#description_fields_attr_" + count).remove();
        }
    </script>
@endsection
