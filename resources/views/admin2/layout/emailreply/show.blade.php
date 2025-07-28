@extends('admin2.layout.index')

@section('content')
<div class="container py-5 d-flex justify-content-center" style="margin-top: 100px;">
    <div class="card p-4 w-100" style="max-width: 700px; background-color: #1e293b; color: #ffffff; border: none;">
        <h4 class="mb-4">Reply to <strong>{{ $message->name }}</strong> ({{ $message->email }})</h4>

        <form action="{{ route('admin2.messages.reply', $message->id) }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="subject" class="form-label" style="color: #f1f1f1;">Subject</label>
                <input type="text" id="subject" name="subject" class="form-control"
                    style="background-color: #334155; color: #ffffff; border: 1px solid #475569;"
                    value="Reply from Admin" required>
            </div>

            <div class="form-group mb-4">
                <label for="message" class="form-label" style="color: #f1f1f1;">Message</label>
                <textarea id="message" name="message" class="form-control" rows="6"
                    style="background-color: #334155; color: #ffffff; border: 1px solid #475569;" required></textarea>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">Send Reply</button>
            </div>
        </form>
    </div>
</div>
@endsection
