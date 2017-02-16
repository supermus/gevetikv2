<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Page Payee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Paiements'), ['controller' => 'Paiements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Paiement'), ['controller' => 'Paiements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagePayees index large-9 medium-8 columns content">
    <h3><?= __('Page Payees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('page_payee_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('article_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auteur_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paiement_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extra_page_payee') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagePayees as $pagePayee): ?>
            <tr>
                <td><?= $pagePayee->has('page_payee') ? $this->Html->link($pagePayee->page_payee->page_payee_id, ['controller' => 'PagePayees', 'action' => 'view', $pagePayee->page_payee->page_payee_id]) : '' ?></td>
                <td><?= $pagePayee->has('article') ? $this->Html->link($pagePayee->article->id, ['controller' => 'Articles', 'action' => 'view', $pagePayee->article->id]) : '' ?></td>
                <td><?= $pagePayee->has('participant') ? $this->Html->link($pagePayee->participant->id, ['controller' => 'Participants', 'action' => 'view', $pagePayee->participant->id]) : '' ?></td>
                <td><?= $pagePayee->has('paiement') ? $this->Html->link($pagePayee->paiement->paiement_id, ['controller' => 'Paiements', 'action' => 'view', $pagePayee->paiement->paiement_id]) : '' ?></td>
                <td><?= $this->Number->format($pagePayee->extra_page_payee) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pagePayee->page_payee_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pagePayee->page_payee_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pagePayee->page_payee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagePayee->page_payee_id)]) ?>
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
