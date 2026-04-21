@csrf

<div class="card card-outline card-primary shadow-sm mb-4">
    <div class="card-body">
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="name" class="form-label">Nome do usuário</label>
                <input value="{{ old('name',@$usuario->name) }}" type="input" class="form-control" name="name" id="name" placeholder="Digite o nome">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input value="{{ old('email',@$usuario->email) }}" type="email" class="form-control" name="email" id="email" placeholder="Digite o e-mail">
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="password" class="form-label">Senha</label>
                <input value="{{ old('password') }}" type="password" class="form-control" name="password" id="password" placeholder="Digite a senha">
            </div>
            <div class="col-md-6">
                <label for="password_confirmation" class="form-label">Confirmação de Senha</label>
                <input value="{{ old('password_confirmation') }}" type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirme a senha">
            </div>
        </div>

        <div class="d-flex justify-content-start">
            <button class="btn btn-primary" type="submit">Salvar</button>
        </div>
    </div>
</div>
