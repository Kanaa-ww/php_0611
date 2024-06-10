<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>お気に入りの本を入力してね♪</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>div{padding: 10px;font-size:16px;}</style>
    </head>
    <body>

        <!-- Head[Start] -->
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                </div>
            </nav>
        </header>
        <!-- Head[End] -->

        <!-- Main[Start] -->
        <form method="POST" action="insert.php">
            <div class="jumbotron">
                <fieldset>
                    <legend>BOOK</legend>
                    <label>名前：<input type="text" name="name"></label><br>
                    <label>書籍名：<input type="text" name="bookname"></label><br>
                    <label>URL：<input type="text" name="url"></label><br>
                    <label>ジャンル：
                        <!-- <input type="text" name="genre"></label><br> -->
                    <select name="genre">
                        <option value="business">ビジネス</option>
                        <option value="magazin">雑誌</option>
                        <option value="hobby">趣味</option>
                        </select></label><br>
                    <label>年齢：<input type="text" name="age"></label><br>
                    <label>日付：<input type="text" name="date"></label><br>
                    <br>
                    <input type="submit" value="送信">
                </fieldset>
            </div>
        </form>
        <!-- Main[End] -->


    </body>
</html>
