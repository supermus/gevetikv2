<br><br>
<div class="col-md-2 sidebar">
    <ul class="nav nav-sidebar">

    </ul>

</div>

<div class="col-md-6 col-md-offset-1">
    <div class="list-group">
        <?php foreach ($evenements as $evenement): ?>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">
                <?= h($evenement->nom_evenement) ?>
            </h4>
            <p class="list-group-item-text">...</p>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
