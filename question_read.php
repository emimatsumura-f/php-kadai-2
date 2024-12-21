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

// SQL実行
try {
    $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// データ取得
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 回答の選択肢マッピング
$answers = [
    'question1' => [
        'answer1' => 'ほとんど感じない',
        'answer2' => 'たまに感じる',
        'answer3' => 'よく感じる'
    ],
    'question2' => [
        'answer1' => '変わっていない',
        'answer2' => '痩せた',
        'answer3' => '太った'
    ],
    'question3' => [
        'answer1' => 'なかった',
        'answer2' => 'なかったが個人的に気になる項目がある',
        'answer3' => 'あった'
    ],
    'question4' => [
        'answer1' => 'ほとんどしていない',
        'answer2' => '週１~2程度している',
        'answer3' => '毎日している'
    ],
    'question5' => [
        'answer1' => '使いたいと思わない',
        'answer2' => '分からない',
        'answer3' => 'ぜひ使いたい'
    ]
];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_read.css">
    <title>みんなの回答</title>
    <!-- Google Fonts 読み込み -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="read.png" alt="ロゴ" class="logo">
            <h3>みんなの回答</h3>
        </div>
        <div class="results">
            <?php foreach ($result as $record): ?>
                <div class='result-card'>
                    <h2 class='name'><?= htmlspecialchars($record['name'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <table>
                        <tr>
                            <th>質問</th>
                            <th>回答</th>
                        </tr>
                        <tr>
                            <td>1.リモートワークになって以前より体力の低下を感じることはありますか。</td>
                            <td><?= htmlspecialchars($answers['question1'][$record['question1']], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                        <tr>
                            <td>2.リモートワークになって体重に変化はありましたか。</td>
                            <td><?= htmlspecialchars($answers['question2'][$record['question2']], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                        <tr>
                            <td>3.健康診断で再検査・経過観察などが気になる項目がありましたか。</td>
                            <td><?= htmlspecialchars($answers['question3'][$record['question3']], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                        <tr>
                            <td>4.日常的にウォーキングやジムに通うなど運動をしていますか。</td>
                            <td><?= htmlspecialchars($answers['question4'][$record['question4']], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                        <tr>
                            <td>5.福利厚生で健康促進制度として費用の補助があれば利用したいと思いますか。</td>
                            <td><?= htmlspecialchars($answers['question5'][$record['question5']], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    </table>
                    <p class='comment'><?= nl2br(htmlspecialchars($record['textarea'], ENT_QUOTES, 'UTF-8')) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>