'use strict';

require.config({
 paths: {
   jquery: [
     '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min',
     '../../vendor/jquery/dist/jquery.min'
   ],
   lodash: '../../vendor/lodash/lodash',
   is: '../../vendor/is_js/is',
   picturefill: '../../vendor/picturefill/dist/picturefill.min',
   vendor: '../../vendor',
   components: 'components',
   utils: 'utils',
   notie: '../../vendor/notie/src/notie'
 }
});

var components = document.querySelectorAll('[data-component]');

var requirements = Array.prototype.map.call(components, function(el)
{
  return el.dataset !== undefined ?
  'components/' + el.dataset.component :
  'components/' + el.getAttribute('data-component');
});
requirements.push('picturefill');
requirements.push('notie');

require(requirements);

