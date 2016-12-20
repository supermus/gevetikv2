<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $article->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Evenements'), ['controller' => 'Evenements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Evenement'), ['controller' => 'Evenements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Page Payee'), ['controller' => 'PagePayee', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page Payee'), ['controller' => 'PagePayee', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            echo $this->Form->input('evenement_id', ['options' => $evenements]);
            echo $this->Form->input('titre');
            echo $this->Form->input('resume');
            echo $this->Form->input('nombre_page');
            echo $this->Form->input('extra_page');
            echo $this->Form->input('keywords');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
