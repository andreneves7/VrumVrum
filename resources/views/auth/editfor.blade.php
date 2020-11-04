<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email', $user->email ?? '') }}" required autocomplete="email">

    @if ($errors->has('email'))
    {{ $errors->first('email') }}
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    @endif    
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" value="{{ old('password', $user->password ?? '') }}"  required autocomplete="new-password">

    @if ($errors->has('password'))
        {{ $errors->first('password') }}
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    @endif    
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password', 
        $user->password ?? '') }}"  required autocomplete="new-password">

    @if ($errors->has('password'))
        {{ $errors->first('password') }}
    @endif    
    </div>
</div>
<div class="form-group row">
    <label for="contacto" class="col-md-4 col-form-label text-md-right">contacto</label>

    <div class="col-md-6">
        <input id="contacto" type="contacto" class="form-control @error('contacto') is-invalid @enderror"
            name="contacto" value="{{ old('contacto', $user->contacto ?? '') }}" required>

    @if ($errors->has('contacto'))
       {{ $errors->first('contacto') }}
       @error('contacto')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    @endif    

     
    </div>
</div>
