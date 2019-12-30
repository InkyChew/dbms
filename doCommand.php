<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php session_start(); echo $_SESSION['tab'] . "管理-" . $_SESSION['mode'];?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div style="text-align:center;"><h1>&nbsp YunTech Eat </h1></div>

    <form action="controller.php" method="post">
    <div class="do">
    <?php    
    $title = $_SESSION['tab'] . "管理-" . $_SESSION['mode'];
    echo "<h1 align=\"center\">$title</h1>";
    ?>
    <hr><br><br>
<?php
    $conn = new mysqli("localhost", "root", "", "b10623019hw1");
    if($conn->connect_error){
        die("連接資料庫失敗" . $conn->connect_error);
    }
    $conn->query("SET NAMES utf8");
    $tab = $_SESSION['tab'];
    $mode = $_SESSION['mode'];

    if(isset($_SESSION['no'])){
        $no = $_SESSION['no'];
    }
    if(isset($_SESSION['foodNo']) && isset($_SESSION['restNo'])){
        $foodNo = $_SESSION['foodNo'];
        $restNo = $_SESSION['restNo'];
    }

    if ($tab == "會員") {
        switch ($mode){
            case "修改":
                $ary = $_SESSION['update'];
                $account = $ary[0];
                $password = $ary[1];
                $name = $ary[2];
                $gender = $ary[3];
                $birthday = $ary[4];
                $email = $ary[5];
                // print_r($ary);
                $sql = "update member set account = '$account', password = '$password', name = '$name', gender = '$gender', birthday = '$birthday', email = '$email' where memberID = $no";                 
                break;
            case "刪除":
                $sql = "delete from member where memberID = $no";
                break;
            case "新增":  
                $ary = $_SESSION['insertAry'];
                $temp = $ary[0];
                foreach ($ary as $i => $data){
                    if ($i != 0)
                        $temp = $temp . ", '" . $data . "'";
                }
                $sql = "insert into member values($temp)";
                // echo $sql;
                break;
        }
    }else if ($tab == "外送員"){
        switch ($mode){
            case "修改":
                $ary = $_SESSION['update'];
                $name = $ary[0];
                $tel = $ary[1];
                // print_r($ary);
                $sql = "update deliverystaff set name = '$name', tel = '$tel' where deliveryStaffID = $no";                 
                break;
            case "刪除":
                $sql = "delete from deliverystaff where deliverystaffID = $no";
                break;
            case "新增":  
                $ary = $_SESSION['insertAry'];
                $temp = $ary[0];
                foreach ($ary as $i => $data){
                    if ($i != 0)
                        $temp = $temp . ", '" . $data . "'";
                }
                $sql = "insert into deliverystaff values($temp)";
                // echo $sql;
                break;
        }
    } else if ($tab == "餐廳"){
        switch ($mode){
            case "修改":
                $ary = $_SESSION['update'];
                $name = $ary[0];
                $tel = $ary[1];
                $address = $ary[2];
                // print_r($ary);
                $sql = "update restaurant
                        set name = '$name', tel = '$tel', name = '$name', address = '$address'
                        where restaurantID = $no";                 
                break;
            case "刪除":
                $sql = "delete from restaurant where restaurantID = $no";
                break;
            case "新增":  
                $ary = $_SESSION['insertAry'];
                $temp = $ary[0];
                foreach ($ary as $i => $data){
                    if ($i != 0)
                        $temp = $temp . ", '" . $data . "'";
                }
                $sql = "insert into restaurant values($temp)";
                // echo $sql;
                break;
        }
    } else if ($tab == "食物"){
        switch ($mode){
            case "修改":
                $ary = $_SESSION['update'];
                $name = $ary[0];
                $price = $ary[1];
                $imageURL = $ary[2];
                $description = $ary[3];
                // print_r($ary);
                $sql = "update food
                        set name = '$name', price = '$price', imageURL = '$imageURL', description = '$description'
                        where foodID = $foodNo and restaurantID = $restNo";                 
                break;
            case "刪除":
                $sql = "delete from food where foodID = $foodNo and restaurantID = $restNo";
                break;
            case "新增":  
                $ary = $_SESSION['insertAry'];
                $temp = $ary[0] . "," . $ary[1];
                foreach ($ary as $i => $data){
                    if ($i >= 2){
                        if($i == 3)
                        $temp =  $temp . "," . $ary[3];
                        else
                            $temp = $temp . ", '" . $data . "'";
                    }                        
                }
                $sql = "insert into food (foodID, restaurantID, name, price, imageURL, description) values($temp)";
                break;
        }
    } else if ($tab == "購買紀錄"){
        switch ($mode){
            case "修改":
                $ary = $_SESSION['update'];
                $deliveryName = $ary[0];
                $tel = $ary[1];
                $arrived = $ary[2];

                // print_r($ary);
                $sql = "update orderhistory
                        set name = '$name', tel = '$tel', name = '$name', address = '$address'
                        where orderID = $no";                 
                break;
            case "刪除":
                $sql = "delete from orderhistory where orderID = $no";
                break;
            case "新增":  
                $ary = $_SESSION['insertAry'];
                $temp = $ary[0];
                foreach ($ary as $i => $data){
                    if ($i != 0)
                        $temp = $temp . ", '" . $data . "'";
                }
                $sql = "insert into orderhistory values($temp)";
                // echo $sql;
                break;
        }
    }

    if ($conn->query($sql)){ // 成功
        echo "<div class='alert alert-success'>！資料" . $_SESSION['mode'] . "成功！</div>";
    }else{ // 失敗
        echo "<div class='alert alert-danger'>！資料" . $mode . "失敗！</div>";
        echo "<div class='alert alert-danger'>". $conn->error . "</div>";
    }
    echo "<br><br><br><hr><br>";        

    echo "<button type='submit' name='btn' value=$mode>回" . $tab . $mode. "</button>&nbsp;<button type='submit' name='btn' value=$tab>回" . $tab . "管理</button>";

    $conn->close();
?>
    <br><br>
</div>
    </form>
    <hr>
</body>
</html>

