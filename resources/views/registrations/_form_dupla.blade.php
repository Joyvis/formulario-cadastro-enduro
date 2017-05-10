@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label('category', 'Categoria:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{!! Form::text('category', $category->name, ['class' => 'form-control col-md-7 col-xs-12', 'disabled' => 'disabled']) !!}
				{!! Form::hidden('category_id', $category->id) !!}
			</div>
		</div>
	</div>
</div>
<div class="row competitors">
	<div class="col-md-6 competitor" >
		<h3 class="text-center">Competidor 1</h3>
		<div class="form-group">
			{!! Form::label('name', 'Nome:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				{!! Form::text('name1', old('name1'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('motorcycle', 'Motocicleta:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				{!! Form::text('motorcycle1', old('motorcycle1'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('team', 'Equipe:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				{!! Form::text('team1', old('team1'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('sponsors', 'Patrocinador:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				{!! Form::text('sponsors1', old('sponsors1'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('confirmated_at', 'Confirmação:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				{!! Form::text('confirmated_at-1', 'À Confirmar', ['class' => 'form-control col-md-7 col-xs-12', 'readonly' => 'readonly']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('image', 'Imagem:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				<img src="#" class="img-responsive" style="display: none">
				{!! Form::file('image1', ['required' => 'required']) !!}
				<small>*Resolução 130x140px</small>
			</div>
		</div>
		
	</div>
	<div class="col-md-6 competitor" >
		<h3 class="text-center">Competidor 2</h3>
		<div class="form-group">
			{!! Form::label('name', 'Nome:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				{!! Form::text('name2', old('name2'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('motorcycle', 'Motocicleta:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				{!! Form::text('motorcycle2', old('motorcycle2'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('team', 'Equipe:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				{!! Form::text('team2', old('team2'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('sponsors', 'Patrocinador:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				{!! Form::text('sponsors2', old('sponsors2'), ['class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('confirmated_at', 'Confirmação:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				{!! Form::text('confirmated_at2', 'À Confirmar', ['class' => 'form-control col-md-7 col-xs-12', 'readonly' => 'readonly']) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('image', 'Imagem:', ['class' => 'col-xs-12']) !!}
			<div class="col-xs-12">
				<img src="#" class="img-responsive" style="display: none">
				{!! Form::file('image2', ['required' => 'required']) !!}
				<small>*Resolução 130x140px</small>
			</div>
		</div>
		
	</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal-data-confirm" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Confirme os dados de sua inscrição</h4>
		</div>
		<div class="modal-body">
			<p>Some text in the modal.</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			<button type="button" class="btn btn-success" id="envia-dados">Confirmar</button>
		</div>
    </div>
  </div>
</div>
<input type="hidden" id="validate-status" value='0'>
<div class="ln_solid"></div>
<div class="form-group submit-group">
	<div class="col-xs-12 text-right">
		{!! Form::submit('Enviar Dados', ['class' => 'btn btn-success envia-dados-submit']) !!}
	</div>
</div>

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){					

			$('select[name="category_id"]').trigger('change');

		    function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            
		            reader.onload = function (e) {
		            	var img = $(input).parent().find('img');
		                img.attr('src', e.target.result);
		                img.fadeIn();
		            }
		            
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		    
		    $(document).on('change', 'input[name="image1"], input[name="image2"]', function(){
		        readURL(this);
		    });

			$(document).on('submit', 'form', function(e){

				
				
				
				if($('.required').val() != ""){
					return true;
				}else {
					alert('Selecione uma imagem.')
					return false;
				}


			});

			$('.registration-form').on('submit', function(e){
				if($('#validate-status').val() == 0){
					e.preventDefault();
					$('.modal-body').html($('.competitors').html());
					$('.competitors input[type="text"]').each(function(){
						var link = $(this);
						$('[name="'+link.attr('name')+'"]').val(link.val());
					})
					$('.modal-body input').attr('disabled', 'disabled');
					$('.modal-body input[type="file"], .modal-body small').hide();
					$('#modal-data-confirm').modal();
				}	
			})

			$('#envia-dados').click(function(){
				$('#modal-data-confirm').modal('hide');
				$('#validate-status').val(1);
				$('.registration-form').submit();
			})
		})
	</script>
@endsection