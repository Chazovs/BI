

@extends('layouts.treechart')
@section('main')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         <script type="text/javascript">
            $(function () {
                var jsonStructureObject = [{
                    head: '{{$companyModel->name}}',
                    id: '{{$companyModel->id}}',
                    contents: '123456789012345678901234567890',
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
