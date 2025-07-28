@extends('admin2.layout.index')

@section('content')
<div class="container-fluid py-3" margin-top: 80px; border-radius: 8px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header  text-white">
                    <h5 class="mb-0">Update Password</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')

                        {{-- Current Password --}}
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" id="current_password" required>
                            @error('current_password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- New Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" id="password" required>
                            @error('password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" id="password_confirmation" required>
                            @error('password_confirmation', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Save</button>

                            @if (session('status') === 'password-updated')
                                <div class="text-success small">Password updated successfully!</div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
