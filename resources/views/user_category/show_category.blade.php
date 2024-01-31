@include('nav');
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>category</title>
</head>
<body>
<a href="{{url('insert_category')}}" class="  btn btn-dark"> add category</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($category as $category)
    <tr>
      <td scope="row"><?php static $count =1; echo $count++ ; ?></td>
      <td>{{$category->name}}</td>
      <td>{{$category->description}}</td>
      <td>
            <a onclick="return confirm('are you sure you want to delete this item')" href="{{url('delete_category' ,$category->id)}}" class="  btn btn-danger"> delete</a>
            <a onclick="return confirm('are you sure you want to update this item')" href="{{url('edit_category' ,$category->id)}}" class=" mr-3 btn btn-success"> edit</a>
          </td>
    </tr>
      @endforeach
  </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
