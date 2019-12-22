<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php session_start(); echo $_SESSION['mode'];?></title>
</head>
<body>

<?php    
    $title = "會員管理-" . $_SESSION['mode'];
    echo "<h1>$title</h1>";    
?>
    <hr>
    <form action="controler.php" method="post">
        memberID: <input type="int" name="no"><br><br>
        <button type="submit" name="btn" value="goSQL"><?php echo $_SESSION['mode']?></button>
        <button type="reset">清除</button> <button type="submit" name="btn">回主畫面</button>
    </form>
    <hr>
</body>
</html>

