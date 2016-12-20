<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Evenements'), ['controller' => 'Evenements', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evenement'), ['controller' => 'Evenements', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Page Payee'), ['controller' => 'PagePayee', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page Payee'), ['controller' => 'PagePayee', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($article->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Evenement') ?></th>
            <td><?= $article->has('evenement') ? $this->Html->link($article->evenement->id, ['controller' => 'Evenements', 'action' => 'view', $article->evenement->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titre') ?></th>
            <td><?= h($article->titre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Page') ?></th>
            <td><?= $this->Number->format($article->nombre_page) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extra Page') ?></th>
            <td><?= $this->Number->format($article->extra_page) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Resume') ?></h4>
        <?= $this->Text->autoParagraph(h($article->resume)); ?>
    </div>
    <div class="row">
        <h4><?= __('Keywords') ?></h4>
        <?= $this->Text->autoParagraph(h($article->keywords)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Page Payee') ?></h4>
        <?php if (!empty($article->page_payee)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Page Payee Id') ?></th>
                <th scope="col"><?= __('Article Id') ?></th>
                <th scope="col"><?= __('Auteur Id') ?></th>
                <th scope="col"><?= __('Paiement Id') ?></th>
                <th scope="col"><?= __('Extra Page Payee') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->page_payee as $pagePayee): ?>
            <tr>
                <td><?= h($pagePayee->page_payee_id) ?></td>
                <td><?= h($pagePayee->article_id) ?></td>
                <td><?= h($pagePayee->auteur_id) ?></td>
                <td><?= h($pagePayee->paiement_id) ?></td>
                <td><?= h($pagePayee->extra_page_payee) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PagePayee', 'action' => 'view', $pagePayee->page_payee_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PagePayee', 'action' => 'edit', $pagePayee->page_payee_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PagePayee', 'action' => 'delete', $pagePayee->page_payee_id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagePayee->page_payee_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
