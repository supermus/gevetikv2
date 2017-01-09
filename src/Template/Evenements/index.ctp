<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Evenement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Article'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorie'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categorie'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organisateur'), ['controller' => 'Organisateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organisateur'), ['controller' => 'Organisateurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservation'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evenements index large-9 medium-8 columns content">
    <h3><?= __('Evenements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('nom_evenement') ?></th>

                <th scope="col"><?= $this->Paginator->sort('date_debut') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_fin') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evenements as $evenement): ?>
            <tr>

                <td><?= h($evenement->nom_evenement) ?></td>


                <td><?= h($evenement->date_debut) ?></td>
                <td><?= h($evenement->date_fin) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $evenement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evenement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evenement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evenement->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
