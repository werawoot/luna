<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ประวัติการชำระเงิน - Luna Smart Home</title>
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
      
      .billing-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
      }
      
      /* Summary Section */
      .billing-summary {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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
      
      .summary-status {
        font-size: 12px;
        padding: 4px 8px;
        border-radius: 12px;
        font-weight: 500;
      }
      
      .status-paid {
        background: rgba(74, 222, 128, 0.2);
        color: #4ade80;
      }
      
      .status-pending {
        background: rgba(251, 191, 36, 0.2);
        color: #fbbf24;
      }
      
      .status-overdue {
        background: rgba(239, 68, 68, 0.2);
        color: #ef4444;
      }
      
      /* Filter Section */
      .filter-section {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 30px;
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
      }
      
      .filter-label {
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
        font-weight: 500;
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
      }
      
      .filter-select:focus {
        border-color: rgba(255, 107, 53, 0.4);
        background: rgba(255, 107, 53, 0.1);
      }
      
      .filter-select option {
        background: #1a1a1a;
        color: #fff;
      }
      
      .search-box {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        padding: 8px 12px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
        flex: 1;
        min-width: 200px;
      }
      
      .search-box:focus {
        border-color: rgba(255, 107, 53, 0.4);
        background: rgba(255, 107, 53, 0.1);
      }
      
      .search-box::placeholder {
        color: rgba(255, 255, 255, 0.5);
      }
      
      /* Billing History */
      .billing-history {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
        margin-bottom: 30px;
      }
      
      .history-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
      }
      
      .history-title {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
      }
      
      .download-btn {
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border: none;
        border-radius: 8px;
        color: #fff;
        padding: 10px 20px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
      }
      
      .download-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
      }
      
      .billing-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }
      
      .billing-table th,
      .billing-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }
      
      .billing-table th {
        background: rgba(255, 255, 255, 0.02);
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      
      .billing-table td {
        color: rgba(255, 255, 255, 0.9);
        font-size: 14px;
      }
      
      .billing-table tr:hover {
        background: rgba(255, 107, 53, 0.05);
      }
      
      .bill-id {
        color: #ff6b35;
        font-weight: 500;
      }
      
      .bill-amount {
        font-weight: 600;
        color: #fff;
      }
      
      .bill-status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        text-align: center;
        min-width: 70px;
      }
      
      .status-success {
        background: rgba(74, 222, 128, 0.2);
        color: #4ade80;
      }
      
      .status-warning {
        background: rgba(251, 191, 36, 0.2);
        color: #fbbf24;
      }
      
      .status-danger {
        background: rgba(239, 68, 68, 0.2);
        color: #ef4444;
      }
      
      .bill-actions {
        display: flex;
        gap: 8px;
      }
      
      .action-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 6px;
        color: rgba(255, 255, 255, 0.8);
        padding: 6px 10px;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
      }
      
      .action-btn:hover {
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
        color: #ff6b35;
      }
      
      .action-btn.pay-btn {
        background: linear-gradient(135deg, #4ade80, #22c55e);
        border-color: transparent;
        color: #fff;
      }
      
      .action-btn.pay-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 15px rgba(74, 222, 128, 0.3);
      }
      
      /* Payment Methods */
      .payment-methods {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
        margin-bottom: 30px;
      }
      
      .payment-title {
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 20px;
        text-align: center;
      }
      
      .payment-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
      }
      
      .payment-card {
        background: rgba(255, 255, 255, 0.03);
        border-radius: 16px;
        padding: 20px;
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
        cursor: pointer;
      }
      
      .payment-card:hover {
        background: rgba(255, 107, 53, 0.05);
        border-color: rgba(255, 107, 53, 0.2);
        transform: translateY(-2px);
      }
      
      .payment-icon {
        font-size: 32px;
        margin-bottom: 15px;
        display: block;
      }
      
      .payment-name {
        color: #fff;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 8px;
      }
      
      .payment-desc {
        color: rgba(255, 255, 255, 0.6);
        font-size: 12px;
        line-height: 1.4;
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
      
      /* Pagination */
      .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
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
      
      /* Responsive */
      @media (max-width: 768px) {
        .sidebar {
          width: 100vw;
          right: -100vw;
        }
        
        .billing-summary {
          grid-template-columns: repeat(2, 1fr);
        }
        
        .filter-section {
          flex-direction: column;
          align-items: stretch;
        }
        
        .billing-table {
          font-size: 12px;
        }
        
        .billing-table th,
        .billing-table td {
          padding: 10px 8px;
        }
        
        .history-header {
          flex-direction: column;
          gap: 15px;
        }
        
        .payment-grid {
          grid-template-columns: 1fr;
        }
        
        .page-title {
          font-size: 28px;
        }
      }
      
      @media (max-width: 480px) {
        .billing-table-container {
          overflow-x: auto;
        }
        
        .billing-table {
          min-width: 600px;
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
            <div class="menu-item" onclick="window.location.href='usage.php'">
              <span class="menu-icon">📊</span>
              <span>สถิติการใช้งาน</span>
            </div>
            <div class="menu-item active">
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
          <h1 class="page-title">ประวัติการชำระเงิน</h1>
          <p class="page-subtitle">BILLING HISTORY</p>
          <div class="room-info">
            <span class="room-number">ห้อง A-205</span>
            <span class="room-label">หอพักลูนา</span>
          </div>
        </div>

        <div class="billing-container">
          <!-- Summary Cards -->
          <div class="billing-summary">
            <div class="summary-card">
              <span class="summary-icon">💳</span>
              <div class="summary-value">฿485</div>
              <div class="summary-label">ยอดค้างชำระ</div>
              <div class="summary-status status-pending">รอชำระ</div>
            </div>
            
            <div class="summary-card">
              <span class="summary-icon">📊</span>
              <div class="summary-value">฿1,845</div>
              <div class="summary-label">ชำระแล้วเดือนนี้</div>
              <div class="summary-status status-paid">ชำระแล้ว</div>
            </div>
            
            <div class="summary-card">
              <span class="summary-icon">⏰</span>
              <div class="summary-value">5 มิ.ย.</div>
              <div class="summary-label">กำหนดชำระถัดไป</div>
              <div class="summary-status status-pending">5 วัน</div>
            </div>
            
            <div class="summary-card">
              <span class="summary-icon">💰</span>
              <div class="summary-value">฿2,580</div>
              <div class="summary-label">ยอดเฉลี่ยต่อเดือน</div>
              <div class="summary-status status-paid">6 เดือน</div>
            </div>
          </div>

          <!-- Filter Section -->
          <div class="filter-section">
            <span class="filter-label">กรองข้อมูล:</span>
            <select class="filter-select" id="statusFilter">
              <option value="all">สถานะทั้งหมด</option>
              <option value="paid">ชำระแล้ว</option>
              <option value="pending">รอชำระ</option>
              <option value="overdue">เกินกำหนด</option>
            </select>
            <select class="filter-select" id="periodFilter">
              <option value="all">ช่วงเวลาทั้งหมด</option>
              <option value="thisMonth">เดือนนี้</option>
              <option value="lastMonth">เดือนที่แล้ว</option>
              <option value="last3Months">3 เดือนที่แล้ว</option>
              <option value="last6Months">6 เดือนที่แล้ว</option>
            </select>
            <input type="text" class="search-box" id="searchBox" placeholder="ค้นหาหมายเลขบิล หรือรายการ...">
          </div>

          <!-- Billing History -->
          <div class="billing-history">
            <div class="history-header">
              <h3 class="history-title">ประวัติการชำระเงิน</h3>
              <a href="#" class="download-btn" onclick="downloadStatement()">
                <span>📄</span>
                ดาวน์โหลดใบแจ้งหนี้
              </a>
            </div>
            
            <div class="billing-table-container">
              <table class="billing-table" id="billingTable">
                <thead>
                  <tr>
                    <th>หมายเลขบิล</th>
                    <th>วันที่</th>
                    <th>รายการ</th>
                    <th>จำนวนเงิน</th>
                    <th>สถานะ</th>
                    <th>การดำเนินการ</th>
                  </tr>
                </thead>
                <tbody id="billingTableBody">
                  <!-- Table rows will be populated by JavaScript -->
                </tbody>
              </table>
            </div>
            
            <div class="pagination" id="pagination">
              <!-- Pagination will be populated by JavaScript -->
            </div>
          </div>

          <!-- Payment Methods -->
          <div class="payment-methods">
            <h3 class="payment-title">วิธีการชำระเงิน</h3>
            <div class="payment-grid">
              <div class="payment-card" onclick="selectPaymentMethod('bank')">
                <span class="payment-icon">🏦</span>
                <div class="payment-name">โอนผ่านธนาคาร</div>
                <div class="payment-desc">โอนเงินผ่านแอปธนาคาร หรือ ATM</div>
              </div>
              
              <div class="payment-card" onclick="selectPaymentMethod('promptpay')">
                <span class="payment-icon">💸</span>
                <div class="payment-name">พร้อมเพย์</div>
                <div class="payment-desc">ชำระผ่าน QR Code พร้อมเพย์</div>
              </div>
              
              <div class="payment-card" onclick="selectPaymentMethod('credit')">
                <span class="payment-icon">💳</span>
                <div class="payment-name">บัตรเครดิต</div>
                <div class="payment-desc">Visa, MasterCard, JCB</div>
              </div>
              
              <div class="payment-card" onclick="selectPaymentMethod('wallet')">
                <span class="payment-icon">📱</span>
                <div class="payment-name">กระเป๋าเงินดิจิทัล</div>
                <div class="payment-desc">TrueMoney, ShopeePay, Rabbit LINE Pay</div>
              </div>
            </div>
          </div>

          <!-- Quick Actions -->
          <div class="quick-actions">
            <div class="quick-btn" onclick="payNow()">
              <span class="quick-icon">💳</span>
              <span class="quick-label">ชำระเงินด่วน</span>
            </div>
            <div class="quick-btn" onclick="viewUsage()">
              <span class="quick-icon">📊</span>
              <span class="quick-label">ดูการใช้งาน</span>
            </div>
            <div class="quick-btn" onclick="autoPayment()">
              <span class="quick-icon">🔄</span>
              <span class="quick-label">ตั้งค่าชำระอัตโนมัติ</span>
            </div>
            <div class="quick-btn" onclick="contactSupport()">
              <span class="quick-icon">💬</span>
              <span class="quick-label">ติดต่อสอบถาม</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      let currentUser = null;
      let currentPage = 1;
      const itemsPerPage = 10;
      let filteredBills = [];
      
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
      
      // ข้อมูลตัวอย่างบิล
      const billingData = [
        {
          id: 'LN-2024-001',
          date: '2024-05-01',
          description: 'ค่าไฟฟ้า-น้ำประจำเดือน เม.ย.',
          amount: 485,
          status: 'pending',
          dueDate: '2024-06-05'
        },
        {
          id: 'LN-2024-002',
          date: '2024-04-01',
          description: 'ค่าไฟฟ้า-น้ำประจำเดือน มี.ค.',
          amount: 520,
          status: 'paid',
          dueDate: '2024-05-05'
        },
        {
          id: 'LN-2024-003',
          date: '2024-03-01',
          description: 'ค่าไฟฟ้า-น้ำประจำเดือน ก.พ.',
          amount: 445,
          status: 'paid',
          dueDate: '2024-04-05'
        },
        {
          id: 'LN-2024-004',
          date: '2024-02-01',
          description: 'ค่าไฟฟ้า-น้ำประจำเดือน ม.ค.',
          amount: 580,
          status: 'paid',
          dueDate: '2024-03-05'
        },
        {
          id: 'LN-2024-005',
          date: '2024-01-01',
          description: 'ค่าไฟฟ้า-น้ำประจำเดือน ธ.ค.',
          amount: 395,
          status: 'paid',
          dueDate: '2024-02-05'
        },
        {
          id: 'LN-2023-012',
          date: '2023-12-01',
          description: 'ค่าไฟฟ้า-น้ำประจำเดือน พ.ย.',
          amount: 465,
          status: 'paid',
          dueDate: '2024-01-05'
        },
        {
          id: 'LN-2023-011',
          date: '2023-11-01',
          description: 'ค่าไฟฟ้า-น้ำประจำเดือน ต.ค.',
          amount: 510,
          status: 'paid',
          dueDate: '2023-12-05'
        },
        {
          id: 'LN-2023-010',
          date: '2023-10-01',
          description: 'ค่าไฟฟ้า-น้ำประจำเดือน ก.ย.',
          amount: 435,
          status: 'overdue',
          dueDate: '2023-11-05'
        }
      ];

      // เริ่มต้นเมื่อหน้าเว็บโหลดเสร็จ
      window.addEventListener('load', function() {
        // ตรวจสอบข้อมูลผู้ใช้
        const user = JSON.parse(localStorage.getItem('luna_user') || '{"name": "ผู้ใช้"}');
        currentUser = user;

        // เริ่มต้นตาราง
        filteredBills = [...billingData];
        renderTable();
        setupEventListeners();
        
        // แสดงข้อความต้อนรับ
        setTimeout(() => {
          showNotification('ยินดีต้อนรับสู่หน้าประวัติการชำระเงิน');
        }, 1000);
        
        // อัปเดตสถิติการใช้จ่าย
        updateSpendingStats();
      });

      // ตั้งค่า Event Listeners
      function setupEventListeners() {
        document.getElementById('statusFilter').addEventListener('change', filterBills);
        document.getElementById('periodFilter').addEventListener('change', filterBills);
        document.getElementById('searchBox').addEventListener('input', filterBills);
        
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
      }

      // กรองข้อมูลบิล
      function filterBills() {
        const statusFilter = document.getElementById('statusFilter').value;
        const periodFilter = document.getElementById('periodFilter').value;
        const searchTerm = document.getElementById('searchBox').value.toLowerCase();
        
        filteredBills = billingData.filter(bill => {
          const matchStatus = statusFilter === 'all' || bill.status === statusFilter;
          const matchPeriod = checkPeriodMatch(bill.date, periodFilter);
          const matchSearch = bill.id.toLowerCase().includes(searchTerm) || 
                            bill.description.toLowerCase().includes(searchTerm);
          
          return matchStatus && matchPeriod && matchSearch;
        });
        
        currentPage = 1;
        renderTable();
        showNotification(`พบข้อมูล ${filteredBills.length} รายการ`);
      }

      // ตรวจสอบการกรองตามช่วงเวลา
      function checkPeriodMatch(billDate, period) {
        if (period === 'all') return true;
        
        const billDateObj = new Date(billDate);
        const now = new Date();
        
        switch (period) {
          case 'thisMonth':
            return billDateObj.getMonth() === now.getMonth() && 
                   billDateObj.getFullYear() === now.getFullYear();
          case 'lastMonth':
            const lastMonth = new Date(now.getFullYear(), now.getMonth() - 1);
            return billDateObj.getMonth() === lastMonth.getMonth() && 
                   billDateObj.getFullYear() === lastMonth.getFullYear();
          case 'last3Months':
            const threeMonthsAgo = new Date(now.getTime() - (90 * 24 * 60 * 60 * 1000));
            return billDateObj >= threeMonthsAgo;
          case 'last6Months':
            const sixMonthsAgo = new Date(now.getTime() - (180 * 24 * 60 * 60 * 1000));
            return billDateObj >= sixMonthsAgo;
          default:
            return true;
        }
      }

      // แสดงตาราง
      function renderTable() {
        const tbody = document.getElementById('billingTableBody');
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const currentBills = filteredBills.slice(startIndex, endIndex);
        
        tbody.innerHTML = '';
        
        currentBills.forEach(bill => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td><span class="bill-id">${bill.id}</span></td>
            <td>${formatDate(bill.date)}</td>
            <td>${bill.description}</td>
            <td class="bill-amount">฿${bill.amount.toLocaleString()}</td>
            <td><span class="bill-status ${getStatusClass(bill.status)}">${getStatusText(bill.status)}</span></td>
            <td class="bill-actions">
              ${getBillActions(bill)}
            </td>
          `;
          tbody.appendChild(row);
        });
        
        renderPagination();
      }

      // สร้างปุ่มการดำเนินการ
      function getBillActions(bill) {
        switch (bill.status) {
          case 'pending':
            return `
              <a href="#" class="action-btn pay-btn" onclick="payBill('${bill.id}')">ชำระ</a>
              <a href="#" class="action-btn" onclick="viewBill('${bill.id}')">ดู</a>
            `;
          case 'overdue':
            return `
              <a href="#" class="action-btn pay-btn" onclick="payBill('${bill.id}')">ชำระด่วน</a>
              <a href="#" class="action-btn" onclick="viewBill('${bill.id}')">ดู</a>
            `;
          case 'paid':
            return `
              <a href="#" class="action-btn" onclick="viewBill('${bill.id}')">ดู</a>
              <a href="#" class="action-btn" onclick="downloadReceipt('${bill.id}')">ใบเสร็จ</a>
            `;
          default:
            return '<span class="action-btn">-</span>';
        }
      }

      // แสดง Pagination
      function renderPagination() {
        const pagination = document.getElementById('pagination');
        const totalPages = Math.ceil(filteredBills.length / itemsPerPage);
        
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
        const totalPages = Math.ceil(filteredBills.length / itemsPerPage);
        if (page >= 1 && page <= totalPages) {
          currentPage = page;
          renderTable();
        }
      }

      // อัปเดตสถิติการใช้จ่าย
      function updateSpendingStats() {
        setInterval(() => {
          // จำลองการเปลี่ยนแปลงยอดเงิน
          const pendingCard = document.querySelector('.summary-card .summary-value');
          const currentAmount = parseInt(pendingCard.textContent.replace('฿', '').replace(',', ''));
          const variation = Math.round((Math.random() - 0.5) * 10);
          const newAmount = Math.max(0, currentAmount + variation);
          pendingCard.textContent = `฿${newAmount.toLocaleString()}`;
        }, 10000);
      }

      // ฟังก์ชันช่วย
      function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('th-TH', {
          year: 'numeric',
          month: 'short',
          day: 'numeric'
        });
      }

      function getStatusClass(status) {
        switch (status) {
          case 'paid': return 'status-success';
          case 'pending': return 'status-warning';
          case 'overdue': return 'status-danger';
          default: return '';
        }
      }

      function getStatusText(status) {
        switch (status) {
          case 'paid': return 'ชำระแล้ว';
          case 'pending': return 'รอชำระ';
          case 'overdue': return 'เกินกำหนด';
          default: return 'ไม่ทราบ';
        }
      }

      // ฟังก์ชันการดำเนินการ
      function payBill(billId) {
        showNotification(`เริ่มต้นการชำระเงินสำหรับบิล ${billId}`, 'success');
        // จำลองการชำระเงิน
        setTimeout(() => {
          showNotification(`การชำระเงินสำหรับบิล ${billId} สำเร็จ!`, 'success');
          // อัปเดตสถานะบิล
          const bill = billingData.find(b => b.id === billId);
          if (bill) {
            bill.status = 'paid';
            filterBills();
          }
        }, 2000);
      }

      function viewBill(billId) {
        showNotification(`แสดงรายละเอียดบิล ${billId}`);
      }

      function downloadReceipt(billId) {
        showNotification(`ดาวน์โหลดใบเสร็จสำหรับบิล ${billId}`);
      }

      function downloadStatement() {
        showNotification('กำลังเตรียมใบแจ้งหนี้...');
        setTimeout(() => {
          showNotification('ดาวน์โหลดใบแจ้งหนี้สำเร็จ!');
        }, 1500);
      }

      function selectPaymentMethod(method) {
        const methods = {
          bank: 'โอนผ่านธนาคาร',
          promptpay: 'พร้อมเพย์',
          credit: 'บัตรเครดิต',
          wallet: 'กระเป๋าเงินดิจิทัล'
        };
        showNotification(`เลือกวิธีการชำระเงิน: ${methods[method]}`);
      }

      function payNow() {
        showNotification('เปิดหน้าชำระเงินด่วน');
      }

      function viewUsage() {
        showNotification('เปิดหน้าสถิติการใช้งาน');
        // window.location.href = 'usage.php';
      }

      function autoPayment() {
        showNotification('เปิดการตั้งค่าชำระเงินอัตโนมัติ');
      }

      function contactSupport() {
        showNotification('เปิดหน้าติดต่อฝ่ายสนับสนุน');
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