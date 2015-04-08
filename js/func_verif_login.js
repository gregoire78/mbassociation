/************************************************
script de verification du formulaire de connection
*************************************************/
$(document).ready(function(){
	var result = true;
	$('#pseudo_user').bind("keyup focusout", function (){ //quand on écrit dans le champ input avec id #pseudo_user on exécute ceci
		var pseudo_user = $(this).val();//on enregistre la valeur du champ input dans pseudo_user
		pseudo_user = $.trim(pseudo_user);//on ne compte pas les espace avant et apres la chaine
		if(pseudo_user=="")
		{
			$('#error_pseudo_user').hide();
			$('#form_pseudo_user').addClass('has-error').removeClass('has-success');
			$('#input1Status').addClass('glyphicon-remove').removeClass('glyphicon-ok');
			result = false;
		}
		else
		{
			$('#error_pseudo_user').hide();
			$('#form_pseudo_user').addClass('has-success').removeClass('has-error');
			$('#input1Status').removeClass('glyphicon-remove').addClass('glyphicon-ok');
			result = true;
		}
	});

	var result_1 = true;
	$('#pw_user').bind("keyup focusout", function (){
		var pw_user = $(this).val();
		pw_user = $.trim(pw_user);
		if(pw_user=="")
		{
			$('#error_pw_user').hide();
			$('#form_pw_user').addClass('has-error').removeClass('has-success');
			$('#input2Status').addClass('glyphicon-remove').removeClass('glyphicon-ok');
			result_1 = false;
		}
		else
		{
			$('#error_pw_user').hide();
			$('#form_pw_user').addClass('has-success').removeClass('has-error');
			$('#input2Status').addClass('glyphicon-ok').removeClass('glyphicon-remove');
			result_1 = true;
		}
	});

	$('form').submit(function(){
		
		var pseudo_user1 = $('#pseudo_user').val();
		pseudo_user1 = $.trim(pseudo_user1);
		if(pseudo_user1=="")
		{
			$('#error_pseudo_user').hide();
			$('#form_pseudo_user').addClass('has-error').removeClass('has-success');
			$('#input1Status').addClass('glyphicon-remove').removeClass('glyphicon-ok');
			var result_2 = false;
		}
		
		var pw_user1 = $('#pw_user').val();
		pw_user1 = $.trim(pw_user1);
		if(pw_user1=="")
		{
			$('#error_pw_user').hide();
			$('#form_pw_user').addClass('has-error').removeClass('has-success');
			$('#input2Status').addClass('glyphicon-remove').removeClass('glyphicon-ok');
			var result_3 = false;
		}
		
		if(result==false)
		{
			return result;
		}
		else if(result_1==false)
		{
			return result_1;
		}
		else if(result_2==false)
		{
			return result_2;
		}
		else if(result_3==false)
		{
			return result_3;
		}
		else return true;
	});
});