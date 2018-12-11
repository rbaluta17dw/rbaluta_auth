@extends("layouts.mainud6")

@section("content")

    <div class="container">
        <h2>Editar Mensaje</h2>
        <hr>

        <form action="{{ route('messages.update',$message->id) }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="to" class="col-form-label col-sm-2" >To</label>
                <div class="col-sm-6">
                    <input id="to" name="to" class="form-control" value="{{$user}}" readonly="readonly">
                </div>

            </div>
            <div class="form-group row">
                <label for="message" class="col-form-label col-sm-2" >Mensaje</label>
                <div class="col-sm-6">
                    <textarea id="message" name="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="5">{{$message->message}}</textarea>
                    @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('message') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary topButtonProfile">
                Modificar Mensaje
            </button>
        </form>
    </div>

@endsection
