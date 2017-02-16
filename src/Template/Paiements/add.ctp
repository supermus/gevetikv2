<br><br>
<div class="col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Paiements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Paiements'), ['controller' => 'Paiements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Paiement'), ['controller' => 'Paiements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>

</div>
<div class="col-md-6 col-md-offset-1">
    <?= $this->Form->create($paiement) ?>
    <fieldset>
        <legend><?= __('Add Paiement') ?></legend>
        <?php
            echo $this->Form->input('reference_paiement');
            echo $this->Form->input('page_payee_id');
            echo $this->Form->input('reservation_id', ['options' => $reservations]);
            echo $this->Form->input('type');
            echo $this->Form->input('validation');
            echo $this->Form->input('total');
            echo $this->Form->input('valide_par');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
