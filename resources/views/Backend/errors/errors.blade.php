@if ($errors->any())

    @if($errors->count() ==1)
        <div class="alert alert-danger" role="alert">
            <span class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-exclamation-sign"></i></span><strong>{{ $errors->first() }}  !</strong>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="list-style: none;"><span class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-exclamation-sign"></i></span>
                        {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif


@if(session()->has('message'))

    <div class="alert alert-{{ session('type') }}" role="alert">
        <span class="btn btn-xs btn-{{ session('type') }}"><i class="glyphicon glyphicon-{{ session('glyphicon') }}"></i></span><strong> {{ session('message') }} !</strong>
    </div>
@endif
