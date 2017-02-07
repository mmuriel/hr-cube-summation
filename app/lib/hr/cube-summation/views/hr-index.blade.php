<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <style type="text/css">
        	
        	.wrapper{

				padding: 10px;

        	}
        </style>
        <!--<link rel="stylesheet" href="css/main.css"> -->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <div class="wrapper">        	
        	<form action="/" method="post" id="form1">
        		<h1>Hacker Rank - Cube Summation Challenge</h1>
        		<p><label for="textinput">Query input</label></p>
        		<textarea cols="80" rows="15" id="textinput" name="textinput">
@if (isset($textinput) && $textinput != '')
{{ $textinput }}
@endif
        		</textarea>
        		<br/>
        		<button type="input">Enviar</button>
        	</form>
        	<section>
        		@if (isset($res))
	        		<h3>Response:</h3>
	        		@for($i=0;$i<count($res);$i++)
	        			@foreach ($res[$i] as $val )
	        				<p>{{ $val }}</p>
						@endforeach
	        		@endfor
        		@endif
        	</section>
        </div>

        <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.4.min.js"><\/script>')</script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    </body>
</html>