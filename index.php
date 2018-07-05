<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>家計簿アプリ</title>
</head>

<nav>


<!-- header -->
<div>
<a href="select.php">登録データ一覧</a>
</div>
</nav>
<!-- header end -->

<!-- main -->
<form method="POST" action="insert.php">

<div>
<label>大項目<input type="text" name="dai"></label><br>
<label>項目<input type="text" name="naiyou"></label><br>
<label>金額<input type="text" name="price"></label><br>
<input type="submit" value="送信！">
</div>
</form>



<!-- main end -->




<body>
    
</body>
</html>