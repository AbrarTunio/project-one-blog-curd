@auth
@include ('partials._header')

<div class="container">
    @include ('partials._navbar')
    <div class="row w-75 my-5 border rounded p-3" style="margin: auto;" >
        <div class="col">
            <h1>All Posts</h1>
            <div class="col border rounded my-5">
                @foreach ( $posts as $post )
                <div class="bg-dark m-2 p-3 border-dark rounded border my-3">
                    <h3 class="h4 text-secondary"> {{$post->title}} : by <span class="text-primary">  {{$user}} </span> </h3>
                    <p class="text-light"> {{$post['description']}} </p>
                    <div class="row">
                        <div class="col-md-2"><a class="btn btn-secondary" 
                        href="/edit-post/{{$post->id}}">Edit Post</a></div>
                        <div class="col-md-2">
                            <form action="/delete-post/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>
</div>
$else
   <p>You are not logged in!!</p> 
@endauth