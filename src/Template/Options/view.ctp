<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Option'), ['action' => 'edit', $option->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Option'), ['action' => 'delete', $option->id], ['confirm' => __('Are you sure you want to delete # {0}?', $option->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Options'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Option Paiement'), ['controller' => 'OptionPaiement', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Option Paiement'), ['controller' => 'OptionPaiement', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="options view large-9 medium-8 columns content">
    <h3><?= h($option->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $option->has('category') ? $this->Html->link($option->category->id, ['controller' => 'Categories', 'action' => 'view', $option->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom Option') ?></th>
            <td><?= h($option->nom_option) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug Option') ?></th>
            <td><?= h($option->slug_option) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($option->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prix Unitaire') ?></th>
            <td><?= $this->Number->format($option->prix_unitaire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantite Minimum') ?></th>
            <td><?= $this->Number->format($option->quantite_minimum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantite Maximum') ?></th>
            <td><?= $this->Number->format($option->quantite_maximum) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Option Paiement') ?></h4>
        <?php if (!empty($option->option_paiement)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Option Paiement Id') ?></th>
                <th scope="col"><?= __('Paiement Id') ?></th>
                <th scope="col"><?= __('Option Id') ?></th>
                <th scope="col"><?= __('Quantite') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($option->option_paiement as $optionPaiement): ?>
            <tr>
                <td><?= h($optionPaiement->option_paiement_id) ?></td>
                <td><?= h($optionPaiement->paiement_id) ?></td>
                <td><?= h($optionPaiement->option_id) ?></td>
                <td><?= h($optionPaiement->quantite) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OptionPaiement', 'action' => 'view', $optionPaiement->option_paiement_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OptionPaiement', 'action' => 'edit', $optionPaiement->option_paiement_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OptionPaiement', 'action' => 'delete', $optionPaiement->option_paiement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $optionPaiement->option_paiement_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
