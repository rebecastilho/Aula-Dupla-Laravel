<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Meu Título</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h2>Clientes</h2>
    <table border=1>
        <tr>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th colspan="2">Ações</th>
        </tr>
        
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->data_nascimento}}</td>
        </tr>
        @endforeach       
    <button><a href="{{url('/cliente/form')}}">Novo</a></button>
</body>
</html>