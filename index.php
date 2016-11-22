<?php
$jsondata = file_get_contents("games.json");
$json = json_decode($jsondata, true);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Rizwan Yousaf | Full-Stack Developer</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body id="top">
        <section id="rig">
            <form class="search-field" method="post" action="">
                <input type="text" placeholder="Search..." class="form-control" name="search-field"><br>
                <input type="submit" value="Search" class="btn-control">
                <input type="hidden" name="action" value="search">
            </form>
            <?php
            if ($_POST['action'] == "search"){ 
                foreach ($json['games'] as $game) {
                    if (strpos(strtolower($game['title']), strtolower($_POST['search-field'])) !== false) {
                        ?>
                        <div class="grid-gallery">
                            <a class="rig-cell" href="#">
                                <img class="rig-img" src="<?= $game['image_url'] ?>">
                                <span class="rig-overlay"></span>
                                <span class="rig-text"><?= $game['title'] ?></span>
                            </a>
                        </div> 
                        <?php

                        }     
                    }
                } else {
                    foreach ($json['games'] as $game) {
                        ?>
                        <div class="grid-gallery">
                            <a class="rig-cell" href="#">
                                <img class="rig-img" src="<?=$game['image_url']?>">
                                <span class="rig-overlay"></span>
                                <span class="rig-text"><?=$game['title']?></span>
                            </a>
                        </div> 
                        <?php
                    }
                }
                ?>  
        </section>

    </body>
</html>