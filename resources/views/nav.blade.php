<nav class="navbar navbar-expand-lg text-white bg-secondary mb-2 p-1" id="nv1">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><h1>CheapTalk</h1></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto" id="n1">
          @if (auth()->check())
          <a class="nav-link" href="/">Home</a>
          <a class="nav-link" href="/home">Posts</a>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu">
              @foreach (App\Models\Category::whereHas('posts')->get()->sortBy('category') as $category)
              <li><a class="dropdown-item" href="{{url('categories', ['id'=>$category->id])}}">{{$category->category}}</a></li> 
              @endforeach
            </ul>
          </li>
          <a class="nav-link" href="/authors">Authors</a>
          <a class="nav-link" href="/dashboard">Dashboard</a>
          <a class="nav-link" href="/logs">Logs</a>

          <li class="nav-item dropdown btn btn-sm btn-light">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->name}}
            </a>
            <ul class="dropdown-menu">
             
              <li><a class="dropdown-item" href="{{url('/user/create-post')}}">{{ __('Create Post') }}</a></li> 
              <li><a class="dropdown-item" href="{{url('authors', ['id'=>auth()->user()->id])}}">{{ __('My Posts') }}</a></li> 
              <li><a class="dropdown-item" href="{{('/logout')}}">{{ __('Logout') }}</a></li> 
            </ul>
          </li>

          {{-- <a class="nav-link btn btn-danger" href="{{'/logout'}}">Logout</a>   --}}
          @else
          <a class="nav-link" href="/">Home</a>
          <a class="nav-link" href="/home">Posts</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu">
              @foreach (App\Models\Category::whereHas('posts')->get()->sortBy('category') as $category)
              <li><a class="dropdown-item" href="{{url('categories', ['id'=>$category->id])}}">{{$category->category}}</a></li> 
              @endforeach
            </ul>
          </li>
          <a class="nav-link" href="/authors">Authors</a>
          <a class="nav-link btn btn-sm bg-light" href="/login">Login</a> 
          <a class="nav-link btn btn-sm" href="/register">Register</a>
              
          @endif
          
        </div>
      </div>
    </div>
  </nav>

<style>
  #n1 :hover{
    color: orange;
    font-weight: bold;
  }
  /* #nv1{
    background-image: linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet);
  } */
</style>