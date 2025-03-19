<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post - Formulário</title>
</head>
<body>
    <form action="{{ route("posts.update", $post->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="">Descrição</label>
        <input type="text" name="description" value="{{ $post->descriptions }}">
        <br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
