@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">

        @if (isset($client))
            <h1>Modificar cliente</h1>
        @else
            <h1>Crear clientes</h1>
        @endif



        @if (isset($client))
            <form action="{{ route('client.update', $client) }}" method="post">
                @method('PUT')
            @else
                <form action="{{ route('client.store') }}" method="post">
        @endif
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Nombre del cliente"
                value="{{ (old('name'))  ? : $client->name  }}">
            @error('name')
                <p class="class form-text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="due" class="form-label">Saldo</label>
            <input type="number" name="due" class="form-control" placeholder="Saldo del cliente" step="0.01"
                value="{{ (old('due')) ?    : $client->due}}">
            @error('due')
                <p class="class form-text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="comments" class="form-label">Comentarios</label>
            <textarea name="comments"   cols="30" rows="4" class="form-control"
                value="{{ (old('comments')) ?  : $client->comments  }}"></textarea>
            @error('comments')
                <p class="class form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        @if (isset($client))
            <button type="submit" class="btn btn-info">Editar cliente</button>
        @else
            <button type="submit" class="btn btn-info">Guardar cliente</button>
        @endif


        </form>
    </div>
@endsection
