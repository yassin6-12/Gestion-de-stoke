@extends('layouts.master')
@section('breadcrumb')
					<ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <i class="bi bi-house"></i>
                            <a href="/">Domicile</a>
                        </li>
                        <li class="breadcrumb-item">Produit</li>
                        <li class="breadcrumb-item breadcrumb-active" aria-current="page">Ajouter un produit</li>
                    </ol>
@endsection
@section('main')
<style>
    #demo-upload {
        border: none !important;
    }
</style>
						<div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Informations sur le produit</div>
                                    </div>
                                        @if ($errors->any())
                                            <div class="container">
                                                <div class="danger alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{$error}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    
                                        <div class="card-body">
                                       
                                        <div class="row">
                                           
                                            <div class="col-sm-12 col-12 produit-other-external-info">
                                                <div class="card-border">
                                                    <div class="card-border-title">Informations générales</div>
                                                    <div class="card-border-body">

                                                        <div class="row">
                                                            <div class="col-sm-6 col-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Nom du produit<span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" name="product_name" placeholder="Entrez le nom du produit" value="{{old('product_name')}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Catégorie de produit <span class="text-red">*</span></label>
                                                                    <select class="form-control" name="category_of_produit">
                                                                        <option value="0">Sélectionner une catégorie de produit</option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{$category->id}}">{{$category->nom}}</option>
                                                                        @endforeach
                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Prix du produit <span class="text-red">*</span></label>
                                                                    <input type="text" class="form-control" name="product_price" placeholder="Entrez le prix du produit" value="{{old('product_price')}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class=" mb-3">
                                                                    <label class="form-label">Remise sur le produit</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="produit_remise" placeholder="Définir la remise sur le produit" value="{{old('produit_remise')}}">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Quantiter stock <span class="text-red">*</span></label>
                                                                    <input type="number" class="form-control" name="produit_stock_qt" placeholder="Stock du produit" min="1" value="{{old('produit_stock_qt')}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Quantiter min <span class="text-red">*</span></label>
                                                                    <input type="number" class="form-control" name="produit_min_qt" placeholder="Quantiter min du produit" min="1" value="{{old('produit_min_qt')}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-12">
                                                                <div class="mb-0">
                                                                    <label class="form-label">Description du produit<span class="text-red">*</span></label>
                                                                    <textarea rows="4" class="form-control" name="product_description"
                                                                              placeholder="Entrez la description du produit">{{old('product_description')}}</textarea>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                    {{-- <div class="col-sm-6 col-12">
                        <div class="card-border">
                            <div class="card-border-title">Meta Data</div>
                            <div class="card-border-body">

                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Meta Title <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Meta Title">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Meta Name <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Meta Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Meta Tags <span class="text-red">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Meta Tags">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-12">
                                        <div class="mb-0">
                                            <label class="form-label">Meta Description <span class="text-red">*</span></label>
                                            <textarea rows="4" class="form-control"
                                                placeholder="Enter Meta Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                                            <div class="col-sm-12 col-12">
                                                <div class="card-border">
                                                    <div class="card-border-title">Images du produit</div>
                                                    <div class="card-border-body">
                                                        <form action="{{route('Produit.store')}}" id="myDropzone" class="dropzone" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                        
                                                                <div class="needsclick dz-message">
                                                                    
                                                                        <button type="button" class="dz-button">Déposez des fichiers ici ou cliquez pour les télécharger.</button><br>
                                                                        <span class="note needsclick">(Vous pouvez télécharger jusqu'à 5 photos à la fois. Les fichiers sélectionnés
                                                                            <strong>ne sont pas</strong> réellement téléchargés.)</span>
                                                                    
                                                                </div>
                                                                <div id="produit-other-info" style="display:none;"></div>
                                                        </form>
                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-12">
                                                <div class="custom-btn-group flex-end">
                                                    <button type="button" class="btn btn-light">Annuler</button>
                                                    <button type="submit" class="btn btn-success" id="submit-add-produit">Ajouter produit</button>
                                                </div>
                                            </div>
                                            
                                          
                                        </div>
                                    
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        
                        

@endsection

@section('script')
    <!-- Dropzone JS -->
<script type="text/javascript">

    Dropzone.autoDiscover = false; 
    var maxFilesizeVal = 12;
    var maxFilesVal    = 10; 
    var myDropzone = new Dropzone("#myDropzone", { 
        url: "{{route('Produit.store')}}", // specify your upload URL
        autoProcessQueue: false, // disable auto-upload  
        method:'POST',
        paramName:'images',
        maxFilesize: maxFilesizeVal,
        maxFiles:maxFilesVal,
        parallelUploads: maxFilesVal,
        uploadMultiple:true,
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
        },
    });
    function submitForm() {
        var form = document.getElementById('myDropzone');
        form.submit();
    }
    document.getElementById("submit-add-produit").addEventListener("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('#produit-other-info').append($('.produit-other-external-info'));
        myDropzone.processQueue(); // trigger file upload
        submitForm();
    });
    

</script>
@endsection