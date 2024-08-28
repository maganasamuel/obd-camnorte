import './bootstrap';

import.meta.glob(['../images/**', '../fonts/**']);

var topHeader = document.querySelector('#top-header');

var mainContentPaddingTop = getComputedStyle(document.querySelector('main#content')).getPropertyValue('padding-top').replace('px', '') - 0;

new SmoothScroll('#top-nav a', {
  speed: 300,
  offset: function () {
    return topHeader.getBoundingClientRect().height;
  },
});

new Gumshoe('#top-nav a', {
  offset: function () {
    return topHeader.getBoundingClientRect().height + mainContentPaddingTop;
  },
});
