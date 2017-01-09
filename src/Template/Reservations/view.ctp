<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evenements'), ['controller' => 'Evenements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evenement'), ['controller' => 'Evenements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Paiement'), ['controller' => 'Paiement', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paiement'), ['controller' => 'Paiement', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservations view large-9 medium-8 columns content">
    <h3><?= h($reservation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Evenement') ?></th>
            <td><?= $reservation->has('evenement') ? $this->Html->link($reservation->evenement->id, ['controller' => 'Evenements', 'action' => 'view', $reservation->evenement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participant') ?></th>
            <td><?= $reservation->has('participant') ? $this->Html->link($reservation->participant->id, ['controller' => 'Participants', 'action' => 'view', $reservation->participant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reservation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paiement Id') ?></th>
            <td><?= $this->Number->format($reservation->paiement_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Paiement') ?></h4>
        <?php if (!empty($reservation->paiement)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Paiement Id') ?></th>
                <th scope="col"><?= __('Reference Paiement') ?></th>
                <th scope="col"><?= __('Page Payee Id') ?></th>
                <th scope="col"><?= __('Reservation Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Validation') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Valide Par') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($reservation->paiement as $paiement): ?>
            <tr>
                <td><?= h($paiement->paiement_id) ?></td>
                <td><?= h($paiement->reference_paiement) ?></td>
                <td><?= h($paiement->page_payee_id) ?></td>
                <td><?= h($paiement->reservation_id) ?></td>
                <td><?= h($paiement->type) ?></td>
                <td><?= h($paiement->validation) ?></td>
                <td><?= h($paiement->total) ?></td>
                <td><?= h($paiement->valide_par) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Paiement', 'action' => 'view', $paiement->paiement_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Paiement', 'action' => 'edit', $paiement->paiement_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Paiement', 'action' => 'delete', $paiement->paiement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $paiement->paiement_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
