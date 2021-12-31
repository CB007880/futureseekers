const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	$(".form").addClass("d-none")
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	setTimeout(() => $(".form").removeClass("d-none"), 500)
	container.classList.remove("right-panel-active");
});


function login() {

		// EMPTY
		$("#errors").addClass("d-none")
		$("#errors-ul").empty()

		formData = new FormData();
		formData.append("username", document.getElementById("username").value)
		formData.append("password", document.getElementById("password").value)

		fetch("login.php", {
			method: "POST",
			body: formData
		})
		.then(Response => Response.json())
		.then(Response => {

			// SUCCESS
			if (Response.status == "success") {
				window.location.href = "index.php"
			}

			// ERRORS
			if (Response.status == "failed") {
				$("#errors").removeClass("d-none")
				$("#errors-ul").empty()
				Response.errors.forEach(element => {
					$("#errors-ul").append("<li>" + element + "</li>")
				})
			}
		})

	}