<main class="flex-shrink-0">
<div class="container">
    <div class="autho col-12 col-xl-4 mx-auto card p-4 mt-4">
        <h2 class="text-center fw-light">Регистрация</h2>
        <form action="main/new_acc" method="post">
            <div class="col mb-3">
                <label for="first_name" class="form-label">Ваше имя</label>
                <input type="text" class="form-control" name="first_name" placeholder="Введите ваше имя" required>
            </div>
            <div class="col mb-3">
                <label for="email" class="form-label">Ваш E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="Введите ваш E-mail" required>
            </div>
            <div class="col mb-3">
                <label for="login" class="form-label">Логин</label>
                <input type="text" class="form-control" name="login" placeholder="Введите логин" required>
            </div>
            <div class="col mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password" placeholder="Введите пароль" required>
            </div>
            <div class="row mx-auto">
            <button type="submit" class="btn btn-dark">Создать</button>
            </div>
        </form>
    </div>
</div>
</main>