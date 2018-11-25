        <section class="breadcrumb">
            {BREADCRUMB}
        </section>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">

            <!-- Blog Post -->
            <section class="content">
                <div class="row">
                    <div class="container">
                        <h2><strong>{TOPIC}</strong></h2>
                        
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <i class="far fa-calendar"></i> {CREATED}
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <i class="far fa-sticky-note"></i> {CATEGORY}
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <i class="far fa-comments"></i> <a class="js-scroll-trigger" href="{BLOG_COMMENT_PATH}" title="">{ALL_COMMENTS}</a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <i class="far fa-eye"></i> {ALL_VISITS}
                            </div>
                        </div>

                        <figure class="mbr-figure">
                            <div class="image-block">
                                <img class="img-fluid" src="{IMAGE_PATH}" alt="{IMAGE_ALT}" title="" media-simple="true">
                                <figcaption class="mbr-figure-caption mbr-figure-caption-over">
                                    <p class="text">{IMAGE_DESCRIPTION}</p>
                                </figcaption>
                            </div>
                        </figure>

                        <div class="row mt-3">
                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="row">
                                    <div class="col-9 col-sm-9 col-md-6 col-lg-6 col-xl-6">
                                        <img class="d-flex mr-3 rounded-circle img-thumbnail img-comment img-fluid" src="{AVATAR}" alt="">
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-6 col-lg-6 col-xl-6 mt-4">
                                        <ul>
                                            <li><a href="{USERPATH}" title=""><strong>{USERNAME}</strong></a></li>
                                            <li>{USERRANK}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="mt-3">{FIRST_CONTENT}</p>
                        
                        

                        <blockquote class="my-3">Nullam at tellus a ante dictum sagittis. Aenean malesuada, turpis non aliquam blandit, nisl dui pellentesque tortor, malesuada consectetur sem lectus sed lacus. Nulla nec turpis mattis dui ornare blandit. Ut leo nisl, tempus ut bibendum in, iaculis quis felis. Aliquam et lorem vel dolor tincidunt vulputate vel sed lacus. Morbi tristique elementum vehicula. Duis sem tellus, porta in leo sed, porttitor aliquet magna. Ut cursus erat sed pulvinar semper. Donec gravida porttitor arcu, sed vulputate libero. Morbi non justo ac tellus tempus ornare. Nam tortor augue, commodo eget lobortis non, consectetur eget eros. In hac habitasse platea dictumst. Nam congue odio neque, in tempus sapien faucibus non.&nbsp;</blockquote>

                    </div>

                    <!--
                    <div class="tags">
                        <span>Schlagwörter: </span>{TAGS}
                    </div>
                    -->
                    
                </div>
            </section>

            <!-- comments -->
            <h4 id="kommentare">{ALL_COMMENTS}</h4>
            <hr>

            <!-- Comments Form -->
            <form class="mb-5" action="{CREATE_COMMENT_PATH}" method="POST">
                <div class="form-group">
                <textarea class="form-control" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-xl float-right">Posten</button>
                <div class="clearfix"></div>
            </form>

            <!-- Single Comment -->
            {KOMMENTARE}
            
            <!--
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle img-thumbnail img-comment" src="http://31.media.tumblr.com/tumblr_lw2lhqjrel1qfmi03o9_r1_500.gif" alt="">
                <div class="media-body">
                    <h5 class="mt-0 mb-0"><a href="/profil" title="">Name</a><small class="createDate ml-2"><i class="far fa-clock"></i> 13.09.18 19:38</small></h5>
                    <div class="d-inline mr-1">Kommentare: <strong>0</strong></div>
                    <div class="d-inline">Antworten: <strong>0</strong></div>
                    <p class="mt-3 mb-2">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <div class="row">
                        <div class="col-3 col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-4">
                            <a class="text-left" href="" title="Kommentar als lesenswert markieren">Markieren</a>
                        </div>
                        <div class="col-3 col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-4">
                            <a class="text-center" href="" title="Kommentar speichern">Speichern</a>
                        </div>
                        <div class="col-3 col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-4">
                            <a class="text-right collapsed" title="Auf Kommentar antworten" data-toggle="collapse" href="#com_id_1" aria-expanded="false" aria-controls="collapseExample">
                                Antworten
                            </a>
                        </div>

                        <div class="col-md-8">
                            <div class="d-inline mr-1"><i class="far fa-arrow-alt-circle-up"></i> <strong>0</strong></div>
                            <div class="d-inline"><i class="far fa-star"></i> <strong>0</strong></div>
                        </div>
                        <div class="col-md-4">
                            <a class="text-right" href="" title="Auf Kommentar antworten"><i class="far fa-comment"></i> 0 Antworten</a>
                        </div>

                    </div>

                    <div class="collapse mt-3" id="com_id_1">
                        <form action="/blog" method="POST">
                            <textarea class="form-control" rows="1"></textarea>
                            <button type="submit" class="btn btn-primary btn-xl float-right mt-3">Posten</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div> -->

            <!-- Comment with nested comments -->
            <!--
            <div class="media mb-4">

                <img class="d-flex mr-3 rounded-circle img-thumbnail img-comment" src="http://31.media.tumblr.com/tumblr_lw2lhqjrel1qfmi03o9_r1_500.gif" alt="">
                <div class="media-body">
                    <h5 class="mt-0 mb-0"><a href="/profil" title="">Name</a><small class="createDate ml-2"><i class="far fa-clock"></i> 23 STD.</small></h5>
                    <div class="d-inline mr-1">Kommentare: <strong>0</strong></div>
                    <div class="d-inline">Antworten: <strong>0</strong></div>
                    <p class="mt-3 mb-2">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                    <div class="row">
                        <div class="col-3 col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-4">
                            <a class="text-left" href="" title="Kommentar als lesenswert markieren">Markieren</a>
                        </div>
                        <div class="col-3 col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-4">
                            <a class="text-center" href="" title="Kommentar speichern">Speichern</a>
                        </div>
                        <div class="col-3 col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-4">
                            <a class="text-right collapsed" title="Auf Kommentar antworten" data-toggle="collapse" href="#com_id_2" aria-expanded="false" aria-controls="collapseExample">
                                Antworten
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="d-inline mr-1"><i class="far fa-arrow-alt-circle-up"></i> <strong>0</strong></div>
                            <div class="d-inline"><i class="far fa-star"></i> <strong>0</strong></div>
                        </div>
                        <div class="col-md-4">
                            <a class="text-right" href="" title="Auf Kommentar antworten"><i class="far fa-comment"></i> 0 Antworten</a>
                        </div>
                    </div>
                    <div class="collapse mt-3" id="com_id_2">
                        <form action="/blog" method="POST">
                            <textarea class="form-control" rows="1"></textarea>
                            <button type="submit" class="btn btn-primary btn-xl float-right mt-3">Posten</button>
                            <div class="clearfix"></div>
                        </form>
                    </div> -->

                    <!-- antwort auf kommentar -->
                    <!--
                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle img-thumbnail img-comment" src="http://31.media.tumblr.com/tumblr_lw2lhqjrel1qfmi03o9_r1_500.gif" alt="">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0"><a href="/profil" title="">Name</a><small class="createDate ml-2"><i class="far fa-clock"></i> 55 MIN.</small></h5>
                            <div class="d-inline mr-1">Kommentare: <strong>0</strong></div>
                            <div class="d-inline">Antworten: <strong>0</strong></div>
                            <p class="mt-3 mb-2">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                            <div class="row">
                                <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <a class="text-left" href="" title="Kommentar als lesenswert markieren">Markieren</a>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <a class="text-center" href="" title="Kommentar speichern">Speichern</a>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <a class="text-right collapsed" title="Auf Kommentar antworten" data-toggle="collapse" href="#com_id_3" aria-expanded="false" aria-controls="collapseExample">
                                        Antworten
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="d-inline mr-1"><i class="far fa-arrow-alt-circle-up"></i> <strong>0</strong></div>
                                    <div class="d-inline"><i class="far fa-star"></i> <strong>0</strong></div>
                                </div>
                                <div class="col-md-4">
                                    <a class="text-right" href="" title="Auf Kommentar antworten"><i class="far fa-comment"></i> 0 Antworten</a>
                                </div>
                            </div>
                            <div class="collapse mt-3" id="com_id_3">
                                <form action="/blog" method="POST">
                                    <textarea class="form-control" rows="1"></textarea>
                                    <button type="submit" class="btn btn-primary btn-xl float-right mt-3">Posten</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div> -->

                    <!-- antwort auf kommentar -->
                    <!--
                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle img-thumbnail img-comment" src="http://31.media.tumblr.com/tumblr_lw2lhqjrel1qfmi03o9_r1_500.gif" alt="">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0"><a href="/profil" title="">Name</a><small class="createDate ml-2"><i class="far fa-clock"></i> 35 SEK.</small></h5>
                            <div class="d-inline mr-1">Kommentare: <strong>0</strong></div>
                            <div class="d-inline">Antworten: <strong>0</strong></div>
                            <p class="mt-3 mb-2">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                            <div class="row">
                                <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <a class="text-left" href="" title="Kommentar als lesenswert markieren">Markieren</a>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <a class="text-center" href="" title="Kommentar speichern">Speichern</a>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <a class="text-right collapsed" title="Auf Kommentar antworten" data-toggle="collapse" href="#com_id_4" aria-expanded="false" aria-controls="collapseExample">
                                        Antworten
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="d-inline mr-1"><i class="far fa-arrow-alt-circle-up"></i> <strong>0</strong></div>
                                    <div class="d-inline"><i class="far fa-star"></i> <strong>0</strong></div>
                                </div>
                                <div class="col-md-4">
                                    <a class="text-right" href="" title="Auf Kommentar antworten"><i class="far fa-comment"></i> 0 Antworten</a>
                                </div>
                            </div>
                            <div class="collapse mt-3" id="com_id_4">
                                <form action="/blog" method="POST">
                                    <textarea class="form-control" rows="1"></textarea>
                                    <button type="submit" class="btn btn-primary btn-xl float-right mt-3">Posten</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->

            <!-- Pagination -->
            <!--
            <div class="row">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <ul class="pagination">
                        <li>
                            <a href="#!"><i class="fas fa-arrow-left"></i></a>
                        </li>
                        <li>
                            <a class="active" href="#!">1</a>
                        </li>
                        <li>
                            <a href="#!">2</a>
                        </li>
                        <li>
                            <a href="#!">3</a>
                        </li>
                        <li>
                            <a href="#!"><i class="fas fa-arrow-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            -->
        
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <section class="sidebar">

                {LOGIN}

                {SUCHE}

            </section>
        </div>