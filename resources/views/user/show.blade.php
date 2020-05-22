@extends('layouts.app')

@section('content')     
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Publicista ')." ".$user->id }}</div>

                <div class="card-body">

                    <div class="form-group row">
                        <div class="col-md-6 mx-auto">
                            <img src="{{ $user->img }}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('Apodo') }}</label>

                        <div class="col-md-6">
                            <input id="nickname" type="text" class="form-control" name="nickname" value="{{ $user->nickname }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="document_type" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de documento') }}</label>

                        <div class="col-md-6">
                            <input id="document_type" type="text" class="form-control" name="document_type" value="{{ $user->document_type }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="document_number" class="col-md-4 col-form-label text-md-right">{{ __('Numero de documento') }}</label>

                        <div class="col-md-6">
                            <input id="document_number" type="text" class="form-control" name="document_number" value="{{ $user->document_number }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>

                        <div class="col-md-6">
                            <input id="birth_date" type="text" class="form-control" name="birth_date" value="{{ $user->birth_date }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="mx-auto">
                            <a href="{{ route('user.index') }}" class="btn btn-primary">
                                {{ __('Regresar') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection