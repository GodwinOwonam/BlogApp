<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mwaah Hotel | Register</title>
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
        
        <h2>Sign Up</h2>

        <form action="{{route('registration')}}" method="post">
            @csrf
            <div>
                <label for="name">Your name<span style="color:red;">*</span> </label>
                <input type="text" placeholder="Name" name="name" required>
            </div>

            <div>
                <label for="email">Email <span style="color:red;">*</span> </label>
                <input type="email" placeholder="email" name="email" required>
            </div>

            <div>
                <label for="userType">Register as<span style="color:red;">*</span> </label>
                <select name="userType" id="user-type">
                    <option value="author">Author</option>
                    <option value="user">User</option>
                </select>
            </div>
            
            <div>
                <label for="password">Password <span style="color:red;">*</span> </label>
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div id="terms">
                <input type="checkbox" name="termCheckBox" id="terms-check" required> 
                <p id="terms-check-text">Agree to terms and conditions?<span style="color:red;">*</span></p> 
            </div>
            <button type="submit" >Register</button>
        </form>

        <p id="login-text">Already registered? <a href="{{route('login')}}">Login</a>.</p>
        <p id="require-text"><span style="color:red;">*</span> means this information is required.</p>
        
    </div>
    
</body>
</html>