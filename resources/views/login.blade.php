<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
   @foreach($errors->all() as $error)
       <h1>{{$error}}</h1>
   @endforeach
    <form action="/login" method="post">
       @csrf
        <input type="text" name="user">
        <input type="password" name="password">
        <button type="submit">GO</button>
    </form>
</body>
</html>