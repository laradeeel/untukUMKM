@extends('layouts.app')

@section('content')
    <style>
        .content {
            margin-top: 20px;
            margin-left: 6px;
            padding-right: 225px;
            padding-bottom: 225px;
        }
        .clear {
        clear: both;
        }

        .checkBox {
        display: block;
        cursor: pointer;
        width: 30px;
        height: 30px;
        border: 3px solid rgba(255, 255, 255, 0);
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        box-shadow: 0px 0px 0px 2px #198754;
        }

        .checkBox div {
        width: 60px;
        height: 60px;
        background-color: #198754;
        top: -52px;
        left: -52px;
        position: absolute;
        transform: rotateZ(45deg);
        z-index: 100;
        }

        .checkBox input[type=checkbox]:checked + div {
        left: -10px;
        top: -10px;
        }

        .checkBox input[type=checkbox] {
        position: absolute;
        left: 50px;
        visibility: hidden;
        }

        .transition {
        transition: 300ms ease;
        }
    </style>

    <h1><b>Halaman Home</b></h1>
    <hr class="mb-5 opacity-100">

    {{-- ALERT BERHASIL TAMBAH MENU / LOGIN --}}
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <b>{{ session('success') }}</b>
        </div>
    @endif

    <div class="col-lg-12">
        <div class="row mx-auto position-relative">
            
                <div class="col-lg-3 mb-3 me-0">
                    @include('includes.sidenav')
                </div>

                <div class="col-lg-9">
                    <div class="col-xs-12">
                        <div class="row mx-auto px-0 ps-2 product-card-grid">

                            @foreach ($menu as $data)
                                {{-- @dd($data) --}}
                                {{-- satu block menu --}}
                                <div class="card mb-3 border border-black mx-2 product-card" style="width: 296px;">
                                    @auth 
                                        @if (in_array(auth()->user()->is_admin, [1]))
                                        <div class="col-1 position-absolute mt-3 me-3 align-self-end" title="Hapus Menu">
                                            <a href="/hapus-menu/{{ $data->slug }}" class="btn btn-outline-danger" onclick="return confirm('Yakin Hapus Menu?');""><b>X</b></a>
                                        </div>
                                        @endif
                                    @endauth
                                        <div class="content position-absolute">
                                            <label class="checkBox">
                                                <input id="ch1" type="checkbox" name="pilihan_menu[]" value="{{ $data->slug }}"> 
                                                <div class="transition"></div>
                                            </label>
                                        </div>
                                    
                                    <img src="/{{ $data->gambar }}" class="card-img-top checkbox-img" style="margin-top: 5%" alt="...">
                                    <hr class="opacity-100">
                                    <div class="card-body">
                                        <!-- Button trigger modal -->
                                        <h5>
                                            <a type="button" class="card-title mb-4 text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $data->id }}">
                                                <b>{{ $data->nama_menu }}</b>
                                            </a>
                                        </h5>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5 fw-bold">{{ $data->nama_menu }}</h1>
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
                                                    @php
                                                        if ($data->menu_category) {
                                                            $slug = $data->menu_category->slug;
                                                            $nama_category = $data->menu_category->nama_category;
                                                        } else {
                                                            $slug = '#';
                                                            $nama_category = '-';
                                                        }
                                                    @endphp
                                                    <a href="/home/{{ $slug }}" class="text-decoration-none text-success"><b>{{ $nama_category }}</b></a>
                                                </h5>
                                                <h5 class="col-6 card-title border border-black border-start-0 p-2 bg-success text-light text-center">{{ $data->harga }}K</h5>
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