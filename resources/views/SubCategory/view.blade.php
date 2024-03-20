@extends('layouts.app')
@section('main-content')
    <div class="row mt-3">

        <div class="col-lg-12">
            {{--
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

            </div> --}}

            <!-- Ensure proper closure of the previous div -->

            <div class="card custom-card">

                <div class="card-header">

                    <h2 class="main-content-title tx-24 mg-b-5">Manage SubCategory</h2>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table id="tabledata" class="table table-hover table-bordered">

                            <thead>

                                <tr>

                                    <td style="font-size: 12px;">Sr No</td>

                                    <td style="font-size: 12px;">Main Category</td>

                                    <td style="font-size: 12px;">Subcategory Name</td>
                                    <td style="font-size: 12px;">Status</td>

                                    <td style="font-size: 12px;">Actions</td>

                                </tr>

                            </thead>

                            <tbody>

                            </tbody>
                            {{-- <div class="modal" id="modaldemo1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Edit Category</h6><button aria-label="Close"
                                                class="close" data-dismiss="modal" type="button" id="clodeModel"><span
                                                    aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mt-3 ">
                                                <div class="col-10 mx-auto">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form id="editForm">
                                                                @method('PUT')
                                                                <label for="">Category Name</label>
                                                                <input type="hidden" name="hidden" id="hidden">
                                                                <input type="text" name="edit_category_name"
                                                                    class="form-control" placeholder="Enter Your Category"
                                                                    id="editCategory">

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="button" id="updateData">Update
                                                Category</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
