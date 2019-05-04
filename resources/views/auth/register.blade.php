@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Логин на сайте</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="real_name" class="col-md-4 col-form-label text-md-right">Имя</label>

                            <div class="col-md-6">
                                <input id="real_name" type="text" class="form-control{{ $errors->has('real_name') ? ' is-invalid' : '' }}" name="real_name" value="{{ old('real_name') }}" required autofocus>

                                @if ($errors->has('real_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('real_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="real_lastname" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                            <div class="col-md-6">
                                <input id="real_lastname" type="text" class="form-control{{ $errors->has('real_lastname') ? ' is-invalid' : '' }}" name="real_lastname" value="{{ old('real_lastname') }}" required autofocus>

                                @if ($errors->has('real_lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('real_lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Подтвердите пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                    <div class="form-group row">
                    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                        <label for="avatar" class="col-md-4 control-label">Фото</label>
                        <div class="col-md-6">
                            <input id="avatar" type="file" name="avatar">
                        </div>
                    </div>
                    @if ($errors->has('avatar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif
                    </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Зарегистрироваться') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
