<main>
    <div class="container"><br>
        <div class="row">
<h3 class="text-center">Анализа продаж и средних цен  торгового предприятия</h3><br>
<div class="card">
    <h3 class="text-center">Данные о продажах за период </h3><br>
    <table class="table">
  <thead class="table-dark">
   <tr>
      <th scope="col">№_п/п</th>
      <th scope="col">Наименование робототехники</th>
      <th scope="col">Розн.цена</th>
      <th scope="col">Сумма продаж</th>
      <th scope="col">Кол-во</th>
    </tr>
  </thead>
  <tbody>
   <?php
  foreach($orders as $row){
          echo '    <tr>
                <th>'.$row['id_product'].'</th>
                <td>'.$row['product_name'].'</td>
                <td>'.$row['price'].' руб.</td>
                <td>'.$row['SUM(orders.sum)'].' руб.</td>
                <td>'.$row['COUNT(orders.id_order)'].'</td>
           </tr>';
    }
   ?>
  </tbody>
</table>
</div>
<h3 class="text-center"></h3>
        </div>
    </div>
</main>