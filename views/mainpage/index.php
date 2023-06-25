<section class="container section-2">
  <!-- offer 1 -->

  <div class="offer offer-1">
    <div class="just_in-slider slider swiper">
      <div class="swiper-wrapper">
        <?php foreach ($items as $item) { ?>
          <div class="item swiper-slide">
            <p class="itemnamemain"><?php echo $item->itemname ?></p>
          </div>
        <?php } ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <div class="offer-description offer-desc-1">
      <h2 class="offer-title"><?php echo "Just In"; ?></h2>
      <p class="offer-hook">This a Item nulla vulputate magna vel odio sagittis bibendium...</p>
      <div class="cart-btn">Step In</div>
    </div>
  </div>

  <!-- offer 2 -->

  <div class="offer offer-2">
  <div class="trending-slider slider swiper">
      <div class="swiper-wrapper">
        <?php foreach ($items as $item) { ?>
          <div class="item swiper-slide">
            <p class="itemnamemain"><?php echo $item->itemname ?></p>
          </div>
        <?php } ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <div class="offer-description offer-desc-2">
      <h2 class="offer-title"><?php echo "Trending"; ?></h2>
      <p class="offer-hook">This a Item nulla vulputate magna vel odio sagittis bibendium...</p>
      <div class="cart-btn">Step In</div>
    </div>
  </div>
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