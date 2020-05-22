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
                Publicado Por
            </td>
            <td>
                Estado
            </td>
            <td>
                Fecha de Revision
            </td>
            <td>
                Descripcion
            </td>
            <td>
                Acciones
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach($papers as $paper)
        <tr>
            <td>
                {{$paper->id}}
            </td>
            <td>
                {{$paper->name}}
            </td>
            <td>
                {{$paper->user->email}}
            </td>
            <td>
                {{$paper->state}}
            </td>
            <td>
                {{$paper->revision_date}}
            </td>
            <td>
                {{$paper->description}}
            </td>
            <td>
                <a class="btn btn-sm btn-info" href="{{route('paper.show', $paper)}}">Ver</a>

                @auth
                    @if ( $paper->user_id == auth()->user()->id )
                        <a class="btn btn-sm btn-warning" href="{{route('paper.edit', $paper)}}">Editar</a>
                        <button data-toggle="modal" data-target="#eliminarModal" data-id="{{$paper->id}}" class="btn btn-sm btn-danger" type="button">Eliminar</button>
                    @endif
                @endauth
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

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
          <p>¿Desea eliminar el Articulo seleccionado?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <form id="formDelete" method="POST" action="{{route('paper.destroy', 0)}}" data-action="{{route('paper.destroy', 0)}}">
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
            modal.find('.modal-title').text('Estas eliminando el Articulo con id: ' + id);
        })
    }
</script>