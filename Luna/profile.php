<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>โปรไฟล์ผู้ใช้ - Luna Smart Home</title>
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
      
      .profile-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 30px;
      }
      
      /* Profile Card */
      .profile-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
        text-align: center;
        height: fit-content;
        position: sticky;
        top: 100px;
      }
      
      .profile-avatar {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 48px;
        color: #fff;
        box-shadow: 0 8px 32px rgba(255, 107, 53, 0.4);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .profile-avatar:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 40px rgba(255, 107, 53, 0.6);
      }
      
      .avatar-upload {
        position: absolute;
        bottom: 0;
        right: 0;
        background: #fff;
        color: #ff6b35;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        border: 3px solid #1a1a1a;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .avatar-upload:hover {
        background: #ff6b35;
        color: #fff;
      }
      
      .profile-name {
        color: #fff;
        font-size: 24px;
        font-weight: 500;
        margin-bottom: 8px;
      }
      
      .profile-role {
        color: rgba(255, 255, 255, 0.6);
        font-size: 14px;
        margin-bottom: 20px;
      }
      
      .profile-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 25px;
      }
      
      .stat-item {
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
        padding: 15px;
        border: 1px solid rgba(255, 255, 255, 0.05);
      }
      
      .stat-value {
        font-size: 20px;
        font-weight: 600;
        color: #ff6b35;
        margin-bottom: 5px;
      }
      
      .stat-label {
        font-size: 11px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      
      .profile-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }
      
      .action-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        color: #fff;
        padding: 12px 20px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
      }
      
      .action-btn:hover {
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
        color: #ff6b35;
        transform: translateY(-2px);
      }
      
      .action-btn.primary {
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border-color: transparent;
      }
      
      .action-btn.primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
      }
      
      /* Content Area */
      .profile-content {
        display: flex;
        flex-direction: column;
        gap: 30px;
      }
      
      .content-section {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
      }
      
      .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
      }
      
      .section-title {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      
      .section-icon {
        font-size: 24px;
      }
      
      .edit-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.8);
        padding: 8px 16px;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .edit-btn:hover {
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
        color: #ff6b35;
      }
      
      /* Form Styles */
      .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
      }
      
      .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
      }
      
      .form-label {
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
        font-weight: 500;
      }
      
      .form-input {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        padding: 12px 16px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
      }
      
      .form-input:focus {
        border-color: rgba(255, 107, 53, 0.4);
        background: rgba(255, 107, 53, 0.1);
        box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
      }
      
      .form-input::placeholder {
        color: rgba(255, 255, 255, 0.4);
      }
      
      .form-input:disabled {
        opacity: 0.6;
        cursor: not-allowed;
      }
      
      .form-select {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        padding: 12px 16px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
        cursor: pointer;
      }
      
      .form-select:focus {
        border-color: rgba(255, 107, 53, 0.4);
        background: rgba(255, 107, 53, 0.1);
      }
      
      .form-select option {
        background: #1a1a1a;
        color: #fff;
      }
      
      .form-textarea {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        padding: 12px 16px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
        resize: vertical;
        min-height: 100px;
        font-family: inherit;
      }
      
      .form-textarea:focus {
        border-color: rgba(255, 107, 53, 0.4);
        background: rgba(255, 107, 53, 0.1);
        box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
      }
      
      .form-textarea::placeholder {
        color: rgba(255, 255, 255, 0.4);
      }
      
      /* Toggle Switch */
      .toggle-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }
      
      .toggle-group:last-child {
        border-bottom: none;
      }
      
      .toggle-label {
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
      }
      
      .toggle-desc {
        color: rgba(255, 255, 255, 0.5);
        font-size: 12px;
        margin-top: 4px;
      }
      
      .toggle-switch {
        position: relative;
        width: 50px;
        height: 26px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 13px;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .toggle-switch.active {
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
      }
      
      .toggle-slider {
        position: absolute;
        top: 2px;
        left: 2px;
        width: 22px;
        height: 22px;
        background: #fff;
        border-radius: 50%;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      }
      
      .toggle-switch.active .toggle-slider {
        left: 26px;
      }
      
      /* Activity Timeline */
      .activity-timeline {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }
      
      .activity-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 15px;
        background: rgba(255, 255, 255, 0.02);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
      }
      
      .activity-item:hover {
        background: rgba(255, 107, 53, 0.05);
        border-color: rgba(255, 107, 53, 0.2);
      }
      
      .activity-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: #fff;
        flex-shrink: 0;
      }
      
      .activity-content {
        flex: 1;
      }
      
      .activity-title {
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 4px;
      }
      
      .activity-desc {
        color: rgba(255, 255, 255, 0.6);
        font-size: 12px;
        margin-bottom: 8px;
      }
      
      .activity-time {
        color: rgba(255, 255, 255, 0.4);
        font-size: 11px;
      }
      
      /* Save Changes */
      .save-section {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        padding: 20px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 20px;
      }
      
      .btn-cancel {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.8);
        padding: 12px 24px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .btn-cancel:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
      }
      
      .btn-save {
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border: none;
        border-radius: 8px;
        color: #fff;
        padding: 12px 24px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
      }
      
      /* Responsive */
      @media (max-width: 768px) {
        .sidebar {
          width: 100vw;
          right: -100vw;
        }
        
        .profile-container {
          grid-template-columns: 1fr;
          gap: 20px;
        }
        
        .profile-card {
          position: static;
        }
        
        .form-grid {
          grid-template-columns: 1fr;
        }
        
        .page-title {
          font-size: 28px;
        }
        
        .save-section {
          flex-direction: column;
        }
        
        .profile-stats {
          grid-template-columns: 1fr;
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
            <div class="sidebar-title">ตั้งค่า</div>
            <div class="menu-item active">
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

      <div class="content-wrapper">
        <div class="page-header">
          <h1 class="page-title">โปรไฟล์ผู้ใช้</h1>
          <p class="page-subtitle">USER PROFILE</p>
        </div>

        <div class="profile-container">
          <!-- Profile Card -->
          <div class="profile-card">
            <div class="profile-avatar" onclick="changeAvatar()">
              <span id="avatarText">👤</span>
              <div class="avatar-upload">📷</div>
            </div>
            
            <div class="profile-name" id="profileName">นายสมชาย ใจดี</div>
            <div class="profile-role">ผู้เช่าห้อง A-205</div>
            
            <div class="profile-stats">
              <div class="stat-item">
                <div class="stat-value">6</div>
                <div class="stat-label">เดือนที่พัก</div>
              </div>
              <div class="stat-item">
                <div class="stat-value">₿485</div>
                <div class="stat-label">ค้างชำระ</div>
              </div>
              <div class="stat-item">
                <div class="stat-value">98%</div>
                <div class="stat-label">ออนไลน์</div>
              </div>
              <div class="stat-item">
                <div class="stat-value">5</div>
                <div class="stat-label">อุปกรณ์</div>
              </div>
            </div>
            
            <div class="profile-actions">
              <button class="action-btn primary" onclick="editProfile()">
                <span>✏️</span>
                แก้ไขโปรไฟล์
              </button>
              <button class="action-btn" onclick="changePassword()">
                <span>🔒</span>
                เปลี่ยนรหัสผ่าน
              </button>
              <button class="action-btn" onclick="downloadData()">
                <span>📄</span>
                ดาวน์โหลดข้อมูล
              </button>
            </div>
          </div>

          <!-- Content Area -->
          <div class="profile-content">
            <!-- Personal Information -->
            <div class="content-section">
              <div class="section-header">
                <h3 class="section-title">
                  <span class="section-icon">👤</span>
                  ข้อมูลส่วนตัว
                </h3>
                <button class="edit-btn" onclick="toggleEdit('personal')">แก้ไข</button>
              </div>
              
              <div class="form-grid">
                <div class="form-group">
                  <label class="form-label">ชื่อ-นามสกุล</label>
                  <input type="text" class="form-input" id="fullName" value="นายสมชาย ใจดี" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">อีเมล</label>
                  <input type="email" class="form-input" id="email" value="somchai.jaidee@email.com" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">เบอร์โทรศัพท์</label>
                  <input type="tel" class="form-input" id="phone" value="086-123-4567" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">วันเกิด</label>
                  <input type="date" class="form-input" id="birthdate" value="1990-05-15" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">เลขบัตรประชาชน</label>
                  <input type="text" class="form-input" id="idCard" value="1-2345-67890-12-3" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">อาชีพ</label>
                  <input type="text" class="form-input" id="occupation" value="พนักงานบริษัท" disabled>
                </div>
              </div>
              
              <div class="form-group" style="margin-top: 20px;">
                <label class="form-label">ที่อยู่</label>
                <textarea class="form-textarea" id="address" disabled placeholder="ที่อยู่ปัจจุบัน">123/45 ถนนสุขุมวิท แขวงคลองตัน เขตวัฒนา กรุงเทพมหานคร 10110</textarea>
              </div>
            </div>

            <!-- Room Information -->
            <div class="content-section">
              <div class="section-header">
                <h3 class="section-title">
                  <span class="section-icon">🏠</span>
                  ข้อมูลห้องพัก
                </h3>
              </div>
              
              <div class="form-grid">
                <div class="form-group">
                  <label class="form-label">หมายเลขห้อง</label>
                  <input type="text" class="form-input" value="A-205" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">ประเภทห้อง</label>
                  <input type="text" class="form-input" value="ห้องเดี่ยว พร้อมห้องน้ำในตัว" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">วันที่เข้าพัก</label>
                  <input type="date" class="form-input" value="2023-12-01" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">สัญญาหมดอายุ</label>
                  <input type="date" class="form-input" value="2024-11-30" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">ค่าเช่ารายเดือน</label>
                  <input type="text" class="form-input" value="฿8,500" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">ค่าประกันความเสียหาย</label>
                  <input type="text" class="form-input" value="฿17,000" disabled>
                </div>
              </div>
            </div>

            <!-- Emergency Contact -->
            <div class="content-section">
              <div class="section-header">
                <h3 class="section-title">
                  <span class="section-icon">🚨</span>
                  ผู้ติดต่อฉุกเฉิน
                </h3>
                <button class="edit-btn" onclick="toggleEdit('emergency')">แก้ไข</button>
              </div>
              
              <div class="form-grid">
                <div class="form-group">
                  <label class="form-label">ชื่อ-นามสกุล</label>
                  <input type="text" class="form-input" id="emergencyName" value="นางสมใส ใจดี" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">ความสัมพันธ์</label>
                  <select class="form-select" id="emergencyRelation" disabled>
                    <option value="mother" selected>แม่</option>
                    <option value="father">พ่อ</option>
                    <option value="sibling">พี่น้อง</option>
                    <option value="spouse">คู่สมรส</option>
                    <option value="friend">เพื่อน</option>
                    <option value="other">อื่นๆ</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">เบอร์โทรศัพท์</label>
                  <input type="tel" class="form-input" id="emergencyPhone" value="081-987-6543" disabled>
                </div>
                <div class="form-group">
                  <label class="form-label">อีเมล</label>
                  <input type="email" class="form-input" id="emergencyEmail" value="somsai.jaidee@email.com" disabled>
                </div>
              </div>
            </div>

            <!-- Notification Settings -->
            <div class="content-section">
              <div class="section-header">
                <h3 class="section-title">
                  <span class="section-icon">🔔</span>
                  การตั้งค่าการแจ้งเตือน
                </h3>
              </div>
              
              <div class="toggle-group">
                <div>
                  <div class="toggle-label">การแจ้งเตือนทางอีเมล</div>
                  <div class="toggle-desc">รับข้อมูลข่าวสารและการอัปเดตทางอีเมล</div>
                </div>
                <div class="toggle-switch active" onclick="toggleSwitch(this)">
                  <div class="toggle-slider"></div>
                </div>
              </div>
              
              <div class="toggle-group">
                <div>
                  <div class="toggle-label">การแจ้งเตือน SMS</div>
                  <div class="toggle-desc">รับข้อความแจ้งเตือนค่าใช้จ่ายและกำหนดชำระ</div>
                </div>
                <div class="toggle-switch active" onclick="toggleSwitch(this)">
                  <div class="toggle-slider"></div>
                </div>
              </div>
              
              <div class="toggle-group">
                <div>
                  <div class="toggle-label">การแจ้งเตือนผ่านแอป</div>
                  <div class="toggle-desc">รับการแจ้งเตือนแบบพุชผ่านแอปพลิเคชัน</div>
                </div>
                <div class="toggle-switch active" onclick="toggleSwitch(this)">
                  <div class="toggle-slider"></div>
                </div>
              </div>
              
              <div class="toggle-group">
                <div>
                  <div class="toggle-label">รายงานการใช้งาน</div>
                  <div class="toggle-desc">ส่งรายงานการใช้ไฟน้ำรายสัปดาห์</div>
                </div>
                <div class="toggle-switch" onclick="toggleSwitch(this)">
                  <div class="toggle-slider"></div>
                </div>
              </div>
              
              <div class="toggle-group">
                <div>
                  <div class="toggle-label">การแจ้งเตือนเหตุฉุกเฉิน</div>
                  <div class="toggle-desc">รับการแจ้งเตือนเหตุฉุกเฉินของระบบอาคาร</div>
                </div>
                <div class="toggle-switch active" onclick="toggleSwitch(this)">
                  <div class="toggle-slider"></div>
                </div>
              </div>
            </div>

            <!-- Privacy Settings -->
            <div class="content-section">
              <div class="section-header">
                <h3 class="section-title">
                  <span class="section-icon">🔒</span>
                  การตั้งค่าความเป็นส่วนตัว
                </h3>
              </div>
              
              <div class="toggle-group">
                <div>
                  <div class="toggle-label">แชร์ข้อมูลการใช้งาน</div>
                  <div class="toggle-desc">อนุญาตให้แชร์ข้อมูลการใช้งานเพื่อปรับปรุงบริการ</div>
                </div>
                <div class="toggle-switch" onclick="toggleSwitch(this)">
                  <div class="toggle-slider"></div>
                </div>
              </div>
              
              <div class="toggle-group">
                <div>
                  <div class="toggle-label">การเข้าถึงระยะไกล</div>
                  <div class="toggle-desc">อนุญาตให้เข้าถึงระบบจากภายนอก</div>
                </div>
                <div class="toggle-switch active" onclick="toggleSwitch(this)">
                  <div class="toggle-slider"></div>
                </div>
              </div>
              
              <div class="toggle-group">
                <div>
                  <div class="toggle-label">บันทึกข้อมูลการใช้งาน</div>
                  <div class="toggle-desc">เก็บประวัติการใช้งานเพื่อการวิเคราะห์</div>
                </div>
                <div class="toggle-switch active" onclick="toggleSwitch(this)">
                  <div class="toggle-slider"></div>
                </div>
              </div>
            </div>

            <!-- Recent Activity -->
            <div class="content-section">
              <div class="section-header">
                <h3 class="section-title">
                  <span class="section-icon">📊</span>
                  กิจกรรมล่าสุด
                </h3>
              </div>
              
              <div class="activity-timeline">
                <div class="activity-item">
                  <div class="activity-icon">💳</div>
                  <div class="activity-content">
                    <div class="activity-title">ชำระค่าไฟน้ำประจำเดือน</div>
                    <div class="activity-desc">ชำระบิล LN-2024-001 จำนวน ฿485</div>
                    <div class="activity-time">วันนี้ 14:30</div>
                  </div>
                </div>
                
                <div class="activity-item">
                  <div class="activity-icon">💡</div>
                  <div class="activity-content">
                    <div class="activity-title">เปิดไฟห้องนอน</div>
                    <div class="activity-desc">เปิดระบบไฟอัจฉริยะผ่านแอป</div>
                    <div class="activity-time">เมื่อวาน 22:15</div>
                  </div>
                </div>
                
                <div class="activity-item">
                  <div class="activity-icon">🔒</div>
                  <div class="activity-content">
                    <div class="activity-title">เปลี่ยนรหัสผ่าน</div>
                    <div class="activity-desc">อัปเดตรหัสผ่านเข้าสู่ระบบ</div>
                    <div class="activity-time">3 วันที่แล้ว 09:45</div>
                  </div>
                </div>
                
                <div class="activity-item">
                  <div class="activity-icon">📱</div>
                  <div class="activity-content">
                    <div class="activity-title">เข้าสู่ระบบ</div>
                    <div class="activity-desc">เข้าสู่ระบบจากอุปกรณ์ Android</div>
                    <div class="activity-time">5 วันที่แล้ว 16:20</div>
                  </div>
                </div>
                
                <div class="activity-item">
                  <div class="activity-icon">🔧</div>
                  <div class="activity-content">
                    <div class="activity-title">อัปเดตโปรไฟล์</div>
                    <div class="activity-desc">แก้ไขข้อมูลผู้ติดต่อฉุกเฉิน</div>
                    <div class="activity-time">1 สัปดาห์ที่แล้ว</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      let currentUser = null;
      let isEditing = {
        personal: false,
        emergency: false
      };

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

      // เริ่มต้นเมื่อหน้าเว็บโหลดเสร็จ
      window.addEventListener('load', function() {
        // ตรวจสอบข้อมูลผู้ใช้
        const user = JSON.parse(localStorage.getItem('luna_user') || '{"name": "นายสมชาย ใจดี"}');
        currentUser = user;
        document.getElementById('profileName').textContent = user.name;
        
        // ตั้งค่าอวตาร์เริ่มต้น
        updateAvatar();
        
        // Event listeners
        setupEventListeners();
        
        // แสดงข้อความต้อนรับ
        setTimeout(() => {
          showNotification('ยินดีต้อนรับสู่หน้าโปรไฟล์ของคุณ');
        }, 1000);
        
        // จำลองการอัปเดตสถิติ
        startStatsSimulation();
      });

      // Setup event listeners
      function setupEventListeners() {
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

        // Event listener สำหรับการเปลี่ยนแปลงข้อมูล
        document.addEventListener('input', function(e) {
          if (!e.target.disabled && (isEditing.personal || isEditing.emergency)) {
            // เพิ่มกิจกรรมการแก้ไขข้อมูล
            if (Math.random() < 0.1) { // 10% โอกาสที่จะเพิ่มกิจกรรม
              addActivity('✏️', 'แก้ไขข้อมูลโปรไฟล์', `กำลังอัปเดตฟิลด์: ${e.target.previousElementSibling.textContent}`);
            }
          }
        });
      }

      // อัปเดตอวตาร์
      function updateAvatar() {
        const avatarText = document.getElementById('avatarText');
        const name = currentUser.name || 'ผู้ใช้';
        
        // ใช้อักษรตัวแรกของชื่อ
        if (name.includes('นาย') || name.includes('นาง') || name.includes('น.ส.')) {
          const nameParts = name.split(' ');
          if (nameParts.length > 1) {
            avatarText.textContent = nameParts[1].charAt(0);
          } else {
            avatarText.textContent = '👤';
          }
        } else {
          avatarText.textContent = name.charAt(0);
        }
      }

      // เปลี่ยนรูปโปรไฟล์
      function changeAvatar() {
        const emojis = ['👤', '😊', '🙂', '😎', '🤓', '🧑‍💼', '👨‍💻', '👩‍💻'];
        const randomEmoji = emojis[Math.floor(Math.random() * emojis.length)];
        document.getElementById('avatarText').textContent = randomEmoji;
        showNotification('เปลี่ยนรูปโปรไฟล์แล้ว');
      }

      // Toggle การแก้ไข
      function toggleEdit(section) {
        isEditing[section] = !isEditing[section];
        
        if (section === 'personal') {
          const personalInputs = document.querySelectorAll('#fullName, #email, #phone, #birthdate, #idCard, #occupation, #address');
          personalInputs.forEach(input => {
            input.disabled = !isEditing[section];
          });
        } else if (section === 'emergency') {
          const emergencyInputs = document.querySelectorAll('#emergencyName, #emergencyPhone, #emergencyEmail, #emergencyRelation');
          emergencyInputs.forEach(input => {
            input.disabled = !isEditing[section];
          });
        }
        
        const editBtn = event.target;
        editBtn.textContent = isEditing[section] ? 'ยกเลิก' : 'แก้ไข';
        
        if (isEditing[section]) {
          showSaveSection(section);
          showNotification(`เปิดโหมดแก้ไข${section === 'personal' ? 'ข้อมูลส่วนตัว' : 'ผู้ติดต่อฉุกเฉิน'}`);
        } else {
          hideSaveSection(section);
          showNotification('ยกเลิกการแก้ไข');
        }
      }

      // แสดง/ซ่อนปุ่มบันทึก
      function showSaveSection(section) {
        // ลบ save section เก่าถ้ามี
        const existingSave = document.querySelector('.save-section');
        if (existingSave) {
          existingSave.remove();
        }
        
        const saveSection = document.createElement('div');
        saveSection.className = 'save-section';
        saveSection.innerHTML = `
          <button class="btn-cancel" onclick="cancelEdit('${section}')">ยกเลิก</button>
          <button class="btn-save" onclick="saveChanges('${section}')">บันทึกการเปลี่ยนแปลง</button>
        `;
        
        const targetSection = section === 'personal' ? 
          document.querySelector('.content-section:first-child') : 
          document.querySelector('.content-section:nth-child(3)');
        
        targetSection.appendChild(saveSection);
      }

      function hideSaveSection() {
        const saveSection = document.querySelector('.save-section');
        if (saveSection) {
          saveSection.remove();
        }
      }

      // ยกเลิกการแก้ไข
      function cancelEdit(section) {
        toggleEdit(section);
      }

      // บันทึกการเปลี่ยนแปลง
      function saveChanges(section) {
        showNotification('กำลังบันทึกข้อมูล...');
        
        setTimeout(() => {
          isEditing[section] = false;
          const inputs = section === 'personal' ? 
            document.querySelectorAll('#fullName, #email, #phone, #birthdate, #idCard, #occupation, #address') :
            document.querySelectorAll('#emergencyName, #emergencyPhone, #emergencyEmail, #emergencyRelation');
          
          inputs.forEach(input => {
            input.disabled = true;
          });
          
          hideSaveSection();
          
          // อัปเดตชื่อในโปรไฟล์ถ้าเป็นข้อมูลส่วนตัว
          if (section === 'personal') {
            const newName = document.getElementById('fullName').value;
            document.getElementById('profileName').textContent = newName;
            currentUser.name = newName;
            localStorage.setItem('luna_user', JSON.stringify(currentUser));
          }
          
          showNotification('บันทึกข้อมูลสำเร็จ!', 'success');
          
          // รีเซ็ตปุ่มแก้ไข
          const editBtns = document.querySelectorAll('.edit-btn');
          editBtns.forEach(btn => {
            btn.textContent = 'แก้ไข';
          });
        }, 1500);
      }

      // Toggle Switch
      function toggleSwitch(element) {
        element.classList.toggle('active');
        const isActive = element.classList.contains('active');
        showNotification(isActive ? 'เปิดการตั้งค่า' : 'ปิดการตั้งค่า');
      }

      // ฟังก์ชันการดำเนินการต่างๆ
      function editProfile() {
        showNotification('เปิดโหมดแก้ไขโปรไฟล์');
        const personalEdit = document.querySelector('.content-section:first-child .edit-btn');
        personalEdit.click();
      }

      function changePassword() {
        showNotification('เปิดหน้าเปลี่ยนรหัสผ่าน');
      }

      function downloadData() {
        showNotification('กำลังเตรียมข้อมูลสำหรับดาวน์โหลด...');
        setTimeout(() => {
          showNotification('ดาวน์โหลดข้อมูลส่วนตัวสำเร็จ!');
        }, 2000);
      }

      // จำลองการอัปเดตสถิติ
      function startStatsSimulation() {
        setInterval(() => {
          // อัปเดตเปอร์เซ็นต์ออนไลน์
          const onlineStats = document.querySelectorAll('.stat-value')[2];
          const currentPercent = parseInt(onlineStats.textContent);
          const newPercent = Math.max(90, Math.min(100, currentPercent + (Math.random() - 0.5) * 2));
          onlineStats.textContent = Math.round(newPercent) + '%';
          
          // อัปเดตจำนวนอุปกรณ์
          const deviceStats = document.querySelectorAll('.stat-value')[3];
          const devices = [4, 5, 6];
          const randomDevice = devices[Math.floor(Math.random() * devices.length)];
          deviceStats.textContent = randomDevice;
        }, 8000);
      }

      // เพิ่มกิจกรรมใหม่ในไทม์ไลน์
      function addActivity(icon, title, desc) {
        const timeline = document.querySelector('.activity-timeline');
        const newActivity = document.createElement('div');
        newActivity.className = 'activity-item';
        newActivity.innerHTML = `
          <div class="activity-icon">${icon}</div>
          <div class="activity-content">
            <div class="activity-title">${title}</div>
            <div class="activity-desc">${desc}</div>
            <div class="activity-time">เมื่อสักครู่</div>
          </div>
        `;
        timeline.insertBefore(newActivity, timeline.firstChild);
        
        // ลบกิจกรรมเก่าถ้ามีมากกว่า 5 รายการ
        if (timeline.children.length > 5) {
          timeline.removeChild(timeline.lastChild);
        }
      }

      // แสดงการแจ้งเตือน
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