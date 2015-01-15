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
		
		$.cookie('set',$(this).attr('id'));
		show_act($('.lm-item-select').attr('id') ); 
	});
	 
	if ($.cookie('set') == null) $.cookie('set','0');
	var sid = $.cookie('set');  
    $('.lm-item').eq(sid).attr('class','lm-item-select'); 
	show_act($('.lm-item-select').attr('id') ); 
	
	
	
	$('#sync').mouseover(function() { 
		$('#sync_cancel').show();
	});

	$('#sync').mouseout(function() {
		$('#sync_cancel').hide();
	});
});