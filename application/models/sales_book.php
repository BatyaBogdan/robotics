<main class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>Книга продаж</h1>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Наименование робототехники</th>
                            <th scope="col">Дата и номер счета-фактуры продавца</th>
                            <th scope="col">Наименование покупателя</th>
                            <th scope="col">ИНН покупателя</th>
                            <th scope="col">КПП покупателя</th>
                            <th scope="col">Дата оплаты счета-фактуры продавца</th>
                            <th scope="col">Стоимость продаж, включая НДС 18%</th>
                            <th scope="col">Стоимость продаж без НДС</th>
                            <th scope="col">Сумма НДС</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_Cost_NDS = 0;
                        $total_Cost_without_NDS = 0;
                        $total_Summa_NDS = 0;
                        foreach ($sales  as $row) {
                            $Cost_without_NDS = $row['price'];
                            $Cost_NDS =  $Cost_without_NDS * 1.18;
                            $Summa_NDS = $Cost_NDS - $Cost_without_NDS;
                            $total_Cost_NDS += $Cost_NDS;
                            $total_Cost_without_NDS += $Cost_without_NDS;
                            $total_Summa_NDS += $Summa_NDS;
                            echo '
                                <tr>
                                    <td>' . $row['id_order'] . '</td>
                                    <td>' . $row['product_name'] . '</td>
                                    <td>' . $row['order_date'] . '</td>
                                    <td>' . $row['first_name'] . '</td>
                                    <td>' . $row['inn'] . '</td>
                                    <td>' . $row['kpp'] . '</td>
                                    <td>' . $row['date_pay'] . '</td>
                                    <td>' . number_format($Cost_NDS, 2, '.', ' ') . '</td>
                                    <td>' . number_format($Cost_without_NDS, 2, '.', ' ') . '</td>
                                    <td>' . number_format($Summa_NDS, 2, '.', ' ') . '</td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7" class="text-end"><b>Всего:</b></td>
                            <td><b><?= number_format($total_Cost_NDS, 2, '.', ' ') ?></b></td>
                            <td><b><?= number_format($total_Cost_without_NDS, 2, '.', ' ') ?></b></td>
                            <td><b><?= number_format($total_Summa_NDS, 2, '.', ' ') ?></b></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mb-4">
        <form action="Manager/sales_book" method="post" class="d-flex flex-wrap gap-3 align-items-end" style="max-width: 600px; width: 100%;">
            <div class="mb-3 flex-fill">
                <label for="date_start" class="form-label">С</label>
                <input type="date" class="form-control" id="date_start" name="date_start">
            </div>
            <div class="mb-3 flex-fill">
                <label for="date_end" class="form-label">По</label>
                <input type="date" class="form-control" id="date_end" name="date_end">
            </div>
            <div class="mb-3">
                <button class="btn btn-secondary" type="submit">Показать</button>
            </div>
        </form>
    </div>
</main>