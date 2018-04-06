<h1>Se connecter</h1>
<form method="post" action="#">
  <div class="container">
    <label for="identifiant"><b>identifiant</b></label>
    <input type="text" placeholder="Entrez un identifiant" name="identifiant" required>

    <label for="mdp"><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer mot de passe" name="mdp" required>

    <input type="submit" value="Valider" />
    <label>
      <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <input type="submit" value="Annuler"/>
    <span class="mdp">Mot de passe<a href="#">oublié?</a></span>
  </div>
  <input type ="hidden" name="frmregistration" />
</form>