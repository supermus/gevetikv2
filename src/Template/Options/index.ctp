<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Option'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Option Paiement'), ['controller' => 'OptionPaiement', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Option Paiement'), ['controller' => 'OptionPaiement', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="options index large-9 medium-8 columns content">
    <h3><?= __('Options') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorie_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom_option') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug_option') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prix_unitaire') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantite_minimum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantite_maximum') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($options as $option): ?>
            <tr>
                <td><?= $this->Number->format($option->id) ?></td>
                <td><?= $option->has('category') ? $this->Html->link($option->category->id, ['controller' => 'Categories', 'action' => 'view', $option->category->id]) : '' ?></td>
                <td><?= h($option->nom_option) ?></td>
                <td><?= h($option->slug_option) ?></td>
                <td><?= $this->Number->format($option->prix_unitaire) ?></td>
                <td><?= $this->Number->format($option->quantite_minimum) ?></td>
                <td><?= $this->Number->format($option->quantite_maximum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $option->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $option->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $option->id], ['confirm' => __('Are you sure you want to delete # {0}?', $option->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
