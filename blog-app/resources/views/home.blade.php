<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    @auth
    <p style="text-align = 'center">Congrats you're logged in😎</p>
<form action="/logout" method="post">
    @csrf
    <button>Logout</button>
    <br> <br>
</form>
    <div style="border: 2px solid black; padding: 10px">
        <h2>Create your first Blogpost in here</h2>
        <form action="/create-post" method="post">
            @csrf
            <input type="text" placeholder="Blog Title" name="title"><br> <br>
            <textarea name="body" placeholder="Your blog herer......"></textarea> <br> <br>
            <button>Create Blog</button>
        </form>
    </div>
    <div style="border: 3px solid black">
        <h2>All Blogs</h2>
        @foreach ($blogs as $blog)
            <div style="background-color: gray; padding: 10px; margin: 10px">
               <h3>{{$blog['title']}} by {{$blog -> user -> name}}</h3>
                    <a href="/edit-blog/{{$blog -> id}}">Edit</a> <br> <br>
                    <form action="/delete-blog/{{$blog -> id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                
                <p>{{$blog['body']}}</p>
            </div>
        @endforeach
    </div>

        @else
        <div style="
        border: 3px solid black; padding: 10px">
        <h2>REGESTER</h2>
        <form action="/register" method="post">
            @csrf
        <input name="name" type="text" placeholder="Name"> <br> <br>
        <input name="email" type="email" placeholder="Email" id=""><br> <br>
        <input name='password' type="password" placeholder="Password" id=""> <br> <br>
        <button>Register</button>
    </form>

    </div>  <br><br>
    <div style="
        border: 3px solid black; padding: 10px">
        <h2>LOGIN</h2>
        <form action="/login" method="post">
            @csrf
        <input name="loginName" type="text" placeholder="Name"> <br> <br>
        <input name='loginPassword' type="password" placeholder="Password" id=""> <br> <br>
        <button>Login</button>
    </form>

    </div>  
        
    @endauth
    
</body>
</html>