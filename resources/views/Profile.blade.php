@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Produit</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Profile</li>
    </ol>
@endsection
@section('main')
<div class="row gutters">
    <div class="col-sm-12 col-12">

        <div class="profile-header">
            <h1>Welcome, Abigail</h1>
            <div class="profile-header-content">
                <div class="profile-header-tiles">
                    <div class="row gutters">
                        <div class="col-sm-4 col-12">
                            <div class="profile-tile">
                                <span class="icon">
                                    <i class="bi bi-pentagon"></i>
                                </span>
                                <h6>Nom - <span>Abigail Heaney</span></h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="profile-tile">
                                <span class="icon">
                                    <i class="bi bi-pin-angle"></i>
                                </span>
                                <h6>Lieu - <span>Canada</span></h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="profile-tile">
                                <span class="icon">
                                    <i class="bi bi-telephone"></i>
                                </span>
                                <h6>Téléphoune - <span>1234567890</span></h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="profile-tile">
                                <span class="icon">
                                    <i class="bi bi-envelope"></i>

                                </span>
                                <h6>Email - <span>exmpl@gmail.com</span></h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="profile-tile">
                                <span class="icon">
                                    <i class="bi bi-person"></i>

                                </span>
                                <h6>civilité - <span>exmpl@gmail.com</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-avatar-tile">
                    <img src="assets/images/user.png" class="img-fluid"
                        alt="Bootstrap Gallery" />
                </div>
            </div>
        </div>

    </div>
</div>
@endsection