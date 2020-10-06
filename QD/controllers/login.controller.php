<?php 
require_once 'models/login.model.php'; 

if (isset($_POST['login']))
	{

		if (not_empty(['pseudo','password']))

				{

			$_POST=array_map("htmlspecialchars",$_POST);
			$_POST=array_map("trim",$_POST);
			extract($_POST,EXTR_SKIP);

				getlogin($pseudo, $password,0);
				
				


}
	}




require_once 'views/login.view.php'; 