<?php

/* dao_equipe.php - Arquivo responsavel por tratar das operacoes com banco de dados */


//Funcao usada para selecionar todas as equipes no sistema em um select do html
function seleciona_rodada()
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT r.id_rodada, c.nome, s.descricao AS status_rodada, r.qtd_jogos_rodada, r.data_inicio, r.data_fim FROM rodada r INNER JOIN status_rodada s ON r.fk_status_rodada = s.id_status_rodada INNER JOIN competicao c ON r.fk_competicao = c.id_competicao AND c.fk_status_competicao NOT IN (3,4,5)";
	$rs=mysqli_query($conn,$query);

	$result = '
	<table>
		<tr>
			<th>Id</th>
			<th>Copmetição</th>
			<th>Status</th>
			<th>Jogos</th>
			<th>Data Inicio</th>
			<th>Data Termino</th>
			<th colspan="2">Opções</th>
		</tr>';
	
	while($rw=mysqli_fetch_assoc($rs))
	{	
		$result = $result . '
		<tr>
			<td class="select_table">'
			. $rw['id_rodada'] .' 
			</td>
			<td class="select_table">'
			. $rw['nome'] .' 
			</td>
			<td class="select_table">' 
			. $rw['status_rodada'] . '
			</td>
			<td class="select_table">'
			. intval($rw['qtd_jogos_rodada']) .' 
			</td>
			<td class="select_table">'
			. $rw['data_inicio'] .' 
			</td>
			<td class="select_table">'
			. $rw['data_fim'] .' 
			</td>
			<td class="select_table">
			<a href="/admin/admin_rodada.php?opcao=3&id=' . $rw['id_rodada'] . '"><i class="fa fa-edit" style="font-size:48px;color:black"></i></a>
			</td>
			<td class="select_table">
			<a href="/recebeform.php?class=rodada&option=4&id=' . $rw['id_rodada'] . '"><i class="fa fa-trash-o" style="font-size:48px;color:black"></i></a>
			</td>
		</tr>';
	}
	$result = $result . '</table>';
	mysqli_close($conn);
	return $result;
}

//Funcao para selecionar o registro de uma equipe em especifico
function seleciona_um_rodada($id)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT id_rodada,fk_competicao,fk_status_rodada,qtd_jogos_rodada,data_inicio,data_fim FROM rodada where id_rodada = " . $id;
	$rs=mysqli_query($conn,$query);
	$rw=mysqli_fetch_assoc($rs);
	mysqli_close($conn);
	return $rw;
	
}

function seleciona_competicao_rodada($id_competicao = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="select id_competicao,nome,fk_status_competicao from competicao where fk_status_competicao NOT IN (3,4,5)"; // esteja em um status valido
	$rs=mysqli_query($conn,$query);

	$result = '<select name="competicao_rodada">';
	$result = $result . '<option value="0">--Selecionar--</option>';
	
	if($id_competicao == 0)
	{
		while($rw=mysqli_fetch_assoc($rs))
		{	
			$result = $result . '<option value="' . $rw['id_competicao'] . '">' . $rw['nome'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_competicao'] . ' " ';
			if($rw['id_competicao'] == $id_competicao) $result = $result . 'selected="selected" ';
			$result = $result . '>' . $rw['nome'] . '</option>';
		}
	}
	$result = $result . '</select>';
	mysqli_close($conn);
	return $result;
}

//Funcao para selecionar selecionar todas os status_equipe no sistema em um select do html
function seleciona_status_rodada($id_status = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');

	$query="select id_status_rodada,descricao from status_rodada";
	$rs=mysqli_query($conn,$query);
	$result = '<select name="status_rodada">';
	
	if($id_status == 0) 
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_rodada'] . '" >' . $rw['descricao'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_status_rodada'] . '" ';
			if($rw['id_status_rodada'] == $id_status)
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