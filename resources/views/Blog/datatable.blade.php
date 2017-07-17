@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" id="blogs-table">
				<thead>
					<tr>
						<th>id</th>
						<th>title</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
@endsection
{{--  
	 Grab Data from '/datatables' route
	 Inject the script into table
 --}}

@push('scripts')
<script>
$(function() {
    $('#blogs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('showtable') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },   
        ]
    });
});
</script>
@endpush