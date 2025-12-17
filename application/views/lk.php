<main class="flex-shrink-0">
<div class="container">
    <h2 class="text-center mt-4 mb-4">Добро пожаловать, <?= $this->session->userdata('first_name'); ?>!</h2>
    <table class="table table-dark table-striped">
        <tr>
            <th>№</th>
            <th>Продукт</th>
            <th>Тип робота</th>
            <th>Количество</th>
            <th>Дата заказа</th>
            <th>Дата оплаты</th>
            <th>Тип оплаты</th>
            <th>Сумма</th>
            <th>Статус</th>
            <th>Действие</th>
        </tr>
        <form action="" method="post">

        </form>
        <?php
        foreach($orders as $row){
            if($row['status'] == 1){
                $row['status'] = 'Новая заявка';
            }
            else if($row['status'] == 2) {
                $row['status'] = 'Заявка выполняется';
            }
            else {
                $row['status'] = 'Заявка завершена';
            }
            if($row['date_pay'] == NULL){
                $edit = '<form action="client/pay" method="post"><input type="hidden" name="id_order" value="'.$row['id_order'].'"><button type="submit" class="btn btn-light">Оплатить</button></form>';
            }
            else {
                $edit = '';
            }
            echo '<tr><td>'.$row['id_order'].'</td>
            <td>'.$row['product_name'].'</td>
            <td>'.$row['robot_type'].'</td>
            <td>'.$row['quantity'].'</td>
            <td>'.$row['order_date'].'</td>
            <td>'.$row['date_pay'].'</td>
            <td>'.$row['type_pay'].'</td>
            <td>'.$row['sum'].' руб.</td>
            <td>'.$row['status'].'</td>
            <td>'.$edit.'</td>
            </tr>';
        }
        ?>
    </table>
</div>
</main>