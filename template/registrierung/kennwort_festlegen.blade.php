<section class="breadcrumb">
            {BREADCRUMB}
        </section>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <section class="">
                <div class="container">                
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mb-5"><strong>Kennwort festlegen</strong></h2>
                            <form action="/kennwort-festlegen" method="post" accept-charset="utf-8">
                              <div class="mb-3">
                                <label for="password">Kennwort</label>
                                <div class="form-group"> 
                                    <input type="password" name="password" class="form-control" placeholder="">
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="password2">Kennwort bestätigen</label>
                                <div class="form-group"> 
                                    <input type="password" name="password2" class="form-control" placeholder="">
                                </div>
                              </div>
                              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Senden</button>
                            </form>
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