<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Búsqueda de Pokemones</title>
    <meta name="description" content="Sitio de búsqueda de Pokemones">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-2">
                   Pokemon Finder 
                </h1>
                <h4 class="my-2 text-secondary">
                    El que quiere pokemons, que los busque
                </h4>
            </div>
        </div>
        <div class="row">
            <form id="form" class="col-12" action="">
                <div class="row">
                    <div class="col-7">
                        <input type="text" id="query" name="query" class="form-control m-1 @error('query') is-invalid @enderror" placeholder="Ingresá el nombre del pokemon que buscás">
                            @error('query')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            <p class="text-xs" id="error"></p>
                    </div>
                   
                    <div class="col-4 my-1">
                        <input type="submit" id="submit" value="Buscar" class="btn btn-success">
                    </div>
                   
                    
                </div>
               
                
               
            </form>
             
        </div>
        <div class="row">
            <h4 class="col-12 mt-4">Resultados de la búsqueda</h4>
        </div>

        <div class="row justify-content-start">
        @forelse($somePoke as $pokemon)
            <div class="col-2 my-4 mx-1 p-1 text-center">
                <h5 class="text-center">{{ucwords(str_replace('-', ' ',$pokemon["name"]))}}</h5>
                @if(isset($pokemon["sprites"]["front_default"]))
                <img class="col-10 p-0 border bg-white" src="{{$pokemon["sprites"]["front_default"]}}" alt="Imagen de {{$pokemon["name"]}}">
                @else
                <p class="col-12 my-2 text-center text-secondary">No hay imagen para este pokemon</p>
                @endif
            </div>
        @empty
            <h6 class="col-10 mt-4 mx-4">No se encontraron resultados para tu busqueda</h6>
        @endforelse
        </div>
       
        <footer>
            <div class="row border-top justify-content-between">
                <div class="col-6 my-4">
                    Hecho por Santiago Ibarzabal
                </div>
                <div class="col-4 my-4">
                    <a href="https://github.com/santiagoibarzabal/poketest" class="btn btn-success">
                        Link a mi repositorio
                    </a>
                </div>
            </div>
        </footer>
        
    </div>

<script>
    let query = document.getElementById("query");
    let form = document.getElementById("form");
    let error = document.getElementById("error");
    
    form.onsubmit = function(event){
        if(query.value.length < 3 || query.value.length > 20){
            error.innerHTML = 'El texto de búsqueda debe ser mayor a 3 caracteres y menor que 20 caracteres';
            event.preventDefault();
        }
    }
    
</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>