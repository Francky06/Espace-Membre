<?php

	if (isset($errors) and count ($errors) != 0 ) {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
		foreach ($errors as $error) {
			echo $error;
		}
  		echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
	}	

?>