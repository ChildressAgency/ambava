/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  //$('#main').waypoint(function(){
  //  $('#main').addClass('animated fadeInUp');
  //}, {offset: '90%'});

  $('#find-bank').waypoint(function(){
    $('#find-bank').find('.animated').addClass('fadeInUp');
  }, {offset: '90%'});
});