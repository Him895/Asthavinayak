@extends('admin2.layout.index')

@section('content')
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg max-w-xl mx-auto">
      @include('profile.partials.update-profile-information-form', ['user' => Auth::user()])
    </div>
  </div>
@endsection
