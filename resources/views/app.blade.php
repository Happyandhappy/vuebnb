<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Vuebnb</title>
    
        
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    
    <script>
    
        // turn into JSON  & escape charactes
       window.vueListing= "{!!addslashes(json_encode($listing))!!}";

       window.csrf_token = "{{csrf_token()}}"
                
        
    </script>
    
    
</head>
<body>

    
    
<div id="app">

    
    </div>

    
<script src="{{asset('js/app.js') }}"></script> 

</body>
</html>
