<div class="container">
    <div class="card">
        <div class=" card-body">
            @foreach($contents as $content)
                @if($content->type_id == 1)
                    <p class="{{$content->property->align_id}}">{{$content->value}}</p>
                    {{--                <p class="{{$content->property->align_id}}">{{$content->value}}</p>--}}
                @elseif($content->type_id == 2)
                    <h1 class="{{$content->property->size_id}} {{$content->property->align_id}}">{{$content->value}}</h1>
                @elseif($content->type_id == 3 )
                    <div class="{{$content->property->align_id}}">
                        <img class="img-fluid" src="{{asset('storage/'.$content->value)}}" alt="{{asset($content->value)}}">
                    </div>
                @endif
            @endforeach

            @if(isset($post))
                <div>
                    <p class="text-right"><strong>Fecha: </strong>{{$post->created_at}}</p>
                    <p class="text-right"><strong>Autor: </strong>{{$post->user->name}}</p>
                </div>
            @endif


        </div>
    </div>
</div>

