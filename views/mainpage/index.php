<section class="container section-2">
  <!-- offer 1 -->
  <?php foreach (array_slice($items, 0, 1) as $item) { ?>
    <div class="offer offer-1">
      <img src="../build/img/<?php echo $item->img ?>.webp" alt="a computer in dark with with white shadow" class="offer-img offer-1-img">
      <div class="offer-description offer-desc-1">
        <h2 class="offer-title"><?php echo $item->itemname; ?></h2>
        <p class="offer-hook">This a Item nulla vulputate magna vel odio sagittis bibendium...</p>
        <div class="cart-btn">ADD TO CART</div>
      </div>
    </div>
  <?php } ?>

  <!-- offer 2 -->
  <?php foreach (array_slice($items, 2, 1) as $item) { ?>
    <div class="offer offer-2">
      <img src="../build/img/<?php echo $item->img ?>.webp" alt="a opened computer" class="offer-img offer-2-img">
      <div class="offer-description offer-desc-2">
        <h2 class="offer-title"><?php echo $item->itemname; ?></h2>
        <p class="offer-hook">This a Item nulla vulputate magna vel odio sagittis bibendium...</p>
        <div class="cart-btn">ADD TO CART</div>
      </div>
    </div>
  <?php } ?>
</section>

<!-- PRODUCT SECTION -->
<section class="container section-3">
  <?php foreach (array_slice($items, 0, 4) as $item) { ?>
    <div class="product product-1">
      <img src="../build/img/<?php echo $item->img ?>.webp" alt="computer to sell" class="product-img">
      <span class="product_add_cart">COMPRAR</span>
    </div>
  <?php } ?>
</section>

<!-- SUBSCRIBE SECTION-->
<section class="container section-5">
  <h2 class="subscribe-input-label">NEWSLETTER</h2>
  <div class="subscribe-container">
    <input type="text" id="email-subscribe" placeholder="Email address...">
    <input type="submit" value="SUBSCRIBE">
  </div>
</section>
</main>