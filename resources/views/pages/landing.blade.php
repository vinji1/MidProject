@extends('base')

@section('content')
<div class="container">
    <div class="card mt-4"  
    style="
    height: 80vh; 
    background:url({{asset('img/bg-2.jpg')}}); 
    background-size: cover; 
    background-repeat: no-repeat;">
        {{-- style="; --}}
    <div class=" items-center justify-center text-center">
        <div class="card-body">
            <h1 class="text-dark">Welcome to CheapTalk</h1>
            <h4 class="mt-4 text-dark mb-10">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, minus! Eligendi, excepturi sunt voluptate veritatis distinctio, doloribus placeat nisi iure nulla tenetur eos reiciendis modi, sequi eaque? At, vitae blanditiis.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium ea, voluptas, id est sit deserunt repellat at ipsum autem libero sed ducimus earum voluptate saepe provident minima obcaecati tempore laboriosam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis perferendis maiores ratione mollitia reprehenderit, atque natus doloribus praesentium nobis ipsa ex dignissimos voluptatibus ad facere numquam nemo ullam hic rem.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam itaque saepe omnis aspernatur suscipit minima eligendi. Officia quos vero, itaque dolorem omnis error aperiam consectetur quam, nobis, voluptatem ea nemo.
            </h4>
            @if (!Auth::check())
            <a href="{{url('/register')}}"
                class="btn btn-info">
            Get Started
            </a>
            @endif

        </div>
    </div>
</div>
</div>
@endsection