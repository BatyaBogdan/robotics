<main class="flex-shrink-0">
<div class="container">
    <h2 class="text-center mt-4 mb-4">Добро пожаловать, <?= $this->session->userdata('first_name'); ?>!</h2>
    <table class="table table-dark table-striped">
        <tr>
            <th>№</th>
            <th>Имя</th>
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
        <?php
        foreach($orders as $row){
            if($row['status'] == 1){
                $row['status'] = 'Новая заявка';
                $edit = '<form action="manager/accept" method="post"><input type="hidden" name="id_order" value="'.$row['id_order'].'"><button type="submit" class="btn btn-light">Принять</button></form>';
            }
            else if($row['status'] == 2) {
                $row['status'] = 'Заявка выполняется';
                $edit = '<form action="manager/end" method="post"><input type="hidden" name="id_order" value="'.$row['id_order'].'"><button type="submit" class="btn btn-light">Завершить</button></form>';
            }
            else {
                $row['status'] = 'Заявка завершена';
                $edit = '';
            }
            echo '<tr><td>'.$row['id_order'].'</td>
            <td>'.$row['first_name'].'</td>
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