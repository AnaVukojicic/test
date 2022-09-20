@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><span>Tipovi troskova</span></div>
                            <div class="col-6">
                                <a href="{{route('expense-type.create')}}" class="btn btn-outline-primary float-end">+</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Naziv</th>
                                    <th>Detalji</th>
                                    <th>Izmjena</th>
                                    <th>Brisanje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($types as $type)
                                    <tr>
                                        <td>{{$type->id}}</td>
                                        <td>{{$type->name}}</td>
                                        <td>...</td>
                                        <td><a href="{{route('expense-type.edit',['expense_type'=>$type->id])}}">Izmjena</a></td>
                                        <td>
                                            <form id="deleteForm{{$type->id}}" action="{{route('expense-type.destroy',['expense_type'=>$type->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-sm btn-outline-danger" onclick="deleteType({{$type->id}})">X</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('additional_scripts')
    <script>
        function deleteType(id){
            if(confirm('Da li ste sigurni?')){
                document.getElementById('deleteForm'+id).submit();
            }
        }
    </script>
@endsection
