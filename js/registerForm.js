document.addEventListener('DOMContentLoaded', function () {
	var successIcon = document.querySelector('.signUpSuccess')
	var signUpForm = document.querySelector('.signUpPage form')

	if (signUpForm) {
		signUpForm.addEventListener('submit', function (event) {
			event.preventDefault()

			var formData = new FormData(signUpForm)

			fetch('signup.php', {
				method: 'POST',
				body: formData,
			})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok')
					}
					return response.text()
				})
				.then(data => {
					if (data.trim() === 'success') {
						successIcon.style.display = 'block'
						signUpForm.reset()
					} else {
						alert('Registration failed. Please try again later.')
					}
				})
				.catch(error => {
					console.error(
						'There has been a problem with your fetch operation:',
						error
					)
				})
		})
	}
})
