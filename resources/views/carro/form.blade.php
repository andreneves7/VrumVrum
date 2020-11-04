<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Lugares:') }}</label>

    <div class="col-md-6">
        <input type="text" name="lugares" id="numero" value="{{ old('lugares', $carro->lugares ?? '')}}">
        @if ($errors->has('lugares'))
        {{ $errors->first('lugares') }}
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Matricula') }}</label>

    <div class="col-md-6">
        <input type="text" name="matricula" id="matriculaInput" value="{{ old('matricula', $carro->matricula ?? '')}}">
        @if ($errors->has('matricula'))
        {{ $errors->first('matricula') }}
        @endif

    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Seguro') }}</label>

    <div class="col-md-6">
        <input type="date" name="seguro" id="seguroInput" value="{{ old('seguro', $carro->seguro ?? '')}}">
        @if ($errors->has('seguro'))
        {{ $errors->first('seguro') }}
        @endif

    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Inspeção') }}</label>

    <div class="col-md-6">
        <input type="date" name="inspecao" id="inspeçãoInput" value="{{ old('inspecao', $carro->inspecao ?? '')}}">
        @if ($errors->has('inspeção'))
        {{ $errors->first('inspeção') }}
        @endif

    </div>
</div>