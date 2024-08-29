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
        max-height: 40px;
    }

    .teste2{
        max-width: 50px;
        max-height: 40px;
        margin-bottom: 5%;
        border-radius: 35px;
        border-color: black;
        text-align: center;
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
        position: relative;
        right: 20%;
        margin-top: 32%;
    }

    .update {
        position: relative;
        right: 80%;
        margin-top: 40%;
        color: blue;
        width: 10%;
        text-decoration: none;
    }

    #titulo{
        text-align: center;
        font-size: 200%;
        margin-bottom: 2%
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
        margin-bottom: -2%;
    }

    .descricao {
        position: relative;
        left: 5%;
        text-decoration: none;
    }

    #login{
        margin-left: 8%;
        width: 40%
    }

    #registrarse{
        margin-left: 15%;
        text-decoration: underline;
    }

    #registrar {
        width: 40%;
        margin-left: 29%;
        margin-bottom: -3%;
    }

    #sair{
        color: whitesmoke;
        text-decoration: none;
        width: 3%;
    } 

    #salvar{
        margin-left: 40%;
        margin-top: 4%;
        margin-bottom: -4%;
        width: 20%;
    }

    #botao2 {
        margin-top: 4%;
        margin-bottom: -4%;
    }

    #label {
        border-color:rgba(180, 181, 187, 0.589);
}
    #deleteimage {
        display:flex;
        color: red;
        justify-content: center;
        width: 100%;
        margin-top: 5%;
        margin-bottom: -3%;
        text-decoration: none;
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
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            @auth
            <a id="sair" href="{{ route('series.index')}}">Home</a>

            <form id="sair" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                @method('POST')
                <button type="submit" id="sair">Sair</button>
            </form>
            @endauth

            @guest
            <a id="sair" href="{{ route('login')}}">Entrar</a>
            @endguest
        </div>
    </nav>
    <div class="container">
        <div class="conteudo">

                    <h1 id="titulo">{{$title}}</h1>

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