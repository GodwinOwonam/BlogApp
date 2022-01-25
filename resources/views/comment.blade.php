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

    <div class="logout-svg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        <a href="{{route('readerDash', $reader_id)}}">Back</a>
    </div>
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
                    <textarea type="text" name="comment" id="post-description" required placeholder="this is what I think"></textarea>
                </div>

                <button type="submit">Comment</button>
            </form>
        </div>

        <p id="intro-other-comments">What others commented:</p>
        @foreach($comments as $comment)
            <div id="other-comments">
                
                <div id="commenter">
                    <div><span>@</span>{{$comment->reader_name}}</div>
                </div>
                <hr>
                <div id="comment-description">
                    {{$comment->comment}}
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>