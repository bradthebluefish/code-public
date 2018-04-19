// Google Analytics Event Tracking for Slider Revolution

jQuery('body').on('click', '.ga-button', function() {
 
    var $this = jQuery(this),
        data  = $this.attr('data-link') || $this.attr('href');
 
    if(!data) {
 
        data = $this.attr('data-actions');
        if(data) data = data[0].url;
        if(!data) data = $this.attr('id');
 
    }
 
    // __ga('send', 'event', 'outbound', 'click', data, {'transport': 'beacon'});
    __gaTracker('send', 'event', 'outbound', 'click', data, {'transport': 'beacon'});
 
});