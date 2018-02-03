@extends('master')

@section('content')
    <h1 class="text-center text-danger">
        Add Person
    </h1>
    <br/>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div>
                <div class="form-group">
                    <label class="inputPassword">First Name</label>
                    <input type="text" name="firstname" class="form-control input-lg"
                           placeholder="Person First Name">
                </div>
                <div class="form-group">
                    <label class="inputPassword">Last Name</label>
                    <input type="text" name="lastname" class="form-control input-lg" placeholder="Person Last Name">
                </div>
                <button type="submit" class="btn btn-info form-control input-lg" id="save">Save</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#save").click(function (e) {
                e.preventDefault();
                var person = {
                    "firstname": $("input[name='firstname']").val(),
                    "lastname": $("input[name='lastname']").val()
                };
                $.ajax({
                    type: "POST",
                    url: "/person/store",
                    data: JSON.stringify(person),
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