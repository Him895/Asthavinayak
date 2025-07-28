@extends('admin2.layout.index')

@section('content')
<div class="container py-5" style="margin-top: 80px;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow b text-white border-0">
                <div class="card-header  text-white">
                    <h4 class="mb-0">Profile Information</h4>
                </div>

                <div class="card-body" text-white>
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label" >Name</label>
                            <input type="text" id="name" name="name"
                                class="form-control form-control-sm @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email"
                                class="form-control form-control-sm @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <small class="text-warning">Your email address is unverified.</small>
                                    <button form="send-verification" class="btn btn-link btn-sm text-decoration-underline text-light">
                                        Click here to re-send the verification email.
                                    </button>
                                    @if (session('status') === 'verification-link-sent')
                                        <div class="text-success small mt-1">A new verification link has been sent.</div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        {{-- Mobile --}}
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="number" id="mobile" name="mobile"
                                class="form-control form-control-sm @error('mobile') is-invalid @enderror"
                                value="{{ old('mobile', $user->mobile) }}" required>
                            @error('mobile')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Profile Image --}}
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" id="profile_image" name="profile_image"
                                class="form-control form-control-sm @error('profile_image') is-invalid @enderror">
                            @error('profile_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Company Name --}}
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" id="company_name" name="company_name"
                                class="form-control form-control-sm @error('company_name') is-invalid @enderror"
                                value="{{ old('company_name', $user->company_name) }}">
                            @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Save</button>

                            @if (session('status') === 'profile-updated')
                                <small class="text-success">Saved successfully!</small>
                            @endif
                        </div>
                    </form>
                </div> {{-- card-body --}}
            </div>
        </div>
    </div>
</div>
@endsection
