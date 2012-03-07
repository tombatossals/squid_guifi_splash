<!DOCTYPE html>
<?php

  function isURL($url = NULL) {
        if($url==NULL) return false;

        $protocol = '(http://|https://)';
        $allowed = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)';
        $regex = "^". $protocol .
                         '(' . $allowed . '{1,63}\.)+'.
                         '[a-z]' . '{2,6}';
        if(eregi($regex, $url)==true) return true;
        else return false;
  }

  if (array_key_exists("url", $_GET) && isURL($_GET['url'])) {
	  $url = $_GET['url'];
  } else {
	  $url = "http://www.google.es";
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Benvingut al proxy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon" href="assets/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-touch-icon-114x114.png">
  </head>

  <body style="background-image: url(assets/img/grid-18px-masked.png);">


    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <header class="jumbotron masthead" style="margin-bottom: 0;">
	<div class="inner">
        <h1>Benvingut al proxy!</h1>
	<p style="font-size: 1.6em;">Vas a acceder a Internet a trav&eacute;s de guifi.net mediante un proxy montado en un servidor Linux, y el ADSL de 4MB de mi casa. Disfruta de la navegaci&oacute;n y vuelve siempre que quieras.</p>
        <p class="download-info"><a class="btn btn-danger btn-large" href="<?php echo $url; ?>">Continuar amb la navegaci&oacute; &raquo;</a></p>
      </div>

	<ul class="quick-links">
	<li>Se te redirigir&aacute; a <a href="<?php echo $url; ?>"><?php echo $url ?></a> en <span style="font-size: 1.4em;" class="countdown">60</span> segundos.</li>
        </ul>
	</header>

      <!-- Example row of columns -->
      <div class="row">
        <div class="offset1 span5">
          <h2>Solicitar un usuari</h2>
	  <p>El proxy es autenticado, pero puedes crearte un usuario para poder acceder, es un proceso semi-autom&aacute;tico bastante sencillo. Visita la siguiente p&aacute;gina para obtener mas informacion sobre este proceso.</p>
          <p><a class="btn" href="http://castello.guifi.net/node/249">Informaci&oacute; sobre proxies federats &raquo;</a></p>
       </div>
        <div class="span5">
          <h2>Comunitat guifi.net en Castell&oacute;</h2>
	  <p>Si tienes cualquier duda y necesitas ayuda, o quieres estar enterado sobre las nuevas zonas por las que se va ampliando la cobertura de <a href="guifi.net">guifi.net</a> en Castell&oacute;n, puedes suscribirte a la lista de correo.</p>
          <p><a class="btn" href="http://castello.guifi.net/cgi-bin/mailman/listinfo/usuaris">Suscriu-te a la llista de correu &raquo;</a></p>
        </div>
      </div>

      <!-- modal box -->
	  <div class="modal hide" id="myModal">
  	  <div class="modal-header">
    	<a class="close" data-dismiss="modal">×</a>
    	<h3>Lista de correo de castello.guifi.net</h3>
  	  </div>
  	  <div class="modal-body" style="margin-top: 1em;">
		<p>Introduce tu e-mail para suscribirte a la lista de correo de usuarios de <a href="http://guifi.net">guifi.net</a> en Castell&oacute;n</p>
		<form id="subcribe" class="form-horizontal" style="margin-bottom: 0;">
   			<div class="control-group">
   				<label class="control-label" for="email">Direcci&oacute;n de correo:</label>
   				<div class="controls">
      				<input type="email" autofocus="autofocus" class="input-xlarge focused" id="email" />
   				</div>
   			</div>
		</form>
  	  </div>
  	  <div class="modal-footer">
    	<a href="#" class="btn btn-primary">Suscribirse</a>
    	<a href="#" data-dismiss="modal" class="btn">Cerrar</a>
  	  </div>
	</div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script type="text/javascript">

	$(function() {

		var count = 60;
		var countdown = setInterval(function() {
			$("span.countdown").html(count);
			if (count == 0) {
				window.location = "<?php echo $url; ?>";
			}
			count--;
		}, 1000);

	});
    </script>
  </body>
</html>
