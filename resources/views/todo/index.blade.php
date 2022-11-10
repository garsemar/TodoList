@extends('todo')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('todo') }}" method="POST">
            @csrf
            @if(session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Titulo tarea</label>
                <input type="text" class="form-control" name="title">
              </div>
              <button type="submit" class="btn btn-primary">Crear tarea</button>
        </form>

        <div>
            @foreach ($todo as $i)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('todo-show', ['id' => $i->id]) }}">{{ $i -> title }}</a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('todo-destroy', ['id' => $i->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
