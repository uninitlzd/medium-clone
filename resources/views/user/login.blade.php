@extends('layouts.default')
@section('head')
	<meta name="title" content="Login Medium Clone">
	<meta name="description" content="Login to MediumClone">
@stop
@section('title','Login Medium Clone')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<div class="page-header text-center">
					<h1>MediumClone</h1>
					<p>Login and create awesome story.</p>
				</div>
				{!! Form::open(['route'=>'user.postLogin']) !!}
				<div class="form-group">
					<label for="email">Email</label>
					{!! Form::email('email','',['class'=>'form-control','required','placeholder'=>'ex : user@domain.com']) !!}
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					{!! Form::password('password',['class'=>'form-control','required']) !!}
				</div>
				{!! Form::submit('Log In',['class'=>'btn btn-primary btn-block']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop