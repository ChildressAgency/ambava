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

  $('.btn-main').on('click', function(){
    if($(this).attr('target') == '_blank'){
      console.log('true');
      $outboundLink = $(this).attr('href');
      getOutboundLink($outboundLink);
      return false;
    }
  });
});