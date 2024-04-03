document.addEventListener('DOMContentLoaded', function () {
	var loginForm = document.getElementById('loginForm')

	if (loginForm) {
		loginForm.addEventListener('submit', function (event) {
			event.preventDefault() 

			var emailField = document.getElementById('email')
			var passwordField = document.getElementById('password')

			var email = emailField.value.trim()
			var password = passwordField.value.trim()

			if (email === '' || password === '') {
				alert('Please fill in all the fields!')
				return
			}
	})
}
})


