<?php
declare(strict_types=1);
?>
<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($categories as $category) { ?>
            <li class="promo__item <?php print(htmlspecialchars('promo__item--' . $category['class'])) ?>">
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
                    <h3 class="lot__title"><a class="text-link" href="<?php print('lot.php?id=' . htmlspecialchars($item['id'])) ?>"><?php print(htmlspecialchars($item['name'])) ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?php if ($item['rate'] !== null) {
                                print(formatting_amount(htmlspecialchars($item['rate'])));
                            } else {
                                print(formatting_amount(htmlspecialchars($item['price'])));
                                } ?></span>
                        </div>
                        <div class="lot__timer timer <?php echo(is_little_time(seconds_before_the_end(strtotime('now'), strtotime($item['completion_date'])))) ?>">
                            <?php echo(time_before_the_end(seconds_before_the_end(strtotime('now'), strtotime($item['completion_date'])))) ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</section>
