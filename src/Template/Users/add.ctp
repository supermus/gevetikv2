
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
            echo $this->Form->input('username',['label'=>'Nom d\'utilisateur']);
            echo $this->Form->input('email',['label'=>'Email']);
            //echo $this->Form->input('password');
            echo $this->Form->input('nom',['label'=>'Nom']);
            echo $this->Form->input('prenom',['label'=>'Prenom']);
            echo $this->Form->input('datedenaissance',['minYear'=>date('Y')-70, 'maxYear'=>date('Y'),'label'=>'Date de naissance']);
            echo $this->Form->input('role',['options'=>['admin'=>'Administrateur',
                'visiteur'=>'Visiteur',
                'finance'=>'Finance',
                'organisateur'=>'Organisateur']]);
            echo $this->Form->input('adresse',['label'=>'Adresse']);
        ?>
    </fieldset>
    <?= $this->Form->button(array('value'=>'Ajouter')) ?>
    <?= $this->Form->end() ?>
</div>
