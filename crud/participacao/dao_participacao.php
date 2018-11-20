<?php

/* dao_equipe.php - Arquivo responsavel por tratar das operacoes com banco de dados */


//Funcao usada para selecionar todas as equipes no sistema em um select do html
function seleciona_participacao()
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query='SELECT id_participacao,fk_equipe,fk_jogo,gols_jogo,vencedor FROM participacao WHERE fk_equipe <> 4 AND fk_jogo <> 5';
	$rs=mysqli_query($conn,$query);

	$result = '
	<table>
		<tr>
			<th>Id</th>
			<th>Jogo</th>
			<th>Equipe</th>
			<th>Gols</th>
			<th>Vencedor</th>
			<th colspan="2">Opções</th>
		</tr>';
	
	while($rw=mysqli_fetch_assoc($rs))
	{	
		$result = $result . '
		<tr>
			<td class="select_table">'
			. $rw['id_participacao'] .' 
			</td>
			<td class="select_table">'
			. $rw['fk_jogo'] .' 
			</td>
			<td class="select_table">' 
			. $rw['fk_equipe'] . '
			</td>
			<td class="select_table">'
			. intval($rw['gols_jogo']) .' 
			</td>
			<td class="select_table">'
			. $rw['vencedor'] .' 
			</td>
			<td class="select_table">
			<a href="/admin/admin_participacao.php?opcao=3&id=' . $rw['id_participacao'] . '"><i class="fa fa-edit" style="font-size:48px;color:black"></i></a>
			</td>
			<td class="select_table">
			<a href="/recebeform.php?class=participacao&option=4&id=' . $rw['id_participacao'] . '"><i class="fa fa-trash-o" style="font-size:48px;color:black"></i></a>
			</td>
		</tr>';
	}
	$result = $result . '</table>';
	mysqli_close($conn);
	return $result;
}

//Funcao para selecionar o registro de uma equipe em especifico
function seleciona_um_participacao($id)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT id_participacao,fk_jogo,fk_equipe,gols_jogo,vencedor FROM participacao where id_participacao = " . $id;
	$rs=mysqli_query($conn,$query);
	$rw=mysqli_fetch_assoc($rs);
	mysqli_close($conn);
	return $rw;
	
}

function seleciona_jogo_participacao($id_jogo = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT j.id_jogo,r.id_rodada,c.nome FROM jogo j INNER JOIN rodada r ON j.fk_rodada = r.id_rodada INNER JOIN competicao c ON r.fk_competicao = c.id_competicao WHERE r.fk_status_rodada <> 4 AND c.fk_status_competicao NOT IN (3,4,5)";
	$rs=mysqli_query($conn,$query);

	$result = '<select name="jogo_participacao">';
	$result = $result . '<option value="0">--Selecionar--</option>';
	
	if($id_jogo == 0)
	{
		while($rw=mysqli_fetch_assoc($rs))
		{	
			$result = $result . '<option value="' . $rw['id_jogo'] . '"> Jogo ' . $rw['id_jogo'] . ' Rodada ' . $rw['id_rodada'] . ' ' . $rw['nome'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_jogo'] . ' " ';
			if($rw['id_jogo'] == $id_jogo) $result = $result . 'selected="selected" ';
			$result = $result . '> Jogo ' . $rw['id_jogo'] . ' Rodada ' . $rw['id_rodada'] . ' ' . $rw['nome'] . '</option>';
		}
	}
	$result = $result . '</select>';
	mysqli_close($conn);
	return $result;
}

function seleciona_equipe_participacao($nome_item,$id_equipe = 0)
{
	require($_SERVER['DOCUMENT_ROOT'] . '/conecta.php');
	$query="SELECT id_equipe, nome FROM equipe WHERE fk_status_equipe <> 4";
	$rs=mysqli_query($conn,$query);

	$result = '<select name="' . $nome_item . '">';
	$result = $result . '<option value="0">--Selecionar--</option>';
	
	if($id_equipe == 0)
	{
		while($rw=mysqli_fetch_assoc($rs))
		{	
			$result = $result . '<option value="' . $rw['id_equipe'] . '" >' . $rw['nome'] . '</option>';
		}
	}
	else
	{
		while($rw=mysqli_fetch_assoc($rs))
		{
			$result = $result . '<option value="' . $rw['id_equipe'] . '" ';
			if($rw['id_equipe'] == $id_equipe)
			{
				$result = $result . 'selected="selected" ';
			}
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