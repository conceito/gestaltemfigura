<?php 
/*
|=================================================================================================
|        Template: Página Glossário
|        Controller: pages/display/$page_id
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

<h1 class="main-title">Profissionais</h1>

    <?php 
    /*
    |===================================================================================
    |        Se existem responsáveis
    |-----------------------------------------------------------------------------------
    */
    if(isset($responsaveis) && $responsaveis):
    ?>

    <h2 class="second-title">Psicólogos responsáveis</h2>
    <div class="accordion acc-new" id="accordion2">
      
        <?php 
        /*
        |===============================================================================
        |        Looping
        |-------------------------------------------------------------------------------
        */
        $i = 0;
        foreach ($responsaveis as $post):

           $id = $post['id'];
        ?>
        <div class="accordion-group" <?php echo $post['adminbar']; ?>>
            <div class="accordion-heading">
              <a class="accordion-toggle <?php echo ($i==0)?'':'collapsed'; ?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse-<?php echo $id; ?>">
                <?php echo $post['titulo']; ?>
              </a>
              <span class="acc-sidenote"><?php echo $post['tags']; ?></span>
            </div>
            <div id="collapse-<?php echo $id; ?>" class="accordion-body collapse <?php echo ($i==0)?'in':''; ?>">
              <div class="accordion-inner">
                <?php echo $post['txt']; ?>
              </div>
            </div>
        </div>
        <?php 
        $i++;
        endforeach;
        ?>        
    </div>

    <?php 
    endif;
    ?>
    
    <?php 
    /*
    |===================================================================================
    |        Se existem outros
    |-----------------------------------------------------------------------------------
    */
    if(isset($outros) && $outros):
    ?>

    <h2 class="second-title">Equipe</h2>
    <div class="accordion acc-new" id="accordion2">
      
        <?php 
        /*
        |===============================================================================
        |        Looping
        |-------------------------------------------------------------------------------
        */
        $i = 0;
        foreach ($outros as $post):

           $id = $post['id'];
        ?>
        <div class="accordion-group" <?php echo $post['adminbar']; ?>>
            <div class="accordion-heading">
              <a class="accordion-toggle <?php echo ($i==0)?'':'collapsed'; ?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse-<?php echo $id; ?>">
                <?php echo $post['titulo']; ?>
              </a>
              <span class="acc-sidenote"><?php echo $post['tags']; ?></span>
            </div>
            <div id="collapse-<?php echo $id; ?>" class="accordion-body collapse <?php echo ($i==0)?'in':''; ?>">
              <div class="accordion-inner">
                <?php echo $post['txt']; ?>
              </div>
            </div>
        </div>
        <?php 
        $i++;
        endforeach;
        ?>        
    </div>

    <?php 
    endif;
    ?>

</div>
<!-- .main -->