<main class="flex-shrink-0">
<div class="container">
    <h2 class="text-center fw-light mt-4">Робототехника</h2>
    <h2 class="text-center fw-bold mt-4">Все товары</h2>
    <div class="catalog mt-4 mb-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    foreach($products as $row){
        echo '<div class="col">
        <div class="card h-100">
        <img src="'.$row['product_photo'].'" class="card-img-top" alt="'.$row['product_name'].'">
        <div class="card-body">
            <h5 class="card-title">'.$row['product_name'].'</h5>
            <p class="card-text">Цена: <b>'.$row['price'].' руб.</b></p>
            <p class="card-text">Тип робота: <b>'.$row['robot_type'].'</b></p>
            <p class="card-text">Вес: <b>'.$row['weight'].' '.$row['measure'].'</b></p>
            <p class="card-text">Упаковка: <b>'.$row['packaging_type'].'</b></p>
            <p class="card-text">Срок эксплуатации: <b>'.$row['service_life'].' год.</b></p>
        </div>
        <div class="card-footer">
            <p class="card-text">'.$row['description'].'</p>
        </div>
        <div class="card-footer">
            <a href="client/order?id_product='.$row['id_product'].'&product_name='.$row['product_name'].'&price='.$row['price'].'" class="btn btn-dark">Заказать</a>
        </div>
        </div>
    </div>
    ';
    }
    ?>
    </div>
    </div>
</div>
</main>