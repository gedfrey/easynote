<div class="container card">
    <div class="card-body">
        @foreach($contents as $content)
            @if($content->type_id == 1)
                <p class="{{$content->property->align_id}}">{{$content->value}}</p>
            @elseif($content->type_id == 2)
                <h1 class="{{$content->property->size_id}} {{$content->property->align_id}}">{{$content->value}}</h1>
            @endif
        @endforeach
    </div>
</div>
