<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Participant'), ['action' => 'edit', $participant->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Participant'), ['action' => 'delete', $participant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participant->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Participants'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participant'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organisateurs'), ['controller' => 'Organisateurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organisateur'), ['controller' => 'Organisateurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservation'), ['controller' => 'Reservation', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservation', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="participants view large-9 medium-8 columns content">
    <h3><?= h($participant->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Prenom Participant') ?></th>
            <td><?= h($participant->prenom_participant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom Participant') ?></th>
            <td><?= h($participant->nom_participant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Participant') ?></th>
            <td><?= h($participant->email_participant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mot De Passe') ?></th>
            <td><?= h($participant->mot_de_passe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Etablissement') ?></th>
            <td><?= h($participant->etablissement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($participant->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Organisateurs') ?></h4>
        <?php if (!empty($participant->organisateurs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Organisateur Id') ?></th>
                <th scope="col"><?= __('Evenement Id') ?></th>
                <th scope="col"><?= __('Participant Id') ?></th>
                <th scope="col"><?= __('Nom Role') ?></th>
                <th scope="col"><?= __('Est Organisateur') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($participant->organisateurs as $organisateurs): ?>
            <tr>
                <td><?= h($organisateurs->organisateur_id) ?></td>
                <td><?= h($organisateurs->evenement_id) ?></td>
                <td><?= h($organisateurs->participant_id) ?></td>
                <td><?= h($organisateurs->nom_role) ?></td>
                <td><?= h($organisateurs->est_organisateur) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Organisateurs', 'action' => 'view', $organisateurs->organisateur_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Organisateurs', 'action' => 'edit', $organisateurs->organisateur_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Organisateurs', 'action' => 'delete', $organisateurs->organisateur_id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisateurs->organisateur_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reservation') ?></h4>
        <?php if (!empty($participant->reservation)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Reservation Id') ?></th>
                <th scope="col"><?= __('Evenement Id') ?></th>
                <th scope="col"><?= __('Paiement Id') ?></th>
                <th scope="col"><?= __('Participant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($participant->reservation as $reservation): ?>
            <tr>
                <td><?= h($reservation->reservation_id) ?></td>
                <td><?= h($reservation->evenement_id) ?></td>
                <td><?= h($reservation->paiement_id) ?></td>
                <td><?= h($reservation->participant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reservation', 'action' => 'view', $reservation->reservation_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reservation', 'action' => 'edit', $reservation->reservation_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservation', 'action' => 'delete', $reservation->reservation_id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->reservation_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
