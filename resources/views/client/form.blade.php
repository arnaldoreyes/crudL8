@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        @if (isset($client))
            <h1>Editar cliente</h1>
        @else
            <h1>Crear cliente</h1>
        @endif

        @if (isset($client))
            <form action="{{route('client.update', $client)}}"" method="POST">
            @method('PUT')
        @else
            <form action="{{route('client.store')}}"" method="POST">
        @endif

            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelpId" placeholder="Nombre del Cliente" value="{{old('name') ?? @$client->name }}">
              <small id="nameHelpId" class="form-text text-muted">Escriba nombre del cliente</small>
              @error('name')
                  <p class="form-text text-danger" >{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3">
                <label for="due" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="due" id="due" aria-describedby="dueHelpId" placeholder="Saldo del Cliente" step="0.01" value="{{old('due') ??  @$client->due }}">
                <small id="dueHelpId" class="form-text text-muted">Escriba saldo del cliente</small>
                @error('due')
                  <p class="form-text text-danger" >{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
              <label for="comments" class="form-label">Comentarios</label>
              <textarea class="form-control" name="comments" id="comments" rows="4" value="{{old('comments') ??  @$client->comments }}"></textarea>
              <small id="commentsHelpId" class="form-text text-muted">Escriba algunos Comentarios</small>
            </div>

            @if (isset($client))
                <button type="submit" class="btn btn-primary">Editar Cliente</button>
            @else
                <button type="submit" class="btn btn-primary">Guardar Cliente</button>
            @endif

        </form>
    </div>
@endsection
