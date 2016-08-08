<h3>Controle do site</h3>
<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="pill" href="#products">Produtos</a></li>
	<li><a data-toggle="pill" href="#categories">Categorias</a></li>
	<li><a data-toggle="pill" href="#contacts">Contatos</a></li>
	<li><a data-toggle="pill" href="#searchs">Relatórios de busca</a></li>
</ul>
<br>

<div class="tab-content">
	<div id="products" class="tab-pane fade in active">
		<h3>Produtos</h3>
		<?= $this->Html->link(
            'Adicionar novo',
            ['controller' => 'Products','action' => 'add'],
            ['class' => 'btn btn-info'])
        ?>
		<?php if (count($products) == 0): ?>
			<p>Nenhum produto encontrado!</p>
		<?php else: ?>
			<table class="table">
			    <thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Preço</th>
						<th>Ações</th>
					</tr>
			    </thead>
		    <tbody>
		    	<?php foreach($products as $product): ?>
				<tr>
					<td><?= $product->id ?></td>
					<td><?= $product->name ?></td>
					<td><?= $product->price ?></td>
					<td>
					<?= $this->Html->link(
                                'Editar',
                                ['controller' => 'Products','action' => 'edit', $product->id],
                                ['class' => 'btn btn-info'])
                            ?>  
					<?= $this->Html->link(
                                'Deletar',
                                ['controller' => 'Products','action' => 'delete', $product->id],
                                ['confirm' => 'Tem certeza?', 'class' => 'btn btn-danger'])
                            ?>                          
                            </td>
				</tr>
				<?php endforeach;?>
		    </tbody>
		    </table>
		<?php endif;?>	
	</div>

	<div id="categories" class="tab-pane fade">
		<h3>Categorias</h3>
		<?= $this->Html->link(
            'Adicionar novo',
            ['controller' => 'Categories','action' => 'add'],
            ['class' => 'btn btn-info'])
        ?>
		<?php if (count($categories) == 0): ?>
			<p>Nenhuma categoria encontrada!</p>
		<?php else: ?>
			<table class="table">
			    <thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Ações</th>
					</tr>
			    </thead>
		    <tbody>
		    	<?php foreach($categories as $category): ?>
				<tr>
					<td><?= $category->id ?></td>
					<td><?= $category->name ?></td>
					<td>
					<?= $this->Html->link(
                                'Editar',
                                ['controller' => 'Categories','action' => 'edit', $category->id],
                                ['class' => 'btn btn-info'])
                            ?>  
					<?= $this->Html->link(
                                'Deletar',
                                ['controller' => 'Categories','action' => 'delete', $category->id],
                                ['confirm' => 'Tem certeza?', 'class' => 'btn btn-danger'])
                            ?>                          
                            </td>
				</tr>
				<?php endforeach;?>
		    </tbody>
		  </table>
		<?php endif;?>	
	</div>

	<div id="contacts" class="tab-pane fade">
		<h3>Contatos</h3>
		<?= $this->Html->link(
            'Adicionar novo',
            ['controller' => 'Contacts','action' => 'add'],
            ['class' => 'btn btn-info'])
        ?>
		<?php if (count($contacts) == 0): ?>
			<p>Nenhum contato encontrado!</p>
		<?php else: ?>
			<table class="table">
			    <thead>
					<tr>
						<th>Código</th>
						<th>Valor</th>
						<th>Tipo</th>
						<th>Ações</th>
					</tr>
			    </thead>
		    <tbody>
		    	<?php foreach($contacts as $contact): ?>
				<tr>
					<td><?= $contact->id; ?></td>
					<td><?= $contact->value; ?></td>
					<td><?= $contact->type == 'whatsapp' ? 'WhatsApp' : ($contact->type == 'mail' ? 'E-mail' : ($contact->type == 'cellphone' ? 'Celular' : 'Telefone')) ; ?></td>
					<td>
						<?= $this->Html->link(
	                        'Editar',
	                        ['controller' => 'Contacts','action' => 'edit', $contact->id],
	                        ['class' => 'btn btn-info']
	                    ); ?>  
						<?= $this->Html->link(
	                        'Deletar',
	                        ['controller' => 'Contacts','action' => 'delete', $contact->id],
	                        ['confirm' => 'Tem certeza?', 'class' => 'btn btn-danger']
	                    ); ?>                          
                    </td>
				</tr>
				<?php endforeach;?>
		    </tbody>
		  </table>
		<?php endif;?>	
	</div>

	<div id="searchs" class="tab-pane fade">
		<h3>Relatórios de busca</h3>
	</div>
</div>

<div class="row" style="text-align: center">
				<ul class="pagination">
				    <?php
				    echo $this->Paginator->prev(' << ' . __('Mais novas'));
				    echo $this->Paginator->numbers(['first' => 2, 'last' => 2]);
				    echo $this->Paginator->next(__('Mais antigas') . ' >> ');
				    ?>
				</ul>
			</div>