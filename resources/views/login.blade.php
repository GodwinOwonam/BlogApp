<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mwaah Hotel | Login</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
    <h1 id="hotel-text">
        <span>C</span>
        <span class="text-red">h</span>
        <span class="text-gold">a</span>
        <span class="text-cyan">t</span>
        <span> </span>
        <span class="text-green">A</span>
        <span class="text-cyan">p</span>
        <span class="text-gold">p</span>
    </h1>
    <div class="container">
        <h2>Login</h2>

        <form action="{{route('userLogin')}}" method="post">
            @csrf
            <div>
                <label for="email">Email<span style="color:red;">*</span> </label>
                <input type="text" placeholder="email" name="email" required>
            </div>
            
            <div>
                <label for="password">Password <span style="color:red;">*</span> </label>
                <input type="password" placeholder="password" name="password" required>
                
            </div>
            <button type="submit">Login</button>
        </form>

        <p id="register-text">New to our hotel? Register  <a href="{{route('register')}}">here</a>.</p>
        <p id="forgot-password-text"><a href="">Forgot Passowrd?</a></p>
        <p id="require-text"><span style="color:red;">*</span> means this information is required.</p>
        
    </div>
</body>
</html>