@extends('layouts.external')
@section('content')	
	@if (session('success'))
		<div class="row">
			<div class="col-md-12">
			    <div class="alert alert-success" style="position: relative;">
			        {{ session('success') }}
			    </div>
		    </div>
	    </div>
	@endif
	<h1 class="text-center">Formulário de Inscrição</h1>
	{!! Form::open(['route' => 'registration.create', 'class' => 'form-horizontal form-label-left registration-form', 'method' => "GET", 'files' => TRUE]) !!}
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('category_id', 'Categoria:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
					<div class="col-md-6 col-sm-6 col-xs-12">
						{!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
					</div>
				</div>
			</div>
		</div>
		<div class="ln_solid"></div>
		<div class="form-group submit-group">
			<div class="col-xs-12 text-right">
				{!! Form::submit('Enviar Dados', ['class' => 'btn btn-success envia-dados-submit']) !!}
			</div>
		</div>
	{!! Form::close() !!}

@endsection