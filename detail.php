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
    <div id="list">
<?php

    require_once('utility.php');
    $pdo = connectDB();

    if($pdo != null){
        $id = $_GET['id'];
        // クエリの実行
        $query = "SELECT * FROM benchmarks WHERE id = :id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $res = $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row != null)
        {
            $id = $row["id"];
            $platform = $row["platform"];
            $date = $row["date"];
            $cpu = $row["cpu"];
            $system = $row["system"];
            $single = $row["single"];
        
            $message = <<< EOM
            <form method="POST" action="update.php">
                <input type="hidden" name="id" value="{$id}">
                <label for "platform">OS:</label><input type="text" name="platform" value="{$platform}">
                <label for "cpu">CPU: </label><input type="text" name="cpu" value="{$cpu}">
                <label for "system">SYS: </label><input type="text" name="system" value="{$system}">
                <label for "single">Score: </label><input type="text" name="single" value="{$single}">
                <button type="submit">更新</button>
            </form>
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