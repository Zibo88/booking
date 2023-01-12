@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-cols-sm-1  row-cols-md-2 d-flex justify-content-center">
            <div class="col">
                <div class="card">
                    <h3>{{$package->title}}</h3>
                    <p>{{$package->description}}</p>
                    <div>Data di partenza: {{$package->departure->format('d-m-Y H:m')}}</div> 
                    <div>Data di ritorno: {{$package->return->format('d-m-Y H:m')}}</div>
                    <div>Prezzo p.p.: {{$package->price}}</div>
                    <div>Formula: {{$package->typology->name}}</div> 
                    <div>Alloggio: {{$package->apartment->name}} </div>

                    <div>Autore dell'articolo: {{$package->user->name}} {{$package->user->lastname}}</div> 


                    <div>Raggiungere l'alloggio</div>
                    <div>{{$package->apartment->city}}, {{$package->apartment->address}}, {{$package->apartment->country}}</div>
                    <div>
                        <a href="{{route('admin.packages.edit' , ['package' => $package->id])}}">
                            <input type="button" value="Modifica prodotto" class="btn btn-secondary" >
                        </a>
                        <form action="{{route('admin.packages.destroy' , ['package' => $package->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Cancella Pacchetto" class="btn btn-danger" onclick="return confirm('vuoi davvero cancellare la task {{$package->title}}')">
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection 