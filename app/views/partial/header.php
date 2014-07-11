<header id="header" class="row">
            
    <div class="span3">
        <a href="<?php echo site_url('inicio'); ?>" title="Instituto Psicologia Gestalt em Figura" class="ir sprite logo">Instituto Psicologia Gestalt em Figura</a>
    </div>
    <div class="span9 nav-top">
    	
    	<ul id="menu" class="unstyled">
    		<li class="th-menu-a mn-inicio <?php echo ($this->uri_seg[1]=='home')?'active':''; ?>">
                <a href="<?php echo site_url('inicio'); ?>">Início</a>
            </li>
            
            <?php if($pages['clinica']->status == 1): ?>
            <li class="th-menu-b mn-clinica <?php echo ($this->uri_seg[1]=='clinica')?'active':''; ?>">
                <a href="<?php echo site_url('clinica'); ?>">Clínica</a>
            </li>
            <?php endif; ?>
            
            <?php //if($pages['cursos']->status == 1): ?>
            <li class="th-menu-b mn-cursos <?php echo ($this->uri_seg[1]=='cursos')?'active':''; ?>">
                <a href="<?php echo site_url('cursos'); ?>">Cursos</a>
            </li>
            <?php //endif; ?>
            
            <?php if($pages['desenvolvimento-humano']->status == 1): ?>
            <li class="th-menu-b mn-desenvolvimento <?php echo ($this->uri_seg[1]=='desenvolvimento-humano')?'active':''; ?>">
                <a href="<?php echo site_url('desenvolvimento-humano'); ?>">Desenvolvimento humano</a>
            </li>
            <?php endif; ?>
            
            <?php if($pages['gestalt-terapia']->status == 1): ?>
            <li class="th-menu-a mn-gestalt <?php echo ($this->uri_seg[1]=='gestalt-terapia')?'active':''; ?>">
                <a href="<?php echo site_url('gestalt-terapia'); ?>">Gestalt-terapia</a>
            </li>
            <?php endif; ?>

            <?php if($pages['profissionais']->status == 1): ?>
            <li class="th-menu-a mn-profissionais <?php echo ($this->uri_seg[1]=='profissionais')?'active':''; ?>">
                <a href="<?php echo site_url('profissionais'); ?>">Profissionais</a>
            </li>
            <?php endif; ?>
            
            <?php if($pages['evento']->status == 1): ?>
            <li class="th-menu-a mn-biblioteca <?php echo ($this->uri_seg[1]=='evento')?'active':''; ?>">
                <a href="<?php echo site_url('evento'); ?>">Evento</a>
            </li>
            <?php endif; ?>
                
                <!-- <li class="th-menu-a mn-biblioteca <?php echo ($this->uri_seg[1]=='biblioteca')?'active':''; ?>"><a href="<?php echo site_url('biblioteca'); ?>">Biblioteca</a></li> -->
                
            <li class="th-menu-a mn-contato <?php echo ($this->uri_seg[1]=='contato')?'active':''; ?>"><a href="<?php echo site_url('contato'); ?>">Contato</a></li>
    	</ul>
    	
    </div>

</header>
<!-- #header -->