<div class="card">
  <div class="card-body">
  <h1>Dive in</h1>
<p>You can proceed and interact with the website and hack it!!!.</p>  </div>
</div>

<style>
        body {
            background-color: #000;
            color: #0f0;
            font-family: monospace;
            font-size: 16px;
            overflow: hidden;
        }

        .terminal {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .text {
            animation: typing 3s steps(40) infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }

        .text::after {
            content: "|";
            animation: blink 1s infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        .command {
            color: #0f0;
        }

        .response {
            color: #00f;
        }

        .error {
            color: #f00;
        }
    </style>
</head>
<body>
    <div class="terminal">
        <div class="text">
            <p>Welcome to the hacking terminal...</p>
            <p class="command">Executing command: hack_website.sh</p>
        </div>
    </div>

    <script>
        const terminal = document.querySelector('.terminal');
        const text = document.querySelector('.text');

        setTimeout(() => {
            text.innerHTML += '<p class="response">Website hacked successfully!</p>';
            setTimeout(() => {
                text.innerHTML += '<p class="command">Searching for user data...</p>';
                setTimeout(() => {
                    text.innerHTML += '<p class="response">User data found: username: admin, password: *********</p>';
                    setTimeout(() => {
                        text.innerHTML += '<p class="command">Transferring funds to my account...</p>';
                        setTimeout(() => {
                            text.innerHTML += '<p class="response">Funds transferred successfully!</p>';
                            setTimeout(() => {
                                text.innerHTML += '<p class="command">Deleting logs...</p>';
                                setTimeout(() => {
                                    text.innerHTML += '<p class="response">Logs deleted!</p>';
                                    setTimeout(() => {
                                        text.innerHTML += '<p class="command">Mission accomplished!</p>';
                                    }, 2000);
                                }, 2000);
                            }, 2000);
                        }, 2000);
                    }, 2000);
                }, 2000);
            }, 2000);
        }, 2000);
    </script>

