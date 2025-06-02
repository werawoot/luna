<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>การแจ้งเตือน - Luna Smart Home</title>
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
        background: radial-gradient(circle, rgba(255, 107, 53, 0.15) 0%, transparent 50%);
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
        background: radial-gradient(circle, rgba(255, 107, 53, 0.2), transparent);
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
      
      .notification-badge {
        display: inline-flex;
        align-items: center;
        background: rgba(255, 107, 53, 0.2);
        border: 1px solid rgba(255, 107, 53, 0.4);
        border-radius: 16px;
        padding: 8px 16px;
        gap: 8px;
        color: #ff6b35;
        font-size: 14px;
        font-weight: 500;
      }
      
      .notifications-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
      }
      
      /* Filter and Actions */
      .notification-controls {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
      }
      
      .control-group {
        display: flex;
        align-items: center;
        gap: 15px;
      }
      
      .filter-select {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        padding: 8px 12px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
        cursor: pointer;
      }
      
      .filter-select:focus {
        border-color: rgba(255, 107, 53, 0.4);
        background: rgba(255, 107, 53, 0.1);
      }
      
      .filter-select option {
        background: #1a1a1a;
        color: #fff;
      }
      
      .action-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.8);
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
      }
      
      .action-btn:hover {
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
        color: #ff6b35;
      }
      
      .action-btn.primary {
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border-color: transparent;
        color: #fff;
      }
      
      .action-btn.primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
      }
      
      /* Notification Summary */
      .notification-summary {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
      }
      
      .summary-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
      }
      
      .summary-card:hover {
        transform: translateY(-3px);
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
      }
      
      .summary-icon {
        font-size: 32px;
        margin-bottom: 12px;
        display: block;
      }
      
      .summary-value {
        font-size: 24px;
        font-weight: 600;
        color: #ff6b35;
        margin-bottom: 6px;
        text-shadow: 0 0 15px rgba(255, 107, 53, 0.3);
      }
      
      .summary-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.6);
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      
      /* Notification List */
      .notifications-list {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
        margin-bottom: 30px;
      }
      
      .list-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }
      
      .list-title {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
      }
      
      .list-count {
        color: rgba(255, 255, 255, 0.6);
        font-size: 14px;
      }
      
      .notification-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 20px;
        margin-bottom: 15px;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 16px;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
      }
      
      .notification-item:hover {
        background: rgba(255, 107, 53, 0.05);
        border-color: rgba(255, 107, 53, 0.2);
        transform: translateX(5px);
      }
      
      .notification-item.unread {
        border-left: 4px solid #ff6b35;
        background: rgba(255, 107, 53, 0.03);
      }
      
      .notification-item.unread::before {
        content: '';
        position: absolute;
        top: 20px;
        right: 20px;
        width: 8px;
        height: 8px;
        background: #ff6b35;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(255, 107, 53, 0.6);
      }
      
      .notification-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: #fff;
        flex-shrink: 0;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      }
      
      .notification-icon.info {
        background: linear-gradient(135deg, #3b82f6, #60a5fa);
      }
      
      .notification-icon.warning {
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
      }
      
      .notification-icon.success {
        background: linear-gradient(135deg, #10b981, #34d399);
      }
      
      .notification-icon.error {
        background: linear-gradient(135deg, #ef4444, #f87171);
      }
      
      .notification-icon.system {
        background: linear-gradient(135deg, #8b5cf6, #a78bfa);
      }
      
      .notification-content {
        flex: 1;
        min-width: 0;
      }
      
      .notification-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 8px;
        gap: 10px;
      }
      
      .notification-title {
        color: #fff;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 4px;
      }
      
      .notification-time {
        color: rgba(255, 255, 255, 0.5);
        font-size: 12px;
        white-space: nowrap;
      }
      
      .notification-message {
        color: rgba(255, 255, 255, 0.7);
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 10px;
      }
      
      .notification-category {
        display: inline-block;
        background: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.8);
        font-size: 11px;
        padding: 4px 8px;
        border-radius: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      
      .notification-actions {
        display: flex;
        gap: 8px;
        margin-top: 12px;
      }
      
      .notification-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 6px;
        color: rgba(255, 255, 255, 0.8);
        padding: 6px 12px;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .notification-btn:hover {
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
        color: #ff6b35;
      }
      
      .notification-btn.primary {
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border-color: transparent;
        color: #fff;
      }
      
      .notification-btn.primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
      }
      
      /* Empty State */
      .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: rgba(255, 255, 255, 0.5);
      }
      
      .empty-icon {
        font-size: 64px;
        margin-bottom: 20px;
        display: block;
        opacity: 0.5;
      }
      
      .empty-title {
        font-size: 18px;
        margin-bottom: 10px;
        color: rgba(255, 255, 255, 0.7);
      }
      
      .empty-message {
        font-size: 14px;
        line-height: 1.5;
      }
      
      /* Pagination */
      .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-top: 30px;
      }
      
      .pagination-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.8);
        padding: 8px 12px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .pagination-btn:hover,
      .pagination-btn.active {
        background: rgba(255, 107, 53, 0.2);
        border-color: rgba(255, 107, 53, 0.4);
        color: #ff6b35;
      }
      
      .pagination-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
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
        
        .notification-controls {
          flex-direction: column;
          align-items: stretch;
        }
        
        .control-group {
          justify-content: space-between;
        }
        
        .notification-summary {
          grid-template-columns: repeat(2, 1fr);
        }
        
        .notification-item {
          flex-direction: column;
          gap: 10px;
        }
        
        .notification-header {
          flex-direction: column;
          align-items: flex-start;
        }
        
        .page-title {
          font-size: 28px;
        }
      }
      
      @media (max-width: 480px) {
        .notification-summary {
          grid-template-columns: 1fr;
        }
        
        .quick-actions {
          grid-template-columns: repeat(2, 1fr);
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
            <div class="sidebar-title">ระบบอัตโนมัติ</div>
            <div class="menu-item" onclick="window.location.href='automation.php'">
              <span class="menu-icon">🤖</span>
              <span>ระบบอัตโนมัติ</span>
            </div>
            <div class="menu-item" onclick="window.location.href='schedule.php'">
              <span class="menu-icon">⏰</span>
              <span>กำหนดการ</span>
            </div>
            <div class="menu-item" onclick="window.location.href='security.php'">
              <span class="menu-icon">🔒</span>
              <span>ความปลอดภัย</span>
            </div>
          </div>

          <div class="sidebar-section">
            <div class="sidebar-title">ตั้งค่า</div>
            <div class="menu-item" onclick="window.location.href='profile.php'">
              <span class="menu-icon">👤</span>
              <span>โปรไฟล์</span>
            </div>
            <div class="menu-item active">
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

      <div class="content-wrapper">
        <div class="page-header">
          <h1 class="page-title">การแจ้งเตือน</h1>
          <p class="page-subtitle">NOTIFICATIONS</p>
          <div class="notification-badge">
            <span>🔔</span>
            <span id="unreadCount">5 ข้อความใหม่</span>
          </div>
        </div>

        <div class="notifications-container">
          <!-- Summary Cards -->
          <div class="notification-summary">
            <div class="summary-card">
              <span class="summary-icon">📩</span>
              <div class="summary-value" id="totalNotifications">12</div>
              <div class="summary-label">การแจ้งเตือนทั้งหมด</div>
            </div>
            
            <div class="summary-card">
              <span class="summary-icon">🆕</span>
              <div class="summary-value" id="unreadNotifications">5</div>
              <div class="summary-label">ยังไม่ได้อ่าน</div>
            </div>
            
            <div class="summary-card">
              <span class="summary-icon">⚠️</span>
              <div class="summary-value" id="urgentNotifications">2</div>
              <div class="summary-label">เร่งด่วน</div>
            </div>
            
            <div class="summary-card">
              <span class="summary-icon">📱</span>
              <div class="summary-value" id="systemNotifications">8</div>
              <div class="summary-label">ระบบ</div>
            </div>
          </div>

          <!-- Controls -->
          <div class="notification-controls">
            <div class="control-group">
              <select class="filter-select" id="typeFilter">
                <option value="all">ประเภททั้งหมด</option>
                <option value="system">ระบบ</option>
                <option value="billing">การเงิน</option>
                <option value="security">ความปลอดภัย</option>
                <option value="maintenance">บำรุงรักษา</option>
                <option value="announcement">ประกาศ</option>
              </select>
              
              <select class="filter-select" id="statusFilter">
                <option value="all">สถานะทั้งหมด</option>
                <option value="unread">ยังไม่ได้อ่าน</option>
                <option value="read">อ่านแล้ว</option>
              </select>
            </div>
            
            <div class="control-group">
              <button class="action-btn" onclick="markAllAsRead()">
                <span>✓</span>
                อ่านทั้งหมด
              </button>
              <button class="action-btn" onclick="deleteAllRead()">
                <span>🗑️</span>
                ลบที่อ่านแล้ว
              </button>
              <button class="action-btn primary" onclick="refreshNotifications()">
                <span>🔄</span>
                รีเฟรช
              </button>
            </div>
          </div>

          <!-- Notifications List -->
          <div class="notifications-list">
            <div class="list-header">
              <h3 class="list-title">การแจ้งเตือนล่าสุด</h3>
              <span class="list-count" id="listCount">แสดง 12 รายการ</span>
            </div>
            
            <div id="notificationsList">
              <!-- Notifications will be populated by JavaScript -->
            </div>
            
            <div class="pagination" id="pagination">
              <!-- Pagination will be populated by JavaScript -->
            </div>
          </div>



    <script>
      let currentUser = null;
      let currentPage = 1;
      const itemsPerPage = 8;
      let filteredNotifications = [];
      
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
      
      // ข้อมูลตัวอย่างการแจ้งเตือน
      const notificationsData = [
        {
          id: 1,
          type: 'billing',
          title: 'ใบแจ้งหนี้ประจำเดือน',
          message: 'ใบแจ้งหนี้เดือนพฤษภาคม 2024 มีจำนวน ฿485 กรุณาชำระภายในวันที่ 5 มิถุนายน',
          time: '2 นาทีที่แล้ว',
          timestamp: Date.now() - 120000,
          isRead: false,
          category: 'การเงิน',
          priority: 'high'
        },
        {
          id: 2,
          type: 'system',
          title: 'การบำรุงรักษาระบบ',
          message: 'ระบบจะหยุดให้บริการชั่วคราวในวันอาทิตย์ที่ 2 มิถุนายน เวลา 02:00-04:00 น.',
          time: '1 ชั่วโมงที่แล้ว',
          timestamp: Date.now() - 3600000,
          isRead: false,
          category: 'ระบบ',
          priority: 'medium'
        },
        {
          id: 3,
          type: 'security',
          title: 'การเข้าสู่ระบบใหม่',
          message: 'มีการเข้าสู่ระบบจากอุปกรณ์ใหม่: iPhone (192.168.1.105)',
          time: '3 ชั่วโมงที่แล้ว',
          timestamp: Date.now() - 10800000,
          isRead: true,
          category: 'ความปลอดภัย',
          priority: 'medium'
        },
        {
          id: 4,
          type: 'success',
          title: 'ชำระเงินสำเร็จ',
          message: 'การชำระเงินสำหรับบิล LN-2024-001 จำนวน ฿520 เสร็จสิ้นแล้ว',
          time: '1 วันที่แล้ว',
          timestamp: Date.now() - 86400000,
          isRead: true,
          category: 'การเงิน',
          priority: 'low'
        },
        {
          id: 5,
          type: 'warning',
          title: 'การใช้ไฟฟ้าสูงกว่าปกติ',
          message: 'การใช้ไฟฟ้าของคุณสูงกว่าค่าเฉลี่ย 25% ในสัปดาห์นี้',
          time: '2 วันที่แล้ว',
          timestamp: Date.now() - 172800000,
          isRead: false,
          category: 'พลังงาน',
          priority: 'medium'
        },
        {
          id: 6,
          type: 'announcement',
          title: 'ประกาศปรับปรุงสิ่งอำนวยความสะดวก',
          message: 'หอพักจะมีการปรับปรุงระบบ Wi-Fi และเพิ่มจุดชาร์จรถยนต์ไฟฟ้าในเดือนมิถุนายน',
          time: '3 วันที่แล้ว',
          timestamp: Date.now() - 259200000,
          isRead: true,
          category: 'ประกาศ',
          priority: 'low'
        },
        {
          id: 7,
          type: 'maintenance',
          title: 'การตรวจสอบระบบน้ำ',
          message: 'ทีมช่างจะตรวจสอบระบบน้ำประปาในวันพุธ เวลา 10:00-12:00 น.',
          time: '4 วันที่แล้ว',
          timestamp: Date.now() - 345600000,
          isRead: false,
          category: 'บำรุงรักษา',
          priority: 'medium'
        },
        {
          id: 8,
          type: 'info',
          title: 'อัปเดตแอปพลิเคชัน',
          message: 'แอป Luna Smart Home เวอร์ชันใหม่ 2.1.0 พร้อมให้ดาวน์โหลดแล้ว',
          time: '5 วันที่แล้ว',
          timestamp: Date.now() - 432000000,
          isRead: true,
          category: 'ระบบ',
          priority: 'low'
        },
        {
          id: 9,
          type: 'error',
          title: 'ปัญหาการเชื่อมต่อ',
          message: 'อุปกรณ์ IoT ในห้องของคุณมีปัญหาการเชื่อมต่อ กรุณาตรวจสอบ',
          time: '1 สัปดาห์ที่แล้ว',
          timestamp: Date.now() - 604800000,
          isRead: false,
          category: 'เทคนิค',
          priority: 'high'
        },
        {
          id: 10,
          type: 'system',
          title: 'รีเซ็ตรหัสผ่าน',
          message: 'มีการร้องขอรีเซ็ตรหัสผ่านสำหรับบัญชีของคุณ',
          time: '1 สัปดาห์ที่แล้ว',
          timestamp: Date.now() - 691200000,
          isRead: true,
          category: 'ความปลอดภัย',
          priority: 'medium'
        },
        {
          id: 11,
          type: 'success',
          title: 'การติดตั้งอุปกรณ์สำเร็จ',
          message: 'การติดตั้งเซ็นเซอร์อุณหภูมิในห้องของคุณเสร็จสิ้นแล้ว',
          time: '2 สัปดาห์ที่แล้ว',
          timestamp: Date.now() - 1209600000,
          isRead: true,
          category: 'ระบบ',
          priority: 'low'
        },
        {
          id: 12,
          type: 'billing',
          title: 'ใบเสร็จการชำระเงิน',
          message: 'ใบเสร็จสำหรับการชำระเงินเดือนเมษายน พร้อมดาวน์โหลดแล้ว',
          time: '3 สัปดาห์ที่แล้ว',
          timestamp: Date.now() - 1814400000,
          isRead: true,
          category: 'การเงิน',
          priority: 'low'
        }
      ];

      // เริ่มต้นเมื่อหน้าเว็บโหลดเสร็จ
      window.addEventListener('load', function() {
        // เริ่มต้นการแจ้งเตือน
        filteredNotifications = [...notificationsData];
        updateSummary();
        renderNotifications();
        setupEventListeners();
        
        // แสดงข้อความต้อนรับ
        setTimeout(() => {
          showNotification('ยินดีต้อนรับสู่หน้าการแจ้งเตือน');
        }, 1000);
        
        // จำลองการแจ้งเตือนใหม่
        startNotificationSimulation();
      });

      // ตั้งค่า Event Listeners
      function setupEventListeners() {
        document.getElementById('typeFilter').addEventListener('change', filterNotifications);
        document.getElementById('statusFilter').addEventListener('change', filterNotifications);
      }

      // อัปเดตสรุปการแจ้งเตือน
      function updateSummary() {
        const total = notificationsData.length;
        const unread = notificationsData.filter(n => !n.isRead).length;
        const urgent = notificationsData.filter(n => n.priority === 'high').length;
        const system = notificationsData.filter(n => n.type === 'system').length;
        
        document.getElementById('totalNotifications').textContent = total;
        document.getElementById('unreadNotifications').textContent = unread;
        document.getElementById('urgentNotifications').textContent = urgent;
        document.getElementById('systemNotifications').textContent = system;
        document.getElementById('unreadCount').textContent = `${unread} ข้อความใหม่`;
      }

      // กรองการแจ้งเตือน
      function filterNotifications() {
        const typeFilter = document.getElementById('typeFilter').value;
        const statusFilter = document.getElementById('statusFilter').value;
        
        filteredNotifications = notificationsData.filter(notification => {
          const matchType = typeFilter === 'all' || notification.category.toLowerCase().includes(typeFilter) || notification.type === typeFilter;
          const matchStatus = statusFilter === 'all' || 
                              (statusFilter === 'unread' && !notification.isRead) ||
                              (statusFilter === 'read' && notification.isRead);
          
          return matchType && matchStatus;
        });
        
        currentPage = 1;
        renderNotifications();
        updateListCount();
        showNotification(`พบการแจ้งเตือน ${filteredNotifications.length} รายการ`);
      }

      // แสดงการแจ้งเตือน
      function renderNotifications() {
        const container = document.getElementById('notificationsList');
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const currentNotifications = filteredNotifications.slice(startIndex, endIndex);
        
        if (currentNotifications.length === 0) {
          container.innerHTML = `
            <div class="empty-state">
              <span class="empty-icon">📭</span>
              <div class="empty-title">ไม่มีการแจ้งเตือน</div>
              <div class="empty-message">ไม่พบการแจ้งเตือนที่ตรงกับเงื่อนไขที่เลือก</div>
            </div>
          `;
          document.getElementById('pagination').innerHTML = '';
          return;
        }
        
        container.innerHTML = '';
        
        currentNotifications.forEach(notification => {
          const notificationElement = document.createElement('div');
          notificationElement.className = `notification-item ${!notification.isRead ? 'unread' : ''}`;
          notificationElement.onclick = () => markAsRead(notification.id);
          
          notificationElement.innerHTML = `
            <div class="notification-icon ${notification.type}">
              ${getNotificationIcon(notification.type)}
            </div>
            <div class="notification-content">
              <div class="notification-header">
                <div class="notification-title">${notification.title}</div>
                <div class="notification-time">${notification.time}</div>
              </div>
              <div class="notification-message">${notification.message}</div>
              <div class="notification-category">${notification.category}</div>
              ${getNotificationActions(notification)}
            </div>
          `;
          
          container.appendChild(notificationElement);
        });
        
        renderPagination();
      }

      // ได้ไอคอนการแจ้งเตือน
      function getNotificationIcon(type) {
        const icons = {
          info: 'ℹ️',
          warning: '⚠️',
          success: '✅',
          error: '❌',
          system: '⚙️',
          billing: '💳',
          security: '🔒',
          maintenance: '🔧',
          announcement: '📢'
        };
        return icons[type] || '📩';
      }

      // ได้ปุ่มการดำเนินการ
      function getNotificationActions(notification) {
        let actions = '';
        
        switch (notification.type) {
          case 'billing':
            actions = `
              <div class="notification-actions">
                <button class="notification-btn primary" onclick="event.stopPropagation(); payBill(${notification.id})">ชำระเงิน</button>
                <button class="notification-btn" onclick="event.stopPropagation(); viewBill(${notification.id})">ดูรายละเอียด</button>
              </div>
            `;
            break;
          case 'security':
            actions = `
              <div class="notification-actions">
                <button class="notification-btn primary" onclick="event.stopPropagation(); reviewSecurity(${notification.id})">ตรวจสอบ</button>
                <button class="notification-btn" onclick="event.stopPropagation(); dismissNotification(${notification.id})">ยกเลิก</button>
              </div>
            `;
            break;
          case 'error':
            actions = `
              <div class="notification-actions">
                <button class="notification-btn primary" onclick="event.stopPropagation(); fixIssue(${notification.id})">แก้ไขปัญหา</button>
                <button class="notification-btn" onclick="event.stopPropagation(); contactSupport()">ติดต่อช่าง</button>
              </div>
            `;
            break;
          case 'info':
          case 'announcement':
            actions = `
              <div class="notification-actions">
                <button class="notification-btn" onclick="event.stopPropagation(); viewDetails(${notification.id})">ดูรายละเอียด</button>
              </div>
            `;
            break;
        }
        
        return actions;
      }

      // แสดง Pagination
      function renderPagination() {
        const pagination = document.getElementById('pagination');
        const totalPages = Math.ceil(filteredNotifications.length / itemsPerPage);
        
        if (totalPages <= 1) {
          pagination.innerHTML = '';
          return;
        }
        
        pagination.innerHTML = '';
        
        // ปุ่มก่อนหน้า
        const prevBtn = document.createElement('button');
        prevBtn.className = 'pagination-btn';
        prevBtn.textContent = '‹ ก่อนหน้า';
        prevBtn.disabled = currentPage === 1;
        prevBtn.onclick = () => changePage(currentPage - 1);
        pagination.appendChild(prevBtn);
        
        // หมายเลขหน้า
        const startPage = Math.max(1, currentPage - 2);
        const endPage = Math.min(totalPages, startPage + 4);
        
        for (let i = startPage; i <= endPage; i++) {
          const pageBtn = document.createElement('button');
          pageBtn.className = `pagination-btn ${i === currentPage ? 'active' : ''}`;
          pageBtn.textContent = i;
          pageBtn.onclick = () => changePage(i);
          pagination.appendChild(pageBtn);
        }
        
        // ปุ่มถัดไป
        const nextBtn = document.createElement('button');
        nextBtn.className = 'pagination-btn';
        nextBtn.textContent = 'ถัดไป ›';
        nextBtn.disabled = currentPage === totalPages;
        nextBtn.onclick = () => changePage(currentPage + 1);
        pagination.appendChild(nextBtn);
      }

      // เปลี่ยนหน้า
      function changePage(page) {
        const totalPages = Math.ceil(filteredNotifications.length / itemsPerPage);
        if (page >= 1 && page <= totalPages) {
          currentPage = page;
          renderNotifications();
        }
      }

      // อัปเดตจำนวนรายการ
      function updateListCount() {
        document.getElementById('listCount').textContent = `แสดง ${filteredNotifications.length} รายการ`;
      }

      // ฟังก์ชันการดำเนินการต่างๆ
      function markAsRead(notificationId) {
        const notification = notificationsData.find(n => n.id === notificationId);
        if (notification && !notification.isRead) {
          notification.isRead = true;
          updateSummary();
          renderNotifications();
          showNotification('ทำเครื่องหมายอ่านแล้ว');
        }
      }

      function markAllAsRead() {
        const unreadCount = notificationsData.filter(n => !n.isRead).length;
        notificationsData.forEach(n => n.isRead = true);
        updateSummary();
        renderNotifications();
        showNotification(`ทำเครื่องหมายอ่านแล้ว ${unreadCount} รายการ`);
      }

      function deleteAllRead() {
        const readCount = notificationsData.filter(n => n.isRead).length;
        for (let i = notificationsData.length - 1; i >= 0; i--) {
          if (notificationsData[i].isRead) {
            notificationsData.splice(i, 1);
          }
        }
        filteredNotifications = [...notificationsData];
        updateSummary();
        renderNotifications();
        updateListCount();
        showNotification(`ลบการแจ้งเตือนที่อ่านแล้ว ${readCount} รายการ`);
      }

      function refreshNotifications() {
        showNotification('กำลังรีเฟรชการแจ้งเตือน...');
        
        // จำลองการโหลดข้อมูลใหม่
        setTimeout(() => {
          // เพิ่มการแจ้งเตือนใหม่
          addNewNotification();
          updateSummary();
          renderNotifications();
          updateListCount();
          showNotification('รีเฟรชการแจ้งเตือนสำเร็จ!');
        }, 1500);
      }

      function dismissNotification(notificationId) {
        const index = notificationsData.findIndex(n => n.id === notificationId);
        if (index !== -1) {
          notificationsData.splice(index, 1);
          filteredNotifications = [...notificationsData];
          updateSummary();
          renderNotifications();
          updateListCount();
          showNotification('ลบการแจ้งเตือนแล้ว');
        }
      }

      // ฟังก์ชันการดำเนินการเฉพาะ
      function payBill(notificationId) {
        showNotification('เปิดหน้าชำระเงิน');
        markAsRead(notificationId);
      }

      function viewBill(notificationId) {
        showNotification('แสดงรายละเอียดใบแจ้งหนี้');
        markAsRead(notificationId);
      }

      function reviewSecurity(notificationId) {
        showNotification('ตรวจสอบการรักษาความปลอดภัย');
        markAsRead(notificationId);
      }

      function fixIssue(notificationId) {
        showNotification('เริ่มกระบวนการแก้ไขปัญหา');
        markAsRead(notificationId);
      }

      function viewDetails(notificationId) {
        showNotification('แสดงรายละเอียดเพิ่มเติม');
        markAsRead(notificationId);
      }

      // ฟังก์ชัน Quick Actions
      function openSettings() {
        showNotification('เปิดหน้าตั้งค่าการแจ้งเตือน');
      }

      function viewBilling() {
        showNotification('เปิดหน้าใบแจ้งหนี้');
      }

      function contactSupport() {
        showNotification('เปิดหน้าติดต่อฝ่ายสนับสนุน');
      }

      function goToDashboard() {
        showNotification('กลับไปยังแดชบอร์ด');
      }

      // จำลองการแจ้งเตือนใหม่
      function startNotificationSimulation() {
        setInterval(() => {
          if (Math.random() < 0.3) { // 30% โอกาสในการได้รับการแจ้งเตือนใหม่
            addNewNotification();
          }
        }, 30000); // ทุก 30 วินาที
      }

      function addNewNotification() {
        const newNotifications = [
          {
            type: 'info',
            title: 'อัปเดตระบบ',
            message: 'ระบบได้รับการอัปเดตเวอร์ชันใหม่เรียบร้อยแล้ว',
            category: 'ระบบ',
            priority: 'low'
          },
          {
            type: 'warning',
            title: 'การใช้น้ำสูง',
            message: 'การใช้น้ำของคุณสูงกว่าปกติ กรุณาตรวจสอบ',
            category: 'พลังงาน',
            priority: 'medium'
          },
          {
            type: 'success',
            title: 'การชำระเงินสำเร็จ',
            message: 'การชำระเงินผ่านระบบอัตโนมัติเสร็จสิ้นแล้ว',
            category: 'การเงิน',
            priority: 'low'
          }
        ];
        
        const randomNotification = newNotifications[Math.floor(Math.random() * newNotifications.length)];
        const newId = Math.max(...notificationsData.map(n => n.id)) + 1;
        
        const notification = {
          id: newId,
          ...randomNotification,
          time: 'เมื่อสักครู่',
          timestamp: Date.now(),
          isRead: false
        };
        
        notificationsData.unshift(notification);
        filteredNotifications = [...notificationsData];
        updateSummary();
        
        // แสดงการแจ้งเตือนใหม่
        showNotification(`📬 การแจ้งเตือนใหม่: ${notification.title}`, 'info');
        
        // อัปเดตการแสดงผลถ้าอยู่หน้าแรก
        if (currentPage === 1) {
          renderNotifications();
        }
      }

      // แสดงการแจ้งเตือน Toast
      function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.style.cssText = `
          position: fixed;
          top: 90px;
          right: 20px;
          background: ${type === 'error' ? 'rgba(239, 68, 68, 0.9)' : 
                       type === 'info' ? 'rgba(59, 130, 246, 0.9)' : 
                       'rgba(255, 107, 53, 0.9)'};
          color: white;
          padding: 15px 20px;
          border-radius: 8px;
          z-index: 10000;
          font-size: 14px;
          backdrop-filter: blur(10px);
          border: 1px solid ${type === 'error' ? 'rgba(239, 68, 68, 0.3)' : 
                              type === 'info' ? 'rgba(59, 130, 246, 0.3)' :
                              'rgba(255, 107, 53, 0.3)'};
          animation: slideIn 0.3s ease-out;
          max-width: 300px;
          box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        `;
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => {
          notification.style.animation = 'slideOut 0.3s ease-in forwards';
          setTimeout(() => notification.remove(), 300);
        }, 4000);
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

      // เพิ่ม CSS สำหรับแอนิเมชันการแจ้งเตือน
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