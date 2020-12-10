<div class="text-center mb-2">
    <h3>Добро пожаловать на страницу регистрации</h3>
</div>

<form method="post" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <input type="email" name="register_email"
               class="form-control" placeholder="Email"
               value="{{ old('register_email') }}"
               autofocus>
    </div>

    <div class="form-group">
        <input type="text"
               name="register_login"
               class="form-control" placeholder="Логин"
               value="{{ old('register_login') }}">
    </div>

    <div class="form-group">
        <input type="password"
               name="register_password"
               class="form-control" placeholder="Пароль">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>

</form>
