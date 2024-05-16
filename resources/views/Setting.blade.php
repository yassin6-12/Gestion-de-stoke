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
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="img-fluid change-img-avatar" alt="Image">
                        <div id="dropzone-sm" class="mb-4 dropzone-dark">
                            <form action="{{ route('SettingUpdate', $user->id) }}" class="dropzone needsclick dz-clickable" id="myDropzone" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="dz-message needsclick">
                                    
                                    <button type="button" class="dz-button">Changer l'image</button>
                                </div>
                                <div id="produit-other-info" style="display: none"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <form class="form mt-5" action="{{ route('SettingUpdate', $user->id) }}" method="POST" enctype="multipart/form-data"> --}}
                <div id="inputSetting">
                <div class="row">
                    <div class="col-xxl-4 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom complet</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="tel" class="form-label">Téléphone</label>
                            <input type="tel" name="tel" class="form-control" id="tel" value="{{ $user->tel }}">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" name="adresse" class="form-control" id="adresse" value="{{ $user->adresse }}">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="city" class="form-label">Ville</label>
                            <input type="text" name="city" class="form-control" id="city" value="{{ $user->city }}">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="state" class="form-label">État</label>
                            <input type="text" name="state" class="form-control" id="state" value="{{ $user->state }}">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="zipcode" class="form-label">Code postal</label>
                            <input type="text" name="zipcode" class="form-control" id="zipcode" value="{{ $user->zipcode }}">
                        </div>
                    </div>
                    <div class="col-xxl-4 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Entrer le mot de passe">
                        </div>
                    </div>
                    <div class="col-sm-12 col-12">
                        <hr>
                        <button type="submit" id="submit-add-produit" class="btn btn-info">Sauvegarder les paramètres</button>
                    </div>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </div>
    <!-- Dropzone JS -->
    <script src="assets/vendor/dropzone/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var maxFilesizeVal = 12;
        var maxFilesVal = 10;
        var myDropzone = new Dropzone("#myDropzone", {
            url: "{{ route('SettingUpdate', $user->id) }}", // URL d'upload
            autoProcessQueue: false, // Désactiver l'auto-upload
            method: 'POST',
            paramName: 'photo',
            maxFilesize: maxFilesizeVal,
            maxFiles: 1,
            parallelUploads: maxFilesVal,
            resizeQuality: 1.0,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: true,
            timeout: 60000,
            dictDefaultMessage: "Déposez vos fichiers ici ou cliquez pour télécharger",
            dictFallbackMessage: "Votre navigateur ne supporte pas le téléchargement par glisser-déposer.",
            dictFileTooBig: "Le fichier est trop volumineux. Taille max : " + maxFilesizeVal + "Mo.",
            dictInvalidFileType: 'Type de fichier invalide. Seuls les fichiers jpg, jpeg, png et webp sont autorisés.',
            dictMaxFilesExceeded: 'Vous ne pouvez télécharger qu\'un seul fichier.',
            maxfilesexceeded: function(file) {
                this.removeFile(file);
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", "{{ csrf_token() }}");
                formData.append("_method", "PUT");
                // Ajoutez d'autres champs de formulaire si nécessaire
            },
            success: function(file, response) {
                $('#message').text(response.message);
                console.log(response.success);
            },
            error: function(file, response) {
                $('#message').text('Une erreur est survenue ! ' + response);
                console.log(response);
                return false;
            },
        });

        function submitForm() {
            var form = document.getElementById('myDropzone');
            form.submit();
        }

        document.getElementById("submit-add-produit").addEventListener("click", function(e) {
            e.preventDefault();inputSetting
            e.stopPropagation();
            $('#produit-other-info').append($('#inputSetting'));
            myDropzone.processQueue(); // Déclencher l'upload des fichiers
            submitForm();
        });
    </script>
@endsection
