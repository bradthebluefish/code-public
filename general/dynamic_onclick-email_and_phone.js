// Dynamic OnClick - Email & Phone

jQuery(document).ready(function( $ ){
  
	$("a[href^='tel:']").click(function(event){
		ga('send', 'event', 'Dalton', 'Call', 'Phone');
	});
  
  	$("a[href^='mailto:']").click(function(event){
		ga('send', 'event', 'Dalton', 'Click', 'Email');
	});
  
});


// Alternative Options

/*
jQuery(document).ready(function( $ ){

  $("[href*='tel:'], [href*='mailto:']").click(function(e) {

    e.preventDefault();
    var href = $(this).attr('href');

    // tel:
    if (href.toLowerCase().indexOf("tel:") >= 0) {
      eventCategory = 'Call';
      eventLabel = href.replace('tel:', '');

    }

    // mailto:
    if (href.toLowerCase().indexOf("mailto:") >= 0) {
      eventCategory = 'Email';
      eventLabel = href.replace('mailto:', '');
    }

    ga('send', 'event', eventCategory, 'Click');

    setTimeout(function() {
      window.location = href;
    }, 500);

  });
  
});
*/