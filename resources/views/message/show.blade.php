@extends("layouts.mainud6")

@section("content")

    <div class="container">
        <h2>Ver Mensaje</h2>
        <hr>

        <form action="{{ route('messages.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="to" class="col-form-label col-sm-2" >From</label>
                <div class="col-sm-6">
                    <input id="to" name="to" class="form-control" value="{{$user}}" readonly="readonly">
                </div>

            </div>
            <div class="form-group row">
                <label for="message_inicial" class="col-form-label col-sm-2" >Mensaje</label>
                <div class="col-sm-6">
                    <textarea id="message_inicial" name="message_inicial" class="form-control" readonly="readonly">{{$message->message}}</textarea>
                </div>
            </div>
            @if ($responder==0)
              <a href="{{route('messages.index')}}" class="btn btn-primary active" role="button">Volver</a>
            @else
              <div class="form-group row">
                  <label for="message" class="col-form-label col-sm-2" >Respuesta</label>
                  <div class="col-sm-6">
                      <textarea id="message" name="message" class="form-control" rows="5"></textarea>
                  </div>
              </div>
              <button type="submit" class="btn btn-primary topButtonProfile">
                  Responder
              </button>
          @endif
        </form>
    </div>

@endsection
