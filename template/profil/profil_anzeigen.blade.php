<section class="breadcrumb">
            {BREADCRUMB}
        </section>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <section class="">
                <div class="container">
                    <div class="row">
                        <div>
                            <h2 class="mb-1"><strong>{USERNAME}</strong></h2>
                            <h3 class="mb-3">
                                {USERRANK}
                            </h3>

                            <ul>
                                <li>Mitglied seit: <strong>{SINCE}</strong></li>
                            </ul>

                            <a class="btn btn-danger btn-sm" href="{COM_PATH}" data-toggle="tooltip" data-placement="top" title="{ALL_USER_COMMENTS} eigene Kommentare">
                                <i class="far fa-comment"></i><br />{ALL_USER_COMMENTS}
                            </a>
                            <a class="btn btn-warning btn-sm" href="{ANS_PATH}" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                <i class="far fa-comments"></i><br />0
                            </a>
                            <a class="btn btn-success btn-sm" href="{VOTE_PATH}" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                <i class="far fa-arrow-alt-circle-up"></i><br />0
                            </a>
                            <a class="btn btn-primary btn-sm" href="{READ_PATH}" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                <i class="far fa-star"></i><br />0
                            </a>

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