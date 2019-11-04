@if (count($errors))

<div class="alert alert-danger alert-styled-left alert-dismissible">
        
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>   
</div>
    
@endif