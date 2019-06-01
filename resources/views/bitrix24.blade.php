@extends('layouts.mainauth')
@section('main')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="jumbotron">
            <h1 class="display-5">Как импортировать отчеты из Битрикс24?</h1>
            <p class="lead">В графики можно импортировать отчеты из известной CRM Битрикс24. Создав отчет один раз, вы сможете пользоваться им многократно.</p>
            <hr class="my-2">
            <p>Шаг 1.<br>
                Нужно создать отчет в Битрикс 24.
                Для этого переходим в раздел отчеты по ссылке http://Ваш портал/crm/reports/report/. Или нажимаем на
                "Отчеты" в разделе CRM.</p>
            <img src="{{url('demodatachart/step1.png')}}" alt="">
            <p>Шаг 2.<br>
                Создаем новый отчет, нажав на Добавить отчет</p>
            <img src="{{url('demodatachart/step2.png')}}" alt="">
            <p>Шаг 3.<br>
                Выберите любой подходящий вам набор полей и нажмите "Далее"</p>

            <p>Шаг 4.<br>
                В разделе колонки следует оставить только две колонки. Причем первая должна выводить даты, а вторая числовые значения. Например так:</p>
            <img src="{{url('demodatachart/step4.png')}}" alt="">
            <p>
                Итоговый отчет должен иметь примерно следующий вид:
                <img src="{{url('demodatachart/step3.png')}}" alt="">
            </p>

            <p>Шаг 5.<br>
                Следующий этап - экспорт отчета в файл. Для этого достаточно нажать на кнопку Экспорт Excel
            <img src="{{url('demodatachart/step5.png')}}" alt=""></p>

            <p>Шаг 6.<br>
                Сохраненный файл вы можете загрузить в любой график
                <img src="{{url('demodatachart/step6.png')}}" alt=""></p>

         <strong>О том как строить отчеты в Битрикс24 подробно рассказано в этом видео </strong><br>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/0A58vSAtav4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
    </main>
@endsection
