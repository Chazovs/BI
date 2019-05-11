@extends('layouts.mainauth')
@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="jumbotron">

    <div class="d-flex ">
        <div class="pr-5 pl-5 w-75">
            <h1 class="display-4"><img class="rounded-circle" src="{{url($company->logo)}}" alt="фото" height="64" width="64"> {{$company->name}}
            </h1>
            @if($company->description!="")
                <p class="lead">"{{ $company->description}}"</p>
            @endif
        </div>
        <div class="p-4  mr-5 w-25 border border-primary">

                <strong>На сайте с</strong>
                {{ $company->created_at->format('d.m.Y')}}
                <br>
                <strong>Город/Страна:</strong>
                @if($company->city=="")
                    не указано
                @else
                    {{$company->city}}
                @endif
                <br>
                <strong>Адрес:</strong>
                @if($company->adress=="")
                    не указан
                @else
                    {{$company->adress}}
                @endif
            <br>
            <strong>Email:</strong>
            @if($company->email=="")
                не указан
            @else
                <a href="mailto:{{$company->email}}">{{$company->email}}</a>
            @endif
            <br>
                <strong>Телефон:</strong>
                @if($company->phone=="")
                    не указан
                @else
                    <a href="tel:{{$company->tel}}">{{$company->tel}}</a>
                @endif
                <br>
                <strong>Сайт:</strong>
                @if($company->site=="")
                    не указан
                @else
                    <a href="{{$company->site}}" target="_blank">{{$siteHost}}</a>
                @endif
        </div>
    </div>
    <hr class="my-2 mt-4">
    <p>
        <h4 class="text-center">О компании</h4>
        @if($company->about=="")
           Информация пока не указана
        @else
            {!! $company->about !!}
        @endif

    </p>
    </main>
    @endsection
