<div class="card mt-5">
    <h2 class="card-header text-center">{{$article->title}}</h2>
    <br>
    <p class="card-body text-justify">{!! nl2br($article->content) !!}</p>
    <br>
    <small class="card-footer">{{__('Author')}}: {{$article->user->name}}, {{__('Created at')}} {{$article->created_at}}, {{__('last edited was in')}} {{$article->updated_at}}.</small>
</div>
