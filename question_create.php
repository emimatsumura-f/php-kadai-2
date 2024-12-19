<?php
// var_dump($_POST);
// exit();

// 入力のCK
if (
    !isset($_POST['name']) || $_POST['name'] === '' ||
    !isset($_POST['question1']) || $_POST['question1'] === '' ||
    !isset($_POST['question2']) || $_POST['question2'] === '' ||
    !isset($_POST['question3']) || $_POST['question3'] === '' ||
    !isset($_POST['question4']) || $_POST['question4'] === '' ||
    !isset($_POST['question5']) || $_POST['question5'] === ''
) {
    exit('Error');
}

$name = $_POST['name'];
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];
$question3 = $_POST['question3'];
$question4 = $_POST['question4'];
$question5 = $_POST['question5'];
$textarea = $_POST['textarea'];

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
$sql = 'INSERT INTO answer (id, name, question1, question2, question3, question4, question5, textarea) VALUES (NULL, :name, :question1, :question2, :question3, :question4, :question5, :textarea)';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':question1', $question1, PDO::PARAM_STR);
$stmt->bindValue(':question2', $question2, PDO::PARAM_STR);
$stmt->bindValue(':question3', $question3, PDO::PARAM_STR);
$stmt->bindValue(':question4', $question4, PDO::PARAM_STR);
$stmt->bindValue(':question5', $question5, PDO::PARAM_STR);
$stmt->bindValue(':textarea', $textarea, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header('Location:index.php');
exit();
