<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <form method="POST" action="{{url('/cliente')}}">

    @if(isset($cliente))
        @method('PUT')
    @endif

    <!-- CRIANDO => URL('/')
        ATUALIZANDO => URL('/{id}') -->

        @csrf

        <label for="nome">Nome</label>
        <input value="{{old('nome', isset($cliente) ? $cliente->nome : '')}}" type="text" name="nome" id="nome"><br>
        <br><br>

        <label for="nome">Data Nascimento</label>
        <input value="{{old('data_nascimento', isset($cliente) ? $cliente->data_nascimento : '')}}" type="text" name="data_nascimento" id="data_nascimento"><br>
        <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>