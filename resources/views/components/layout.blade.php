<style>
    .body 
    {
        background-image: url('{{ asset('images/netflix.gif') }}');
        background-size: cover; /* Faz com que a imagem cubra toda a tela */
        background-position: center; /* Centraliza a imagem */
        background-repeat: no-repeat; /* Não repete a imagem */
        margin-bottom: 15%;
    }
    
    .conteudo{
        border: 2px solid #333;
        border-radius: 15px;
        border-color: black;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); /* Adiciona a sombra */
        background-color: white;
        margin: 0 auto;
        max-width: 900px;
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
        margin-left: 30%;
        justify-content: center;
        border: 2px solid #333;
        border-radius: 15px;
        border-color: black;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); /* Adiciona a sombra */
        padding: 7px; /* Adiciona espaçamento interno */
        font-size: 16px; /* Ajusta o tamanho da fonte */
        color: inherit; /* Herda a cor do elemento pai */
        text-decoration: none; /* Remove o sublinhado */
        width: 40%;
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

    #voltar {
        position: absolute;
        font-size: 200%;
        top: 2%;
    }

    .search {
        display:flex;
        justify-content: center;
    }

    #pesquisar {
        border-radius: 5px;
        border-color: rgb(104, 100, 100);
        margin-right: 3%;
    }

    .carrossel {
    position: relative;
    max-width: 100%;
    margin: auto;
    overflow: hidden;
    }

    .slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .episode-item {
        display: flex;
        flex-direction: column;
        margin-right: 5%;
        flex: 0 0 auto; /* Faz com que os itens não se redimensionem */
        width: 30%; /* Ajuste a largura conforme o número de itens que deseja mostrar por vez */
        box-sizing: border-box;
        text-align: center;
        justify-content: center;

    }

    .episode-item img {
        display: flex;
        width: 80%;
        justify-content: center;
        height: auto;
        width: auto;
        max-height: 250px; /* Define uma altura máxima para a imagem */
    }

    .prev, .next {
        position: absolute;
        top: 63%;
        transform: translateY(-50%);
        color: rgb(121, 113, 113);
        border: none;
        cursor: pointer;
        z-index: 1;
    }

    .next {
        right: 47;
    }

    #temp{
        border-radius: 10px;
    }

    .centralizar {
        position: relative;
        align-items: center;
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
            <br>
            @php
                $currentUrl = request()->path();
                $history = session('user_history', []);
                $previousUrl = array_shift($history); // Remove a última URL do histórico e a usa para redirecionar
                session(['user_history' => $history]); // Atualiza o histórico na sessão
            @endphp


            @unless($currentUrl == 'series' || $currentUrl == 'login')
                <button onclick="window.history.back();" title="Voltar">
                    <i id="voltar">←</i>
                </button>
            @endunless
            
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