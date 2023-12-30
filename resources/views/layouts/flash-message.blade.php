@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(()=>show=false, 3000)" x-show="show" class="fixed top-0 bg-black text-white px-48 py-3 left-1/2 transform-translate-1/2">
        <p>
        {{ session('message') }}
        </p>
    </div>

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