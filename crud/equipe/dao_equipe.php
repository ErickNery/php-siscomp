<?php

/* dao_equipe.php - Arquivo responsavel por tratar das operacoes com banco de dados */


//Funcao usada para selecionar todas as equipes no sistema em um select do html
function seleciona_equipe()
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="select e.id_equipe,e.nome,s.descricao as status from equipe e inner join status_equipe s on e.fk_status_equipe = s.id_status_equipe";
	$rs=mysqli_query($conn,$query);

	$result = '<table><tr><th>Nome</th><th>Status</th><th colspan="2">Opções</th></tr>';
	
	while($rw=mysqli_fetch_assoc($rs))
	{	
		$result = $result . '
		<tr>
			<td class="select_table">'
			. $rw['nome'] .' 
			</td>
			<td class="select_table">' 
			. $rw['status'] . '
			</td>
			<td class="select_table">
			<a href="/admin/admin_equipe.php?opcao=3&id=' . $rw['id_equipe'] . '"><i class="fa fa-edit" style="font-size:48px;color:black"></i></a>
			</td>
			<td class="select_table">
			<a href="/recebeform.php?class=equipe&option=4&id=' . $rw['id_equipe'] . '"><i class="fa fa-trash-o" style="font-size:48px;color:black"></i></a>
			</td>
		</tr>';
	}
	$result = $result . '</table>';
	mysqli_close($conn);
	return $result;
}

//Funcao para selecionar o registro de uma equipe em especifico
function seleciona_um_equipe($id)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="select e.id_equipe,e.nome,s.id_status_equipe as status from equipe e inner join status_equipe s on e.fk_status_equipe = s.id_status_equipe where id_equipe=" . $id;
	$rs=mysqli_query($conn,$query);
	$rw=mysqli_fetch_assoc($rs);
	mysqli_close($conn);
	return $rw;
	
}

//Funcao para selecionar selecionar todas os status_equipe no sistema em um select do html
function seleciona_status_equipe($id_status = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');

	if($id_status != 0)
	{
		$query = "select fk_status_equipe from equipe where id_equipe = " . $id_status;
		$rs = mysqli_query($conn,$query);
		$rw=mysqli_fetch_assoc($rs);
		$status_selecionado = $rw['fk_status_equipe'];
	}
	
	$query="select id_status_equipe,descricao from status_equipe";
	$rs=mysqli_query($conn,$query);
	$result = '<select name="status_equipe">';
	
	if($id_status != 0) 
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_equipe'] . '" ';
			if($rw['id_status_equipe'] == $status_selecionado)
			{
				$result = $result . 'selected="selected" ';
			}
			$result = $result . '>' . $rw['descricao'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_equipe'] . '" >' . $rw['descricao'] . '</option>';
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