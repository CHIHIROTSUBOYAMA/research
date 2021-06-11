<?php
session_start();

$length = mb_strlen($_POST["favper"]);
$age = filter_input(INPUT_POST , "age");
$who = filter_input(INPUT_POST , "who");
$place = filter_input(INPUT_POST , "place");
$ideal = filter_input(INPUT_POST , "ideal");
$no = filter_input(INPUT_POST , "no");
$friend = filter_input(INPUT_POST , "friend");
$angry = filter_input(INPUT_POST , "angry");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST["name"] === "") {
        $error["name"] = "blank";
    }
    if ($_POST["favper"] === "") {
        $error["favper"] = "blank";
    } else {
        if (!ctype_alpha($_POST["favper"]) || $length != 1) {
            $error["favper"] = "japanese";
        }
    }
    if (empty($_POST["age"])) {
        $error["choice"] = "blank";
    }
    if (empty($_POST["who"])) {
        $error["choice"] = "blank";
    }
    if (empty($_POST["place"])) {
        $error["choice"] = "blank";
    }
    if (empty($_POST["ideal"])) {
        $error["choice"] = "blank";
    }
    if (empty($_POST["no"])) {
        $error["choice"] = "blank";
    }
    if (empty($_POST["friend"])) {
        $error["choice"] = "blank";
    }
    if (empty($_POST["angry"])) {
        $error["choice"] = "blank";
    }
    if (empty($error)){
        $_SESSION["date"] = $_POST;
        header("Location:check.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>【心理テスト】質問に答えるだけで「あなたの恋人になる人の苗字」がわかる</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body>
    <main>
        <div class="main">
            <h1><span>【心理テスト】</span><br>
                「あなたの恋人になる人の苗字」がわかる</h1>
            <div class="bg-img">
                <div class="bg-color">
                    <form action="" method="POST" enctype="multipart/form-data" class="my">
                        <p><b>ニックネームを入力</b></p>
                        <input type="text" name="name" class="name" value="<?php print(htmlspecialchars($_POST["name"], ENT_QUOTES)); ?>">
                        <?php if ($error["name"] === "blank") : ?>
                            <p class="error">ニックネームが入力されていません</p>
                        <?php endif; ?>
                        <p><b>恋人になってほしい人の<br>イニシャル（苗字）を入力</b></p>
                        <input type="text" name="favper" class="favper" value="<?php print(htmlspecialchars($_POST["favper"], ENT_QUOTES)); ?>">
                        <?php if ($error["favper"] === "blank") : ?>
                            <p class="error">イニシャルが入力されていません</p>
                        <?php endif; ?>
                        <?php if ($error["favper"] === "japanese") : ?>
                            <p class="error">英語一文字で入力してください</p>
                        <?php endif; ?>
                        <div class="question-contents">
                            <?php if ($error["choice"] === "blank") : ?>
                                <p class="error">未入力欄があります</p>
                            <?php endif; ?>
                            <div class="question">
                                <p>質問１：あなたの年齢はいくつですか？</p>
                            </div>
                            <input type="radio" name="age" value=4<?php if($age == 4){ echo ' checked="checked"';} ?> require><span class="contents">25歳未満</span><br>
                            <input type="radio" name="age" value=3<?php if($age == 3){ echo ' checked="checked"';} ?> require><span class="contents">25～45歳未満</span><br>
                            <input type="radio" name="age" value=2<?php if($age == 2){ echo ' checked="checked"';} ?> require><span class="contents">40～60歳未満</span><br>
                            <input type="radio" name="age" value=1<?php if($age == 1){ echo ' checked="checked"';} ?> require><span class="contents">60歳以上</span><br>
                            <div class="question">
                                <p>質問２：どんな人を恋人にしたい？</p>
                            </div>
                            <input type="radio" name="who" value=2<?php if($who == 2){ echo ' checked="checked"';} ?> require><span class="contents">頼りになる人</span><br>
                            <input type="radio" name="who" value=3<?php if($who == 3){ echo ' checked="checked"';} ?> require><span class="contents">面白い人</span><br>
                            <input type="radio" name="who" value=4<?php if($who == 4){ echo ' checked="checked"';} ?> require><span class="contents">優しい人</span><br>
                            <input type="radio" name="who" value=1<?php if($who == 1){ echo ' checked="checked"';} ?> require><span class="contents">お金持ちな人</span><br>
                            <div class="question">
                                <p>質問３：恋人と初デートに選ぶ場所は？</p>
                            </div>
                            <input type="radio" name="place" value=3<?php if($place == 3){ echo ' checked="checked"';} ?> require><span class="contents">映画デート</span><br>
                            <input type="radio" name="place" value=1<?php if($place == 1){ echo ' checked="checked"';} ?> require><span class="contents">アウトドアデート</span><br>
                            <input type="radio" name="place" value=4<?php if($place == 4){ echo ' checked="checked"';} ?> require><span class="contents">食事デート</span><br>
                            <input type="radio" name="place" value=2<?php if($place == 2){ echo ' checked="checked"';} ?> require><span class="contents">お家デート</span><br>
                            <div class="question">
                                <p>質問４：○○になりたい。○○とは？</p>
                            </div>
                            <input type="radio" name="ideal" value=1<?php if($ideal == 1){ echo ' checked="checked"';} ?> require><span class="contents">優しい人</span><br>
                            <input type="radio" name="ideal" value=4<?php if($ideal == 4){ echo ' checked="checked"';} ?> require><span class="contents">イケメン or 美女</span><br>
                            <input type="radio" name="ideal" value=3<?php if($ideal == 3){ echo ' checked="checked"';} ?> require><span class="contents">スタイル抜群</span><br>
                            <input type="radio" name="ideal" value=2<?php if($ideal == 2){ echo ' checked="checked"';} ?> require><span class="contents">おしゃれ</span><br>
                            <div class="question">
                                <p>質問５：恋人にしたくないのは？</p>
                            </div>
                            <input type="radio" name="no" value=2<?php if($no == 2){ echo ' checked="checked"';} ?> require><span class="contents">無邪気で素直なタイプ</span><br>
                            <input type="radio" name="no" value=4<?php if($no == 4){ echo ' checked="checked"';} ?> require><span class="contents">知的で論理的なタイプ</span><br>
                            <input type="radio" name="no" value=1<?php if($no == 1){ echo ' checked="checked"';} ?> require><span class="contents">元気で明るいタイプ</span><br>
                            <input type="radio" name="no" value=3<?php if($no == 3){ echo ' checked="checked"';} ?> require><span class="contents">自由な破天荒タイプ</span><br>
                            <div class="question">
                                <p>質問６：友達にするには</p>
                            </div>
                            <input type="radio" name="friend" value=3<?php if($friend == 3){ echo ' checked="checked"';} ?> require><span class="contents">聞き上手な人</span><br>
                            <input type="radio" name="friend" value=2<?php if($friend == 2){ echo ' checked="checked"';} ?> require><span class="contents">しゃべり上手な人</span><br>
                            <input type="radio" name="friend" value=4<?php if($friend == 4){ echo ' checked="checked"';} ?> require><span class="contents">自分と似た人</span><br>
                            <input type="radio" name="friend" value=1<?php if($friend == 1){ echo ' checked="checked"';} ?> require><span class="contents">自分と真逆な人</span><br>
                            <div class="question">
                                <p>質問７：人に怒ることはありますか？</p>
                            </div>
                            <input type="radio" name="angry" value=1<?php if($angry == 1){ echo ' checked="checked"';} ?> require><span class="contents">毎日のように怒っている</span><br>
                            <input type="radio" name="angry" value=2<?php if($angry == 2){ echo ' checked="checked"';} ?> require><span class="contents">よく怒っている</span><br>
                            <input type="radio" name="angry" value=3<?php if($angry == 3){ echo ' checked="checked"';} ?> require><span class="contents">たまに怒る</span><br>
                            <input type="radio" name="angry" value=4<?php if($angry == 4){ echo ' checked="checked"';} ?> require><span class="contents">怒ることはほとんどない</span><br>
                        </div>
                        <input type="submit" value="診断する！" class="submit">
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>