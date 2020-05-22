@extends('layouts.app')

@section('content')     
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Articulo ')." ".$paper->id }}</div>

                <div class="card-body">

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $paper->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="categorie" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

                        <div class="col-md-6">
                            <input id="categorie" type="text" class="form-control" name="categorie" value="{{ $paper->categorie->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control" name="description" value="{{ $paper->description }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="revision_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Revision') }}</label>

                        <div class="col-md-6">
                            <input id="revision_date" type="text" class="form-control" name="revision_date" value="{{ $paper->revision_date }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                        <div class="col-md-6">
                            <input id="state" type="text" class="form-control" name="state" value="{{ $paper->state }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="document" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

                        <div class="col-md-6">
                            <a href="{{ route('paper.download',$paper) }}" class="btn btn-secondary btn-block">
                                {{ __('Descargar') }}
                            </a>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="mx-auto">
                            <a href="{{ route('paper.index') }}" class="btn btn-primary">
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