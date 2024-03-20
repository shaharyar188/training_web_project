@extends('layouts.app')

@section('main-content')
    <div class="row mt-3">

        <div class="col-lg-12">

            <div class="modal fade effect-scale show" id="exampleModalLong" style="display: none; padding-left: 0px;"
                aria-modal="true" role="dialog">

                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content modal-content-demo">

                        <div class="modal-header">

                            <h6 class="modal-title">FAQs Details</h6>

                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"
                                style="border: none;background: none;font-size: 23px;font-weight: bold;" id="close_modal">

                                <span aria-hidden="true">×</span>

                            </button>

                        </div>

                        <div class="modal-body p-4">

                            <div class="row">

                                <div class="col-sm-12 col-md-12">

                                    <div class="card custom-card">

                                        <div class="card-body">

                                            <div aria-multiselectable="true" class="collapse show" id="accordion"
                                                role="tablist">

                                                <div class="card show mb-3">

                                                    <div class="card-header" id="headingOne" role="tab">

                                                        <a aria-controls="collapseOne" aria-expanded="true"
                                                            data-bs-toggle="collapse" href="#collapseOne"
                                                            id="Detail_question">

                                                            Question Detail

                                                        </a>

                                                    </div>

                                                    <div aria-labelledby="headingOne" class="collapse show"
                                                        data-bs-parent="#accordion" id="collapseOne" role="tabpanel">

                                                        <div class="card-body" id="detail_answer"></div>

                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                        <div class="imgAppend"></div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Ensure proper closure of the previous div -->

            <div class="card custom-card">

                <div class="card-header">

                    <h2 class="main-content-title tx-24 mg-b-5">Manage FAQs</h2>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table id="tabledata" class="table table-hover table-bordered">

                            <thead>

                                <tr>

                                    <td style="font-size: 12px;">Sr No</td>

                                    <td style="font-size: 12px;">Question</td>

                                    <td style="font-size: 12px;">Image</td>

                                    <td style="font-size: 12px;">Actions</td>

                                </tr>

                            </thead>

                            <tbody>

                                @php $num = 1; @endphp

                                @forelse ($faq as $fa)
                                    <tr>

                                        <td>{{ $num++ }}</td>

                                        <td style="text-wrap: balance">{{ ucfirst($fa->question) }}</td>
                                        <td>
                                            @php
                                                $fetchImage = $fa->faq_image;
                                                $explodeImg = explode(',', $fetchImage);
                                            @endphp

                                            @foreach ($explodeImg as $key => $value)
                                                @if ($value != '')
                                                    <div style="position: relative; display: inline-block;"
                                                        class="delImage_{{ $key }}">

                                                        <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                                        href="{{asset('./images/' . $value) }}">
                                                        <div
                                                            class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-200px">
                                                            <div class="symbol symbol-200px mb-2 ">
                                                                <img src="{{ asset('./images/' . $value) }}" width="100px"
                                                                height="100px" alt="Image" style="padding: 7px;margin-left: 10px; border: 2px solid #e6d0d0;">  <i class="badge rounded-pill bg-secondary text-white fe fe-trash-2 editImg"
                                                                style="position: absolute; top: 0; right: 1px; margin-top: -10px;cursor:pointer"
                                                                data-delImageid="{{ $fa->id }}"
                                                                data-delImageKey="{{ $key }}"> </i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    </div>
                                                @else
                                                    <h5><span class="badge badge-primary">No Image</span></h5>
                                                @endif
                                            @endforeach

                                        </td>

                                        <td>

                                            <button title="Remove" type="button" data-delete='{{ $fa->id }}'
                                                class="btn  btn-sm btn-danger deleteBtn">

                                                <span class="fe fe-trash-2"> </span>

                                            </button>
                                            <button title="Answer Details" type="button" data-detail='{{ $fa->id }}'
                                                class="btn  btn-sm btn-secondary detail_faq">

                                                <span class="fas  fa-eye"> </span>

                                            </button>
                                            <a href="" type="button" class="btn btn-sm btn-primary editFaq"
                                                title="Edit" data-editFaqId="{{ $fa->id }}">
                                                <span class="fe fe-edit"></span>
                                            </a>

                                        </td>

                                        <td>

                                        </td>
                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="4">Data not Found</td>

                                    </tr>
                                @endforelse
                            </tbody>
                            <div class="modal" id="modaldemo1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Edit FAQs</h6><button aria-label="Close" class="close"
                                                data-dismiss="modal" type="button"><span
                                                    aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mt-3 ">
                                                <div class="col-10 mx-auto">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form id="editForm" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <label for=""><strong>Question :</strong></label>
                                                                <input type="text" name="question"
                                                                    class="form-control" id="editQuestion"> <br>
                                                                <label for=""><strong>Answer :</strong></label>
                                                                <input type="hidden" name="hiden" id="hidden">
                                                                <input type="text" name="answer" class="form-control"
                                                                    id="editAnswer"> <br>
                                                                <label for="">Image</label>
                                                                <input type="file" name="image[]" class="form-control"
                                                                    multiple>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="button" id="submitData">Update
                                                Faq</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $(document).on("click", ".detail_faq", function(e) {

                e.preventDefault();

                var Detail_id = $(this).data('detail');

                $.ajax({

                    url: `{{ url('/faq/${Detail_id}show') }}`,

                    method: "GET",

                    dataType: "JSON",

                    contentType: false,

                    processData: false,

                    success: function(res) {

                        if (res.message == 200) {
                            $(".imgAppend").empty();
                            $.each(res.img, function(key, value) {
                                var baseUrl = "{{ asset('') }}";
                                $(".imgAppend").append("<img  src='" + baseUrl +
                                    "images/" + value +
                                    "'  class=' br-3 card img-fluid d-inline' width='25%' height='25%' style='padding: 7px;margin-left: 10px; border: 2px solid #e6d0d0; margin-bottom:7px;' id='lightgallery'>   "
                                );

                            });


                            $("#exampleModalLong").modal('show');

                            $("#Detail_question").empty();

                            $("#detail_answer").empty();

                            $("#Detail_answer").empty();

                            $("#Detail_question").append(

                                "<span class='badge badge-primary mx-3 '>Question </span>" +

                                '<strong style="font-size:14px;    color:#080808">' +

                                res.data.question + '</strong>')

                            $("#detail_answer").append(

                                "<span class='badge badge-info mx-3'>Answer </span>" +

                                '<span style="font-size:14px; color:#0b0b12;">' +

                                res.data.answer + '</span>')



                        }



                    }

                })

            })

            $(document).on("click", ".deleteBtn", function(e) {

                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });

                e.preventDefault()

                Swal.fire({

                    title: "Are you sure?",

                    text: "You won't be able to revert this!",

                    icon: "warning",

                    showCancelButton: true,

                    confirmButtonColor: "#e12334",

                    cancelButtonColor: "#d33",

                    confirmButtonText: "Yes, delete it!",

                }).then((result) => {

                    if (result.isConfirmed) {

                        var deleteId = $(this).data("delete");

                        var element = this;

                        $.ajax({

                            url: `{{ url('/faq/${deleteId}') }}`,

                            method: "DELETE",

                            success: function(response) {

                                if (response.message == 200) {

                                    Swal.fire({

                                        toast: true,

                                        icon: "success",

                                        title: "Data Deleted Successfully..!",

                                        animation: false,

                                        position: "top-right",

                                        showConfirmButton: false,

                                        timer: 3000,

                                        timerProgressBar: true,

                                    });

                                    $(element).closest("tr").fadeOut();

                                } else {

                                    Swal.fire({

                                        toast: true,

                                        icon: "error",

                                        title: "Data Not Deleted ..!",

                                        animation: false,

                                        position: "top-right",

                                        showConfirmButton: false,

                                        timer: 3000,

                                        timerProgressBar: true,

                                    });

                                }

                            },

                        });

                    }

                })

            })

            $(document).on("click", "#close_modal", function(stop) {

                stop.preventDefault();

                $("#exampleModalLong").modal('hide');

            })
            $(document).on("click", ".editImg", function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var delImgId = $(this).data('delimageid');
                var delImageKey = $(this).data('delimagekey');
                $.ajax({
                    url: `{{ url('/delSingleImg') }}/${delImgId}`,
                    method: "PUT",
                    data: {
                        imgKey: delImageKey,
                    },
                    success: function(res) {
                        $(".delImage_" + res.key).fadeOut();

                    }
                })
            })
            $(document).on("click", ".editFaq", function(e) {
                e.preventDefault();
                //   $("#modaldemo1").modal('show');
                var faqId = $(this).data('editfaqid');
                $.ajax({
                    url: `{{ url('/faq/${faqId}/edit') }}`,
                    method: "GET",
                    success: function(res) {
                        if (res.message == 200) {
                            $("#modaldemo1").modal('show')
                            $("#hidden").val(res.data.id)

                            $("#editQuestion").val(res.data.question)
                            $("#editAnswer").val(res.data.answer)

                        }
                    }
                })
            })
            $(document).on("click", "#submitData", function(e) {
                e.preventDefault()
                var id = $('#hidden').val()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var submitdata = new FormData(editForm);
                $.ajax({
                    url: `{{ url('/faq/${id}') }}`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: submitdata,
                    success: function(res) {
                        if (res.message == 200) {
                            $("#modaldemo1").modal('hide');
                            Swal.fire({
                                toast: true,
                                icon: "success",
                                title: "FAQ update Successfully..!",
                                animation: false,
                                position: "top-right",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            }).then(() => {
                                // Reload the page after SweetAlert is closed
                                setInterval(() => {
                                    location.reload();
                                }, 500);
                            });
                        }

                    }
                })
            })
        })
    </script>
@endsection
