@extends('layouts.app')
@extends('layouts.includes')

@section('subtitle', __('translation.shipping_companies'))
@section('content_header_title', __('translation.home'))
@section('content_header_subtitle', __('translation.shipping_companies'))

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

<table id="shipping-table" class="display">
    <thead>
        <tr>
            <th>{{ __('translation.id') }}</th>
            <th>{{ __('translation.account_email') }}</th>
            <th>{{ __('translation.company_name') }}</th>
            <th>{{ __('translation.shipping_countries') }}</th>
            <th>{{ __('translation.actions') }}</th>
        </tr>
    </thead>
</table>
@stop

@push('css')
<!-- DataTables CSS -->
{{-- <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
@endpush

@push('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('#shipping-table').DataTable({
            processing: true
            , serverSide: true
            , ajax: '{{ route('shippingCompanies.data') }}'
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }
                , {
                    data: 'accountEmail'
                    , name: 'accountEmail'
                    , orderable: false
                    , searchable: true
                }
                , {
                    data: 'company_name'
                    , name: 'company_name'
                }
                , {
                    data: 'shippingCountires'
                    , name: 'shippingCountires'
                }
                , {
                    data: 'actions'
                    , name: 'actions'
                    , orderable: false
                    , searchable: false
                }
            ]
        });
    });

</script>
@endpush
