<div class="card">
    <div class="card-body">
        <h1>Improper Asset Management</h1>
        <p>Improper asset management in the context of web applications refers to the inadequate tracking, control, or
            protection of digital assets such as files, databases, credentials, or sensitive information. This can lead
            to security vulnerabilities and potential breaches. Here are some common issues related to improper asset
            management.


            <br>
            Hint: <span style="display: inline-block; color: red; animation: shake 0.5s infinite;">
                Older versions should be decomisioned !!
            </span>

        </p>
    </div>
</div>
<form id="flagForm" method="POST">
    <label for="flag">Enter Flag:</label>
    <input type="text" id="flag" name="flag" required>
    <button type="submit">Check Flag</button>
    <!-- http://vuln-web.localhost/fetch_user.php/?user_id=6 -->
    <!-- http://vuln-web.localhost/pages/improperAssetManagement.php -->
    <!-- http://vuln-web.localhost/improperAssetsMngmt.php -->
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
        xhr.open('POST', 'check_flags/check_Improper_assesmngnt_flag.php');
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