<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>健康促進制度導入についてのアンケート</title>
    <!-- Google Fonts 読み込み -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <form action="question_create.php" method="post">
        <fieldset>
            <h3>大象構造 健康促進制度導入についてのアンケート</h3>
            <img src="index.png" alt="Image">

            <label>名前を記入してください<br>
                <input type="text" name="name" required></label><br>

            <label>
                1.リモートワークになって以前より体力の低下を感じることはありますか。<br>
                <input type="radio" name="question1" value="answer1" required>ほとんど感じない
                <input type="radio" name="question1" value="answer2">たまに感じる
                <input type="radio" name="question1" value="answer3">よく感じる
            </label><br>

            <label>
                2.リモートワークになって体重に変化はありましたか。<br>
                <input type="radio" name="question2" value="answer1" required>変わっていない
                <input type="radio" name="question2" value="answer2">痩せた
                <input type="radio" name="question2" value="answer3">太った
            </label><br>

            <label>
                3.健康診断で再検査・経過観察などが気になる項目がありましたか。<br>
                <input type="radio" name="question3" value="answer1" required>なかった
                <input type="radio" name="question3" value="answer2">なかったが個人的に気になる項目がある
                <input type="radio" name="question3" value="answer3">あった
            </label><br>

            <label>
                4.日常的にウォーキングやジムに通うなど運動をしていますか。<br>
                <input type="radio" name="question4" value="answer1" required>ほとんどしていない
                <input type="radio" name="question4" value="answer2">週１~2程度している
                <input type="radio" name="question4" value="answer3">毎日している
            </label><br>

            <label>
                5.福利厚生で健康促進制度として費用の補助があれば利用したいと思いますか。<br>
                <input type="radio" name="question5" value="answer1" required>使いたいと思わない
                <input type="radio" name="question5" value="answer2">分からない
                <input type="radio" name="question5" value="answer3">ぜひ使いたい
            </label><br>

            <label>
                6.リクエストや健康促進についてこんな案があるなどあれば教えてください。<br>
                ここはみんなで共有しますので、自由に書いてください。<br>
                <textarea name="textarea" id="textarea" cols="60" rows="5"></textarea><br>
            </label>

            <div class="btn">
                <button type="submit">送信</button>
            </div>

            <div class="btn">
                <a class="answer-btn" href="question_read.php">みんなの回答</a>
            </div>
        </fieldset>
    </form>
</body>

</html>