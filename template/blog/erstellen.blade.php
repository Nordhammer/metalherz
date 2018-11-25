<section class="breadcrumb">
            {BREADCRUMB}
        </section>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="row">
                <section class="">
                    <div class="row">
                        <div class="container">
                            <div class="col-md-12">

                                <h2 class="mb-1"><strong>Blog erstellen</strong></h2>
                                <h3 class="mb-3">
                                    dsgsdg
                                </h3>

                                <form role="form" class="" action="/blog-erstellen" method="POST" accept-charset="utf-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Blogtitel</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="topic" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inhalt">Artikel</label>
                                                <textarea class="form-control" name="content" cols="50" rows="15"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sprachen">Kategorien</label>
                                                <select class="form-control" name="category[]">
                                                    <option value="1" selected="selected">HTML5</option>
                                                    <option value="2" selected="selected">CSS3</option>
                                                    <option value="3">PHP7</option>
                                                    <option value="4">jQuery</option>
                                                    <option value="5">sql</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inhalt">Beschreibung (max. 156 Zeichen)</label>
                                                <textarea class="form-control" name="descript" cols="50" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <!--
                                        <div class="col-md-12">
                                            <div class="mb-5">
                                                <img class="img-fluid rounded" src="http://zoyothemes.com/blogezy/images/blog/blog-1.jpg" alt="avatar">
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <label for="file">Select files from your computer</label>
                                                    <input type="file" name="files[]" id="js-upload-files" multiple>
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="drop">Or drag and drop files below</label>
                                                <div class="upload-drop-zone mb-3" id="drop-zone">
                                                    Just drag and drop files here
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="progress mb-5">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="js-upload-finished mb-5">
                                                <h3>Processed files</h3>
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-01.jpg</a>
                                                    <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>image-02.jpg</a>
                                                </div>
                                            </div>
                                        </div>
                                        -->


                                    </div>
                                    <button type="button" class="btn btn-primary float-right" name="check">Prüfen</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <section class="sidebar">

                {LOGIN}

                {SUCHE}

            </section>
        </div>