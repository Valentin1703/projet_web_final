    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<?php
                // Initialisation a '' sinon bug 
		$errName='';
                $errEmail='';
                $errMessage='';
                $errHuman='';
                $result='';
                
	if (isset($_POST["submit"]))
        {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Val informatique'; 
		$to = 'valentin.basteleurs@gmail.com'; 
		$subject = 'Mail send by customers';

		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		// verifie si le nom est rempli
		if (!$_POST['name'])
                {
			$errName = 'Veuillez entrer votre nom';
		}
		
		// verifie si l'email entré est valide
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                {
			$errEmail = 'Entrez votre adresse mail';
		}
		
		// verifie si le message est bien écrit
		if (!$_POST['message'])
                {
			$errMessage = 'Entrez votre message';
                }
		// verification de l'anti bot
		if ($human !== 5) 
                {
			$errHuman = 'l anti spam est inccorecte';
                }

                    // si aucune erreur alors l'email s'envoi
                    if (!$errName && !$errEmail && !$errMessage && !$errHuman)
                        {
                            if (mail ($to, $subject, $body, $from))
                            {
                                    $result='<div class="alert alert-success">Votre mail a bien été envoyer</div>';
                            } 
                            else
                            {
                                    $result='<div class="alert alert-danger">Erreur, mail non envoyez.</div>';
                            }
                        }
	}
?>


  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Contactez-nous !</h1>
                                <form class="form-horizontal" role="form" method="post">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Nom</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nom et prénom" value="">
                                                        
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="azerty@hotmail.com">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
                                                    <textarea class="form-control" rows="4" name="message" placeholder="Votre message "></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="human" name="human" placeholder="Réponse ">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Envoyez" class="btn btn-primary">
                                                        <input type="reset"  class="btn btn-success" id="reset" value="Annuler" class="pull-left"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
				</form> 
			</div>
		</div>
	</div>   

