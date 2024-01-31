<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>insert product</title>
</head>
<body>
@if(session()->has('messege'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('messege')}}
          </div>
          @endif
<form method="POST" enctype="multipart/form-data"  action="{{url('add_product')}}">
  @csrf
  <div class="mb-3">
    <label  class="form-label">name</label>
    <input type="text" class="form-control" id="name" name = "name" >
   
  </div> 
  <div class="mb-3">
    <label  class="form-label">description</label>
    <input type="text" class="form-control" id="description"  name = "description">
  </div> 
  <div class="mb-3">
    <label  class="form-label">price</label>
    <input type="text" class="form-control" id="price" name = "price" >
  </div>
  <label  class="form-label">is avilable</label>
    <input type="boolean" class="form-control" id="is_avilable" name = "is_avilable" >
  </div>
  <label class="form-label " >product image here</label>
        <input type="file" name="image" placeholder="enter product image" class="form-control" id = "image">
  </div>
  <select class="form-select" name ="category_id" >
  <option selected>category</option>
  @foreach($categories as $cat)
  <option value="{{$cat->id}}" name ="category_id" id = "category_id">{{$cat->name}}</option>
  @endforeach
</select>
<br/>
<button type="submit" class="btn btn-primary"> Submit</button>
</form>    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>