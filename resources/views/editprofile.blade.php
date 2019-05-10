@extends('layouts.mainauth')

@section('main')

<!-- вид с формой регистрации компании -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">

<h1 class="h4">Редактирование профиля</h1>

      </div>

  <div class="row">
    <div class="col-md-6 order-md-1">
      <form class="needs-validation" validate action="{{ route('profileEditPush', ["userId"=>$user->id]) }}" method="POST" enctype="multipart/form-data" name="registerNewCompany">
          {{ csrf_field() }}
          <div class="row">
              <div class="col-md-10 mb-3">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="avatar" id="avatar">
                      <label class="custom-file-label" for="avatar">
                          Фото
                      </label>
                  </div>


              </div>
              <div class="col-md-2 mb-3">
                  <img src="{{$user->avatar}}" height="32" width="32">
              </div>
          </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="real_name">Имя</label>
            <input type="text" class="form-control"  name="real_name" id="real_name" placeholder="" value="{{$user->real_name}}" maxlength="30" required>
            <div class="invalid-feedback">
              Это поле должно быть заполнено
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="real_lastname">Фамилия</label>
            <input type="text" class="form-control" name="real_lastname" id="real_lastname" placeholder="" value="{{$user->real_lastname}}" maxlength="30" required>
            <div class="invalid-feedback">
                Это поле должно быть заполнено
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="{{$user->email}}" maxlength="100" required>
          <div class="invalid-feedback">
          Введите корректный адрес email
          </div>
        </div>
        <div class="mb-3">
          <label for="city">Город</label>
          <input type="text" class="form-control" name="city" id="city" placeholder=""  value="{{$user->city}}" maxlength="40">
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>
          <div class="mb-3">
              <label for="about">О себе</label>
              <textarea type="text" class="form-control" name="about" id="about" placeholder="1234 Main St"  maxlength="300">{{$user->about}}</textarea>
              <div class="invalid-feedback">
                  Please enter your shipping address.
              </div>
          </div>
          <div class="row">
          <div class="col-md-6 mb-3">
              <label for="profession">Профессия</label>
              <input type="text" class="form-control" name="profession" id="profession" placeholder="" value="{{$user->profession}}"  maxlength="50">
              <div class="invalid-feedback">
                  Это поле должно быть заполнено
              </div>
          </div>
          <div class="col-md-6 mb-3">
              <label for="experience">Опыт в профессии</label>
              <input type="link" class="form-control" name="experience" id="experience" placeholder="" value="{{$user->experience}}"  maxlength="20">
              <div class="invalid-feedback">
                  Это поле должно быть заполнено
              </div>
          </div>
          </div>
          <div class="mb-3">
              <label for="hh">Ссылка на резюме на hh.ru</label>
              <input type="text" class="form-control" name="hh" id="hh" placeholder="" value="{{$user->hh}}"  maxlength="200">
              <div class="invalid-feedback">
                 Введите корректную ссылку
              </div>
          </div>

          <h4 class="mb-3">Работа</h4>
          <div class="d-block my-3">
              <div class="custom-control custom-radio">
                  <input id="N" name="look_for_work" type="radio" class="custom-control-input"  value="N" @if($user->look_for_work=="N") checked @endif>
                  <label class="custom-control-label" for="N">Не ищу работу</label>
              </div>
              <div class="custom-control custom-radio">
                  <input id="Y" name="look_for_work" type="radio" class="custom-control-input" value="Y" @if($user->look_for_work=="Y") checked @endif>
                  <label class="custom-control-label" for="Y">Ищу работу на полный день в офисе</label>
              </div>
              <div class="custom-control custom-radio">
                  <input id="D" name="look_for_work" type="radio" class="custom-control-input" value="D" @if($user->look_for_work=="D") checked @endif>
                  <label class="custom-control-label" for="D">Ищу работу на полный день удаленно</label>
              </div>
              <div class="custom-control custom-radio">
                  <input id="U" name="look_for_work" type="radio" class="custom-control-input" value="U" @if($user->look_for_work=="U") checked @endif>
                  <label class="custom-control-label" for="U">Ищу подработку</label>
              </div>
          </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Редактировать</button>
      </form>
    </div>
  </div>
</div>

</main>
@endsection
