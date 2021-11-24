<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Calculator</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>


<form class="form-signin">
    @csrf
    <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Calculator</h1>
    </div>
    <div class="form-label-group">
        <input type="email" id="display" class="form-control" value="0" readonly>
    </div>

    <div class="row">
        <div class="col-lg-2 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="9" >9</button>
        </div>
        <div class="col-lg-2 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="8" >8</button>
        </div>
        <div class="col-lg-2 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="7" >7</button>
        </div>
        <div class="col-lg-3 col-operators">
            <button type="button" class="btn btn-primary btn-calculator-operator" id="plus" >+</button>
        </div>
        <div class="col-lg-3 col-operators">
            <button type="button" class="btn btn-primary btn-calculator-operator" id="minus" >-</button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="6" >6</button>
        </div>
        <div class="col-lg-2 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="5" >5</button>
        </div>
        <div class="col-lg-2 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="4" >4</button>
        </div>
        <div class="col-lg-3 col-operators">
            <button type="button" class="btn btn-primary btn-calculator-operator" id="times" >*</button>
        </div>
        <div class="col-lg-3 col-operators">
            <button type="button" class="btn btn-primary btn-calculator-operator" id="divided" >/</button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="3" >3</button>
        </div>
        <div class="col-lg-2 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="2" >2</button>
        </div>
        <div class="col-lg-2 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="1" >1</button>
        </div>
        <div class="col-lg-3 col-operators">
            <button type="button" class="btn btn-primary btn-calculator-operator" id="MOD" >MOD</button>
        </div>
        <div class="col-lg-3 col-operators">
            <button type="button" class="btn btn-danger btn-calculator-operator" id="reset" >Reset</button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="0" >0</button>
        </div>
        <div class="col-lg-3 col-numbers">
            <button type="button" class="btn btn-secondary btn-calculator-numbers" id="point" >.</button>
        </div>
        <div class="col-lg-6 col-numbers">
            <button type="button" class="btn btn-success btn-block btn-calculator-equals" id="equals" >=</button>
        </div>
    </div>


</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/app.js') }}" ></script>

</body>

</html>
