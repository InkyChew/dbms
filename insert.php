<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
            case "食物":
                $ary = array("foodID", "restaurantID", "name", "price", "image", "description");
                break;
            case "購買紀錄":
                $ary = array("orderID", "memberID", "deliveryStaffID", "creationDatetime", "arrived");
                break;
        }

        // $ary = array("memberID", "account", "password","name", "gender", "birthday", "email");
        echo "<table>";
        switch ($tab) {
            case "會員": case "外送員": case "餐廳":
                for ($i = 0; $i < count($ary); $i++) {
                    $field = $ary[$i];
                    echo "<tr> <td>$field:</td> <td><input type='text' name='insertAry[]' size='30'></td> </tr>";
                }
                break;
            case "食物":
                for ($i = 0; $i < count($ary); $i++) {
                    if($i == 4){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><input type='text' name='insertAry[]' size='30'></td> </tr>";
                    } else if($i == 5){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><textarea type='text' name='insertAry[]' style='margin: 0px; height: 82px; width: 240px;'>Write some description...</textarea></td></tr>";
                    } else{
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><input type='text' name='insertAry[]' size='30'></td> </tr>";
                    }
                }
                break;
            case "購買紀錄":
                for ($i = 0; $i < count($ary); $i++) {
                    if($i ==3){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><input type='date' name='insertAry[]'></td> </tr>";
                    } else if($i == 4){
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td>
                            <div class='form-group row'>
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='arrive' id='inlineRadio1' value='yes'>
                                    <label class='form-check-label' for='inlineRadio1'>是</label>
                                </div>
                                <div class='form-check form-check-inline'>
                                    <input class='form-check-input' type='radio' name='arrive' id='inlineRadio2' value='no'>
                                    <label class='form-check-label' for='inlineRadio2'>否</label>
                                </div>
                            </div>
                        </td></tr>";
                    } else{
                        $field = $ary[$i];
                        echo "<tr> <td>$field:</td> <td><input type='text' name='insertAry[]' size='30'></td> </tr>";
                    }
                }
                break;
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