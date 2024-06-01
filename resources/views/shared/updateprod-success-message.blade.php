@if (@session()->has('updateprod'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('updateprod')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
