<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form method="POST" action="/comments">
    {{csrf_field()}}
    <input type="text" placeholder="Användernamn" name="userName">
    <input type="text" placeholder="Innehåll" name="content">
    <button type="submit">Kommentera</button>

  </body>
</html>
