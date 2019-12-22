<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>主畫面</title>
</head>
<body>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#member" role="tab" aria-controls="home" aria-selected="true">會員管理</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#delivery" role="tab" aria-controls="profile" aria-selected="false">外送員管理</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#rest" role="tab" aria-controls="contact" aria-selected="false">餐廳管理</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#food" role="tab" aria-controls="profile" aria-selected="false">食物管理</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#history" role="tab" aria-controls="contact" aria-selected="false">購買紀錄管理</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="member" role="tabpanel" aria-labelledby="home-tab">
            <hr>
                <h1>會員管理</h1>
            <hr>

            <form action="controler.php" method="post">
                1. <button type="submit" name="btn" value="查詢">查詢</button><br><br>
                2. <button type="submit" name="btn" value="新增">新增</button><br><br>
                3. <button type="submit" name="btn" value="修改">修改</button><br><br>
                4. <button type="submit" name="btn" value="刪除">刪除</button><br>
            </form>
            <hr>
        </div>
        <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="profile-tab">
            <hr>
                <h1>外送員管理</h1>
            <hr>

            <form action="controler.php" method="post">
                1. <button type="submit" name="btn" value="查詢">查詢</button><br><br>
                2. <button type="submit" name="btn" value="新增">新增</button><br><br>
                3. <button type="submit" name="btn" value="修改">修改</button><br><br>
                4. <button type="submit" name="btn" value="刪除">刪除</button><br>
            </form>
            <hr>
        </div>
        <div class="tab-pane fade" id="rest" role="tabpanel" aria-labelledby="contact-tab">
            <hr>
                <h1>餐廳管理</h1>
            <hr>

            <form action="controler.php" method="post">
                1. <button type="submit" name="btn" value="查詢">查詢</button><br><br>
                2. <button type="submit" name="btn" value="新增">新增</button><br><br>
                3. <button type="submit" name="btn" value="修改">修改</button><br><br>
                4. <button type="submit" name="btn" value="刪除">刪除</button><br>
            </form>
            <hr>
        </div>
        <div class="tab-pane fade" id="food" role="tabpanel" aria-labelledby="contact-tab">
            <hr>
                <h1>食物管理</h1>
            <hr>

            <form action="controler.php" method="post">
                1. <button type="submit" name="btn" value="查詢">查詢</button><br><br>
                2. <button type="submit" name="btn" value="新增">新增</button><br><br>
                3. <button type="submit" name="btn" value="修改">修改</button><br><br>
                4. <button type="submit" name="btn" value="刪除">刪除</button><br>
            </form>
            <hr>
        </div>
        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="contact-tab">
            <hr>
                <h1>購買紀錄管理</h1>
            <hr>

            <form action="controler.php" method="post">
                1. <button type="submit" name="btn" value="查詢">查詢</button><br><br>
                2. <button type="submit" name="btn" value="新增">新增</button><br><br>
                3. <button type="submit" name="btn" value="修改">修改</button><br><br>
                4. <button type="submit" name="btn" value="刪除">刪除</button><br>
            </form>
            <hr>
        </div>
    </div>

</body>
</html>