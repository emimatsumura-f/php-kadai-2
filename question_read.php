<?php
// dbへの設定項目
$dbn = 'mysql:dbname=php_kadai_2;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// dbへの接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}

// SQL作成&実行
$sql = 'SELECT * FROM answer ORDER BY id DESC';
$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// SQL実行の処理
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($result);
// exit();
// echo '</pre>';

$output = "";
foreach ($result as $record) {
    $output .= "
    <tr>
    <td>{$record["name"]}</td>
    <td>{$record["question1"]}</td>
    <td>{$record["question2"]}</td>
    <td>{$record["question3"]}</td>
    <td>{$record["question4"]}</td>
    <td>{$record["question5"]}</td>
    <td>{$record["textarea"]}</td>
    </tr>
    ";
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>みんなの回答</title>
</head>

<body>
    <fieldset>
        <h3>みんなの回答</h3>
        <a href="index.php"></a>
        <table>
            <thead>
                <tr>
                    <th>名前</th>
                    <th>1.リモートワークになって以前より体力の低下を感じることはありますか。</th>
                    <th>2.リモートワークになって体重に変化はありましたか。</th>
                    <th>3.健康診断で再検査・経過観察などが気になる項目がありましたか。</th>
                    <th>4.日常的にウォーキングやジムに通うなど運動をしていますか。</th>
                    <th>5.福利厚生で健康促進制度として費用の補助があれば利用したいと思いますか。</th>
                    <th>6.リクエストや健康促進についてこんな案があるなどあれば教えてください。</th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>

</body>

</html>