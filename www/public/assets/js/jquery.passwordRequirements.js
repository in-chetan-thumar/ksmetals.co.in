/*
 * jQuery Minimun Password Requirements 1.1
 * http://elationbase.com
 * Copyright 2014, elationbase
 * Check Minimun Password Requirements
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
*/


(function($){
    $.fn.extend({
        passwordRequirements: function(options) {

            // options for the plugin
            var defaults = {
				numCharacters: 8,
				useLowercase: true,
				useUppercase: true,
				useNumbers: true,
				useSpecial: true,
				infoMessage: '',
				style: "light", // Style Options light or dark
				fadeTime:300 // FadeIn / FadeOut in milliseconds
            };

            options =  $.extend(defaults, options);

            return this.each(function() {

				var o = options;

                o.infoMessage = 'The minimum password length is ' + o.numCharacters + ' characters and must contain at least 1 lowercase letter, 1 capital letter, 1 number, and 1 special character.';
				// Add Variables for the li elements
				var numCharactersUI = '<li class="pr-numCharacters"><span></span>8 characters.</li>',
					useLowercaseUI = '',
					useUppercaseUI = '',
					useNumbersUI   = '',
					useSpecialUI   = '';
				// Check if the options are checked
				if (o.useLowercase === true) {
					useLowercaseUI = '<li class="pr-useLowercase"><span></span>Lowercase letter</li>';
				}
				if (o.useUppercase === true) {
					useUppercaseUI = '<li class="pr-useUppercase"><span></span>Capital letter</li>';
				}
				if (o.useNumbers === true) {
					useNumbersUI = '<li class="pr-useNumbers"><span></span>Number</li>';
				}
				if (o.useSpecial === true) {
					useSpecialUI = '<li class="pr-useSpecial"><span></span>Special character</li>';
				}

				// Append password hint div
				var messageDiv = '<div id="pr-box"><i id="icon" class=""></i><div id="pr-box-inner"><p id="message" class="">' + o.infoMessage + '</p><ul>' + numCharactersUI + useLowercaseUI + useUppercaseUI + useNumbersUI + useSpecialUI + '</ul></div></div>';

				// Set campletion vatiables
				var numCharactersDone = true,
					useLowercaseDone = true,
					useUppercaseDone = true,
					useNumbersDone   = true,
					useSpecialDone   = true;

                var totalCharCount = 0, lowerCaseCount = 0, upperCaseCount = 0, numberCount = 0, specialCharacterCount = 0;

                // Show Message reusable function
				var showMessage = function () {
					if (numCharactersDone === false || useLowercaseDone === false || useUppercaseDone === false || useNumbersDone === false || useSpecialDone === false) {
						$(".pr-password").each(function() {
							// Find the position of element
							var posH = parseInt($(this).offset().top) - parseInt(10) ,
								itemH = $(this).innerHeight(),
								totalH = posH+itemH,
								itemL = $(this).offset().left;
							// Append info box tho the body
							$("body")     .append(messageDiv);
							$("#pr-box")  .addClass(o.style)
										  .fadeIn(o.fadeTime)
										  .css({top:totalH, left:itemL});
						});
					}
                    passwordStrength = totalCharCount + lowerCaseCount + upperCaseCount + numberCount + specialCharacterCount;
                    console.log("strength-->",passwordStrength);
                    if(passwordStrength < 3){
                        $('#icon').removeClass().addClass('icon_bad');
                        $('#message').removeClass().addClass('strength_bad');
                    }else if(passwordStrength < 5){
                        $('#icon').removeClass().addClass('icon_medium');
                        $('#message').removeClass().addClass('strength_medium');
                    }else{
                        $('#icon').removeClass().addClass('icon_good');
                        $('#message').removeClass().addClass('strength_good');
                    }
				};

				// Show password hint
				$(this).on("focus",function (){
					showMessage();
				});

				// Delete Message reusable function
				var deleteMessage = function () {
					var targetMessage = $("#pr-box");
					targetMessage.fadeOut(o.fadeTime, function(){
						$(this).remove();
					});
				};

				// Show / Delete Message when completed requirements function
				var checkCompleted = function () {
					if (numCharactersDone === true && useLowercaseDone === true && useUppercaseDone === true && useNumbersDone === true && useSpecialDone === true) {
						deleteMessage();
					} else {
						showMessage();
					}
				};

				// Show password hint
				$(this).on("blur",function (){
					deleteMessage();
				});


				// Show or Hide password hint based on user's event
				// Set variables
				var lowerCase   		= new RegExp('[a-z]'),
					upperCase   		= new RegExp('[A-Z]'),
					numbers     		= new RegExp('[0-9]'),
					specialCharacter     = new RegExp('[!,%,&,@,#,$,^,*,?,_,~]');

				// Show or Hide password hint based on keyup
				$(this).on("keyup focus", function (){
					var thisVal = $(this).val();

					checkCompleted();

					// Check # of characters
					if ( thisVal.length >= o.numCharacters ) {
						// console.log("good numCharacters");
						$(".pr-numCharacters span").addClass("pr-ok");
						numCharactersDone = true;
                        totalCharCount = 1;

					} else {
						// console.log("bad numCharacters");
						$(".pr-numCharacters span").removeClass("pr-ok");
						numCharactersDone = false;
                        totalCharCount = 0;
					}
					// lowerCase meet requirements
					if (o.useLowercase === true) {
						if ( thisVal.match(lowerCase) ) {
							// console.log("good lowerCase");
							$(".pr-useLowercase span").addClass("pr-ok");
							useLowercaseDone = true;
                            lowerCaseCount = 1;
						} else {
							// console.log("bad lowerCase");
							$(".pr-useLowercase span").removeClass("pr-ok");
							useLowercaseDone = false;
                            lowerCaseCount = 0;
						}
					}
					// upperCase meet requirements
					if (o.useUppercase === true) {
						if ( thisVal.match(upperCase) ) {
							// console.log("good upperCase");
							$(".pr-useUppercase span").addClass("pr-ok");
							useUppercaseDone = true;
                            upperCaseCount = 1;
						} else {
							// console.log("bad upperCase");
							$(".pr-useUppercase span").removeClass("pr-ok");
							useUppercaseDone = false;
                            upperCaseCount = 0;
						}
					}
					// upperCase meet requirements
					if (o.useNumbers === true) {
						if ( thisVal.match(numbers) ) {
							// console.log("good numbers");
							$(".pr-useNumbers span").addClass("pr-ok");
							useNumbersDone = true;
                            numberCount = 1;
						} else {
							// console.log("bad numbers");
							$(".pr-useNumbers span").removeClass("pr-ok");
							useNumbersDone = false;
                            numberCount = 0;
						}
					}
					// upperCase meet requirements
					if (o.useSpecial === true) {
						if ( thisVal.match(specialCharacter) ) {
							// console.log("good specialCharacter");
							$(".pr-useSpecial span").addClass("pr-ok");
							useSpecialDone = true;
                            specialCharacterCount = 1;
						} else {
							// console.log("bad specialCharacter");
							$(".pr-useSpecial span").removeClass("pr-ok");
							useSpecialDone = false;
                            specialCharacterCount = 0;
						}
					}
				});
            });
        }
    });
})(jQuery);
