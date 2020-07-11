<div>
    {{ $slot }}
    @if(Session::has('success'))
    <p class="mt-4  alert alert-success bg-green">{{ Session::get('success') }}</p>
    @elseif(Session::has('warning'))
    <p class="mt-4 alert alert-warning">{{ Session::get('warning') }}</p>
    @elseif(Session::has('error'))
    <p class="mt-4 alert alert-danger">{{ Session::get('error') }}</p>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>