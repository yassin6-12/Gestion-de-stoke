@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produit</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Paramètres du compte</li>
    </ol>
@endsection
@section('main')
<div class="row">
    <div class="col-xxl-8 col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12">
        <div class="row">
            <div class="col-sm-6 col-12">
                <div class="d-flex flex-row">
                    <img src="assets/images/user2.png" class="img-fluid change-img-avatar" alt="Image">
                    <div id="dropzone-sm" class="mb-4 dropzone-dark">
                        <form action="/upload" class="dropzone needsclick dz-clickable" id="demo-upload">

                            <div class="dz-message needsclick">
                                <button type="button" class="dz-button">Change Image.</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-4 col-sm-6 col-12">
                <!-- Form Field Start -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" id="fullName" value="BELGACEM">
                </div>
            </div>
            <div class="col-xxl-4 col-sm-6 col-12">
                <!-- Form Field Start -->
                <div class="mb-3">
                    <label for="emailID" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailID" value="reese@meail.com">
                </div>
            </div>
            <div class="col-xxl-4 col-sm-6 col-12">
                <!-- Form Field Start -->
                <div class="mb-3">
                    <label for="phoneNo" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" id="phoneNo" value="0657328026">
                </div>
            </div>
            <div class="col-xxl-4 col-sm-6 col-12">
                <!-- Form Field Start -->
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" value="Address">
                </div>
            </div>
            <div class="col-xxl-4 col-sm-6 col-12">
                <!-- Form Field Start -->
                <div class="mb-3">
                    <label for="city" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="city" value="tlemcen">
                </div>
            </div>
            <div class="col-xxl-4 col-sm-6 col-12">
                <!-- Form Field Start -->
                <div class="mb-3">
                    <label for="state" class="form-label">État</label>
                    <input type="text" class="form-control" id="state" value="État">
                </div>
            </div>
            <div class="col-xxl-4 col-sm-6 col-12">
                <!-- Form Field Start -->
                <div class="mb-3">
                    <label for="zipCode" class="form-label">Code postal</label>
                    <input type="text" class="form-control" id="zipCode" value="13000">
                </div>
            </div>
            
            <div class="col-xxl-4 col-sm-6 col-12">
                <!-- Form Field Start -->
                <div class="mb-3">
                    <label for="enterPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="enterPassword"
                        placeholder="Enter Password">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-lg-5 col-md-6 col-sm-12 col-12">
        <div class="account-settings-block">
            
            <!-- <div class="settings-block">
                <div class="settings-block-title">Other Settings</div>
                <div class="settings-block-body">
                    <div class="list-group">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>Show desktop notifications</div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showNotifications">
                                <label class="form-check-label" for="showNotifications"></label>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>Show email notifications</div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showEmailNotifications" checked>
                                <label class="form-check-label" for="showEmailNotifications"></label>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>Show chat notifications</div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showChatNotifications">
                                <label class="form-check-label" for="showChatNotifications"></label>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>Show purchase history</div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showPurchaseNotifications">
                                <label class="form-check-label" for="showPurchaseNotifications"></label>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>Show orders</div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showOrders">
                                <label class="form-check-label" for="showOrders"></label>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>Show alerts</div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="showAlerts">
                                <label class="form-check-label" for="showAlerts"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="col-sm-12 col-12">
        <hr>
        <button class="btn btn-info">Save Settings</button>
    </div>
</div>
@endsection