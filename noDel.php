<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php session_start(); echo $_SESSION['mode'];?></title>
</head>
<body>

<?php    
    $title = "資料庫管理系統-" . $_SESSION['mode'];
    echo "<h1>$title</h1>";
    $mode = $_SESSION['mode'];
?>
    <hr>
    <form action="controler.php" method="post">
    <br><br>

<?php
    echo "<font>！資料沒有刪除！</font>";
    echo "<br><br>";        
    echo "<button type='submit' name='btn' value=$mode>回" . $mode . "主畫面</button>&nbsp;<button type='submit' name='btn'>主畫面</button>";
?>
    <br><br>
    </form>
    <hr>
</body>
</html>

