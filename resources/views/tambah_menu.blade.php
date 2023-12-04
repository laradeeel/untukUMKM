@extends('layouts.app')

@section('content')
    <h1><b>Halaman Tambah Menu</b></h1>
    <hr class="opacity-100 mb-5">

    <div class="col-lg-12 mx-3">
        <div class="card border border-black mx-auto" style="width: 320px;">
            <div class="card-body">

                {{-- FORM TAMBAH DATA MENU --}}
                <form action="/tambah-menu/store" method="POST" class="mb-3" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control border border-black" name="nama_menu" placeholder="Nama Menu" autocomplete="off" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control border border-black" name="deskripsi_menu" placeholder="Deskripsi Menu" autocomplete="off" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text border-black">Rp.</span>
                        <input type="number" class="form-control border-black" name="harga" aria-label="Amount (to the nearest dollar)" placeholder="000">
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select border border-black" name="menu_category">
                            <option selected>Kategori</option>
                            @foreach ($menu_category as $data)

                                <option value="{{ $data->id }}">{{ $data->nama_category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="col-12 text-center">
                            <div class="row" style="font-size: 15px">

                                {{-- ALERT KATEGORI BARU DITAMBAHKAN --}}
                                <div class="form-outline">
                                    @if(Session::has('success'))
                                        <div class="alert alert-success py-1">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                </div>
                                {{-- ALERT KATEGORI BERHASIL DIHAPUS --}}
                                <div class="form-outline">
                                    @if(Session::has('success-hapus'))
                                        <div class="alert alert-danger py-1">
                                            {{ Session::get('success-hapus') }}
                                        </div>
                                    @endif
                                </div>

                                {{-- TAMBAH KATEGORI --}}
                                <div class="col-6">
                                    <button title="Tambah Kategori Menu" type="button" data-bs-toggle="modal" data-bs-target="#tambahKategori" class="border border-black">
                                            Tambah Kategori
                                    </button>
                                </div>

                                {{-- HAPUS KATEGORI --}}
                                <div class="col-6">
                                    <button title="Hapus Kategori Menu" type="button" data-bs-toggle="modal" data-bs-target="#hapusKategori" class="border border-black"> 
                                            Hapus Kategori  
                                    </button>
                                </div>
                            
                        </div>
                    </div>
                        
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control border border-black" id="inputGroupFile02" name="gambar">
                        <label class="input-group-text border border-black"  for="inputGroupFile02" accept="image/*">Gambar</label>
                    </div>
                    
                    <hr class="opacity-100">

                    <button class="btn btn-success w-100" type="submit"><b>Tambah Menu</b></button>
                </form>


            </div>
        </div>
    </div>

    <hr class="mt-5 opacity-100">
@endsection


{{-- MODAL TAMBAH KATEGORI MENU --}}
<div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Kategori baru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="tambah-category" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Kategori:</label>
                    <input type="text" class="form-control border border-black @error('nama') is-invalid @enderror" id="recipient-name" name="nama_category" required autocomplete="off">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Tambah Kategori</button>
            </div>
        </form>

        </div>
    </div>
</div>
{{-- END MODAL TAMBAH KATEGORI MENU --}}

{{-- MODAL HAPUS KATEGORI MENU --}}
<div class="modal fade" id="hapusKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Kategori baru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <table class="table border border-black">
            <thead>
              <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>

                @php
                    $no = 1;
                @endphp
                @foreach ($menu_category as $data)
                <tr>
                    <th scope="row" class="text-center align-middle">{{ $no }}</th>
                    <td class="align-middle">{{ $data->nama_category }}</td>
                    <td>
                        <a href="/hapus-category/{{ $data->slug }}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?');">Hapus</a>
                    </td>
                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
            </tbody>
          </table>

        </div>
    </div>
</div>
{{-- END MODAL HAPUS KATEGORI MENU --}}