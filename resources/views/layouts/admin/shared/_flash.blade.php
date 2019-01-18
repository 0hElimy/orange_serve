@if (count($errors) > 0)
    <div class="alert alert-danger no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <ol>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
@endif


@if (session('success'))
    <div class="alert alert-success no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        {{ session('error') }}
    </div>
@endif