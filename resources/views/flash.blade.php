
<style>
  .alert{
    text-transform:capitalize
  }
  </style>
@if ($message = Session::get('success'))
 
<div class="alert alert-success alert-dismissible " role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h3 class="alert-heading fs-5 fw-bold mb-1">Success</h3>
                    <p class="mb-0">
                      	{{ $message }}  
                    </p>
                  </div>

@endif


@if ($message = Session::get('error'))
  

<div class="alert alert-danger alert-dismissible " role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h3 class="alert-heading fs-5 fw-bold mb-1">Error</h3>
                    <p class="mb-0">
                      	{{ $message }}  
                    </p>
                  </div>
@endif


@if ($message = Session::get('warning'))  
<div class="alert alert-warning alert-dismissible " role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h3 class="alert-heading fs-5 fw-bold mb-1">Warning</h3>
                    <p class="mb-0">
                      	{{ $message }}  
                    </p>
                  </div>
@endif


@if ($message = Session::get('info')) 
 
<div class="alert alert-info alert-dismissible " role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h3 class="alert-heading fs-5 fw-bold mb-1">Information</h3>
                    <p class="mb-0">
                      	{{ $message }}  
                    </p>
                  </div>
@endif


@if ($errors->any())


<div class="alert alert-danger alert-dismissible " role="alert">
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  <h3 class="alert-heading fs-5 fw-bold mb-1">Data Missing !</h3>
	<ul style="margin-bottom: 0">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>   
</div>

@endif