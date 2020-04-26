        <?php
        session_start();
        
        	if($_SESSION["mail"] == 1){
        	$_SESSION["mail"] = 0;
        	echo "<script type='text/javascript'>alert('Agradecemos o seu feedback!');</script>";
        	}
        ?>