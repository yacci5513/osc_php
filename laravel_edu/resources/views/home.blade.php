<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>HOME!!!!</h1>
    <br><br>
    <form action="/home" method="POST">
        @csrf
        <button type="submit">POST버튼</button>
    </form>
    <br><br>
    <form action="/home" method="POST">
        @csrf
        @method('PUT')
        <button type="submit">PUT버튼</button>
    </form>
    <br><br>
    <form action="/home" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">DELETE버튼</button>
    </form>
</body>
</html>