<!-- //!-------------sidebar menu----------------->

<div class="sidebar-menu" id="sidebar-menu">
    <a class="close-sidebar-menu" href="javascript:void(0)" onclick="closes()"><i class="fa fa-times"></i></a>
    <p>Top sources <br> worldwide</p>
    <input id="search-country" class="sidebar-menu-search" type="text" placeholder="Search Source.."
        style="border:none;outline:none;padding:10px" onkeyup="showcountry()">
    <div class="country-list">
        <a class="sidebar-menu-item" href="http://thehindu.com">the hindu</a>
        <a class="sidebar-menu-item" href="https://www.hindu-blog.com/">the hindu-blog</a>
        <a class="sidebar-menu-item" href="http://www.worldhindunews.com/">world hindu news</a>
        <a class="sidebar-menu-item" href="https://timesofindia.indiatimes.com/">times of india</a>
        <a class="sidebar-menu-item" href="https://economictimes.indiatimes.com/">the economic times </a>
        <a class="sidebar-menu-item" href="https://www.livemint.com/">livemint</a>
        <a class="sidebar-menu-item" href="https://www.moneycontrol.com/">moneycontrol</a>
        <a class="sidebar-menu-item" href="https://www.scroll.in/">scroll</a>
        <a class="sidebar-menu-item" href="https://www.financialexpress.com/">financial express</a>
        <a class="sidebar-menu-item" href="https://indianexpress.com/">the indian express</a>
        <a class="sidebar-menu-item" href="https://www.hindustantimes.com/">hindustan times</a>
        <?php
        $data = file_get_contents('https://newsapi.org/v2/sources?apiKey=52b23d3a36fb41729adaf5f1bd3acae1');
        $res = json_decode($data);
        $results = count($res->sources);
        for ($i = 0; $i < $results; $i++) {
            if ($res->sources[$i]->language == 'en') {
        ?>

        <a class="sidebar-menu-item" target="_blank"
            href="<?php echo $res->sources[$i]->url ?>"><?php echo $res->sources[$i]->name ?></a>

        <?php }
        } ?>
    </div>
</div>



<!-- //!----------------search panel-------------->

<div class="search-panel" id="search-panel">
    <a href="javascript:void(0)" onclick="closesearchpanel()"><i class="close fa fa-close"></i></a>
    <!-- <p>search </p>    -->
    <form action="./search" method="post">
        <div class="qsearch-bar">
            <input type="text" name="query" placeholder="Search.." id="query" required>
            <button id="submit" type="submit"><i class="fa fa-search"></i></button>
        </div><br>

        <p>search by any keyword, worldwide!!</p>
    </form>
</div>





<!-- //!------------top nav---------------  -->

<div class="nav" id="nav">
    <div class="nav-top">
        <div class="social-icons">
            <div class="icon-holder"><a href="javascript:void(0)"><i class="fa fa-facebook-f"></i></a></div>
            <div class="icon-holder"><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i></a></div>
            <div class="icon-holder"><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></div>
            <div class="icon-holder"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></div>
        </div>
        <div class="logo">
            <a href="<?php echo $protocol . "://" . $domain . $homelink ?>"><img src="./assets/media/logo.webp"
                    alt=""></a>
        </div>
        <div class="search-bar">
            <a id="searchbarbutton" href="javascript:void(0)" onclick="opensearchpanel()">Search.. <i
                    class="fa fa-search"></i></a>
        </div>
    </div>
</div>

<script>
function opensearchpanel() {
    document.getElementById("search-panel").style.display = "flex"
    document.getElementById("query").focus();
}

function closesearchpanel() {
    document.getElementById("search-panel").style.display = "none"
}
</script>




<!-- //!------------ nav bar---------------  -->

<div class="nav-bar">
    <div class="sidebar-button">
        <a href="javascript:void(0)" class="sidebar-icon" onclick="opens()"><i class="sidebar-icon fa fa-bars"></i></a>
    </div>
    <div class="nav-menu">
        <a href="./" class="nav-item">home</a>
        <a href="./category/trending" class="nav-item">trending</a>
        <a href="./category/business" class="nav-item">Business</a>
        <a href="./category/entertainment" class="nav-item">Entertainment</a>
        <a href="./category/general" class="nav-item">General</a>
        <a href="./category/health" class="nav-item">Health</a>
        <a href="./category/science" class="nav-item">Science</a>
        <a href="./category/sports" class="nav-item">Sports</a>
        <a href="./category/technology" class="nav-item">Technology</a>
        <a href="javascript:void(0)" onclick="opensearchpanel()" class="nav-item"><i class="fa fa-search"></i></a>
    </div>
</div>


<div class="floating-social-icons">
    <div class="floating-social-icons">
        <div class="icon-holder"><a href="javascript:void(0)"><i class="fa fa-facebook-f"></i></a></div>
        <div class="icon-holder"><a href="javascript:void(0)"><i class="fa fa-whatsapp"></i></a></div>
        <div class="icon-holder"><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></div>
        <div class="icon-holder"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></div>
        <div class="icon-holder"><a href="javascript:void(0)"><i class="fa fa-tumblr"></i></a></div>
        <div class="icon-holder"><a href="javascript:void(0)"><i class="fa fa-quora"></i></a></div>
    </div>
</div>
<script></script>