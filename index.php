<?php
require_once __DIR__ . '/vendor/autoload.php';

use Face\Classes\Faceapi;

$skey = "xxxx";
$face = new Faceapi($skey);
//test1
$image1 = file_get_contents("images/test1.1.png");
$image2 = file_get_contents("images/test1.2.jpg");
$faceId1 = $face->detect($image1)[0]->faceId;
$faceId2 = $face->detect($image2)[0]->faceId;
$result = $face->verify($faceId1, $faceId2);
if($result->isIdentical == true) {
    $test1 = "Verified!";
} else{
    $test1 = "Not verified!";
}

//test2
$image1 = file_get_contents("images/test2.1.jpg");
$image2 = file_get_contents("images/test2.2.jpg");
$faceId1 = $face->detect($image1)[0]->faceId;
$faceId2 = $face->detect($image2)[0]->faceId;
$result = $face->verify($faceId1, $faceId2);
if($result->isIdentical == true) {
    $test2 = "Verified!";
} else{
    $test2 = "Not verified!";
}

//test3
$image1 = file_get_contents("images/test3.1.jpg");
$image2 = file_get_contents("images/test3.2.jpg");
$faceId1 = $face->detect($image1)[0]->faceId;
$faceId2 = $face->detect($image2)[0]->faceId;
$result = $face->verify($faceId1, $faceId2);
if($result->isIdentical == true) {
    $test3 = "Verified!";
} else{
    $test3 = "Not verified!";
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Face Verification Test</title>
    <style>
    img{height: 200px;}
    </style>
</head>
<body>
    <h2>Test 1</h2>
    <div>
        <img src="/images/test1.1.png">
        <img src="/images/test1.2.jpg">
    </div>
    <h3><?php echo $test1; ?></h3>
    <h2>Test 2</h2>
    <div>
        <img src="/images/test2.1.jpg">
        <img src="/images/test2.2.jpg">
    </div>
    <h3><?php echo $test2; ?></h3>
    <h2>Test 3</h2>
    <div>
        <img src="/images/test3.1.jpg">
        <img src="/images/test3.2.jpg">
    </div>
    <h3><?php echo $test3; ?></h3>
</body>
</html>
