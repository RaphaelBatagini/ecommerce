<!-- src/Template/Users/add.ctp -->

<div class="users form">
<?= $this->Form->create($user, ['class' => 'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Adicionar usuário') ?></legend>
        <div class="form-group">
        	<?= $this->Form->input('username', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
        	<?= $this->Form->input('password', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
        	<?= $this->Form->input('role', [
            	'options' => ['admin' => 'Admin', 'author' => 'Author'],
            	'class' => 'form-control'
        	]) ?>
        </div>
   	</fieldset>
	<div class="form-group">
		<?= $this->Form->button(__('Submit')); ?>
	</div>
<?= $this->Form->end() ?>
</div>