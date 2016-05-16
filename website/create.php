<?php
if(isset($_POST['url']) and isset($_POST['url']) and isset($_POST['auth'])) {
    include('shortener.php');
    require_once('shortener.php');
    $surl = new SUrl($_POST['url'], $_POST['auth']);
    $newurl = $surl->getNewUrl();
    echo $newurl;
}