@extends('layouts.app')

@section('content')
    <h1><b>Halaman Home | Kategori : {{ $category->nama_category }}</b></h1>
    <hr class="mb-5 opacity-100">

    <div class="col-lg-12">
        <div class="row mx-auto position-relative">
            
            <div class="col-lg-3 mb-3 me-0">
                @include('includes.sidenav')
            </div>

            <div class="col-lg-9">
                <div class="col-xs-12">
                    <div class="row mx-auto px-0 ps-2 product-card-grid">

                        @foreach ($menu as $data)
                            {{-- satu block menu --}}
                            <div class="card mb-3 border border-black mx-2 product-card" style="width: 296px;">
                                @auth 
                                @if (in_array(auth()->user()->is_admin, [1]))
                                <div class="col-1 position-absolute mt-3 me-3 align-self-end border" title="Hapus Menu">
                                    <a href="/hapus-menu/{{ $data->slug }}" class="btn btn-outline-danger" onclick="return confirm('Yakin Hapus Menu?');""><b>X</b></a>
                                </div>
                                @endif
                                @endauth
                                <img src="/{{ $data->gambar }}" class="card-img-top" style="margin-top: 5%" alt="...">
                                <hr class="opacity-100">
                                <div class="card-body">
                                    <!-- Button trigger modal -->
                                    <h5>
                                        <a type="button" class="card-title mb-4 text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <b>{{ $data->nama_menu }}</b>
                                        </a>
                                    </h5>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">{{ $data->nama_menu }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img src="/{{ $data->gambar }}  " class="card-img-top" alt="...">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="modal-body">
                                                                {{ $data->deskripsi_menu }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row text-center">
                                            <h5 class="col-6 card-title border border-black p-2 ">
                                                <a href="/home/{{ $data->menu_category->slug }}" class="text-decoration-none text-success"><b>Tambahkan</b></a>
                                            </h5>
                                            <h5 class="col-6 card-title border border-black border-start-0 p-2 bg-success text-light text-center">Rp.{{ $data->harga }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <hr class="mt-5 opacity-100">
@endsection