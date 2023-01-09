<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SoothSayer</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">	
	
	<!-- Styles -->
	<style>
	    .card{
		/*
  			width: 350px;
			border-radius: 15px;
		*/
		}
            .card-title{ border-radius: 15px; }
	    .sooth{
		padding: 1em;
		font-size: 1em;
		background-color: white;
		border-radius: 15px;
	    }	
	    .sooth-container{
		display: flex;
		align-items: center;
		justify-content: center;
		height: 100vh;
		}
	    .sooth-image{

		width: 100%;
		height: auto;
		border-radius: 15px;

	     }
        </style>
    </head>
    <body class="antialiased">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
	<div class="container">
		<div class="row">
			<div class="col d-none d-sm-block">
			</div>
			<div class="col">
				<div class="card">
					<div class="card-title">
						<img class="sooth-image" src="https://sooth.buttered.app/storage/salome.jpg" alt="painting of mystical woman by Gustav Klimt"></div>
					<p>SoothSayerAPI generates a line from the public domain medieval Persian work, the Rubaiyyat.</p>
					<p>To use it, do this:
					</p>
					<p><a href="https://sooth.buttered.app/api/sooth/v1/fortune">https://sooth.buttered.app/api/sooth/v1/fortune</a> This generates a random line from the Rubaiyyat.
					</p>
					<p><a href="https://sooth.buttered.app/api/sooth/v1/all">https://sooth.buttered.app/api/sooth/v1/all</a> This dumps the entire Rubaiyyat as it presently stands in our database.
					</p>
				<p>SoothSayerAPI is for entertainment purposes only, and no guarantees or warranties are made in regards to this product.</p>
				<p>SoothSayerAPI is free and always will be.  You are free to use it commercially, modify it, and share it without cost or attribution.</p>
					<p xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/"><a property="dct:title" rel="cc:attributionURL" href="https://sooth.buttered.app">SoothSayerAPI</a> by <a rel="cc:attributionURL dct:creator" property="cc:attributionName" href="https://www.linkedin.com/in/justin-lawrence-ms/">Justin Lawrence, MS</a> is marked with <a href="http://creativecommons.org/publicdomain/zero/1.0?ref=chooser-v1" target="_blank" rel="license noopener noreferrer" style="display:inline-block;">CC0 1.0<img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1"><img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/zero.svg?ref=chooser-v1"></a></p>


					<h4>Today's fortune.</h4>
					<div class="sooth">
						@if(isset($sooth))
							{{ json_decode($sooth) }}
							@endif
					</div>		
				</div>
			</div>
			<div class="col d-none d-sm-block">
			</div>
		</div>
	</div>
    </body>
</html>
