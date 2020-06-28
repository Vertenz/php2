<section class="product center">
    <?php foreach ($model as $product): ?>
        <div class="product__box">
            <a href="/?a=single&id=<?= $product['id'] ?>">
                <img src="<?= $product['hrefPreview'] ?>" alt="<?= $product['name'] ?>" class="product__img"></a>
            <div class="product__descriptions">
                <h3 class="product__name"><?= $product['name'] ?></h3>
                <p class="product__price"><span><?= $product['price'] ?>$</span></p>
                <p class="procduct__type"><?= $product['type'] ?></p>
                <p class="product__quantuty">В наличии <span><?= $product['quantity'] ?></span></p>
            </div>
            </a>
        </div>
    <?php endforeach; ?>
</section>

