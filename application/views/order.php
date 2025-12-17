<main class="flex-shrink-0">
<div class="container">
    
    <div class="order col-12 col-xl-4 mx-auto card p-4 mt-4 mb-4">
        <h2 class="text-center fw-light"><?= $product_name ?></h2>
        <form action="client/new_order" method="post">
            <input type="hidden" name="id_product" value="<?= $id_product ?>">
            <input type="hidden" name="price" value="<?= $price ?>">
            <div class="col mb-3">
                <label for="quantity" class="form-label">Количество роботов</label>
                <input type="number" class="form-control" name="quantity" required>
            </div>
            <div class="col mb-3">
                <label for="inn" class="form-label">ИНН</label>
                <input type="number" class="form-control" name="inn" required>
            </div>
            <div class="col mb-3">
                <label for="kpp" class="form-label">КПП</label>
                <input type="number" class="form-control" name="kpp" required>
            </div>
            <div class="col mb-3">
                <label for="payer" class="form-label">Плательщик</label>
                <input type="text" class="form-control" name="payer" required>
            </div>
            <div class="col mb-3">
                <label for="payer_bank" class="form-label">Банк плательщика</label>
                <input type="text" class="form-control" name="payer_bank" required>
            </div>
            <div class="col mb-3">
                <label for="beneficiary_bank" class="form-label">Банк получателя</label>
                <input type="text" class="form-control" name="beneficiary_bank" required>
            </div>
            <div class="col mb-3">
                <label for="account" class="form-label">Счет</label>
                <input type="number" class="form-control" name="account" required>
            </div>
            <div class="col mb-3">
                <label for="bik" class="form-label">БИК</label>
                <input type="number" class="form-control" name="bik" required>
            </div>
            <div class="col mb-3">
                <label for="account" class="form-label">Вид оплаты</label>
                <select name="type_pay" class="form-select" required>
                    <option value="Наличные">Наличные</option>
                    <option value="Безналичные">Безналичные</option>
                </select>
            </div>
            <div class="col mb-3">
                <label for="purpose_payment" class="form-label">Назначение платежа</label>
                <input type="text" class="form-control" name="purpose_payment" required>
            </div>
            <div class="row mx-auto">
            <button type="submit" class="btn btn-dark">Заказать</button>
            </div>
        </form>
    </div>
</div>
</main>