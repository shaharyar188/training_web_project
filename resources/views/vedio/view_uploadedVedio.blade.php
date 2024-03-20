@extends('layouts.app')
@section('main-content')
    <!-- End Page Header -->
    <!-- Row -->
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header">
                    <h2 class="">Manage Videos</h2>
                </div>

                <div class="card-body ">

                    <div class="table-responsive  ">
                        <table id="tabledata" class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <td style="font-size: 12px;">Sr No</td>
                                <td style="font-size: 12px;">Title</td>
                                <td style="font-size: 12px;"> Video</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $num = 1;
                            ?>
                            @foreach ($data as $da)
                                <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ ucfirst($da->title) }}</td>
                                    <td>
                                            <?php
                                        if($da->video){
                                            ?>
                                        <a href="{{ 'video/' . $da->video }}" title="{{ $da->video }}"
                                           type="button" data-detail='{{ $da->id }}' target="_blank"
                                           class="btn  btn-sm btn-secondary detail_faq cursor-pointer">
                                            <span class="fas  fa-eye"> </span>
                                        </a>
                                            <?php
                                        }else {
                                            ?>
                                        <a href="{{ $da->video_url }}" target="_blank"
                                           class="btn  btn-sm btn-secondary detail_faq cursor-pointer"><span
                                                class="fas  fa-eye"> </span></a>

                                            <?php
                                        }
                                            ?>
                                    </td>
                                    <td>
                                        @if ($da->video != '')
                                            <button title="Download Video" type="button"
                                                    data-video="{{ $da->video }}"
                                                    class="btn  btn-sm btn-primary downloadRecord">
                                                <span class="fas fa-download"> </span>
                                            </button>
                                        @endif
                                        <button title="Remove" type="button" data-video="{{ $da->id }}"
                                                class="btn  btn-sm btn-danger deleteRecord">
                                            <span class="fe fe-trash-2"> </span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on("click", ".deleteRecord", function(e) {
                e.preventDefault()
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#b31e1e !important",
                    cancelButtonColor: "#b31e1e !important",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        var deleteId = $(this).data("video");

                        var element = this;
                        $.ajax({
                            url: `{{ url('/upload_video/${deleteId}') }}`,
                            method: "DELETE",
                            success: function(response) {
                                if (response == 200) {
                                    Swal.fire({
                                        toast: true,
                                        icon: "success",
                                        title: "Video Deleted Successfully..!",
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
                                        title: "Video Not Deleted ..!",
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
            });
        })
    </script>
    {{-- download button --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.downloadRecord').forEach(function(element) {
                element.addEventListener('click', function(event) {
                    event.preventDefault();
                    var videoFilename = this.getAttribute('data-video');
                    var downloadUrl = './video/' + videoFilename;
                    var a = document.createElement('a');
                    a.href = downloadUrl;
                    a.download = videoFilename;
                    a.style.display = 'none';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                });
            });
        });
    </script>
@endsection
