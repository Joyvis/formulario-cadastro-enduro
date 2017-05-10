<!DOCTYPE html>
<html>
<head>
	<title>CADASTRO EFETUADO COM SUCESSO</title>
</head>
<body>
<h1>Enduro - Novo Cadastro Recebido</h1>
<p><b>Categoria:</b> {{ $category->name }}</p>
<br>
<br>
<h3>Competidor 1</h3>
<p><b>Nome:</b> {{ $competitor->name }}</p>
<p><b>Motocicleta:</b> {{ $competitor->motorcycle }}</p>
<p><b>Equipe:</b> {{ $competitor->team }}</p>
<p><b>Patrocinadores:</b> {{ $competitor->sponsors }}</p>
<br><br>
@if($category->id == 5)
<h3>Competidor 2</h3>
<p><b>Nome:</b> {{ $competitor2->name }}</p>
<p><b>Motocicleta:</b> {{ $competitor2->motorcycle }}</p>
<p><b>Equipe:</b> {{ $competitor2->team }}</p>
<p><b>Patrocinadores:</b> {{ $competitor2->sponsors }}</p>
@endif
</body>
</html>