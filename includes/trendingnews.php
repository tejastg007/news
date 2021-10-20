<?php
$res = file_get_contents("https://newsapi.org/v2/top-headlines?country=in&apiKey=$apikey");
$res = json_decode($res);
?>

<div class="trending-news">
    <p class="trending-news-title">Now Trending !!</p>
    <div class="swiper-container mySwiper">
        <div class="swiper-wrapper">

            <?php
            $i = 0;
            $c = 0;
            while ($c < 7) {
                $ref = $res->articles[$i];
                if ($ref->source->id == 'google-news') {
                    $i++;
                    continue;
                }
                $title = $ref->title;
                $date = new DateTime($ref->publishedAt);
                $date = date_format($date, 'M d, Y');
                $imglink = $ref->urlToImage;
                $articlelink = $ref->url;
            ?>
                <div class="swiper-slide">
                    <a href="<?php echo $articlelink ?>" target="_blank"><img src="<?php echo $imglink ?>" alt="" class=""></a>
                    <div class="swiper-body">
                        <a href="<?php echo $articlelink ?>" target="_blank">
                            <p class="news-title"><?php echo $title ?></p>
                        </a>
                        <p class="news-date"> - &nbsp; <?php echo $date ?></p>
                    </div>
                </div>
            <?php $i++;
                $c++;
            } ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

</div>