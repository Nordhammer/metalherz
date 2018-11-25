<section class="breadcrumb">
            {BREADCRUMB}
        </section>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <section class="nutzerbild">
                <div class="container">
                    <div class="row">
                        <div>
                            <h2 class="mb-1"><strong>Nutzerbild bearbeiten</strong></h2>
                            <h3 class="mb-5">
                                Untertitel
                            </h3>

                            <div class="mb-5">
                                <img class="img-fluid" src="{AVATAR}" alt="avatar">
                                <hr>
                            </div>

                            <!-- Standar Form -->
                            <h4>Select files from your computer</h4>
                            <form class="mb-3" action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <input type="file" name="files[]" id="js-upload-files" multiple>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload</button>
                                </div>
                            </form>

                            <!-- Drop Zone -->
                            <h4>Or drag and drop files below</h4>
                            <div class="upload-drop-zone mb-3" id="drop-zone">
                                Just drag and drop files here
                            </div>

                            <!-- Progress Bar -->
                            <div class="progress mb-5">
                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>

                            <!-- Upload Finished -->
                            <div class="js-upload-finished mb-5">
                                <h3>Processed files</h3>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
                                    <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-02.jpg</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <section class="sidebar">
            
                {LOGIN}

                {SUCHE}

            </section>
        </div>