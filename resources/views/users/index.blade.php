@extends('layouts.app')
@extends('layouts.includes')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', __('translation.users'))
@section('content_header_subtitle', __('translation.allUsers'))

{{-- Content body: main page content --}}

@section('content_body')


{{-- @include('includes.localizat ionBtn') --}}

<table id="users-table" class="display">
    <thead>
        <tr>


            <th>{{__('translation.id')}}</th>
            <th>{{__('translation.email')}}</th>
            <th>{{__('translation.name')}}</th>
            <th>{{__('translation.role')}}</th>
            <th>{{__('translation.actions')}}</th>
        </tr>
    </thead>
</table>
@stop

@push('css')
{{-- <meta charset="UTF-8"> --}}
{{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
{{-- <title>Users</title> --}}

<!-- DataTables CSS -->
{{-- <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
@endpush


@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable({
            processing: true
            , serverSide: true
            , ajax: '{{ route('users.data') }}'
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }
                , {
                    data: 'email'
                    , name: 'email'
                }
                , {
                    data: 'name'
                    , name: 'name'
                }
                , {
                    data: 'roles'
                    , name: 'roles'
                    , orderable: false
                    , searchable: true
                }
                , {
                    data: 'actions'
                    , name: 'actions'
                    , orderable: false
                    , searchable: false
                }
            , ]
        });
    });

</script>

@endpush
