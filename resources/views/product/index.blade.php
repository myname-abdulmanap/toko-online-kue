@extends('layouts.app')

@section('content')
<div class="col-lg-10 mb-10 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('products.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
            <h4 class="m-15 font-weight-bold">DAFTAR PRODUK</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table id="dataTable" class="table table-bordered">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga 200g</th>
                        <th>Harga 500g</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                    <tr align="center">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>Rp {{ number_format($product->price_200_gram, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($product->price_500_gram, 0, ',', '.') }}</td>
                        <td><img src="{{ asset($product->img) }}" width="70"></td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $product->id }}">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin menghapus produk ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
