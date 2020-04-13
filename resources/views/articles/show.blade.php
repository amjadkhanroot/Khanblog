@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="row mt-5">
        <div class="card col-12 p-0">
            <h2 class="card-header text-center">{{$article->title}}</h2>
            <br>
            <p class="card-body text-justify">{!! nl2br($article->content) !!}</p>
            <br>
            <small class="card-footer">{{__('Author')}}: {{$article->user->name}},
                {{__('Created at')}} {{$article->created_at}}, {{__('last edited was in')}}
                {{$article->updated_at}}.</small>
        </div>
    </div>


    <div id="comment" class="row mt-5">
        <div class="card- col-12 p-0">
            <h3 class="card-header-tabs mb-3">{{__('Comments')}}</h3>
            @forelse($article->comments as $comment)
                <br>
            <div class="card-body p-0">
                <h5 class="card-header">{{$comment->user->name}}</h5>
                <br>
                <p class="card-body text-justify">{!! nl2br($comment->content) !!}</p>
                <br>
                <small >{{__('Posted at')}} {{$comment->created_at}}.</small>
            </div>
                @empty
                    <div>
                        <h4>{{__('No Comments yet!')}}</h4>
                    </div>

            @endforelse
        </div>

        @auth()
        <div id="commentForm" class="card col-12 p-0 mt-3">
            <h3 class="card-header">{{__('Write a Comment')}}</h3>
            <div class="card-body">
                <form class="form-group" action="{{route('comments.store', $article->id)}}" method="post">
                    @csrf
                    <textarea name="content" class="form-control" cols="12" rows="12" placeholder="{{__('Type your comment here ..')}}"></textarea>
                    <button class="btn btn-success form-control" type="submit" >{{__('Post')}}</button>
                </form>
            </div>
        </div>
        @else
            <div>
                <h5 class="mt-3">{{__('Log in to write a comment!')}}</h5>
            </div>
        @endauth
    </div>




@endsection
