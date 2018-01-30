@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <br/>
            <h3 align="center">Add Data</h3>
            <br/>
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
            <form method="post" action="{{url('person')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="firstname" class="form-control" placeholder="Enter First Name"/>
                </div>
                <div class="form-group">
                    <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
@endsection