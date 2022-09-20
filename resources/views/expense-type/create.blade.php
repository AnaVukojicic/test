@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodavanje novog tipa troska</div>

                    <div class="card-body table-responsive">
                        <form action="{{route('expense-type.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="name" class="form-control" placeholder="Unesite naziv...">
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-success col-12">Sacuvaj</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
