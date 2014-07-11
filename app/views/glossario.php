<?php 
/*
|=================================================================================================
|        Template: Página Glossário
|        Controller: pages/display/$page_id
|-------------------------------------------------------------------------------------------------
*/
?>

<?php 
/*
|=================================================================================================
|       Letras
|-------------------------------------------------------------------------------------------------
*/
if(isset($letters) && $letters):
?>
<ul class="h-bar unstyled">

    <?php 
    /*
    |=================================================================================================
    |       Looping pelos posts
    |-------------------------------------------------------------------------------------------------
    */
    foreach ($letters as $post) :

    ?>
    
    <li class="<?php echo $post['active']; ?>">
    <a href="<?php echo site_url('gestalt-terapia/glossario-gestaltico/'.$post['nick']); ?>"><?php echo $post['titulo']; ?></a>
    </li>
   
    
    <?php 
    endforeach;
    ?>

</ul>
<?php 
endif;
?>




<?php 
/*
|=================================================================================================
|        Se existem vocábulos
|-------------------------------------------------------------------------------------------------
*/
if(isset($vocabulos) && $vocabulos):
?>

<h3 class="cap-title"> <i class="sprite icon-arrc-b"></i> <?php echo substr($vocabulos[0]['titulo'], 0, 1) ?></h3>
<div class="accordion" id="accordion2">
  
    <?php 
    /*
    |=================================================================================================
    |        Looping
    |-------------------------------------------------------------------------------------------------
    */
    $i = 0;
    foreach ($vocabulos as $v):

        $id = $v['id'];
    ?>
    <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle <?php echo ($i==0)?'':'collapsed'; ?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse-<?php echo $id; ?>">
            <?php echo $v['titulo']; ?>
          </a>
        </div>
        <div id="collapse-<?php echo $id; ?>" class="accordion-body collapse <?php echo ($i==0)?'in':''; ?>">
          <div class="accordion-inner">
            <?php echo $v['txt']; ?>
          </div>
        </div>
    </div>
    <?php 
    $i++;
    endforeach;
    ?>

  
    
    
</div>
<?php else: ?>
<p>Nenhuma palavra foi encontrada.</p>
<?php 
endif;
?>