<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php session_start(); echo $_SESSION['tab'] . "管理-" . $_SESSION['mode'];?></title>
    <style type=text/css>
    body{
        background-image:url(https://www.mokuge.com/uploads/userup/505/1555502307.jpg);
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
    }
    </style>
</head>
<body>
<div style="text-align:left;"><h1>&nbsp YunTech Eat </h1></div>
<?php    
    $title = $_SESSION['tab'] . "管理-" . $_SESSION['mode'];
    echo "<h1 align=\"center\">$title</h1>";    
?>
    <hr>
    <div style="width:100%;text-align:center">
    <form action="controller.php" method="post">
        <?php  
            $tab = $_SESSION['tab'];

            $conn = new mysqli("localhost", "root", "", "b10623019hw1");
            if($conn->connect_error){
                die("連接資料庫失敗" . $conn->connect_error);
            }
            $conn->query("SET NAMES utf8");

            switch($tab) {
                case "會員":
                    $sql = "select memberID from member order by memberID ASC";
                    break;
                case "外送員":
                    $sql = "select deliveryStaffID from deliverystaff order by deliveryStaffID ASC";
                    break;
                case "餐廳":
                    $sql = "select restaurantID from restaurant order by restaurantID ASC";
                    break;
                case "食物":
                    echo "餐廳ID: ";
                    $sql = "select restaurantID from restaurant order by restaurantID ASC";
                    // $sql = "select foodID, restaurantID from food";
                    $result = $conn->query($sql);
                    $rows = $result->num_rows;
                    echo "<select name='restNo'>";
                        for($j=0; $j<$rows; $j++){
                            $row = $result->fetch_row();
                            foreach($row as $rest){
                                echo "<option value='$rest'>". $rest. "</option>";
                            }
                        }
                    echo "</select><br><br>";
                    echo "食物ID: ";
                    $sql = "select foodID from food where restaurantID = $rest order by foodID ASC";
                    $result = $conn->query($sql);
                    $rows = $result->num_rows;
                    echo "<select name='foodNo'>";
                        for($j=0; $j<$rows; $j++){
                            $row = $result->fetch_row();
                            foreach($row as $rest){
                                echo "<option value='$rest'>". $rest. "</option>";
                            }
                        }
                    echo "</select><br><br>";
                    echo "<button type='submit' name='btn' value='goFoodSQL'>". $_SESSION['mode']. "</button>";
                    break;
                case "購買紀錄":
                    $sql = "select orderID from orderhistory order by orderID ASC";
                    break;
                default:
                    
                    break;
                // case '食物':
                //     echo "foodID: <input type='int' name='foodNo'><br><br>";
                //     echo "restaurantID: <input type='int' name='restNo'><br><br>";
                //     echo "<button type='submit' name='btn' value='goFoodSQL'>". $_SESSION['mode']. "</button>";
                //     break;
            }
            if($tab != "食物"){
                echo $tab . "ID: ";
                $result = $conn->query($sql);
                $rows = $result->num_rows;
                echo "<select name='no'>";
                    for($j=0; $j<$rows; $j++){
                        $row = $result->fetch_row();
                        foreach($row as $data){
                            echo "<option value='$data'>". $data. "</option>";
                        }
                    }
                echo "</select><br><br>";
                echo "<button type='submit' name='btn' value='goSQL'>". $_SESSION['mode']. "</button>";
            }
            
        ?>
        <button type="submit" name="btn" value=<?php echo $_SESSION['tab'];?>>
            <?php echo '回' . $_SESSION['tab'] . '管理';?>
        </button>
    </form>
    </div>
    <hr>
</body>
</html>

