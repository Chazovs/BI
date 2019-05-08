@extends('layouts.mainauth')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">

<button type="button" class="btn btn-outline-danger" onclick="location.href = '{{ url('/registerCompany') }}'">Зарегистрировать компанию на Bi</button>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('/companies/my') }}" class="btn btn-sm btn-outline-secondary {{ $my_c }}" role="button" > Мои компании</a>
             <a href="{{ url('/companies/all') }}" class="btn btn-sm btn-outline-success {{ $allC }}" role="button" > Все компании</a>
         
          </div>
         
        </div>
      </div>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">


@foreach($companies as $company)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">

           {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="{{$company->front_image}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="50%" y="50%">Thumbnail1</text></svg>--}}


             <div class="img-wrap p-0 col">
                  <img class="bd-placeholder-img card-img-top img-responsive"  width="100%" height="225" src="{{$company->front_image}}">
                     <div class="carousel-caption">
                     <h6 style="margin-bottom: 2.5rem; ">
                         <img class=" img-responsive mb-1"   height="64" src="{{ url($company->logo) }}"></br>
                         {{$company->slogan}}</h6>
                 </div>
              </div>

            <div class="card-body">
             <a href="{{ route('companyHome',['id'=>$company->id]) }}"> <h4>
               {{ $company->name }}</h4></a>
              <p class="card-text">{!! $company->description !!}</p>
@if($cardButton==true)
              <div class="d-flex justify-content-between align-items-center">
                  @if (count(($company->users->where('id',Auth::user()->id)))==0)

                      <div class="btn-group" role="group" aria-label="Basic example">
                          <button type="button" class="btn btn-warning btn-sm" onclick="newCompanyIdea({{ $company->id }}, {{ Auth::user()->id }})" data-toggle="modal" data-target="#mainModal">Идея!</button>
                          <button type="button" class="btn btn-success btn-sm" onclick="newUserRequest({{ $company->id }}, {{Auth::user()->id}})">Присоединиться</button>
                      </div>
                      <small class="text-muted">9 mins</small>
                  @else
                      <p class="text-success mb-0">Вы уже часть команды</p>
                  @endif
              </div>
@endif

            </div>
          </div>
        </div>
@endforeach

      </div>
<div class="row">
  <div class="col-12">
<p class="tex-center"> 
{{$companies}}


</p>
</div>
</div>

    </div>

  </div>
</main>
@endsection
