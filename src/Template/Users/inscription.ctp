<div class="text-center" style="padding:50px 0">
	<div class="logo">Inscription</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<?= $this->Form->create($user) ?>
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<?= $this->Form->input('username', array('placeholder'=>'Nom d\'utilisateur','label'=>'')); ?>
					</div>
					<div class="form-group">
						<?= $this->Form->input('password', array('placeholder'=>'Mot de passe','label'=>'')); ?>
					</div>
                    <br>
					<div class="form-group">
						<?= $this->Form->input('email', array('placeholder'=>'Adresse e-mail','label'=>'')); ?>
					</div>
					
					<div class="form-group">
						<?= $this->Form->input('nom', array('placeholder'=>'Nom','label'=>'')); ?>
					</div>
					<div class="form-group">
						<?= $this->Form->input('prenom', array('placeholder'=>'prenom','label'=>'')); ?>
					</div>
					
					<div class="form-group">
                        <?= $this->Form->input('datedenaissance', array('label'=>'')); ?>
					</div>
                    
					<div class="form-group">
                        <?= $this->Form->input('adresse', array('placeholder'=>'Votre adresse','label'=>'')); ?>
					</div>
				</div>
       <?php       echo $this->Form->button('<i class="fa fa-chevron-right"></i>', array(
    'type' => 'submit',
    'class' => 'login-button',
    'escape' => false
));?>
                
<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                <?= $this->Form->end() ?>
			</div>
			<div class="etc-login-form">
				<p>J'ai déjà un compte ? <?= $this->Html->Link('Se connecter ici.',['controller'=>'users\login']); ?></p>
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>