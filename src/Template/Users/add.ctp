
<br><br>
<div class="col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li><?= $this->Html->link(__('Liste utilisateurs'), ['action' => 'index']) ?></li>
    </ul>

</div>


<div class="col-md-6 col-md-offset-1">
    <div class="page-header">
        <h2>Créer un utilisateur</h2>
    </div>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            //echo $this->Form->input('password');
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            echo $this->Form->input('datedenaissance');
            echo $this->Form->input('role',['options'=>['admin'=>'Administrateur',
                'visiteur'=>'Visiteur',
                'finance'=>'Finance',
                'organisateur'=>'Organisateur']]);
            echo $this->Form->input('adresse');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Créer')) ?>
    <?= $this->Form->end() ?>
</div>
