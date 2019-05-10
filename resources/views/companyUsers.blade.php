@extends('layouts.mainauth')
@section('main')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Сотрудник</th>

            </tr>
            </thead>
            <tbody>
            <?php $i = 0 ?>
            @foreach($users as $user)
            <tr>
                <th scope="row"><?php $i++ ?> {{$i}}</th>
                <td><img src="{{url($user->avatar)}}" alt="фото" height="32" width="32"> {{$user->real_name}} {{$user->real_lastname}} ({{$user->name}})</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$users}}
    </main>
@endsection
