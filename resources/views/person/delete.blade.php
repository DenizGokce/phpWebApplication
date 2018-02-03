@extends('master')

@section('content')
    <h1 class="text-center text-danger" xmlns="http://www.w3.org/1999/html">
        Delete Person
    </h1>
    <br/>
    <div class="row">
        <div class="col-md-3">
            <h3 class="text-danger">Select Person</h3>
            <hr/>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="peopleDropdown"
                        data-toggle="dropdown">
                    Select Person
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="peopleDropdown" id="peopleDropdownUL">
                    @foreach($people as $row)
                        <li>
                            <a dropdown-val="{{$row['id']}}">{{$row['firstname'] . " " . $row['lastname']}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-7">
            <div>
                <div class="form-group">
                    <label class="inputEmail">ID</label>
                    <input type="text" name="id" class="form-control input-lg" placeholder="Person ID" disabled>
                </div>
                <div class="form-group">
                    <label class="inputPassword">First Name</label>
                    <input type="text" name="firstname" class="form-control input-lg"
                           placeholder="Person First Name">
                </div>
                <div class="form-group">
                    <label class="inputPassword">Last Name</label>
                    <input type="text" name="lastname" class="form-control input-lg" placeholder="Person Last Name">
                </div>
                <button class="btn btn-info form-control input-lg" id="delete">Delete</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#peopleDropdownUL li a").on("click", function () {
                // Get text from anchor tag
                var id = $(this).attr('dropdown-val');
                // Add text and caret to the Select button
                var text = $(this).text();
                $("#peopleDropdown").html(text + '&nbsp;<span class="caret"></span>');
                // Put text into hidden field from model
                //$("#peopleDropdown").val(text);
                $.ajax({
                    type: "GET",
                    url: "/person/" + id,
                    contentType: "application/json",
                    success: function (data, textStatus, jqXHR) {
                        if (data) {
                            var response = $.parseJSON(data);
                            $("input[name='id']").val(response.id);
                            $("input[name='firstname']").val(response.firstname);
                            $("input[name='lastname']").val(response.lastname);
                        } else {
                            console.log(data);
                        }
                    },
                    error: function (jqXHR) {
                        console.log('Error: ' + jqXHR.statusText);
                    },
                    async: true,
                    processData: false
                });
            });
            $("#delete").click(function (e) {
                e.preventDefault();
                var id = $("input[name='id']").val();
                $.ajax({
                    type: "delete",
                    url: "/person/delete/" + id,
                    contentType: "application/json",
                    success: function (data, textStatus, jqXHR) {
                        if (data) {
                            window.location.replace("/");
                        } else {
                            console.log(data);
                        }
                    },
                    error: function (jqXHR) {
                        console.log('Error: ' + jqXHR.statusText);
                    },
                    async: true,
                    processData: false
                });
            });
        });
    </script>
@endsection