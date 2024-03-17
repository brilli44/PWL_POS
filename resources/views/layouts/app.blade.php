@extends('adminlte::page')
{{-- Extend and customize the browser title --}}
@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        | @yield('subtitle')
    @endif
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- @vite('resources/js/app.js') --}}

{{-- Add common Javascript/Jquery code --}}
@push('js')
    <script>
        $(document).ready(function() {
            // Add your common script logic here...
        });
    </script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
@endpush

{{-- Extend and customize the page content header --}}
@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">@yield('content_header_title')</h1>
    @endif
@stop

@stack('scripts')

{{-- Add common CSS customizations --}}
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <style type="text/css">
        {{-- You can add AdminLTE customizations here --}}
        /*
            .card-header {
            border-bottom: none;
            }
            .card-title {
            font-weight: 600;
            }
            */
    </style>
@endpush
