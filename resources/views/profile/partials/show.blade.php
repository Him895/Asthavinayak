@extends('admin2.layout.index')

@section('content')
<div class="container-fluid py-3" style="margin-top: 80px;">
  <div class="card shadow-sm border-0 p-4 text-white">
    <div class="d-flex flex-column align-items-center">
      <div class="ratio ratio-1x1 rounded-circle overflow-hidden mb-3" style="width: 150px;">
        <img src="{{ asset('storage/' . $user->profile_image) }}"
             alt="Profile Image"
             class="object-fit-cover w-100 h-100">
      </div>
      <h3 class="mb-3">👤 My Profile</h3>
      <table class="table table-bordered text-white bg-transparent w-auto mx-auto">
        <tr><th>Name</th><td>{{ $user->name }}</td></tr>
        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
        <tr><th>Mobile</th><td>{{ $user->mobile ?? 'Not Provided' }}</td></tr>
        <tr><th>Company</th><td>{{ $user->company_name ?? 'Not Provided' }}</td></tr>
      </table>
    </div>
  </div>
</div>
@endsection
