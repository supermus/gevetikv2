<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?/*= __('Actions') */?></li>
        <li><?/*= $this->Html->link(__('New User'), ['action' => 'add']) */?></li>
    </ul>
</nav>-->
        <div class="col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><?= $this->Html->link(__('Nouveau utilisateur'), ['action' => 'add']) ?></li>
            </ul>

        </div>


    <div class="col-md-10">
        <div class="page-header"></div>
    <h3><?= __('Utilisateurs ') ?></h3>
        <div class="table-responsive" style="overflow: hidden">
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datedenaissance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->nom) ?></td>
                <td><?= h($user->datedenaissance) ?></td>
                <td><?= h($user->role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('détaille'), ['action' => 'view', $user->id],['class'=>'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $user->id],['class'=>'btn btn-sm btn-primary'])?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $user->id], ['confirm' => 'Voulez-vous vraiment supprimer ?','class'=>'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        </div>
    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('précedent')) ?>
            <?= $this->Paginator->numbers(['before'=>'', 'after'=>'']) ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
