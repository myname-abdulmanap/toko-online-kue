@extends('layouts.app')

@section('content')
<div class="col-lg-8 mx-auto">
    <div class="card shadow">
        <div class="card-header">
            <h4>Edit Produk</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="category" value="{{ $product->category }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Harga 200g</label>
                    <input type="number" name="price_200_gram" value="{{ $product->price_200_gram }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Harga 500g</label>
                    <input type="number" name="price_500_gram" value="{{ $product->price_500_gram }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Link Beli</label>
                    <input type="text" name="buy_link_description" value="{{ $product->buy_link_description }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Gambar Produk</label><br>
                    <img src="{{ asset($product->img) }}" width="100" class="mb-2"><br>
                    <input type="file" name="img" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
