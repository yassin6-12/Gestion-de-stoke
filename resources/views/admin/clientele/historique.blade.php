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
    <!-- Include Font Awesome from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            padding-bottom: 10px;
        }
        .profile-box .info p {
            margin: 5px 0;
        }
        .profile-box .contact-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding-left: 20px;
        }
        .profile-box .contact-info i {
            margin-right: 10px;
        }
        .profile-link {
            text-decoration: none; /* Remove default underline */
            color: inherit; /* Inherit text color */
            cursor: pointer; /* Show pointer cursor on hover */
        }
    </style>
</head>
<body>
    <div class="gallery">
        @foreach ($clients as $client)
            <a href="{{ route('showachats', $client->id) }}" class="profile-link">
                <div class="profile-box text-center">
                    <img src="{{ Storage::url($client->photo) }}" alt="Profile Picture">
                    <div class="info">
                        <h5>{{ $client->nom_utilisateur }}</h5>
                    </div>
                    <div class="contact-info">
                        <p><i class="fas fa-phone-alt"></i>{{ $client->tel }}</p>
                        <p><i class="fas fa-envelope"></i>{{ $client->email }}</p>
                        <p><i class="fas fa-map-marker-alt"></i>{{ $client->city }}</p>
                        <p><i class="fas fa-calendar-alt"></i>{{ $client->date_naissance }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</body>

@endsection
