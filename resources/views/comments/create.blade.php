<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form method="POST" action="/comments">
    {{csrf_field()}}
    <input type="text" placeholder="User Name" name="userName">
    <input type="text" placeholder="Content" name="content">
    <button type="submit"></button>

  </body>
</html>
