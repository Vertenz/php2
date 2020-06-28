<section class="cart">
    <?php foreach ($products as $product): ?>
        <h1><?=getNameById($product['id_product'])?></h1>
        <h1><?=$product['quantity']?></h1>
        <form action="/cart/del" method="post">
            <button type="submit" value="<?=$product['id_product']?>" name="del">delete</button>
        </form>
    <?php endforeach; ?>
    <input type="button" name="order" id="order" value="заказать">
</section>