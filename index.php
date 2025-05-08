<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System (SRS)</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary: #14b8a6;
            --secondary-hover: #0d9488;
            --light-bg: #f8f9fa;
            --text-dark: #333;
            --text-muted: #6c757d;
            --border-radius: 10px;
            --shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: linear-gradient(135deg, #f5f7fa 0%, #e4e8ef 100%);
        }
        
        .auth-container {
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
        }
        
        .auth-row {
            display: flex;
            flex-wrap: wrap;
        }
        
        .auth-image {
            flex: 1;
            min-height: 500px;
            background-image: linear-gradient(to bottom, rgba(37, 99, 235, 0.8), rgba(20, 184, 166, 0.8)), 
                              url('/api/placeholder/800/1000');
            background-size: cover;
            background-position: center;
            padding: 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .auth-form {
            flex: 1;
            padding: 40px;
            min-width: 320px;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            margin-left: 10px;
            margin-bottom: 0;
        }
        
        .header-subtitle {
            font-size: 1rem;
            margin-bottom: 30px;
            color: var(--text-muted);
        }
        
        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--text-dark);
        }
        
        .form-control {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
            font-size: 0.95rem;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.25);
            border-color: var(--primary);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 12px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }
        
        .form-switch {
            margin-top: 20px;
            text-align: center;
        }
        
        .form-switch a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .form-switch a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }
        
        .form-tabs {
            display: flex;
            margin-bottom: 30px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .form-tab {
            flex: 1;
            text-align: center;
            padding: 15px;
            font-weight: 500;
            color: var(--text-muted);
            cursor: pointer;
            position: relative;
            transition: all 0.3s;
        }
        
        .form-tab.active {
            color: var(--primary);
        }
        
        .form-tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--primary);
        }
        
        .forgot-password {
            text-align: right;
            display: block;
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            margin-top: 8px;
            margin-bottom: 20px;
        }
        
        .forgot-password:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }
        
        .social-login {
            margin-top: 25px;
            text-align: center;
        }
        
        .social-btn {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: white;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .social-btn:hover {
            background-color: #f5f5f5;
        }
        
        .social-btn svg {
            margin-right: 10px;
        }
        
        .or-divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: var(--text-muted);
        }
        
        .or-divider::before,
        .or-divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .or-divider span {
            padding: 0 15px;
            font-size: 0.9rem;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .form-content {
            display: none;
        }
        
        .form-content.active {
            display: block;
        }
        
        @media (max-width: 768px) {
            .auth-image {
                display: none;
            }
            
            .auth-form {
                padding: 25px;
            }
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .feature-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .srs-highlight {
            color: var(--secondary);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-container">
            <div class="auth-row">
                <!-- Left Image Section -->
                <div class="auth-image">
                    <div>
                        <h2>Welcome to SRS</h2>
                        <p class="mb-4">Your complete student registration platform</p>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="mb-0">Course Registration</h5>
                                <p class="mb-0 small">Register for courses with just a few clicks</p>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 9.5a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                    <path d="M9.5 2a1.5 1.5 0 0 0-3 0v5a1.5 1.5 0 0 1-1.5 1.5h-1A1.5 1.5 0 0 0 2.5 10h-1A1.5 1.5 0 0 0 0 11.5v2A1.5 1.5 0 0 0 1.5 15h13a1.5 1.5 0 0 0 1.5-1.5v-2a1.5 1.5 0 0 0-1.5-1.5h-1a1.5 1.5 0 0 0-1.5-1.5h-1A1.5 1.5 0 0 1 9.5 7V2z"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="mb-0">Grade Tracking</h5>
                                <p class="mb-0 small">Real-time access to your academic performance</p>
                            </div>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM4.5 7.5a.5.5 0 0 1 0-1h5.793L8.146 4.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8H4.5Z"/>
                                </svg>
                            </div>
                            <div>
                                <h5 class="mb-0">Easy Communication</h5>
                                <p class="mb-0 small">Direct messaging with instructors and advisors</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Form Section -->
                <div class="auth-form">
                    <div class="logo-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#2563eb" viewBox="0 0 16 16">
                            <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                            <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                        </svg>
                        <h2 class="logo-text">S<span class="srs-highlight">R</span>S</h2>
                    </div>
                    <p class="header-subtitle">Student Registration System</p>
                    
                    <!-- Form Tabs -->
                    <div class="form-tabs">
                        <div class="form-tab active" id="login-tab">Sign In</div>
                        <div class="form-tab" id="register-tab">Register</div>
                        <div class="form-tab" id="forgot-tab">Reset Password</div>
                    </div>
                    
                    <!-- Login Form -->
                    <div class="form-content active" id="login-form">
                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <label for="login-email" class="form-label">Student ID or Email</label>
                                <input type="text" class="form-control" id="login-email" name="login_id" placeholder="Enter your student ID or email" required>
                            </div>
                            
                            <div class="mb-2">
                                <label for="login-password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="login-password" name="password" placeholder="••••••••" required>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
                                    <label class="form-check-label" for="remember-me">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" id="forgot-link" class="forgot-password">Forgot password?</a>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        </form>
                        
                        <div class="or-divider">
                            <span>or continue with</span>
                        </div>
                        
                        <div class="social-login">
                            <button class="social-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#4285F4" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                </svg>
                                Sign in with Google
                            </button>
                            <button class="social-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#3b5998" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                                Sign in with Facebook
                            </button>
                        </div>
                    </div>
                    
                    <!-- Register Form -->
                    <div class="form-content" id="register-form">
                        <form action="register.php" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first-name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first-name" name="first_name" placeholder="First name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last-name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Last name" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="student-id" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="student-id" name="student_id" placeholder="Enter your student ID" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="register-email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="register-email" name="email" placeholder="Enter your email address" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="register-password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="register-password" name="password" placeholder="Create a strong password" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="program" class="form-label">Program of Study</label>
                                <select class="form-select form-control" id="program" name="program" required>
                                    <option value="" selected disabled>Select your program</option>
                                    <option value="computer_science">Computer Science</option>
                                    <option value="business">Business Administration</option>
                                    <option value="engineering">Engineering</option>
                                    <option value="medicine">Medicine</option>
                                    <option value="arts">Arts & Humanities</option>
                                    <option value="education">Education</option>
                                </select>
                            </div>
                            
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="terms.html" target="_blank">Terms of Service</a> and <a href="privacy.html" target="_blank">Privacy Policy</a>
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">Create Account</button>
                        </form>
                    </div>
                    
                    <!-- Forgot Password Form -->
                    <div class="form-content" id="forgot-form">
                        <div class="text-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#2563eb" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                            <h4 class="mt-3">Forgot Password</h4>
                            <p class="text-muted">Enter your email address and we'll send you a link to reset your password</p>
                        </div>
                        
                        <form action="reset-password.php" method="post">
                            <div class="mb-4">
                                <label for="reset-email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="reset-email" name="email" placeholder="Enter your registered email" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 mb-3">Send Reset Link</button>
                            <button type="button" id="back-to-login" class="btn btn-outline-secondary w-100">Back to Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple script to toggle between forms -->
    <script>
        // Tab switching functionality
        document.getElementById('login-tab').addEventListener('click', function() {
            activateTab('login');
        });
        
        document.getElementById('register-tab').addEventListener('click', function() {
            activateTab('register');
        });
        
        document.getElementById('forgot-tab').addEventListener('click', function() {
            activateTab('forgot');
        });
        
        // Forgot password link
        document.getElementById('forgot-link').addEventListener('click', function(e) {
            e.preventDefault();
            activateTab('forgot');
        });
        
        // Back to login button
        document.getElementById('back-to-login').addEventListener('click', function() {
            activateTab('login');
        });
        
        function activateTab(tabName) {
            // Remove active class from all tabs and forms
            document.querySelectorAll('.form-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            document.querySelectorAll('.form-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Add active class to selected tab and form
            document.getElementById(tabName + '-tab').classList.add('active');
            document.getElementById(tabName + '-form').classList.add('active');
        }
    </script>
</body>
</html>