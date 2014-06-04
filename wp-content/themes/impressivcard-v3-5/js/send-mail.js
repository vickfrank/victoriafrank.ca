(function ($) {

	$(function() {
		
		var contactForm = $( '#contact-form' );
		
		contactForm.submit(function()
		{
			if (contactForm.valid())
			{
				contactForm.find('.submit-area').addClass('loading');
				var formValues = $(this).serialize();
				
				$.post($(this).attr('action'), formValues, function(data)
				{
					if ( data == 'success' )
					{
						hideLoader();
						contactForm.find('.submit-area').removeClass('loading').addClass("success");
						contactForm.clearForm(); 
					}
					else
					{
						hideLoader();
						contactForm.clearForm();
						alert( 'The sum is incorrect.' );
					}
				});
			}
			
			return false
		});

	});


	$.fn.clearForm = function() {
	  return this.each(function() {
	    var type = this.type, tag = this.tagName.toLowerCase();
	    if (tag == 'form')
	      return $(':input',this).clearForm();
	    if (type == 'text' || type == 'password' || tag == 'textarea')
	      this.value = '';
	    else if (type == 'checkbox' || type == 'radio')
	      this.checked = false;
	    else if (tag == 'select')
	      this.selectedIndex = -1;
	  });
	};

})(jQuery);