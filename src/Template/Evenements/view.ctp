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

            <?php if ($reservationExist== -1):
              echo $this->Html->link(
                'Je réserve',
                ['controller' => 'reservations', 'action' => 'addReservationAndParticipant',$evenement->id]
                ,['class'=>'btn btn-primary','style'=>'float: right;']
            );
            ?>
            <?php else: echo $this->Html->link(
                'Payer : '.$prixTotale.'€',
                ['controller' => 'Paiements', 'action' => 'add',$reservationExist]
                ,['class'=>'btn btn-info ','style'=>'float: right;']
            );
            ?>

            <?php endif ?>
        </div>
    </div>
</div>
    </div>
    </div>