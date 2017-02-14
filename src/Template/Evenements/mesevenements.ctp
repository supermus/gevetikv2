<div class="col-md-2 sidebar">
    <ul class="nav nav-sidebar">
    </ul>
</div>
<div class="col-md-6 col-md-offset-1">
    <br>
    <?php
    for($i=0 ; $i < count($mesevents) ;$i++)
    {
        ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $this->Html->link($mesevents[$i]->first()->nom_evenement, ['controller' => 'evenements', 'action' => 'view', $mesevents[$i]->first()->id]); ?>
            <div class="btn-group" style="float:right;">
                <?php echo $this->Html->link(
                    'Lire la suite',
                    ['controller' => 'evenements', 'action' => 'view',$mesevents[$i]->first()->id]
                    ,['class'=>'btn btn-danger']
                );
                ?>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">
                    <?php echo $this->Html->image($mesevents[$i]->first()->url_evenement, [
                        "alt" => $mesevents[$i]->first()->nom_evenement,
                        'url' => ['controller' => 'evenements', 'action' => 'view', $mesevents[$i]->first()->id]
                    ]); ?>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?= h($mesevents[$i]->first()->description)?></h4>
                    <label class="label label-warning">Adresse : </label>&nbsp;
                    <span class="label label-warning"><?= h($mesevents[$i]->first()->adresse)?></span><br>
                    <label class="label label-info">Date de début : </label>&nbsp;
                    <span class="label label-info"><?= h($mesevents[$i]->first()->date_debut)?></span>&nbsp;
                    <label class="label label-info">Date de fin : </label>&nbsp;
                    <span class="label label-info"><?= h($mesevents[$i]->first()->date_fin)?> </span>
                    <div class="clearfix"></div>
                    

                </div>
            </div>
        </div>
    </div><?php } if($i===0){ echo "<br> <h3>Vous n'avez pas créé d'évenement.</h3>";} ?>
</div>

