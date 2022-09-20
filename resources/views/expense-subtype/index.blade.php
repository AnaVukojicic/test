@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6"><span>Podtipovi troskova</span></div>
                            <div class="col-6">
                                <a href="{{route('expense-subtype.create')}}" class="btn btn-outline-primary float-end">+</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tip</th>
                                <th>Naziv</th>
                                <th>Detalji</th>
                                <th>Izmjena</th>
                                <th>Brisanje</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subtypes as $subtype)
                                <tr>
                                    <td>{{$subtype->id}}</td>
                                    <td>{{$subtype->expense_type->name}}</td>
                                    <td>{{$subtype->name}}</td>
                                    <td>...</td>
                                    <td><a href="{{route('expense-subtype.edit',['expense_subtype'=>$subtype->id])}}">Izmjena</a></td>
                                    <td>
                                        <form id="deleteForm{{$subtype->id}}" action="{{route('expense-subtype.destroy',['expense_subtype'=>$subtype->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-outline-danger" onclick="deleteSubype({{$subtype->id}})">X</a>
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
        function deleteSubype(id){
            if(confirm('Da li ste sigurni?')){
                document.getElementById('deleteForm'+id).submit();
            }
        }
    </script>
@endsection
