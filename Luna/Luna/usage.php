<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>สถิติการใช้งาน - Luna Smart Home</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
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
      
      .usage-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
      }
      
      .summary-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
      }
      
      .summary-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 25px;
        text-align: center;
        transition: all 0.3s ease;
      }
      
      .summary-card:hover {
        transform: translateY(-5px);
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
      }
      
      .summary-icon {
        font-size: 40px;
        margin-bottom: 15px;
        display: block;
      }
      
      .summary-value {
        font-size: 28px;
        font-weight: 600;
        color: #ff6b35;
        margin-bottom: 8px;
        text-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
      }
      
      .summary-label {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 5px;
      }
      
      .summary-change {
        font-size: 12px;
        padding: 4px 8px;
        border-radius: 12px;
        font-weight: 500;
      }
      
      .summary-change.positive {
        background: rgba(239, 68, 68, 0.2);
        color: #ef4444;
      }
      
      .summary-change.negative {
        background: rgba(74, 222, 128, 0.2);
        color: #4ade80;
      }
      
      .chart-section {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
        margin-bottom: 30px;
      }
      
      .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
      }
      
      .chart-title {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
      }
      
      .chart-filters {
        display: flex;
        gap: 10px;
      }
      
      .filter-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.8);
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .filter-btn.active,
      .filter-btn:hover {
        background: rgba(255, 107, 53, 0.2);
        border-color: rgba(255, 107, 53, 0.4);
        color: #ff6b35;
      }
      
      .chart-container {
        height: 400px;
        background: rgba(255, 255, 255, 0.02);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.05);
        position: relative;
        padding: 20px;
      }
      
      .chart-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-top: 20px;
      }
      
      .chart-stat {
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
        padding: 15px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.05);
      }
      
      .chart-stat-value {
        font-size: 18px;
        font-weight: 600;
        color: #ff6b35;
        margin-bottom: 5px;
      }
      
      .chart-stat-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.6);
      }
      
      .device-usage-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 30px;
      }
      
      .device-usage-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
        transition: all 0.3s ease;
      }
      
      .device-usage-card:hover {
        transform: translateY(-4px);
        background: rgba(255, 107, 53, 0.05);
        border-color: rgba(255, 107, 53, 0.2);
      }
      
      .device-header {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
      }
      
      .device-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 20px;
        box-shadow: 0 8px 32px rgba(255, 107, 53, 0.4);
      }
      
      .device-name {
        color: #fff;
        font-size: 18px;
        font-weight: 500;
      }
      
      .device-status {
        color: rgba(255, 255, 255, 0.6);
        font-size: 12px;
        margin-top: 5px;
      }
      
      .usage-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-bottom: 20px;
      }
      
      .usage-item {
        text-align: center;
        padding: 15px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.05);
      }
      
      .usage-value {
        font-size: 20px;
        font-weight: 600;
        color: #ff6b35;
        margin-bottom: 5px;
        text-shadow: 0 0 15px rgba(255, 107, 53, 0.3);
      }
      
      .usage-label {
        font-size: 11px;
        color: rgba(255, 255, 255, 0.5);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 300;
      }
      
      .usage-bar {
        width: 100%;
        height: 8px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
        overflow: hidden;
        margin-top: 15px;
      }
      
      .usage-fill {
        height: 100%;
        background: linear-gradient(90deg, #ff6b35, #ff8c42);
        border-radius: 4px;
        transition: width 0.3s ease;
        box-shadow: 0 0 10px rgba(255, 107, 53, 0.5);
      }
      
      .tips-section {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
      }
      
      .tips-title {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 20px;
        text-align: center;
      }
      
      .tips-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
      }
      
      .tip-card {
        background: rgba(255, 255, 255, 0.03);
        border-radius: 16px;
        padding: 20px;
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
      }
      
      .tip-card:hover {
        background: rgba(255, 107, 53, 0.05);
        border-color: rgba(255, 107, 53, 0.2);
      }
      
      .tip-icon {
        font-size: 24px;
        margin-bottom: 10px;
        display: block;
      }
      
      .tip-title {
        color: #ff6b35;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 8px;
      }
      
      .tip-description {
        color: rgba(255, 255, 255, 0.7);
        font-size: 14px;
        line-height: 1.5;
      }
      
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
      
      @media (max-width: 768px) {
        .sidebar {
          width: 100vw;
          right: -100vw;
        }
        
        .summary-cards {
          grid-template-columns: repeat(2, 1fr);
        }
        .device-usage-grid {
          grid-template-columns: 1fr;
        }
        .chart-header {
          flex-direction: column;
          gap: 15px;
        }
        .chart-filters {
          flex-wrap: wrap;
        }
        .tips-grid {
          grid-template-columns: 1fr;
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
    <span class="nav-logo-text">Luna</span>
    <span class="nav-logo-text">House</span>
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
            <div class="menu-item active">
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

      <div class="content-wrapper">
        <div class="page-header">
          <h1 class="page-title">สถิติการใช้งาน</h1>
          <p class="page-subtitle">USAGE ANALYTICS</p>
          <div class="room-info">
            <span class="room-number">ห้อง A-205</span>
            <span class="room-label">หอพักลูนา</span>
          </div>
        </div>

        <div class="usage-container">
          <div class="summary-cards">
            <div class="summary-card">
              <span class="summary-icon">⚡</span>
              <div class="summary-value">45.8 kWh</div>
              <div class="summary-label">การใช้ไฟเดือนนี้</div>
              <div class="summary-change positive">+12% จากเดือนก่อน</div>
            </div>
            
            <div class="summary-card">
              <span class="summary-icon">💧</span>
              <div class="summary-value">2,150 ลิตร</div>
              <div class="summary-label">การใช้น้ำเดือนนี้</div>
              <div class="summary-change negative">-8% จากเดือนก่อน</div>
            </div>
            
            <div class="summary-card">
              <span class="summary-icon">💰</span>
              <div class="summary-value">฿485</div>
              <div class="summary-label">ค่าใช้จ่ายเดือนนี้</div>
              <div class="summary-change positive">+5% จากเดือนก่อน</div>
            </div>
            
            <div class="summary-card">
              <span class="summary-icon">📊</span>
              <div class="summary-value">฿16.2</div>
              <div class="summary-label">ค่าเฉลี่ยต่อวัน</div>
              <div class="summary-change negative">-3% จากเดือนก่อน</div>
            </div>
          </div>

          <div class="chart-section">
            <div class="chart-header">
              <h3 class="chart-title">กราฟการใช้งาน</h3>
              <div class="chart-filters">
                <button class="filter-btn active" onclick="setChartPeriod('daily')">รายวัน</button>
                <button class="filter-btn" onclick="setChartPeriod('weekly')">รายสัปดาห์</button>
                <button class="filter-btn" onclick="setChartPeriod('monthly')">รายเดือน</button>
              </div>
            </div>
            <div class="chart-container">
              <canvas id="usageChart"></canvas>
            </div>
            <div class="chart-stats">
              <div class="chart-stat">
                <div class="chart-stat-value" id="avgElectric">฿15.2</div>
                <div class="chart-stat-label">ค่าไฟเฉลี่ย/วัน</div>
              </div>
              <div class="chart-stat">
                <div class="chart-stat-value" id="avgWater">฿10.8</div>
                <div class="chart-stat-label">ค่าน้ำเฉลี่ย/วัน</div>
              </div>
              <div class="chart-stat">
                <div class="chart-stat-value" id="peakUsage">จันทร์</div>
                <div class="chart-stat-label">วันที่ใช้สูงสุด</div>
              </div>
              <div class="chart-stat">
                <div class="chart-stat-value" id="totalSaving">-฿25</div>
                <div class="chart-stat-label">ประหยัดจากเดือนก่อน</div>
              </div>
            </div>
          </div>

          <div class="device-usage-grid">
            <div class="device-usage-card">
              <div class="device-header">
                <div class="device-icon">💡</div>
                <div>
                  <div class="device-name">ไฟห้อง</div>
                  <div class="device-status">ใช้งาน 8 ชั่วโมง/วัน</div>
                </div>
              </div>
              
              <div class="usage-stats">
                <div class="usage-item">
                  <div class="usage-value" id="lightDaily">2.4 kWh</div>
                  <div class="usage-label">วันนี้</div>
                </div>
                <div class="usage-item">
                  <div class="usage-value" id="lightCostDaily">฿8.50</div>
                  <div class="usage-label">ค่าใช้จ่าย</div>
                </div>
                <div class="usage-item">
                  <div class="usage-value">72 kWh</div>
                  <div class="usage-label">เดือนนี้</div>
                </div>
                <div class="usage-item">
                  <div class="usage-value">฿255</div>
                  <div class="usage-label">รวมเดือนนี้</div>
                </div>
              </div>
              
              <div class="usage-bar">
                <div class="usage-fill" style="width: 65%;"></div>
              </div>
            </div>

            <div class="device-usage-card">
              <div class="device-header">
                <div class="device-icon">💧</div>
                <div>
                  <div class="device-name">ระบบน้ำ</div>
                  <div class="device-status">ใช้งาน 6 ชั่วโมง/วัน</div>
                </div>
              </div>
              
              <div class="usage-stats">
                <div class="usage-item">
                  <div class="usage-value" id="waterDaily">85 ลิตร</div>
                  <div class="usage-label">วันนี้</div>
                </div>
                <div class="usage-item">
                  <div class="usage-value" id="waterCostDaily">฿7.80</div>
                  <div class="usage-label">ค่าใช้จ่าย</div>
                </div>
                <div class="usage-item">
                  <div class="usage-value">2,150 ลิตร</div>
                  <div class="usage-label">เดือนนี้</div>
                </div>
                <div class="usage-item">
                  <div class="usage-value">฿230</div>
                  <div class="usage-label">รวมเดือนนี้</div>
                </div>
              </div>
              
              <div class="usage-bar">
                <div class="usage-fill" style="width: 45%;"></div>
              </div>
            </div>
          </div>

          <div class="tips-section">
            <h3 class="tips-title">คำแนะนำประหยัดพลังงาน</h3>
            <div class="tips-grid">
              <div class="tip-card">
                <span class="tip-icon">💡</span>
                <div class="tip-title">ประหยัดค่าไฟ</div>
                <div class="tip-description">เปิดไฟเฉพาะที่จำเป็น ปิดไฟเมื่อออกจากห้อง และใช้หลอดไฟ LED</div>
              </div>
              
              <div class="tip-card">
                <span class="tip-icon">💧</span>
                <div class="tip-title">ประหยัดน้ำ</div>
                <div class="tip-description">ปิดก๊อกน้ำให้สนิท ไม่ปล่อยน้ำไหลขณะแปรงฟัน และตรวจสอบการรั่วไหล</div>
              </div>
              
              <div class="tip-card">
                <span class="tip-icon">📱</span>
                <div class="tip-title">ตรวจสอบการใช้งาน</div>
                <div class="tip-description">ติดตามสถิติการใช้งานประจำวัน เพื่อปรับพฤติกรรมให้ประหยัดมากขึ้น</div>
              </div>
              
              <div class="tip-card">
                <span class="tip-icon">⏰</span>
                <div class="tip-title">ใช้งานอย่างมีสติ</div>
                <div class="tip-description">วางแผนการใช้ไฟน้ำ ใช้เท่าที่จำเป็น และหลีกเลี่ยงการใช้งานฟุ่มเฟือย</div>
              </div>
            </div>
          </div>

          <div class="quick-actions">
            <a href="devices.php" class="quick-btn">
              <span class="quick-icon">⚡</span>
              <span class="quick-label">ควบคุมอุปกรณ์</span>
            </a>
            <a href="billing.php" class="quick-btn">
              <span class="quick-icon">💳</span>
              <span class="quick-label">ประวัติการชำระ</span>
            </a>
            <a href="topup.php" class="quick-btn">
              <span class="quick-icon">💰</span>
              <span class="quick-label">เติมเงิน</span>
            </a>
            <a href="index.php" class="quick-btn">
              <span class="quick-icon">🏠</span>
              <span class="quick-label">กลับแดชบอร์ด</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <script>
      let currentUser = null;
      let currentChartPeriod = 'daily';
      let usageChart = null;
      
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
      
      // ข้อมูลตัวอย่างสำหรับกราฟ
      const chartData = {
        daily: {
          labels: ['จันทร์', 'อังคาร', 'พุธ', 'พฤหัส', 'ศุกร์', 'เสาร์', 'อาทิตย์'],
          electric: [12, 15, 18, 14, 16, 22, 19],
          water: [8, 10, 12, 9, 11, 15, 13]
        },
        weekly: {
          labels: ['สัปดาห์ 1', 'สัปดาห์ 2', 'สัปดาห์ 3', 'สัปดาห์ 4'],
          electric: [85, 92, 78, 88],
          water: [65, 72, 58, 68]
        },
        monthly: {
          labels: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.'],
          electric: [350, 380, 320, 365, 340, 385],
          water: [280, 300, 260, 290, 275, 310]
        }
      };

      // เริ่มต้นเมื่อหน้าเว็บโหลดเสร็จ
      window.addEventListener('load', function() {
        // เริ่มต้นกราฟ
        initChart();
        
        // เริ่มการจำลองข้อมูลแบบเรียลไทม์
        startUsageSimulation();
        
        // แสดงข้อความต้อนรับ
        setTimeout(() => {
          showNotification('ยินดีต้อนรับสู่หน้าสถิติการใช้งาน');
        }, 1000);
      });

      // สร้างกราฟด้วย Chart.js
      function initChart() {
        const ctx = document.getElementById('usageChart').getContext('2d');
        
        usageChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: chartData[currentChartPeriod].labels,
            datasets: [
              {
                label: 'ค่าไฟ (บาท)',
                data: chartData[currentChartPeriod].electric,
                backgroundColor: 'rgba(255, 107, 53, 0.8)',
                borderColor: 'rgba(255, 107, 53, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
              },
              {
                label: 'ค่าน้ำ (บาท)',
                data: chartData[currentChartPeriod].water,
                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
              }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
              intersect: false,
              mode: 'index'
            },
            plugins: {
              legend: {
                position: 'bottom',
                labels: {
                  color: 'rgba(255, 255, 255, 0.8)',
                  padding: 20,
                  usePointStyle: true,
                  font: {
                    size: 12
                  }
                }
              },
              tooltip: {
                backgroundColor: 'rgba(26, 26, 26, 0.95)',
                titleColor: '#fff',
                bodyColor: '#fff',
                borderColor: 'rgba(255, 107, 53, 0.3)',
                borderWidth: 1,
                cornerRadius: 8,
                displayColors: true,
                callbacks: {
                  title: function(context) {
                    return context[0].label;
                  },
                  label: function(context) {
                    return context.dataset.label + ': ฿' + context.parsed.y;
                  }
                }
              }
            },
            scales: {
              x: {
                grid: {
                  display: false
                },
                ticks: {
                  color: 'rgba(255, 255, 255, 0.6)',
                  font: {
                    size: 11
                  }
                }
              },
              y: {
                beginAtZero: true,
                grid: {
                  color: 'rgba(255, 255, 255, 0.1)',
                  drawBorder: false
                },
                ticks: {
                  color: 'rgba(255, 255, 255, 0.6)',
                  font: {
                    size: 11
                  },
                  callback: function(value) {
                    return '฿' + value;
                  }
                }
              }
            },
            animation: {
              duration: 1000,
              easing: 'easeInOutQuart'
            }
          }
        });
        
        updateChartStats();
      }

      // เปลี่ยนช่วงเวลาของกราฟ
      function setChartPeriod(period) {
        currentChartPeriod = period;
        
        // อัปเดตปุ่มที่ถูกเลือก
        document.querySelectorAll('.filter-btn').forEach(btn => {
          btn.classList.remove('active');
        });
        event.target.classList.add('active');
        
        // อัปเดตข้อมูลกราฟ
        if (usageChart) {
          usageChart.data.labels = chartData[period].labels;
          usageChart.data.datasets[0].data = chartData[period].electric;
          usageChart.data.datasets[1].data = chartData[period].water;
          usageChart.update('active');
        }
        
        updateChartStats();
        
        const periodNames = {
          daily: 'รายวัน',
          weekly: 'รายสัปดาห์', 
          monthly: 'รายเดือน'
        };
        
        showNotification(`เปลี่ยนเป็นแสดงข้อมูล${periodNames[period]}แล้ว`);
      }
      
      // อัปเดตสถิติใต้กราฟ
      function updateChartStats() {
        const data = chartData[currentChartPeriod];
        
        // คำนวณค่าเฉลี่ย
        const avgElectric = (data.electric.reduce((a, b) => a + b, 0) / data.electric.length).toFixed(1);
        const avgWater = (data.water.reduce((a, b) => a + b, 0) / data.water.length).toFixed(1);
        
        // หาวันที่ใช้สูงสุด
        const maxElectricIndex = data.electric.indexOf(Math.max(...data.electric));
        const peakDay = data.labels[maxElectricIndex];
        
        // คำนวณการประหยัด (จำลอง)
        const saving = Math.round((Math.random() - 0.5) * 50);
        
        // อัปเดตการแสดงผล
        document.getElementById('avgElectric').textContent = `฿${avgElectric}`;
        document.getElementById('avgWater').textContent = `฿${avgWater}`;
        document.getElementById('peakUsage').textContent = peakDay;
        document.getElementById('totalSaving').textContent = saving >= 0 ? `+฿${saving}` : `-฿${Math.abs(saving)}`;
        
        // เปลี่ยนสีตามการประหยัด
        const savingElement = document.getElementById('totalSaving');
        if (saving >= 0) {
          savingElement.style.color = '#ef4444';
        } else {
          savingElement.style.color = '#4ade80';
        }
      }

      // จำลองการอัปเดตข้อมูลแบบเรียลไทม์
      function startUsageSimulation() {
        setInterval(() => {
          updateDailyUsage();
        }, 5000); // อัปเดตทุก 5 วินาที
      }

      function updateDailyUsage() {
        // จำลองการใช้ไฟ
        const lightUsage = (2.4 + (Math.random() - 0.5) * 0.3).toFixed(1);
        const lightCost = (lightUsage * 3.54).toFixed(2);
        
        // จำลองการใช้น้ำ
        const waterUsage = Math.round(85 + (Math.random() - 0.5) * 15);
        const waterCost = (waterUsage * 0.092).toFixed(2);
        
        // อัปเดตการแสดงผล
        document.getElementById('lightDaily').textContent = `${lightUsage} kWh`;
        document.getElementById('lightCostDaily').textContent = `฿${lightCost}`;
        document.getElementById('waterDaily').textContent = `${waterUsage} ลิตร`;
        document.getElementById('waterCostDaily').textContent = `฿${waterCost}`;
        
        // อัปเดตข้อมูลกราฟแบบสุ่ม (เฉพาะวันปัจจุบัน)
        if (currentChartPeriod === 'daily' && usageChart) {
          const today = new Date().getDay();
          const todayIndex = today === 0 ? 6 : today - 1; // แปลงเป็น index (จันทร์ = 0)
          
          // เพิ่มความผันแปรเล็กน้อย
          chartData.daily.electric[todayIndex] += (Math.random() - 0.5) * 0.5;
          chartData.daily.water[todayIndex] += (Math.random() - 0.5) * 0.3;
          
          // ป้องกันค่าติดลบ
          chartData.daily.electric[todayIndex] = Math.max(chartData.daily.electric[todayIndex], 5);
          chartData.daily.water[todayIndex] = Math.max(chartData.daily.water[todayIndex], 3);
          
          usageChart.update('none');
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