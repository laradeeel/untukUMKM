@extends('layouts.app')

@section('content')
<h1><b>Halaman Profil</b></h1>
<hr class="opacity-100 mb-5">

<div class="col-lg-12 mx-3">
    <div class="card border border-black mx-auto" style="width: 320px;">

        <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                        Profile</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                        Password</button>
                </li>

            </ul>
            <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form action="{{ route('profil.update') }}" method="POST" class="mb-3">
                        @method('PUT')
                        @csrf

                        <input type="text" class="form-control border border-black @error('nama') is-invalid @enderror"
                            name="nama" placeholder="Nama Lengkap" autocomplete="off"
                            value="{{ auth()->user()->nama }}">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <hr class="opacity-100">
                        <input type="email"
                            class="form-control border border-black @error('email') is-invalid @enderror" name="email"
                            placeholder="Email" autocomplete="off" value="{{ auth()->user()->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <hr class="opacity-100">

                        <button class="btn btn-success w-100" type="submit"><b>Save</b></button>
                    </form>

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form method="POST" action="{{ route('profil.change-password') }}">
                        @csrf

                        <input name="current_password" type="password"
                            class="form-control border border-black @error('current_password') is-invalid @enderror"
                            id="currentPassword" placeholder="Current Password">
                        @error('current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <hr class="opacity-100">

                        <input name="new_password" type="password"
                            class="form-control border border-black @error('new_password') is-invalid @enderror"
                            id="newPassword" placeholder="New Password">
                        @error('new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <hr class="opacity-100">

                        <input name="reenter_password" type="password"
                            class="form-control border border-black @error('reenter_password') is-invalid @enderror"
                            id="renewPassword" placeholder="Re-enter New Password">
                        @error('reenter_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <hr class="opacity-100">

                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-100">Change Password</button>
                        </div>
                    </form>
                    <!-- End Change Password Form -->

                </div>
            </div><!-- End Bordered Tabs -->

        </div>


    </div>
</div>

<hr class="mt-5 opacity-100">
@endsection
