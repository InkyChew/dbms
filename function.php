<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php session_start(); echo $_SESSION['tab'] . "管理-" . $_SESSION['mode'];?></title>
</head>
<body>

<?php    
    $title = $_SESSION['tab'] . "管理-" . $_SESSION['mode'];
    echo "<h1>$title</h1>";    
?>
<hr>
<form action="controller.php" method="post">
    
<?php
    $no = $_SESSION['no'];
    $foodNo = $_SESSION['foodNo'];
    $restNo = $_SESSION['restNo'];
    $tab = $_SESSION['tab'];
    $mode = $_SESSION['mode'];

    $conn = new mysqli("localhost", "root", "", "b10623019hw1") or die("連接資料庫失敗");

    switch ($tab) {
        case "會員":
            $ary = array("memberID", "account", "password","name", "gender", "birthday", "email");
            $sql = "select * from member where memberID = $no";
            break;
        case "外送員":
            $ary = array("deliveryStaffID", "name", "tel");
            $sql = "select * from deliverystaff where deliveryStaffID = $no";
            break;
        case "餐廳":
            $ary = array("restaurantID", "name", "tel", "address");
            $sql = "select * from restaurant where restaurantID = $no";
            break;
        case "食物":
            if($mode == "修改"){
                $ary = array("foodName", "price", "imageURL", "description");
                $sql = "select name, price, imageURL, description from food where foodID = $foodNo and restaurantID = $restNo";
            }else{
                $ary = array("foodName", "restaurantName", "restaurant-tel", "price", "imageURL", "description");
                $sql = "select f.name, r.name, r.tel, f.price, f.imageURL, f.description
                        from food as f, restaurant as r 
                        where foodID = $foodNo and f.restaurantID = $restNo and f.restaurantID = r.restaurantID";
            }                        
            break;
        case "購買紀錄":
            $ary = array("orderID", "memberName", "deliveryName", "creationDatetime", "arrived");
            $sql = "select o.orderID, m.name, d.name, o.creationDatetime, o.arrived
                    from orderhistory as o, member as m, deliverystaff as d
                    where orderID = $no and o.memberID = m.memberID and o.deliveryStaffID = d.deliveryStaffID";
            break;
    }

    $conn->query("SET NAMES utf8");
    if ($result = $conn->query($sql) ){
        // echo "成功";
        if ($tab == "食物") {
            $field = "foodID";
            echo "<tr> <td>$field:</td> <td>$foodNo</td> </tr>";
            $field = "restaurantID";            
            echo "<tr> <td>$field:</td> <td>$restNo</td> </tr>";
        } else {
            $field = $ary[0];
            echo "<tr> <td>$field:</td> <td>$no</td> </tr>";
        }

        $row = $result->fetch_row();
        if (empty($row)){ // 資料不存在
            echo "<br><br>";
            echo "<font color='red'>！資料不存在！</font>";
            echo "<br><br>";
            echo "<button type='submit' name='btn' value=$mode>回" . $mode . "主畫面</button>&nbsp;<button type='submit' name='btn'>主畫面</button>";
        }else{
            // echo "有資料";
            echo "<table>";
            foreach ($row as $i => $data){
                $field = $ary[$i];
                if ($i != 0){
                    if ($mode != "修改")
                        echo "<tr> <td>$field:</td> <td>$data</td> </tr>";
                    else
                        echo "<tr> <td>$field:</td> <td><input type='text' name='update[]' value=$data size='30'></td> </tr>";                   
                }                   
            }
            echo "</table><br>";
            switch ($mode){
                case "查詢": 
                    echo "<button type='submit' name='btn' value=$mode>回" . $tab . "查詢</button>&nbsp;<button type='submit' name='btn' value=$tab>回" . $tab . "管理</button>";
                    break;
                case "修改": 
                    echo "<button type='submit' name='btn' value='goSQL'>" . "修改" . "</button>&nbsp;";
                    echo "<button type='submit' name='btn' value=$mode>回" . $tab . "修改</button>&nbsp;<button type='submit' name='btn' value=$tab>回" . $tab . "管理</button>";
                    break;
                case "刪除":
                    echo "<font color='red'>是否真的要刪除?</font>";
                    echo "<button type='submit' name='btn' value='goSQL'>是</button>&nbsp;<button type='submit' name='btn' value='noDel'>否</button>";
                    break;
            }
        }
            
    }else{ // 失敗
        echo "<br><br>";
        echo "<font color='red'>！資料".$mode."失敗！</font>";
        echo "<br><br>";
        echo "<button type='submit' name='btn' value=$mode>回" . $mode . "主畫面</button>&nbsp;<button type='submit' name='btn'>主畫面</button>";
    }

    $conn->close();

?>

</form><br>


<br><hr>

</body>
</html>