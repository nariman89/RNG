@extends('back.layouts.master')

<style>
#myDIVONE {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: rgb(102, 151, 204);
  margin-top: 20px;
  display: none;
}
.container-detail{
	margin-top: 40px;
}
</style>
@section('content')
@include('partials/validation_errors')
@method('POST')
 <div class="row">
 	<div class="col-lg-12">
 		<h1 class="page-header">Articles</h1>
 	</div>
<div class="container">
<div class="row">
 	<div class="col-lg-12">
 		<div class="panel panel-default">
 			<div class="panel-heading text-right">
 				<button type="button" class="btn btn-sucess">Add A new User</button>
			 </div>
			 {{-- <button type="button" class="btn btn-sucess"><a href="/back/article/createCat">Add A new Category</a></button> --}}
			 <button  onclick="myFunction()"> Add A new Category</button>
			 <div id="myDIVONE">
			<div class="container mt-3">
				{{csrf_field() }}

<form method="POST" id="add-form" action="/admin/article">
 {!! Form::open(array('files'=>true)) !!}

<div class="form-group col-md-6">
      <label for="name">Category Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
	</div>
	<br>
			<input type="submit" value="save" class="btn btn-primary">

		{!!Form::close()!!}
        </div>
			</div>

 			<div class="panel-body">

 				<div class="table-responsive">
 					<table class="table table-bordered table-striped table-hover" id="dataTables-example">
 					</tr>
    <thead>
    <tbody>
      <tr>
 							<th>Number</th>
 							<th>Adress</th>
 							<th>Details</th>
 							<th>Price</th>
 							<th>sold</th>
 							<th>to sale</th>
 							<th>Category</th>
 							<th>City</th>

			 </tr>
			     </thead>



			<tbody>
				@foreach($articles as $article)
				<tr>
				 <td>{{$article->id}}</td>
 			 <td>{{$article->name}}</td>
			 <td>{{$article->descraption}}</td>
{{-- <td>{{$article->category->category_name}}</td> --}}
			 <td>{{$article->rent_price}}</td>
			 <td>
			 <div class="btn-group" role="group">
				 <button class="btn btn-warning" value="delete"><i class=" glyphicon glyphicon-pencil"></i></button>
				 <form method="POST" action="/admin/article/{{ $article->id }}">
					@csrf
                    @method('PUT')
					 {!!Form::open(array(
						 'method'=> 'post',
						 'route'=>['article.destroy', $article->id],
						 'onsubmit'=>"return confirm ('Are You Sure?')"
					 )
					 )!!}
					 <button type="submit" class="btn btn-danger"><i class=" glyphicon glyphicon-remove">
						 </i></button>

					 {!!Form::close()!!}
				</button></td>
			 </div>
             </tr>
			 </div>
				   @endforeach

			</tbody>
		</table>

 				</div>
 			<div class="well">

 			</div>
 			</div>
 			</div>
 			</div>





@endsection
<script>
function myFunction() {
  var x = document.getElementById("myDIVONE");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
