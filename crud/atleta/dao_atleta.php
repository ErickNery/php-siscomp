<?php

/* dao_equipe.php - Arquivo responsavel por tratar das operacoes com banco de dados */


function seleciona_equipe_atleta($id_equipe = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="select id_equipe,nome,fk_status_equipe from equipe where fk_status_equipe <> 4";
	$rs=mysqli_query($conn,$query);

	$result = '<select name="equipe_atleta">';
	$result = $result . '<option value="0">--Selecionar--</option>';
	
	if($id_equipe == 0)
	{
		while($rw=mysqli_fetch_assoc($rs))
		{	
			$result = $result . '<option value="' . $rw['id_equipe'] . '">' . $rw['nome'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_equipe'] . ' " ';
			if($rw['id_equipe'] == $id_equipe) $result = $result . 'selected="selected" ';
			$result = $result . '>' . $rw['nome'] . '</option>';
		}
	}
	$result = $result . '</select>';
	mysqli_close($conn);
	return $result;
}

function seleciona_atleta()
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT a.id_atleta,a.cpf,a.nome,a.idade,a.cartoes,e.nome as equipe_atleta,s.descricao as status from atleta a INNER JOIN status_atleta s ON a.fk_status_atleta = s.id_status_atleta INNER JOIN equipe e ON a.fk_equipe = e.id_equipe where e.fk_status_equipe <> 4; ";
	
	$rs=mysqli_query($conn,$query);

	$result = '
	<table>
		<tr>
			<th>CPF</th>
			<th>Nome</th>
			<th>Idade</th>
			<th>cartões</th>
			<th>Time</th>
			<th>Status</th>
			<th colspan="2">Opções</th>
		</tr>';
	
	while($rw=mysqli_fetch_assoc($rs))
	{	
		$result = $result . '
		<tr>
			<td class="select_table">'
			. $rw['cpf'] .' 
			</td>
			<td class="select_table">' 
			. $rw['nome'] . '
			</td>
			<td class="select_table">' 
			. $rw['idade'] . '
			</td>
			<td class="select_table">' 
			. $rw['cartoes'] . '
			</td>
			<td class="select_table">' 
			. $rw['equipe_atleta'] . '
			</td>
			<td class="select_table">' 
			. $rw['status'] . '
			</td>
			<td class="select_table">
			<a href="/admin/admin_atleta.php?opcao=3&id=' . $rw['id_atleta'] . '"><i class="fa fa-edit" style="font-size:48px;color:black"></i></a>
			</td>
			<td class="select_table">
			<a href="/recebeform.php?class=atleta&option=4&id=' . $rw['id_atleta'] . '"><i class="fa fa-trash-o" style="font-size:48px;color:black"></i></a>
			</td>
		</tr>';
	}
	$result = $result . '</table>';
	mysqli_close($conn);
	return $result;
}

//Funcao para selecionar o registro de uma equipe em especifico
function seleciona_um_atleta($id)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query='SELECT cpf,nome,idade,cartoes,fk_equipe,fk_status_atleta FROM atleta WHERE id_atleta =' . $id;
	$rs=mysqli_query($conn,$query);
	$rw=mysqli_fetch_assoc($rs);
	mysqli_close($conn);
	return $rw;
	
}

//Funcao para selecionar selecionar todas os status_equipe no sistema em um select do html
function seleciona_status_atleta($id_status = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	
	$query="select id_status_atleta,descricao from status_atleta";
	$rs=mysqli_query($conn,$query);
	$result = '<select name="status_atleta">';
	
	if($id_status == 0) 
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_atleta'] . '" >' . $rw['descricao'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_atleta'] . '" ';
			if($rw['id_status_atleta'] == $id_status)
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
?>