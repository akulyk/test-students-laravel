@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                @unless( empty( $students ) )
                <table class="table">
                    <thead>
                        <th>@sortablelink('id')</th>
                        <th>@sortablelink('firstname')</th>
                        <th>@sortablelink('lastname')</th>
                        <th>@sortablelink('group_number')</th>
                        <th>@sortablelink('rates')</th>
                    </thead>
                    <tbody>
                    @foreach( $students as $student )
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->firstname}}</td>
                            <td>{{$student->lastname}}</td>
                            <td>{{$student->group_number}}</td>
                            <td>{{$student->rates}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                            {!! $students->appends(\Request::except('page'))->render() !!}
                @endunless
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
