<section class="breadcrumb">
            {BREADCRUMB}
        </section>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <section class="">
                <div class="container">
                    <div class="row">
                        <div>
                            <h2 class="mb-1"><strong>Meine Daten</strong></h2>
                            <h3 class="mb-5">
                                Persönliche Angaben
                            </h3>

                            <form method="POST" action="http://www.metalherz.de/profil-bearbeiten" accept-charset="UTF-8">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Vorname</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nachname</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9 col-sm-9 col-md-10">
                                        <div class="form-group">
                                            <label for="name">Strasse</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-2">
                                        <div class="form-group">
                                            <label for="name">Nr.</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-2">
                                        <div class="form-group">
                                            <label for="name">PLZ</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9 col-sm-9 col-md-10">
                                        <div class="form-group">
                                            <label for="name">Stadt</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12">
                                	    <select class="form-control" name="land_id">
                                            <option value="0">Land auswählen</option>
                                            <option value="1" selected="selected">Deutschland</option>
                                            <option value="2">Österreich</option>
                                            <option value="3">Tschechische Republik</option>
                                            <option value="4">Frankreich</option>
                                            <option value="5">Großbritannien</option>
                                            <option value="6">Polen</option>
                                            <option value="7">Niederlande</option>
                                            <option value="8">Ungarn</option>
                                            <option value="9">Russland</option>
                                        </select>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="inhalt">Profiltext</label>
                                            <textarea class="form-control" name="inhalt" cols="50" rows="10"></textarea>
                                        </div>
                                    </div>

                                    
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Email-Adresse</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="name" id="name" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="name">Geburtstag</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="name" id="name" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="geschlecht_id">Geschlecht</label>
                                            <select class="form-control" name="gender_id">
                                                <option value="1" selected="selected">männlich</option>
                                                <option value="2">weiblich</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="sprachen">Sprachen</label>
                                            <select class="form-control" multiple="multiple" name="sprachen[]">
                                                <option value="1" selected="selected">deutsch</option>
                                                <option value="2" selected="selected">englisch</option>
                                                <option value="3">französisch</option>
                                                <option value="4">spanisch</option>
                                                <option value="5">polnisch</option>
                                                <option value="6">italienisch</option>
                                            </select>
                                          </div>
                                    </div>

                                </div>




                                <button type="submit" class="btn btn-primary btn-xl float-right">Speichern</button>
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