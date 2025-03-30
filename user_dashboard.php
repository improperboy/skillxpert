<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("Location: login.html");
    exit();
}
?>
    <p><a href="logout.php">Logout</a></p>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillXpert - Skill Exchange Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 <link rel="stylesheet" href="css/user_dashboard.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="/api/placeholder/100/100" alt="SkillXpert Logo">

            <span class="logo-text">SkillXpert</span>
        </div>
        <div class="menu">
            <div class="menu-item active">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-handshake"></i>
                <span>Skill Matcher</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-comments"></i>
                <span><a href="chatbox.html">Chatbox</a></span>
            </div>
            <div class="menu-item">
                <i class="fas fa-video"></i>
                <span>Video Call</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-clipboard-list"></i>
                <span>Skill Posting</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-search"></i>
                <span>Search</span>
            </div>
            <div class="menu-item">
                <i class="fas fa-credit-card"></i>
                <span>Pricing Plan</span>
            </div>
        </div>
        <div class="theme-selector">
            <div>Sidebar Color</div>
            <div class="color-options">
                <div class="color-option" style="background-color: #4a6bff;" data-color="#4a6bff"></div>
                <div class="color-option" style="background-color: #6c5ce7;" data-color="#6c5ce7"></div>
                <div class="color-option" style="background-color: #00b894;" data-color="#00b894"></div>
                <div class="color-option" style="background-color: #e17055;" data-color="#e17055"></div>
                <div class="color-option" style="background-color: #2d3436;" data-color="#2d3436"></div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search skills, users, topics...">
        </div>
        <div class="profile">
            <div class="notification">
                <i class="fas fa-bell"></i>
                <span class="count">3</span>
            </div>
        

            <div class="profile-name"><?php echo $_SESSION["user_name"]; ?></div>
            <div class="profile-menu">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-left">
            <div class="welcome-card">
                <div class="welcome-text">
                    
    <h2>Welcome, <?php echo $_SESSION["user_name"]; ?>! 🎉</h2>
                    <p>You have 3 new skill exchange requests and 2 upcoming live sessions today.</p>
                </div>
                <img src="/api/placeholder/200/200" alt="Welcome Illustration" class="welcome-img">
            </div>

            <div class="section">
                <div class="section-header">
                    <div class="section-title">Quick Stats</div>
                    <div class="view-all">View Details</div>
                </div>
                <div class="stats-container">
                    <div class="stat-card">
                        <i class="fas fa-users"></i>
                        <div class="stat-value">145</div>
                        <div class="stat-label">Connections</div>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-graduation-cap"></i>
                        <div class="stat-value">28</div>
                        <div class="stat-label">Skills Shared</div>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-star"></i>
                        <div class="stat-value">4.8</div>
                        <div class="stat-label">Rating</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-header">
                    <div class="section-title">Skill Exchange Requests</div>
                    <div class="view-all">View All</div>
                </div>
                <div class="request-list">
                    <div class="request-card">
                        <img src="/api/placeholder/100/100" alt="User" class="request-img">
                        <div class="request-details">
                            <div class="request-name">Sarah Miller</div>
                            <div class="request-skill">JavaScript Mentoring</div>
                        </div>
                        <div class="request-action">Accept</div>
                    </div>
                    <div class="request-card">
                        <img src="/api/placeholder/100/100" alt="User" class="request-img">
                        <div class="request-details">
                            <div class="request-name">Mike Chen</div>
                            <div class="request-skill">UI/UX Design Basics</div>
                        </div>
                        <div class="request-action">Accept</div>
                    </div>
                    <div class="request-card">
                        <img src="/api/placeholder/100/100" alt="User" class="request-img">
                        <div class="request-details">
                            <div class="request-name">Emma Wilson</div>
                            <div class="request-skill">Python for Data Science</div>
                        </div>
                        <div class="request-action">Accept</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-header">
                    <div class="section-title">Upcoming Live Sessions</div>
                    <div class="view-all">View All</div>
                </div>
                <div class="session-list">
                    <div class="session-card">
                        <img src="/api/placeholder/100/100" alt="User" class="session-img">
                        <div class="session-details">
                            <div class="session-name">React Hooks Workshop</div>
                            <div class="session-topic">With Jason Brooks</div>
                        </div>
                        <div class="session-time">2:30 PM</div>
                    </div>
                    <div class="session-card">
                        <img src="/api/placeholder/100/100" alt="User" class="session-img">
                        <div class="session-details">
                            <div class="session-name">UX Research Methods</div>
                            <div class="session-topic">With Olivia Green</div>
                        </div>
                        <div class="session-time">4:00 PM</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-sidebar">
            <div class="section">
                <div class="section-header">
                    <div class="section-title">Recommended Users</div>
                    <div class="view-all">See More</div>
                </div>
                <div class="user-list">
                    <div class="user-card">
                        <img src="/api/placeholder/100/100" alt="User" class="user-img">
                        <div class="user-details">
                            <div class="user-name">David Lee</div>
                            <div class="user-skill">Full Stack Developer</div>
                        </div>
                        <div class="user-action">Connect</div>
                    </div>
                    <div class="user-card">
                        <img src="/api/placeholder/100/100" alt="User" class="user-img">
                        <div class="user-details">
                            <div class="user-name">Lisa Wang</div>
                            <div class="user-skill">UI/UX Designer</div>
                        </div>
                        <div class="user-action">Connect</div>
                    </div>
                    <div class="user-card">
                        <img src="/api/placeholder/100/100" alt="User" class="user-img">
                        <div class="user-details">
                            <div class="user-name">James Wilson</div>
                            <div class="user-skill">Data Scientist</div>
                        </div>
                        <div class="user-action">Connect</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section-header">
                    <div class="section-title">Recent Messages</div>
                    <div class="view-all">View All</div>
                </div>
                <div class="message-list">
                    <div class="message-card">
                        <img src="/api/placeholder/100/100" alt="User" class="message-img">
                        <div class="message-details">
                            <div class="message-name">Sophia Martinez</div>
                            <div class="message-preview">Thanks for the session yesterday...</div>
                        </div>
                        <div class="message-time">12m</div>
                    </div>
                    <div class="message-card">
                        <img src="/api/placeholder/100/100" alt="User" class="message-img">
                        <div class="message-details">
                            <div class="message-name">Daniel Kim</div>
                            <div class="message-preview">When are you available for...</div>
                        </div>
                        <div class="message-time">2h</div>
                    </div>
                    <div class="message-card">
                        <img src="/api/placeholder/100/100" alt="User" class="message-img">
                        <div class="message-details">
                            <div class="message-name">Rachel Carter</div>
                            <div class="message-preview">I've shared the materials for...</div>
                        </div>
                        <div class="message-time">1d</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chatbox -->
    <div class="chatbox">
        <div class="quick-chat">
            <input type="text" placeholder="Type a message...">
            <div class="send-btn">
                <i class="fas fa-paper-plane"></i>
            </div>
        </div>
    </div>

    <!-- Live Call Popup -->
    <div class="live-call">
        <div class="call-header">
            <div class="call-title">
                <i class="fas fa-video"></i>
                <span>Incoming Call</span>
            </div>
            <div class="call-controls">
                <i class="fas fa-minus"></i>
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="call-content">
            <img src="/api/placeholder/100/100" alt="Caller" class="caller-img">
            <div class="caller-name">Sarah Miller</div>
            <div class="call-status">JavaScript Mentoring Session</div>
            <div class="call-buttons">
                <div class="call-btn call-accept">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="call-btn call-decline">
                    <i class="fas fa-phone-slash"></i>
                </div>
            </div>
        </div>
    </div>

    <script src="js/user_dashboard.js">
 
    </script>
</body>
</html>