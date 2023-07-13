<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function connectDB()
{
    $dsn      = 'mysql:dbname=testdb;charset=utf8mb4;host=localhost:3306';
    $user     = 'root';
    $password = '';
    
    // DBへ接続
    try{
        $pdo = new PDO($dsn, $user, $password);
        return $pdo;
    }catch(PDOException $e){
        print("DB Connection Error:" . $e->getMessage());
        return null;
        die();
    }
}

function disconnectDB($pdo)
{
    unset($pdo);
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}

// ログインチェク処理 loginCheck()
function loginCheck()
{
    if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid']!=session_id()){
        
    }else{

        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}


