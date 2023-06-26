<div class="itemcontainer">
    <?php foreach (array_slice($items, 0, 1) as $item) { ?>
        <div class="articulo">
            <div class="img-pos">
                <img class="articulo-img" src="../build/img/<?php echo $item->img ?>.webp" alt="imagen del articulo">
            </div>
            <div class="contenido-articulo">
                <h3 class="nombre-articulo"><?php echo $item->itemname; ?></h3>
                <p class="precio-articulo">PRECIO: $<?php echo $item->price ?></p>
            </div>
        </div>
    <?php } ?>
</div>