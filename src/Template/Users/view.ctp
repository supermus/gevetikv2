<br><br>
<div class="col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li><?= $this->Html->link(__('Modifier l\'utilisateur '), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Supprimer l\'utilisateur'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List des utilisateurs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nouveau utilisateur'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="col-md-6 col-md-offset-1">
    <div class="page-header">
        <h2>détaille de <?= h($user->nom) ?></h2>
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username' ) ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($user->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($user->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datedenaissance') ?></th>
            <td><?= h($user->datedenaissance) ?></td>
        </tr>
    </table>

</div>
