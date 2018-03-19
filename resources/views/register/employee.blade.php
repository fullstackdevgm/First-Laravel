
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
         {!! Form::open(array('url' => '/employee_register', 'method' => 'post', 'class' => 'form-horizontal', 'method' => 'post')) !!}
            <h2>Add/change klant</h2>
            <div class="form-group">
                <label for="Naam_klant" class="col-sm-3 control-label">Naam klant</label>
                <div class="col-sm-9">
                    <input type="text" id="Naam_klant" name="Naam_klant" placeholder="Naam klant" class="form-control" value="{!!old('Naam_klant')!!}" autofocus>

                </div>
            </div>
             <div class="form-group">
                <label for="Voorletters_klant" class="col-sm-3 control-label">Voorletters klant</label>
                <div class="col-sm-9">
                    <input type="text" id="Voorletters_klant" name="Voorletters_klant" placeholder="Voorletters klant" class="form-control" value="{!!old('Voorletters_klant')!!}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3">Geslacht</label>
                <div class="col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input class="radio" style = "position: absolute;" type="radio" id="Geslacht" name="Geslacht" value= "Heer" >
                        </label>
                        <label>
                            Heer
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input class="radio" style = "position: absolute;" type="radio" id="Geslacht" name="Geslacht" value="Mevrouw">
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
                    <input type="email" id="email" name="email" placeholder="e-mail_kl" class="form-control" value="{!!old('email')!!}">
                </div>
            </div>
             <div class="form-group">
                <label for="h_email" class="col-sm-3 control-label">Herhaal e-mail</label>
                <div class="col-sm-9">
                    <input type="email" id="h_email" name="h_email" class="form-control" value="{!!old('h_email')!!}">
                </div>
            </div>
        <div class="form-group">
            <label for="gebrnm_kl" class="col-sm-3 control-label">Gebruikersnaam</label>
            <div class="col-sm-9">
                <input type="text" id="gebrnm_kl" name="gebrnm_kl" placeholder="gebrnm_kl" class="form-control" value="{!!old('gebrnm_kl')!!}">
            </div>
        </div>
         <div class="form-group">
            <label for="h_gebrnm_kl" class="col-sm-3 control-label">Herhaal gebruikersnaam</label>
            <div class="col-sm-9">
                <input type="text" id="h_gebrnm_kl" name="h_gebrnm_kl" class="form-control" value="{!!old('h_gebrnm_kl')!!}">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
                <input type="password" id="password" name="password" placeholder="pw_kl" class="form-control">
            </div>
        </div>
         <div class="form-group">
            <label for="h_password" class="col-sm-3 control-label">Herhaal password</label>
            <div class="col-sm-9">
                <input type="password" id="h_password" name="h_password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Telefoonnummer</label>
            <div class="col-sm-9">
                <input type="text" id="phone" name="phone" class="form-control" value="{!!old('phone')!!}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Premium</label>
            <div class="col-sm-9">
                <div class="checkbox">
                    <label>
                        <input class="radio" style = "position: absolute;" type="radio" id="jaCheckbox" name="jaCheckbox" value="1">
                    </label>
                    <label>
                        ja
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="radio" style = "position: absolute;" type="radio" id="neeCheckbox" name="jaCheckbox" value="1">
                    </label>
                    <label>
                        nee
                    </label>
                </div>
            </div>
        </div> <!-- /.form-group -->
         <div class="form-group">
            <label for="country" class="col-sm-3 control-label">Bedrijf</label>
            <div class="col-sm-9">
                <select id="Bedrijf" name="Bedrijf" class="form-control" value="{!!old('Bedrijf')!!}">
                    <option>Afghanistan</option>
                    <option>Bahamas</option>
                    <option>Cambodia</option>
                    <option>Denmark</option>
                    <option>Ecuador</option>
                    <option>Fiji</option>
                    <option>Gabon</option>
                    <option>Haiti</option>
                </select>
            </div>

        </div> <!-- /.form-group -->
        <div class="modal-footer">

                <button type="submit" name="submit_Terug" value="newAccount" class="btn btn-success btn-icon" > Terug zonder opslaan</button>
                <button type="submit" name="submit_Toevoegen" value="newAccount" class="btn btn-success btn-icon"> Toevoegen/wijzigen </button>

            </div>
        {!! Form::close() !!}
    </div> <!-- ./container -->
@stop