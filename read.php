<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrystalMark X24</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <main>
    <h1>CrystalMark X24</h1>
    <div class="container">
        <p style="text-align: center;">
        <a href="post.php">[ベンチマーク]</a>  

<?php
    session_start();
    require_once('utility.php');
    loginCheck();

    if($_SESSION["kanri_flg"] == 1)
    {
        echo '<a href="logout.php">[ログアウト]</a> ';
    }
    else
    {
        echo '<a href="login.php">[ログイン]</a> ';
    }
?>
        </p>  
    <div id="list">

<?php
    $pdo = connectDB();

    if($pdo != null){    
        // クエリの実行
        $query = "SELECT * FROM benchmarks";
        $stmt = $pdo->query($query);

        // 表示処理
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $id = $row["id"];
            $platform = $row["platform"];
            $date = $row["date"];
            $cpu = $row["cpu"];
            $system = $row["system"];
            $single = $row["single"];

            $edit = "";
            if($_SESSION["kanri_flg"] == 1)
            {
                $edit = <<< EOM
                <a href="detail.php?id={$id}">[編集]</a>
                <a href="delete.php?id={$id}">[削除]</a>
                EOM;
            }
        
            $message = <<< EOM
            <div class="grid">
                <div class="id">ID: {$id}
                $edit 
                </div>
                <div class="platform">OS: {$platform}</div>
                <div class="date">{$date}</div>
                <div class="cpu">CPU: {$cpu}</div>
                <div class="system">SYS: {$system}</div>
                <div class="single">{$single}</div>
            </div>
            EOM;
            echo $message;
        }        
    }

    disconnectDB($pdo);
?>            
        </div>
    </div>
    </main>
</body>
</html>