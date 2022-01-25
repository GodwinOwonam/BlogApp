<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('readerDash.css')}}">
    <link rel="stylesheet" href="{{asset('dashstyles.css')}}">
</head>
<body>
    <div id="comment-display">
        <div class="article">
            <h3 class="article-title">{{$post->title}}</h3>
            <p class="article-description">
                {{$post->description}}
            </p>
            <hr>
            <div id="author-description">
                <div><h5>Written by:</h5>{{$post->author_name}}</div>
                <div><h5>Email:</h5>{{$post->author_email}}</div>
            </div>
        </div>
        
        
        <div class="post-section">
            <form action="{{route('addNewComment', [$post->id, $reader_id])}}" method="post">
            @csrf
                <div class="post-description">
                    <textarea type="text" name="comment" id="post-description" required ></textarea>
                </div>

                <button type="submit">Comment</button>
            </form>
        </div>

    </div>
</body>
</html>