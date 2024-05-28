<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="container">

      <form class="row align-items-center flex flex-column pt-4" action="/save" method="post">
        @csrf
        <div class="col-6">
          <h1 class="h3 mb-3 fw-normal">Create a shortend URL App</h1>
          <div class="form-floating pb-4">
            <input type="text" class="form-control" name="url" id="floatingUrl" placeholder="https://example.com">
            <label for="floatingUrl">URL</label>
            {{$errors->first('url')}}
          </div>
          
          <div class="form-floating pb-4">
            <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="example@email.com">
            <label for="floatingEmail">Email</label>
          </div>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="col-6">
         
          <button class="btn btn-primary w-100 py-2 btn-lg" type="submit">Create short URL</button>
        </div>
      </form>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>