<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
     
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
     
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

    <script src="script/ajax.js"></script>
    <script src="script/validation.min.js"></script>
    
    <title>Exchange Rate</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand header">
                <i class="fas fa-search-dollar" style="font-size:25pt"></i> Currency Converter
            </a>
        </div>
    </nav>
    
    <div class="container">
        <h3 class="text-header mb-5">Welcome to Currency converter in PHP use API</h3>
        <form action="" method="post" id="currency-form">
            <div class="form-group">
                
                <div class="row">
                    <div class="col-4">
                        <label class="text-des">Form</label>
                    </div>
                    <div class="col-8">
                        <select name="form_currency" class="select-style w-100">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="THB">THB</option>
                            <option value="JPY">JPY</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-4">
                        <label class="text-des">Amount</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="select-style text-currency w-100" name="amount" id="amount">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-4">
                        <label class="text-des">To</label>
                    </div>
                    <div class="col-8">
                        <select name="to_currency" class="select-style w-100">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="THB">THB</option>
                            <option value="JPY">JPY</option>
                        </select>
                    </div>
                </div>
                
            </div>
            <button type="submit" value="1" name="convert" id="convert" class="btn btn-info w-100">Convert</button>
        </form>
        <div class="wrap_result">
            <div class="form-group" id="converted_rate"></div>
            <div id="converted_amount"></div>
        </div>
    </div>
</body>
</html>