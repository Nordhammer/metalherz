        <section class="breadcrumb">
            {BREADCRUMB}
        </section>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <section class="">
                <div class="row">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <form action="/anmelden" method="post" accept-charset="utf-8">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="username" class="form-control" placeholder="" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="password">Kennwort</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>

                            <button type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" name="submit">Anmelden</button>
                            <hr class="my-4">
                            <button type="submit" class="btn btn-lg btn-danger btn-block text-uppercase" name="submit2">Kennwort wiederherstellen</button>
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