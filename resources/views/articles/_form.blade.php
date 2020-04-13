@csrf
<div class="form-group">
    <input @isset($article) value="{{$article->title}}" @endisset name="title" type="text" class="form-control" style="border-color: #38c172" placeholder="{{__('Title')}}">
</div>

<div class="form-group">
    @foreach($categories as $key => $title)
        <label for="category_{{$key}}">{{$title}}</label>
        <input @if(isset($article) && in_array($key, $articleCategories)) checked @endif
        id="category_{{$key}}" name="categories[]" value="{{$key}}" class="" type="checkbox" >
    @endforeach

    {{--if you are using pluck, the below code will not work you should do it as above code.--}}
    {{--            @foreach($categories as $category)--}}
    {{--                <label for="category_{{$category->id}}">{{$category->title}}</label>--}}
    {{--                <input id="category_{{$category->id}}" name="categories[]" value="{{$category->id}}" class="" type="checkbox" >--}}
    {{--            @endforeach--}}
</div>

<div class="form-group">
    <textarea name="content" class="form-control rounded-0" rows="10" style="border-color: #38c172"
              placeholder="Type your content here ..">
        @isset($article) {{$article->content}} @endisset
    </textarea>
</div>

<div class="form-group">
    <button class="form-control btn btn-outline-success" type="submit" >{{$submitText}}</button>
</div>
