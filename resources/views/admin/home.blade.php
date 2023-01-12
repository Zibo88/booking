@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h4>Benvenuto nella tua dashboard </h4> 
                <div>Utente: {{$user->name}} {{$user->lastname}}</div>
                <div>Email utente: {{$user->email}}</div>
               
            </div>
        </div>
    </div>    
@endsection