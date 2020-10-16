<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Student</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="/collectors">Collectors</a>
            <a class="nav-link" href="/recyclingPoints">Recycling Point</a>
            <a class="nav-link" href="/collectorDetails">Collector Details</a>

        </div>
    </div>
</nav>
<div class="container">
    <h1 class="text-center"><b>Collector Detail</b></h1>
    <br><br>
    <br>
    <div class="row">
        <!-- Formulario de captura Collect details -->
        <div class="col col-lg-5 col-md-10 col-sm-10">
            <div class="card" style="width: 25rem;">

                <div class="card-body card-style">
                    <h5 class="card-title">Collect Details</h5>
                    <hr>

                    <form action="/addCollectorDetail" method="POST">
                        @csrf
                        <div class="form-grop">
                            <div class="form-group row">

                                <div class="col-sm-10">

                                    <select class="form-control form-control-md" name="collector" required>
                                        <option></option>
                                        @if(!is_null($collectors))
                                            @foreach($collectors as $collector)
                                                <option name= "student" value="{{$collector->id}}"> {{$collector->name}}, Days: {{$collector->days_to_pick_up}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>

                                <h5 class="card-title">Recycling Points</h5>
                                <hr>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-md" name="recyclingPoint"  required>
                                        <option></option>
                                        @if(!is_null($recyclingPoints))
                                            @foreach($recyclingPoints as $recyclingPoint)
                                                <option name= "subject" value="{{$recyclingPoint->id}}">{{$recyclingPoint->type_of_garbage}} Time: {{$recyclingPoint->opening_time}} - {{$recyclingPoint->closing_time}}  </option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-outline-danger btn-sm" type="reset">Cancel</button>
                            <input type="hidden" name="nombreBoton" />
                            <input type="hidden" name="id" class="id" value='2' />
                            <button
                                class="btn btn-primary  btn-sm ml-2" type="submit" value="Agregar" id="aceptar">
                                Add
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="col col-lg-7 col-md-12 col-sm-12">


            <table class="table table-sm text-center">
                <thead class="bg-success text-white">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Days</th>
                    <th scope="col">Type</th>
                    <th scope="col">Opening</th>
                    <th scope="col">Closing</th>
                    <th scope="col">Delete</th>

                </tr>
                </thead>
                <tbody>
                @if(!is_null($collectorDetails))
                    @foreach($collectorDetails as $s)
                        <tr>

                            <td>{{$s->name}}</td>
                            <td>{{$s->days}}</td>
                            <td>{{$s->type}}</td>
                            <td>{{$s->opening}}</td>
                            <td>{{$s->closing}}</td>
                            <td><a href="/deleteCollectorDetail/{{$s->cid}}" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
                <tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
