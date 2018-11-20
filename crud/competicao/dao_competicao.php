<?php

/* dao_equipe.php - Arquivo responsavel por tratar das operacoes com banco de dados */


//Funcao usada para selecionar todas as equipes no sistema em um select do html
function seleciona_competicao()
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT c.id_competicao,c.nome,c.data_inicio,c.data_termino,s.descricao AS status_competicao,c.qtd_inscritos FROM competicao c INNER JOIN status_competicao s ON c.fk_status_competicao = s.id_status_competicao";
	$rs=mysqli_query($conn,$query);

	$result = '
	<table>
		<tr>
			<th>Nome</th>
			<th>Data Inicio</th>
			<th>Data Termino</th>
			<th>Status</th>
			<th>Times Inscritos</th>
			<th colspan="2">Opções</th>
		</tr>';
	
	while($rw=mysqli_fetch_assoc($rs))
	{	
		$result = $result . '
		<tr>
			<td class="select_table">'
			. $rw['nome'] .' 
			</td>
			<td class="select_table">'
			. $rw['data_inicio'] .' 
			</td>
			<td class="select_table">'
			. $rw['data_termino'] .' 
			</td>
			<td class="select_table">' 
			. $rw['status_competicao'] . '
			</td>
			<td class="select_table">'
			. intval($rw['qtd_inscritos']) .' 
			</td>
			<td class="select_table">
			<a href="/admin/admin_competicao.php?opcao=3&id=' . $rw['id_competicao'] . '"><i class="fa fa-edit" style="font-size:48px;color:black"></i></a>
			</td>
			<td class="select_table">
			<a href="/recebeform.php?class=competicao&option=4&id=' . $rw['id_competicao'] . '"><i class="fa fa-trash-o" style="font-size:48px;color:black"></i></a>
			</td>
		</tr>';
	}
	$result = $result . '</table>';
	mysqli_close($conn);
	return $result;
}

//Funcao para selecionar o registro de uma equipe em especifico
function seleciona_um_competicao($id)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT id_competicao,nome,data_inicio,data_termino,fk_status_competicao,qtd_inscritos FROM competicao where id_competicao = " . $id;
	$rs=mysqli_query($conn,$query);
	$rw=mysqli_fetch_assoc($rs);
	mysqli_close($conn);
	return $rw;
	
}

//Funcao para selecionar selecionar todas os status_equipe no sistema em um select do html
function seleciona_status_competicao($id_status = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');

	$query="select id_status_competicao,descricao from status_competicao";
	$rs=mysqli_query($conn,$query);
	$result = '<select name="status_competicao">';
	
	if($id_status == 0) 
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_competicao'] . '" >' . $rw['descricao'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_competicao'] . '" ';
			if($rw['id_status_competicao'] == $id_status)
			{
				$result = $result . 'selected="selected" ';
			}
			$result = $result . '>' . $rw['descricao'] . '</option>';
		}
	}
	$result = $result . '</select>';
	mysqli_close($conn);
	return $result;
}

//Funcao que seleciona os capitaes associados ao time
function seleciona_capitao($id_time)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	
	$query = "select fk_capitao from equipe where id_equipe = " . $id_time;
	$rs=mysqli_query($conn,$query);
	
	if(gettype($rs) == "object")
	{
		if (mysqli_num_rows($rs) != 0)
		{
			$rw=mysqli_fetch_assoc($rs);
			$capitao = $rw['fk_capitao'];
		}
	}
	
	$query = "select id_atleta,nome from atleta where fk_equipe = " . $id_time;
	$rs=mysqli_query($conn,$query);
	$result = '<select name="capitao">';
	$result = $result . '<option value="0" >Nenhum</option>';
	
	if(isset($capitao))
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_atleta'] . '" ';
			if($rw['id_atleta'] == $capitao)
			{
				$result = $result . 'selected="selected" ';
			}
			$result = $result . '>' . $rw['nome'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_atleta'] . '" >' . $rw['nome'] . '</option>';
		}
	}
	
	$result = $result . '</select>';
	mysqli_close($conn);
	return $result;
}
?>