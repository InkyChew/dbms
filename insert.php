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
        }

        // $ary = array("memberID", "account", "password","name", "gender", "birthday", "email");
        echo "<table>";
        for ($i = 0; $i < count($ary); $i++) {
            $field = $ary[$i];
            echo "<tr> <td>$field:</td> <td><input type='text' name='insertAry[]' size='30'></td> </tr>";
        }
        echo "</table><br>";
        

    ?>
    <button type="submit" name="btn" value="goSQL"><?php echo $_SESSION['mode']?></button>
    <button type="reset">清除</button>
    <button type="submit" name="btn" value=<?php echo $_SESSION['tab'];?>>
        <?php echo '回' . $_SESSION['tab'] . '管理';?>
    </button>
</form><br>


<br><hr>

</body>
</html>