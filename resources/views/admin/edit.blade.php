@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('admin.packages.update', ['package' => $package->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Titolo del pacchetto</label>
                        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" placeholder="inserisci il titolo" value="{{old ('title', $package->title )}}">
                        @error('title')
	                        <div class="alert alert-danger my-2">{{ 'Il campo "Titolo" è obblgatorio'}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Descrizione</label>
                        <textarea  class="form-control" name="description" id="description" cols="50" rows="10">{{old ('description', $package->description )}}</textarea>
                        @error('description')
                            <div class="alert alert-danger my-2">{{ 'Il campo "Descrizione" è obblgatorio'}}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-5" style="padding: 0">
                        <label for="user_id">Autore</label> <br>
                        <select  name="user_id" id="user_id"  class="custom-select custom-select-lg mb-3">
                            <option>Nessun autore selezionato</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}" {{old('user_id', $package->user ? $package->user->id : "")  == $user->id ? 'selected' : ''}}>{{$user->name}} {{$user->lastname}}</option>
                            @endforeach  
                        </select>
                    </div>

                    <div class="d-flex justify-content-between" >
                        <div class="form-group col-md-5" style="padding: 0">
                            <label for="typology_id">Formula</label> <br>
                            <select  name="typology_id" id="typology_id"  class="custom-select custom-select-lg mb-3">
                                <option>Nessuna formula selezionata</option>
                                @foreach ($typologies as $typology)
                                    <option value="{{$typology->id}}" {{old("typology_id", $package->typology ? $package->typology->id : "") == $typology->id ? 'selected' : '' }}>{{$typology->name}}</option>
                                @endforeach  
                            </select>
                        </div>
    
                        <div class="form-group col-md-5 " style="padding: 0">
                            <label for="apartment_id">Alloggio</label> <br>
                            <select  name="apartment_id" id="apartment_id"  class="custom-select custom-select-lg mb-3">
                                <option>Nessuna allogio selezionata</option>
                                @foreach ($apartments as $apartment)
                                    <option value="{{$apartment->id}}" {{old('apartment_id' , $package->apartment ? $package->apartment->id : "") == $apartment->id ? 'selected' : ''}}>{{$apartment->name}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                  
                   
                    <div class="d-flex  justify-content-between">
                        <div class="form-group col-md-5" style="padding: 0">
                            <label for="departure">Data di partenza</label>
                            <input type="date" class="form-control" id="departure" aria-describedby="emailHelp" name="departure" value="{{old ('departure', $package->departure->toDateString())}}">
                            @error('departure')
                                <div class="alert alert-danger my-2">{{ 'Il campo "Data di partenza" è obblgatorio'}}</div>
                            @enderror
                        </div>
    
                        <div class="form-group col-md-5" style="padding: 0">
                            <label for="return">Data di ritorno</label>
                            <input type="date" class="form-control" id="return" aria-describedby="emailHelp" name="return" value="{{old ('return', $package->return->toDateString() )}}">
                            @error('return')
                                <div class="alert alert-danger my-2">{{ 'Il campo "Data di ritorno" è obblgatorio'}}</div>
                            @enderror
                        </div>
                    </div>
                   
                    <div class="form-group col-md-5" style="padding: 0">
                        <label for="price">Prezzo p.p.</label>
                        <input type="number" class="form-control" id="price" aria-describedby="emailHelp" name="price" min="0" max="99999" value="{{old ('price', $package->price )}}">
                        @error('price')
                            <div class="alert alert-danger my-2">{{ 'Il campo "Prezzo" è obblgatorio'}}</div>
                        @enderror
                    </div>
                    

                    {{-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
                    <input type="submit" class="btn btn-primary" value="Salva">
                </form>
            </div>
        </div>
    </div>
@endsection