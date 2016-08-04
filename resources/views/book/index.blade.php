@extends('baselayout')

@section('content')

<div class="row">	
	<?
	/*
	{!! Html::ul($errors->all(), array('class'=>'errors')) !!}

	{!! Form::open(array('url' => 'signin','class'=>'form-inline')) !!}

	{!! Form::label('email', 'E-Mail Address') !!}
	{!! Form::text('email', 'example@gmail .com', array('class' => 'form-control')) !!}
	{!! Form::label('password', 'Password') !!}
	{!! Form::password('password', array('class' => 'form-control')) !!}

	{!! Form::submit('Sign In' , array('class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}
	
	See: https://laravel.com/docs/5.1/blade
	*/
	?>
	<h1>English Books</h1>
	<p>Below is your english book list.</p>	

</div>
<div class="row">	
	<div class="table-responsive">
	  <table class="table table-sm">
		<tr class="table-active">
			<th><a href="{{action('BookController@getNewItem')}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;New</a></th>
			<th>Id</th>
			<th>Book</th>
		</tr>	
	@foreach($model as $item)	
		<tr> 
			<td>
				<a href="{{action('BookController@getEdit', $item->id)}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				<a href="{{action('BookController@getDelete', $item->id)}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
			</td>
			<td>{{$item->id}}</td>
			<td>{{$item->name}}</td>
		</tr>
	@endforeach
	  </table>
	</div>
</div>

@stop

