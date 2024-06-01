@if (@session()->has('deletemp'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('deletemp')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
