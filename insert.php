<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title><?php session_start(); echo $_SESSION['tab'] . "管理-" . $_SESSION['mode'];?></title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div style="text-align:center;"><h1>&nbsp YunTech Eat </h1></div>

    <form action="controller.php" method="post">
    <div class="add">
    <?php    
        $title = $_SESSION['tab'] . "管理-" . $_SESSION['mode'];
        echo "<h1>$title</h1>";    
    ?>
    <hr>
    <?php
        $conn = new mysqli("localhost", "root", "", "b10623019hw1");
        if($conn->connect_error){
            die("連接資料庫失敗" . $conn->connect_error);
        }
        $conn->query("SET NAMES utf8");

        $tab = $_SESSION['tab'];
        switch ($tab) {
            case "會員":
                $ary = array("memberID", "account", "password","name", "gender", "birthday", "email");
                break;
            case "外送員":
                $ary = array("deliveryStaffID", "name", "tel");
                break;
            case "餐廳":
                $ary = array("restaurantID", "name", "tel", "address");
                break;
            case "食物":
                $ary = array("foodID", "restaurantID", "name", "price", "image", "description");
                break;
            case "購買紀錄":
                $ary = array("orderID", "memberID", "deliveryStaffID", "creationDatetime", "arrived");
                break;
        }

        echo "<table>";
        switch ($tab) {
            case "會員": case "外送員": case "餐廳":
                for ($i = 0; $i < count($ary); $i++) {
                    if($i == 0){
                        switch($tab){
                            case "會員":
                                $sql = "select MAX(memberID) from member";
                                $result = $conn->query($sql);
                                $rows = $result->fetch_row();
                                $rows = $rows[0] + 1;
                                echo "memberID: <input name='insertAry[]' readonly value=". $rows.">";
                                break;
                            case "外送員":
                                $sql = "select MAX(deliveryStaffID) from deliverystaff";
                                $result = $conn->query($sql);
                                $rows = $result->fetch_row();
                                $rows = $rows[0] + 1;
                                echo "deliveryStaffID: <input name='insertAry[]' readonly value=". $rows.">";
                                break;
                            case "餐廳":
                                $sql = "select MAX(restaurantID) from restaurant";
                                $result = $conn->query($sql);
                                $rows = $result->fetch_row();
                                $rows = $rows[0] + 1;
                                echo "restaurantID: <input name='insertAry[]' readonly value=". $rows.">";
                                break;
                        } 
                    }else if($i ==4 && $tab == "會員"){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td>
                            <div class='form-group row'>
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='insertAry[]' id='inlineRadio1' value='1'>
                                    <label class='form-check-label' for='inlineRadio1'>男</label>
                                </div>
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='insertAry[]' id='inlineRadio2' value='0'>
                                    <label class='form-check-label' for='inlineRadio2'>女</label>
                                </div>
                            </div>
                        </td></tr>";
                    
                    }else if($i ==5 && $tab == "會員"){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><input type='date' name='insertAry[]'></td> </tr>";
                    }else{
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><input type='text' name='insertAry[]' size='30'></td> </tr>";
                    }  
               }
                break;
            case "食物":
                for ($i = 0; $i < count($ary); $i++) {
                    if($i == 0){
                        if(isset($_GET["restNo"])){
                            $restNo = $_GET["restNo"];
                            $sql = "select MAX(foodID) from food where restaurantID = $restNo order by foodID ASC";
                            $result = $conn->query($sql);
                            $rows = $result->fetch_row();
                            $rows = $rows[0] + 1;
                            echo "foodID: <input name='insertAry[]' readonly value=". $rows.">";
                        }                    
                    }else if($i == 1){
                        $field = $ary[$i];
                        $sql = "select restaurantID from restaurant order by restaurantID ASC";
                        $result = $conn->query($sql);
                        $rows = $result->num_rows;
                        echo "<tr> <td>$field:</td>";
                        echo "<td><select name='insertAry[]' onchange='renew(this.value)'>";
                            for($j=0; $j<$rows; $j++){
                                $row = $result->fetch_row();
                                foreach($row as $data){
                                    $selected = "";
                                    if($data === $_GET["restNo"]){
                                        $selected = "selected";
                                    }
                                    echo "<option value='$data' $selected>". $data . "</option>";
                                }
                            }
                        echo "</select></td> </tr>";
                    }else if($i == 3){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><input type='number' name='insertAry[]'></td> </tr>";
                    }else if($i == 4){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><input type='text' name='insertAry[]' size='30'></td> </tr>";
                    } else if($i == 5){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><textarea type='text' name='insertAry[]' style='margin: 0px; height: 82px; width: 250px;'></textarea></td></tr>";
                    }else{
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><input type='text' name='insertAry[]' size='30'></td> </tr>";
                    }
                }
                break;
            case "購買紀錄":
                for ($i = 0; $i < count($ary); $i++) {
                    if($i == 0){
                        $sql = "select MAX(orderID) from orderhistory";
                        $result = $conn->query($sql);
                        $rows = $result->fetch_row();
                        $rows = $rows[0] + 1;
                        echo "orderID: <input name='insertAry[]' readonly value=". $rows."><br><br>";
                    }else if($i == 1){
                        $sql = "select memberID from member order by memberID ASC";
                    }else if($i == 2){
                        $sql = "select deliveryStaffID from deliverystaff order by deliveryStaffID ASC";
                    } else if($i ==3){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><input type='date' name='insertAry[]'></td> </tr>";
                    } else if($i == 4){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td>
                            <div class='form-group row'>
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='insertAry[]' id='inlineRadio1' value='1'>
                                    <label class='form-check-label' for='inlineRadio1'>是</label>
                                </div>
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='insertAry[]' id='inlineRadio2' value='0'>
                                    <label class='form-check-label' for='inlineRadio2'>否</label>
                                </div>
                            </div>
                        </td></tr>";
                    }
                    if($i == 1 || $i == 2){
                        $field = $ary[$i];
                        echo $field . ":";
                        $result = $conn->query($sql);
                        $rows = $result->num_rows;
                        echo "<select name='insertAry[]'>";
                            for($j=0; $j<$rows; $j++){
                                $row = $result->fetch_row();
                                foreach($row as $data){
                                    echo "<option value='$data'>". $data. "</option>";
                                }
                            }
                        echo "</select><br><br>";
                    }
                }
                break;
        }

        echo "</table><br>";

    ?>
    <hr>
    <button type="submit" id="insert" name="btn" onclick=check()><?php echo $_SESSION['mode']?></button>
    <button type="reset">清除</button>
    <button type="submit" name="btn" value=<?php echo $_SESSION['tab'];?>>
        <?php echo '回' . $_SESSION['tab'] . '管理';?>
    </button>
    </div>
    </form><br>


<br><hr>

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
        // const input = document.querySelectorAll('input');
        // input.addEventListener('input', evt => {
        //     const value = input.value.trim();

        //     if (value) {
        //         input.dataset.state = 'valid';
        //     } else {
        //         input.dataset.state = 'invalid';
        //     }
        // })
        // function check(){
        //     if(input.dataset.state == 'invalid'){
        //         alert("input cannot be empty!");                
        //         document.getElementById("insert").setAttribute("value", "新增");
        //     }else if(input.dataset.state == 'valid'){
        //         document.getElementById("insert").setAttribute("value", "goSQL");
        //     }
        // }

        function renew(restNo){
            window.location.href = "insert.php?restNo="+ restNo;
        }
    </script>

</body>
</html>