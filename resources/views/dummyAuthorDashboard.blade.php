<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mwaah Hotels | Dashboard</title>
    <link rel="stylesheet" href="{{asset('dashstyles.css')}}">
</head>
<body>
    <div class="logout-svg">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
      </svg>
      <a href="{{route('logout')}}">LOGOUT</a>
    </div>
    <h2 id="dashboard-header">Welcome! Your Dashboard</h2>
    <div class="container">
      
      <div class="left-display">
          <h2>Make a post</h2>
          <div class="post-section">
              <form action="{{route('newPost', $author->id)}}" method="post">
                @csrf
                  <div class="post-title">
                      <label for="title">Post Title</label>
                      <input type="text" name="title" id="title-field" required>
                  </div>

                  <div class="post-description">
                      <label for="description">Description</label>
                      <textarea type="text" name="description" id="post-description" required ></textarea>
                  </div>

                  <button type="submit">Post</button>
                </form>
          </div>

      </div>

      
      <div class="right-display">
        <h2>Your posts</h2>
        <br>
        <table>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          
          </thead>
            <tbody>
              
            </tbody>
        </table>
        <br>
      </div> 
    </div>
</body>
</html>