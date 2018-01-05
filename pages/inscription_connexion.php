<?php
//traitement formulaire
if (isset($_GET['save'])) {
    //extrait les champs du tableau $_GET pour simplifier
    //ecriture
 
    extract($_GET, EXTR_OVERWRITE);
    if (empty($email1) || empty($email2) || empty($mdp) || empty($nom) || empty($prenom) || empty($telephone) || empty($adresse)) 
    {

        print "Veuillez remplir tous les champs";
    } 
    else
    {
        //$erreur="";
        $client = new ClientDB($cnx);
        $client->addClient($_GET);
    }
}
 /*  connexion en tant que client */
if(isset($_POST['connexion'])){
    
    $log=new ClientDB($cnx);
    $client=$log->isConnected($_POST['email'],$_POST['mdp']);

    if(is_null($client)){
        $message="<br/> données incorrectes";
    }
    else{
        $_SESSION['client']=2;
        $message="Authentifié!";
        ?>
<meta http-equiv="refresh": content="1;url=index.php?page=accueil">
        <?php
    }
  
}
    
    if(isset($_POST['admin'])){
    
    $log=new AdminDB($cnx);
    $admin=$log->isAdmin($_POST['email'],$_POST['mdp']);
    if(is_null($admin)){
        $message="<br/> données incorrectes";
    }
    else{
        $_SESSION['admin']=1;
        $message="Authentifié!";
     
        ?>
<meta http-equiv="refresh": content="0;url=http://localhost/Mes%20sites/projet_web_2/admin/index.php?page=accueil_admin">
        <?php
    }
  
}
    ?>


<div class="container">
    <div class="row">
        <div class="span12">
            <div class="" id="loginModal">

                <div class="modal-header">


                    <h3>Se connecter</h3>

                </div>

                <div class="modal-body">

                    <div class="well">

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                            <li><a href="#create" data-toggle="tab">Créer un compte</a></li>
                        </ul>


                        <div id="myTabContent" class="tab-content">

                            <div class="tab-pane active in" id="login">
                                <section id="message"><?php if (isset($message)) print $message; ?></section>
                                <form class="form-horizontal" action="<?php print $_SERVER['PHP_SELF']; ?>" method="post" id="form_commande">
                                    <fieldset>
                                        <div id="legend">
                                            <legend class="">Login</legend>
                                        </div>    
                                        <div class="control-group">
                                            <div class="row">
                                                <div class="col-sm-3"><label for="login">Email</label></div>
                                                <div class="col-sm-4">
                                                    <input type="email" id="email1" name="email" placeholder="aaa@aaa.aa"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"><label for="Password">Password</label></div>
                                                <div class="col-sm-4">
                                                    <input type="password" name="mdp" id="password1" />
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <!-- Button -->
                                                <div class="controls">
                                                     <input type="submit" class="btn btn-primary" name="connexion" id="connexion" value="connection" class="pull-right"/>&nbsp;  
                                                     <input type="submit" class="btn btn-primary" name="admin" id="admin" value="admin" class="pull-right"/>&nbsp; 
                                                     <input type="reset"  class="btn btn-success" id="reset" value="Annuler" class="pull-left"/>
                                                </div>
                                               
                                                               
                                                   
                                               
                                            </div>
                                    </fieldset>
                                </form>   


                            </div>
                            <div class="tab-pane fade" id="create">
                                <form class="form-horizontal" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">
                                    <div id="legend">
                                        <legend class="">inscription</legend>
                                        <div class="row">
                                            <div class="col-sm-3"><label for="email1">Email</label></div>
                                            <div class="col-sm-4">
                                                <input type="email" id="email1" name="email1" placeholder="aaa@aaa.aa"/>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"><label for="email2">Confirmez votre email</label></div>
                                            <div class="col-sm-4">
                                                <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-3"><label for="mdp">Password</label></div>
                                            <div class="col-sm-4">
                                                <input type="mdp" name="mdp" id="password" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"><label for="nom">Nom</label></div>
                                            <div class="col-sm-4">
                                                <input type="text" name="nom" id="nom" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"><label for="prenom">Prénom</label></div>
                                            <div class="col-sm-4">
                                                <input type="text" name="prenom" id="prenom" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"><label for="telephone">Téléphone</label></div>
                                            <div class="col-sm-4">
                                                <input type="text" name="telephone" id="telephone" placeholder="xxx/xx.xx.xx"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"><label for="adresse">Adresse</label></div>
                                            <div class="col-sm-4">
                                                <input type="text" name="adresse" id="adresse" />
                                            </div>
                                        </div> 
                                        <br/>
                                        <div>
                                            <input type="submit" class="btn btn-primary" name="save" id="save" value="Finaliser mon inscription" class="pull-right"/>&nbsp;           
                                            <input type="reset"  class="btn btn-success" id="reset" value="Annuler" class="pull-left"/>
                                        </div>

                                    </div>
                            </div>
                            <br/>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>