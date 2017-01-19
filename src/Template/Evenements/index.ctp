<div class="col-md-1 sidebar">
    <ul class="nav nav-sidebar">

    </ul>

</div>

<div class="col-md-6 col-md-offset-1">
    <?php foreach ($evenements as $evenement): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="#" class="MakaleYazariAdi"><?= h($evenement->nom_evenement)?></a>
            <div class="btn-group" style="float:right;">
            	<button type="button" class="btn btn-danger" >Je participe
            	</button>
            </div>
            <div class="clearfix"></div>
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
                    <label class="label label-warning">Adresse : </label>&nbsp;
                    <span class="label label-warning"><?= h($evenement->adresse)?></span>
                <div class="clearfix"></div>
                <div class="btn-group" role="group" id="BegeniButonlari">
                    <label class="label label-info">Prix : </label>&nbsp;
                    <span class="label label-info"><?= h($evenement->prix_unitaire_extra_page)?></span>
                </div>                 
               </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Précedent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
<div class="col-md-3">
    <h3 class="h3">Les prix des inscriptions :</h3>

    <table class="table table-striped table-hover">
        <tr>
            <th>Description</th>
            <th>Enregistrement tôt</th>
            <th>Prix normal</th>
        </tr>
        <?php
        //ceci est inspiré de la part des anciens 
        ?>
    </table>
</div>
