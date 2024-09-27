@extends('layouts.app')
@extends('layouts.includes')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Content body: main page content --}}

@section('content_body')
@if (session('success'))
<div class="alert alert-success">
    <p> {{ session('success') }}</p>
</div>
@endif
@if (session('error'))
<div class="alert alert-error">
    <p> {{ session('error') }}</p>
</div>
@endif

<table id="importers-table" class="display">
    <thead>
        <tr>
            <th>{{ __('translation.importer_id') }}</th>
            <th>{{ __('translation.account_email')}}</th>
            <th>{{ __('translation.company_name')}}</th>
            <th>{{ __('translation.import_license_number')}}</th>
            <th>{{ __('translation.actions')}}</th>
        </tr>
    </thead>
</table>
@stop




@push('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#importers-table').DataTable({
            processing: true
            , serverSide: true
            , ajax: '{{ route('importers.data') }}'
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }
                , {
                    data: 'accountEmail'
                    , name: 'accountEmail'
                    , orderable: false
                    , searchable: true
                },

                {
                    data: 'company_name'
                    , name: 'company_name'
                }
                , {
                    data: 'import_license_number'
                    , name: 'import_license_number'
                },
                // { data: 'roles', name: 'roles', orderable: false, searchable: true }, 
                {
                    data: 'actions'
                    , name: 'actions'
                    , orderable: false
                    , searchable: false
                }
            , ]
        });
    });

</script>



{{-- <a href="#" class="btn btn-danger delete-importer" data-id="{{ $importer->id }}">
<i class="fas fa-trash"></i>
</a> --}}

{{-- <script>
    $(document).on('click', '.delete-importer', function(e) {
        e.preventDefault();

        var importerId = $(this).data('id');
        console.log("importerId",importerId)
    //    var url: '/importers/delete/' + importerId,
        var url = '{{ route("importers.delete", ":id") }}'.replace(':id', importerId);

if (confirm('Are you sure you want to delete this importer?')) {
$.ajax({
url: '/importers/delete/'+importerId,
type: 'DELETE',

data: {
_token: '{{ csrf_token() }}'
},
// success: function(response) {
// alert('Importer deleted successfully');
// location.reload(); // reload the page after deletion
// },
// error: function(xhr) {
// alert('Error deleting importer');
// }
});
}
});
</script> --}}


@endpush
