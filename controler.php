<?php
    session_start();
    $btn = $_POST['btn'];        
    // echo $btn;
    $file = "index";    
    switch ($btn){
        case "查詢": case "修改": case "刪除":
            $file = "select";
            $_SESSION['mode'] = $btn;
            break;
        case "新增":
            $file = "insert";
            $_SESSION['mode'] = $btn;
            break;
        case "goSQL":
            $file = "function";            
            if (isset($_POST['no'])) // 從輸入查詢號碼的畫面過來的 
                $_SESSION['no'] = $_POST['no'];
            else { // 已經進入功能畫面 要 修改 或 刪除資料 or 新增資料
                $file = "doCommand";
                if (isset($_POST['mary']))
                    $_SESSION['mary'] = $_POST['mary'];
                else if (isset($_POST['insertAry']))
                    $_SESSION['insertAry'] = $_POST['insertAry'];
            }                                    
            break;
        case "noDel":
            $file = "noDel";
            break;
    }
  

    $file = $file . ".php";
    header("Location: $file");

?>