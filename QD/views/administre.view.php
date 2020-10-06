	<?php ob_start() ?>
	<h1>Admin</h1>

	 <div class="container-fluid">
	        <Table class="table table-striped table-bordered">
	            <thead class="thead-dark">
	                <TR>
	                    <TH>ID</TH>
	                    <TH>Name</TH>
	                    <TH>Pseudo</TH>
	                    <TH>Email</TH>
	                    <TH>Modifier</TH>
	                    <TH>Supprimer</TH>
	                </TR>
	            </thead>
	            <?php admin(); ?>
	        </Table>


	<?php $contenu = ob_get_clean()  ?>
	<?php require_once 'views/gabarit.php'; ?>