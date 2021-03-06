@extends('master')

@section('content')
    <div class="row">
        <h1 class="text-danger text-center">People</h1>
        <hr/>
        <div class="row">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
            @endif
            <div class="col-md-9 col-md-offset-1">
                <br/>
                <br/>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                    </thead>
                    @foreach($people as $row)
                        <tr>
                            <td>{{$row['id']}}</td>
                            <td>{{$row['firstname']}}</td>
                            <td>{{$row['lastname']}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection