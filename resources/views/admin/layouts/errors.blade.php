@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->any() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif