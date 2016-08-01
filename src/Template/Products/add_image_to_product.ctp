<h4>Adicionar imagens ao produto</h4>
<small>Você pode adicionar até 4 imagens para este produto</small>
<br/>
<br/>
<div class="row">
	<div class="col-md-6 col-sm-12">
		<b>Imagem 1</b>
		<br/>
		<?php
			$path = 'img/products/product_' . $product->id . '_img_1.jpg';
			if (file_exists ($path) === false) {
			    $path = 'img/noimage.jpg';
			}
		?>
		<div class="product-img-container" style="height: 300px">
			<img src="/<?php echo $path; ?>" class="product-img">
		</div>
		<form action="/products/save-image-to-product" method="post" enctype="multipart/form-data">
			<input type="file" name="product_<?php echo $product->id; ?>_img_1">
			<br>
			<input type="submit" value="Salvar">
		</form>
	</div>
	<div class="col-md-6 col-sm-12">
		<b>Imagem 2</b>
		<br/>
		<?php
			$path = 'img/products/product_' . $product->id . '_img_2.jpg';
			if (file_exists ($path) === false) {
			    $path = 'img/noimage.jpg';
			}
		?>
		<div class="product-img-container" style="height: 300px">
			<img src="/<?php echo $path; ?>" class="product-img">
		</div>
		<form action="/products/save-image-to-product" method="post" enctype="multipart/form-data">
			<input type="file" name="product_<?php echo $product->id; ?>_img_2">
			<br>
			<input type="submit" value="Salvar">
		</form>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-6 col-sm-12">
		<b>Imagem 3</b>
		<br/>
		<?php
			$path = 'img/products/product_' . $product->id . '_img_3.jpg';
			if (file_exists ($path) === false) {
			    $path = 'img/noimage.jpg';
			}
		?>
		<div class="product-img-container" style="height: 300px">
			<img src="/<?php echo $path; ?>" class="product-img">
		</div>
		<form action="/products/save-image-to-product" method="post" enctype="multipart/form-data">
			<input type="file" name="product_<?php echo $product->id; ?>_img_3">
			<br>
			<input type="submit" value="Salvar">
		</form>
	</div>
	<div class="col-md-6 col-sm-12">
		<b>Imagem 4</b>
		<br/>
		<?php
			$path = 'img/products/product_' . $product->id . '_img_4.jpg';
			if (file_exists ($path) === false) {
			    $path = 'img/noimage.jpg';
			}
		?>
		<div class="product-img-container" style="height: 300px">
		<img src="/<?php echo $path; ?>" class="product-img">
		</div>
		<form action="/products/save-image-to-product" method="post" enctype="multipart/form-data">
			<input type="file" name="product_<?php echo $product->id; ?>_img_4">
			<br>
			<input type="submit" value="Salvar">
		</form>
	</div>
</div>