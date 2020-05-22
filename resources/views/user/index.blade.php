@extends('layouts.app')

@section('title', 'Publicistas')

@section('content')

<h1 class="text-center">Publicistas</h1>

@include('partials.session-status')

<a class="btn btn-success mt-3 mb-3" href="{{route('user.create')}}">Nuevo Publicista</a>

<table class="table">
    <thead>
        <tr>
            <td>
                Id
            </td>
            <td>
                Nombre
            </td>
            <td>
                Apodo
            </td>
            <td>
                Correo Electronico
            </td>
            <td>
                Acciones
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>
                {{$user->id}}
            </td>
            <td>
                {{$user->name}}
            </td>
            <td>
                {{$user->nickname}}
            </td>
            <td>
                {{$user->email}}
            </td>
            <td>
                <a class="btn btn-sm btn-info" href="{{route('user.show', $user)}}">Ver</a>
                <a class="btn btn-sm btn-warning" href="{{route('user.edit', $user)}}">Editar</a>
                <button data-toggle="modal" data-target="#eliminarModal" data-id="{{$user->id}}" class="btn btn-sm btn-danger" type="button">Eliminar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$users->links()}}

<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿Desea eliminar el publicista seleccionado?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <form id="formDelete" method="POST" action="{{route('user.destroy', 0)}}" data-action="{{route('user.destroy', 0)}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
      </div>
    </div>
</div>

<script>
    window.onload=function(){
        $('#eliminarModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            action = $('#formDelete').attr('data-action').slice(0,-1);
            var modal = $(this);
            $('#formDelete').attr('action', action+id);
            modal.find('.modal-title').text('Estas eliminando el publicista con id: ' + id);
        })
    }
</script>

@endsection
