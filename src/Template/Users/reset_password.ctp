
<div class="col-md-2 sidebar"></div>
<div class="col-md-6 col-md-offset-1">
    <div class="users">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Mot de passe oublier') ?></legend>
        <?= $this->Form->input('new_password',['type'=>'password','label'=>'nouveau mot de passe']) ?>
        <?= $this->Form->input('confirm_password',['type'=>'password','label'=>'confirmer mot de passe']) ?>
    </fieldset>
        <?php       echo $this->Form->button('Envoyer', array(
            'type' => 'submit',
            'escape' => false
        ));?>
    <?= $this->Form->end() ?>
</div>
    </div>