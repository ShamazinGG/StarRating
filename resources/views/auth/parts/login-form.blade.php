
<form method="post" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
        <input type="email" name="email" autofocus placeholder="Email"
               value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <input type="password" name="password" placeholder="Пароль">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Войти</button>


</form>

