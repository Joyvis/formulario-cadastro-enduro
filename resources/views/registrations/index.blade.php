@extends('layouts.app')
@section('content')
	<h3>Cadastros</h3>	
	<table class="table table-striped">
		<thead>
			<th>Categoria</th>
			<th></th>
			<th>Competidor 1</th>
			<th></th>						
			<th>Competidor 2</th>
			<th>Confirmado?</th>
			<th class="text-right"></th>
		</thead>
		<tbody>
			@forelse ($registrations as $registration)
				<tr>
					<td>
						{{ $registration->category->name }}
					</td>
					<td>
						<img src="{{url('/')}}/upload-img/{{ $registration->competitor->image }}">
					</td>
					<td>
						<div class="col-md-6">
							<p><b>Nome:</b> {{$registration->competitor->name}}</p>
							<p><b>Moto:</b> {{$registration->competitor->motorcycle}}</p>
						</div>
						<div class="col-md-6">
							<p><b>Equipe:</b> {{$registration->competitor->team}}</p>
							<p><b>Patrocinador:</b> {{$registration->competitor->sponsors}}</p>
						</div>
					</td>
					@if(isset($registration->competitor_secondary->id))
						
						<td>
							<img src="{{url('/')}}/upload-img/{{ $registration->competitor_secondary->image }}">
						</td>
						<td>
							<div class="col-md-6">
								<p><b>Nome:</b> {{$registration->competitor_secondary->name}}</p>
								<p><b>Moto:</b> {{$registration->competitor_secondary->motorcycle}}</p>
							</div>
							<div class="col-md-6">
								<p><b>Equipe:</b> {{$registration->competitor_secondary->team}}</p>
								<p><b>Patrocinador:</b> {{$registration->competitor_secondary->sponsors}}</p>
								
							</div>
						</td>
					@else
						<td>							
						</td>
						<td>							
						</td>
					@endif
					<td>
						{{ empty($registration->confirmed_at) ? 'NÃO' : 'SIM' }}
					</td>
					<td>
						@if(empty($registration->confirmed_at))
							<a href="{{ route('registration.confirm_registration', $registration->id) }}" class="btn btn-success">Confirmar Inscrição</a>
						@else
							<a href="{{ route('registration.unconfirm_registration', $registration->id) }}" class="btn btn-danger">Desfazer Confirmação</a>
						@endif
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="7">Nenhum cadastro efetuado.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
	<div class="row">
		<div class="col-md-12">
			{{ $registrations->links() }}
		</div>
	</div>
@endsection