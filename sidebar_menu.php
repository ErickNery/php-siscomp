<?php session_start();
include_once('definitions.php');
?>

 <div class="sidebar_container">
    <h4 class="navegation">Usuário: <?php echo $_SESSION['user_name']?></h4> 
	<h4 class="navegation">Perfil: <?php echo " " . $_SESSION['profile_name']?></h4> 
	<h4 class="navegation">Menu</h4>
	<ul id="navegation_menu" class="navegation">
	<div onmouseover="aux_nav(1,1)" onmouseout="aux_nav(1,2)">
		<li class="navegation"><a href="#" class="sidebar_item" >Gerenciar Atleta</a></li>
		<div id="nav_1">
			<ul >
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::atleta);
					echo'.php?opcao=';
					echo(Definitions::inserir);
					?> " class="sidebar_item">Inscrever  Atleta</a></li>
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::atleta);
					echo'.php?opcao=';
					echo(Definitions::visualizar);
					?> " class="sidebar_item">Visualizar Atletas</a></li>
			</ul>
		</div>
	</div>
	<div onmouseover="aux_nav(2,1)" onmouseout="aux_nav(2,2)">
    	<li class="navegation"><a href="#" class="sidebar_item">Gerenciar Time</a></li>
		<div id="nav_2">
			<ul >
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::equipe);
					echo'.php?opcao=';
					echo(Definitions::inserir);
					?> " class="sidebar_item">Inscrever  Time</a></li>
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::equipe);
					echo'.php?opcao=';
					echo(Definitions::visualizar);
					?> " class="sidebar_item">Visualizar Time</a></li>
			</ul>
		</div>
	</div>
	<div onmouseover="aux_nav(3,1)" onmouseout="aux_nav(3,2)">
		<li class="navegation"><a href="#" class="sidebar_item">Gerenciar Competição</a></li>
		<div id="nav_3">
			<ul >
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::competicao);
					echo'.php?opcao=';
					echo(Definitions::inserir);
					?> " class="sidebar_item">Inscrever  Competição</a></li>
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::competicao);
					echo'.php?opcao=';
					echo(Definitions::visualizar);
					?> " class="sidebar_item">Visualizar Competicão</a></li>
			</ul>
		</div>
	</div>
	<div onmouseover="aux_nav(4,1)" onmouseout="aux_nav(4,2)">
		<li class="navegation"><a href="#" class="sidebar_item">Gerenciar Rodada</a></li>
		<div id="nav_4">
			<ul >
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::rodada);
					echo'.php?opcao=';
					echo(Definitions::inserir);
					?> " class="sidebar_item">Inscrever  Rodada</a></li>
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::rodada);
					echo'.php?opcao=';
					echo(Definitions::visualizar);
					?> " class="sidebar_item">Visualizar Rodada</a></li>
			</ul>
		</div>
	</div>
	<div onmouseover="aux_nav(5,1)" onmouseout="aux_nav(5,2)">
		<li class="navegation"><a href="#" class="sidebar_item">Gerenciar Jogo</a></li>
		<div id="nav_5">
			<ul >
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::jogo);
					echo'.php?opcao=';
					echo(Definitions::inserir);
					?> " class="sidebar_item">Inscrever  Jogo</a></li>
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::jogo);
					echo'.php?opcao=';
					echo(Definitions::visualizar);
					?> " class="sidebar_item">Visualizar Jogo</a></li>
			</ul>
		</div>
	</div>
	<div onmouseover="aux_nav(6,1)" onmouseout="aux_nav(6,2)">
		<li class="navegation"><a href="#" class="sidebar_item">Gerenciar Participação</a></li>
		<div id="nav_6">
			<ul >
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::participacao);
					echo'.php?opcao=';
					echo(Definitions::inserir);
					?> " class="sidebar_item">Inscrever  Participação</a></li>
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::participacao);
					echo'.php?opcao=';
					echo(Definitions::visualizar);
					?> " class="sidebar_item">Visualizar Participação</a></li>
			</ul>
		</div>
	</div>
	<div onmouseover="aux_nav(7,1)" onmouseout="aux_nav(7,2)">
		<li class="navegation"><a href="#" class="sidebar_item">Gerenciar Inscrição</a></li>
		<div id="nav_7">
			<ul >
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::inscricao);
					echo'.php?opcao=';
					echo(Definitions::inserir);
					?> " class="sidebar_item">Inscrever  Inscrição</a></li>
				<li class="navegation"><a href="
					<?php echo'/admin/admin_';
					echo(Definitions::inscricao);
					echo'.php?opcao=';
					echo(Definitions::visualizar);
					?> " class="sidebar_item">Visualizar Inscrição</a></li>
			</ul>
		</div>
	</div>
	</ul> 		
</div><!--close sidebar_container-->	