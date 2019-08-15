<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Meu Título</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<button><a href="{{url('/vendedor/create')}}">Novo</a></button>
   
    <h2>Vendedores Ativos</h2>
    <table border=1>
        <tr>
            <th>Nome</th>
            <th>Salario</th>
            <th>Cliente</th>
            <th colspan="2">Ações</th>
        </tr>
        
        @foreach($vendedores as $vendedor)
        <tr>
            <td>{{$vendedor->nome}}</td>
            <td>{{$vendedor->salario}}</td>
            <td>{{$vendedor->cliente_id}}</td>
            <td><button><a href="{{url('/vendedor/'. $vendedor->id . '/edit')}}">Editar</a></button></td>
            <td>
                <form method="POST" action="{{url('vendedor/' . $vendedor->id)}}">
                        @method('delete')
                        @csrf
                        <button type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach  
</table>
    <br>
        <h2>Vendedores Inativos</h2>
    <table border=1>
        <tr>
            <th>Nome</th>
            <th>Salario</th>
            <th>Cliente</th>
            <th colspan="2">Ações</th>
        </tr>
        
        @foreach($vendedoresInativos as $vendedor)
        <tr>
            <td>{{$vendedor->nome}}</td>
            <td>{{$vendedor->salario}}</td>
            <td>{{$vendedor->cliente_id}}</td>
            <td>
                <form method="POST" action="{{url('vendedor/restore/' . $vendedor->id)}}">
                        @method('put')
                        @csrf
                        <button type="submit">Restaurar</button>
                </form>
            </td>
        </tr>
        @endforeach       
</table>
    
</body>
</html>