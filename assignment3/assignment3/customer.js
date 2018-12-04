window.onload = function() {
	prepareListener();
}
function prepareListener() {
	var droppy;
	droppy = document.getElementById("pickACustomer");
	droppy.addEventListener("change",getCustomer);
}
function getCustomer() {
	this.form.submit();
}
