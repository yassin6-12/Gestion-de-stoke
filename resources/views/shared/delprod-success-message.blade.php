@if (@session()->has('deletprod'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('deletprod')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
