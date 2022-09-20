@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodavanje novog podtipa troska</div>

                    <div class="card-body table-responsive">
                        <form action="{{route('expense-subtype.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="name" class="form-control" placeholder="Unesite naziv...">
                                </div>
                                <div class="col-6">
                                    <select name="expense_type_id" class="form-control">
                                        <option value="">Odaberite tip troska</option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 float-end">
                                    <button class="btn btn-success">Sacuvaj</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
