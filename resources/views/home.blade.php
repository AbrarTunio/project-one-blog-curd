@include ('partials._header')
<div class="container">
        
         
        <div class="row p-4 justify-content-between" style="height: 65vh;">
            <div class="col-md-12 py-4 bg-warning align-self-end">
                <h3 class="h3 text-center  my-0">This is where you should start!</h3>
            </div>
            <div class="col-md-5 my-3 h-70 border border-warning rounded">
                <h2 class="h3">Register Here!</h2>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif 
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif  
                <form class="form" action="/register" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <input type="text" class="form-control" name="name" placeholder="Enter name">
                        </div>
                        <div class="col-md-6 my-2">
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                        <div class="col-md-12 my-2">
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>
                        <div class="col-md-2 my-2">
                            <button class="btn btn-warning">Register</button>
                        </div>
                    </div>
                    </form>
            </div>
            <div class="col-md-5 my-3 h-70 border border-primary rounded">
                <h2>Login Here!</h2>
                
                <form action="/login" class="form" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <input type="text" class="form-control" name="loginName" placeholder="Enter name">
                        </div>
                        <div class="col-md-6 my-2">
                            <input type="password" class="form-control" name="loginPassword" placeholder="Enter Password">
                        </div>
                        <div class="col-md-4 my-2">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
</div>
    
</body>
</html>