@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Event</h1>
        <a href="{{ url('/admin/events') }}" class="btn btn-secondary">Back to Events</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ url('/admin/events/'.$event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Event Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $event->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Event Image</label>
                    @if($event->image)
                        <div class="mb-2">
                            <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    @endif
                    <input type="file" class="form-control-file" id="image" name="image">
                    <small class="form-text text-muted">Leave empty to keep the current image</small>
                </div>

                <div class="form-group">
                    <label for="date">Event Date</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" 
                           value="{{ old('date', date('Y-m-d\TH:i', strtotime($event->date))) }}" required>
                </div>

                <div class="form-group">
                    <label for="content">Event Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $event->content) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="inactive" {{ old('status', $event->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="active" {{ old('status', $event->status) === 'active' ? 'selected' : '' }}>Active</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Event</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
