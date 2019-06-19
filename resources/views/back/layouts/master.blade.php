<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Controll Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="/admin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/admin/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
	<link href="/admin/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>

<body>

    <nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand navbar-left" margin="20px" href="#">Rent Ur Gear</a>
				 <a href="/" class="btn btn-warning" style="width:100%">Front</a>

    </div>


    </ul>
    <form class="navbar-form " action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
</nav>
<div class="container">
   <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-files-o fa-fw"></i>
        Category<span class="caret"></span></button>
           <ul class="dropdown-menu" role="menu">
              <li><a href="/back/article/createCat">ADD a new Category</a></li>
              <li><a href="#">Show Category</a></li>
          </ul>
    </div>  
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-files-o fa-fw"></i> Articles<span class="caret"></span><span class="fa arrow" class="caret pt-20px"></span></li></button>
          <ul class="dropdown-menu" role="menu">
             <li><a href="/article/create">ADD a new Article</a></li>
             <li><a href="#">Show Article</a></li>
          </ul>
    </div>
      <button type="button" class="btn btn-primary">All</button>
</div>
  </div>
  </div>
</nav>
@yield('content')
            
        </nav>
			</div>
			<!-- /.row -->
		</div>
	</div>
		<!-- /#page-wrapper -->
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>

    <!-- /#wrapper -->


