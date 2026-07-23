<?php

use Codemdg\Core\Views\BlockBuilder;

BlockBuilder::extends("admin/default_admin.php");
BlockBuilder::startBlock("additionnal_css");
?>
<link rel="stylesheet" type="text/css" href="/assets/css/dashboard.css">
<?php
BlockBuilder::endBlock();
BlockBuilder::startBlock("content_admin");
?>

<!-- Content -->
<div class="dashboard-content">
    <!-- Sales Overview -->
    <div class="card card--sales">
        <h2 class="card__title">Sales Overview</h2>
        <div class="card__stats">
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-sales.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">₹ 832</span>
                <span class="card__stat-label">Sales</span>
            </div>
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-revenue.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">₹ 18,300</span>
                <span class="card__stat-label">Revenue</span>
            </div>
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-profit.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">₹ 868</span>
                <span class="card__stat-label">Profit</span>
            </div>
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-cost.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">₹ 17,432</span>
                <span class="card__stat-label">Cost</span>
            </div>
        </div>
    </div>

    <!-- Inventory Summary -->
    <div class="card card--inventory">
        <h2 class="card__title">Inventory Summary</h2>
        <div class="card__stats">
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-quantity.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">868</span>
                <span class="card__stat-label">Quantity in Hand</span>
            </div>
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-received.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">200</span>
                <span class="card__stat-label">To be received</span>
            </div>
        </div>
    </div>

    <!-- Purchase Overview -->
    <div class="card card--purchase">
        <h2 class="card__title">Purchase Overview</h2>
        <div class="card__stats">
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-purchase.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">82</span>
                <span class="card__stat-label">Purchase</span>
            </div>
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-cost.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">₹ 13,573</span>
                <span class="card__stat-label">Cost</span>
            </div>
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-cancel.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">5</span>
                <span class="card__stat-label">Cancel</span>
            </div>
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-return.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">₹17,432</span>
                <span class="card__stat-label">Return</span>
            </div>
        </div>
    </div>

    <!-- Product Summary -->
    <div class="card card--product">
        <h2 class="card__title">Product Summary</h2>
        <div class="card__stats">
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-suppliers.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">31</span>
                <span class="card__stat-label">Number of Suppliers</span>
            </div>
            <div class="card__stat-item">
                <img src="/assets/images/icons/icon-categories.svg" alt="" class="card__stat-icon">
                <span class="card__stat-value">21</span>
                <span class="card__stat-label">Number of Categories</span>
            </div>
        </div>
    </div>

    <!-- Sales & Purchase Chart -->
    <div class="card card--chart-sales">
        <h2 class="card__title">Sales & Purchase</h2>
        <canvas id="salesChart"></canvas>
    </div>

    <!-- Order Summary Chart -->
    <div class="card card--chart-order">
        <h2 class="card__title">Order Summary</h2>
        <canvas id="orderChart"></canvas>
    </div>

    <!-- Top Selling Stock -->
    <div class="card card--table">
        <div class="card__title-row">
            <h2 class="card__title">Top Selling Stock</h2>
            <a href="#" class="card__see-all">See All</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="table__header">Name</th>
                    <th class="table__header">Sold Quantity</th>
                    <th class="table__header">Remaining Quantity</th>
                    <th class="table__header">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table__row">
                    <td>Surf Excel</td>
                    <td>30</td>
                    <td>12</td>
                    <td>₹ 100</td>
                </tr>
                <tr class="table__row">
                    <td>Rin</td>
                    <td>21</td>
                    <td>15</td>
                    <td>₹ 207</td>
                </tr>
                <tr class="table__row">
                    <td>Parle G</td>
                    <td>19</td>
                    <td>17</td>
                    <td>₹ 105</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Low Quantity Stock -->
    <div class="card card--low-stock">
        <div class="card__title-row">
            <h2 class="card__title">Low Quantity Stock</h2>
            <a href="#" class="card__see-all">See All</a>
        </div>
        <div class="stock-item">
            <img src="https://via.placeholder.com/40" alt="" class="stock-item__image">
            <div class="stock-item__info">
                <p>Tata Salt</p>
                <p>Remaining Quantity : 10 Packet</p>
            </div>
            <span class="badge badge--low">Low</span>
        </div>
        <div class="stock-item">
            <img src="https://via.placeholder.com/40" alt="" class="stock-item__image">
            <div class="stock-item__info">
                <p>Lays</p>
                <p>Remaining Quantity : 15 Packet</p>
            </div>
            <span class="badge badge--low">Low</span>
        </div>
        <div class="stock-item">
            <img src="https://via.placeholder.com/40" alt="" class="stock-item__image">
            <div class="stock-item__info">
                <p>Lays</p>
                <p>Remaining Quantity : 15 Packet</p>
            </div>
            <span class="badge badge--low">Low</span>
        </div>
    </div>
</div>


<script src="/assets/js/chart.js"></script>
<script src="/assets/js/dashboard.js"></script>

<?php BlockBuilder::endBlock() ?>