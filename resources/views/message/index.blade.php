@extends("layouts.mainud6")

@section("content")

  <?php
    date_default_timezone_set('Europe/Madrid');
    $now = date('Y/m/j H:i:s');
    $fechamargen = strtotime ( '-15 minute' , strtotime ( $now ) ) ;
    $fechavista = date ( 'Y/m/j H:i:s' , $fechamargen );
   ?>
   <h3>Mensajes enviados</h3>

  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Id</th>
        <th>To</th>
        <th>Message</th>
        <th>Fecha/Hora</th>
        <th style="width:15px"></th>
        <th style="width:15px"></th>
        <th style="width:15px"></th>
      </tr>
      </thead>
    <tbody>
      @foreach ($messages_enviados as $m)
      <tr>
        <td>{{$m->id}}</td>
        <td>{{$m->userto->name}}</td>
        <td>{{substr($m->message, 0, 30)}}{{strlen($m->message)>30?'...':''}}</td>
        <td>{{date("j/m/Y H:i:s", strtotime($m->datetime))}}</td>
        <td>
        <a title="Ver" href="{{route ('messages.show',$m->id)}}"><i class="fa fa-eye" style="color:green"></i></a>
        </td>
        <td>
        @if ($fechamargen<strtotime($m->datetime))
          <a title="Editar" href="{{route ('messages.edit',$m->id)}}"><i class="fa fa-pencil"></i></a>
        @endif
        </td>
        <td>
        <form style="display:inline" action="{{ route('messages.destroy',$m->id) }}" method="POST">
           {{ method_field('DELETE') }}
           {{ csrf_field() }}
           <button type="submit" id="delete" style="background: none;padding: 0px;border: none;color:red">
              <i class="fa fa-trash-o"></i>
            </button>
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
    </table>

    <h3>Mensajes recibidos</h3>

    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Id</th>
          <th>From</th>
          <th>Message</th>
          <th>Fecha/Hora</th>
          <th style="width:15px"></th>
          <th style="width:15px"></th>
          <th style="width:15px"></th>
        </tr>
        </thead>
      <tbody>
        @foreach ($messages_recibidos as $m)
        <tr>
          <td>{{$m->id}}</td>
          <td>{{$m->userfrom->user}}</td>
          <td>{{substr($m->message, 0, 30)}}{{strlen($m->message)>30?'...':''}}</td>
          <td>{{date("j/m/Y H:i:s", strtotime($m->datetime))}}</td>
          <td>
          <a title="Ver" href="{{route ('messages.show',$m->id)}}"><i class="fa fa-eye" style="color:green"></i></a>
          </td>
          <td>
            <a title="Responder" href="{{route ('messages.response',$m->id)}}"><i class="fa fa-share"></i></a>
          </td>
          <td>
          <form style="display:inline" action="{{ route('messages.destroy',$m->id) }}" method="POST">
             {{ method_field('DELETE') }}
             {{ csrf_field() }}
             <button type="submit" id="delete" style="background: none;padding: 0px;border: none;color:red">
                <i class="fa fa-trash-o"></i>
              </button>
          </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      </table>

@endsection
