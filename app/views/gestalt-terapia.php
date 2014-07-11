<?php 
/*
|=================================================================================================
|        Template: Páginas do item Gestalt-terapia.
|        Controller: pages/display/$page_id
|-------------------------------------------------------------------------------------------------
*/
?>
<div class="sidebar span4">

	<div class="top-space"></div>
	<?php 
    /*
    |=================================================================================================
    |       Submenu de gestalt-terapia
    |-------------------------------------------------------------------------------------------------
    */
    if(isset($children) && $children):
    ?>
    
    <ul class="side-list unstyled">
        
        <?php 
        /*
        |=================================================================================================
        |       Looping pelos posts
        |-------------------------------------------------------------------------------------------------
        */
        foreach ($children as $post) :

        	if($post['nick'] == $this->uri->segment(2)){
        		$active = 'active';
        	} else {
        		$active = '';
        	}
        ?>
        
        <li class="<?php echo $active; ?>">
            <a href="<?php echo site_url($post['uri']); ?>"><?php echo $post['titulo']; ?></a>
        </li>
        
        <?php 
        endforeach;
        ?>
        
    </ul>
    <!-- .side-list -->
    
    <?php 
    endif;
    ?>
    <p></p>
  
    <a href="http://www.facebook.com/gestaltemfigura" target="_blank" title="Facebook" class="share-link">
        <i class="sprite icon-facebook"></i>
        <span>Curta nossa página <br>no Facebook</span>
    </a>
    
    
</div>
<!-- .sidebar -->

<div class="main span8">

    <h1 class="main-title"><?php echo $masterPage['titulo'];?></h1>
        <span <?php if(isset($this->pagina['adminbar'])) echo $this->pagina['adminbar']; ?>></span>
        
        
    <h2 class="second-special-title"><?php if(isset($this->pagina['titulo'])) echo $this->pagina['titulo']; ?></h2>
    
   <?php if(isset($this->pagina['txt'])) echo $this->pagina['txt']; ?>

 

</div>
<!-- .main -->