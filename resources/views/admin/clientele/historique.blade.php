@extends('layouts.master')
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house"></i>
            <a href="/">Domicile</a>
        </li>
        <li class="breadcrumb-item">Clientele</li>
        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Historique</li>
    </ol>
@endsection
@section('main')

<head> 
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .profile-box {
            width: 300px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .profile-box:hover {
            transform: scale(1.05);
        }
        .profile-box img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-box .info {
            margin-top: 20px;
        }
        .profile-box .info h5 {
            margin: 10px 0;
        }
        .profile-box .info p {
            margin: 5px 0;
        }
        .profile-box .contact-info i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="gallery">
        @foreach ($clients as $client)
            <div class="profile-box text-center">
                <img src="{{ Storage::url($client->photo) }}" alt="Profile Picture">
                <div class="info">
                    <h5>{{ $client->nom_utilisateur }}</h5>
                </div>
                <div class="contact-info text-left">
                    <p><i class="fas fa-phone-alt"></i>{{ $client->tel }}</p>
                    <p><i class="fas fa-envelope"></i>{{ $client->email }}</p>
                    <p><i class="fas fa-calendar-alt"></i>{{ $client->date_naissance }}</p>
                    <p><i class="fas fa-map-marker-alt"></i>{{ $client->city }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>

@endsection
