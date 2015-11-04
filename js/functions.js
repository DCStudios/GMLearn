/**
 * Capitalize the first character of a string
 * @param  {string} string The string to capitalize the first character
 * @return {string}        The modified string
 */
function ucfirst(string) {
	return string.charAt(0).toUpperCase() + string.slice(1);
}

/**
 * Parse the GET from the address and return an associative array
 * @return {array} An associative array [ "param"=>value ]
 */
function parseGET() {
	var get = {};
	document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
		get[decodeGET(arguments[1])] = decodeGET(arguments[2]);
	});
	return get;
}

/**
 * Used by parseGET
 * @param  {string} s The string to decode
 * @return {string}   The decoded string
 */
function decodeGET(s) {
	return decodeURIComponent(s.split("+").join(" "));
}
