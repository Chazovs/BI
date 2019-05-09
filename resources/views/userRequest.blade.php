@extends('layouts.mainauth')
@section('main')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Заявка</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0 ?>
            @foreach($company->rqusers as $rquser)
            <tr>

                <th scope="row"><?php $i++ ?> {{$i}}</th>
                <td><img src="{{url($rquser->avatar)}}" alt="фото" height="32" width="32"> {{$rquser->real_name}} {{$rquser->real_lastname}} ({{$rquser->name}})</td>
                <td>  <button class="btn btn-sm btn-outline-success" id="acceptRequest{{$rquser->id}}" role="button" onclick="acceptRequest({{$company->id}}, {{$rquser->id}})" > Принять</button></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection
