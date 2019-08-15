<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <form method="POST" action="{{url( isset($vendedor) ? '/vendedor/' . $vendedor->id : '/vendedor')}}">

    @if(isset($vendedor))
        @method('PUT')
    @endif

    <!-- CRIANDO => URL('/')
        ATUALIZANDO => URL('/{id}') -->

        @csrf

        <label for="nome">Nome</label>
        <input value="{{old('nome', isset($vendedor) ? $vendedor->nome : '')}}" type="text" name="nome" id="nome"><br>
        <br><br>
        {{$errors->first('nome')}}
        <br>

        <label for="salario">Salário</label>
        <input value="{{old('salario', isset($vendedor) ? $vendedor->salario : '')}}" type="text" name="salario" id="salario"><br>
        <br><br>
        {{$errors->first('salario')}}
        <br>
        
        <select name="cliente_id">
            @foreach($clientes as $cliente)
                <option {{isset($cliente) && $cliente->cliente_id == $cliente->id ? 'selected' : ''}} value="{{$cliente->id}}">{{$cliente->nome}}</option>
            @endforeach
        </select>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>