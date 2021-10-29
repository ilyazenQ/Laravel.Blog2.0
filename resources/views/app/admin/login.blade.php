<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>

   <form action="{{ route("login") }}" method="POST">
      @csrf
      <input type="text" name="name" required>
      <input type="password" name="password">
      <input type="text" name="email">
      <button type="submit">x</button>
   </form>

</body>
</html>