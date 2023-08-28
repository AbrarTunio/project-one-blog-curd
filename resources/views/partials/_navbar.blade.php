<div class="row my-3 py-3 border-bottom border-primary rounded">
        <div class="col-md-6 ">
            <p class="h4 text-primary ">Welcome!, You are logged In.</p>
        </div>
        <div class="col-md-6 text-end">
            <form action="/logout" method="post">
                @csrf
                <button class="btn btn-secondary">logout</button>
            </form>
        </div>
    </div> 