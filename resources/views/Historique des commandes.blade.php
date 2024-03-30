@extends('layouts.master')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <i class="bi bi-house"></i>
        <a href="index.html">Domicile</a>
    </li>
    <li class="breadcrumb-item">Produit</li>
    <li class="breadcrumb-item breadcrumb-active" aria-current="page">Historique des commandes</li>
</ol>
@endsection
@section('main')
<div class="content-wrapper">

    <!-- Row start -->
    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Historique des commandes</div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table v-middle">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Product</th>
                                    <th>User ID</th>
                                    <th>Ordered Placed</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/user5.png" class="media-avatar" alt="Bootstrap Gallery">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Sybil Boyd</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/food/img1.jpg" class="media-avatar" alt="Admin Themes">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Spaghetti</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Moonlight00435</td>
                                    <td>2020/09/21</td>
                                    <td>$46.00</td>
                                    <td>
                                        <span class="text-red"><i class="bi bi-x-circle-fill"></i> Failed</span>
                                    </td>
                                    <td>
                                        <span class="badge shade-red min-90">Cancelled</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/user2.png" class="media-avatar" alt="Bootstrap Gallery">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Lindsay Rogers</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/food/img2.jpg" class="media-avatar" alt="Admin Themes">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Garlic Kebabs</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Moonlight00878</td>
                                    <td>2020/10/25</td>
                                    <td>$87.00</td>
                                    <td>
                                        <span class="text-blue"><i class="bi bi-clock-fill"></i> Awaiting</span>
                                    </td>
                                    <td>
                                        <span class="badge shade-blue min-90">Processing</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/user3.png" class="media-avatar" alt="Bootstrap Gallery">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Jewel Steele</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/food/img3.jpg" class="media-avatar" alt="Admin Themes">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Ginger Snacks</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Moonlight00370</td>
                                    <td>2020/10/30</td>
                                    <td>$65.00</td>
                                    <td>
                                        <span class="text-green"><i class="bi bi-check-circle-fill"></i> Paid</span>
                                    </td>
                                    <td>
                                        <span class="badge shade-green min-90">Delivered</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/user2.png" class="media-avatar" alt="Bootstrap Gallery">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Zea Hansen</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/food/img4.jpg" class="media-avatar" alt="Admin Themes">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Guava Sorbet</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Moonlight00435</td>
                                    <td>2020/10/12</td>
                                    <td>$88.00</td>
                                    <td>
                                        <span class="text-red"><i class="bi bi-x-circle-fill"></i> Failed</span>
                                    </td>
                                    <td>
                                        <span class="badge shade-red min-90">Cancelled</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/user2.png" class="media-avatar" alt="Bootstrap Gallery">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Angelica King</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/food/img5.jpg" class="media-avatar" alt="Admin Themes">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Gooseberry Surprise</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Moonlight00878</td>
                                    <td>2020/10/11</td>
                                    <td>$87.00</td>
                                    <td>
                                        <span class="text-blue"><i class="bi bi-clock-fill"></i> Awaiting</span>
                                    </td>
                                    <td>
                                        <span class="badge shade-blue min-90">Processing</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/user.png" class="media-avatar" alt="Bootstrap Gallery">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Nadia Hart</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/food/img2.jpg" class="media-avatar" alt="Admin Themes">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Peanut Yogurt</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Moonlight00435</td>
                                    <td>2020/09/21</td>
                                    <td>$46.00</td>
                                    <td>
                                        <span class="text-red"><i class="bi bi-x-circle-fill"></i> Failed</span>
                                    </td>
                                    <td>
                                        <span class="badge shade-red min-90">Cancelled</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/user4.png" class="media-avatar" alt="Bootstrap Gallery">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Tamara Aguilar</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media-box">
                                            <img src="assets/images/food/img4.jpg" class="media-avatar" alt="Admin Themes">
                                            <div class="media-box-body">
                                                <div class="text-truncate">Almond Strudel</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Moonlight00878</td>
                                    <td>2020/10/25</td>
                                    <td>$87.00</td>
                                    <td>
                                        <span class="text-blue"><i class="bi bi-clock-fill"></i> Awaiting</span>
                                    </td>
                                    <td>
                                        <span class="badge shade-blue min-90">Processing</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->

</div>
@endsection