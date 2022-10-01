@extends('layouts.app')

@section('content')
    <div class="pt-5 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-semibold">Formulario dar de alta afiliado</div>
                    <div class="card-body">

                        <div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        
                        {{ Form::open(['route' => ['employees.store']]) }}

                        <div class="form-group">
                            {{ Form::label('name') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('lastname') }}
                            {{ Form::text('lastname', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('date of birth') }}
                            {{ Form::date('date_of_birth', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('DNI') }}
                            {{ Form::number('DNI', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email') }}
                            {{ Form::email('email', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('phone number') }}
                            {{ Form::text('phone_number', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('street') }}
                            {{ Form::text('street', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('number') }}
                            {{ Form::number('number', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('city') }}
                            {{ Form::text('city', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('province') }}
                            {{ Form::text('province', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('role_id') }}
                            {{ Form::text('role_id', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password') }}
                            {{ Form::password('password', null, ['class' => 'form-control']) }}
                        </div>

                        {{Form::submit("SUBMIT!")}}

                        {{Form::close()}}
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection