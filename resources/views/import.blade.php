<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        @if (session()->has('msg'))
            <div class="alert alert-success alert-datadismissiable">
                {{ session()->get('msg') }}
                <a href="" class="close" data-dismiss="alert" aria-label="close">x</a>
            </div>
        @endif
    <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlFile1">Choose Excel file </label>
          <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>


</body>
</html>
