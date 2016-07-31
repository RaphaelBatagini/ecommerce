<h1>Adicionar produto</h1>
<div class="form-group">
	<?php echo $this->Form->create($product, ['class' => 'form-horizontal']); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('name', ['class' => 'form-control', 'label' => 'Nome']); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('description', ['rows' => '3', 'class' => 'form-control', 'label' => 'Descrição']); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('price', ['class' => 'form-control', 'label' => 'Preço']); ?>
</div>
<div class="form-group">
	<?php echo $this->Form->input('quantity', ['class' => 'form-control', 'label' => 'Quantidade']); ?>
</div>

<div class="form-group">
<?php
    echo $this->Form->input('category_id', [
	    'type' => 'select',
	    'multiple' => false,
	    'options' => $category,
	    'empty' => false,
	    'label' => 'Categoria',
	    'class' => 'form-control'
    ]);
?>
</div>
<div class="form-group">
    <?php 
    	echo $this->Form->button(__('Salvar'));
    	echo $this->Form->end(); 
    ?>
</div>