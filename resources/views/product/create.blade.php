@extends('layouts.app')

@section('content')
<div class="col-lg-8 mx-auto">
    <div class="card shadow">
        <div class="card-header">
            <h4>Tambah Produk</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="category" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Harga 200g</label>
                    <input type="number" name="price_200_gram" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Harga 500g</label>
                    <input type="number" name="price_500_gram" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>Link Beli</label>
                    <input type="text" name="buy_link_description" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Gambar Produk</label>
                    <input type="file" name="img" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
