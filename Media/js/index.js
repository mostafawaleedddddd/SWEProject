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