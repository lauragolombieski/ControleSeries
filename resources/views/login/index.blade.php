<x-layout title="Login">
    <form method="post">
        @csrf
        <div class="form group">
            <label for="email" class="form-label">E-mail</label>
            <input id="label" type="email" name="email" id="email" class="form-control">
        </div>

        <br>

        <div class="form group">
            <label for="password" class="form-label">Senha</label>
            <input id="label" type="password" name="password" id="password" class="form-control">
        </div>

        <br>

        <button id="login" class="btn btn-primary mt-3">
            Entrar
        </button>

        <a id="registrarse" href="{{ route('register') }}" class="btn bnt-secondary mt-3">
            Registrar-se
        </a>
    </form>
</x-layout>