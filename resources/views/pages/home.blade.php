@extends('base')

@section('content')

<div class="container">
  <div class="row">
      <div class="col">
        <select class="form-select" id="category" name="category" wire:model.lazy='category'>
            <option value="all">All</option>
            <option value="Adventure">Adventure</option>
            <option value="Business">Business</option>
            <option value="Comedy">Comedy</option>
            <option value="Drama">Drama</option>
            <option value="Horror">Horror</option>
            <option value="Politics">Politics</option>
            <option value="Religion">Religion</option>
            <option value="Romance">Romance</option>
        </select>
      </div>

      <div class="col">
        {{-- <input type="text" class="form-control" placeholder="Search" wire:model="search">  --}}
        <form action="{{route('home')}}" method="GET" role="search">
            <input class="form-control" name="post" id="post" type="text" placeholder="Search">
        </form>
      </div>
  </div>

<div class="card" >
    <div class="card-header text-white bg-info">
        <h3>Recent Posts</h3>
    </div>

    <div class="row" style="height: 105vh; overflow: auto">
    @foreach ($posts as $post)
    <div class="col-md-4 mt-1">
    
        <div class="card {{$post->user->gender === 'female'? 'f1' : 'm1'}}" >
            <div class="card-header">
                <nav class="navbar navbar-expand-lg text-info mb-2">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="">{{$post->user->name}}</a>
                     
                      <div class="collapse navbar-collapse" id="navbarNavAlt">
                        <div class="navbar-nav ms-auto">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{$post->category->category}}
                            </a>
                            <ul class="dropdown-menu">
                              @foreach  (App\Models\User::byCategory($post->category_id) as $user)
                              <li><a class="dropdown-item" href="{{url('authors', ['id'=>$user->id])}}">{{$user->name}}</a></li>
                              @endforeach


                              {{-- @foreach (App\Models\Category::whereHas('posts')->get()->sortBy('category') as $category)
                              <li><a class="dropdown-item" href="{{url('categories', ['id'=>$category->id])}}">{{$category->category}}</a></li> 
                              @endforeach --}}
                            </ul>
                          </li>
        
                          
                        </div>
                      </div>
                    </div>
                  </nav>

            </div>
            <div class="card m-3" style="height: 20vh;">
                <div class="card-body">
                    <h4>{{$post->post}}</h4>
                </div>
            </div>
            
            <div class="card-footer">
                <p>Published: {{$post->created_at}}</p>
            </div>
        </div>
   
    </div>
    @endforeach
</div>
</div> 
    <div class="offset-md-5 mt-3">
        {{ $posts->links() }}
    </div>

</div>

<style>
    .f1{
        background-color: lightpink; 
    }
    .card .f1:hover{
        background-color: rgb(224, 149, 149);
    }
    .m1{
        background-color: lightblue;
    }
    .card .m1:hover{
        background-color: rgb(70, 70, 248);
    }
</style>
@endsection