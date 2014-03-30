		</div><!-- END SIDEBAR -->
	</div><!-- END MAIN -->
</div><!-- END WRAP -->

<div id="footer">
	<a id="logo" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>"></a>
	<span class="separator">-</span>
		<a href="https://www.facebook.com/Lia.s.Images" onClick="_gaq.push(['_trackEvent', 'Footer', 'clic', 'Facebook']);">Facebook</a>
	<?php if (is_dir(getRootDirectory().'/images/'.TARIFS_PAGE)): ?>	
		<span class="separator">-</span>
			<a href="/tarifs" onClick="_gaq.push(['_trackEvent', 'Footer', 'clic', 'Tarifs']);">Tarifs</a>
	<?php endif ?>
	<span class="separator">-</span>
		<a href="/legal" onClick="_gaq.push(['_trackEvent', 'Footer', 'clic', 'Mentions légales']);">Mentions légales</a>
	<span class="separator">-</span>
	Tous droits réservés &copy; <?= date("Y"); ?>
</div><!-- END FOOTER -->

</body>
</html>