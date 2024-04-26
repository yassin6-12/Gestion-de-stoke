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
            <h1>Welcome, {{Auth::user()?->name}}</h1>
            <div class="profile-header-content">
                <div class="profile-header-tiles">
                    <div class="row gutters">
                        <div class="col-sm-4 col-12">
                            <div class="profile-tile">
                                <span class="icon">
                                    <i class="bi bi-pentagon"></i>
                                </span>
                                <h6>Nom - <span>{{Auth::user()?->name}}</span></h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="profile-tile">
                                <span class="icon">
                                    <i class="bi bi-pin-angle"></i>
                                </span>
                                <h6>Lieu - <span>{{Auth::user()->adresse}}</span></h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="profile-tile">
                                <span class="icon">
                                    <i class="bi bi-telephone"></i>
                                </span>
                                <h6>Téléphoune - <span>{{Auth::user()->tel}}</span></h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="profile-tile">
                                <span class="icon">
                                    <i class="bi bi-envelope"></i>

                                </span>
                                <h6>Email - <span>{{Auth::user()->email}}</span></h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="profile-tile">
                                <span class="icon">
                                    <i class="bi bi-person"></i>

                                </span>
                                <h6>civilité - <span>{{Auth::user()->civilite}}</span></h6>
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
