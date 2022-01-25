<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('dashstyles.css')}}">
</head>
<body>
        <div id="edit-display">
        <h2>Edit a post</h2>
          <div class="post-section">
              <form action="{{route('update', $post->id)}}" method="post">
                @csrf
                  <div class="post-title">
                      <label for="title">Title</label>
                      <input type="text" name="title" id="title-field" value="{{$post->title}}" required>
                  </div>

                  <div class="post-description">
                      <label for="description">Description</label>
                      <textarea type="text" name="description" id="post-description" required >{{$post->description}}</textarea>
                  </div>

                  <button type="submit">Update</button>
                </form>
          </div>
          </div>
</body>
</html>