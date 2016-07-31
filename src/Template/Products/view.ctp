<div class="well">
    <div class="row">
        <div class="col-md-12">
            <h2 style="margin-top: 0px!important"><?= $product->name?></h2>
        </div>
    </div>
    <?php $path = "img/products/product_{$product->id}_img_"; ?>
    <div class="row">
        <div class="col-md-6 col-sm-12">
        <ul class="bxslider">
            <?php if(file_exists($path.'1.jpg')): ?>
                <li><img src="/<?= $path ?>1.jpg" width="400px" height="300px" /></li>
            <?php else:?>
                <li><img src="/img/noimage.jpg" width="400px" height="300px" /></li>
            <?php endif; ?>
            <?php if(file_exists($path.'2.jpg')): ?>
                <li><img src="/<?= $path ?>2.jpg" width="400px" height="300px" /></li>
            <?php endif; ?>
            <?php if(file_exists($path.'3.jpg')): ?>
                <li><img src="/<?= $path ?>3.jpg" width="400px" height="300px" /></li>
            <?php endif; ?>
            <?php if(file_exists($path.'4.jpg')): ?>
                <li><img src="/<?= $path ?>4.jpg" width="400px" height="300px" /></li>
            <?php endif; ?>
        </ul>
        <div class="bx-pager">
            <?php if(file_exists($path.'1.jpg')): ?>
                <a data-slide-index="0" href=""><img src="/<?= $path ?>1.jpg" /></a>
            <?php else: ?>
                <a data-slide-index="0" href=""><img src="/img/noimage.jpg" /></a>
            <?php endif; ?>
            <?php if(file_exists($path.'2.jpg')): ?>
                <a data-slide-index="1" href=""><img src="/<?= $path ?>2.jpg" /></a>
            <?php endif; ?>
            <?php if(file_exists($path.'3.jpg')): ?>
                <a data-slide-index="2" href=""><img src="/<?= $path ?>3.jpg" /></a>
            <?php endif; ?>
            <?php if(file_exists($path.'4.jpg')): ?>
                <a data-slide-index="3" href=""><img src="/<?= $path ?>4.jpg" /></a>
            <?php endif; ?>
        </div>
        </div>
        <div class='col-md-6 col-sm-12'>
            <h1 style="margin-top: 0px!important"><?php echo 'R$ ' . $product->price; ?></h1>
            <p><?php echo $product->description; ?></p>
        </div>
    </div>
</div>

<?php echo $this->Html->scriptBlock("
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            pagerCustom: '.bx-pager'
        });
    });
", array('block' => true)); ?>