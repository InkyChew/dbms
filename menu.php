<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title><?php session_start(); echo $_SESSION['tab'] . '管理';?></title>
</head>
<body>
    <?php    
        $title = $_SESSION['tab'] . "管理";
        echo "<h1>$title</h1>";    
    ?>
    <hr>

    <form action="controller.php" method="post">
        1. <button type="submit" name="btn" value="查詢">查詢</button><br><br>
        2. <button type="submit" name="btn" value="新增">新增</button><br><br>
        3. <button type="submit" name="btn" value="修改">修改</button><br><br>
        4. <button type="submit" name="btn" value="刪除">刪除</button><br>
        <button type="submit" name="btn" value="回主畫面">回主畫面</button>
    </form>

</body>
</html>