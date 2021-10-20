<?php include "includes/header.php";
$category = $_GET['cat'];
?>
<div class="container">
    <div class="category">
        <div class="from-india">
            <p class="section-title">You are browsing :<span> <?php echo $category ?></span></p>
            <div class="card-container">
                <?php
                $url = "https://newsapi.org/v2/top-headlines?country=in&category=" . $category . "&apiKey=52b23d3a36fb41729adaf5f1bd3acae1";
                if ($category == "trending") {
                    $url = "https://newsapi.org/v2/top-headlines?country=in&apiKey=52b23d3a36fb41729adaf5f1bd3acae1";
                }
                $data = file_get_contents($url);
                $res = json_decode($data);
                $count = count($res->articles);
                $c = 0;
                while ($c < $count) {
                    $ref = $res->articles[$c];
                    if ($ref->source->id == 'google-news') {
                        $c++;
                        continue;
                    }
                    $title = $ref->title;
                    $date = new DateTime($ref->publishedAt);
                    $date = date_format($date, 'M d, Y');
                    $imglink = $ref->urlToImage;
                    $imglink = $ref->urlToImage;
                    if ($imglink == "") {
                        $c++;
                        continue;
                    }
                    $articlelink = $ref->url;
                    $description = $ref->description;
                    if ($description == "") {
                        $description = $ref->content;
                    }
                ?>
                    <div class="card">
                        <a target="_blank" href="<?php echo $articlelink ?>" class="card-img">
                            <img class="lozad" data-src="<?php echo $imglink ?>" alt="">
                        </a>
                        <div class="card-body">
                            <a target="_blank" href="<?php echo $articlelink ?>" class="title">
                                <p><?php echo $title ?>
                                </p>
                            </a>
                            <p class="date"><?php echo $date ?></p>
                            <p class="description"><?php echo $description ?></p>
                        </div>
                    </div>
                <?php
                    $c++;
                } ?>
            </div>
        </div>


        <div class="from-world">
            <p class="from-world-title">dont miss</p>
            <div class="card-container">
                <?php
                $url = "https://newsapi.org/v2/top-headlines?country=us&category=" . $category . "&apiKey=52b23d3a36fb41729adaf5f1bd3acae1";
                if ($category == "trending") {
                    $url = "https://newsapi.org/v2/top-headlines?country=us&apiKey=52b23d3a36fb41729adaf5f1bd3acae1";
                }
                $data = file_get_contents($url);
                $res = json_decode($data);
                $count = count($res->articles);
                $c = 0;
                while ($c < $count) {
                    $ref = $res->articles[$c];
                    if ($ref->source->id == 'google-news') {
                        $c++;
                        continue;
                    }
                    $title = $ref->title;
                    $date = new DateTime($ref->publishedAt);
                    $date = date_format($date, 'M d, Y');
                    $imglink = $ref->urlToImage;
                    if ($imglink == "") {
                        $c++;
                        continue;
                    }
                    $articlelink = $ref->url;
                ?>
                    <div class="card">
                        <a target="_blank" href="<?php echo $articlelink ?>" class="card-img">
                            <img class="lozad" data-src="<?php echo $imglink ?>" alt="">
                        </a>
                        <div class="card-body">
                            <a target="_blank" href="<?php echo $articlelink ?>">
                                <p class="title"> <?php echo $title ?></p>
                            </a>
                            <p class="date"><?php echo $date ?></p>
                        </div>
                    </div>
                <?php
                    $c++;
                } ?>
            </div>
        </div>
    </div>
</div>
<script>
    var no = document.getElementsByClassName('description').length;
    for (i = 0; i < no; i++) {
        document.getElementsByClassName('description')[i].innerHTML = document.getElementsByClassName('description')[i].innerHTML.substr(0, 100) + "...";
    }

    document.getElementById('nav').style.display = "none";
</script>
<?php include "./includes/footer.php" ?>