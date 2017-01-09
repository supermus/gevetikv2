<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Organisateur'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Evenements'), ['controller' => 'Evenements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evenement'), ['controller' => 'Evenements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organisateurs index large-9 medium-8 columns content">
    <h3><?= __('Organisateurs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('evenement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('participant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom_role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('est_organisateur') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($organisateurs as $organisateur): ?>
            <tr>
                <td><?= $this->Number->format($organisateur->id) ?></td>
                <td><?= $organisateur->has('evenement') ? $this->Html->link($organisateur->evenement->id, ['controller' => 'Evenements', 'action' => 'view', $organisateur->evenement->id]) : '' ?></td>
                <td><?= $organisateur->has('participant') ? $this->Html->link($organisateur->participant->id, ['controller' => 'Participants', 'action' => 'view', $organisateur->participant->id]) : '' ?></td>
                <td><?= h($organisateur->nom_role) ?></td>
                <td><?= $this->Number->format($organisateur->est_organisateur) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $organisateur->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organisateur->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organisateur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisateur->id)]) ?>
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
