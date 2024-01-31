<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>user</title>
</head>
<body>
  @include('nav')
<form action="{{url('update_product' , $product->id)}}" method="POST" enctype="multipart/form-data">
@csrf
        <label class="form-label" >name</label>
        <input type="text" name="name"   value="{{$product->name}}" class="form-label">
        <br/>
        <br/>
        <label class="form-label" >description</label>
        <input type="text" name="description"   value="{{$product->description}}" class="form-label">
        <br/>
        <br/>
        <label class="form-label" >price</label>
        <input type="text" name="price"   value="{{$product->price}}" class="form-label">
        <br/>
        <br/>
        <label class="form-label" >is_avilable</label>
        <input type="text" name="is_avilable"   value="{{$product->is_avilable}}" class="form-label">
        <br/>
        <br/>
      <label class="form-label" >current product image </label>
        <td> <img class="form-label" witdh = "50px" src=" /storage/{{$product->image}}"></td>
        <br/>
        <br/>
        <label class="form-label" >change product image </label>
        <input type="file" name="image"  class="form-label">
        <br/>
        <br/>
        <select class="form-select" name ="category_id" >
  <option selected>category</option>
  @foreach($categories as $cat)
  <option value="{{$cat->id}}" name ="category_id" id = "category_id">{{$cat->name}}</option>
  @endforeach
</select>
<br/>
        <br/>
      <input type="submit" value="update product" class="btn btn-primary">
      </form>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>