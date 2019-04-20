<?php
?>
<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($categories as $category) { ?>
            <li class="promo__item <?php print(htmlspecialchars($category['class'])) ?>">
                <a class="promo__link" href="pages/all-lots.html"><?php print(htmlspecialchars($category['name'])) ?></a>
            </li>
        <?php } ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach ($ads as $item) { ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?php print(htmlspecialchars($item['url'])) ?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?php print(htmlspecialchars($item['category'])) ?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?php print(htmlspecialchars($item['name'])) ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?php print(formatting_amount(htmlspecialchars($item['price']))) ?></span>
                        </div>
                        <div class="lot__timer timer <?php echo($little_time) ?>">
                            <?php echo($time_before_the_end) ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</section>
