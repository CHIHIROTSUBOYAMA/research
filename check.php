<?php
error_reporting(E_ALL); //E_STRICTレベル以外のエラーを報告する
ini_set('display_errors', 'On'); //画面にエラーを表示させるか
ini_set('log_errors', 'On'); //ログを取るか
ini_set('error_log', 'php.log'); //ログの出力ファイルを指定
?>

<?php
session_start();
require("dbconnect.php");

if (!isset($_SESSION["date"])) {
    header("Location:index.php");
    exit();
}

$name = $_SESSION["date"]["name"];
$preinitial = $_SESSION["date"]["favper"];

if (isset($name) && ($preinitial)) {
    if (ctype_alpha($preinitial)) {
        if (ctype_upper($preinitial)) {
            $initial = $preinitial;
        } else {
            $initial = strtoupper($preinitial);
        }
    }
}

$point = $_SESSION["date"]["age"] + $_SESSION["date"]["who"] + $_SESSION["date"]["place"] + $_SESSION["date"]["ideal"] + $_SESSION["date"]["no"] + $_SESSION["date"]["friend"] + $_SESSION["date"]["angry"];

$statement = $db->prepare("INSERT INTO answers SET name=?, initial=?, who=?, place=?, ideal=?, no=?, friend=?");

$statement->execute(array(
    $name,
    $initial,
    $_SESSION["date"]["who"],
    $_SESSION["date"]["place"],
    $_SESSION["date"]["ideal"],
    $_SESSION["date"]["no"],
    $_SESSION["date"]["friend"]
));
unset($_SESSION["date"]);

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link rel="stylesheet" href="reset.css">
</head>

<body class="body">
    <main>
        <div class="resultmain">
            <div class="bg-color">
                <?php

                $elevenless = "<b>あなたは自由奔放で我が道を行くタイプです。</b><br>「みんなと一緒」や「常識」が似合わないあなたは<br>他の人が想像もつかないようなことをやってのける力を持っています。<br>自分の可能性を最大限に広げたいと思っているあなたは様々なことに挑戦していきます。<br>その経験の中で学んだことを自分自身の強みとして生き抜いていくことができます！<br>そんなあなたのことを周りの人は「生きる力がある人だな」と思っています。<br>恋愛においては好き嫌いがはっきりしているため<br>あなたのことを理解してくれる人であなたが良いと思った相手であればとてもうまくいきます！<br>";
                $elevenlessalpha = ["F", "J", "P", "V", "Z", "Q"];
                $elevenlessalphastr = "F, J, P, V ,Z, Q";
                $twelveoneless = "<b>あなたは底力を出せる人です。</br><br>普段から全てに全力で取り組むというよりは、<br><b>「自分でやると決めたことに対しては全力でやる」</b><br>といったタイプです。だからといってその他のことを疎かにするかといえばそうでもありません。<br>やらなければいけないことややるべきことも要領よくこなす能力を持っています。<br>期限が決められている物事に取り組んでいるときに締め切りが近づくと通常の何倍もの効果を発揮し底力を見せます。<br>自分でも「最初から本気出せばよかったな」と思うことがあるのではないでしょうか？<br>そんなあなたは周りの人から「能力の高い人だな」と思われているようです。<br>恋愛においては少し奥手なところもありますが、<br>「自分の気持ちに嘘はつきたくない」と考えているため好きな人ができると、迷いながらも一途に思い続けることができます。<br>";
                $twelveonelessalpha = ["O", "B", "H", "L", "D", "W", "E", "C", "G"];
                $twelveonelessalphastr = "O, B, H, L, D, W, E, C, G,";
                $twelveeightless = "<b>あなたはオンとオフを切り替えられる人です。</b><br>集中しなければならないときにはしっかりと集中し、家などでゆっくりしていい時には周りの人に見せられないほどスイッチをオフにします。<br>好きなことや、やりたいことに対してスイッチが入ると<b>すさまじい集中力</b>を発揮することができます。<br>そして、集中力モードに入っている時が一番あなたらしい状態とも言えます。<br>そんなあなたのことを周りの人は<b>「努力家だな」</b>と思っています。あなたが集中している姿や一生懸命な姿を見てそのように感じているそうです。<br>恋愛においては本気で恋をすると何か他のことをしている時でも好きな人が何度も頭の中に出てくるくらい相手の人を考えるようです。<br>そのような真剣な恋をしているときは普段のあなたよりも感情が動きやすくなっているため、楽しい状態でもあり苦しい状態でもあります。<br>そんな矛盾した感情の中でも前向きに考えようとするところがあなたの魅力的なところです。";
                $twelveeightlessalpha = ["M", "Y", "A", "T", "S", "N", "R", "U", "K", "I"];
                $twelveeightlessalphastr = "M, Y, A, T, S, N, R, U, K, I";
                ?>

                <p class="result">診断結果！</p><br>

                <?php
                if (7 <= $point && $point <= 11) {
                    print($elevenless);
                    print("$name" . "さんの恋人になる人の苗字の頭文字は<br>" . "「" . $elevenlessalphastr . "」" . "の人です！<br>");
                    if (in_array($initial, $elevenlessalpha)) {
                        print("好きな人と両想いかも？！");
                    } else {
                        print("もしかしたら別の人といい感じなのかも…！");
                    }
                }
                if (12 <= $point && $point <= 21) {
                    print($twelveoneless);
                    print("$name" . "さんの恋人になる人の苗字の頭文字は<br>" . "「" . $twelveonelessalphastr . "」" . "の人です！<br>");
                    if (in_array($initial, $twelveonelessalpha)) {
                        print("好きな人と両想いかも？！");
                    } else {
                        print("もしかしたら別の人といい感じなのかも…！");
                    }
                }
                if (22 <= $point && $point <= 28) {
                    print($twelveeightless);
                    print("$name" . "さんの恋人になる人の苗字の頭文字は<br>" . "「" . $twelveeightlessalphastr . "」" . "の人です！<br>");
                    if (in_array($initial, $twelveeightlessalpha)) {
                        print("好きな人と両想いかも？！");
                    } else {
                        print("もしかしたら別の人といい感じなのかも…！");
                    }
                }
                ?>
            </div>
            <div class="youtube">
                <!--<p>参考動画</p>
                    <iframe src="https://www.youtube.com/embed/IVUBP7sJ-HA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                -->
            </div>
        </div>
        <div class="readmore">
                <input id="check1" class="readmore-check" type="checkbox">
                <div class="readmore-content">
                    中身のテキスト
                </div>
                <label class="readmore-label" for="check1"></label>
            </div>
    </main>
</body>

</html>