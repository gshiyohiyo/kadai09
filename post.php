<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrystalMark X24</title>
    <link rel="stylesheet" href="css/style.css">
    <script
        src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <div class="container">  
            <h1>CrystalMark X24</h1>
            <div class="menu">
                <button id="benchmark" class="button-053">
                    ベンチマーク 
                </button>
            </div>
            <form action="write.php" method="POST">
                <label for="single">Score: </label>
                <input type="text" id="single" name="single">
                <label for="platform">Platform: </label>
                <input type="text" id="platform" name="platform">
                <label for="cpu">CPU: </label>
                <input type="text" id="cpu" name="cpu">
                <label for="system">System: </label>
                <input type="text" id="system" name="system">
                <label for="date">Date: </label>
                <input type="text" id="date" name="date">
                <!-- <textarea id="result" name="result" rows="4" cols="80"></textarea> -->
                <button type="submit"> ベンチマーク結果登録 </button>
            </form>
        </div>

    </main>
    <script type="module">
        // 超簡易ベンチマーク
        function benchmark() {
            // ベンチマーク対象の処理を実行する前のタイムスタンプを取得
            const startTime = performance.now();
        
            // ベンチマークの実行回数
            const iterations = 10000000;
        
            for (let i = 0; i < iterations; i++) {
                // テストしたいコードのセクション
                // 例: 配列のソート
                const array = [5, 3, 1, 4, 2];
                array.sort();
            }  
            // ベンチマーク対象の処理を実行した後のタイムスタンプを取得
            const endTime = performance.now();

            // 実行時間を計算
            const executionTime = endTime - startTime;

            // 整数に変換して返す
            return Math.floor(executionTime);
        }

        // benchmark クリックイベント
        $("#benchmark").on("click", function(){
            const single = benchmark();
            const platform = "Web";
            const cpu = "Unknown";
            const system = "Unknown";
            const now = new Date();
            const date = now.toLocaleString();

            $("#single").val(single);            
            $("#platform").val(platform);
            $("#cpu").val(cpu);
            $("#system").val(system);
            $("#date").val(date);

            /*
            const jsonValue = {
                "single": single,
                "platform": platform,
                "cpu": cpu,
                "system": system,
                "date": date
            };

            const json = JSON.stringify(jsonValue);
            $("#result").val(json);
            */
        });
    </script>    
</body>
</html>