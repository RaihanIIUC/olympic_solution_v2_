<div>
     <div>
        @if (session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @elseif (session()->has('error'))
         <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif
    </div>
    
	<form method="POST" wire:submit.prevent="storeDateRange" class="row">
	    
	     @csrf
	

		<div class="col-md-6">
			<div class="form-group">
				<label for="input_from">From</label>
				<input type="date" wire:model.lazy="start"        class="form-control"  id="date-picker-start" ></div>
 
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="input_to">To</label>
				<input type="date" wire:model.lazy="end"   class="form-control " id="date-picker-end"> </div>
		</div>
		<div class="col-md-12  d-flex justify-content-center">
			<button type="submit" class="btn btn-success">
			    @include('helper.loader')
			   
			 Download</button>
			 
		</div>
	</form>

</div>