const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}

function getUrlParameter(name) {
	name = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
	var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
	var results = regex.exec(location.search);
	return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

function showPopup(message) {
	var errorPopup = document.getElementById('errorPopup');
	var errorMessage = document.getElementById('errorMessage');

	errorMessage.innerHTML = message;
	errorPopup.style.display = 'block';
}

function closeErrorPopup() {
	var errorPopup = document.getElementById('errorPopup');
	errorPopup.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function () {
    // Call showPopup function if the error parameter is present in the URL
    const error = getUrlParameter('error');
    if (error !== '') {
        showPopup(decodeURIComponent(error));
    }
});

inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});
