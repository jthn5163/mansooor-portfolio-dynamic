<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Back - Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
    :root {
      --gold: #D4AF37;
      --gold-light: #F4E5A3;
      --silver: #C0C0C0;
      --dark: #0a0a0f;
      --dark-card: #141419;
      --dark-hover: #1a1a1f;
      --text-light: rgba(255,255,255,0.95);
      --text-muted: rgba(255,255,255,0.65);
      --red-accent: #8B0000;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
      background-attachment: fixed;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .container {
      max-width: 450px;
      width: 100%;
      background: rgba(255, 255, 255, 0.98);
      border-radius: 16px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      border: 2px solid var(--gold);
      overflow: hidden;
    }

    .illustration-side {
      display: none;
    }

    .form-side {
      padding: 40px 35px;
    }

    .form-header {
      text-align: center;
      margin-bottom: 35px;
    }

    .form-header h1 {
      font-size: 1.875rem;
      color: var(--red-accent);
      margin-bottom: 8px;
      font-weight: 700;
    }

    .form-header p {
      color: #4a5568;
      font-size: 0.95rem;
    }

    .input-group {
      margin-bottom: 22px;
    }

    .input-group label {
      display: block;
      margin-bottom: 8px;
      color: #2d3748;
      font-weight: 500;
      font-size: 0.9rem;
    }

    .input-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }

    .input-icon {
      position: absolute;
      left: 14px;
      color: var(--gold);
      transition: color 0.3s;
      pointer-events: none;
      font-size: 0.95rem;
    }

    .form-input {
      width: 100%;
      padding: 13px 14px 13px 42px;
      border: 2px solid var(--silver);
      border-radius: 10px;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      background: #f9fafb;
      outline: none;
      color: #1a202c;
    }

    .form-input::placeholder {
      color: #a0aec0;
    }

    .form-input:focus {
      border-color: var(--gold);
      background: white;
      box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
    }

    .form-input:focus~.input-icon {
      color: var(--red-accent);
    }

    .form-input.error {
      border-color: var(--red-accent);
      animation: shake 0.4s;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-8px); }
      75% { transform: translateX(8px); }
    }

    .form-input.success {
      border-color: var(--gold);
    }

    .toggle-password {
      position: absolute;
      right: 14px;
      cursor: pointer;
      color: var(--silver);
      transition: color 0.3s;
      z-index: 2;
      font-size: 0.95rem;
      padding: 5px;
    }

    .toggle-password:hover {
      color: var(--gold);
    }

    .validation-message {
      font-size: 0.8rem;
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 6px;
      opacity: 0;
      transform: translateY(-5px);
      transition: all 0.3s;
    }

    .validation-message.show {
      opacity: 1;
      transform: translateY(0);
    }

    .validation-message.error {
      color: var(--red-accent);
    }

    .validation-message.success {
      color: var(--gold);
    }

    .options-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 26px;
      font-size: 0.875rem;
      gap: 10px;
    }

    .remember-me {
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      user-select: none;
      color: #4a5568;
    }

    .remember-me input[type="checkbox"] {
      width: 17px;
      height: 17px;
      cursor: pointer;
      accent-color: var(--gold);
    }

    .forgot-link {
      color: var(--red-accent);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
      white-space: nowrap;
    }

    .forgot-link:hover {
      color: var(--gold);
    }

    .login-btn {
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, var(--red-accent) 0%, #a52a2a 100%);
      color: white;
      border: 2px solid var(--gold);
      border-radius: 10px;
      font-size: 0.975rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(139, 0, 0, 0.25);
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(139, 0, 0, 0.35);
    }

    .login-btn:active {
      transform: translateY(0);
    }

    .login-btn:disabled {
      opacity: 0.7;
      cursor: not-allowed;
    }

    .spinner {
      display: inline-block;
      width: 14px;
      height: 14px;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.7s linear infinite;
      margin-left: 8px;
      vertical-align: middle;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .alert {
      padding: 12px 16px;
      border-radius: 8px;
      margin-bottom: 20px;
      display: none;
      align-items: center;
      gap: 10px;
      animation: slideDown 0.3s ease-out;
      font-size: 0.875rem;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .alert.success {
      background: rgba(212, 175, 55, 0.15);
      color: #7d6a1f;
      border: 1px solid var(--gold);
    }

    .alert.error {
      background: rgba(139, 0, 0, 0.15);
      color: var(--red-accent);
      border: 1px solid var(--red-accent);
    }

    .alert.show {
      display: flex;
    }

    /* Tablet screens */
    @media (max-width: 768px) {
      .form-side {
        padding: 35px 30px;
      }

      .form-header h1 {
        font-size: 1.75rem;
      }
    }

    /* Mobile devices */
    @media (max-width: 480px) {
      body {
        padding: 15px;
      }

      .container {
        border-radius: 14px;
      }

      .form-side {
        padding: 32px 24px;
      }

      .form-header {
        margin-bottom: 30px;
      }

      .form-header h1 {
        font-size: 1.625rem;
      }

      .form-header p {
        font-size: 0.9rem;
      }

      .input-group {
        margin-bottom: 20px;
      }

      .form-input {
        padding: 14px 14px 14px 44px;
        font-size: 16px;
      }

      .input-icon {
        left: 15px;
        font-size: 1rem;
      }

      .toggle-password {
        right: 15px;
        font-size: 1rem;
        padding: 6px;
      }

      .options-row {
        margin-bottom: 24px;
        font-size: 0.85rem;
      }

      .remember-me input[type="checkbox"] {
        width: 18px;
        height: 18px;
      }

      .login-btn {
        padding: 15px;
        font-size: 1rem;
      }
    }

    /* Small mobile devices */
    @media (max-width: 375px) {
      body {
        padding: 12px;
      }

      .form-side {
        padding: 28px 20px;
      }

      .form-header h1 {
        font-size: 1.5rem;
      }

      .form-header p {
        font-size: 0.875rem;
      }

      .input-group {
        margin-bottom: 18px;
      }

      .input-group label {
        font-size: 0.875rem;
      }

      .form-input {
        padding: 13px 12px 13px 42px;
      }

      .input-icon {
        left: 14px;
        font-size: 0.95rem;
      }

      .toggle-password {
        right: 14px;
        font-size: 0.95rem;
      }

      .options-row {
        font-size: 0.8rem;
        gap: 8px;
      }

      .remember-me span {
        font-size: 0.8rem;
      }

      .remember-me input[type="checkbox"] {
        width: 16px;
        height: 16px;
      }

      .forgot-link {
        font-size: 0.8rem;
      }

      .login-btn {
        padding: 14px;
        font-size: 0.95rem;
      }
    }

    /* Very small screens */
    @media (max-width: 320px) {
      body {
        padding: 10px;
      }

      .form-side {
        padding: 24px 18px;
      }

      .form-header {
        margin-bottom: 26px;
      }

      .form-header h1 {
        font-size: 1.4rem;
      }

      .input-group {
        margin-bottom: 16px;
      }

      .form-input {
        padding: 12px 10px 12px 40px;
      }

      .options-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 22px;
      }

      .forgot-link {
        align-self: flex-end;
      }
    }

    /* Landscape mode on mobile */
    @media (max-height: 600px) and (orientation: landscape) {
      body {
        padding: 15px;
      }

      .form-side {
        padding: 25px 30px;
      }

      .form-header {
        margin-bottom: 20px;
      }

      .form-header h1 {
        font-size: 1.5rem;
        margin-bottom: 5px;
      }

      .form-header p {
        font-size: 0.875rem;
      }

      .input-group {
        margin-bottom: 16px;
      }

      .options-row {
        margin-bottom: 18px;
      }

      .login-btn {
        padding: 13px;
      }
    }

    /* Large screens */
    @media (min-width: 1200px) {
      .container {
        max-width: 480px;
      }

      .form-side {
        padding: 45px 40px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="illustration-side">
      <svg class="svg-illustration" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:rgba(255,255,255,0.9);stop-opacity:1" />
            <stop offset="100%" style="stop-color:rgba(255,255,255,0.6);stop-opacity:1" />
          </linearGradient>
        </defs>

        <circle cx="200" cy="200" r="120" fill="url(#grad1)" opacity="0.3">
          <animate attributeName="r" from="120" to="130" dur="2s" repeatCount="indefinite" />
        </circle>

        <rect x="130" y="120" width="140" height="180" rx="15" fill="url(#grad1)" opacity="0.9">
          <animate attributeName="y" from="120" to="115" dur="3s" repeatCount="indefinite" direction="alternate" />
        </rect>

        <circle cx="200" cy="100" r="35" fill="url(#grad1)" opacity="0.95">
          <animate attributeName="cy" from="100" to="95" dur="2.5s" repeatCount="indefinite" direction="alternate" />
        </circle>

        <rect x="150" y="160" width="100" height="15" rx="7" fill="rgba(255,255,255,0.5)">
          <animate attributeName="opacity" from="0.5" to="0.8" dur="1.5s" repeatCount="indefinite" direction="alternate" />
        </rect>
        <rect x="150" y="190" width="80" height="15" rx="7" fill="rgba(255,255,255,0.5)">
          <animate attributeName="opacity" from="0.5" to="0.8" dur="1.5s" begin="0.3s" repeatCount="indefinite" direction="alternate" />
        </rect>

        <rect x="150" y="240" width="100" height="35" rx="8" fill="rgba(102,126,234,0.8)">
          <animate attributeName="fill" from="rgba(102,126,234,0.8)" to="rgba(118,75,162,0.8)" dur="3s" repeatCount="indefinite" direction="alternate" />
        </rect>

        <circle cx="350" cy="80" r="8" fill="rgba(255,255,255,0.7)">
          <animate attributeName="cy" from="80" to="60" dur="4s" repeatCount="indefinite" />
          <animate attributeName="opacity" from="0.7" to="0" dur="4s" repeatCount="indefinite" />
        </circle>
        <circle cx="50" cy="320" r="10" fill="rgba(255,255,255,0.6)">
          <animate attributeName="cy" from="320" to="300" dur="5s" repeatCount="indefinite" />
          <animate attributeName="opacity" from="0.6" to="0" dur="5s" repeatCount="indefinite" />
        </circle>
      </svg>

      <div class="welcome-text">
        <h2>Welcome Back!</h2>
        <p>Login to access your dashboard and explore amazing features</p>
      </div>
    </div>

    <div class="form-side">
      <div class="form-header">
        <h1>Sign In</h1>
        <p>Enter your credentials to continue</p>
      </div>

      <div class="alert" id="alertBox">
        <i class="fas fa-check-circle"></i>
        <span id="alertMessage"></span>
      </div>

      <form id="loginForm" novalidate>
        <div class="input-group">
          <label for="userinput">Email or Username</label>
          <div class="input-wrapper">
            <input
              type="text"
              id="userinput"
              name="userinput"
              class="form-input"
              placeholder="Enter email or username"
              autocomplete="username"
              required>
            <i class="fas fa-user input-icon"></i>
          </div>
          <div class="validation-message" id="userinputError">
            <i class="fas fa-exclamation-circle"></i>
            <span></span>
          </div>
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <div class="input-wrapper">
            <input
              type="password"
              id="password"
              name="password"
              class="form-input"
              placeholder="Enter your password"
              autocomplete="current-password"
              required>
            <i class="fas fa-lock input-icon"></i>
            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
          </div>
          <div class="validation-message" id="passwordError">
            <i class="fas fa-exclamation-circle"></i>
            <span></span>
          </div>
        </div>

        <div class="options-row">
          <label class="remember-me">
            <input type="checkbox" id="rememberMe">
            <span>Remember me</span>
          </label>
          <a href="#" class="forgot-link">Forgot password?</a>
        </div>

        <button type="submit" class="login-btn" id="loginBtn">
          <span id="btnText">Sign In</span>
        </button>
      </form>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    $(function() {
      $('#togglePassword').on('click', function() {
        const pwd = $('#password');
        const icon = $(this);
        if (pwd.attr('type') === 'password') {
          pwd.attr('type', 'text');
          icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
          pwd.attr('type', 'password');
          icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
      });

      function showValidation(id, msg, type) {
        const el = $(id);
        el.find('span').text(msg);
        el.removeClass('error success').addClass(type + ' show');
      }

      function hideValidation(id) {
        $(id).removeClass('show error success');
      }

      $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        $('#alertBox').removeClass('show success error');
        let formData = {
           userinput : $('#userinput').val().trim(),
           password : $('#password').val().trim()
        }
        console.log(formData);
        // debugger;
        let userinput = formData.userinput;
        let password = formData.password;

        let valid = true;

        // Validate username or email input
        if (userinput === '') {
          showValidation('#userinputError', 'Email or username is required', 'error');
          $('#userinput').addClass('error');
          valid = false;
        } else if (userinput.length < 3) {
          showValidation('#userinputError', 'Please enter a valid email or username', 'error');
          $('#userinput').addClass('error');
          valid = false;
        } else {
          hideValidation('#userinputError');
          $('#userinput').removeClass('error').addClass('success');
        }

        // Validate password
        if (password === '') {
          showValidation('#passwordError', 'Password is required', 'error');
          $('#password').addClass('error');
          valid = false;
        } else {
          hideValidation('#passwordError');
          $('#password').removeClass('error').addClass('success');
        }

        if (valid) {
          $('#loginBtn').prop('disabled', true);
          $('#btnText').html('Signing in <span class="spinner"></span>');

          $.ajax({
            url: 'login_backend.php',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function(response) {
              $('#loginBtn').prop('disabled', false);
              $('#btnText').text('Sign In');
              if (response.success) {
                $('#alertMessage').text('Login successful! Redirecting...');
                $('#alertBox').addClass('show success');
                setTimeout(function() {
                  window.location.href = "dashboard.php";
                }, 1200);
              } else {
                $('#alertMessage').text(response.message || "Invalid email/username or password.");
                $('#alertBox').addClass('show error');
              }
            },
            error: function() {
              $('#loginBtn').prop('disabled', false);
              $('#btnText').text('Sign In');
              $('#alertMessage').text('Error connecting to server. Please try again.');
              $('#alertBox').addClass('show error');
            }
          });
        }
      });

      $('.form-input').on('input', function() {
        $(this).removeClass('error success');
        let id = $(this).attr('id');
        hideValidation(`#${id}Error`);
      });
    });
  </script>
</body>

</html>