$(document).ready(function () {
	
	function hide_allact()
	{
		$('.addright').children().each(function () 
		{   
					$(this).hide();
	    }); 
	}
	
	function show_act(actid)
	{ 
		var disid = 'm' + actid; 
		hide_allact(); 
		$('#' + disid).show();
	}
	
	$('.lm-item').click(function () {
		
		$(this).parent().children().each(function () {
			$(this).attr('class','lm-item');
		});
		 
		$(this).attr('class','lm-item-select');  
		
		$.cookie('mine',$(this).attr('id'));
		show_act($('.lm-item-select').attr('id') ); 
	});
	 
	if ($.cookie('mine') == null) $.cookie('mine','0');
	var sid = $.cookie('mine');  
	$('.lm-item').eq(sid).attr('class','lm-item-select'); 
	show_act($('.lm-item-select').attr('id') ); 
});