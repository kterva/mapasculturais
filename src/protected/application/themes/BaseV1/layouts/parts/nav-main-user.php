<?php $this->applyTemplateHook('nav.main.user','before'); ?>
<li class="user">
    <a href="#" class="js-submenu-toggle" data-submenu-target="$(this).parent().find('.submenu')">
        <div class="avatar">
            <?php if ($app->user->profile->avatar): ?>
                <img src="<?php echo $app->user->profile->avatar->transform('avatarSmall')->url; ?>" />
            <?php else: ?>
                <img src="<?php $this->asset('img/avatar--agent.png'); ?>" />
            <?php endif; ?>
        </div>
    </a>
    <ul class="submenu hidden">
        <li>
            <a href="<?php echo $app->createUrl('panel'); ?>"><?php echo $this->dict('site: panel');?></a>
        </li>
        <?php if($app->isEnabled('events')): ?>
            <?php $this->applyTemplateHook('nav.dropdown.events','before'); ?>
            <li>
                <a href="<?php echo $app->createUrl('panel', 'events') ?>"><?php \MapasCulturais\i::_e("Meus Eventos");?></a>
                <a class="add" href="<?php echo $app->createUrl('event', 'create') ?>" ></a>
            </li>
            <?php $this->applyTemplateHook('nav.dropdown.events','after'); ?>
        <?php endif; ?>

        <?php if($app->isEnabled('agents')): ?>
            <?php $this->applyTemplateHook('nav.dropdown.agents','before'); ?>

            <?php
            $_e_ = "agent";
            $_e_class = $this->entityClassesShortcuts[$_e_];
            $_ent = new $_e_class();

            $_required_keys = array_keys($_ent->getValidations());
            $_entity_name = (new \ReflectionClass($_ent))->getShortName();
            $_e_n = $this->mapaClasses[$_e_];
            $url = $app->createUrl($_e_);
            ?>

            <li>
                <a href="<?php echo $app->createUrl('panel', 'agents') ?>"><?php \MapasCulturais\i::_e("Meus Agentes");?></a>

                <?php if ( "edit" != $this->controller->action ):?>

                <a class="add js-open-dialog" href="#" data-dialog="#addEntity" data-dialog-callback="MapasCulturais.addEntity"
                   data-dialog-block="true" data-form-action='insert'
                   data-dialog-title="<?php \MapasCulturais\i::esc_attr_e('Modal de Entidade'); ?>">
                </a>

                <div id="addEntity" class="js-dialog" style="width: 800px" title="<?php echo "Criar $_e_n - dados básicos"; ?> "> <hr>

                    <form action="<?php echo $url; ?>" method="POST">
                        <input type="text" name="name" value="boris">
                        <input type="text" name="shortDescription" value="minha pequisa descricao">
                        <input type="text" name="parent_id" value="2">
                        <input type="text" name="terms[area][]" value="Turismo">

                        <input type="submit" value="Adicionar">

                        <?php
                        /*
                        $__known_files = ['name','type', 'shortDescription'];
                        foreach ($_required_keys as $required) {
                            if ($_ent->isPropertyRequired($_ent, $required) && in_array($required, $__known_files)) {
                                if ("shortDescription" === $required) { ?>
                                    <p> <?php echo $this->renderShortDescriptionMarkUp(); ?> </p>
                                <?php } else {
                                    $this->part("singles/$required", ['entity' => $_ent, '_entity' => $_e_]);
                                }
                            }
                        } */
                        ?>

                        <div id="editable-entity" class="clearfix" data-action="create" data-entity="<?php echo $this->controller->id ?>" data-id="<?php echo $_ent->id ?>"
                             style="background: white !important; text-align: left !important; margin-top: 20px !important; position: relative !important; border: none !important">
                            <a class="btn btn-primary js-submit-button hltip" hltitle="Publicar entidade"><?php \MapasCulturais\i::_e("Publicar");?></a>
                        </div>

                    </form>

                </div>

                <?php endif;  ?>
            </li>

            <?php $this->applyTemplateHook('nav.dropdown.agents','after'); ?>
        <?php endif; ?>

        <?php if($app->isEnabled('spaces')): ?>
            <?php $this->applyTemplateHook('nav.dropdown.spaces','before'); ?>
            <li>
                <a href="<?php echo $app->createUrl('panel', 'spaces') ?>"><?php $this->dict('entities: My Spaces') ?></a>
                <a class="add"href="<?php echo $app->createUrl('space', 'create') ?>"></a>
            </li>
            <?php $this->applyTemplateHook('nav.dropdown.spaces','after'); ?>
        <?php endif; ?>

       <?php if($app->isEnabled('seals') && $app->user->is('admin')): ?>
            <?php $this->applyTemplateHook('nav.dropdown.seals','before'); ?>
            <li>
                <a href="<?php echo $app->createUrl('panel', 'seals') ?>"><?php $this->dict('entities: My Seals') ?></a>
                <a class="add"href="<?php echo $app->createUrl('seal', 'create') ?>"></a>
            </li>
            <?php $this->applyTemplateHook('nav.dropdown.seals','after'); ?>
        <?php endif; ?>

        <?php if($app->isEnabled('projects')): ?>
            <?php $this->applyTemplateHook('nav.dropdown.projects','before'); ?>
            <li>
                <a href="<?php echo $app->createUrl('panel', 'projects') ?>"><?php \MapasCulturais\i::_e("Meus Projetos");?></a>
                <a class="add" href="<?php echo $app->createUrl('project', 'create') ?>"></a>
            </li>
            <?php $this->applyTemplateHook('nav.dropdown.projects','after'); ?>

            <?php $this->applyTemplateHook('nav.dropdown.registrations','before'); ?>
            <li>
                <a href="<?php echo $app->createUrl('panel', 'registrations') ?>"><?php \MapasCulturais\i::_e("Minhas Inscrições");?></a>
            </li>
            <?php $this->applyTemplateHook('nav.dropdown.registrations','after'); ?>
        <?php endif; ?>

        <?php if($app->isEnabled('opportunities')): ?>
            <?php $this->applyTemplateHook('nav.dropdown.opportunities','before'); ?>
            <li>
                <a href="<?php echo $app->createUrl('panel', 'opportunities') ?>"><?php \MapasCulturais\i::_e("Minhas Oportunidades");?></a>
            </li>
            <?php $this->applyTemplateHook('nav.dropdown.opportunities','after'); ?>

            <?php $this->applyTemplateHook('nav.dropdown.registrations','before'); ?>
            <li>
                <a href="<?php echo $app->createUrl('panel', 'registrations') ?>"><?php \MapasCulturais\i::_e("Minhas Inscrições");?></a>
            </li>
            <?php $this->applyTemplateHook('nav.dropdown.registrations','after'); ?>
        <?php endif; ?>

        <?php if($app->user->is('saasAdmin') && $app->isEnabled('subsite')): ?>
            <?php $this->applyTemplateHook('nav.dropdown.subsite','before'); ?>
            <li>
                <a href="<?php echo $app->createUrl('panel', 'subsite') ?>"><?php $this->dict('entities: My Subsites') ?></a>
                <a class="add"href="<?php echo $app->createUrl('subsite', 'create') ?>"></a>
            </li>
            <?php $this->applyTemplateHook('nav.dropdown.subsite','after'); ?>
        <?php endif; ?>

        <li class="row"></li>
        <!--<li><a href="#">Ajuda</a></li>-->
        <li>
            <?php if($app->getConfig('auth.provider') === 'Fake'): ?>
                <a href="<?php echo $app->createUrl('auth'); ?>"><?php \MapasCulturais\i::_e("Trocar Usuário");?></a>
                <?php if(!empty($fake_options)) echo $fake_options; ?>
            <?php endif; ?>
            <a href="<?php echo $app->createUrl('auth', 'logout'); ?>"><?php \MapasCulturais\i::_e("Sair");?></a>
        </li>
    </ul>
</li>
<!--.user-->
<?php $this->applyTemplateHook('nav.main.user','after'); ?>
