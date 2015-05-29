<div id = 'nav'>
	<ul>
		<li><a href = 'home.php'>Home</a></li>
		<li><a href = '#'>Sobre nós</a></li>
		<li><a href = 'flores.php'>Flores</a></li>
		<li><a href = '#'>Presentes</a></li>
		<li><a href = '#'>Parceiros</a></li>
		<li><a href = '#'>Contato</a></li>
		<?php 
		if($_SESSION['logado'] == 'admin'){
			echo "<li><a href = 'fornecedor.php'>Fornecedor</a></li>
			<li><a href = 'produto.php'>Produto</a></li>
			<li><a href = 'consulta_produto.php'>Consultar</a></li>";
		}?>
	</ul>
</div>

<div id = 'content'>