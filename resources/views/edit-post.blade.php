@auth
@include ('partials._header')
<div class="container">
    @include ('partials._navbar')
        

    <div class="row w-75 border rounded p-3" style="margin: auto;" >
        <h4 style="margin: auto;" 
        class="text-center w-auto text-secondary border-bottom border-secondary">Edit Post</h4>
        @if ( session('success') )
        <div class="my-2">
            <p class="border form-control border-success text-success rounded p-2">
                {{session('success')}}    
            </p>
        </div>
        
        @endif
        <div>
            <form action="/edit-post/{{$post->id}}" method="post">
                @csrf
                @method('PUT')
                <input type="text" name="title"
                placeholder="Post title" 
                class="my-2 form-control"
                value="{{$post->title}}">
                <textarea name="description" class=" my-2 form-control" 
                placeholder="Description here...">{{$post->description}}</textarea>
                <button class="btn btn-secondary my-2 " >Update</button>
            </form>
        </div>
        
    </div>
<div>
@endauth    