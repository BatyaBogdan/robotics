<main class="flex-shrink-0">
<div class="container">
    <div class="autho col-12 col-xl-4 mx-auto card p-4 mt-4">
        <h2 class="text-center fw-light">Авторизация</h2>
        <form action="main/auth" method="post">
            <div class="col mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" name="login" placeholder="Введите логин" required>
            </div>
            <div class="col mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" placeholder="Введите пароль" required>
            </div>
            <div class="row mx-auto">
            <button type="submit" class="btn btn-dark">Войти</button>
            </div>
        </form>
    </div>
</div>
</main>