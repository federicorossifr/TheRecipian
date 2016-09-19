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
        <h1>{{$user->username}}&apos; profile</h1>
        First Name:{{$user->first_name}}
        Last Name: {{$user->last_name}}<br>
        @foreach($user->recipes as $recipe)
            <a href="{{$user->id}}/recipes/{{$recipe->id}}">{{$recipe->name}}</a><br>
        @endforeach
        
        @if(Cookie::get('id') && Cookie::get('id') == $user->id)
            <form action="/users/{{Cookie::get('id')}}/recipes" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="name"/>
                <input type="text" name="description" placeholder="description" />
                <input type="number" name="difficulty" placeholder="difficulty" />
                <select multiple="multiple" name="categories[]">
                      @foreach(App\Category::all() as $category) 
                          <option value="{{$category->name}}">{{$category->name}}</option>
                      @endforeach
                </select>
                <input type="file" name="files[]" multiple="multiple" />
                <input type="submit" />
            </form>
        @endif
    </body>
</html>
