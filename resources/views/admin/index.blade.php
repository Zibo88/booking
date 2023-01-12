@extends('layouts.app')

@section('content')
    <div class="container">
        @if($show_deleted_message === 'yes')
        <div class="alert alert-success" role="alert">
                Pacchetto eliminato con successo
            </div>
        @endif

        @if ($user->role === 'admin')
            <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-3">
                @foreach ($packages as $package)
                <div class="col">
                    <div class="card my-2">
                        <h5>{{ substr($package->title, 0, 40)}}</h5>
                        <div>Data di partenza: {{$package->departure->format('d-m-Y H:m')}}</div> 
                        <div>Data di ritorno: {{$package->return->format('d-m-Y H:m')}}</div>
                        <div>Prezzo: {{$package->price}}</div>
                        <div>
                             <a href="{{route('admin.packages.show' , ['package' => $package->id])}}">
                                 <input type="button" value="maggiori info" class="btn btn-primary" >
                             </a>
                             <a href="{{route('admin.packages.edit' , ['package' => $package->id])}}">
                                 <input type="button" value="Modifica prodotto" class="btn btn-secondary" >
                             </a>
                         
                             <form action="{{route('admin.packages.destroy' , ['package' => $package->id])}}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <input type="submit" value="Cancella Pacchetto" class="btn btn-danger"  onclick="return confirm('vuoi davvero cancellare il pacchetto: {{$package->title}}')">
                             </form>
                        </div>
                    </div>
                </div>
          
                @endforeach
            </div>
        @endif


        @if($user->role === 'employee' && count($employee_package) >=1)
        <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg 3">
            @foreach ($packages as $package)
            @if($user->id === $package->user_id)
            <div class="col">
               
                <div class="card my-2">
                   
                    <h5>{{ substr($package->title, 0, 40)}}</h5>
                    <div>Data di partenza: {{$package->departure->format('d-m-Y H:m')}}</div> 
                    <div>Data di ritorno: {{$package->return->format('d-m-Y H:m')}}</div>
                    <div>Prezzo: {{$package->price}}</div>
                    <div>
                        <a href="{{route('admin.packages.show' , ['package' => $package->id])}}">
                            <input type="button" value="maggiori info" class="btn btn-primary " >
                        </a>
                         
                        <a href="{{route('admin.packages.edit' , ['package' => $package->id])}}">
                             <input type="button" value="Modifica prodotto" class="btn btn-secondary" >
                        </a>

                    </div>
                </div>
            </div>
            @endif
            
          
            @endforeach
        </div>
        @elseif($user->role === 'employee' && count($employee_package) <= 0)
                    
        <h3>Nessun pacchetto ancora creato</h3>
        
        @endif  
        {{ $packages->links() }}
    </div>

   
@endsection