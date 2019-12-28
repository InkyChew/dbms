<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php session_start(); echo $_SESSION['mode'];?></title>
    <style type=text/css>
    body{
        background-image:url( https://png.pngtree.com/thumb_back/fw800/background/20190223/ourmid/pngtree-pure-hand-painted-literary-minimalist-border-background-hand-drawingwatercolorplantflowersliteraryweddinggreeting-cardbackgroundmaterialframesimple-image_87164.jpg );
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
    }
    </style>
</head>
<body>

<?php    
    $tab = $_SESSION['tab'];
    $mode = $_SESSION['mode'];
    $title = $tab . "管理-" . $mode;
    echo "<h1>$title</h1>";
    
?>
    <hr>
    <form action="controller.php" method="post">
    <br><br>

<?php
    echo "<font>！資料沒有刪除！</font>";
    echo "<br><br>";        
    echo "<button type='submit' name='btn' value=$mode>回" . $tab . "刪除</button>&nbsp;<button type='submit' name='btn' value=$tab>回" . $tab . "管理</button>";
?>
    <br><br>
    </form>
    <hr>
</body>
</html>

