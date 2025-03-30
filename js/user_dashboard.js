       // Color theme selector functionality
       const colorOptions = document.querySelectorAll('.color-option');
       const sidebar = document.querySelector('.sidebar');
       const root = document.documentElement;
       
       colorOptions.forEach(option => {
           option.addEventListener('click', function() {
               const color = this.getAttribute('data-color');
               
               // Change the sidebar color
               sidebar.style.backgroundColor = color;
               
               // Update the hover color (slightly darker)
               const hoverColor = adjustColor(color, -30);
               root.style.setProperty('--sidebar-color', color);
               root.style.setProperty('--sidebar-hover', hoverColor);
               
               // Update the primary color (for consistency)
               root.style.setProperty('--primary-color', color);
           });
       });
       
       // Helper function to adjust color brightness
       function adjustColor(color, amount) {
           // Convert hex to RGB
           let R = parseInt(color.substring(1, 3), 16);
           let G = parseInt(color.substring(3, 5), 16);
           let B = parseInt(color.substring(5, 7), 16);
       
           // Adjust color brightness
           R = Math.max(0, Math.min(255, R + amount));
           G = Math.max(0, Math.min(255, G + amount));
           B = Math.max(0, Math.min(255, B + amount));
       
           // Convert back to hex
           return '#' + 
               (R < 16 ? '0' : '') + R.toString(16) +
               (G < 16 ? '0' : '') + G.toString(16) +
               (B < 16 ? '0' : '') + B.toString(16);
       }
       
               // Notification interaction
               const notificationIcon = document.querySelector('.notification');
               const notificationCount = document.querySelector('.notification .count');
       
               notificationIcon.addEventListener('click', function() {
                   // Simulate clearing notifications
                   notificationCount.textContent = '0';
                   notificationCount.style.display = 'none';
               });
       
               // Profile menu dropdown simulation
               const profileMenu = document.querySelector('.profile-menu');
               const profileDropdown = document.createElement('div');
               profileDropdown.innerHTML = `
                   <div style="position: absolute; top: 100%; right: 0; background-color: white; 
                               box-shadow: 0 5px 15px rgba(0,0,0,0.1); 
                               border-radius: 10px; width: 200px; 
                               display: none; z-index: 100; padding: 10px;">
                       <div style="padding: 10px; cursor: pointer; hover: background-color: #f0f0f0;">
                           <i class="fas fa-user" style="margin-right: 10px;"></i>Edit Profile
                       </div>
                       <div style="padding: 10px; cursor: pointer;">
                           <i class="fas fa-cog" style="margin-right: 10px;"></i>Settings
                       </div>
                       <div style="padding: 10px; cursor: pointer; color: #e74c3c;">
                           <i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i>Logout
                       </div>
                   </div>
               `;
               profileDropdown.style.position = 'absolute';
               profileDropdown.style.top = '100%';
               profileMenu.appendChild(profileDropdown);
       
               profileMenu.addEventListener('click', function() {
                   const dropdown = this.querySelector('div');
                   dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
               });
       
               // Document click to close dropdown when clicking outside
               document.addEventListener('click', function(event) {
                   if (!profileMenu.contains(event.target)) {
                       profileDropdown.querySelector('div').style.display = 'none';
                   }
               });
       
               // Search functionality simulation
               const searchBar = document.querySelector('.search-bar input');
               searchBar.addEventListener('input', function() {
                   console.log('Searching for:', this.value);
                   // In a real app, this would trigger a search functionality
               });
       
               // Quick chat send button
               const quickChatInput = document.querySelector('.quick-chat input');
               const sendButton = document.querySelector('.send-btn');
       
               sendButton.addEventListener('click', sendMessage);
               quickChatInput.addEventListener('keypress', function(e) {
                   if (e.key === 'Enter') {
                       sendMessage();
                   }
               });
       
               function sendMessage() {
                   const message = quickChatInput.value.trim();
                   if (message) {
                       console.log('Sending message:', message);
                       quickChatInput.value = ''; // Clear input
                       // In a real app, this would send the message to a backend
                   }
               }
       
               // Responsive design adjustments
               window.addEventListener('resize', function() {
                   const screenWidth = window.innerWidth;
                   const sidebar = document.querySelector('.sidebar');
                   const mainContent = document.querySelector('.main-content');
       
                   if (screenWidth < 1200) {
                       sidebar.style.width = '60px';
                       sidebar.querySelector('.logo-text').style.display = 'none';
                       sidebar.querySelectorAll('.menu-item span').forEach(span => {
                           span.style.display = 'none';
                       });
                       mainContent.style.gridTemplateColumns = '60px 1fr';
                   } else {
                       sidebar.style.width = '240px';
                       sidebar.querySelector('.logo-text').style.display = 'block';
                       sidebar.querySelectorAll('.menu-item span').forEach(span => {
                           span.style.display = 'block';
                       });
                       mainContent.style.gridTemplateColumns = '240px 1fr';
                   }
               });