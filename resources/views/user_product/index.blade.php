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
@include('nav');
@if(session()->has('messege'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('messege')}}
          </div>
          @endif
          
         <a href="{{url('insert_product')}}" class="  btn btn-dark"> add product</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">price</th>
      <th scope="col">image</th>
      <th scope="col">category</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($product as $product)
  @if($product->is_avilable == 1)
    <tr>
        
      <td scope="row"><?php static $count =1; echo $count++ ; ?></td>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->price}}</td>
      <td><img src="/storage/{{$product->image}}" alt="" width="75px"></td>
      <td>{{$product->category->name}}</td>
      <td> 
            <a onclick="return confirm('are you sure you want to delete this item')" href="{{url('delete_product' ,$product->id)}}" class="  btn btn-danger"> delete</a>
            <a onclick="return confirm('are you sure you want to update this item')" href="{{url('edit_product' ,$product->id)}}" class=" mr-3 btn btn-success"> edit</a>
          </td>
    </tr>
    @endif
      @endforeach
  </tbody>
</table>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>