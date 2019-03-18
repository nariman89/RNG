<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="btn-group md-100px;">

<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-files-o fa-fw"></i>
    Category<span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="/article/create">ADD a new Category</a></li>
      <li><a href="#">Show Category</a></li>
    </ul>
  </div>  <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-files-o fa-fw"></i> Articles<span class="caret"></span><span class="fa arrow" class="caret pt-20px"></span></li></button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="/article/create">ADD a new Article</a></li>
      <li><a href="#">Show Article</a></li>
    </ul>
  </div>
  <button type="button" class="btn btn-primary">All</button>
</div>

  </div>
</nav>
@yield('content')
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

	<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">statistics</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-4">
									<i class="fa fa-comments fa-5x"></i>
								</div>
								<div class="col-xs-8 text-right">
									<div class="huge">26</div>
									<div>New Comments!</div>
								</div>
							</div>
						</div>
						<a href="#">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-4">
									<i class="fa fa-tasks fa-5x"></i>
								</div>
								<div class="col-xs-8 text-right">
									<div class="huge">12</div>
									<div>New Tasks!</div>
								</div>
							</div>
						</div>
						<a href="#">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-4">
									<i class="fa fa-shopping-cart fa-5x"></i>
								</div>
								<div class="col-xs-8 text-right">
									<div class="huge">124</div>
									<div>New Orders!</div>
								</div>
							</div>
						</div>
						<a href="#">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-4">
									<i class="fa fa-support fa-5x"></i>
								</div>
								<div class="col-xs-8 text-right">
									<div class="huge">13</div>
									<div>Support Tickets!</div>
								</div>
							</div>
						</div>
						<a href="#">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
	</div>
		<!-- /#page-wrapper -->
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- /#wrapper -->


