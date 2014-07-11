<?php 
/*
|=================================================================================================
|        Template: Template básico de página.
|        Controller: pages/display/$page_id
|-------------------------------------------------------------------------------------------------
*/
?>
<div class="sidebar span4">

	<div class="top-space"></div>
	<?php 
    /*
    |=================================================================================================
    |       Se existir posts
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

        ?>
        
        <li class="<?php //echo $post['active']; ?>">
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

    <h1 class="main-title"><?php echo $this->pagina['titulo'];?></h1>
        <span <?php if(isset($this->pagina['adminbar'])) echo $this->pagina['adminbar']; ?>></span>
    
   <?php if(isset($this->pagina['txt'])) echo $this->pagina['txt']; ?>

 

</div>
<!-- .main -->