<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Blog</h1>
    <form action="/edit-blog/{{$blog -> id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{$blog -> title}}"> <br> <br>
        <textarea name="body" >{{$blog -> body}}</textarea>
        <button>Save Changes</button>
    </form>
</body>
</html>