@extends('layouts.mainauth')
@section('main')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Приглашения</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0 ?>
            @foreach(Auth::user()->incompanies as $company)
            <tr>
                <th scope="row"><?php $i++ ?> {{$i}}</th>
                <td><img src="{{url($company->logo)}}" alt="фото" height="32" width="32"> {{$company->name}}</td>
                <td><button class="btn btn-sm btn-outline-success" id="acceptInvitation{{$company->id}}" role="button" onclick="acceptInvitation({{$company->id}}, {{Auth::user()->id}})" > Принять</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection
