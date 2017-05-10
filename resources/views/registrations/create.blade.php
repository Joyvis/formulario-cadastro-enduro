@extends('layouts.external')
@section('content')	
	<h1 class="text-center">Formulário de Inscrição</h1>
	{!! Form::open(['route' => 'registration.store', 'class' => 'form-horizontal form-label-left registration-form', 'data-parsley-validate' => "", 'files' => TRUE]) !!}
		
		@if($category->id == 5)
			@include('registrations._form_dupla')
		@else
			@include('registrations._form')
		@endif
	{!! Form::close() !!}
@endsection