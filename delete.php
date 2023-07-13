<?php

    session_start();
    require_once('utility.php');
    loginCheck();

    if($_SESSION["kanri_flg"] != 1)
    {
        redirect("read.php");
    }

    $id = $_GET['id'];

    $pdo = connectDB();
    if($pdo != null){
        //３．データ登録SQL作成
        $stmt = $pdo->prepare('DELETE FROM benchmarks WHERE id = :id;');

        // 数値の場合 PDO::PARAM_INT
        // 文字の場合 PDO::PARAM_STR
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $status = $stmt->execute(); //実行

        //４．データ登録処理後
        if ($status === false) {
            $error = $stmt->errorInfo();
            exit('SQLError:' . print_r($error, true));
        } else {
            header('Location: read.php');
            exit();
        }
    }

    disconnectDB($pdo);
?> 
