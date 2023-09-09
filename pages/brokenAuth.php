<div class="card">
  <div class="card-body">
    <h1>Broken Authentication</h1>
    <p>Broken authentication vulnerability refers to a security weakness that arises when an application's authentication and session management mechanisms are flawed or improperly implemented. It allows attackers to bypass authentication controls and gain unauthorized access to user accounts or sensitive information.

    <br>
      Hint:  <span style="display: inline-block; color: red; animation: shake 0.5s infinite;">
        Log in as Admin
      </span>
    </p>
  </div>
</div>

<form id="flagForm" method="POST">
  <label for="flag">Enter Flag:</label>
  <input type="text" id="flag" name="flag" required>
  <button type="submit">Check Flag</button>
</form>

<div id="message"></div>

<script>
  // Get the form element and message container
  const form = document.getElementById('flagForm');
  const messageContainer = document.getElementById('message');

  // Add event listener to form submission
  form.addEventListener('submit', (e) => {
    e.preventDefault(); // Prevent form submission

    // Retrieve the entered flag
    const enteredFlag = document.getElementById('flag').value;

    // Perform an AJAX request to the PHP script
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'check_flags/check_broken_auth_flag.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Get the response from the PHP script
        const response = xhr.responseText;
        messageContainer.textContent = response;
      } else {
        messageContainer.textContent = 'Error: ' + xhr.statusText;
      }
    };
    xhr.send('flag=' + encodeURIComponent(enteredFlag));
    console.log("fetching user profiles => http://vuln-web.localhost/profiles.php");
  });
</script>
