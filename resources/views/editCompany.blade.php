@extends('layouts.mainauth')

@section('main')

<!-- вид с формой регистрации компании -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="container">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">

<h1 class="h4">Редактирование профиля компании</h1>

      </div>

  <div class="row">
    <div class="col-md-6 order-md-1">
      <form class="needs-validation" validate action="{{ route('companyEditPush', ["companyId"=>$company->id]) }}" method="POST" enctype="multipart/form-data" name="registerNewCompany">
          {{ csrf_field() }}
          <div class=" mb-3">
              <label for="real_name">Название</label>
              <input type="text" class="form-control"  name="real_name" id="real_name" placeholder="" value="{{$company->name}}" maxlength="30" required>
              <div class="invalid-feedback">
                  Это поле должно быть заполнено
              </div>
          </div>
          <div class="row">
              <div class="col-md-10 mb-3">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="logo" id="logo">
                      <label class="custom-file-label" for="logo">
                        Логотип
                      </label>
                  </div>
              </div>
              <div class="col-md-2 mb-3">
                  <img src="{{url($company->logo)}}" height="32">
              </div>
          </div>
          <div class="row">
              <div class="col-md-10 mb-3">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="front_image" id="front_image">
                      <label class="custom-file-label" for="front_image">
                        Изображение для визитки (348 на 225)
                      </label>
                  </div>
              </div>
              <div class="col-md-2 mb-3">
                  <img src="{{url($company->front_image)}}" height="32">
              </div>
          </div>

          <div class="mb-3">
              <label for="slogan">Слоган или интересный факт</label>
              <input type="text" class="form-control" name="slogan" id="slogan" placeholder="" value="{{$company->slogan}}" maxlength="200" >
              <div class="invalid-feedback">
                  Please enter your shipping address.
              </div>
          </div>
          <div class="mb-3">
              <label for="description">Чем занимается компания (одно предложение)</label>
              <textarea type="text" class="form-control" name="description" id="description" placeholder=""  maxlength="200">{{$company->description}}</textarea>
              <div class="invalid-feedback">
                  Please enter your shipping address.
              </div>
          </div>
          <div class="mb-3">
              <label for="about">О компании (здесь вы можете написать подробный текст о вакансиях, которые вам требуются, о преимуществах компании и т.д.)</label>
              <textarea type="text" class="form-control" name="about" id="about" placeholder=""  maxlength="6000" >{{$company->about}}</textarea>
              <div class="invalid-feedback">
                  Please enter your shipping address.
              </div>
          </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="yourCompany@example.com" value="{{$company->email}}" maxlength="100" required>
          <div class="invalid-feedback">
          Введите корректный адрес email
          </div>
        </div>
        <div class="mb-3">
          <label for="city">Город</label>
          <input type="text" class="form-control" name="city" id="city" placeholder=""  value="{{$company->city}}" maxlength="40">
          <div class="invalid-feedback">
              Это поле должно быть заполнено
          </div>
        </div>
          <div class="mb-3">
              <label for="adress">Адрес</label>
              <input type="text" class="form-control" name="adress" id="adress" placeholder=""  value="{{$company->adress}}" maxlength="40">
              <div class="invalid-feedback">
                  Это поле должно быть заполнено
              </div>
          </div>
          <div class="row">
           <div class="col-md-6 mb-3">
              <label for="site">Сайт</label>
              <input type="url" class="form-control" name="site" id="site" placeholder=""  value="{{$company->site}}" maxlength="40">
              <div class="invalid-feedback">
                  Это поле должно быть заполнено
              </div>
          </div>
          <div class="col-md-6 mb-3">
              <label for="phone">Телефон</label>
              <input type="tel" class="form-control" name="phone" id="phone" placeholder=""  value="{{$company->phone}}" maxlength="20">
              <div class="invalid-feedback">
                     Это поле должно быть заполнено
              </div>
          </div>
          </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Редактировать</button>
      </form>
    </div>
  </div>
</div>
    <script>
        var editor = CKEDITOR.replace( 'about' );
    </script>
</main>
@endsection
