<div class="col-md-1 sidebar">
    <ul class="nav nav-sidebar">



    </ul>
</div>
<div class="col-md-6 col-md-offset-1">
    <br>
    <?php $evenementsici = $evenements->fetchAll('assoc'); ?>

    <?php foreach ($evenementsici as $evenement): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->Html->link($evenement['nom_evenement'], ['controller' => 'evenements', 'action' => 'view', $evenement['id']]); ?>
                <div class="btn-group" style="float:right;">
                    <?php echo $this->Html->link(
                        'Lire la suite',
                        ['controller' => 'evenements', 'action' => 'view',$evenement['id']]
                        ,['class'=>'btn btn-danger']
                    );
                    ?>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="media">
                    <div class="media-left">
                        <?php echo $this->Html->image($evenement['url_evenement'], [
                            "alt" => $evenement['url_evenement'],
                            'url' => ['controller' => 'evenements', 'action' => 'view', $evenement['id']]
                        ]); ?>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $evenement['description'] ?></h4>
                        <label class="label label-warning">Adresse : </label>&nbsp;
                        <span class="label label-warning"><?= h($evenement['adresse'])?></span><br>
                        <label class="label label-info">Date de début : </label>&nbsp;
                        <span class="label label-info"><?= h($evenement['date_debut'])?></span>&nbsp;
                        <label class="label label-info">Date de fin : </label>&nbsp;
                        <span class="label label-info"><?= h($evenement['date_fin'])?></span>
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
