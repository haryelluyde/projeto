<?php
include('template/topo.php');

if($_SESSION['logado'] == 'admin'){
if($con){
	$sql = "select * from produto where cd_produto = ".$_GET['cd_produto'];
	$rs = mysql_query($sql, $con);
	
	if($rs){
		if($valor = mysql_fetch_array($rs)){?>
			<h2>Alterar produto</h2>
			<?php include('template/menu_consulta.php');?>
			<form action = "update_produto.php" method = 'POST' enctype = 'multipart/form-data'>
				CD_produto:	<input type="text" name="cd_produto" value = "<?php echo $valor['cd_produto']?>" class = 'form-control' readonly><br>
				Nome do produto: <input type="text" name="nm_produto"value = "<?php echo $valor['nm_produto']?>" class = 'form-control'><br>
				Tipo da flor: 
				<select name = 'tipo_produto' class = 'form-control select'>
					<option value="" <?=($valor['tipo_produto'] == '')?'selected':''?>>Selecione</option>
					<option value = 'N' <?=($valor['tipo_produto'] == 'N')?'selected':''?>>Normal</option>
					<option value = 'C' <?=($valor['tipo_produto'] == 'C')?'selected':''?>>Conservada</option>
				</select>
				<br>
				Fornecedor: 
				<select name = 'fornecedor' class = 'form-control select'>
						<option value="">Selecione</option>
						<?php
							$select = $valor['fk_cd_fornecedor'];
							$sql = "select * from fornecedor";
							$rs = mysql_query($sql);
							while($valor = mysql_fetch_array($rs)){?>
								<option value="<?php echo $valor['cd_fornecedor']?>" <?=($valor['cd_fornecedor'] == $select)?'selected':''?>><?php echo $valor['nm_fornecedor']?></option>
							<?php
							}
						?>
				</select><br>
				<?php
				$sql = "select * from produto where cd_produto = ".$_GET['cd_produto'];
				$rs = mysql_query($sql, $con);
				
				if($rs){
					if($valor = mysql_fetch_array($rs)){?>
					Descrição:<textarea type='text' name='descricao' class = 'form-control' rows = '4'><?php echo $valor['descricao'];?></textarea><br>
					Preço:<input type='text' name='preco_produto' value = "<?php echo $valor['preco_produto'];?>" class = 'form-control'><br>
					
					<input type ='hidden' name = 'foto_velha' value="<?php echo $valor['foto_produto']?>">
					<img src = "imagens/produtos/<?php echo $valor['foto_produto'];?>" class = 'altera_produto'><br>
					Alterar foto: <input type = 'file' name = 'foto_produto' id = 'foto_produto' class = 'form-control'><br><br>
					<center><input type="submit" value="Atualizar" class = 'botao'></center>
					<?php
					}
				}?>
			</form>
			<?php
		}
	}
}
include('template/rod.php');}else{
	header('location:home.php');
}
?>