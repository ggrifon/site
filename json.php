<?php

function getYoutubeDataXml()
{
    echo $dateBefore = date('Y-m-d\TH:i:s');
    $q = str_replace(" ","%20",$_GET['text']);
    $url = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyAhgcnvCaYqRQOd9g_XpVTrwqhCgfyln0w&part=snippet&maxResults=20&order=viewCount&publishedBefore='.$dateBefore.'Z&q='.$q.'&type=video&videoCaption=any';
    $buf = file_get_contents($url);
    $json = json_decode($buf, true);

    ?>

    <head>
        <title>Search result</title>
        <meta charset="utf-8">
    </head>
    <style type="text/css">
        .video {
            overflow: hidden;
            height:0;
            transition:0.5s;
            width: 640px;
        }
        .videoActive {
      
            height: 350px;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('.clickHide').click(function(){
                $(this).parent().find('.video').toggleClass('videoActive');
            });


        });
    </script>
    <form action="json.php" method="get">
        <input type="text" name="text" placeholder="| Search" value="<?=$_GET['text']?>">
        <input type="submit" name="submit" value="Искать">
    </form>

    <?php
    for ($i = 0;$i < 20;$i++){ ?>
        <div class="CoreVideo">
            <div class="clickHide">Видео: Название-><?= $json['items'][$i]['snippet']['title']?></div>
            Автор-><?= $json['items'][$i]['snippet']['channelTitle']?>
            Дата публикации->
            <?php
            $dt = strtotime($json['items'][$i]['snippet']['publishedAt']);
            echo date("d-m-Y",$dt);
            ?>.
            <div class="video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$json['items'][$i]['id']['videoId']?>" frameborder="0" allowfullscreen>
                </iframe>

            </div>
        </div>
    <?php } ?>

    <?php
}
getYoutubeDataXml();

?>
