<div class="trending-india">
    <p class="section-title">Trending in <span>india </span></p>

    <div class="news-cards-container">
        <?php
        $i = 0;
        $c = 0;
        while ($c < 3) {
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
            <div class="news-card wow animate__animated animate__zoomIn"> 
                <a href="<?php echo $articlelink ?>" target="_blank"><img src="<?php echo $imglink ?>" class="swiper-lazy " alt="">
                </a>
                <a href="<?php echo $articlelink ?>" target="_blank" class="news-card-title"><?php echo $title ?></a>
                <p class="news-card-date"><?php echo $date ?></p>
            </div>
        <?php $i++;
            $c++;
        } ?>

        <div class="news-card view-more-card">
            <a target="_blank" href="./category/trending">
            </a>
            <p>read more articles</p>
            <i class="fa fa-angle-double-right"></i>
        </div>

    </div>

</div>