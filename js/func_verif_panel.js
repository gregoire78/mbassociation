/************************************************
script de verification du formulaire du profile
*************************************************/
$(document).ready(function(){
	var nombre = /[0-9]/;
	var result = true;
	$('#input_lastname_user').bind("keyup focusout", function (){ //quand on écrit dans le champ input on exécute ceci :
		var input_lastname_user = $(this).val();//on enregistre la valeur du champ input dans pseudo_user
		input_lastname_user = $.trim(input_lastname_user);//on ne compte pas les espace avant et apres la chaine
		if(input_lastname_user=="")
		{
			$('#error_lastname_profile').hide();
			$('#form_lastname_user').addClass('has-error').removeClass('has-success');
			$('#input-error_lastname_profile').addClass('glyphicon-remove').removeClass('glyphicon-ok');
			result = false;
		}
		else if(input_lastname_user.match(nombre))
		{
			$('#error_lastname_profile').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times; </span><span class="sr-only">Close</span></button><strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> </strong> Votre nom ne doit pas contenir de chiffre(s) !</div>').show();
			$('#form_lastname_user').addClass('has-error').removeClass('has-success');
			$('#input-error_lastname_profile').addClass('glyphicon-remove').removeClass('glyphicon-ok');
			result = false;
		}
		else if(input_lastname_user.length>=30)
		{
			$('#error_lastname_profile').hide();
			$('#form_lastname_user').addClass('has-error').removeClass('has-success');
			$('#input-error_lastname_profile').addClass('glyphicon-remove').removeClass('glyphicon-ok');
			result = false;
		}
		else
		{
			$('#error_lastname_profile').hide();
			$('#form_lastname_user').addClass('has-success').removeClass('has-error');
			$('#input-error_lastname_profile').removeClass('glyphicon-remove').addClass('glyphicon-ok');
			result = true;
		}
	});

	var result1 = true;
	$('#input_firstname_user').bind("keyup focusout", function (){ //quand on écrit dans le champ input on exécute ceci :
		var input_firstname_user = $(this).val();//on enregistre la valeur du champ input dans pseudo_user
		input_firstname_user = $.trim(input_firstname_user);//on ne compte pas les espace avant et apres la chaine
		if(input_firstname_user=="")
		{
			$('#error_firstname_profile').hide();
			$('#form_firstname_user').addClass('has-error').removeClass('has-success');
			$('#input-error_firstname_profile').addClass('glyphicon-remove').removeClass('glyphicon-ok');
			result1 = false;
		}
		else if(input_firstname_user.match(nombre))
		{
			$('#error_firstname_profile').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times; </span><span class="sr-only">Close</span></button><strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> </strong> Votre prénom ne doit pas contenir de chiffre(s) !</div>').show();
			$('#form_firstname_user').addClass('has-error').removeClass('has-success');
			$('#input-error_firstname_profile').addClass('glyphicon-remove').removeClass('glyphicon-ok');
			result1 = false;
		}
		else if(input_firstname_user.length>=30)
		{
			$('#error_firstname_profile').hide();
			$('#form_firstname_user').addClass('has-error').removeClass('has-success');
			$('#input-error_firstname_profile').addClass('glyphicon-remove').removeClass('glyphicon-ok');
			result1 = false;
		}
		else
		{
			$('#error_firstname_profile').hide();
			$('#form_firstname_user').addClass('has-success').removeClass('has-error');
			$('#input-error_firstname_profile').removeClass('glyphicon-remove').addClass('glyphicon-ok');
			result1 = true;
		}
	});

	$('form').submit(function(){
		
		/*var input_lastname_user1 = $('#input_lastname_user').val();
		input_lastname_user1 = $.trim(input_lastname_user1);
		$('#form_lastname_user').addClass('has-feedback');
		if(input_lastname_user1=="")
		{
			$('#error_lastname_profile').hide();
			$('#form_lastname_user').addClass('has-error');
			$('#form_lastname_user').removeClass('has-success');
			$('#input-error_lastname_profile').addClass('glyphicon-remove');
			$('#input-error_lastname_profile').removeClass('glyphicon-ok');
			var result_2 = false;
		}*/
		
		if(result==false)
		{
			return result;
		}
		if(result1==false)
		{
			return result1;
		}
		else return true;
	});
});