
<div class="card">
  <div class="card-body">
    <h1>Broken Object Level Authorization (BOLA)</h1>
    <p>Broken Object Level Authorization (BOLA) is a vulnerability that can occur in web applications or APIs
      (Application Programming Interfaces). It refers to a situation where an attacker can manipulate the parameters or
      identifiers associated with an object, such as a file, a database record, or any other resource, to gain
      unauthorized access to it.
      BOLA typically arises when the application fails to enforce proper authorization checks at the object level.
      Instead, it relies on user-supplied parameters or identifiers to determine access rights. If the application
      doesn't validate and authorize these parameters correctly, an attacker can modify them to access objects they
      should not have permission to access.

      <br>
      Hint:  <span style="display: inline-block; color: red; animation: shake 0.5s infinite;">
        Try and log in as id 5
      </span>
    </p>
  </div>
</div>









<div class="container center-form">
  <form id="flagForm" method="POST">
    <div class="form-group d-flex align-items-center">
      <label for="flag" class="mr-2">Enter Flag:</label>
      <input type="text" class="form-control mr-3" id="flag" name="flag" required>
      <div class="mb-2"></div> <!-- Add margin bottom to create space -->
      <button type="submit" class="btn btn-success ml-3">Submit</button>
    </div>
    <!-- http://vuln-web.localhost/fetch_user.php/?user_id=5 -->
  </form>
  <div></div>
  <div id="message"></div>
</div>
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
    xhr.open('POST', 'check_flags/check_bola_flag.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
      if (xhr.status === 200) {
        // Get the response from the PHP script
        const response = xhr.responseText;
        messageContainer.textContent = response;
      } else {
        messageContainer.textContent = 'Error: ' + xhr.statusText;
      }
    };
    xhr.send('flag=' + encodeURIComponent(enteredFlag));
    console.log("fetching user profiles  => http://vuln-web.localhost/profiles.php");
  });
</script>