@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2 style="margin-bottom:15px;">{{ __('Register') }}</h2></div>

                <div class="card-body">
                    <form enctype="multipart/form-data"  method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name*') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                                <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name*') }}</label>
    
                                <div class="col-md-6">
                                    <input id="lname" type="text" class="input @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
    
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone*') }}</label>
    
                                <div class="col-md-6">
                                    <input id="Phone" type="tel" class="input @error('Phone') is-invalid @enderror" name="Phone" value="{{ old('Phone') }}" required autocomplete="Phone" autofocus>
    
                                    @error('Phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                    <label for="pic" class="col-md-4 col-form-label text-md-right">{{ __('Upload Your Picture') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="pics" type="file" class="button @error('pic') is-invalid @enderror" name="pic">
        
                                        @error('pic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            <div class="form-group row">
                                    <label for="adl1" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 1*') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="adl1" type="text" class="input @error('adl1') is-invalid @enderror" name="adl1" value="{{ old('adl1') }}" required autocomplete="adl1" autofocus>
        
                                        @error('adl1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="adl2" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 2') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="adl2" type="text" class="input @error('adl2') is-invalid @enderror" name="adl2" value="{{ old('adl2') }}" required autocomplete="adl2" autofocus>
            
                                            @error('adl2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="city" type="text" class="input @error('city') is-invalid @enderror" name="city" value="Zawtar Charkieh " required autocomplete="city" autofocus>
                
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" style="padding-left:35%;">
                                <button type="submit" class="btn primary-btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
