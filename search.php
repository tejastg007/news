<?php include "./includes/header.php";
?>
<div class="container">
    <div class="category">
        <div class="from-india">
            <?php
            // $q=$_GET['query'];
            $q = $_POST['query'];
            if ($q == "") {
                header("location:./index");
            }
            $qr = urlencode($q);
            $url = "https://newsapi.org/v2/everything?q=" . $qr . "&apiKey=5f7db36c4764436aa8cbd144d2e30aa4";
            $data = file_get_contents($url);
            $res = json_decode($data);
            $count = count($res->articles);
            ?>
            <p><?php $res->status; ?></p>
            <p class="section-title"><?php echo $count . " results for :" ?><span> <?php echo $q  ?></span></p>
            <div class="card-container">
                <?php
                $c = 0;
                while ($c < $count && $c < 1000) {
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
                    $description = $ref->description;
                    // if ($description == "") {
                    //     $description = $ref->content;
                    // }
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
                $url = "https://newsapi.org/v2/top-headlines?country=in&category=entertainment&apiKey=5f7db36c4764436aa8cbd144d2e30aa4";
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
        document.getElementsByClassName('description')[i].innerHTML = document.getElementsByClassName('description')[i]
            .innerHTML.substr(0, 100) + "...";
    }
    document.getElementById('nav').style.display = "none";
</script>
<?php
include "./includes/footer.php"
?>