@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">Tipovi troskova koje pratim:</div>
                    </div>

                    <div class="card-body">
                        @foreach($types as $type)
                            <form method="POST" action="{{route('expense-type.attach-detach',['expense_type'=>$type->id])}}" id="attach-detach-form-{{$type->id}}">
                                @csrf
                                <div class="row">
                                    <div class="col-1">
                                        <input type="checkbox" id="typechk-{{$type->id}}" onchange="addRemoveType({{$type->id}})" @if(auth()->user()->hasExpenseType($type->id)) checked @endif>
                                    </div>
                                    <div class="col-11">
                                        <label for="typechk-{{$type->id}}">{{$type->name}}</label>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('additional_scripts')
    <script>
        function addRemoveType(typeId){
            document.getElementById('attach-detach-form-'+typeId).submit();
        }
    </script>
@endsection
