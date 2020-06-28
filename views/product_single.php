<section class="product center" xmlns="">
    <div class="single-block">
        <img src="../<?=$model->hrefPreview?>" alt="<?=$model->name?>">
        <div class="info">
            <h2 class="info__name"><?=$model->name?></h2>
            <h3 class="info__type"><?=$model->type?></h3>
            <p class="info__descriptions"><?=$model->descriptions?></p>
        </div>
    </div>

    <div class="buy">
        <p class="buy_price"><?=$model->price?>$</p>
        <div class="buy__button"><span> <?=$model->name?></span></div>
        <div>
            <input id="qty_input" type="text" name="qty">
            <input id="add_to_card" data-id="<?=$model->id?>" type="submit" value="Добавить в корзину">
        </div>
    </div>

    <form action="/product/comment?id=<?=$model->id?>" enctype="multipart/form-data" method="post" class="comment-form">
        <label for="namePerson">Ваше имя</label>
        <input type="text" id="namePerson" name="namePerson">
        <label for="comment"><h3>Оставьте комментарий</h3></label>
        <input type="text" id="comment" name="comment">
        <input type="submit">
        <h2 id="status"></h2>
    </form>
</section>

<script>
    $(function () {
        $("#add_to_card").on('click', function () {
            let id = $(this).data('id');
            let qty = $("#qty_input").val();
            $.ajax({
                url : "/?c=cart&a=add",
                type: "POST",
                data: {
                    product_id: id,
                    qty: qty
                },
                success : function (response) {
                    console.log(response);
                    response = JSON.parse(response);
                    if(response.success == 'ok'){
                        alert(response.message)
                    }
                }
            })
        })
    })
</script>
