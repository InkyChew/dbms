<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php session_start(); echo $_SESSION['mode'];?></title>
</head>
<body>

    <?php    
        $title = "會員管理-" . $_SESSION['mode'];
        echo "<h1>$title</h1>";    
    ?>
    <hr>
<form action="controler.php" method="post">
    
    <?php


        $ary = array("memberID", "account", "password","name", "gender", "birthday", "email");
        echo "<table>";
        for ($i = 0; $i < count($ary); $i++) {
            $field = $ary[$i];
            echo "<tr> <td>$field:</td> <td><input type='text' name='insertAry[]' size='30'></td> </tr>";
        }
        echo "</table><br>";
        

    ?>
    <button type="submit" name="btn" value="goSQL"><?php echo $_SESSION['mode']?></button>
    <button type="reset">清除</button> <button type="submit" name="btn">回主畫面</button>
</form><br>


<br><hr>

</body>
</html>