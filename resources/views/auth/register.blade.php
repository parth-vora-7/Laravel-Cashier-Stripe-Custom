@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form id="payment-form" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('plane', 'Select Plan:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('plane', ['weekly' => 'Weekly ($5)', 'montly' => 'Montly ($10)'], 'Book', [
                                'class'                       => 'form-control',
                                'required'                    => 'required',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label(null, 'Credit card number:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text(null, null, [
                                'class'                         => 'form-control',
                                'required'                      => 'required',
                                'data-stripe'                   => 'number',
                                'data-parsley-type'             => 'number',
                                'maxlength'                     => '16',
                                'data-parsley-trigger'          => 'change focusout',
                                'data-parsley-class-handler'    => '#cc-group'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label(null, 'CVC (3 or 4 digit number):', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text(null, null, [
                                'class'                         => 'form-control',
                                'required'                      => 'required',
                                'data-stripe'                   => 'cvc',
                                'data-parsley-type'             => 'number',
                                'data-parsley-trigger'          => 'change focusout',
                                'maxlength'                     => '4',
                                'data-parsley-class-handler'    => '#ccv-group'
                                ]) !!}
                            </div>
                        </div>


                        <div class="form-group">
                           {!! Form::label(null, 'Ex. Month', ['class' => 'col-md-4 control-label']) !!}
                           <div class="col-md-6">
                            {!! Form::selectMonth(null, null, [
                            'class'                 => 'form-control',
                            'required'              => 'required',
                            'data-stripe'           => 'exp-month'
                            ], '%m') !!}
                        </div>
                    </div>

                    <div class="form-group">
                       {!! Form::label(null, 'Ex. Year', ['class' => 'col-md-4 control-label']) !!}
                       <div class="col-md-6">
                         {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, [
                         'class'             => 'form-control',
                         'required'          => 'required',
                         'data-stripe'       => 'exp-year'
                         ]) !!}
                     </div>
                 </div>

                 <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
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
