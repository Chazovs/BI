@extends('layouts.mainauth')
@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-success">Сотрудники</button>
            <button type="button" class="btn btn-sm btn-outline-success">Графики</button>
            <button type="button" class="btn btn-sm btn-outline-success">Идеи клиентов</button>
            <a href="" class="btn btn-sm btn-outline-secondary disabled" role="button"> Цепочки точек</a>
          </div>
        </div>
         <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-success">Редактировать компанию</button>
          </div>
        </div>
      </div>      
      <div class="container col-md-9 ml-sm-auto col-lg-12 col-xl-12 px-4">
      <div class="text-center">
        @if (session('alert'))
        <div class="alert alert-success mt-4 w-100" role="alert">
         {{ session('alert') }}
      </div>
        @endif
    <img class="d-block mx-auto " src="{{ url($company->logo) }}" alt="" width="72" height="72">
    <h2>{{ $company->name }}</h2>
    <p class="lead">{!! $company->description !!}</p>
  </div>
<div class="row">
<div class="pt-5 container">
  <div class="row">
    <div class="col-sm">
      <button type="button" class="btn btn-success" onClick="addDotFromCompanyIndex({{ $company->id }}, {{ $user->id }}, 0)"  data-toggle="modal" data-target="#mainModal">Добавить точку</button>
    </div>
    <div class="col-sm"><h3>Главные точки</h3></div>
    <div class="col-sm"></div>
  </div>
</div>
</div>
<div class="album py-3">
  <div class="containe">
    <div class="row">
 @if (count($mainDots) > 0)      
@foreach($mainDots as $dot)  
<div class="col-md-4 mt-2">
  <div class="card shadow-sm h-100">
    <h6 class="card-header" ><img src="{{ $dot->logo }}" class="mr-2 rounded-circle" alt="" height="40" width="40" align="cover-container">
      <a href="{{ route('dotIndex',['id'=>$company->id, 'dotId'=>$dot->id]) }}">{{ $dot->name }}</a></h6>
    <div class="card-body">
      <p class="card-text">{!! $dot->description_short !!}</p>
    </div>
  </div>
</div>
@endforeach
@else
          <div class="alert alert-info" role="alert">
    У этой компании нет ни одной точки контакта? Не может быть! <strong>Добавьте первую!</strong> 
</div>
@endif
    </div>
  </div>
</div>
<br><br>


<div class="container">
  <div class="row">
    <div class="col-sm">
     <button type="button" href="#" onClick="addTaskFromCompanyIndex({{ $company->id }}, {{ $user->id }})" class="btn btn-success" data-toggle="modal" data-target="#mainModal">Добавить задачу</button>
    </div>
    <div class="col-auto"><h2>Мои задачи в компании</h2></div>
    <div class="col-sm"></div>
  </div>
</div>
 
</div>

      <div class="table-responsive">
         <table class="table table-striped table-sm">
          <thead>
            <tr class="text-center">
              <th class="bg-primary text-white">Ждут</th>
              <th class="bg-warning text-white">В работе</th>
              <th class="bg-success text-white">Сделано</th>
              <th class="bg-danger text-white">Факап</th>
            </tr>
          </thead>
          <tbody>
             <tr>
              <td class='w-25' id="status1">
                @if (count($tasks_status1) > 0)
                @foreach($tasks_status1 as $task1)
                <div class="card  bg-light mb-2 d-inline-block w-100" id="task{{ $task1->id }}">
                  <div class="toast-header"><strong class="mr-auto"><a href="#" onclick = "showTask({{ $task1->id }})" data-toggle="modal" data-target="#mainModal">{{ $task1->name }}</a></strong>
                    <a href="#" onclick = "editTask({{ $task1->id }})" data-toggle="modal" data-target="#mainModal"><small class="text-secondary"> (ред.)<!--  &#9998; --> </small> </a>
                    <script async="" src="{{ asset('js/main.js') }}"></script>
                    <button type="button" class="ml-2 mb-1 close" onClick="delTask('task{{ $task1->id }}', {{ $task1->id }})" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true" class="f">&times; </span>
                    </button>
                  </div>
                  <div class="card-body">
                      <p class="card-text">
                        <span class="font-weight-bold">Крайний срок:</span> {{ $task1->deadline }}
                        <br>
                        <span class="font-weight-bold">Постановщик:</span> {{ $user->find($task1->author_id)->real_name }} {{ $user->find($task1->author_id)->real_lastname }}
                        <br>
                        <span class="font-weight-bold">Ответственный:</span> {{ $user->find($task1->responsible_id)->real_name }} {{ $user->find($task1->responsible_id)->real_lastname }}
                      </p>
                  </div>
           <div class="btn-group w-100">
            <button onClick="goStatus('status1', 'task{{ $task1->id }}', 'status1task{{ $task1->id }}')" class="btn btn-sm btn-primary" role="button"  id='status1task{{ $task1->id }}' type="button"  disabled></button>
            <button onClick="goStatus('status2', 'task{{ $task1->id }}', 'status2task{{ $task1->id }}')" type="button" role="button" id='status2task{{ $task1->id }}'  class="btn btn-sm btn-warning"></button>
            <button onClick="goStatus('status3', 'task{{ $task1->id }}', 'status3task{{ $task1->id }}')" type="button" id='status3task{{ $task1->id }}' class="btn btn-sm btn-success"></button>
            <button onClick="goStatus('status4', 'task{{ $task1->id }}', 'status4task{{ $task1->id }}')" type="button" id='status4task{{ $task1->id }}' class="btn btn-sm btn-danger" role="button"></button>
            <button onClick="goStatus('status5', 'task{{ $task1->id }}', 'status5task{{ $task1->id }}')" type="button" id='status5task{{ $task1->id }}' class="btn btn-sm btn-secondary"></button>
          </div>  
          </div>                  
                @endforeach
                @else
                <div class="card  bg-light bg-primary mb-2 d-inline-block w-100 float-left">
                </div>
                @endif
              </td>
              
             <td class='w-25' id="status2">
              @if (count($tasks_status2) > 0)
               @foreach($tasks_status2 as $task2)
               <div class="card  bg-light mb-2 d-inline-block w-100" id="task{{ $task2->id }}">
                  <div class="toast-header"><strong class="mr-auto"><a href="#" onclick = "showTask({{ $task2->id }})" data-toggle="modal" data-target="#mainModal">{{ $task2->name }}</a></strong>
                    <a href="#" onclick = "editTask({{ $task2->id }})" data-toggle="modal" data-target="#mainModal"><small class="text-secondary"> (ред.)<!--  &#9998; --> </small> </a>
                    <script async="" src="{{ asset('js/main.js') }}"></script>
                    <button type="button" class="ml-2 mb-1 close" onClick="delTask('task{{ $task2->id }}', {{ $task2->id }})" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true" class="f">&times; </span>
                    </button>
                  </div>
                  <div class="card-body">
                      <p class="card-text">
                        <span class="font-weight-bold">Крайний срок:</span> {{ $task2->deadline }}
                        <br>
                        <span class="font-weight-bold">Постановщик:</span> {{ $user->find($task2->author_id)->real_name }} {{ $user->find($task2->author_id)->real_lastname }}
                        <br>
                        <span class="font-weight-bold">Ответственный:</span> {{ $user->find($task2->responsible_id)->real_name }} {{ $user->find($task2->responsible_id)->real_lastname }}
                      </p>
                  </div>
           <div class="btn-group w-100">
            <button onClick="goStatus('status1', 'task{{ $task2->id }}', 'status1task{{ $task2->id }}')" class="btn btn-sm btn-primary" role="button"  id='status1task{{ $task2->id }}' type="button" ></button>
            <button onClick="goStatus('status2', 'task{{ $task2->id }}', 'status2task{{ $task2->id }}')" type="button" role="button" id='status2task{{ $task2->id }}'  class="btn btn-sm btn-warning" disabled></button>
            <button onClick="goStatus('status3', 'task{{ $task2->id }}', 'status3task{{ $task2->id }}')" type="button" id='status3task{{ $task2->id }}' class="btn btn-sm btn-success"></button>
            <button onClick="goStatus('status4', 'task{{ $task2->id }}', 'status4task{{ $task2->id }}')" type="button" id='status4task{{ $task2->id }}' class="btn btn-sm btn-danger" role="button"></button> 
            <button onClick="goStatus('status5', 'task{{ $task2->id }}', 'status5task{{ $task2->id }}')" type="button" id='status5task{{ $task2->id }}' class="btn btn-sm btn-secondary"></button>
          </div>  
          </div>   
               
               @endforeach
                 @else
                <div class="card  bg-light bg-primary mb-2 d-inline-block w-100 float-left">
                </div>
                @endif
             </td>
              <td class='w-25' id="status3">
               @if (count($tasks_status3) > 0)
               @foreach($tasks_status3 as $task3)
               <div class="card  bg-light mb-2 d-inline-block w-100" id="task{{ $task3->id }}">
                  <div class="toast-header"><strong class="mr-auto"><a href="#" onclick = "showTask({{ $task3->id }})" data-toggle="modal" data-target="#mainModal">{{ $task3->name }}</a></strong>
                    <a href="#" onclick = "editTask({{ $task3->id }})" data-toggle="modal" data-target="#mainModal"><small class="text-secondary"> (ред.)<!--  &#9998; --> </small> </a>
                    <script async="" src="{{ asset('js/main.js') }}"></script>
                    <button type="button" class="ml-2 mb-1 close" onClick="delTask('task{{ $task3->id }}', {{ $task3->id }})" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true" class="f">&times; </span>
                    </button>
                  </div>
                  <div class="card-body">
                      <p class="card-text">
                        <span class="font-weight-bold">Крайний срок:</span> {{ $task3->deadline }}
                        <br>
                        <span class="font-weight-bold">Постановщик:</span> {{ $user->find($task3->author_id)->real_name }} {{ $user->find($task3->author_id)->real_lastname }}
                        <br>
                        <span class="font-weight-bold">Ответственный:</span> {{ $user->find($task3->responsible_id)->real_name }} {{ $user->find($task3->responsible_id)->real_lastname }}
                      </p>
                  </div>
           <div class="btn-group w-100">
            <button onClick="goStatus('status1', 'task{{ $task3->id }}', 'status1task{{ $task3->id }}')" class="btn btn-sm btn-primary" role="button"  id='status1task{{ $task3->id }}' type="button" ></button>
            <button onClick="goStatus('status2', 'task{{ $task3->id }}', 'status2task{{ $task3->id }}')" type="button" role="button" id='status2task{{ $task3->id }}'  class="btn btn-sm btn-warning"></button>
            <button onClick="goStatus('status3', 'task{{ $task3->id }}', 'status3task{{ $task3->id }}')" type="button" id='status3task{{ $task3->id }}' class="btn btn-sm btn-success" disabled></button>
            <button onClick="goStatus('status4', 'task{{ $task3->id }}', 'status4task{{ $task3->id }}')" type="button" id='status4task{{ $task3->id }}' class="btn btn-sm btn-danger" role="button"></button>
            <button onClick="goStatus('status5', 'task{{ $task3->id }}', 'status5task{{ $task3->id }}')" type="button" id='status5task{{ $task3->id }}' class="btn btn-sm btn-secondary"></button>
          </div>  
          </div>  
               @endforeach
               @else
                <div class="card  bg-light bg-primary mb-2 d-inline-block w-100 float-left">
                </div>
                @endif
             </td>
              <td class='w-25'id="status4">
              @if (count($tasks_status4) > 0)
               @foreach($tasks_status4 as $task4)
                <div class="card  bg-light mb-2 d-inline-block w-100" id="task{{ $task4->id }}">
                  <div class="toast-header"><strong class="mr-auto"><a href="#" onclick = "showTask({{ $task4->id }})" data-toggle="modal" data-target="#mainModal">{{ $task4->name }}</a></strong>
                    <a href="#" onclick = "editTask({{ $task4->id }})" data-toggle="modal" data-target="#mainModal"><small class="text-secondary"> (ред.)<!--  &#9998; --> </small> </a>
                    <script async="" src="{{ asset('js/main.js') }}"></script>
                    <button type="button" class="ml-2 mb-1 close" onClick="delTask('task{{ $task4->id }}', {{ $task4->id }})" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true" class="f">&times; </span>
                    </button>
                  </div>
                  <div class="card-body">
                      <p class="card-text">
                        <span class="font-weight-bold">Крайний срок:</span> {{ $task4->deadline }}
                        <br>
                        <span class="font-weight-bold">Постановщик:</span> {{ $user->find($task4->author_id)->real_name }} {{ $user->find($task4->author_id)->real_lastname }}
                        <br>
                        <span class="font-weight-bold">Ответственный:</span> {{ $user->find($task4->responsible_id)->real_name }} {{ $user->find($task4->responsible_id)->real_lastname }}
                      </p>
                  </div>
           <div class="btn-group w-100">
            <button onClick="goStatus('status1', 'task{{ $task4->id }}', 'status1task{{ $task4->id }}')" class="btn btn-sm btn-primary" role="button"  id='status1task{{ $task4->id }}' type="button" ></button>
            <button onClick="goStatus('status2', 'task{{ $task4->id }}', 'status2task{{ $task4->id }}')" type="button" role="button" id='status2task{{ $task4->id }}'  class="btn btn-sm btn-warning"></button>
            <button onClick="goStatus('status3', 'task{{ $task4->id }}', 'status3task{{ $task4->id }}')" type="button" id='status3task{{ $task4->id }}' class="btn btn-sm btn-success"></button>
            <button onClick="goStatus('status4', 'task{{ $task4->id }}', 'status4task{{ $task4->id }}')" type="button" id='status4task{{ $task4->id }}' class="btn btn-sm btn-danger" role="button" disabled></button>
            <button onClick="goStatus('status5', 'task{{ $task4->id }}', 'status5task{{ $task4->id }}')" type="button" id='status5task{{ $task4->id }}' class="btn btn-sm btn-secondary"></button>
          </div>  
          </div>  
               @endforeach
              @else
                <div class="card  bg-light bg-primary mb-2 d-inline-block w-100 float-left">
                </div>
                @endif
             </td>
            </tr>
            <tr>
              <td colspan="4" class="w-100 text-center"><h4>Отложено</h4></td>
            </tr>
            <tr>
               <td colspan="4" class="w-100 text-center" id="status5">
              @if (count($tasks_status5) > 0)
              @foreach($tasks_status5 as $task5)
             <div class="card  bg-light mb-2 d-inline-block w-100" id="task{{ $task5->id }}">
                  <div class="toast-header"><strong class="mr-auto"><a href="#" onclick = "showTask({{ $task5->id }})" data-toggle="modal" data-target="#mainModal">{{ $task5->name }}</a></strong>
                    <a href="#" onclick = "editTask({{ $task5->id }})" data-toggle="modal" data-target="#mainModal"><small class="text-secondary"> (ред.)<!--  &#9998; --> </small> </a>
                    <script async="" src="{{ asset('js/main.js') }}"></script>
                    <button type="button" class="ml-2 mb-1 close" onClick="delTask('task{{ $task5->id }}', {{ $task5->id }})" data-dismiss="toast" aria-label="Close">
                      <span aria-hidden="true" class="f">&times; </span>
                    </button>
                  </div>
                  <div class="card-body">
                      <p class="card-text">
                        <span class="font-weight-bold">Крайний срок:</span> {{ $task5->deadline }}
                        <br>
                        <span class="font-weight-bold">Постановщик:</span> {{ $user->find($task5->author_id)->real_name }} {{ $user->find($task5->author_id)->real_lastname }}
                        <br>
                        <span class="font-weight-bold">Ответственный:</span> {{ $user->find($task5->responsible_id)->real_name }} {{ $user->find($task5->responsible_id)->real_lastname }}
                      </p>
                  </div>
           <div class="btn-group w-100">
            <button onClick="goStatus('status1', 'task{{ $task5->id }}', 'status1task{{ $task5->id }}')" class="btn btn-sm btn-primary" role="button"  id='status1task{{ $task5->id }}' type="button" ></button>
            <button onClick="goStatus('status2', 'task{{ $task5->id }}', 'status2task{{ $task5->id }}')" type="button" role="button" id='status2task{{ $task5->id }}'  class="btn btn-sm btn-warning"></button>
            <button onClick="goStatus('status3', 'task{{ $task5->id }}', 'status3task{{ $task5->id }}')" type="button" id='status3task{{ $task5->id }}' class="btn btn-sm btn-success"></button>
            <button onClick="goStatus('status4', 'task{{ $task5->id }}', 'status4task{{ $task5->id }}')" type="button" id='status4task{{ $task5->id }}' class="btn btn-sm btn-danger" role="button" ></button>
            <button onClick="goStatus('status5', 'task{{ $task5->id }}', 'status5task{{ $task5->id }}')" type="button" id='status5task{{ $task5->id }}' class="btn btn-sm btn-secondary" disabled></button>
          </div>  
          </div>  
                
               @endforeach
                 
                @else
                <div class="card  bg-light bg-primary mb-2 d-inline-block w-25 float-left">
                </div>
                @endif
             </td> 
              
            </tr>
          </tbody>
        </table>
      </div>

    
    </main>
    @endsection