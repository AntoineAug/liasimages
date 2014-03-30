<?php include "header.php"; ?>
	<div id="contact">
		<div class="bg"></div>
		<div class="content">
			<div id="presentation">
				<h1>Contact</h1>
				<h3 class="name">Célia HANINI</h3>
				Nîmes - Montpellier - Avignon<br/>
				contact@liasimages.com</br/>
				+(33) 6 78 90 13 45<br/>
				<br/>
				Portrait - Book - Edito - Test agence - Campagne publicitaire - Mariage<br/>
				Contactez-moi via le formulaire ci-dessous pour plus d'informations sur mes prestations et services.<br/>
			</div>
			<form class="form-horizontal" id="contactForm" method="post" action="/contact">
				<div id="notification"></div>
				<div class="control-group">
					<label class="control-label" for="inputSujet">Sujet</label>
					<div class="controls">
						<input type="text" id="inputSujet" placeholder="Sujet" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputNom">Nom</label>
					<div class="controls">
						<input type="text" id="inputNom" placeholder="Nom" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputEmail">Email</label>
					<div class="controls">
						<input type="email" id="inputEmail" placeholder="Email" required>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputEmail">Message</label>
					<div class="controls">
						<textarea id="textareaMessage" placeholder="Votre message..." rows="8" cols="5"></textarea>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="checkbox">
			      			<input type="checkbox" id="checkboxCopie" checked> Recevoir une copie.
			      		</label>
						<button type="submit" class="btn">Envoyer !</button>
					</div>
				</div>
			</form>
		</div>
		<div class="clear"></div>
	</div><!-- END CONTACT-->

<?php include "footer.php"; ?>