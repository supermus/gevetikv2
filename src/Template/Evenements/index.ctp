<div class="col-md-1 sidebar">
    <ul class="nav nav-sidebar">

                <li><?= $this->Html->link(__('Ajouter un evenement '), ['action' => 'add']) ?> </li>

            </ul>
        </div>
<?php
//debug($evenements);
//die();
?>

<div class="col-md-6 col-md-offset-1">
    <br>
    <?php foreach ($evenements as $evenement): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $this->Html->link($evenement->nom_evenement, ['controller' => 'evenements', 'action' => 'view', $evenement->id]); ?>
            <div class="btn-group" style="float:right;">
                <?php echo $this->Html->link(
                'Lire la suite',
                ['controller' => 'evenements', 'action' => 'view',$evenement->id]
                    ,['class'=>'btn btn-danger']
                );
                ?>

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
                    <span class="label label-warning"><?= h($evenement->adresse)?></span><br>
                    <label class="label label-info">Date de début : </label>&nbsp;
                    <span class="label label-info"><?= h($evenement->date_debut)?></span>&nbsp;
                    <label class="label label-info">Date de fin : </label>&nbsp;
                    <span class="label label-info"><?= h($evenement->date_fin)?></span>
                <div class="clearfix"></div>

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
            <th>Enregistrement total</th>
            <th>Prix normal</th>
        </tr>

            <?php
            foreach ($categories as $cat) {
                echo '<tr>';
                echo '<td>'; echo ($cat->category->nom_categorie) ;echo '</td>';
                $remise = $cat->category->evenement->remise;
                $prix_unitaire = $cat->prix_unitaire;
                echo '<td>'; echo $prixtotale= $prix_unitaire-$remise; echo '</td>';
                echo '<td>'; echo ($cat->prix_unitaire) ;echo '</td>';
                echo '</tr>';
                }
            ?>

    </table>
</div>
