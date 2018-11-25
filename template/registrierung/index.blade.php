<section class="breadcrumb">
            {BREADCRUMB}
        </section>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <section class="">
                <h2 class="mb-1">
                    Registrierung
                </h2>
                <h3 class="mb-3 ">
                    Registriere Dich kostenlos!
                </h3>
                <div class="alert alert-info" role="alert">Melde Dich auf metalherz.de an und schreibe eigene Blogbeiträge oder werde ein Teil unserer Leserschaft und kommentiere das was unsere Autoren schreiben. Hier bekommt jeder seine Chance. Zeig mit deinen Blogbeiträgen das Du weisst wovon du redest und zeig den anderen was ein Metaler ist.</div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <form action="/registrieren" method="POST" accept-charset="utf-8">
                            <div class="row">
                                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Name</label>
                                        <input class="form-control form-control-lg text-center" name="username" value="{USERNAME}" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email</label>
                                        <input class="form-control form-control-lg text-center" name="mail" value="{MAIL}" placeholder="" type="email">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <button class="btn btn-info btn-4xl btn-block" name="submit">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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