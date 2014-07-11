<?php $bs = base_url();?>
<!DOCTYPE html>  
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8 ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php if(isset($title))echo $title;?></title>

    <?php if(isset($metatags))echo $metatags;?>

    <!--  Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <?php if(isset($estilos)) echo $estilos;	?>

    <!--[if lt IE 9]>
        <script src="<?php echo $bs;?>assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
    <script src="<?php echo $bs;?>libs/js/modernizr.basic.js"></script>

<script type="text/javascript">
//variavel global para os JS
<?php if(isset($json_vars)) echo 'var CMS = '.json_indent($json_vars).';'; ?>
</script>	

<?php if(isset($scripts)) echo $scripts; ?>

<?php if(isset($page_scripts)) echo $page_scripts; ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23793854-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>



<body class="<?php echo $this->body_class;?>">
<!--[if lt IE 7]>
    <p class="chromeframe">Você está usando um navegador ultrapassado. <a href="http://browsehappy.com/">Atualize seu navegador agora</a> ou <a href="http://www.google.com/chromeframe/?redirect=true">instale o Google Chrome Frame</a> para ter uma melhor experiência neste site.</p>
<![endif]-->

<div class="theme clearfix">
    <div class="container">
        
        <?php if(isset($header)){ echo $header; }?>

        <div id="page" class="row">
            
            <?php if(isset($corpo)){ echo $corpo;} ?>

        </div>
        <!-- #page -->

        <?php if(isset($rodape)){   echo $rodape; }?>

    </div>
    <!-- .container -->
    
</div> <!-- .theme -->


<?php $this->cms_adminbar->generate();?>
</body>
</html>