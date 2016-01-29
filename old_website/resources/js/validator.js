// constructor
function Validator() {
	//if (!hasSupport()) return;
}

Validator.prototype.notEmpty = function(str) {
	return ('' != str && !this.isWhiteSpace(str));
}

Validator.prototype.isEmpty = function(str) {
	return ('' == str || this.isWhiteSpace(str));
}

Validator.prototype.isDigits = function(str) {
	return this.isRegex(str, /^\d+$/);
}

Validator.prototype.isInt = function(str) {
	return this.isRegex(str, /^[-+]?\d+$/);
}

Validator.prototype.isAlpha = function(str) {
	return this.isRegex(str, /^[A-Za-z]+$/);
}

Validator.prototype.isDate = function(str) {
	return this.isRegex(str, /^\d{2}[\/,\-.]?\d{2}[\/,\-.]?\d{4}$/);
}

Validator.prototype.isCurrency = function(str) {
	return this.isRegex(str, /^\d+[.,]?\d*$/);
}

Validator.prototype.isAlnum = function(str) {
	return this.isRegex(str, /^[A-Za-z\d]+$/);
}

Validator.prototype.isBetween = function(str, min, max) {
	if (!this.isInt(str)) {
		return false;
	}

	if (!this.isGreaterThan(str, max)
		&& !this.isLessThan(str, min)
	) {
		return true;	
	} else {
		return false;
	}
}

Validator.prototype.isGreaterThan = function(str, min) {
	if (!this.isInt(str)) {
		return false;
	}
	
	integer = parseInt(str);
	
	return (integer > min);
}

Validator.prototype.isLessThan = function(str, max) {
	if (!this.isInt(str)) {
		return false;
	}
	
	integer = parseInt(str);
	
	return (integer < max);
}

Validator.prototype.isLength = function(str, min, max) {
	return (this.isMinLength(str, min) && this.isMaxLength(str, max));
}

Validator.prototype.isMinLength = function(str, min) {
	return (str.length >= min);
}

Validator.prototype.isMaxLength = function(str, max) {
	return (str.length <= max);
}

Validator.prototype.isRegex = function(str, pattern) {
	str += '';
	var found = str.match(pattern);

	if (!found) {
		return false;
	}
	
	return true;
}

Validator.prototype.isIp = function(ipAddress) {
	return this.isRegex(ipAddress, /^(25[0-5]|2[0-4]\d|1\d\d|\d{1,2})(\.(25[0-5]|2[0-4]\d|1\d\d|\d{1,2})){3}$/);
}

Validator.prototype.isDomain = function(domainName) {
	if (this.isEmpty(domainName)
		|| this.isEqual(domainName, 'localhost.rev')
		|| this.isRegex(domainName, /\.in-addr.arpa$/)
		|| this.isRegex(domainName, / /)
		|| this.isIp(domainName)
	) {
		return false;
	} else {
		return true;
	}
}

Validator.prototype.isHostname = function(host) {
	if (this.isIp(host)
		|| this.isDomain(host)
	) {
		return true;
	} else {
		return false;
	}
}

Validator.prototype.isMailName = function(mailName) {	
	return this.isRegex(mailName, /^[\w-\+]+((\.)[\w-\+]+)*$/);
}

Validator.prototype.isEmail = function(email) {
	re = /^([^\@]+){1}\@([^\@]+){1}$/;
	found = email.match(re);

	if (!found) {
		return false;
	}
	
	return (this.isMailName(found[1]) && this.isDomain(found[2]));
}

Validator.prototype.isUrl = function(url) {
	re = /^(.+){1}:\/\/(.+){1}$/
	found = url.match(re);

	if (!found) {
		return false;
	}
	
	return (this.isAlnum(found[1]) && this.isHostname(found[2]));
	
}

Validator.prototype.isHttpUrl = function(url) {	
	return (this.isUrl(url) && this.isRegex(url, /^https?:(.+)$/));
}

Validator.prototype.isPath = function(path) {
	return this.isRegex(path, /^[A-Za-z\d\\\\\/\%^&*()+=\-_\[\]{}\'?\.,<>:;|!\@#]+$/);
}

Validator.prototype.isPhone = function(path) {
	return this.isRegex(path, /^[ \d\-+()]+$/);
}

Validator.prototype.isEqual = function(str1, str2) {
	return (str1 == str2);
}

Validator.prototype.isWhiteSpace = function(str) {
	return this.isRegex(str, /^[\s]+$/);
}

Validator.prototype.isFloat = function(str, decimalPoint) {
	decimalPoint += '';
	decimalPoint = decimalPoint.replace(/\./ig, '\\.');
	re = '/^[-+]?\\d*(' + decimalPoint+'\\d+)?$/';
	eval('var result = this.isRegex(str, ' + re + ');');
	return result;
}

Validator.prototype.isLogin = function(str) {
	return this.isRegex(str, /^[-a-zA-Z0-9@#+&._]+$/);
}

SB_Validator = new Validator();
