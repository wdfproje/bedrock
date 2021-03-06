<?php

namespace WonderWp\Plugin\GutenbergUtils\Child;

use WonderWp\Component\DependencyInjection\Container;
use WonderWp\Plugin\GutenbergUtils\Bloc\AccordionBlock\AccordionBlock;
use WonderWp\Plugin\GutenbergUtils\Bloc\AccordionBlock\AccordionPaneBlock;
use WonderWp\Plugin\GutenbergUtils\Child\Bloc\QualiteBlock\QualiteBlock;
use WonderWp\Plugin\GutenbergUtils\Component\TestMolecule;
use WonderWp\Plugin\GutenbergUtils\GutenbergUtilsManager;
use WonderWp\Theme\Child\Components\Button\ButtonComponent;
use WonderWp\Theme\Child\Components\Card\CardComponent;
use WonderWp\Theme\Child\Components\Dropdown\DropdownComponent;
use WonderWp\Theme\Child\Components\GutenbergCardComponent\CardGutenbergComponent;
use WonderWp\Theme\Child\Components\VideoEmbed\VideoEmbedComponent;
use WonderWp\Theme\Child\Components\VideoModale\VideoModaleComponent;

class GutenbergUtilsThemeManager extends GutenbergUtilsManager
{
    public function register(Container $container)
    {

        $this->setConfig('blocksToRegister',[
            AccordionBlock::class,
            AccordionPaneBlock::class
        ]);

        $this->setConfig('moleculesToRegister', [
            VideoEmbedComponent::class,
            VideoModaleComponent::class,
            DropdownComponent::class,
            CardComponent::class,
            ButtonComponent::class
        ]);

        parent::register ($container);

        return $this;
    }
}
