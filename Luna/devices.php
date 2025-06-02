<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>จัดการอุปกรณ์ - Luna Smart Home</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      
      body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        background: #0a0a0a;
        min-height: 100vh;
        overflow-x: hidden;
        color: #fff;
      }
      
      .main-container {
        width: 100vw;
        min-height: 100vh;
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        position: relative;
        overflow: hidden;
      }
      
      .glow-effect {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(
          circle,
          rgba(255, 107, 53, 0.15) 0%,
          transparent 50%
        );
        animation: rotate 20s linear infinite;
        pointer-events: none;
      }
      
      @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
      }
      
      .floating-orb {
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(
          circle,
          rgba(255, 107, 53, 0.2),
          transparent
        );
        animation: float 8s ease-in-out infinite;
        pointer-events: none;
      }
      
      .orb-1 {
        width: 300px;
        height: 300px;
        top: 20%;
        right: -150px;
        animation-delay: 0s;
      }
      
      .orb-2 {
        width: 200px;
        height: 200px;
        bottom: 30%;
        left: -100px;
        animation-delay: 4s;
      }
      
      @keyframes float {
        0%, 100% {
          transform: translateY(0px) scale(1);
          opacity: 0.3;
        }
        50% {
          transform: translateY(-30px) scale(1.1);
          opacity: 0.6;
        }
      }
      
      /* Navigation */
      .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 70px;
        background: rgba(26, 26, 26, 0.95);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
      }
      
      .nav-logo {
        display: flex;
        align-items: center;
        gap: 8px;
      }
      
      .nav-logo-text {
        color: #fff;
        font-size: 24px;
        font-weight: 300;
        letter-spacing: -1px;
      }
      
      .nav-logo-dots {
        display: flex;
        gap: 4px;
      }
      
      .nav-dot {
        width: 6px;
        height: 6px;
        background: #ff6b35;
        border-radius: 50%;
        animation: pulse 2s ease-in-out infinite alternate;
      }
      
      .nav-dot:nth-child(2) {
        animation-delay: 0.5s;
      }
      
      @keyframes pulse {
        0% { opacity: 0.4; transform: scale(0.8); }
        100% { opacity: 1; transform: scale(1.2); }
      }
      
      .hamburger {
        display: flex;
        flex-direction: column;
        cursor: pointer;
        padding: 10px;
        transition: all 0.3s ease;
      }
      
      .hamburger span {
        width: 25px;
        height: 3px;
        background: #fff;
        margin: 3px 0;
        transition: all 0.3s ease;
        border-radius: 2px;
      }
      
      .hamburger.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
      }
      
      .hamburger.active span:nth-child(2) {
        opacity: 0;
      }
      
      .hamburger.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
      }
      
      /* Sidebar */
      .sidebar {
        position: fixed;
        top: 70px;
        right: -350px;
        width: 350px;
        height: calc(100vh - 70px);
        background: rgba(26, 26, 26, 0.98);
        backdrop-filter: blur(30px);
        border-left: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 999;
        overflow-y: auto;
      }
      
      .sidebar.open {
        right: 0;
      }
      
      .sidebar-content {
        padding: 30px 20px;
      }
      
      .sidebar-section {
        margin-bottom: 40px;
      }
      
      .sidebar-title {
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid rgba(255, 107, 53, 0.3);
      }
      
      .menu-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 20px;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        border-radius: 12px;
        margin-bottom: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
      }
      
      .menu-item:hover,
      .menu-item.active {
        background: rgba(255, 107, 53, 0.1);
        color: #ff6b35;
        transform: translateX(5px);
      }
      
      .menu-icon {
        font-size: 20px;
        width: 24px;
        text-align: center;
      }
      
      .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 998;
      }
      
      .overlay.active {
        opacity: 1;
        visibility: visible;
      }
      
      /* Main Content */
      .content-wrapper {
        padding-top: 70px;
        min-height: 100vh;
        padding-bottom: 40px;
      }
      
      .page-header {
        text-align: center;
        padding: 40px 20px;
        position: relative;
        z-index: 10;
      }
      
      .page-title {
        color: #fff;
        font-size: 36px;
        font-weight: 300;
        margin-bottom: 10px;
      }
      
      .page-subtitle {
        color: rgba(255, 255, 255, 0.6);
        font-size: 16px;
        font-weight: 300;
        letter-spacing: 2px;
        margin-bottom: 20px;
      }
      
      .room-info {
        display: inline-flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 12px 24px;
        gap: 10px;
      }
      
      .room-number {
        color: #ff6b35;
        font-weight: 600;
        font-size: 18px;
      }
      
      .room-label {
        color: rgba(255, 255, 255, 0.7);
        font-size: 14px;
      }
      
      /* Device Controls */
      .devices-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
      }
      
      .devices-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 40px;
      }
      
      .device-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
      }
      
      .device-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(
          90deg,
          transparent,
          rgba(255, 255, 255, 0.2),
          transparent
        );
      }
      
      .device-card.active {
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
        transform: translateY(-4px);
        box-shadow: 0 20px 40px rgba(255, 107, 53, 0.2);
      }
      
      .device-card.active::after {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
          45deg,
          transparent,
          rgba(255, 107, 53, 0.1),
          transparent
        );
        animation: shimmer 3s ease-in-out infinite;
      }
      
      @keyframes shimmer {
        0% {
          transform: translateX(-100%) translateY(-100%) rotate(45deg);
        }
        100% {
          transform: translateX(100%) translateY(100%) rotate(45deg);
        }
      }
      
      .device-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 25px;
      }
      
      .device-info {
        display: flex;
        align-items: center;
      }
      
      .device-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        font-size: 24px;
        box-shadow: 0 8px 32px rgba(255, 107, 53, 0.4);
        transition: all 0.3s ease;
      }
      
      .device-card.active .device-icon {
        transform: scale(1.1);
        box-shadow: 0 12px 40px rgba(255, 107, 53, 0.6);
      }
      
      .device-details h3 {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
      }
      
      .device-details p {
        color: rgba(255, 255, 255, 0.6);
        font-size: 14px;
        font-weight: 300;
      }
      
      .toggle-switch {
        position: relative;
        width: 60px;
        height: 32px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255, 255, 255, 0.1);
      }
      
      .toggle-switch.active {
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        box-shadow: 0 0 20px rgba(255, 107, 53, 0.5);
      }
      
      .toggle-slider {
        position: absolute;
        top: 3px;
        left: 3px;
        width: 26px;
        height: 26px;
        background: #fff;
        border-radius: 50%;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      }
      
      .toggle-switch.active .toggle-slider {
        transform: translateX(28px);
      }
      
      .usage-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 20px;
      }
      
      .usage-item {
        text-align: center;
        padding: 15px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.05);
      }
      
      .usage-value {
        font-size: 18px;
        font-weight: 600;
        color: #ff6b35;
        margin-bottom: 5px;
        text-shadow: 0 0 10px rgba(255, 107, 53, 0.3);
      }
      
      .usage-label {
        font-size: 11px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 300;
      }
      
      /* Quick Actions */
      .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-top: 30px;
      }
      
      .quick-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        color: #fff;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
      }
      
      .quick-btn:hover {
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
        transform: translateY(-2px);
      }
      
      .quick-icon {
        font-size: 24px;
        margin-bottom: 8px;
        display: block;
      }
      
      .quick-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.7);
      }
      
      /* Responsive */
      @media (max-width: 768px) {
        .sidebar {
          width: 100vw;
          right: -100vw;
        }
        
        .devices-grid {
          grid-template-columns: 1fr;
        }
        
        .quick-actions {
          grid-template-columns: repeat(2, 1fr);
        }
        
        .page-title {
          font-size: 28px;
        }
      }
    </style>
  </head>
  <body>
    <div class="main-container">
      <div class="glow-effect"></div>
      <div class="floating-orb orb-1"></div>
      <div class="floating-orb orb-2"></div>

      <!-- Navigation -->
      <nav class="navbar">
        <div class="nav-logo">
          <span class="nav-logo-text">l</span>
          <div class="nav-logo-dots">
            <div class="nav-dot"></div>
            <div class="nav-dot"></div>
          </div>
          <span class="nav-logo-text">na</span>
        </div>
        <div class="hamburger" onclick="toggleSidebar()">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>

      <!-- Overlay -->
      <div class="overlay" onclick="closeSidebar()"></div>

      <!-- Sidebar -->
      <div class="sidebar" id="sidebar">
        <div class="sidebar-content">
          <div class="sidebar-section">
            <div class="sidebar-title">หน้าหลัก</div>
            <div class="menu-item" onclick="window.location.href='index.php'">
              <span class="menu-icon">🏠</span>
              <span>แดชบอร์ด</span>
            </div>
          </div>

          <div class="sidebar-section">
            <div class="sidebar-title">การจัดการ</div>
            <div class="menu-item active">
              <span class="menu-icon">⚡</span>
              <span>จัดการอุปกรณ์</span>
            </div>
            <div class="menu-item" onclick="window.location.href='usage.php'">
              <span class="menu-icon">📊</span>
              <span>สถิติการใช้งาน</span>
            </div>
            <div class="menu-item" onclick="window.location.href='billing.php'">
              <span class="menu-icon">💳</span>
              <span>ประวัติการชำระ</span>
            </div>
            <div class="menu-item" onclick="window.location.href='topup.php'">
              <span class="menu-icon">💰</span>
              <span>เติมเงิน</span>
            </div>
          </div>

        

          <div class="sidebar-section">
            <div class="sidebar-title">ตั้งค่า</div>
            <div class="menu-item" onclick="window.location.href='profile.php'">
              <span class="menu-icon">👤</span>
              <span>โปรไฟล์</span>
            </div>
            <div class="menu-item" onclick="window.location.href='notifications.php'">
              <span class="menu-icon">🔔</span>
              <span>การแจ้งเตือน</span>
            </div>
            <div class="menu-item" onclick="window.location.href='settings.php'">
              <span class="menu-icon">⚙️</span>
              <span>ตั้งค่าระบบ</span>
            </div>
            <div class="menu-item" onclick="window.location.href='support.php'">
              <span class="menu-icon">❓</span>
              <span>ช่วยเหลือ</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="content-wrapper">
        <div class="page-header">
          <h1 class="page-title">จัดการอุปกรณ์</h1>
          <p class="page-subtitle">DEVICE MANAGEMENT</p>
          <div class="room-info">
            <span class="room-number">ห้อง A-205</span>
            <span class="room-label">หอพักลูนา</span>
          </div>
        </div>

        <div class="devices-container">
          <div class="devices-grid">
            <!-- Light Control -->
            <div class="device-card" id="lightCard">
              <div class="device-header">
                <div class="device-info">
                  <div class="device-icon">💡</div>
                  <div class="device-details">
                    <h3>ไฟห้อง</h3>
                    <p id="light-status">ปิดอยู่</p>
                  </div>
                </div>
                <div class="toggle-switch" id="lightToggle" onclick="toggleDevice('light')">
                  <div class="toggle-slider"></div>
                </div>
              </div>

              <div class="usage-stats">
                <div class="usage-item">
                  <div class="usage-value" id="light-usage">0 kW</div>
                  <div class="usage-label">กำลังใช้</div>
                </div>
                <div class="usage-item">
                  <div class="usage-value" id="light-cost">฿0</div>
                  <div class="usage-label">วันนี้</div>
                </div>
              </div>
            </div>

            <!-- Water Control -->
            <div class="device-card" id="waterCard">
              <div class="device-header">
                <div class="device-info">
                  <div class="device-icon">💧</div>
                  <div class="device-details">
                    <h3>ระบบน้ำ</h3>
                    <p id="water-status">ปิดอยู่</p>
                  </div>
                </div>
                <div class="toggle-switch" id="waterToggle" onclick="toggleDevice('water')">
                  <div class="toggle-slider"></div>
                </div>
              </div>

              <div class="usage-stats">
                <div class="usage-item">
                  <div class="usage-value" id="water-usage">0 ลิตร</div>
                  <div class="usage-label">ใช้ไปแล้ว</div>
                </div>
                <div class="usage-item">
                  <div class="usage-value" id="water-cost">฿0</div>
                  <div class="usage-label">วันนี้</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Quick Actions -->
          <div class="quick-actions">
            <div class="quick-btn" onclick="quickAction('allOff')">
              <span class="quick-icon">🌙</span>
              <span class="quick-label">ปิดทั้งหมด</span>
            </div>
            <div class="quick-btn" onclick="window.location.href='usage.php'">
              <span class="quick-icon">📊</span>
              <span class="quick-label">สถิติการใช้</span>
            </div>
            <div class="quick-btn" onclick="window.location.href='index.php'">
              <span class="quick-icon">🏠</span>
              <span class="quick-label">กลับแดชบอร์ด</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      let devices = {
        light: { status: false, usage: 0, cost: 0 },
        water: { status: false, usage: 0, cost: 0 }
      };

      let currentUser = null;

      // Navigation functions
      function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.querySelector('.hamburger');
        const overlay = document.querySelector('.overlay');
        
        sidebar.classList.toggle('open');
        hamburger.classList.toggle('active');
        overlay.classList.toggle('active');
      }

      function closeSidebar() {
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.querySelector('.hamburger');
        const overlay = document.querySelector('.overlay');
        
        sidebar.classList.remove('open');
        hamburger.classList.remove('active');
        overlay.classList.remove('active');
      }

      // Check authentication on page load
      window.addEventListener('load', function() {
        // Initialize device states
        updateAllDeviceStates();
        
        setTimeout(() => {
          showNotification('ยินดีต้อนรับสู่ระบบควบคุมอุปกรณ์ IoT');
        }, 1000);
      });

      function toggleDevice(deviceType) {
        const device = devices[deviceType];
        device.status = !device.status;

        const toggle = document.getElementById(`${deviceType}Toggle`);
        const status = document.getElementById(`${deviceType}-status`);
        const card = document.getElementById(`${deviceType}Card`);

        if (device.status) {
          toggle.classList.add('active');
          card.classList.add('active');
          status.textContent = 'เปิดอยู่';
          
          // Set initial usage when turned on
          switch(deviceType) {
            case 'light':
              device.usage = 2.5;
              device.cost = 8.50;
              break;
            case 'water':
              device.usage = 15; // liters
              device.cost = 18.50;
              break;
          }
        } else {
          toggle.classList.remove('active');
          card.classList.remove('active');
          status.textContent = 'ปิดอยู่';
          device.usage = 0;
          device.cost = 0;
        }

        updateDeviceUsage(deviceType);
        showNotification(`${getDeviceName(deviceType)} ${device.status ? 'เปิด' : 'ปิด'}แล้ว`);
      }

      function updateDeviceUsage(deviceType) {
        const device = devices[deviceType];
        const usageElement = document.getElementById(`${deviceType}-usage`);
        const costElement = document.getElementById(`${deviceType}-cost`);
        
        if (deviceType === 'water') {
          if (usageElement) usageElement.textContent = `${device.usage} ลิตร`;
        } else {
          if (usageElement) usageElement.textContent = `${device.usage} kW`;
        }
        if (costElement) costElement.textContent = `฿${device.cost}`;
      }

      function updateAllDeviceStates() {
        Object.keys(devices).forEach(deviceType => {
          updateDeviceUsage(deviceType);
        });
      }

      function quickAction(action) {
        switch(action) {
          case 'allOff':
            Object.keys(devices).forEach(deviceType => {
              if (devices[deviceType].status) {
                toggleDevice(deviceType);
              }
            });
            showNotification('ปิดอุปกรณ์ทั้งหมดแล้ว');
            break;
        }
      }

      function getDeviceName(deviceType) {
        const names = {
          light: 'ไฟห้อง',
          water: 'ระบบน้ำ'
        };
        return names[deviceType] || deviceType;
      }

      function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.style.cssText = `
          position: fixed;
          top: 90px;
          right: 20px;
          background: ${type === 'error' ? 'rgba(239, 68, 68, 0.9)' : 'rgba(255, 107, 53, 0.9)'};
          color: white;
          padding: 15px 20px;
          border-radius: 8px;
          z-index: 10000;
          font-size: 14px;
          backdrop-filter: blur(10px);
          border: 1px solid ${type === 'error' ? 'rgba(239, 68, 68, 0.3)' : 'rgba(255, 107, 53, 0.3)'};
          animation: slideIn 0.3s ease-out;
          max-width: 300px;
          box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        `;
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => {
          notification.style.animation = 'slideOut 0.3s ease-in forwards';
          setTimeout(() => notification.remove(), 300);
        }, 3000);
      }

      // Close sidebar when clicking outside
      document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.querySelector('.hamburger');
        
        if (!sidebar.contains(e.target) && !hamburger.contains(e.target)) {
          closeSidebar();
        }
      });

      // Keyboard navigation
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          closeSidebar();
        }
      });

      // Add CSS for notification animations
      const style = document.createElement('style');
      style.textContent = `
        @keyframes slideIn {
          from { transform: translateX(100%); opacity: 0; }
          to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOut {
          from { transform: translateX(0); opacity: 1; }
          to { transform: translateX(100%); opacity: 0; }
        }
      `;
      document.head.appendChild(style);
    </script>
  </body>
</html>