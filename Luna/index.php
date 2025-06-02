<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Luna Smart Home</title>
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
      }
      
      .main-container {
        width: 100vw;
        height: 100vh;
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        position: relative;
        overflow: hidden;
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
        height: 100vh;
        overflow-y: auto;
      }
      
      .content-wrapper::-webkit-scrollbar {
        width: 8px;
      }
      
      .content-wrapper::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
      }
      
      .content-wrapper::-webkit-scrollbar-thumb {
        background: rgba(255, 107, 53, 0.5);
        border-radius: 4px;
      }
      
      .content-wrapper::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 107, 53, 0.7);
      }
      
      .page {
        display: none;
        min-height: calc(100vh - 70px);
        padding: 40px 20px;
        animation: fadeIn 0.5s ease-in-out;
      }
      
      .page.active {
        display: block;
      }
      
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
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
      
      /* Dashboard Page */
      .dashboard-header {
        text-align: center;
        margin-bottom: 40px;
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
      }
      
      .user-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 20px;
        margin: 0 auto 40px;
        max-width: 600px;
      }
      
      .username {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
      }
      
      .balance-container {
        display: flex;
        align-items: center;
        gap: 15px;
      }
      
      .balance {
        font-size: 18px;
        font-weight: 600;
      }
      
      .balance.sufficient {
        color: #4ade80;
        text-shadow: 0 0 10px rgba(74, 222, 128, 0.3);
      }
      
      .balance.insufficient {
        color: #ef4444;
        text-shadow: 0 0 10px rgba(239, 68, 68, 0.3);
      }
      
      .balance-status {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.6);
      }
      
      .dashboard-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        gap: 30px;
      }
      
      .devices-grid {
        display: grid;
        gap: 30px;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
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
      
      .daily-usage {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin: 20px 0;
      }
      
      .usage-item {
        text-align: center;
        padding: 20px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.05);
      }
      
      .usage-value {
        font-size: 24px;
        font-weight: 600;
        color: #ff6b35;
        margin-bottom: 8px;
        text-shadow: 0 0 15px rgba(255, 107, 53, 0.3);
      }
      
      .usage-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 300;
      }
      
      .stats-sections {
        display: grid;
        gap: 30px;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      }
      
      .average-section, .topup-section {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
      }
      
      .average-title, .topup-title {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 20px;
        text-align: center;
      }
      
      .average-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
      }
      
      .stat-item {
        text-align: center;
        padding: 20px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.05);
      }
      
      .stat-value {
        font-size: 24px;
        font-weight: 600;
        color: #ff6b35;
        margin-bottom: 8px;
        text-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
      }
      
      .stat-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 300;
      }
      
      .topup-amounts {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 20px;
      }
      
      .amount-btn {
        padding: 15px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
      }
      
      .amount-btn:hover,
      .amount-btn.selected {
        background: rgba(255, 107, 53, 0.2);
        border-color: rgba(255, 107, 53, 0.4);
        transform: translateY(-2px);
      }
      
      .custom-amount {
        width: 100%;
        padding: 15px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        color: #fff;
        font-size: 16px;
        margin-bottom: 20px;
        outline: none;
      }
      
      .custom-amount::placeholder {
        color: rgba(255, 255, 255, 0.4);
      }
      
      .topup-btn {
        width: 100%;
        padding: 18px;
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border: none;
        border-radius: 12px;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 32px rgba(255, 107, 53, 0.3);
      }
      
      .topup-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 40px rgba(255, 107, 53, 0.4);
      }
      
      /* Other Pages Styles */
      .other-page-content {
        max-width: 1000px;
        margin: 0 auto;
        padding: 40px 20px;
      }
      
      .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 40px;
      }
      
      .feature-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
      }
      
      .feature-card:hover {
        transform: translateY(-5px);
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
      }
      
      .feature-icon {
        font-size: 48px;
        margin-bottom: 20px;
      }
      
      .feature-title {
        color: #fff;
        font-size: 24px;
        font-weight: 500;
        margin-bottom: 15px;
      }
      
      .feature-description {
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.6;
      }
      
      .floating-orb {
        position: absolute;
        width: 200px;
        height: 200px;
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
        top: 10%;
        right: -100px;
        animation-delay: 0s;
      }
      
      .orb-2 {
        bottom: 20%;
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
      
      /* Responsive */
      @media (max-width: 768px) {
        .sidebar {
          width: 100vw;
          right: -100vw;
        }
        
        .devices-grid {
          grid-template-columns: 1fr;
        }
        
        .stats-sections {
          grid-template-columns: 1fr;
        }
        
        .topup-amounts {
          grid-template-columns: repeat(2, 1fr);
        }
        
        .average-stats {
          grid-template-columns: 1fr;
        }
        
        .feature-grid {
          grid-template-columns: 1fr;
        }
        
        .user-info {
          flex-direction: column;
          gap: 15px;
          text-align: center;
        }
        
        .page-title {
          font-size: 28px;
        }
      }
      
      @media (min-width: 1200px) {
        .topup-amounts {
          grid-template-columns: repeat(4, 1fr);
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
            <div class="menu-item active" onclick="showPage('dashboard')">
              <span class="menu-icon">🏠</span>
              <span>แดชบอร์ด</span>
            </div>
          </div>

          <div class="sidebar-section">
            <div class="sidebar-title">การจัดการ</div>
            <div class="menu-item" onclick="window.location.href='devices.php'">
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
        <!-- Dashboard Page -->
        <div class="page active" id="dashboard">
          <div class="dashboard-header">
            <h1 class="page-title">แดชบอร์ด</h1>
            <p class="page-subtitle">SMART HOME CONTROL</p>
          </div>

          <div class="user-info">
            <div class="username">สวัสดี, สมชาย</div>
            <div class="balance-container">
              <div class="balance sufficient" id="balance">฿1,245</div>
              <div class="balance-status">เพียงพอ</div>
            </div>
          </div>

          <div class="dashboard-content">
            <div class="devices-grid">
              <div class="device-card" id="lightCard">
                <div class="device-header">
                  <div class="device-info">
                    <div class="device-icon">⚡</div>
                    <div class="device-details">
                      <h3>ไฟฟ้า</h3>
                      <p id="light-status">ปิดอยู่</p>
                    </div>
                  </div>
                  <div class="toggle-switch" id="lightToggle" onclick="toggleLight()">
                    <div class="toggle-slider"></div>
                  </div>
                </div>

                <div class="daily-usage">
                  <div class="usage-item">
                    <div class="usage-value" id="daily-units">8.5</div>
                    <div class="usage-label">หน่วยวันนี้</div>
                  </div>
                  <div class="usage-item">
                    <div class="usage-value" id="daily-cost">฿34</div>
                    <div class="usage-label">บาทวันนี้</div>
                  </div>
                </div>
              </div>

              <div class="device-card" id="waterCard">
                <div class="device-header">
                  <div class="device-info">
                    <div class="device-icon">💧</div>
                    <div class="device-details">
                      <h3>น้ำ</h3>
                      <p id="water-status">ปิดอยู่</p>
                    </div>
                  </div>
                  <div class="toggle-switch" id="waterToggle" onclick="toggleWater()">
                    <div class="toggle-slider"></div>
                  </div>
                </div>

                <div class="daily-usage">
                  <div class="usage-item">
                    <div class="usage-value" id="water-usage">12</div>
                    <div class="usage-label">ลิตรวันนี้</div>
                  </div>
                  <div class="usage-item">
                    <div class="usage-value" id="water-cost">฿18</div>
                    <div class="usage-label">บาทวันนี้</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="stats-sections">
              <div class="average-section">
                <div class="average-title">ค่าเฉลี่ย</div>
                <div class="average-stats">
                  <div class="stat-item">
                    <div class="stat-value">7.2</div>
                    <div class="stat-label">หน่วยวันนี้</div>
                  </div>
                  <div class="stat-item">
                    <div class="stat-value">฿29</div>
                    <div class="stat-label">บาทวันนี้</div>
                  </div>
                  <div class="stat-item">
                    <div class="stat-value">฿850</div>
                    <div class="stat-label">บาทเดือนนี้</div>
                  </div>
                </div>
              </div>

              <div class="topup-section">
                <div class="topup-title">เติมเงิน</div>
                <div class="topup-amounts">
                  <div class="amount-btn" onclick="selectAmount(100)">฿100</div>
                  <div class="amount-btn" onclick="selectAmount(200)">฿200</div>
                  <div class="amount-btn" onclick="selectAmount(500)">฿500</div>
                  <div class="amount-btn" onclick="selectAmount(1000)">฿1,000</div>
                </div>
                <input
                  type="number"
                  class="custom-amount"
                  placeholder="จำนวนเงินที่ต้องการเติม"
                  id="customAmount"
                />
                <button class="topup-btn" onclick="topUp()">เติมเงิน</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Devices Page -->
        <div class="page" id="devices">
          <div class="other-page-content">
            <h1 class="page-title">จัดการอุปกรณ์</h1>
            <p class="page-subtitle">DEVICE MANAGEMENT</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3 class="feature-title">ระบบไฟฟ้า</h3>
                <p class="feature-description">ควบคุมไฟฟ้าทั้งบ้าน ตั้งค่าโหมดประหยัดพลังงาน และมอนิเตอร์การใช้งานแบบเรียลไทม์</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">💧</div>
                <h3 class="feature-title">ระบบน้ำ</h3>
                <p class="feature-description">จัดการระบบน้ำประปา ตรวจสอบการรั่วไหล และกำหนดเวลาการใช้น้ำอัตโนมัติ</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">🌡️</div>
                <h3 class="feature-title">ระบบอุณหภูมิ</h3>
                <p class="feature-description">ควบคุมเครื่องปรับอากาศ พัดลม และระบบทำความร้อนแบบอัจฉริยะ</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3 class="feature-title">ระบบความปลอดภัย</h3>
                <p class="feature-description">กล้องวงจรปิด เซ็นเซอร์การเคลื่อนไหว และระบบล็อคประตูอัตโนมัติ</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Usage Statistics Page -->
        <div class="page" id="usage">
          <div class="other-page-content">
            <h1 class="page-title">สถิติการใช้งาน</h1>
            <p class="page-subtitle">USAGE ANALYTICS</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">📈</div>
                <h3 class="feature-title">รายงานรายวัน</h3>
                <p class="feature-description">ติดตามการใช้พลังงานและน้ำประจำวัน พร้อมแนวโน้มการใช้งาน</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3 class="feature-title">สถิติรายเดือน</h3>
                <p class="feature-description">เปรียบเทียบการใช้งานรายเดือน และคาดการณ์ค่าใช้จ่าย</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">💡</div>
                <h3 class="feature-title">คำแนะนำการประหยัด</h3>
                <p class="feature-description">ระบบ AI แนะนำวิธีประหยัดพลังงานตามพฤติกรรมการใช้งาน</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Billing History Page -->
        <div class="page" id="billing">
          <div class="other-page-content">
            <h1 class="page-title">ประวัติการชำระ</h1>
            <p class="page-subtitle">BILLING HISTORY</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">🧾</div>
                <h3 class="feature-title">ใบแจ้งหนี้</h3>
                <p class="feature-description">ดูใบแจ้งหนี้รายเดือน ดาวน์โหลดเอกสาร และตรวจสอบรายละเอียดค่าใช้จ่าย</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">💳</div>
                <h3 class="feature-title">ประวัติการชำระ</h3>
                <p class="feature-description">ตรวจสอบประวัติการชำระเงิน สถานะการชำระ และใบเสร็จรับเงิน</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3 class="feature-title">การชำระอัตโนมัติ</h3>
                <p class="feature-description">ตั้งค่าการชำระเงินอัตโนมัติผ่านบัตรเครดิตหรือบัญชีธนาคาร</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Top-up Page -->
        <div class="page" id="topup">
          <div class="other-page-content">
            <h1 class="page-title">เติมเงิน</h1>
            <p class="page-subtitle">TOP-UP CREDIT</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3 class="feature-title">เติมเงินด่วน</h3>
                <p class="feature-description">เติมเงินผ่านบัตรเครดิต เดบิต หรือ QR Code ภายใน 30 วินาที</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">🎁</div>
                <h3 class="feature-title">โปรโมชั่น</h3>
                <p class="feature-description">รับส่วนลดและโบนัสเครดิตเมื่อเติมเงินครบตามเงื่อนไข</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">🔄</div>
                <h3 class="feature-title">เติมเงินอัตโนมัติ</h3>
                <p class="feature-description">ตั้งค่าเติมเงินอัตโนมัติเมื่อยอดเงินต่ำกว่าที่กำหนด</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Automation Page -->
        <div class="page" id="automation">
          <div class="other-page-content">
            <h1 class="page-title">ระบบอัตโนมัติ</h1>
            <p class="page-subtitle">SMART AUTOMATION</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">🤖</div>
                <h3 class="feature-title">เรียนรู้พฤติกรรม</h3>
                <p class="feature-description">ระบบ AI เรียนรู้พฤติกรรมการใช้งานและปรับการทำงานอัตโนมัติ</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">🌅</div>
                <h3 class="feature-title">โหมดเวลา</h3>
                <p class="feature-description">ตั้งค่าโหมดเช้า กลางวัน เย็น และกลางคืนพร้อมการปรับอัตโนมัติ</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">📍</div>
                <h3 class="feature-title">ตำแหน่งอัจฉริยะ</h3>
                <p class="feature-description">เปิด-ปิดอุปกรณ์ตามตำแหน่งของเจ้าของบ้านผ่าน GPS</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Schedule Page -->
        <div class="page" id="schedule">
          <div class="other-page-content">
            <h1 class="page-title">กำหนดการ</h1>
            <p class="page-subtitle">SMART SCHEDULING</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">⏰</div>
                <h3 class="feature-title">ตั้งเวลาการทำงาน</h3>
                <p class="feature-description">กำหนดเวลาเปิด-ปิดอุปกรณ์แต่ละชิ้นตามต้องการ</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">📅</div>
                <h3 class="feature-title">ตารางรายสัปดาห์</h3>
                <p class="feature-description">สร้างตารางการทำงานที่แตกต่างกันในแต่ละวันของสัปดาห์</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">🔔</div>
                <h3 class="feature-title">การแจ้งเตือน</h3>
                <p class="feature-description">รับแจ้งเตือนก่อนการทำงานตามกำหนดการ</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Security Page -->
        <div class="page" id="security">
          <div class="other-page-content">
            <h1 class="page-title">ความปลอดภัย</h1>
            <p class="page-subtitle">SECURITY SYSTEM</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3 class="feature-title">ล็อคอัจฉริยะ</h3>
                <p class="feature-description">ระบบล็อคประตูด้วยรหัสผ่าน ลายนิ้วมือ หรือใบหน้า</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">📹</div>
                <h3 class="feature-title">กล้องวงจรปิด</h3>
                <p class="feature-description">ดูภาพสดและบันทึกวิดีโอจากกล้องวงจรปิดผ่านมือถือ</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">🚨</div>
                <h3 class="feature-title">ระบบแจ้งเตือน</h3>
                <p class="feature-description">แจ้งเตือนเมื่อมีการบุกรุกหรือความผิดปกติ</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Profile Page -->
        <div class="page" id="profile">
          <div class="other-page-content">
            <h1 class="page-title">โปรไฟล์</h1>
            <p class="page-subtitle">USER PROFILE</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">👤</div>
                <h3 class="feature-title">ข้อมูลส่วนตัว</h3>
                <p class="feature-description">แก้ไขข้อมูลส่วนตัว เปลี่ยนรหัสผ่าน และจัดการข้อมูลติดต่อ</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">🏠</div>
                <h3 class="feature-title">ข้อมูลที่อยู่</h3>
                <p class="feature-description">จัดการข้อมูลที่อยู่และคุณสมบัติของบ้าน</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3 class="feature-title">สมาชิกครอบครัว</h3>
                <p class="feature-description">เพิ่มสมาชิกครอบครัวและกำหนดสิทธิ์การเข้าถึง</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Notifications Page -->
        <div class="page" id="notifications">
          <div class="other-page-content">
            <h1 class="page-title">การแจ้งเตือน</h1>
            <p class="page-subtitle">NOTIFICATION SETTINGS</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">🔔</div>
                <h3 class="feature-title">การแจ้งเตือนทั่วไป</h3>
                <p class="feature-description">ตั้งค่าการแจ้งเตือนสำหรับการใช้งานและระบบต่างๆ</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">⚠️</div>
                <h3 class="feature-title">แจ้งเตือนฉุกเฉิน</h3>
                <p class="feature-description">การแจ้งเตือนเมื่อมีเหตุการณ์ฉุกเฉินหรือความผิดปกติ</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">📧</div>
                <h3 class="feature-title">ช่องทางการติดต่อ</h3>
                <p class="feature-description">เลือกช่องทางการรับแจ้งเตือน SMS, Email หรือ Push Notification</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Settings Page -->
        <div class="page" id="settings">
          <div class="other-page-content">
            <h1 class="page-title">ตั้งค่าระบบ</h1>
            <p class="page-subtitle">SYSTEM SETTINGS</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">⚙️</div>
                <h3 class="feature-title">การตั้งค่าทั่วไป</h3>
                <p class="feature-description">ภาษา เขตเวลา และการตั้งค่าการแสดงผล</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">🌐</div>
                <h3 class="feature-title">การเชื่อมต่อ</h3>
                <p class="feature-description">ตั้งค่า Wi-Fi, Bluetooth และการเชื่อมต่ออุปกรณ์</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">🔄</div>
                <h3 class="feature-title">การสำรองข้อมูล</h3>
                <p class="feature-description">สำรองและกู้คืนข้อมูลการตั้งค่าและประวัติการใช้งาน</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Support Page -->
        <div class="page" id="support">
          <div class="other-page-content">
            <h1 class="page-title">ช่วยเหลือ</h1>
            <p class="page-subtitle">HELP & SUPPORT</p>
            
            <div class="feature-grid">
              <div class="feature-card">
                <div class="feature-icon">❓</div>
                <h3 class="feature-title">คำถามที่พบบ่อย</h3>
                <p class="feature-description">คำตอบสำหรับคำถามที่ผู้ใช้ถามบ่อยที่สุด</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">💬</div>
                <h3 class="feature-title">แชทสด</h3>
                <p class="feature-description">พูดคุยกับทีมสนับสนุนผ่านแชทสด 24/7</p>
              </div>
              <div class="feature-card">
                <div class="feature-icon">📞</div>
                <h3 class="feature-title">ติดต่อเรา</h3>
                <p class="feature-description">หมายเลขโทรศัพท์ อีเมล และช่องทางติดต่ออื่นๆ</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      let lightOn = false;
      let waterOn = false;
      let currentBalance = 1245;
      let selectedAmount = 0;
      let currentPage = 'dashboard';

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

      function showPage(pageId) {
        // Hide all pages
        document.querySelectorAll('.page').forEach(page => {
          page.classList.remove('active');
        });
        
        // Show selected page
        document.getElementById(pageId).classList.add('active');
        
        // Update menu active state
        document.querySelectorAll('.menu-item').forEach(item => {
          item.classList.remove('active');
        });
        event.target.closest('.menu-item').classList.add('active');
        
        // Close sidebar on mobile
        closeSidebar();
        
        currentPage = pageId;
      }

      // Device control functions
      function toggleLight() {
        const toggle = document.getElementById("lightToggle");
        const status = document.getElementById("light-status");
        const card = document.getElementById("lightCard");

        lightOn = !lightOn;

        if (lightOn) {
          toggle.classList.add("active");
          card.classList.add("active");
          if (status) status.textContent = "เปิดอยู่";
          updateElectricityUsage();
        } else {
          toggle.classList.remove("active");
          card.classList.remove("active");
          if (status) status.textContent = "ปิดอยู่";
        }
      }

      function toggleWater() {
        const toggle = document.getElementById("waterToggle");
        const status = document.getElementById("water-status");
        const card = document.getElementById("waterCard");

        waterOn = !waterOn;

        if (waterOn) {
          toggle.classList.add("active");
          card.classList.add("active");
          if (status) status.textContent = "เปิดอยู่";
          updateWaterUsage();
        } else {
          toggle.classList.remove("active");
          card.classList.remove("active");
          if (status) status.textContent = "ปิดอยู่";
        }
      }

      function updateElectricityUsage() {
        const dailyUnits = document.getElementById("daily-units");
        const dailyCost = document.getElementById("daily-cost");
        
        if (lightOn) {
          const baseUnits = 8.5;
          const randomIncrease = Math.random() * 2;
          const units = baseUnits + randomIncrease;
          const cost = Math.round(units * 4);
          
          if (dailyUnits) dailyUnits.textContent = units.toFixed(1);
          if (dailyCost) dailyCost.textContent = `฿${cost}`;
        }
      }

      function updateWaterUsage() {
        const waterUsage = document.getElementById("water-usage");
        const waterCost = document.getElementById("water-cost");
        
        if (waterOn) {
          const baseUsage = 12;
          const randomIncrease = Math.random() * 8;
          const usage = baseUsage + randomIncrease;
          const cost = Math.round(usage * 1.5);
          
          if (waterUsage) waterUsage.textContent = Math.round(usage);
          if (waterCost) waterCost.textContent = `฿${cost}`;
        }
      }

      function selectAmount(amount) {
        selectedAmount = amount;
        document.querySelectorAll(".amount-btn").forEach((btn) => {
          btn.classList.remove("selected");
        });
        if (event && event.target) {
          event.target.classList.add("selected");
        }
        const customAmountInput = document.getElementById("customAmount");
        if (customAmountInput) customAmountInput.value = "";
      }

      function topUp() {
        let amount = selectedAmount;
        if (!amount) {
          amount = parseInt(document.getElementById("customAmount").value) || 0;
        }

        if (amount > 0) {
          currentBalance += amount;
          updateBalance();

          // Reset selection
          selectedAmount = 0;
          document.querySelectorAll(".amount-btn").forEach((btn) => {
            btn.classList.remove("selected");
          });
          const customAmountInput = document.getElementById("customAmount");
          if (customAmountInput) customAmountInput.value = "";

          // Show success feedback
          const btn = document.querySelector(".topup-btn");
          if (btn) {
            const originalText = btn.textContent;
            btn.textContent = "เติมเงินสำเร็จ!";
            btn.style.background = "linear-gradient(135deg, #4ade80, #22c55e)";
            setTimeout(() => {
              btn.textContent = originalText;
              btn.style.background = "linear-gradient(135deg, #ff6b35, #ff8c42)";
            }, 2000);
          }
        }
      }

      function updateBalance() {
        const balanceElement = document.getElementById("balance");
        const statusElement = document.querySelector(".balance-status");

        if (balanceElement) {
          balanceElement.textContent = `฿${currentBalance.toLocaleString()}`;

          if (currentBalance >= 500) {
            balanceElement.className = "balance sufficient";
            if (statusElement) statusElement.textContent = "เพียงพอ";
          } else {
            balanceElement.className = "balance insufficient";
            if (statusElement) statusElement.textContent = "ไม่เพียงพอ";
          }
        }
      }

      // Real-time updates
      setInterval(() => {
        if (lightOn) {
          updateElectricityUsage();
        }
        if (waterOn) {
          updateWaterUsage();
        }
      }, 3000);

      // Balance deduction
      setInterval(() => {
        if (lightOn || waterOn) {
          const deduction = (lightOn ? 1.5 : 0) + (waterOn ? 1 : 0);
          currentBalance -= Math.random() * deduction;
          if (currentBalance < 0) currentBalance = 0;
          updateBalance();
        }
      }, 10000);

      // Demo initialization
      function initializeDemoData() {
        setTimeout(() => {
          if (!lightOn) toggleLight();
        }, 1000);
        
        setTimeout(() => {
          if (!waterOn) toggleWater();
        }, 2000);
        
        setTimeout(() => {
          if (lightOn) toggleLight();
          if (waterOn) toggleWater();
        }, 5000);
      }

      setTimeout(initializeDemoData, 500);

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
    </script>
  </body>
</html>