<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Kommentarer ska synas här</h1>

    @foreach ($comments as $comment)
    	<dt>{{ $comment->userName }}</dt>
    	<dd>{{ $comment->content }}</dd>
    @endforeach

  </body>
</html>
