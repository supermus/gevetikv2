<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Page Payees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Page Payees'), ['controller' => 'PagePayees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page Payee'), ['controller' => 'PagePayees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Paiements'), ['controller' => 'Paiements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Paiement'), ['controller' => 'Paiements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagePayees form large-9 medium-8 columns content">
    <?= $this->Form->create($pagePayee) ?>
    <fieldset>
        <legend><?= __('Add Page Payee') ?></legend>
        <?php
            echo $this->Form->input('article_id', ['options' => $articles]);
            echo $this->Form->input('auteur_id', ['options' => $participants]);
            echo $this->Form->input('paiement_id', ['options' => $paiements]);
            echo $this->Form->input('extra_page_payee');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
