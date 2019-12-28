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
            switch($tab) {
                case '食物':
                    echo "foodID: <input type='int' name='foodNo'><br><br>";
                    echo "restaurantID: <input type='int' name='restNo'><br><br>";
                    echo "<button type='submit' name='btn' value='goFoodSQL'>". $_SESSION['mode']. "</button>";
                    break;
                default:
                    echo $tab . "ID: <input type='int' name='no'><br><br>";
                    echo "<button type='submit' name='btn' value='goSQL'>". $_SESSION['mode']. "</button>";
                    break;
            }
        ?>
        <!-- <button type="submit" name="btn" value="goSQL"><?php echo $_SESSION['mode']?></button> -->
        <button type="reset">清除</button>
        <button type="submit" name="btn" value=<?php echo $_SESSION['tab'];?>>
            <?php echo '回' . $_SESSION['tab'] . '管理';?>
        </button>
    </form>
    <hr>
</body>
</html>

