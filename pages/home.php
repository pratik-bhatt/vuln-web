<div class="card">
    <div class="card-body d-flex align-items-center">
        <img src="https://img.freepik.com/free-photo/html-css-collage-concept-with-hacker_23-2150061984.jpg?w=996&t=st=1686415646~exp=1686416246~hmac=ecd58bf73f2285769e9747f923fa91732a7d7331683111a3268de2f36c859da9" alt="" style="max-width: 200px; flex-shrink: 0; border-radius: 10px; margin-right: 20px;">
        <div>
            <h1>Welcome to vuln-web</h1>
            <p>This is a vulnurable site for you to practice hacking web apps.</p>
        </div>
  <div id="terminal"></div>
    </div>
</div>
<style>
        #terminal {
            background-color: black;
            color: white;
            font-family: monospace;
            width: 600px;
            height: 200px;
            overflow-y: scroll;
            padding: 10px;
        }
        .log-info {
            color: cyan;
        }
        .log-warning {
            color: yellow;
        }
        .log-error {
            color: red;
        }
        body {
            background-color: #f2f2f2;
        }
        .card {
            margin: 50px auto;
            width: 1000px;
            padding: 20px;
            background-color: #ccc;
        }
        .scroll-animation {
            overflow: hidden;
            height: 200px;
        }
        .scroll-animation ol {
            margin: 0;
            padding: 0;
            list-style-type: none;
            animation-name: scroll;
            animation-duration: 30s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }
        .scroll-animation ol li {
            height: 40px;
            line-height: 40px;
            font-size: 20px;
        }
        @keyframes scroll {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-500px);
            }
        }
    </style>
    <div class="card">
        <div class="card-body">
            <h1>OWASP TOP 10 2023</h1>
            <div class="scroll-animation">
                <ol>
                    <li><h4>API1 Broken Object Level Authorization (BOLA)</h4></li>
                    <li><h4>Broken Authentication</h4></li>
                    <li><h4>Broken Object Property Level Authorization (BOPA)</h4></li>
                    <li><h4>Unrestricted Resource Consumption</h4></li>
                    <li><h4>Broken Function Level Authorization (BFLA)</h4></li>
                    <li><h4>API6 Server-Side Request Forgery (SSRF)</h4></li>
                    <li><h4>Security Misconfiguration</h4></li>
                    <li><h4>Automated Threats to Web Applications</h4></li>
                    <li><h4>Improper Asset Management</h4></li>
                    <li><h4>Unsafe Consumption of APIs</h4></li>
                </ol>
            </div>
        </div>
    </div>
    <script>
        function getRandomLog() {
            var logs = [
                { type: 'info', message: 'Info log: Some information here.' },
                { type: 'warning', message: 'Warning log: This is a warning.' },
                { type: 'error', message: 'Error log: An error occurred.' }
            ];
            var randomIndex = Math.floor(Math.random() * logs.length);
            return logs[randomIndex];
        }

        function appendLog(log) {
            var terminal = document.getElementById('terminal');
            var logElement = document.createElement('p');
            
            switch (log.type) {
                case 'info':
                    logElement.className = 'log-info';
                    break;
                case 'warning':
                    logElement.className = 'log-warning';
                    break;
                case 'error':
                    logElement.className = 'log-error';
                    break;
                default:
                    break;
            }

            logElement.textContent = log.message;
            terminal.appendChild(logElement);

            // Scroll to the bottom of the terminal
            terminal.scrollTop = terminal.scrollHeight;
        }

        function startLogAnimation() {
            setInterval(function() {
                var log = getRandomLog();
                appendLog(log);
            }, 500); // Adjust the interval (in milliseconds) between each log entry
        }

        // Start the log animation when the page loads
        window.addEventListener('load', startLogAnimation);
    </script>

<script>
        window.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var scrollAnimation = document.querySelector('.scroll-animation');
                scrollAnimation.classList.add('animated');
            }, 30000); // Delay in milliseconds (1 minute = 60000 milliseconds)
        });
    </script>
</body>
</html>
