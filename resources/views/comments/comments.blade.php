
<list-comment :post_id="{{json_encode(($post->id))}}"></list-comment>
@guest()
    <div class="container mt-2">
        <div class="card">
            <div class="card-header text-center">
                <h2><strong>Agregar comentario</strong></h2>
            </div>
            <div class="card-body">
                <h1 class="text-center"><strong>Debes registrate para agregar un comentario</strong></h1>
            </div>
        </div>
    </div>

@endguest

@auth
<add-comment :post_id="{{json_encode($post->id)}}"></add-comment>
@endauth
