@if (Session::has('info'))

<div class="alert alert-info alert-styled-left alert-dismissible">
        
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    {{ Session::get('info') }}    
</div>
    
@endif