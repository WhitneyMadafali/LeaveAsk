<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #btn 
        {
            color:red; 
            background-color:#f3f3f3;
        }
    </style>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
@extends('layouts.app')

@section('content')
    <div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-3">Employee Name: {{ $author->name }}</h5>
                    <p class="mb-0">Type: {{ $application->type }}</p>
                    <p class="mb-0">Start Date: {{ $application->start_date }}</p>
                    <p class="mb-0">Amount of days: {{ $application->amount }}</p>
                    <p class="mb-0">End Date: {{ $application->end_date }}</p>
                    <p class="mb-0">Reason: {{ $application->reason }}</p>
                    <p class="mb-0">Status: {{ $application->status }}</p>
                </div>
                <div class="card-body" >
                    @guest
                        <a href="{{ route('applications.index') }}" class="card-link" style="color: #4B94FD;">Back</a>
                    @else
                        @if (Auth::user()->id == $author->id)
                            <form action="{{ route('applications.destroy',$application->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the application?');">
                                <a class="card-link" href="{{ route('applications.edit',$application->id) }}"style="color: #4B94FD;">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn card-link" style="color: #4B94FD;">Delete</button>
                                    <a href="{{ route('applications.index') }}" class="card-link" style="color: #4B94FD;">Back</a>
                            </form>
                        @else
                            
                        @endif
                    @endguest
                </div>
        </div><br>
            <div class="comment-form">
                <form action="{{ route('comments_store',$application->id) }}" method="GET">
                        <div class="col-md-12">
                            <label for="comment"><strong>Comment on this application</strong></label>
                            <textarea class="form-control" style="height:100px; width:700px;" name="comment" placeholder="Your view goes here"></textarea>
                        </div> <br>
                        <div class="col-md-12 pt-3">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                        </div>
                </form>
            </div><br>
        <div class="row">
                <div class="col-md-8 col-md-offset-2">           
            <h3><i class="fas fa-comments" style="color: #227DC7"></i>  Comments</h3>
                @foreach ($comments as $comment)
                    <div class="comment">
                        @if (Auth::user()->id == $comment->user_id)
                            <p style="margin-bottom:0px;"><strong> You </strong> said...</p>
                        @else
                            <p style="margin-bottom:0px;"><strong>{{ $comment->author }} </strong> said...</p>
                        @endif
                            <p style="color: #A8A8A8; font-size:12px;margin-bottom:0px;">on {{ $comment->updated_at }}</p>
                            <p style="margin-bottom:0px;">{{ $comment->comment }}</p>
   
                            @if (Auth::user()->id == $comment->user_id)
                                    <form action="{{ route('comments.destroy',$comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the course?');">
                                    <a class="card-link" href="{{ route('comments.edit',$comment->id) }}"style="color: #4B94FD;">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn card-link" style="color: #4B94FD;">Delete</button>
                                    </form>
                
                            @else
                            @endif
                        </>
                    </div>
                @endforeach
           
        </div>
        {!! $comments->links() !!}
        </div>
@endsection
</body>
</html>