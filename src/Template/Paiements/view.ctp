<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Paiement'), ['action' => 'edit', $paiement->paiement_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Paiement'), ['action' => 'delete', $paiement->paiement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $paiement->paiement_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Paiements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paiement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Paiements'), ['controller' => 'Paiements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paiement'), ['controller' => 'Paiements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paiements view large-9 medium-8 columns content">
    <h3><?= h($paiement->paiement_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Paiement') ?></th>
            <td><?= $paiement->has('paiement') ? $this->Html->link($paiement->paiement->paiement_id, ['controller' => 'Paiements', 'action' => 'view', $paiement->paiement->paiement_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Paiement') ?></th>
            <td><?= h($paiement->reference_paiement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reservation') ?></th>
            <td><?= $paiement->has('reservation') ? $this->Html->link($paiement->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $paiement->reservation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($paiement->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Page Payee Id') ?></th>
            <td><?= $this->Number->format($paiement->page_payee_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Validation') ?></th>
            <td><?= $this->Number->format($paiement->validation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($paiement->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valide Par') ?></th>
            <td><?= $this->Number->format($paiement->valide_par) ?></td>
        </tr>
    </table>
</div>
