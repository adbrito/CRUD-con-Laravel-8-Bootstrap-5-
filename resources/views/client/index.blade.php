@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">

        <h1>Listado de clientes</h1>
        <a href="{{ route('client.create') }}" class="btn btn-primary">Crear cliente</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ Session::get('mensaje') }}
            </div>
        @endif


        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Saldo</th>
                <th>Acciones</th>
            </thead>
            <tbody>

                @forelse ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->due }}</td>
                        <td>
                            <a href="{{ route('client.edit', $client) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('client.destroy', $client) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Está seguro de eliminar este cliente?')">Eliminar</button>

                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4"> No hay registros!</td>
                    </tr>
                @endforelse


            </tbody>
        </table>
        <div class="text-center">

        </div>
        @if ($clients->count())
            {{ $clients->links() }}
        @endif


    </div>
@endsection
