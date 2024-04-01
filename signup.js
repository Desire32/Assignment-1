document.addEventListener('DOMContentLoaded', function () {
	let successIcon = document.querySelector('.signUpSuccess')
	var passwordField = document.getElementById('password')
	var confirmPasswordField = document.getElementById('confirmPassword')
	var passwordCriteriaTable = document.querySelector('.passwordCriterias')
	var nameField = document.getElementById('name')
	var emailField = document.getElementById('email')
	var addressField = document.getElementById('address')

	passwordCriteriaTable.style.display = 'none'

	passwordField.addEventListener('focus', function () {
		passwordCriteriaTable.style.display = 'block'
	})

	passwordField.addEventListener('blur', function () {
		passwordCriteriaTable.style.display = 'none'
	})

	confirmPasswordField.addEventListener('focus', function () {
		passwordCriteriaTable.style.display = 'block'
	})

	confirmPasswordField.addEventListener('blur', function () {
		passwordCriteriaTable.style.display = 'none'
	})

	passwordField.addEventListener('input', function () {
		var password = this.value

		var lowercaseCriteria = document.getElementById('lowercase')
		var uppercaseCriteria = document.getElementById('uppercase')
		var numberCriteria = document.getElementById('number')
		var lengthCriteria = document.getElementById('length')

		var hasLowercase = /[a-z]/.test(password)
		var hasUppercase = /[A-Z]/.test(password)
		var hasNumber = /[0-9]/.test(password)
		var hasLength = password.length >= 8

		lowercaseCriteria.textContent = hasLowercase
			? '✓ A lowercase letter'
			: '✗ A lowercase letter'
		uppercaseCriteria.textContent = hasUppercase
			? '✓ A capital (uppercase) letter'
			: '✗ A capital (uppercase) letter'
		numberCriteria.textContent = hasNumber ? '✓ A number' : '✗ A number'
		lengthCriteria.textContent = hasLength
			? '✓ Minimum 8 characters'
			: '✗ Minimum 8 characters'
	})

	document.getElementById('button').addEventListener('click', function () {
		var name = nameField.value
		var email = emailField.value
		var password = passwordField.value
		var confirmPassword = confirmPasswordField.value
		var address = addressField.value

		if (
			name.trim() === '' ||
			email.trim() === '' ||
			password.trim() === '' ||
			confirmPassword.trim() === '' ||
			address.trim() === ''
		) {
			alert('Please fill in all the fields!')
			return
		}

		if (password !== confirmPassword) {
			alert('Passwords do not match!')
			return
		}

		var userData = {
			name: name,
			email: email,
			password: password,
			address: address,
		}

		var userDataJSON = JSON.stringify(userData)
		localStorage.setItem('userData', userDataJSON)

		alert('Your data has been successfully saved to local storage!')
		successIcon.style.display = 'block'

		window.scrollTo(0, 0)
		setTimeout(function () {
			location.reload()
		}, 1000)

    nameField.value = ''
		emailField.value = ''
		passwordField.value = ''
		confirmPasswordField.value = ''
		addressField.value = ''
	})
})
