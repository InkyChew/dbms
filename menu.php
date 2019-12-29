<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title><?php session_start(); echo $_SESSION['tab'] . '管理';?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="text-align:left;"><h1>&nbsp YunTech Eat </h1></div>
    <?php    
        $title = $_SESSION['tab'] . "管理";
        echo "<h1 align=\"center\">$title</h1>";    
    ?>
    <hr>
    <div class = "btn-group">
    <form action="controller.php"  method="post">
        <button type="submit" name="btn" class="btn btn-info btn-lg" value="查詢">查詢</button><br><br>
        <button type="submit" name="btn" class="btn btn-warning btn-lg" value="新增">新增</button><br><br>
        <button type="submit" name="btn" class="btn btn-info btn-lg" value="修改">修改</button><br><br>
        <button type="submit" name="btn" class="btn btn-warning btn-lg" value="刪除">刪除</button><br><br><br>
        <button type="submit" name="btn" class="btn btn-secondary btn-lg" value="回主畫面">主畫面</button>
    </form>
    </div>

</body>
</html>