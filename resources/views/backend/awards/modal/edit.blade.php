
<div class="modal fade" id="edit_awards" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 ps-4 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Edit Call Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateawards','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label" for="update-name">Title</label>
                        <input type="text" name="name" class="form-control" id="update-name"  maxlength="100"
                               placeholder="Enter award title" />
                        <div class="invalid-feedback">
                            Please enter the name.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="update-subtitle">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" id="update-subtitle"  maxlength="100"
                               placeholder="Enter award subtitle" />
                        <div class="invalid-feedback">
                            Please enter the subtitle.
                        </div>
                    </div>
                    <label class="form-label">Image</label>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-10" style="margin: auto; width: 60%">
                                <img id="current-update-img"  src="{{asset('images/default-image.jpg')}}" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                <input  type="file" accept="image/png, image/jpeg" hidden
                                        id="work-foreground-img-file-update" onchange="loadbasicFile('work-foreground-img-file-update','current-update-img',event)" name="image"
                                        class="work-foreground-img-file-update" >

                                <figcaption class="figure-caption">Select your related image (250 x 190px).</figcaption>
                                <div class="invalid-feedback" >
                                    Please select a image.
                                </div>
                                <label for="work-foreground-img-file-update" class="profile-photo-edit btn btn-light feature-image-button">
                                    <i class="ri-image-edit-line align-bottom me-1"></i> Add  Image
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="call-action-update-button" >Update</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div>
