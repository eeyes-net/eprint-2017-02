@if ($success = session()->pull('success'))
    <div class="form-group">
        <div class="alert alert-success">
            @foreach($success as $success1)
                <p>{{ $success1 }}</p>
            @endforeach
        </div>
    </div>
@endif
