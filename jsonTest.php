<?php

getYoutubeDataXml();

function getYoutubeDataXml() {
// Ключ для запросов
//$api_key = 'AIzaSyAhgcnvCaYqRQOd9g_XpVTrwqhCgfyln0w';

    /*
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet'
. '&channelId=' . $id
. '&key=' . $api_key;*/
//$url = 'https://www.googleapis.com/youtube/v3/videos?id=_cVa2rndRBE&key=AIzaSyAhgcnvCaYqRQOd9g_XpVTrwqhCgfyln0w%20&part=snippet';
$url = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyAhgcnvCaYqRQOd9g_XpVTrwqhCgfyln0w&forUsername=PewDiePie&part=snippet,id&order=date&maxResults=1';
    //https://www.googleapis.com/youtube/v3/videos
    $buf = file_get_contents($url);

$json = json_decode($buf, true);

    echo "<hr>";
    echo "<pre>";
    ?>
    <a href="https://www.youtube.com/watch?v=<?=$json['items']['0']['id']?>">1231231</a>
    <?php
    echo var_dump($json['items']['0']['id']);
    echo "</pre>";

echo "<hr>";
echo "<pre>";
var_dump($json);
echo "</pre>";



}


