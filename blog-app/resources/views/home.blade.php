<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div style="border: 3px solid black; padding: 10px">
        <h2>REGESTER</h2>
        <form action="/register" method="post">
            @csrf
        <input type="text" placeholder="Name"> <br> <br>
        <input type="email" placeholder="Email" id=""><br> <br>
        <input type="password" placeholder="Password" id=""> <br> <br>
        <button>Register</button>
    </form>

    </div>
</body>
</html>