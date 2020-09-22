import {PewComponent} from "../../../assets/raw/js/components/pew-component";

export default class NoAjaxTransitionComponent extends PewComponent {

  init() {
    this.element.removeClass('transitionning');
    this.setupTransitionTriggers();
  }

  setupTransitionTriggers() {
    const exceptions = [
      '.no-transition',
      '.no-barba',
      '.module-actu .pagination a',
      '.module-faq .pagination a',
      '.post-edit-link'
    ];
    $('a').not(exceptions.join(',')).on('click', (e) => {
      let $link = $(e.currentTarget);
      let href = $link.attr('href');
      if (
        (
          href.indexOf(window.location.host) !== -1 //on trouve bien l'url du site dans le lien
          || href.indexOf('?cat') !== -1 //Lien de cat
          || href.indexOf('./') !== -1 // Lien relatif
        )
        && href.indexOf('#') === -1 //Pas une ancre
        && ( !$(e.currentTarget).attr('target') || $link.attr('target') !== '_blank') //Pas un target blank
        && !e.metaKey //Meta key is not pressed
      ) {
        console.log('[Transition] lien concerne');
        $('#content').addClass('transitionning');
      } else {
        console.log('[Transition] lien non concerne');
      }
    });
  }

}

window.pew.addRegistryEntry({key: 'noajax-transition', domSelector: '#content', classDef: NoAjaxTransitionComponent});

