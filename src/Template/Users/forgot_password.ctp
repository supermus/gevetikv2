<div class="col-md-2 sidebar"></div>
<div class="col-md-6 col-md-offset-1">
<div class="users form ">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Mot de passe oublier') ?></legend>
        <?= $this->Form->input('email',['label'=>'Entez votre adresse mail :']) ?>
    </fieldset>
    <?php       echo $this->Form->button('Envoyer', array(
        'type' => 'submit',
        'escape' => false
    ));?>
    <?= $this->Form->end() ?>
</div>
</div>