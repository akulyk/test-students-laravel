@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        {{ Form::open(array('url' => route('update',['id'=>Auth::user()->id]),
                        'class'=>'form-horizontal')) }}


                            <div class="form-group{{ $errors->has('User.email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="User[email]" value="{{ old('User.email') }}" required>

                                    @if ($errors->has('User.email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('User.email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('Student.firstname') ? ' has-error' : '' }}">
                                <label for="student.firstname" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="student.firstname" type="text" class="form-control"
                                           name="Student[firstname]" value="{{ old('Student.firstname') }}" required>

                                    @if ($errors->has('Student.firstname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Student.firstname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('Student.lastname') ? ' has-error' : '' }}">
                                <label for="student.lastname" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="student.lastname" type="text" class="form-control"
                                           name="Student[lastname]" value="{{ old('Student.lastname') }}" required>

                                    @if ($errors->has('Student.lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Student.lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('Student.birthdate') ? ' has-error' : '' }}">
                                <label for="student.birthdate" class="col-md-4 control-label">Birth Date</label>

                                <div class="col-md-6">
                                    <input id="student.birthdate" type="date" class="form-control"
                                           name="Student[birthdate]" value="{{ old('Student.birthdate') }}" required>

                                    @if ($errors->has('Student.birthdate'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Student.birthdate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('Student.gender') ? ' has-error' : '' }}">
                                <label for="student.gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    {{Form::select('Student[gender]',
                                     array(''=>'Select your gender','M' => 'Male', 'F' => 'Female'),old('Student.gender'),
                                     array('id'=>'student.gender','class'=>'form-control','required'))}}

                                    @if ($errors->has('Student.gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Student.gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('Student.group_number') ? ' has-error' : '' }}">
                                <label for="student.group_number" class="col-md-4 control-label">Group Number</label>

                                <div class="col-md-6">
                                    {{Form::text('Student[group_number]',old('Student.group_number'),
                                            array('class'=>'form-control','id'=>'student.group_number','required'))}}

                                    @if ($errors->has('Student.group_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Student.group_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('Student.rates') ? ' has-error' : '' }}">
                                <label for="student.group_number" class="col-md-4 control-label">Rates</label>

                                <div class="col-md-6">
                                    {{Form::text('Student[rates]',old('Student.rates'),
                                            array('class'=>'form-control','id'=>'student.rates','required'))}}

                                    @if ($errors->has('Student.rates'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('Student.rates') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('Student.location') ? ' has-error' : '' }}">
                                <label for="student.location" class="col-md-4 control-label">Location</label>

                                <div class="col-md-6">
                                    {{Form::select('Student[location]',
                                     array(''=>'Select your location','local' => 'Local', 'foreign' => 'Foreign'),
                                     old('Student.location'),
                                     array('id'=>'student.location','class'=>'form-control','required'))}}

                                    @if ($errors->has('Student.location'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Student.location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        {{ Form::hidden('Student[user_id]',Auth::user()->id) }}


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection