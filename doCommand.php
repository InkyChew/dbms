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
    $conn = new mysqli("localhost", "root", "", "b10623019hw1") or die("連接資料庫失敗");
    $conn->query("SET NAMES utf8");
    $mode = $_SESSION['mode'];
    $no = $_SESSION['no'];
?>
    <hr><br><br>
    <form action="controler.php" method="post">

<?php
switch ($mode){
    case "修改":
        $ary = $_SESSION['mary'];        
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
    if ($conn->query($sql)){ // 成功
        echo "<font>！資料" . $_SESSION['mode'] . "成功！</font>";
    }else{ // 失敗
        echo "<font color='red'>！資料" . $mode . "失敗！</font>";            
    }
    echo "<br><br>";        

    echo "<button type='submit' name='btn' value=$mode>回" . $mode . "主畫面</button>&nbsp;<button type='submit' name='btn'>主畫面</button>";

$conn->close();
?>
    <br><br>
    </form>
    <hr>
</body>
</html>

