<?php 
/*
|=================================================================================================
|        Template: Página Cursos index.
|        Controller: cursos/index
|-------------------------------------------------------------------------------------------------
*/
?>
<div class="sidebar span4">
    <div class="top-space"></div>   
    <p></p>
    
    <a href="http://www.facebook.com/gestaltemfigura" target="_blank" title="Facebook" class="share-link">
        <i class="sprite icon-facebook"></i>
        <span>Curta nossa página <br>no Facebook</span>
    </a>
</div>
<!-- .sidebar -->

<div class="main span8">

    <h1 class="main-title">Cursos</h1>
    
   <?php if(isset($this->pagina['txt'])) echo $this->pagina['txt']; ?>

 	<?php 
 	/*
 	|=================================================================================================
 	|		Se existir posts
 	|-------------------------------------------------------------------------------------------------
 	*/
 	if(isset($posts) && $posts):
 	?>
 	<h3 class="trird-title">PRÓXIMAS TURMAS</h3>

    <div class="list-grid-group">

    	<?php 
    	/*
    	|=================================================================================================
    	|		Looping pelos posts
    	|-------------------------------------------------------------------------------------------------
    	*/
    	foreach ($posts as $post) :
    	?>
    	
        <div class="list-grid">
            <a href="<?php echo site_url($post['full_uri']); ?>" class="lg-title"><?php echo $post['titulo']; ?></a>
            <span class="lg-side-note"><?php echo $post['dt_especial']; ?></span>
        </div>
        <!-- .list-grid -->
        
        <?php 
        endforeach;
        ?>
        
    
    </div>
    <!-- .list-grid-group -->
    
    <?php 
    endif;
    ?>

</div>
<!-- .main -->