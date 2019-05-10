@extends('layouts.mainauth')

@section('main')

<!-- вид с формой регистрации компании -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <h3 class="display-4 text-center">Идеи сообщества</h3>

    <div class="card-deck">
        @foreach($ideas as $idea)
        <div class="card col-4">
            <div class="card-body">
                <a href="#" onclick = "getIdea({{$idea->id}})" data-toggle="modal" data-target="#mainModal">
                <h4 class="card-title">{{$idea->name}}</h4>
                </a>
                <p class="card-text">{{$idea->decision}}</p>
                <p class="card-text"> <img src="{{url($idea->user->avatar)}}" alt="фото" height="32" width="32"> {{$idea->user->real_name}} {{$idea->user->real_lastname}}</p>
            </div>
        </div>
        @endforeach
    </div>

    {{$ideas}}






</main>
@endsection
