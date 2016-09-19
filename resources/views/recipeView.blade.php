<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <style>
            body {
                width: 100%;
                font-family: 'Lato';
                font-weight:bolder;
            }
        </style>
    </head>
    <body>
          <h1>Recipe: {{$recipe->name}}</h1>
          <p>{{$recipe->description}}</p>
          @foreach($recipe->pictures as $picture)
              <img width="200" src="./{{$recipe->id}}/pics/{{$picture->id}}">
          @endforeach
          <br>
          @foreach($recipe->categories as $category)
              <a href="#">{{$category->name}}</a> | 
          @endforeach
          <br>
          <small>{{$user->username}} | {{$recipe->posted}}</small>
    </body>
</html>
