
        
    	@if(count($sms)>= 1)
    	 <div class="row justify-content-center">
            <div class="col-md-12  border rounded p-4 " >  
				<div class="col-md-12" >
					<div class="card my-5">
						<div class="card-body text-center">
							<h5 class="card-title m-b-0">Table In our hand {{ $total }}</h5>
							<form action="{{ route('repush_all') }}" method="get">
							     @csrf
								<button type="submit" class="btn btn-danger float-right">Re-Pull At_once</button>
							</form>
						</div>
						<div class="table-responsive " >
							<table class="table">
								<thead class="thead-light">
									<tr>
										<th scope="col">SL</th>
										<th scope="col">Message</th>
										<th scope="col">sourceAddress</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody class="customtable"> 
								@forelse($sms as $s)
									<form action="{{ route('repush',[$s->id]) }}" method="get">
									     @csrf
										<tr>
											<td>{{ $no_count++ }}</td>
											<td>{{  Str::limit($s->message, 20) }}</td>
											<td>{{ $s->sourceAddress }}</td>
											<th>
												<button type="submit" class="btn btn-danger">Re-Pull</span>
											</th>
										</tr>
									</form> @empty
									<tr>
										<td colspan="4" class="text-center">
											<h1>No data found </h1> </td>
									</tr> @endforelse </tbody>
							</table>
							<div class="d-flex">
								<div class="mx-auto"> {{ $sms->links("pagination::bootstrap-4") }} </div>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>
			@else
			@endif
