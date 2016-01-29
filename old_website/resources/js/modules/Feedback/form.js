/**
 * Feedback
 *
 * @author Evgueni Palchukovsky <epalchukovsky@swsoft.com>
 * @version $Id: form.js 29054 2008-06-11 11:03:51Z aiskrenkov $
 * @since 2005/06/28
 * @package SB
 * @subpackage Feedback
 * @copyright (c) 2004-2006, SWsoft
 */


///////////////////////////////////////
// FeedbackFormFieldValidator class

function FeedbackFormFieldValidator(method, descr) {
	this.method = method;
	this.descr = descr;
}

FeedbackFormFieldValidator.prototype.validate = function(val) {
	var result = val=='' && this.method!='notEmpty';
	if (!result) {
		if (this.method == 'isFloat') {
			eval("result = SB_Validator."+this.method+"('"+val+"', '.') || SB_Validator."+this.method+"('"+val+"', ',');");
		} else {
			eval("result = SB_Validator."+this.method+"('"+val+"');");
		}
	}
	return result;
}

FeedbackFormFieldValidator.prototype.getError = function() {
	return this.descr;
}

///////////////////////////////////////
// FeedbackFormField class

function FeedbackFormField(controlId, messageControlId, isRequired) {
	this.controlId = controlId;
	this.messageControlId = messageControlId;
	this.validators = new Array();
	this.isRequired = isRequired!='0';
}

FeedbackFormField.prototype.appendValidator = function(method, descr) {
	this.validators.push(new FeedbackFormFieldValidator(method, descr));
}

FeedbackFormField.prototype.validate = function(checkRequired, showError, alertError) {
	var result = true;
	var val = document.getElementById(this.controlId).value;
	if (val || checkRequired) {
		for (var i = 0; i<this.validators.length; ++i) {
			var validator = this.validators[i];
			result = validator.validate(val);
			if (!result) {
				this.showValidateError(validator.getError(), showError, alertError);
				break;
			} else {
				this.hideValidateError();
			}
		}
	}/* else if (!val && !checkRequired) {
		this.hideValidateError();
	}*/
	return result;
}

FeedbackFormField.prototype.showValidateError = function(errorText, showError, alertError) {
	if (showError) {
		var tr = document.getElementById(this.messageControlId);
		tds = tr.getElementsByTagName('TD');
		tds[1].innerHTML = errorText;
		tr.removeAttribute("style");
	}
	if (alertError) {
		alert(errorText);
	}
}

FeedbackFormField.prototype.hideValidateError = function() {
	var tr = document.getElementById(this.messageControlId);
	tr.style.display = 'none';
	tds = tr.getElementsByTagName('TD');
	tds[1].innerHTML = '';
}

FeedbackFormField.prototype.showValidationDescription = function() {
	alert(this.validationDescr);
}

///////////////////////////////////////
// FeedbackForm class
	
function FeedbackForm() {
	this.fields = new Array();
}

FeedbackForm.prototype.validate = function(checkRequired, showError, alertError) {
	var result = true;
	for (var i = 0; i<this.fields.length; ++i) {
		if (!this.fields[i].validate(checkRequired, showError, alertError)) {
			result = false;
		}
	}
	return result;
}

FeedbackForm.prototype.registerField = function(field) {
	this.fields.push(field);
}
