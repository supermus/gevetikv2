<div class="text-center" style="padding:50px 0">
    <div class="logo">login</div>
<div class="login-form-1">
    <div class="login-form-main-message"></div>
        <div class="main-login-form">
            <div class="login-group">
                <?= $this->Form->create(); ?>
                    <div class="form-group">
                <?= $this->Form->input('username', array('placeholder'=>'Nom d\'utilisateur','label'=>'')); ?>
                    </div>
                <div class="form-group">
                    <?= $this->Form->input('password', array('type'=>'password','placeholder'=>'Mot de passe','label'=>'')); ?>
                </div>
            </div>
       <?php       echo $this->Form->button('<i class="fa fa-chevron-right"></i>', array(
    'type' => 'submit',
    'class' => 'login-button',
    'escape' => false
));?>
        </div>
        <?= $this->Form->end(); ?>
        <div class="etc-login-form">
            <p>Nouveau utilisateur ? 
            <?= $this->Html->Link('Créer un compte.',['controller'=>'users\inscription']); ?>
                <?= $this->Html->Link('Mot de passe oublié ?',['controller'=>'users\forgotPassword']); ?>
        </div>
</div>
</div>