<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Organisateur'), ['action' => 'edit', $organisateur->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Organisateur'), ['action' => 'delete', $organisateur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisateur->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Organisateurs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organisateur'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evenements'), ['controller' => 'Evenements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evenement'), ['controller' => 'Evenements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="organisateurs view large-9 medium-8 columns content">
    <h3><?= h($organisateur->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Evenement') ?></th>
            <td><?= $organisateur->has('evenement') ? $this->Html->link($organisateur->evenement->id, ['controller' => 'Evenements', 'action' => 'view', $organisateur->evenement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participant') ?></th>
            <td><?= $organisateur->has('participant') ? $this->Html->link($organisateur->participant->id, ['controller' => 'Participants', 'action' => 'view', $organisateur->participant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom Role') ?></th>
            <td><?= h($organisateur->nom_role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($organisateur->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Est Organisateur') ?></th>
            <td><?= $this->Number->format($organisateur->est_organisateur) ?></td>
        </tr>
    </table>
</div>
