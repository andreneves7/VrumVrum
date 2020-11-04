<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Data Boleia:') }}</label>

    <div class="col-md-6">
        <input type="date" name="data_boleia" id="boleia" value="{{ old('data_boleia', $viagem->data_boleia ?? '')}}">

        @if ($errors->has('data_boleia'))
        {{ $errors->first('data_boleia') }}
        @endif

    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Destino') }}</label>

    <div class="col-md-6">
        <input type="text" id="destinoInput" name="destino" value="{{ old('destino', $viagem->destino ?? '')}}">
        @if ($errors->has('destino'))
        {{ $errors->first('destino') }}
        @endif

    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Origem') }}</label>

    <div class="col-md-6">
        <input type="text" id="origemInput" name="origem" value="{{ old('origem' , $viagem->origem ?? '')}}">
        @if ($errors->has('origem'))
        {{ $errors->first('origem') }}
        @endif

    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Carros') }}</label>

    <div class="col-md-6">
        <select name="idcarro">
            @foreach ($carros as $carro)
            <option value="{{ $carro->id }}">
                {{ $carro->matricula }}
            </option>

            @endforeach
        </select>
        @if ($errors->has('idcarro'))
        {{ $errors->first('idcarro') }}
        @endif

    </div>
</div>