@auth
@include ('partials._header')
<div class="container">
    @include ('partials._navbar')
    <div class="row w-75 border rounded p-3" style="margin: auto;" >
        <h4 style="margin: auto;" class="text-center w-auto text-secondary border-bottom border-secondary">Create New Post</h4>
        <form action="/create-post" method="post">
            @csrf
            <input type="text" name="title" placeholder="Post title" class="my-2 form-control">
            <textarea name="description" class=" my-2 form-control" placeholder="Description here..."></textarea>
            <button class="btn btn-secondary my-2 " >Create</button>
        </form>
    </div>

    <div class="row w-75 my-5 border rounded p-3" style="margin: auto;" >
        <a href="{{url('all-posts')}}"> View Posts </a>
    </div>
</div>



@endauth