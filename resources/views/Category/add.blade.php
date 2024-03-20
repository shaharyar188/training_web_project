@extends('layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-lg-6  mt-5 mx-auto">
            <div class="card custom-card">
                <div class="card-header">
                    <h3 style="font-size:17px ">Add Category</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="form-group">
                            <form id="submitData"  >
                                <label for=""> Category Name :</label>
                                <input class="form-control" placeholder="Enter your Category" type="text"
                                    name="category_name" >
                                <strong id="category_name" class="text-danger"></strong>
                            </form>
                        </div>
                    </div>
                    <button class="btn btn-primary  addCategory"
                        style="border-radius: 40px;background-color: #161959; float:right;" id="add_category">Add Category
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on("click", ".addCategory", function(stop) {
                stop.preventDefault();
                const button = document.getElementById("add_category");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                setTimeout(function() {
                    button.removeAttribute("disabled");
                    button.innerHTML = "+Add Category";
                }, 500);
                var submitform = new FormData(submitData);

                $.ajax({
                    url: `{{ url('/category') }}`,
                    method: "POST",
                    data: submitform,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.message == 200) {
                            button.removeAttribute("disabled");
                            button.innerHTML = " +Add Category";
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "Category added Successfully..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        } else {
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "some thing went wronge..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });
                        }
                    },error:function(error){
                        var error = error.responseJSON;
   $("#category_name").html(error.errors.category_name)
                    }
                })
            })
        })
    </script>
@endsection
