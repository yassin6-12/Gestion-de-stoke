@extends('layouts.master')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <i class="bi bi-house"></i>
        <a href="index.html">Domicile</a>
    </li>
    <li class="breadcrumb-item">Catégorie</li>
    <li class="breadcrumb-item breadcrumb-active" aria-current="page">Ajouter Catégorie</li>
</ol>
@endsection
@section('main')

<style>
    #demo-upload {
        border: none !important;
    }
</style>
<div class="row">
    @include('shared.success-message')
    <div class="col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="card-border">
                            <div class="card-border-title">Ajouter votre catégorie</div>
                            @if ($errors->any())
                                <div class="container">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <div class="card-border-body">
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <div class="mb-3">
                                            <label for="categorie_name" class="form-label">Nom de la Catégorie <span class="text-red">*</span></label>
                                            <input id="form-cat-name" name="categorie_name" type="text" class="form-control" placeholder="Entrez le nom de la catégorie"  >
                                        </div>

                                    </div>
                                    <form action="{{route('catégorie.store')}}" id="myDropzone" class="dropzone" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="dz-message needsclick">
                                            <button type="button" class="dz-button">Déposez des fichiers ici ou cliquez pour les télécharger.</button><br>
                                            <span class="note needsclick">(Il ne s’agit que d’une zone de dépôt de démonstration. Les fichiers sélectionnés
                                                <strong>ne sont pas</strong> réellement téléchargés.)</span>
                                        </div>

                                    </form>


                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- <div class="col-sm-12 col-12">
                        <div class="card-border">
                            <div class="card-border-title">Images du produit</div>
                            <div class="card-border-body">

                                <div id="dropzone" class="dropzone dropzone-dark">

                                        <div class="dz-message needsclick">
                                            <button type="button" class="dz-button">Déposez des fichiers ici ou cliquez pour les télécharger.</button><br>
                                            <span class="note needsclick">(Il ne s’agit que d’une zone de dépôt de démonstration. Les fichiers sélectionnés
                                                <strong>ne sont pas</strong> réellement téléchargés.)</span>
                                        </div>



                                </div>

                            </div>
                        </div>
                    </div> --}}
                    <div class="col-sm-12 col-12">
                        <div class="custom-btn-group flex-end">
                            <a href="catégorie.index" type="button" class="btn btn-light">Annuler</a>
                            <button type="submit" id="submit-add-category" class="btn btn-success" >ajouter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

<!-- Dropzone JS -->
@section('script')

<script type="text/javascript">

    Dropzone.autoDiscover = false;
    var maxFilesizeVal = 12;
    var maxFilesVal    = 1;
    var myDropzone = new Dropzone("#myDropzone", {
        url: "{{route('catégorie.store')}}", // specify your upload URL
        autoProcessQueue: false, // disable auto-upload
        method:'POST',
        paramName:'file',
        maxFilesize: maxFilesizeVal,
        maxFiles:maxFilesVal,
        parallelUploads: maxFilesVal,
        //uploadMultiple:true,
        resizeQuality: 1.0,
        acceptedFiles: ".jpeg,.jpg,.png,.webp",
        addRemoveLinks: true,
        timeout: 60000,
        dictDefaultMessage: "Drop your files here or click to upload",
        dictFallbackMessage: "Your browser doesn't support drap and drop file uploads.",
        dictFileTooBig: "File is too big. Max filesize: "+maxFilesizeVal+"Mb.",
        dictInvalidFileType: 'Invalid file type. only jpg, jpeg png and gif files are allowed.',
        dictMaxFilesExceeded: 'You can only upload up to '+maxFilesVal+' files.',
        maxfilesexceeded:function(file){
            this.removeFile(file);
        },
        sending:function(file,xhr,formDate){
            $('#message').text('Image Uploading...');
        },
        success: function(file,response){
            $('#message').text(response.message);
            console.log(response.success);
        },
        error:function(file,response){
            $('#message').text('Something Went Wrong! '+response);
            console.log(response);
            return false;
        }
    });
    document.getElementById("submit-add-category").addEventListener("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        var inputCat = document.getElementById('form-cat-name').cloneNode(true);
        inputCat.type = 'hidden';
        document.getElementById('myDropzone').appendChild(inputCat);
        myDropzone.processQueue(); // trigger file upload
        setTimeout(function(){
            window.location.reload(1);
        }, 1);
    });


</script>
@endsection
