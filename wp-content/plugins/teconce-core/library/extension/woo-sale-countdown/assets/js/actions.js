(function($) {
    $(document).on('ready', function(){

        if ( XPSC_ajax_data.stillValid && null !== XPSC_ajax_data.endDate ) {


            $('#teconcetimer').countDown({
                label_dd: 'days',
                label_hh: 'hours',
                label_mm: 'mins',
                label_ss: 'secs',
                separator: ':',

            });


               
        } else {
            
            $( ".xpsc-product-coutdown-wrapper" ).hide();
            
        }
        
        
       
         
      $('.xpsc-product-coutdown-wrapper-alt #teconcetimer').countDown({
                label_dd: 'days',
                label_hh: 'hours',
                label_mm: 'mins',
                label_ss: 'secs',
                separator: ':',
                
            });
         
    })

})(jQuery);
