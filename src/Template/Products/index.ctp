<?php $this->assign('title', 'produtos'); ?>

<!-- Navauto<br/> -->
<h4><?= $title ?></h4>
<hr>
<div class="row">
<!-- Aqui é onde iremos iterar nosso objeto de solicitação $products, exibindo informações de produtos -->
<?php if (count($products)): ?>
    <?php foreach ($products as $product): ?>
            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <?php if(file_exists('img/products/product_' . $product->id . '_img_1.jpg')): ?>
                        <img class="img-responsive" src="/<?= 'img/products/product_' . $product->id . '_img_1.jpg'; ?>" alt="">
                    <?php else:?>
                        <img class="img-responsive" src="/img/noimage.jpg" alt="">
                    <?php endif; ?>
                    <div class="caption">
                        <h4><?= $this->Html->link($product->name, ['action' => 'view', $product->id]) ?></h4>
                        <!-- <p><span class="glyphicon glyphicon-time"></span> <?php // echo $product->created->format('l, d/m/Y H:i') ?></p> -->
                        <p><?php echo $product->description; ?></p>
                        <p><?php echo 'R$ ' . $product->price; ?></p>
                        <p>
                            <a href="#" class="btn btn-primary">Comprar</a> 
                            <?= $this->Html->link('Ver Mais', ['action' => 'view', $product->id], ['class' => 'btn btn-default']) ?>
                        </p>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>
<?php else: ?>
    <h2>Nenhum produto encontrado</h2>
<?php endif; ?>
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