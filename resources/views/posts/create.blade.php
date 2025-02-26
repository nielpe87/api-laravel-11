<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post - Formulário</title>
</head>
<body>
    <form action="{{ url('/posts') }}" method="post">
        @csrf
        <label for="">Descrição</label>
        <input type="text" name="description">
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
