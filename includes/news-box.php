<div class="news-box">
    <div class="latest-technology">
        <p class="section-title">Latest in <span>technology</span></p>
        <div class="tech-cards-container">
            <?php
            $data = file_get_contents('https://newsapi.org/v2/top-headlines?country=in&category=technology&apiKey=' . $apikey);
            $res = json_decode($data);
            $i = 0;
            $c = 0;
            while ($c < 5) {
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
                $description = $ref->description;
            ?>
                <div class="tech-card wow animate__animated animate__zoomIn">
                    <div class="tech-img">
                        <a href="<?php echo $articlelink ?>" target="_blank"><img src="<?php echo $imglink ?>" class="lozad" alt=""></a>
                    </div>
                    <div class="tech-body">
                        <a href="<?php echo $articlelink ?>" target="_blank" class="tech-title"><?php echo $title ?></a>
                        <p class="tech-date"><?php echo $date ?></p>
                        <p class="tech-description"><?php echo $description ?></p>
                    </div>
                </div>

            <?php $i++;
                $c++;
            } ?>
            <button onclick="window.open('./category/technology')" class="read-more-button">Read more in
                Technology</button>
        </div>
    </div>
    <script>
        var no = document.getElementsByClassName('tech-description').length;
        for (i = 0; i < no; i++) {
            document.getElementsByClassName('tech-description')[i].innerHTML = document.getElementsByClassName(
                'tech-description')[i].innerHTML.substr(0, 150) + "......";
        }
    </script>

    <div class="latest-entertainment">
        <p class="title">stay entertained</p>
        <div class="e-cards-container">

            <?php
            $data = file_get_contents('https://newsapi.org/v2/top-headlines?country=in&category=entertainment&apiKey=5f7db36c4764436aa8cbd144d2e30aa4');
            $res = json_decode($data);
            $i = 0;
            $c = 0;
            while ($c < 4) {
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
                <div class="e-card wow animate__animated animate__fadeIn">
                    <div class="e-img"><a target="_blank" href="<?php echo $articlelink ?>"><img class="lozad" src="<?php echo $imglink ?>" alt=""></a></div>
                    <p class="e-date"><?php echo $date ?></p>
                    <a target="_blank" href="<?php echo $articlelink ?>" class="e-title"><?php echo $title ?></a>
                </div>
            <?php $i++;
                $c++;
            } ?>
            <button onclick="window.open('./category/entertainment')" class="read-more-button">more in
                entertainment</button>
        </div>
    </div>
</div>