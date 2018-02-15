<?php
/**
 * Created by PhpStorm.
 * User: jeremydesvaux
 * Date: 02/09/2016
 * Time: 09:46
 */

namespace WonderWp\Theme\Child\Service;

use WonderWp\Theme\Child\Components\Dropdown\DropdownComponent;
use WonderWp\Theme\Child\Components\Modal\ModalComponent;
use WonderWp\Theme\Child\Components\Slider\SliderComponent;
use WonderWp\Theme\Child\Components\Slider\SliderItem\SliderItem;
use WonderWp\Theme\Child\Components\Tabs\TabsComponent;
use WonderWp\Theme\Child\Components\Tabs\TabItem\TabItem;
use WonderWp\Theme\Core\Service\ThemeShortcodeService;

class ChildThemeShortcodeService extends ThemeShortcodeService
{
    public function registerShortcodes()
    {
        parent::registerShortcodes();

        add_shortcode('slider', [$this, 'slider']);
        add_shortcode('slider-item', [$this, 'slideritem']);
        add_shortcode('modal', [$this, 'modal']);
        add_shortcode('dropdown', [$this, 'dropdown']);
        add_shortcode('tabs', [$this, 'tabs']);
        add_shortcode('tab-item', [$this, 'tabitem']);

        return $this;
    }

    public function slider($attr, $content)
    {
        $slider      = new SliderComponent();
        $slider->fillWith($attr);

        $sliderItems = [];

        $shortcodes = $this->extractShortcodes($content, 'slider-item');
        foreach ($shortcodes as $shortcode) {
            array_push($sliderItems, do_shortcode($shortcode)); // push slider item markup to slider component
        }
        $slider->sliderItems = $sliderItems;

        return $slider->getMarkup();

    }

    public function slideritem($attr, $content)
    {
        $slideritem = new SliderItem();
        $slideritem->fillWith($attr);

        if (isset($content) && !empty($content)) {
            $slideritem->content = $content;
        }

        return $slideritem->getMarkup();
    }

    public function modal($attr, $content) {
        $modal = new ModalComponent();
        $modal->fillWith($attr);

        if (isset($content) && !empty($content)) {
            $modal->content = $content;
        }

        return $modal->getMarkup();
    }


    public function dropdown($attr) {
        $modal = new DropdownComponent();
        $modal->fillWith($attr);

        return $modal->getMarkup();
    }

    public function tabs($attr, $content) {
        $tab = new TabsComponent();

        $nbTabs = $attr['nbtabs'];
        $tabItems = [];

        $shortcodes = $this->extractShortcodes($content, 'tab-item');


        for($i = 1; $i <= $nbTabs; $i++) {
            $tabItems[$i]['markup'] = do_shortcode($shortcodes[$i - 1]);
            $tabItems[$i]['title'] = $attr['title_'.$i];
        }
        $tab->tabItems = $tabItems;


        return $tab->getMarkup();
    }

    public function tabitem($attr, $content) {
        $tabitem = new TabItem();
        $tabitem->fillWith($attr);

        if (isset($content) && !empty($content)) {
            $tabitem->content = $content;
        }

        return $tabitem->getMarkup();
    }

    public static function extractShortcode($content, $element) {
        $results = [];

        $pattern = get_shortcode_regex();

        if (   preg_match_all( '/'. $pattern .'/s', $content, $matches )
            && array_key_exists( 2, $matches )
            && in_array( $element, $matches[2] ) )
        {
            $results = $matches[0];
        }

        return $results;
    }
}
