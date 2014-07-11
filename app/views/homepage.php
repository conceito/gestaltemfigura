<div class="sidebar span4">
                
    <div class="boasvindas1">
        <strong>Bem-vindo </strong> <br>
        ao site do <br>
        Instituto de Psicologia <br>
        Gestalt em Figura.
    </div>
    <div class="boasvindas2">
        <p>O trabalho com nossos colegas, alunos e clientes visa proporcionar encontros que favoreçam o desenvolvimento do Ser. Temos a preocupação de aprimorar nossa qualidade de contato humano, para que esta visão de homem possa ser percebida por quem nos procura.</p>
    </div>
    
    <address>
        <i class="sprite icon-place"></i>
        <p><strong>Largo do Machado</strong> <br>
        <span class="fs-12">(próximo ao metrô)</span></p>                
        <p>(21) 2205-9021</p>
    </address>
     
    <p></p>
    
    <a href="http://www.facebook.com/gestaltemfigura" target="_blank" title="Facebook" class="share-link">
        <i class="sprite icon-facebook"></i>
        <span>Curta nossa página <br>no Facebook</span>
    </a>

</div>
<!-- .sidebar -->

<div class="main span8">

    <div class="homeslider flexslider">
        <?php if($banners) echo $banners ?>
    </div><!-- .flexslider -->
    <script type="text/javascript">
    $(document).ready(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: true
        }); 
    });
    </script>
    
    <?php 
    /*
    |==========================================================================
    |        Se existem cursos
    |--------------------------------------------------------------------------
    */
    if(isset($cursos) && $cursos):
    ?>
    <!-- .pub-box --------------------------------------------------------------- -->
    <div class="pub-box laranja">
        <div class="hd">
            <div class="pub-title">Nossos Cursos</div>
        </div>
        <div class="ct">
            
            <div class="margin">
                
                <?php 
                /*
                |=================================================================================================
                |       Looping pelos cursos
                |-------------------------------------------------------------------------------------------------
                */
                foreach ($cursos as $post) :
                ?>                
                
                <div class="list-grid">
                    <a href="<?php echo site_url($post['full_uri']); ?>" class="lg-title"><?php echo $post['titulo']; ?></a>
                    <span class="lg-side-note"><?php echo $post['dt_especial']; ?></span>
                </div>
                <!-- .list-grid -->
                
                <?php 
                endforeach;
                ?>
                
                
            </div><!-- .margin -->
            
            <div class="ft">
                <a href="<?php echo site_url('cursos') ?>">SAIBA MAIS <i class="sprite icon-arre-r"></i> </a>
            </div>
            
        </div><!-- .ct -->
        
    </div><!-- .pub-box -->
    <?php endif; ?>
    
    

</div>
<!-- .main -->