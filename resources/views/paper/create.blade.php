@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Nuevo Articulo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('paper.store') }}" enctype="multipart/form-data">
                        
                        @include('paper._form')
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
