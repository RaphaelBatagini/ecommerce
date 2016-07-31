<!-- src/Template/Categories/add.ctp -->

<div class="categories form">
<?= $this->Form->create($category, ['class' => 'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Adicionar categoria') ?></legend>
        <div class="form-group">
        	<?= $this->Form->input('name', ['class' => 'form-control', 'label' => 'Nome']) ?>
        </div>
   	</fieldset>
	<div class="form-group">
		<?= $this->Form->button(__('Salvar')); ?>
	</div>
<?= $this->Form->end() ?>
</div>