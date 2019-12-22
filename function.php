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
?>
<hr>
<form action="controler.php" method="post">
    
<?php
    $no = $_SESSION['no'];
    $mode = $_SESSION['mode'];
    $ary = array("memberID", "account", "password","name", "gender", "birthday", "email");
    $conn = new mysqli("localhost", "root", "", "b10623019hw1") or die("連接資料庫失敗");
    $sql = "select * from member where memberID = $no";
    $conn->query("SET NAMES utf8");
    if ($result = $conn->query($sql) ){
        // echo "成功";       
        $field = $ary[0];
        echo "<tr> <td>$field:</td> <td>$no</td> </tr>";
        
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
                        echo "<tr> <td>$field:</td> <td><input type='text' name='mary[]' value=$data size='30'></td> </tr>";                        
                }                   
            }
            echo "</table><br>";
            switch ($mode){
                case "查詢": 
                    echo "<button type='submit' name='btn' value=$mode>回" . $mode . "主畫面</button>&nbsp;<button type='submit' name='btn'>主畫面</button>";
                    break;
                case "修改": 
                    echo "<button type='submit' name='btn' value='goSQL'>" . "修改" . "</button>&nbsp;";
                    echo "<button type='submit' name='btn' value=$mode>回" . $mode . "主畫面</button>&nbsp;<button type='submit' name='btn'>主畫面</button>";
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