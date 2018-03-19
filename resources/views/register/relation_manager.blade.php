@extends('admin')

@section('content')
    <div class="container">
        @if ($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>        
                @endforeach
            </div>
        @endif
        
        {!! Form::open(array('url' => '/relationmanager_register', 'method' => 'post', 'class' => 'form-horizontal', 'method' => 'post')) !!}
            {{ csrf_field() }}
            <h2>Add/change relationmanager</h2>
            <div class="form-group">
                <label for="Naam_relatiemanager" class="col-sm-3 control-label">Naam relatiemanager</label>
                <div class="col-sm-9">
                    <input type="text" id="Naam_relatiemanager"  name="Naam_relatiemanager" value="{!!old('Naam_relatiemanager')!!}" placeholder="nm_rm" class="form-control" autofocus>
                </div>
            </div>
             <div class="form-group">
                <label for="Voorletters_relatiemanager" class="col-sm-3 control-label">Voorletters relatiemanager</label>
                <div class="col-sm-9">
                    <input type="text" id="Voorletters_relatiemanager" name="Voorletters_relatiemanager" value="{!!old('Voorletters_relatiemanager')!!}" placeholder="vl_rm" class="form-control" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Geslacht</label>
                <div class="col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input class="radio" style = "position: absolute;" type="radio" id="Geslacht_Heer" name="Geslacht" value="Heer">
                        </label>
                        <label>
                            Heer
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input class="radio" style = "position: absolute;" type="radio" id="Geslacht_Mevrouw" name="Geslacht" value="Mevrouw">
                        </label>
                         <label>
                            Mevrouw
                        </label>
                    </div>
                </div>
            </div> <!-- /.form-group -->
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">E-mail</label>
                <div class="col-sm-9">
                    <input type="email" id="email" name="email" value="{!!old('email')!!}" placeholder="e-mail_kl" class="form-control">
                </div>
            </div>
             <div class="form-group">
                <label for="h_email" class="col-sm-3 control-label">Herhaal e-mail</label>
                <div class="col-sm-9">
                    <input type="email" id="h_email" name="h_email" value="{!!old('h_email')!!}" class="form-control">
                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" name="submit_Terug" value="newAccount" class="btn btn-success btn-icon" > Terug zonder opslaan</button>
                <button type="submit" name="submit_Toevoegen" value="newAccount" class="btn btn-success btn-icon"> Toevoegen/wijzigen </button>

            </div>
        {{ Form::close() }}
    </div> <!-- ./container -->
@stop