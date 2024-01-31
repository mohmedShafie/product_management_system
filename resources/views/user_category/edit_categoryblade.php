<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>edit category</title>
</head>
<body>
  

@include('nav')
@if(session()->has('messege'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('messege')}}
          </div>
          @endif
<form action="{{url('update_category' , $category->id)}}" method="POST" enctype="multipart/form-data">
@csrf
        <label class="form-label" >name</label>
        <input type="text" name="name"   value="{{$category->name}}" class="form-label">
        <br/>
        <br/>
        <label class="form-label" >description</label>
        <input type="text" name="description"   value="{{$category->description}}" class="form-label">
        <br/>
        <br/>
        <input type="submit" value="update category" class="btn btn-primary">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
