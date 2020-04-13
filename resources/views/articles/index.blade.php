@extends('layouts.app')

@section('title', __('Welcome to Khan Blog'))

@section('content')
    <h3 class="m-3">{{__('All Articles')}}</h3>

    <div class="row">
        @forelse($articles as $article)
            <div class="col-3">
                <div class="card m-2 ">
                    <a class="card-body" style="
                    color: black;
                    text-align: center;
                    text-decoration: none;
                    cursor: pointer;
                    text-underline: none !important;"
                       href="{{route('articles.show',$article)}}">
                        <h2 class="text-center">{{$article->title}}</h2>
                        <br>
                        <small class="text-center">{{__('Created at')}} {{$article->created_at}}</small>
                        <br>
                        <small class="text-center">{{__('last edited was in')}} {{$article->updated_at}}</small>
                    </a>
                    <div class="card-footer btn">
                        <span class="text-center">{{__('Author:')}} {{$article->user->name}}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <h3 class="text-center align-content-center">{{__('No Articles yet.')}}</h3>
            </div>
        @endforelse
    </div>
@endsection
