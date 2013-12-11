var action_delete_account = document.getElementById('action_delete_account');

if (action_delete_account) {
action_delete_account.addEventListener('click', function(e) {
	var confirm_delete_account = confirm('Vous êtes sur le point de supprimer votre compte. Confirmer?');
	 if (!confirm_delete_account) {
	 	 e.preventDefault();
	 };
}, false);
};