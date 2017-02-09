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

</div>
<!-------->
<div class="container">
    <div class="row">

        <div class="col-md-6 col-md-offset-2" >


            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= h($user->prenom) ?> <?= h($user->nom) ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">


                        <div class=" col-md-8 col-lg-8 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Nom:</td>
                                    <td><?= h($user->nom) ?></td>
                                </tr>
                                <tr>
                                    <td>Prenom:</td>
                                    <td><?= h($user->prenom) ?></td>
                                </tr>
                                <tr>
                                    <td>Date de naissnce:</td>
                                    <td><?= h($user->datedenaissance) ?></td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Username:</td>
                                    <td><?= h($user->username) ?></td>
                                </tr>
                                <tr>
                                    <td>Role:</td>
                                    <td><?= h($user->role) ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><a href="<?= h($user->email) ?>"><?= h($user->email) ?></a></td>
                                </tr>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <?= $this->Html->link(__(""), ['action' => 'edit', $user->id],['class'=>'btn btn-sm btn-warning glyphicon glyphicon-edit']) ?>
                </div>

            </div>
        </div>
    </div>
</div>