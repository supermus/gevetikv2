<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Page Payee'), ['action' => 'edit', $pagePayee->page_payee_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Page Payee'), ['action' => 'delete', $pagePayee->page_payee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagePayee->page_payee_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Page Payees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page Payee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Page Payees'), ['controller' => 'PagePayees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page Payee'), ['controller' => 'PagePayees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Paiements'), ['controller' => 'Paiements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paiement'), ['controller' => 'Paiements', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pagePayees view large-9 medium-8 columns content">
    <h3><?= h($pagePayee->page_payee_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Page Payee') ?></th>
            <td><?= $pagePayee->has('page_payee') ? $this->Html->link($pagePayee->page_payee->page_payee_id, ['controller' => 'PagePayees', 'action' => 'view', $pagePayee->page_payee->page_payee_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Article') ?></th>
            <td><?= $pagePayee->has('article') ? $this->Html->link($pagePayee->article->id, ['controller' => 'Articles', 'action' => 'view', $pagePayee->article->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participant') ?></th>
            <td><?= $pagePayee->has('participant') ? $this->Html->link($pagePayee->participant->id, ['controller' => 'Participants', 'action' => 'view', $pagePayee->participant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paiement') ?></th>
            <td><?= $pagePayee->has('paiement') ? $this->Html->link($pagePayee->paiement->paiement_id, ['controller' => 'Paiements', 'action' => 'view', $pagePayee->paiement->paiement_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra Page Payee') ?></th>
            <td><?= $this->Number->format($pagePayee->extra_page_payee) ?></td>
        </tr>
    </table>
</div>
