<x-layout title="Novo Usuário">
    <form method="post">
        @csrf

        <div class="form group">
            <label for="name" class="form-label">Nome</label>
            <input id="label" type="text" name="name" id="name" class="form-control">
        </div>

        <br>

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

        <button id="registrar" class="btn btn-primary mt-3">
            Registrar
        </button>

        </a>
    </form>
</x-layout>