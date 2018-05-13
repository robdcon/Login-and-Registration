$().ready(function()
{
	$('#register-form').validate(
	{
		rules:
		{
			first:
			{
				required: true,
				minlength: 2
			},
			last:
			{
				required: true,
				minlength: 2
			},
			email:
			{
				required: true,
				email: true
			},
			usr:
			{
				required: true,
				minlength: 2
			},
			psw:
			{
				required: true,
				minlength: 8
			}
		},
	
		messages:
		{
			first:
			{
				required: "Required",
				minlength: "Must be at least 2 characters"
			},
			last:
			{
				required: "Required",
				minlength: "Must be a valid name"
			},
			email:
			{
				required: "Required",
				email: "Must be a valid email"
			},
			usr:
			{
				required: "Required",
				minlength: "Must be at least 2 characters"
			},
			psw:
			{
				required: "Required",
				minlength: "Must be at least 8 characters"
			}
		}
	})

}) 

//

// function checkValidInput()
// {

// 	var first=document.getElementById('first');
// 	var firstalert=document.getElementById('firstalert');

// 	var last=document.getElementById('last');
// 	var lastalert=document.getElementById('lastalert');

// 	var email=document.getElementById('email');
// 	var emailalert=document.getElementById('emailalert');

// 	var nameRegExp = /^[a-zA-Z-]{2}/;
// 	var emailRegExp = /^([a-zA-Z0-9-%_.}{+-£!*)(])+@([a-zA-Z0-9-%_])+[.a-zA-Z]*/;

// 	var allowSubmit=true;

// 	var msgRequired = 'This is a required field';
// 	var msgInvalid = 'This must be a valid input';
// 	var msgInvalidEmail = 'This must be a valid email address';

// 	// Reset alert messages to blank 

// 	// for (var i = 0; i < id.length; i++) {
// 	// 	document.getElementById(id[i]+'alert').innerHTML="";
// 	// };

// 	//Test first name

// 	if(first.value=="") 
// 	{
// 		firstalert.innerHTML=msgRequired;
// 		allowSubmit=false;
// 	}
// 	else if(!nameRegExp.test(first.value)) 
// 	{
// 		firstalert.innerHTML=msgInvalid;
// 		allowSubmit=false;
// 	};

// 	// Test last Name

// 	if((last.value=="") || (last.value===defaultLast))
// 	{
// 		lastalert.innerHTML=msgRequired;
// 		allowSubmit=false;
// 	}
// 	else if(!nameRegExp.test(last.value)) 
// 	{
// 		lastalert.innerHTML=msgInvalid;
// 		allowSubmit=false;
// 	};

// 	// Test Email

// 	if (email.value==="")

// 	{
// 		emailalert.innerHTML= msgRequired;
// 		allowSubmit=false;
// 	}
// 	else if (!emailRegExp.test(email.value)) 
// 	{
// 		emailalert.innerHTML= msgInvalidEmail;
// 		allowSubmit=false;
// 	};

// 	/*if ((fname.value!="") && (!nameRegExp.test(fname.value)))

// 	{
// 		fnamealert.innerHTML='Invalid input';
// 		allowSubmit=false;
// 	};
// 	if ((!nameRegExp.test(lname.value)) && (lname.value!==defaultLast))

// 	{
// 		lnamealert.innerHTML='Invalid input';
// 		allowSubmit=false;
// 	};
// 	if ((!numbRegExp.test(zhaNumb.value)) && (zhaNumb.value!==defaultNumb))

// 	{
// 		numberalert.innerHTML='Invalid input';
// 		allowSubmit=false;
// 	};*/
// 	alert('failed attampt')
// 	return allowSubmit;

// };

// function checkForm() 

// {
// 	var submitBtn = document.getElementById('reg-submit');
// 	submitBtn.onclick=function(e)
// 	{
// 		//checkInput();
// 		if(!checkValidInput())
// 		{
// 			e.preventdefault()
// 		};
// 	}
	
// }

// window.onload = checkForm;