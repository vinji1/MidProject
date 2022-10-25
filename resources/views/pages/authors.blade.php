@extends('base')

@section('content')
<div class="container">
  <div class="row" >
    @foreach ($users as $user)
    <div class="col-md-4 mb-1">
     
        <div class="card {{$user->gender === 'female'? 'f1' : 'm1' }}">
            <div class="card-header">
              <h4>{{$user->name}}</h4>
            </div>

            <a href="{{url('authors', ['id'=>$user->id])}}">
              <div class="card" >
                <div class="card-body bg-secondary">
                  <img class="card" id="pf1" src="{{$user->gender === 'female' ? asset('img/female.jpg') : asset('img/male.jpg')}}" alt="photo"
                  style="border-radius:50%;">
                </div>
              </div>
            </a>
            
            <div class="card-footer">
                <p>Total Posts: {{$user->posts()->count()}}</p>
            </div>
        </div>
     
    </div>
    @endforeach
  </div>
    <div class="offset-md-5 mt-3">
        {{ $users->links() }}
    </div>

</div>

<style>
  #pf1{
    height: 210px;
    width: 300px;
    margin-left: 5px;
  }
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