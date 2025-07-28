@extends('.admin2.layout.index')

@section('content')
<div class="container mt-5" style="margin-top: 80px;">
  <h3>⚙ Settings</h3>
  <div class="list-group">
    <a href="{{ route('profile.edit') }}" >✏ Edit Profile</a>
    <br><br>

     <a href="{{ route('password.form') }}" >✏ Password Change</a>

  </div>
</div>
@endsection
