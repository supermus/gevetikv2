<br>
<div class="index large-4 medium-4 large offset-4 medium-offset-4 columns">
	<div class="panel">
		<h2 class="text-center"> Se connecter </h2>
		<?= $this->Form->create(); ?>
			<?= $this->Form->input('username'); ?>
			<?= $this->Form->input('password', array('type'=>'password')); ?>
		<div style="text-align:center">	<?= $this->Form->submit('Login', array('class'=>'button')); ?></div>
		<?= $this->Form->end(); ?>
       Vous n'avez pas de compte ?     
        <?= $this->Html->Link('S\'inscrire >>',['controller'=>'users\inscription']); ?>
	</div> 
</div>