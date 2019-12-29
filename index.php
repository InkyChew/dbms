<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>YunTech Eat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="text-align:center;"><h1>YunTech Eat</h1></div>

    <!--<div style="heigh:100%; width:100%; text-align:center">-->
    <div class="btn-group" role="group" aria-label="Basic example">
        <form action="controller.php" method="post">
        <button type="submit" name="btn" value="會員" class="btn btn-secondary btn-lg btn-block">會員管理</button><br>
            <button type="submit" name="btn" value="外送員" class="btn btn-secondary btn-lg btn-block">外送員管理</button><br>
            <button type="submit" name="btn" value="餐廳" class="btn btn-secondary btn-lg btn-block">餐廳管理</button><br>
            <button type="submit" name="btn" value="食物" class="btn btn-secondary btn-lg btn-block">食物管理</button><br>
            <button type="submit" name="btn" value="購買紀錄" class="btn btn-secondary btn-lg btn-block">購買紀錄管理</button>
        </form>
    </div>

</body>
</html>