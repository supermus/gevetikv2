<div class="col-md-1 sidebar">
    <ul class="nav nav-sidebar">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Organisateurs'), ['controller' => 'Organisateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organisateur'), ['controller' => 'Organisateurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservation'), ['controller' => 'Reservation', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservation', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="col-md-6 col-md-offset-1">
    <?= $this->Form->create($participant) ?>
    <fieldset>
        <legend><?= __('Add Participant') ?></legend>
        <?php
            echo $this->Form->input('prenom_participant');
            echo $this->Form->input('nom_participant');
            echo $this->Form->input('email_participant');
           // echo $this->Form->input('mot_de_passe');
            echo $this->Form->input('etablissement');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
