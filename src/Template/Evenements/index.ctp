<div class="col-md-2 sidebar">
    <ul class="nav nav-sidebar">

    </ul>

</div>

<div class="col-md-6 col-md-offset-1">
    <?php foreach ($evenements as $evenement): ?>
        <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="#" class="MakaleYazariAdi"><?= h($evenement->nom_evenement)?></a>
            <div class="btn-group" style="float:right;">
            	<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            		<span class="glyphicon glyphicon-cog"></span>
            		<span class="sr-only">Toggle Dropdown</span>
            	</button>
            	<ul class="dropdown-menu">
            		<li><a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></li>
            		<li role="separator" class="divider"></li>
            		<li><a href="#"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Delete</a></li>
            	</ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="<?= h($evenement->description)?>" alt="Kurt">
                    </a>
                </div>
                <div class="media-body">
                <h4 class="media-heading"><?= h($evenement->description)?></h4>
                <?= h($evenement->adresse)?>
                <div class="clearfix"></div>
                <div class="btn-group" role="group" id="BegeniButonlari">
                    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down"></span></button>
                </div>                 
               </div>
            </div>
        </div>
    </div>
</div>    
    <?php endforeach; ?>

    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
