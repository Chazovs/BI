@extends('layouts.mainauth')
@section('main')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Пользователь</th>
                <th class="input-group-sm">
                    @if(count(Auth::user()->companies->where('admin_id', Auth::user()->id))>0)
                    <select class="custom-select input-group-sm" id="yourCompany" onchange="eventCompanySelected(this.options [this.selectedIndex].value)">
                        <option value="{{$selectedCompany->id}}">{{$selectedCompany->name}}</option>
                        {{--перебираем все компании, в которых авторизованный пользователь является админом--}}
                        @foreach(Auth::user()->companies->where('admin_id', Auth::user()->id) as $yourCompany)
                            @if($yourCompany->id!=$selectedCompany->id)
                        <option value="{{$yourCompany->id}}">{{$yourCompany->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    @endif
                </th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0 ?>
            @foreach($users as $user)
            <tr>
                <th scope="row"><?php $i++ ?> {{$i}}</th>
                <td><a href="{{route('profile', ['id'=>$user->id])}}"> <img src="{{url($user->avatar)}}" alt="фото" height="32" width="32"> {{$user->real_name}} {{$user->real_lastname}} ({{$user->name}})</a></td>
                {{--если количество компаний, в которых авторизованный пользователь является админом больше 0--}}
                @if(count(Auth::user()->companies->where('admin_id', Auth::user()->id))>0)
                    {{--если пользователь еще не состоит в выбранной компании--}}
                    @if(count($user->companies->where('id', $selectedCompany->id))==0)
                        {{--если пользователь еще не состоит, но ему уже отправлено приглашение--}}
                        @if(count($user->incompanies->where('id', $selectedCompany->id))==0)
                <td><button class="btn btn-sm btn-outline-success" id="companyInvitation{{$user->id}}" role="button" onclick="companyInvitation({{$user->id}})" > Пригласить</button></td>
                        @else
                            <td><a class="btn btn-sm btn-outline-success disabled" role="button">Приглашение отправлено</a></td>
                        @endif
                    @else
                        <td>Уже в команде</td>
                    @endif
                    @endif
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$users}}
    </main>
@endsection
