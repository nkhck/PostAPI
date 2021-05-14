<?php
if (!empty($_POST)) {
  $test = htmlspecialchars($_POST['test'], ENT_QUOTES, 'UTF-8');
  //郵便番号のAPIにアクセス
  $url = 'http://zipcloud.ibsnet.co.jp/api/search?zipcode='.$test;
  //返ってきたJSONを連想配列に変換する
  $res = json_decode(file_get_contents($url),true);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PostAPI</title>
</head>

<body>
  <form action="" method="post">
    郵便番号を入れてください<br>
    <input type="text" name="test" value="">
    <input type="submit" value="住所を表示">

    <?php
    if (!empty($res)) {
      echo '<br>';
      echo $res['results'][0]['address1'];
      echo $res['results'][0]['address2'];
      echo $res['results'][0]['address3'];
      echo '<br>です';
    }
    ?>
  </form>
</body>

</html>