

@extends('layouts.treechart')
@section('main')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h3 class="display-4 text-center">Карта точек</h3>
         <script type="text/javascript">
            $(function () {
                var jsonStructureObject = [{
                    head: '<a href="{{route("companyHome", ['id' => $companyModel->id])}}">{{$companyModel->name}}</a>',
                    id: 'company',
                    contents: '<strong class="text-primary">{{count($companyModel->dots_tasks->where("status", 1))}} </strong>' +
                        '                  <strong class="text-warning"> {{count($companyModel->dots_tasks->where("status", 2))}}</strong>' +
                        '                   <strong class="text-success">{{count($companyModel->dots_tasks->where("status", 3))}} </strong>' +
                        '                    <strong class="text-danger">{{count($companyModel->dots_tasks->where("status", 4))}}</strong> ' +
                        '                   <strong class="text-dark">{{count($companyModel->dots_tasks->where("status", 5))}}</strong>'+
                        '                   <br>Дедлайн: <strong class="text-dark">{{count($companyModel->dots_tasks->where("deadline", '<', $now))}}</strong>'+
                        '                   {!! $arrowCompanyGlobal !!}'+
                        '                   {!! $arrowCompanyTactic !!}'
                    ,
                    children: [
                     {!! $allData !!}
                    ]

                }];

                $('#tree').jHTree({
                    callType: 'obj',
                    structureObj: jsonStructureObject
                });
            });
        </script>
        <style type="text/css">
            #themes {
                font-size: 1.2em;
            }
            #set {
                border: 2px solid #ddd;
                padding: 2px;
                background: #444;
                width: 350px;
                height: 30px;
            }
            #set a {
                margin: 2px;
                border: 1px solid #444;
                float: left;
            }
            #set a:hover {
                border-color: #fff;
            }
        </style>
        <div id="tree">
        </div>


    </main>
@endsection
