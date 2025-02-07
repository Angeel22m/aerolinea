<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipos de Asientos</title>
</head>
<body>
    <div class="container">        
    <h1>Mantenimiento Asientos</h1>
    <br>
    <a class="btn btn-success" href="{{route('agregar.asiento')}}">Agregar Nuevo</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Id Tipo Asiento</th>
                <th>Descripci&oacute;n</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipoAsientos as $tipoAsiento)
            
            <tr>
                @if ($tipoAsiento->estado == 'A')
                <td>{{$tipoAsiento->idTipoAsiento}}</td>
                <td>{{$tipoAsiento->descripcion}}</td>
                <td>{{$tipoAsiento->precio}}</td>
                <td>{{$tipoAsiento->estado}}</td>
               
             
                <td>
                    <a href="{{route('editar.asiento',$tipoAsiento->idTipoAsiento)}}">Editar</a>
                </td>
                <td>
                    <a href="{{route('eliminar.asiento',$tipoAsiento->idTipoAsiento)}}">Eliminar</a>
                </td>
                @endif
            </tr>    


            @endforeach
            
            
        </tbody>

    </table>
    </div>
</body>
</html>
