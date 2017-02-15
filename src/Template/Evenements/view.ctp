<div class="col-md-6 col-md-offset-2">
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            </div>
<div class="panel-body">
    <div class="media">
        <div class="media-left">
            <?php echo $this->Html->image($evenement->url_evenement, [
                "alt" => $evenement->nom_evenement,
                'url' => ['controller' => 'evenements', 'action' => 'view', $evenement->id]
            ]); ?>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?= h($evenement->description)?></h4>


            <div class="clearfix"></div>

        </div>
        <div class="clearfix"></div>
        <div class="media-left">
            <label class="label label-warning">Adresse : </label>&nbsp;
            <span class="label label-warning"><?= h($evenement->adresse)?></span><br>
            <label class="label label-info">Date de début : </label>&nbsp;
            <span class="label label-info"><?= h($evenement->date_debut)?></span>&nbsp;
            <label class="label label-info">Date de fin : </label>&nbsp;
            <span class="label label-info"><?= h($evenement->date_fin)?></span><br>
            <label class="label label-info">Prix de base : </label>&nbsp;
            <span class="label label-info"><?= h($prixUnitaire.'€')?></span>&nbsp;
            <label class="label label-info">Prix aprés remise : </label>&nbsp;
            <span class="label label-info"><?= h($prixTotale.'€')?></span>
        </div>
        <div class="clearfix"></div>
        <div class="media-body">
            <?php if ($reservationExist1 == false ):
              echo $this->Html->link(
                'Je réserve',
                ['controller' => 'reservations', 'action' => 'addReservationAndParticipant',$evenement->id]
                ,['class'=>'btn btn-primary','style'=>'float: right;']
            );
            ?>
            <?php elseif($reservationExist1 == true):
                echo $this->Html->link('Payer : '.$prixTotale.'€',
                ['controller' => 'Paiements', 'action' => 'add',$reservationExist11->first()->id]
                ,['class'=>'btn btn-info ','style'=>'float: right;']
            );
            ?>

            <?php endif; ?>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="BCUR4HBLAHK9Q">
                <table>
                    <tr><td><input type="hidden" name="on0" value="Vous etes">Vous etes</td></tr><tr><td><select name="os0">
                                <option value="Etudiant">Etudiant €350.00 EUR</option>
                                <option value="Memebre EEE">Memebre EEE €500.00 EUR</option>
                                <option value="Memebre AMC">Memebre AMC €550.00 EUR</option>
                                <option value="Normal">Normal €600.00 EUR</option>
                            </select> </td></tr>
                </table>
                <input type="hidden" name="currency_code" value="EUR">
                <input type="image" src="https://www.paypalobjects.com/fr_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
                <img alt="" border="0" src="https://www.paypalobjects.com/fr_XC/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>

    </div>
</div>
    </div>
    </div>