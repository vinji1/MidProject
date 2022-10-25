@extends('base')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            
            @if (session('message'))
               <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                 {{session('error')}}
             </div>
            @endif 

            <div class="card mt-3">

                <div class="card-header bg-info text-white text-center">
                    <h3 class="card-title">Login</h3>

                    </div>
                    <div class="card-body">
                        <form action="{{url('/login')}}" method="post">
                            {{ csrf_field() }}
                            
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="sample@gmail.com">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"placeholder="Atleast 6 character">
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <a href="/register">Sign up for an account</a>
                                </div>
                                <button class="btn btn-primary" type="submit">Login</button>

                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection