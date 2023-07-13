
<?php
    session_start();
    require_once('utility.php');
    loginCheck();

    if(empty($_POST['result'])) {
        $platform = h($_POST["platform"]);
        $date = h($_POST["date"]);
        $cpu = h($_POST["cpu"]);
        $system = h($_POST["system"]);
        $single = h($_POST["single"]);        
    } else {
        $json = json_decode($_POST['result'], true);
        $platform = h($json["platform"]);
        $date = h($json["date"]);
        $cpu = h($json["cpu"]);
        $system = h($json["system"]);
        $single = h($json["single"]);
    }   

    $message = <<< EOM
    <div class="grid">
        <div class="id">ID: --</div>
        <div class="platform">OS: {$platform}</div>
        <div class="date">{$date}</div>
        <div class="cpu">CPU: {$cpu}</div>
        <div class="system">SYS: {$system}</div>
        <div class="single">{$single}</div>
    </div>
    EOM;
    // echo $message;

    $pdo = connectDB();
    if($pdo != null){
    
        // クエリの実行
        $sql = "INSERT INTO benchmarks (id, platform, cpu, system, single, date) VALUES (NULL, :platform, :cpu, :system, :single, sysdate())";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':platform', $platform, PDO::PARAM_STR);
        $stmt->bindValue(':cpu', $cpu, PDO::PARAM_STR);
        $stmt->bindValue(':system', $system, PDO::PARAM_STR);
        $stmt->bindValue(':single', $single, PDO::PARAM_INT);

        $stmt->execute();
    }
    disconnectDB($pdo);
?> 

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
        <div class="container">  
            <h1>CrystalMark X24</h1>
            <?= $message ?>
            <p style="text-align: center;"><a href="read.php">登録結果確認</a></p>          
        </div>
    </main>
</body>
</html>