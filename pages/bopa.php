<!DOCTYPE html>
<html>

<head>
    <title>Hacking is an Art</title>
    <style>
    .terminal {
        border: 2px solid #0f0;
        padding: 10px;
        width: 800px;
        margin: 0 auto;
    }

    .terminal .output {
        height: 200px;
        overflow-y: scroll;
        border-bottom: 1px solid #0f0;
        padding-bottom: 10px;
    }

    .terminal .input {
        margin-top: 10px;
    }

    .terminal .cursor {
        display: inline-block;
        width: 10px;
        height: 20px;
        background-color: #0f0;
        animation: blink 0.7s infinite;
    }

    @keyframes blink {
        50% {
            opacity: 0;
        }
    }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-body">
            <h1>BOPA</h1>
            <p>Web applications have several users, and users have different profiles either in an endpoint or as an
                API. Users also have lots of privileges within a web application.
                Check USER Create profile process and Find End Point.

                <br>
                Hint: <span style="display: inline-block; color: red; animation: shake 0.5s infinite;">
                    Check out for loose user endpoints
                </span>
            </p>
        </div>
    </div>

    <div class="terminal">
        <div class="output">
            <p>Welcome to the Hacker's Terminal</p>
        </div>
        <div class="input">
            <span class="cursor"></span>
        </div>
    </div>
    <form id="flagForm" method="POST">
        <label for="flag">Enter Flag:</label>
        <input type="text" id="flag" name="flag" required>
        <button type="submit">Check Flag</button>
    </form>
    <div id="message"></div>
    <script>
    // Text to display in the terminal
    var text = "Hacking is an Art";

    // Delay between each character
    var delay = 100;

    // Function to simulate typing effect
    function typeText(index) {
        if (index < text.length) {
            var char = text.charAt(index);
            var outputElement = document.querySelector('.terminal .output');
            outputElement.innerHTML += char;
            index++;
            setTimeout(function() {
                typeText(index);
            }, delay);
        }
    }

    // Start typing the text
    typeText(0);
    </script>











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
        xhr.open('POST', 'check_flags/check_bopa_flag.php');
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
        console.log("fetching user profiles  => http://vuln-web.localhost/profiles.php");
    });
    </script>



</body>

</html>