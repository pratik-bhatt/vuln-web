<!DOCTYPE html>
<html>

<head>
    <title>Hacking is an Art</title>
    <style>
        body {
            background-color: #000;
            color: #0f0;
            font-family: monospace;
        }

        #terminal {
            margin: 20px;
            width: 1200px;
            height: 100px;
            background-color: #000;
            border: 2px solid #0f0;
            overflow: auto;
            padding: 10px;
        }

        .green {
            color: #0f0;
        }

        .white {
            color: #fff;
        }

        .blink {
            animation: blink-animation 1s steps(5, start) infinite;
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
        <h1>Broken Function Level Authorization</h1>
            <p>Broken Function Level Authorization (BFLA) is a security vulnerability that occurs when an application
                fails to properly enforce authorization checks at the function or API level. It allows an attacker to
                access or execute specific functions or actions that they shouldn't have permission to perform.This
                vulnerability typically arises when an application assumes that if a user is authorized to access a
                particular page or resource, they are also authorized to perform all functions associated with that page
                or resource. However, this assumption can be incorrect, as different functions or actions may have
                different authorization requirements

                <br>
                Hint: <span style="display: inline-block; color: red; animation: shake 0.5s infinite;">
                    Try and manipulate admin resources!!!
                </span>
            </p>
        </div>
    </div>
    <div id="terminal"></div>
    <form id="flagForm" method="POST">
        <label for="flag">Enter Flag:</label>
        <input type="text" id="flag" name="flag" required>
        <button type="submit">Check Flag</button>
        <!-- http://vuln-web.localhost/fetch_user.php/?user_id=6 -->
    </form>

    <div id="message"></div>



    <script>
        const terminal = document.getElementById('terminal');
        const messages = [
            'Hacking in progress...',
            'Target locked',
            'Cracking security...',
            'Access granted',
            'Hacking complete'
        ];

        function printMessage(message, color) {
            const span = document.createElement('span');
            span.style.color = color;
            span.textContent = message;
            terminal.appendChild(span);
        }

        function typeMessage(message, color) {
            for (let i = 0; i < message.length; i++) {
                setTimeout(() => {
                    printMessage(message[i], color);
                    terminal.scrollTop = terminal.scrollHeight;
                }, i * 50);
            }
        }

        function animate() {
            terminal.innerHTML = '';

            messages.forEach((message, index) => {
                setTimeout(() => {
                    if (index % 2 === 0) {
                        typeMessage(message, 'green');
                    } else {
                        typeMessage(message, 'white');
                    }

                    if (index === messages.length - 1) {
                        setTimeout(animate, 2000);
                    }
                }, index * 3000);
            });
        }

        animate();
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
            xhr.open('POST', 'check_flags/check_bfla_flag.php');
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
</body>

</html>