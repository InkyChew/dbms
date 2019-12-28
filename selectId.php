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
    echo "<h1 align=\"center\">$title</h1>";    
?>
    <hr>
    <div style="width:100%;text-align:center">
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
    </div>
    <hr>
</body>
</html>

