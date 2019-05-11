@extends('layouts.mainauth')
@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


<div class="jumbotron">
  <h1 class="display-4"><img class="rounded-circle" src="{{url($user->avatar)}}" alt="фото" height="64" width="64"> {{$user->real_name}} {{$user->real_lastname}}
  @if(Auth::user()->id==$user->id)
      (это вы)
  @endif

  </h1>
    @if($user->about!="")
        <p class="lead">"{{$user->about}}"</p>
    @endif

  <hr class="my-2">
    <p>
        <strong>Профессия:</strong>
        @if($user->profession=="")
            не указана
        @else
         {{$user->profession}}
            @if($user->experience!="")
                (Опыт работы {{$user->experience}})
            @endif
        @endif

    </p>
  <p>
      <strong>В поисках работы:</strong>
      @if($user->look_for_work=="N")
          не ищет работу
      @elseif($user->look_for_work=="Y")
          ищет работу на полный день в офисе
      @elseif($user->look_for_work=="D")
          ищет работу на полный день удаленно
      @elseif($user->look_for_work=="U")
          ищет подработку
      @endif

  </p>
    <p>
        <strong>Ссылка на резюме hh.ru:</strong>
        @if($user->hh=="")
            не указана
        @else
            <a href="{{$user->hh}}">{{$user->hh}}</a>
        @endif

    </p>
    <p>
        <strong>Город:</strong>
        @if($user->city=="")
            не указан
        @else
            {{$user->city}}
        @endif

    </p>
    <p>
        @if(count($user->companies)>0)
            <strong>Состоит в командах компаний:</strong>
            @foreach($user->companies as $company)
                <a href="{{route('companyHome', ['id'=>$company->id])}}"> {{$company->name}}
                    @if($company->admin_id==$user->id)
                        (админ)
                    @endif
                </a>
            @endforeach
        @endif

    </p>


</div>


    
    </main>
    @endsection
