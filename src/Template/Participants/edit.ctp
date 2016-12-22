<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $participant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $participant->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Organisateurs'), ['controller' => 'Organisateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organisateur'), ['controller' => 'Organisateurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservation'), ['controller' => 'Reservation', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservation', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="participants form large-9 medium-8 columns content">
    <?= $this->Form->create($participant) ?>
    <fieldset>
        <legend><?= __('Edit Participant') ?></legend>
        <?php
            echo $this->Form->input('prenom_participant');
            echo $this->Form->input('nom_participant');
            echo $this->Form->input('email_participant');
            echo $this->Form->input('mot_de_passe');
            echo $this->Form->input('etablissement');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
