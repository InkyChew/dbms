<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php session_start(); echo $_SESSION['mode'];?></title>
    <style type=text/css>
    body{
        background-image:url( https://www.mokuge.com/uploads/userup/505/1555502307.jpg );
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
    }
    </style>
</head>
<body>
<div style="text-align:center;"><h1>&nbsp YunTech Eat </h1></div>
<?php    
    $tab = $_SESSION['tab'];
    $mode = $_SESSION['mode'];
    $title = $tab . "管理-" . $mode;
    echo "<h1 align=\"center\">$title</h1>";
    
?>
    <hr>
    <form action="controller.php" method="post">
    <br><br>
<div style="width:100%;text-align:center">
<?php
    echo "<font>！資料沒有刪除！</font>";
    echo "<br><br>";        
    echo "<button type='submit' name='btn' value=$mode>回" . $tab . "刪除</button>&nbsp;<button type='submit' name='btn' value=$tab>回" . $tab . "管理</button>";
?>
</div>
    <br><br>
    </form>
    <hr>
</body>
</html>

