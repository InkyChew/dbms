<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php session_start(); echo $_SESSION['tab'] . "管理-" . $_SESSION['mode'];?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="f_style.css">
</head>
<body>
<div style="text-align:center;"><h1>&nbsp YunTech Eat </h1></div>

<form action="controller.php" method="post">
<div class = "result">
<?php    
    $title = $_SESSION['tab'] . "管理-" . $_SESSION['mode'];
    echo "<h1>$title</h1>";    
?>
<hr>
<?php
    $tab = $_SESSION['tab'];
    $mode = $_SESSION['mode'];

    if(isset($_SESSION['no'])){
        $no = $_SESSION['no'];
    }
    if(isset($_SESSION['foodNo']) && isset($_SESSION['restNo'])){
        $foodNo = $_SESSION['foodNo'];
        $restNo = $_SESSION['restNo'];
    }

    $conn = new mysqli("localhost", "root", "", "b10623019hw1");
    if($conn->connect_error){
        die("連接資料庫失敗" . $conn->connect_error);
    }
    
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
                $ary = array("foodId", "foodName", "price", "imageURL", "description");
                $sql = "select foodId, name, price, imageURL, description from food where foodID = $foodNo and restaurantID = $restNo";
            }else{
                $ary = array("foodName", "restaurantName", "restaurant-tel", "price", "imageURL", "description");
                $sql = "select f.name, r.name, r.tel, f.price, f.imageURL, f.description
                        from food as f, restaurant as r 
                        where foodID = $foodNo and f.restaurantID = $restNo and f.restaurantID = r.restaurantID";
            }                        
            break;
        case "購買紀錄":
            if($mode == "修改"){
                $ary = array("orderId", "memberId", "deliveryStaffId", "creationDatetime", "arrived");
                $sql = "select * from orderhistory where orderID = $no";
            }else{
                $ary = array("orderID", "memberName", "deliveryName", "creationDatetime", "arrived");
                $sql = "select o.orderID, m.name, d.name, o.creationDatetime, o.arrived
                        from orderhistory as o, member as m, deliverystaff as d
                        where orderID = $no and o.memberID = m.memberID and o.deliveryStaffID = d.deliveryStaffID";
            }            
            break;
    }

    $conn->query("SET NAMES utf8");
    if ($result = $conn->query($sql) ){
        // echo "成功";
        if ($tab == "食物") {
            $field = "foodID";
            echo "<tr> <td><font color='red'>&nbsp$field:</font></td> <td>$foodNo ,&nbsp</td> </tr>";
            $field = "restaurantID";            
            echo "<tr> <td><font color='red'>$field:</font></td> <td>$restNo</td> </tr>";
        } else {
            $field = $ary[0];
            echo "<tr> <td>$field:</td> <td>$no</td> </tr>";
        }

        $row = $result->fetch_row();
        if (empty($row)){ // 資料不存在
            echo "<br><br>";
            echo "<font color='red'>！資料不存在！</font>";
            echo "<br><br>";
            echo "<button type='submit' name='btn' value=$mode>回" . $tab . $mode . "</button>&nbsp;<button type='submit' name='btn' value=$tab>回" . $tab . "管理</button>";
        }else{
            // echo "有資料";
            echo "<table>";
            foreach ($row as $i => $data){
                $field = $ary[$i];
                if ($i != 0){
                    if ($mode != "修改"){
                        if($i == 4 && $tab == "會員"){
                            if($data == 0){
                                echo "<tr> <td>$field:</td> <td>男</td> </tr>";
                            }else{
                                echo "<tr> <td>$field:</td> <td>女</td> </tr>";
                            }
                        }else if($i == 4 && $tab == "購買紀錄"){
                            if($data == 0){
                                echo "<tr> <td>$field:</td> <td>否</td> </tr>";
                            }else{
                                echo "<tr> <td>$field:</td> <td>是</td> </tr>";
                            }
                        }else{
                           echo "<tr> <td>$field:</td> <td>$data</td> </tr>"; 
                        }
                    }else{
                        if($i == 4 && $tab == "會員"){
                            if($data == 0){
                                echo "<tr> <td>$field:</td> <td>
                                <div class='form-group row'>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='update[]' id='inlineRadio1' value='1'>
                                        <label class='form-check-label' for='inlineRadio1'>男</label>
                                    </div>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='update[]' id='inlineRadio2' value='0' checked>
                                        <label class='form-check-label' for='inlineRadio2'>女</label>
                                    </div>
                                </div>
                                </td></tr>";
                            }else{
                                echo "<tr> <td>$field:</td> <td>
                                <div class='form-group row'>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='update[]' id='inlineRadio1' value='1' checked>
                                        <label class='form-check-label' for='inlineRadio1'>男</label>
                                    </div>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='update[]' id='inlineRadio2' value='0'>
                                        <label class='form-check-label' for='inlineRadio2'>女</label>
                                    </div>
                                </div>
                                </td></tr>";
                            }
                        }else if($i == 4 && $tab == "購買紀錄"){
                            if($data == 0){
                                echo "<tr> <td>$field:</td> <td>
                                <div class='form-group row'>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='update[]' id='inlineRadio1' value='1'>
                                       <label class='form-check-label' for='inlineRadio1'>是</label>
                                    </div>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='update[]' id='inlineRadio2' value='0' checked>
                                        <label class='form-check-label' for='inlineRadio2'>否</label>
                                    </div>
                                </div>
                                </td></tr>";
                            }else{
                                echo "<tr> <td>$field:</td> <td>
                                <div class='form-group row'>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='update[]' id='inlineRadio1' value='1' checked>
                                       <label class='form-check-label' for='inlineRadio1'>是</label>
                                    </div>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type='radio' name='update[]' id='inlineRadio2' value='0'>
                                        <label class='form-check-label' for='inlineRadio2'>否</label>
                                    </div>
                                </div>
                                </td></tr>";
                            }
                        }else if($i == 5 && $tab == "會員"){
                            echo "<tr> <td>$field:</td> <td><input type='date' name='update[]' value=$data ></td> </tr>";
                        }else if($tab == "購買紀錄"){
                            if($i == 2){
                                echo "<tr> <td>$field:</td> <td>";
                                $sql = "select deliveryStaffID from deliverystaff order by deliveryStaffID ASC";
                                $result = $conn->query($sql);
                                $rows = $result->num_rows;
                                echo "<select name='no'>";
                                    for($j=0; $j<$rows; $j++){
                                        $row = $result->fetch_row();
                                        foreach($row as $data){
                                            echo "<option value='$data'>". $data. "</option>";
                                        }
                                    }
                                echo "</select></td> </tr>";
                            }else if($i==1 || $i==3){
                                echo "<tr> <td>$field:</td> <td><input type='text' readonly value=$data size='30'></td> </tr>";
                            }
                        }else{
                            echo "<tr> <td>$field:</td> <td><input type='text' name='update[]' value=$data size='30'></td> </tr>";
                        }
                   }
                }                  
            }
            echo "</table><br>";
            switch ($mode){
                case "查詢": 
                    echo "<button type='submit' name='btn' value=$mode>回" . $tab . "查詢</button>&nbsp;<button type='submit' name='btn' value=$tab>回" . $tab . "管理</button>";
                    break;
                case "修改": 
                    echo "<button id='update' type='submit' name='btn' value='goSQL' onclick=check()>" . "修改" . "</button>&nbsp;";
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
        echo "<div class='alert alert-danger'>". $conn->error . "</div>";
        echo "<br><br>";
        echo "<button type='submit' name='btn' value=$mode>回" . $tab . $mode . "</button>&nbsp;<button type='submit' name='btn' value=$tab>回" . $tab . "管理</button>";
    }

    $conn->close();

?>
</div>
</form><br>
<br>

    <script>
        const input = document.querySelectorAll('input');
        var i;
        var valid = false;
        console.log(input.length);
        console.log(input);

        function check(){
            for (i = 0; i < input.length; i++) {
                var value = input[i].value;
                if(value == "" || value == null){
                    valid = false;             
                    document.getElementById("update").setAttribute("value", "funPage");
                }else{
                    valid = true;
                }
            }
            if(valid){
                document.getElementById("update").setAttribute("value", "goSQL");
            } else{
                alert("input cannot be empty!");                
                document.getElementById("update").setAttribute("value", "funPage");
            }
        }
    </script>

</body>
</html>