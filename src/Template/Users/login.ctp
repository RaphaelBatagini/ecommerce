<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create('', ['class' => 'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Por favor informe seu usuário e senha') ?></legend>
        <div class="form-group">
        	<?= $this->Form->input('username', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
        	<?= $this->Form->input('password', ['class' => 'form-control']) ?>
        </div>
    </fieldset>
    <div class="form-group">
		<?= $this->Form->button(__('Login')); ?>
	</div>
<?= $this->Form->end() ?>
</div>