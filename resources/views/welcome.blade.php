@extends('layouts.app')

@section('title', __('Welcome to Khan Blog'))

@section('content')

    <h3 class="m-3">{{__('Recent Articles')}}</h3>
    <div class="row jumbotron">
        @forelse($recentArticles as $recentArticle)
            <div class="col-3 col-sm-12 col-md-12 col-lg-3">
                <div class="card m-2 ">
                    <a class="card-body" style="
                    color: black;
                    text-align: center;
                    text-decoration: none;
                    cursor: pointer;
                    text-underline: none !important;"
                       href="{{route('articles.show',$recentArticle)}}">
                        <h2 class="text-center">{{$recentArticle->title}}</h2>
                        <br>
                        <small class="text-center">{{__('Created at')}} {{$recentArticle->created_at}}</small>
                        <br>
                        <small class="text-center">{{__('last edited was in')}} {{$recentArticle->updated_at}}</small>
                    </a>
                    <div class="card-footer btn">
                        <span class="text-center">{{__('Author:')}} {{$recentArticle->user->name}}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <h3 class="text-center align-content-center">{{__('No Articles yet.')}}</h3>
            </div>
        @endforelse
    </div>

    <h3 class="m-3">{{__('Randoms Articles')}}</h3>

    <div class="row">
        @forelse($randomArticles as $randomArticle)
            <div class=" col-3 col-xs-12 col-sm-12 col-md-12 col-xl-3 col-lg-3 ">
                <div class="card m-2">
                    <a class="card-body" style="
                    color: black;
                    text-align: center;
                    text-decoration: none;
                    cursor: pointer;
                    text-underline: none !important;"
                       href="{{route('articles.show',$randomArticle)}}">
                        <h2 class="text-center">{{$randomArticle->title}}</h2>
                        <br>
                        <small class="text-center">{{__('Created at')}} {{$randomArticle->created_at}}</small>
                        <br>
                        <small class="text-center">{{__('last edited was in')}} {{$randomArticle->updated_at}}</small>
                    </a>
                    <div class="card-footer btn">
                        <span class="text-center">{{__('Author:')}} {{$randomArticle->user->name}}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <h3 class="text-center align-content-center">{{__('No Articles yet.')}}</h3>
            </div>
        @endforelse
    </div>

    <br>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center align-content-center">
            <a class="btn btn-outline-primary"  href="{{route('articles.index')}}">
                {{__('Browse All Article')}}</a>
        </div>
    </div>
@endsection
