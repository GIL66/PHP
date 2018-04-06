<form method="post" action="#">
<div>
<label for="nom">Nom&nbsp;:</label>
<input type ="text" name="nom" value="<?php if(isset($nom)) echo $nom; ?>" />
</div>
<div>
<label for="prenom">Prénom&nbsp;:</label>
<input type ="text" name="prenom" value="<?php if(isset($prenom)) echo $prenom; ?>"/>
</div>
<div>
<label for="mail">Mail&nbsp;:</label>
<input type ="mail" name="mail" value="<?php if(isset($mail)) echo $mail; ?>"/>
</div>
<div>
<label for="mdp">Mot de passe&nbsp;:</label>
<input type ="password" name="mdp" />
</div>
<div>
<input type="reset" value="Effacer" />
<input type="submit" value="Envoyer" />
</div>
<input type ="hidden" name="frmregistration" />
</form>