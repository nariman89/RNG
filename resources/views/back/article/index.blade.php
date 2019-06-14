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
			 <button  onclick="myFunction()"> Add A new Category</button>
			 <div id="myDIVONE">
			<div class="container mt-3">
  
				<label for="category_name">Category Name</label>
				<input type="text" name="category_name" id="category_name" class="form-control" placeholder="category_name" required value="{{'category_name'}}">
			</div>
	<br>
			<input type="submit" value="sub" class="btn btn-primary">

		{!!Form::close()!!}
		
        </div>
			</div></form>
			

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
			 <a href="/article/{{$article->article_id}}" class="btn btn-warning" style="width:100%">Edit Article</a>
<form method="POST" action="/article/{{$article->article_id}}">
						@csrf
						@method('DELETE')

						<input type="submit" value="Delete article" class="btn btn-danger">
					</form>
</div>
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
