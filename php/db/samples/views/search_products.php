<?php

declare(strict_types=1);
?>
<form action="actions/list_products.php" id="form-search-product" method="get">
    <input type="text" name="search" id="" value="stylos">
    <button type="submit">search</button>
</form>

<table id="tbl-list-products">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
