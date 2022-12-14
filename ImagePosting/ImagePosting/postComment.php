<?php

include('./dbConfig.php');
$imageId = $_GET['image_id'];
$comment = $_POST['comment'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($comment)) {
   $insert = $db->query("INSERT INTO comment (image_id, comment) VALUES (" . $imageId . ",'" . $comment . "')");
//ここが変！！！！！！！
    if($insert) {
        $uri = $_SERVER['HTTP_REFERER'];
        header('Location: ' . $uri, true, 303);
        exit();
    }
} else {
    $uri = $_SERVER['HTTP_REFERER'];
    header('Location: ' . $uri, true, 303);
    exit(); 
}