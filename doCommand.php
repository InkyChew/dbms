<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php session_start(); echo $_SESSION['tab'] . "管理-" . $_SESSION['mode'];?></title>
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
    $title = $_SESSION['tab'] . "管理-" . $_SESSION['mode'];
    echo "<h1>$title</h1>";
?>
    <hr><br><br>
    <form action="controller.php" method="post">

<?php
    $conn = new mysqli("localhost", "root", "", "b10623019hw1") or die("連接資料庫失敗");
    $conn->query("SET NAMES utf8");
    $tab = $_SESSION['tab'];
    $mode = $_SESSION['mode'];
    $no = $_SESSION['no'];

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
                $sql = "update restaurant set name = '$name', tel = '$tel', name = '$name', address = '$address' where restaurantID = $no";                 
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
                $tel = $ary[1];
                $address = $ary[2];
                // print_r($ary);
                $sql = "update restaurant set name = '$name', tel = '$tel', name = '$name', address = '$address' where restaurantID = $no";                 
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
    } else if ($tab == "購買紀錄"){
        switch ($mode){
            case "修改":
                $ary = $_SESSION['update'];
                $name = $ary[0];
                $tel = $ary[1];
                $address = $ary[2];
                // print_r($ary);
                $sql = "update restaurant set name = '$name', tel = '$tel', name = '$name', address = '$address' where restaurantID = $no";                 
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
                $sql = "insert into restaurant values($temp)";
                // echo $sql;
                break;
        }
    }

    if ($conn->query($sql)){ // 成功
        echo "<font>！資料" . $_SESSION['mode'] . "成功！</font>";
    }else{ // 失敗
        echo "<font color='red'>！資料" . $mode . "失敗！</font>";            
    }
    echo "<br><br>";        

    echo "<button type='submit' name='btn' value=$mode>回" . $tab . $mode. "</button>&nbsp;<button type='submit' name='btn' value=$tab>回" . $tab . "管理</button>";

    $conn->close();
?>
    <br><br>
    </form>
    <hr>
</body>
</html>

