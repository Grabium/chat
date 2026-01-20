@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">


                            <label for="language" class="col-md-4 col-form-label text-md-end">{{ __('Language') }}</label>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <label for="brazil" class="form-check-label">
                                    <img src="{{url('assets/images/brazil-flag.png')}}" alt="brazil" width="18" height="18">
                                    </label>
                                    <input type="radio" name="language" id="brazil" class="form-check-input" value="pt" checked>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label for="usa" class="form-check-label">
                                        <img src="{{url('assets/images/usa-flag.png')}}" alt="usa" width="18" height="18">
                                    </label>
                                    <input type="radio" name="language" id="usa" class="form-check-input" value="en">
                                </div>
                            </div>
                        </div>   
                        
                        <div class="row mb-3">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
                            <div class="col-md-6">
                                @foreach(avatar() as $avatar)
                                    <div class="form-check form-check-inline">
                                        <label for="{{$avatar}}" class="form-check-label">
                                            <img src="{{$avatar}}" width="18" height="18"  alt="avatar" >
                                        </label>
                                        <input type="radio" name="avatar" value="{{$avatar}}" class="form-check-input">
                                    </div>
                                @endforeach                                    
                            </div>
                        </div>
                    

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
