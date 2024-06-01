@if (@session()->has('updateEmp'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('updateEmp')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
