import "../../../../../../../node_modules/bxslider/dist/jquery.bxslider.js";
import {PewComponent} from "../../../assets/raw/js/components/pew-component";

// see https://bxslider.com/options/
const SliderOptions = {
    mode: 'horizontal',
    autoControlsCombine: true,
    keyboardEnabled: true,
    easing: 'ease-in-out',
    speed: 700,
    auto: true,
    autoControls: false,
    pager: true,
    stopAutoOnClick: true
};

export class SliderComponent extends PewComponent {
    constructor(element) {
        super(element, SliderOptions);
    }
    init() {
        this.element.bxSlider(this.options);
    }
}

window.pew.addRegistryEntry({key: 'wdf-slider-home', domSelector: '.wdf-slider', classDef: SliderComponent});