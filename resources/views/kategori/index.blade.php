@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
<!-- Jobheet 5 tugas praktikum 1 ,Tambahkan button Add di halam manage kategori, yang mengarah ke create kategori
baru -->
<a href="{{ route('create') }}" class="btn btn-primary"> Add</a>



@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush