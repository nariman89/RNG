@extends('back.layouts.master')
@section('content')

                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

	<div class="row">
				<div class="col-lg-12">
			@foreach($articles as $article)
			<tr>
			<td>{{$article->article_id}}</td>
			 <td>{{$article->name}}</td>
			 <td>{{$article->rent_price}}</td>
               <div class="btn-group" role="group">
				   <button class="btn btn-warning">
					   <li class="icon"
				  {!! Form::open(array(
					  'metod'=>'DELETE',
					  'route'=>['article.destroy', $article->id],
					  'submit'=>"return confirm(' are you sure?')"
					  ))!!}

				    <button type="submit" class="btn btn-danger">fdf</button>
				  {!! Form::close() !!}
				   </button>


			   </div>
			</tr>
            @endforeach

        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

@endsection
