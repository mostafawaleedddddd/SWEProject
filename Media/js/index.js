fetch('NavBar.html')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.text();
      })
      .then(data => {
        document.getElementById('navbar').innerHTML = data;
      })
      .catch(error => console.error('Error loading the navbar:', error));

      function change(){
      let path = window.location.pathname;
      if (path.startsWith('/user')) {
          document.getElementById('navbar').innerHTML = `<nav class="navbar">
			<div class="logo"><a href="/"><img src="/images/LOGO.png" ></a> </div>
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/">About</a></li>
				<li><a href="/">Discussion Forum</a></li>
        <li><a href="/ContactUs">Contact Us</a></li>
				<button class="Signup" onclick="location.href='/signup';">SignUp</button>
        <button class="SignIn" onclick="location.href='/login';">SignIn</button>
			</ul>
	</nav>`
      }
    }
    window.addEventListener('DOMContentLoaded', change);