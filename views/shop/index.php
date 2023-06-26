<section class="productos">
    <?php foreach ($items as $item) { ?>
        <div class="articulo">
            <div class="img-pos">
                <img class="articulo-img" src="../build/img/<?php echo $item->img ?>.webp" alt="imagen del articulo">
            </div>
            <div class="contenido-articulo">
                <h3 class="nombre-articulo"><?php echo $item->itemname; ?></h3>
                <p class="precio-articulo">PRECIO: $<?php echo $item->price ?></p>
                <div class="btn-main">
                    <button class="glow-on-hover" type="button" id="buy-article">Comprar</button>
                </div>
            </div>
        </div>
    <?php } ?>
</section>