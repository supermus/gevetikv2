<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $organisateur->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $organisateur->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Organisateurs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Evenements'), ['controller' => 'Evenements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evenement'), ['controller' => 'Evenements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organisateurs form large-9 medium-8 columns content">
    <?= $this->Form->create($organisateur) ?>
    <fieldset>
        <legend><?= __('Edit Organisateur') ?></legend>
        <?php
            echo $this->Form->input('evenement_id', ['options' => $evenements]);
            echo $this->Form->input('participant_id', ['options' => $participants]);
            echo $this->Form->input('nom_role');
            echo $this->Form->input('est_organisateur');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
