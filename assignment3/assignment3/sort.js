window.onload = function() {
	prepareListener();
}
function prepareListener() {
	var droppy;
	droppy = document.getElementById("sortMethod");
	droppy.addEventListener("change",sort);
}
function sort() {
	this.form.submit();
}
