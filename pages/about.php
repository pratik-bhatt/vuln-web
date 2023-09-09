<div class="terminal">
  <div class="terminal-header">
    <span class="terminal-button red"></span>
    <span class="terminal-button yellow"></span>
    <span class="terminal-button green"></span>
  </div>
  <div class="terminal-body">
    <pre id="terminal-output"></pre>
    <div class="terminal-input">
      <span class="prompt">user@cybersec-site:</span>
      <input type="text" id="terminal-input-field" autofocus>
    </div>
  </div>
</div>


<style>
  .terminal {
    width: 1000px;
    height: 500px;
    background-color: black;
    color: white;
    border-radius: 5px;
    overflow: hidden;
    margin-left: 50px;
    margin-top: 20px;
  }

  .terminal-header {
    background-color: #2d2d2d;
    padding: 5px;
  }

  .terminal-button {
    display: inline-block;
    width: 15px;
    height: 15px;
    margin-right: 5px;
    border-radius: 50%;
  }

  .red {
    background-color: #ff605c;
  }

  .yellow {
    background-color: #ffc545;
  }

  .green {
    background-color: #2bc24a;
  }

  .terminal-body {
    padding: 10px;
    height: calc(100% - 30px);
    overflow-y: scroll;
    font-family: monospace;
  }

  .terminal-input {
    display: flex;
  }

  .prompt {
    color: #00ff00;
    margin-right: 5px;
  }

  #terminal-input-field {
    flex-grow: 1;
    background-color: transparent;
    border: none;
    color: white;
    outline: none;
  }

  #terminal-output {
    white-space: pre-wrap;
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const terminalOutput = document.getElementById("terminal-output");
    const terminalInputField = document.getElementById("terminal-input-field");

    terminalInputField.addEventListener("keydown", function (event) {
      if (event.key === "Enter") {
        event.preventDefault();
        handleCommand();
      }
    });

    function handleCommand() {
      const command = terminalInputField.value;
      const output = executeCommand(command);
      terminalOutput.innerHTML += "<span>> " + command + "</span>\n";
      terminalOutput.innerHTML += "<span>" + output + "</span>\n";
      terminalInputField.value = "";
      terminalOutput.scrollTop = terminalOutput.scrollHeight;
    }

    function executeCommand(command) {
      // Implement your command execution logic here
      // You can handle different commands and return the corresponding output
      // For example:
      switch (command) {
        case "help":
          return "Available commands: help, about, contact";
        case "about":
          return "This is a cyber security site providing information and resources.Vuln-web (Vulnerable Web Application) is a purposely vulnerable web application that can be used for security testing and educational purposes. It contains various vulnerabilities that developers and security professionals can explore to understand common web application security issues.Here are the general steps to set up vul-web on your local machine: Web Server Setup: Install a web server stack such as XAMPP (Apache, MySQL, PHP) or WAMP (Windows, Apache, MySQL, PHP) on your local machine. Ensure that the web server, PHP, and MySQL are properly configured and running. vuln-web Installation:Download the vul-web source code from the official GitHub repository: https://github.com/digininja/VUL-WEB.Extract the downloaded files and move them to the web server's document root (e.g., htdocs in XAMPP).Rename the config/config.inc.php.dist file to config/config.inc.php.Open the config/config.inc.php file and update the database configuration parameters (e.g., database name, username, password) to match your local setup.Database Setup:Create a new empty MySQL database for VUL-WEB.Import the initial database structure by running the VUL-WEB.sql file included with the VUL-WEB source code. You can import it using the MySQL command-line client or a database management tool like phpMyAdmin.vuln-web Configuration:Open a web browser and access the vuln-web application (e.g., http://vuln-web.localhost). You can explore the different vulnerabilities and security challenges provided by VUL-WEB, such as SQL injection, cross-site scripting (XSS), command injection, etc. However, please note that vuln-web should only be used in controlled environments for educational or authorized testing purposes.Remember to always exercise caution and follow ethical guidelines when using vulnerable applications like VUL-WEB.";
        case "contact":
          return "You can reach us at contact@cybersec-site.com";
        default:
          return "Command not found";
      }
    }
  });

</script>