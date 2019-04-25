@extends('layouts.mainauth')

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
          <img src="https://static.tildacdn.com/tild3532-6130-4437-b966-653766626265/1.jpg" class="rounded-circle" alt="" height="40" width="40">
<button type="button" class="btn btn-outline-danger" onclick="location.href = '{{ url('/registerCompany') }}'">Зарегистрировать компанию на BI</button>
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
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="50%" y="50%">Thumbnail</text></svg>
            <div class="card-body">
             <a href="{{ route('companyHome',['id'=>$company->id]) }}"> <h4>
               {{ $company->name }}</h4></a>
              <p class="card-text">{{ $company->description }}</p>
              <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group" role="group" aria-label="Basic example">
               <button type="button" class="btn btn-warning btn-sm" onclick="newCompanyIdea({{ $company->id }}, {{ Auth::user()->id }})" data-toggle="modal" data-target="#mainModal">Идея!</button>
               <button type="button" class="btn btn-success btn-sm" >Присоединиться</button>
             </div>
                <small class="text-muted">9 mins</small>
              </div>
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
