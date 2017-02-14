<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contactez-nous <small>Une question, une remarque ? Contactez-nous !</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <?= $this->Form->create() ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom">
                                    Name</label>
                                <input type="text" class="form-control" id="nom" placeholder="Entrez nom" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                    <input type="email" class="form-control" id="email" placeholder="Entez email" required="required" /></div>
                            </div>
                            <div class="form-group">
                                <label for="sujet">
                                    Subject</label>
                                <select id="sujet" name="sujet" class="form-control" required="required">
                                    <option value="na" selected="">Selectionnez  un:</option>
                                    <option value="service">Support</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="product">Support produit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message">
                                    Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                      placeholder="Message"></textarea>
                            </div>
                        </div>
                        <?php  echo $this->Form->button('Envoyer', array(
                            'type' => 'submit',
                            'escape' => false,
                            'class'=>'btn btn-primary pull-right'
                        ));?>
                        <?= $this->Form->end() ?>
                        </div>
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <legend><span class="glyphicon glyphicon-globe"></span>Notre adresse</legend>
                <address>
                    <strong>Gevetik.</strong><br>
                    25 Boulevard de France<br>
                    91000 Évry, France<br>
                    <abbr title="Phone">
                        Téléphone:</abbr>
                    +33 1 64 85 35 07
                </address>
                <address>
                    <strong>Gevetik</strong><br>
                    <a href="mailto:gevetik@gmail.com">gevetik@gmail.com</a>
                </address>
            </form>
        </div>
    </div>
</div>
