@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Manage Kategori</span>
                <!-- Jobheet 5 tugas praktikum 1 ,Tambahkan button Add di halam manage kategori, yang mengarah ke create kategori
baru -->
<a href="{{ route('create') }}" class="btn btn-primary ml-auto" > Add</a>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush