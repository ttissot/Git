<?php
/*
 * Squelette : squelettes/inclusions/inc-ga.html
 * Date :      Tue, 06 Nov 2012 23:00:00 GMT
 * Compile :   Fri, 08 Jan 2016 07:20:10 GMT (0.00s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes/inclusions/inc-ga.html
//
function html_8925e9e572dc0d9c64af25cb148027cb($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {
	$page = '<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1353981-3");
pageTracker._initData();
pageTracker._trackPageview();
</script>
';

	return analyse_resultat_skel('html_8925e9e572dc0d9c64af25cb148027cb', $Cache, $page);
}

?>