<?php
// POSTデータ確認
// var_dump($_POST);
// exit();

// 条件分岐
if (
    !isset($_POST['todo']) || $_POST['todo'] === '' ||
    !isset($_POST['deadline']) || $_POST['deadline'] === ''
) {
    exit('Error');
}

$todo = $_POST['todo'];
$deadline = $_POST['deadline'];

// DB接続
$dbn = 'mysql:dbname=gs_php_db;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}


// SQL作成&実行
$sql = 'INSERT INTO todo_table (id, todo, deadline, created_at, updated_at) VALUES (NULL, :todo, :deadline, now(), now())';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header('Location:todo_input.php');
exit();
