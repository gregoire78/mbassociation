/************************************************
script pour les infos bulles dans les formulaires
*************************************************/
$(document).ready(function(){
	
	$(window).resize(function(){
		$('#pseudo_user').popover('hide');
	});
	$(window).resize(function(){
		$('#firstname_user').popover('hide');
	});
	$(window).resize(function(){
		$('#lastname_user').popover('hide');
	});
	$(window).resize(function(){
		$('#pw_user').popover('hide');
	});
	$(window).resize(function(){
		$('#conf_pw_user').popover('hide');
	});
	$(window).resize(function(){
		$('#email_user').popover('hide');
	});
	//profile
	$(window).resize(function(){
		$('#input_lastname_user').popover('hide');
	});
	$(window).resize(function(){
		$('#input_firstname_user').popover('hide');
	});
	
	$('#pseudo_user').keyup(function(){
		$(this).popover('hide');
	});
	$('#firstname_user').keyup(function(){
		$(this).popover('hide');
	});
	$('#lastname_user').keyup(function(){
		$(this).popover('hide');
	});
	$('#pw_user').keyup(function(){
		$(this).popover('hide');
	});
	$('#conf_pw_user').keyup(function(){
		$(this).popover('hide');
	});
	$('#email_user').keyup(function(){
		$(this).popover('hide');
	});
	//profile
	$('#input_lastname_user').keyup(function(){
		$(this).popover('hide');
	});
	$('#input_firstname_user').keyup(function(){
		$(this).popover('hide');
	});
	
	$('html').click(function(event){
		$('.popover').css('pointer-events','none');//transparent a l'evenement clique
		if(event.target.id != 'pseudo_user') {
		   $('#pseudo_user').popover('hide');
		}
		if(event.target.id != 'firstname_user') {
		   $('#firstname_user').popover('hide');
		}
		if(event.target.id != 'lastname_user') {
		   $('#lastname_user').popover('hide');
		}
		if(event.target.id != 'pw_user') {
		   $('#pw_user').popover('hide');
		}
		if(event.target.id != 'conf_pw_user') {
		   $('#conf_pw_user').popover('hide');
		}
		if(event.target.id != 'email_user') {
		   $('#email_user').popover('hide');
		}
		//profile
		if(event.target.id != 'input_lastname_user') {
		   $('#input_lastname_user').popover('hide');
		}
		if(event.target.id != 'input_firstname_user') {
			$('#input_firstname_user').popover('hide');
		}
	 });
});