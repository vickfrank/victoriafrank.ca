jQuery( function($)
{
	// WP FIX NAV MENU
	//**********************************
	
	$('#header nav ul li').each( function()
	{
		$(this).find('a').html('<span>'+ $(this).find('a').html() + '</span>');
	});
	
	//**********************************
	
	
	// WP FIX : RESUME PAGE
	//**********************************
	
	$('.page').each( function()
	{
		if($(this).find('.bar').length)
		{
			$(this).addClass('resume');
		}
	});
	
	//**********************************
	
	
	// WP FIX : PROFILE IMAGE COVER
	//**********************************
	
	$('.te-cover').html($('.te-images img:first-child').clone());
	
	//**********************************
	
	
	// WP FIX : LIGHTBOX
	//**********************************
	
	$('#portfolio-items .item').each( function()
	{
		$(this).find('.mask a').first().removeClass('hidden').addClass('ico');
	});
	
	//**********************************
	
	
	// WP FIX: PORTFOLIO SINGLE NAV
	//**********************************
	fixPortfolioNav();
	//**********************************


});
// end DOCUMENT READY

function fixPortfolioNav()
{
	$('.portfolio-single .portfolio-nav .left-arrow a').addClass('icon button prev ajax');
	$('.portfolio-single .portfolio-nav .right-arrow a').addClass('icon button next ajax');
}