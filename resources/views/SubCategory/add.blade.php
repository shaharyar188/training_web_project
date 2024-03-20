@extends('layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-lg-6  mt-5 mx-auto">
            <div class="card custom-card">
                <div class="card-header">
                    <h3 style="font-size:17px ">Add SubCategory</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="form-group">
                            <form id="submitData">
                                <label for=""> Main Category :</label>
                                <select name="main_category" id="" class="form-control">
                                    @foreach ($category_name as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <strong id="man_category" class="text-danger"></strong><br>
                                <label for=""> SubCategory Name:</label>
                                <input class="form-control" placeholder="Enter your Subcategory Name" type="text"
                                    name="subcategory_name">
                                <strong id="subcategory_name" class="text-danger"></strong>
                            </form>
                        </div>
                    </div>
                    <button class="btn btn-primary  addCategory"
                        style="border-radius: 40px;background-color: #161959; float:right;" id="subcategory">Add
                        Subcategory
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
            $(document).on("click", "#subcategory", function(e) {
                const button = document.getElementById("subcategory");
                button.innerHTML =
                    "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                button.setAttribute("disabled", "disabled");
                setTimeout(function() {
                    button.removeAttribute("disabled");
                    button.innerHTML = "+ Add user";
                }, 500);
                e.preventDefault();
                var formData = new FormData(submitData);

                $.ajax({
                    url: `{{ url('sub_category') }}`,
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        alert(res)
                    }
                })
            })
        })
    </script>
@endsection
