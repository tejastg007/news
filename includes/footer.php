<?php include "./includes/globals.php" ?>
<div class="footer">
    <div class="footer1">
        <div class="about-us">
            <p class="footer1-title">about us</p>
            <a href="" class="aboutus-img"><img src="./assets/media/logo.webp" alt=""></a>
            <div class="aboutus-body">
                <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos cupiditate
                    deleniti iste alias non nobis itaque delectus quia cum fuga qui quis velit quibusdam, perferendis
                    saepe eos corporis numquam. Quo?</p><br>
                <p class="address"><span>Address:</span> 24/916, opposite aadhar library, main street, ichalkaranji,
                    416115.</p>
                <p class="email"><span>Email us:</span> lorem@gmail.com</p>
                <p class="contact"><span>Contact-us:</span> 7620769633</p>
            </div>
        </div>
        <div class="top-sources">
            <p class="footer1-title">top sources</p>
            <div class="source">
                <a target="_blank" href="https://www.thehindu.com/">the hindu</a>
                <p class="source-category">-&nbsp;general</p>
            </div>
            <div class="source">
                <a target="_blank" href="https://timesofindia.indiatimes.com/">the times of india</a>
                <p class="source-category">-&nbsp;general</p>
            </div>
            <div class="source">
                <a target="_blank" href="https://www.buzzfeed.com/in">buzzfeed</a>
                <p class="source-category">-&nbsp;entertainment</p>
            </div>
            <div class="source">
                <a target="_blank" href="https://mashable.com/">mashable</a>
                <p class="source-category">-&nbsp;entertainment</p>
            </div>
            <div class="source">
                <a target="_blank" href="https://in.mashable.com/">engadget</a>
                <p class="source-category">-&nbsp;technology</p>
            </div>
            <div class="source">
                <a target="_blank" href="https://www.techcrunch.com/">tech crunch</a>
                <p class="source-category">-&nbsp;technology</p>
            </div>
            <div class="source">
                <a target="_blank" href="https://www.techradar.com/in">tech radar</a>
                <p class="source-category">-&nbsp;technology</p>
            </div>
            <div class="source">
                <a target="_blank" href="https://www.bbc.com/sport">BBC sports</a>
                <p class="source-category">-&nbsp;sports</p>
            </div>
            <div class="source">
                <a target="_blank" href="https://www.espn.in/">ESPN</a>
                <p class="source-category">-&nbsp;sports</p>
            </div>
            <div class="source">
                <a target="_blank" href="https://www.bloomberg.com/asia">bloomberg</a>
                <p class="source-category">-&nbsp;business</p>
            </div>
            <div class="source">
                <a target="_blank" href="https://www.businessinsider.in/">business insider</a>
                <p class="source-category">-&nbsp;business</p>
            </div>
        </div>
        <div class="corona-news">
            <p class="footer1-title">Latest Health news</p>

            <?php
            $res = file_get_contents("https://newsapi.org/v2/top-headlines?country=in&category=health&apiKey=52b23d3a36fb41729adaf5f1bd3acae1");
            $res = json_decode($res);
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
                if ($imglink == "null") {
                    $i++;
                    continue;
                }
                $articlelink = $ref->url;
            ?>
                <div class="corona-news-card">
                    <a target="_blank" href="<?php echo $articlelink ?>" class="img"><img class="lozad" data-src="<?php echo $imglink ?>" alt=""></a>
                    <div class="body">
                        <p><a target="_blank" href="<?php echo $articlelink ?>"><?php echo $title ?> </a> </p>
                        <p><?php echo $date ?></p>
                    </div>
                </div>
                <hr>
            <?php
                $c++;
                $i++;
            } ?>
        </div>
    </div>

</div>
<script src="assets/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/swiper.js"></script>

<script src="<?php echo 'assets/js/navopenclose.js' ?>"> </script>
<script>
    const observer = lozad(); // lazy loads elements with default selector as ".lozad"
    observer.observe();
</script>
<script>
    new WOW().init();
</script>

</body>

</html>