<style>
    .body {
        background-color:#5219;
        margin-bottom: 35%;
    }
    
    .conteudo{
        border: 2px solid #333;
        border-radius: 15px;
        border-color: black;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); /* Adiciona a sombra */
        background-color: white;
        margin: 0 auto;
        max-width: 600px;
        padding: 20px;
    }

    .escrita {
        position: relative; 
        padding: 3%;
    }

    .teste{
        margin-bottom: 5%;
    }

    .teste3 {
        margin-top: -1%;
        margin-bottom: 5%;
        border-radius: 5px;
        border-color: black;   
    }

    .teste2{
        max-width: 50px;
        margin-bottom: 5%;
        border-radius: 5px;
        border-color: black;
    }

    .botao {
        background-color: white;
        display: flex;
        margin-left: 25%;
        justify-content: center;
        border: 2px solid #333;
        border-radius: 15px;
        border-color: black;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); /* Adiciona a sombra */
        padding: 7px; /* Adiciona espaçamento interno */
        font-size: 16px; /* Ajusta o tamanho da fonte */
        color: inherit; /* Herda a cor do elemento pai */
        text-decoration: none; /* Remove o sublinhado */
        width: 50%;
        transition: 0.3s ; /* Transição suave para a sombra */
    }

    .botao:hover {
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.8); /* Adiciona a sombra ao passar o mouse */
    }

    .container{
        position: relative;
        top: 25%;
    }

    .X{
        position: absolute; 
        right: 2%;
        top: 11%;
    }

    .update {
        position: absolute; 
        right: 5%;
        top: 22%;
        color: blue;
        width: 10%;
        text-decoration: none;

    }

    .titulo{
        text-align: center;
        justify-content: center;
    }

    .alert-success {
        position: relative; 
        margin-bottom: 4%;
        margin-top: -3%;
        justify-content: center;
        color: green;
        text-align: center;

    }

    .warning {
        color: red;
    }

    .descricao {
        text-decoration: none;
    }

    #formularioep{
        text-align: center;
        margin-bottom: -3%;
    }

</style>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} - Controle de Séries </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="body">
    <div class="container">
        <div class="conteudo">

                    <h1 class="titulo">{{$title}}</h1>

                    @if ($errors->any())
                    <div class="warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <div class="escrita">

                    {{$slot}}
            </div>
        </div>
    </div>
</body>
</html>