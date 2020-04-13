@extends('layouts.app')

@section('content')

    {{--  "__('some text')" this form to be used for translate Purpose. --}}
   <a class="btn btn-outline-primary mb-3"  href="{{route('articles.create')}}">{{__('Create New Article')}}</a>

        <div class="row">
        @forelse($articles as $article)
            <div class="col-3 col-sm-12 col-md-12 col-lg-3">
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
                    <small class="text-center">{{__('last edited was in')}} {{$article->updated_at}}</small>
               </a>
                <div class="card-footer btn">
                     <form class="btn-group btn-block" action="{{route('articles.destroy', $article)}}" method="post">
                         <a class="btn btn-warning" href="{{route('articles.edit', $article)}}">{{__('Edit')}}</a>
                         @csrf
                         @method('delete')
                         <button class="btn btn-danger" onclick="return confirm('Are You sure?')" type="submit">{{__('Delete')}}</button>
                     </form>
                    </div>
            </div>
            </div>
            @empty
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <h3 class="text-center align-content-center">{{__('You Dont Have Any Articles.')}}</h3>
            </div>
        @endforelse
        </div>

@endsection
