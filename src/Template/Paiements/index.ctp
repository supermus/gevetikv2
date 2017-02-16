<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Paiement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paiements index large-9 medium-8 columns content">
    <h3><?= __('Paiements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('paiement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_paiement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_payee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reservation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('validation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valide_par') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paiements as $paiement): ?>
            <tr>
                <td><?= $paiement->has('paiement') ? $this->Html->link($paiement->paiement->paiement_id, ['controller' => 'Paiements', 'action' => 'view', $paiement->paiement->paiement_id]) : '' ?></td>
                <td><?= h($paiement->reference_paiement) ?></td>
                <td><?= $this->Number->format($paiement->page_payee_id) ?></td>
                <td><?= $paiement->has('reservation') ? $this->Html->link($paiement->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $paiement->reservation->id]) : '' ?></td>
                <td><?= h($paiement->type) ?></td>
                <td><?= $this->Number->format($paiement->validation) ?></td>
                <td><?= $this->Number->format($paiement->total) ?></td>
                <td><?= $this->Number->format($paiement->valide_par) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $paiement->paiement_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paiement->paiement_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paiement->paiement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $paiement->paiement_id)]) ?>
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
