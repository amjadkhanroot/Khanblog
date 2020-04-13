@extends('layouts.app')

@section('title', __('Create Article'))

@section('content')
    <h2>{{__('Create New Article')}}</h2>
    <br>
    <form class="form-group m-lg-auto m-xl-auto m-sm-auto m-md-auto" action="{{route('articles.store')}}" method="POST">
        @include('articles._form', ['submitText' => __('Publish')])
    </form>
@endsection
