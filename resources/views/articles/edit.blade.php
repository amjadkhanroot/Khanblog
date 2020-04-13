@extends('layouts.app')

@section('title', __('Edit Article'))

@section('content')
    <h2>{{__('Edit Article')}}: {{$article->title}}</h2>
    <br>

    <form class="form-group m-lg-auto m-xl-auto m-sm-auto m-md-auto" action="{{route('articles.update', $article)}}" method="post">
        @method('PATCH')
        @include('articles._form', ['submitText' => __('Save')])
    </form>
@endsection
