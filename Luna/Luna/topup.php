<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>เติมเงิน - Luna Smart Home</title>
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
      
      @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
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
      
      .topup-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 30px;
      }
      
      /* Main Topup Section */
      .topup-main {
        display: flex;
        flex-direction: column;
        gap: 30px;
      }
      
      .current-balance {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
        text-align: center;
      }
      
      .balance-label {
        color: rgba(255, 255, 255, 0.6);
        font-size: 14px;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
      }
      
      .balance-amount {
        color: #ff6b35;
        font-size: 48px;
        font-weight: 600;
        margin-bottom: 10px;
        transition: all 0.3s ease;
      }
      
      .balance-currency {
        color: rgba(255, 255, 255, 0.8);
        font-size: 16px;
      }
      
      /* Topup Amounts */
      .topup-amounts {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
      }
      
      .section-title {
        color: #fff;
        font-size: 24px;
        font-weight: 500;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
      }
      
      .section-icon {
        font-size: 28px;
      }
      
      .amount-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 15px;
        margin-bottom: 25px;
      }
      
      .amount-card {
        background: rgba(255, 255, 255, 0.03);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
      }
      
      .amount-card:hover {
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
        transform: translateY(-2px);
      }
      
      .amount-card.selected {
        background: rgba(255, 107, 53, 0.2);
        border-color: #ff6b35;
        box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
      }
      
      .amount-card.popular::before {
        content: 'ยอดนิยม';
        position: absolute;
        top: -8px;
        right: -8px;
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        color: #fff;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      
      .amount-value {
        color: #ff6b35;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 5px;
      }
      
      .amount-bonus {
        color: #4ade80;
        font-size: 12px;
        font-weight: 500;
      }
      
      .custom-amount {
        display: flex;
        gap: 15px;
        align-items: center;
        margin-top: 20px;
      }
      
      .custom-input {
        flex: 1;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        padding: 12px 16px;
        font-size: 16px;
        outline: none;
        transition: all 0.3s ease;
      }
      
      .custom-input:focus {
        border-color: rgba(255, 107, 53, 0.4);
        background: rgba(255, 107, 53, 0.1);
        box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
      }
      
      .custom-input::placeholder {
        color: rgba(255, 255, 255, 0.4);
      }
      
      /* Payment Methods */
      .payment-methods {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
      }
      
      .payment-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
      }
      
      .payment-card {
        background: rgba(255, 255, 255, 0.03);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 15px;
      }
      
      .payment-card:hover {
        background: rgba(255, 107, 53, 0.1);
        border-color: rgba(255, 107, 53, 0.3);
      }
      
      .payment-card.selected {
        background: rgba(255, 107, 53, 0.2);
        border-color: #ff6b35;
      }
      
      .payment-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
      }
      
      .payment-info {
        flex: 1;
      }
      
      .payment-name {
        color: #fff;
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 4px;
      }
      
      .payment-desc {
        color: rgba(255, 255, 255, 0.6);
        font-size: 12px;
        transition: all 0.3s ease;
      }
      
      /* Sidebar */
      .topup-sidebar {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }
      
      .summary-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 25px;
      }
      
      .summary-title {
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      
      .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding: 10px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }
      
      .summary-row:last-child {
        border-bottom: none;
        margin-bottom: 0;
        font-weight: 600;
        font-size: 18px;
      }
      
      .summary-label {
        color: rgba(255, 255, 255, 0.8);
        font-size: 14px;
      }
      
      .summary-value {
        color: #ff6b35;
        font-weight: 500;
        transition: all 0.3s ease;
      }
      
      .topup-btn {
        width: 100%;
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        border: none;
        border-radius: 12px;
        color: #fff;
        padding: 16px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
      }
      
      .topup-btn:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(255, 107, 53, 0.4);
      }
      
      .topup-btn:disabled {
        background: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.4);
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
        opacity: 0.5;
      }
      
      /* Promotions */
      .promotions-card {
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.1), rgba(255, 140, 66, 0.1));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 107, 53, 0.3);
        border-radius: 24px;
        padding: 25px;
      }
      
      .promo-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 15px;
        padding: 12px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
      }
      
      .promo-item:last-child {
        margin-bottom: 0;
      }
      
      .promo-icon {
        font-size: 24px;
        flex-shrink: 0;
      }
      
      .promo-text {
        color: rgba(255, 255, 255, 0.9);
        font-size: 14px;
        line-height: 1.4;
      }
      
      /* Transaction History */
      .history-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 25px;
      }
      
      .history-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        opacity: 1;
        transition: all 0.3s ease;
      }
      
      .history-item:last-child {
        border-bottom: none;
      }
      
      .history-info {
        flex: 1;
      }
      
      .history-date {
        color: rgba(255, 255, 255, 0.6);
        font-size: 12px;
        margin-bottom: 4px;
      }
      
      .history-method {
        color: #fff;
        font-size: 14px;
        font-weight: 500;
      }
      
      .history-amount {
        color: #4ade80;
        font-weight: 600;
      }
      
      .no-history {
        text-align: center;
        color: rgba(255, 255, 255, 0.6);
        font-size: 14px;
        padding: 20px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.02);
      }
      
      /* Loading State */
      .loading {
        display: none;
        align-items: center;
        gap: 8px;
      }
      
      .spinner {
        width: 20px;
        height: 20px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-top: 2px solid #fff;
        border-radius: 50%;
        animation: spin 1s linear infinite;
      }
      
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      
      /* Error Message */
      .error-msg {
        color: #ef4444;
        font-size: 12px;
        margin-top: 5px;
        opacity: 0;
        transition: opacity 0.3s ease;
      }
      
      /* Success Modal */
      .success-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10000;
        backdrop-filter: blur(10px);
        opacity: 0;
        transition: opacity 0.3s ease;
      }
      
      .modal-content {
        background: rgba(26, 26, 26, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 40px;
        text-align: center;
        max-width: 400px;
        margin: 20px;
        transform: translateY(20px) scale(0.9);
        transition: all 0.3s ease;
      }
      
      /* Notification */
      .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        border-radius: 12px;
        z-index: 10001;
        font-size: 14px;
        font-weight: 500;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transform: translateX(100%);
        transition: transform 0.3s ease;
        max-width: 300px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      }
      
      .notification.error {
        background: rgba(239, 68, 68, 0.9);
        color: white;
      }
      
      .notification.info {
        background: rgba(59, 130, 246, 0.9);
        color: white;
      }
      
      /* Responsive */
      @media (max-width: 768px) {
        .sidebar {
          width: 100vw;
          right: -100vw;
        }
        
        .topup-container {
          grid-template-columns: 1fr;
          gap: 20px;
        }
        
        .amount-grid {
          grid-template-columns: repeat(2, 1fr);
        }
        
        .payment-grid {
          grid-template-columns: 1fr;
        }
        
        .custom-amount {
          flex-direction: column;
          align-items: stretch;
        }
        
        .page-title {
          font-size: 28px;
        }
        
        .balance-amount {
          font-size: 36px;
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
            <div class="menu-item" onclick="window.location.href='billing.php'">
              <span class="menu-icon">💳</span>
              <span>ประวัติการชำระ</span>
            </div>
            <div class="menu-item active">
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
          <h1 class="page-title">เติมเงิน</h1>
          <p class="page-subtitle">TOP UP BALANCE</p>
        </div>

        <div class="topup-container">
          <!-- Main Topup Section -->
          <div class="topup-main">
            <!-- Current Balance -->
            <div class="current-balance">
              <div class="balance-label">ยอดเงินคงเหลือปัจจุบัน</div>
              <div class="balance-amount" id="currentBalance">₿1,245.00</div>
              <div class="balance-currency">Luna Credits</div>
            </div>

            <!-- Topup Amounts -->
            <div class="topup-amounts">
              <h2 class="section-title">
                <span class="section-icon">💰</span>
                เลือกจำนวนเงิน
              </h2>
              
              <div class="amount-grid">
                <div class="amount-card" onclick="selectAmount(this, 100)" data-amount="100">
                  <div class="amount-value">₿100</div>
                </div>
                
                <div class="amount-card popular" onclick="selectAmount(this, 500)" data-amount="500">
                  <div class="amount-value">₿500</div>
                  <div class="amount-bonus">+₿25 โบนัส</div>
                </div>
                
                <div class="amount-card" onclick="selectAmount(this, 1000)" data-amount="1000">
                  <div class="amount-value">₿1,000</div>
                  <div class="amount-bonus">+₿75 โบนัส</div>
                </div>
                
                <div class="amount-card" onclick="selectAmount(this, 2000)" data-amount="2000">
                  <div class="amount-value">₿2,000</div>
                  <div class="amount-bonus">+₿200 โบนัส</div>
                </div>
                
                <div class="amount-card" onclick="selectAmount(this, 5000)" data-amount="5000">
                  <div class="amount-value">₿5,000</div>
                  <div class="amount-bonus">+₿750 โบนัส</div>
                </div>
                
                <div class="amount-card" onclick="selectAmount(this, 10000)" data-amount="10000">
                  <div class="amount-value">₿10,000</div>
                  <div class="amount-bonus">+₿2,000 โบนัส</div>
                </div>
              </div>
              
              <div class="custom-amount">
                <input type="number" class="custom-input" placeholder="ระบุจำนวนเงินที่ต้องการ" min="50" max="100000" id="customAmount" oninput="updateCustomAmount()">
                <span style="color: rgba(255,255,255,0.6); font-size: 14px;">₿</span>
              </div>
            </div>

            <!-- Payment Methods -->
            <div class="payment-methods">
              <h2 class="section-title">
                <span class="section-icon">💳</span>
                วิธีการชำระเงิน
              </h2>
              
              <div class="payment-grid">
                <div class="payment-card selected" onclick="selectPayment(this)" data-method="promptpay">
                  <div class="payment-icon" style="background: linear-gradient(135deg, #1e40af, #3b82f6);">📱</div>
                  <div class="payment-info">
                    <div class="payment-name">PromptPay</div>
                    <div class="payment-desc">QR Code / เบอร์โทรศัพท์</div>
                  </div>
                </div>
                
                <div class="payment-card" onclick="selectPayment(this)" data-method="card">
                  <div class="payment-icon" style="background: linear-gradient(135deg, #dc2626, #ef4444);">💳</div>
                  <div class="payment-info">
                    <div class="payment-name">บัตรเครดิต/เดบิต</div>
                    <div class="payment-desc">Visa, Mastercard, JCB</div>
                  </div>
                </div>
                
                <div class="payment-card" onclick="selectPayment(this)" data-method="banking">
                  <div class="payment-icon" style="background: linear-gradient(135deg, #059669, #10b981);">🏦</div>
                  <div class="payment-info">
                    <div class="payment-name">Internet Banking</div>
                    <div class="payment-desc">โอนผ่านธนาคารออนไลน์</div>
                  </div>
                </div>
                
                <div class="payment-card" onclick="selectPayment(this)" data-method="wallet">
                  <div class="payment-icon" style="background: linear-gradient(135deg, #7c3aed, #a855f7);">👛</div>
                  <div class="payment-info">
                    <div class="payment-name">E-Wallet</div>
                    <div class="payment-desc">TrueMoney, ShopeePay</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Sidebar -->
          <div class="topup-sidebar">
            <!-- Summary -->
            <div class="summary-card">
              <h3 class="summary-title">
                <span>📋</span>
                สรุปการเติมเงิน
              </h3>
              
              <div class="summary-row">
                <span class="summary-label">จำนวนเงิน</span>
                <span class="summary-value" id="summaryAmount">₿0</span>
              </div>
              
              <div class="summary-row">
                <span class="summary-label">โบนัส</span>
                <span class="summary-value" id="summaryBonus">₿0</span>
              </div>
              
              <div class="summary-row">
                <span class="summary-label">ค่าธรรมเนียม</span>
                <span class="summary-value" id="summaryFee">₿0</span>
              </div>
              
              <div class="summary-row">
                <span class="summary-label">รวมทั้งหมด</span>
                <span class="summary-value" id="summaryTotal">₿0</span>
              </div>
              
              <button class="topup-btn" id="confirmTopup" onclick="processTopup()" disabled>
                <span class="loading" id="loadingSpinner">
                  <div class="spinner"></div>
                  กำลังประมวลผล...
                </span>
                <span id="buttonText">เติมเงิน</span>
              </button>
            </div>

            <!-- Promotions -->
            <div class="promotions-card">
              <h3 class="summary-title">
                <span>🎁</span>
                โปรโมชั่นพิเศษ
              </h3>
              
              <div class="promo-item">
                <span class="promo-icon">🔥</span>
                <div class="promo-text">เติม ₿500 ขึ้นไป รับโบนัสพิเศษ 5%</div>
              </div>
              
              <div class="promo-item">
                <span class="promo-icon">⚡</span>
                <div class="promo-text">เติมครั้งแรกของเดือน รับโบนัส ₿50</div>
              </div>
              
              <div class="promo-item">
                <span class="promo-icon">💎</span>
                <div class="promo-text">เติม ₿5,000 ขึ้นไป รับสถานะ VIP</div>
              </div>
            </div>

            <!-- Transaction History -->
            <div class="history-card">
              <h3 class="summary-title">
                <span>📊</span>
                ประวัติการเติมเงิน
              </h3>
              
              <div class="history-item">
                <div class="history-info">
                  <div class="history-date">28 พ.ย. 2024</div>
                  <div class="history-method">PromptPay</div>
                </div>
                <div class="history-amount">+₿1,000</div>
              </div>
              
              <div class="history-item">
                <div class="history-info">
                  <div class="history-date">25 พ.ย. 2024</div>
                  <div class="history-method">บัตรเครดิต</div>
                </div>
                <div class="history-amount">+₿500</div>
              </div>
              
              <div class="history-item">
                <div class="history-info">
                  <div class="history-date">20 พ.ย. 2024</div>
                  <div class="history-method">Internet Banking</div>
                </div>
                <div class="history-amount">+₿2,000</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Global Variables
      var selectedAmount = 0;
      var selectedPayment = 'promptpay';
      var currentBalance = 1245.00;
      
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
      
      // ===== INITIALIZATION =====
      document.addEventListener('DOMContentLoaded', function() {
        initializePage();
        updateSummary();
        loadTransactionHistory();
        loadFormData();
        setupEventListeners();
      });
      
      function initializePage() {
        const userBalance = '1,245.00';
        
        document.getElementById('currentBalance').textContent = '₿' + userBalance;
        
        currentBalance = parseFloat(userBalance.replace(/,/g, ''));
      }
      
      function setupEventListeners() {
        const customInput = document.getElementById('customAmount');
        
        // Custom amount input events
        customInput.addEventListener('input', debounce(updateCustomAmount, 300));
        customInput.addEventListener('keypress', handleEnterKey);
        customInput.addEventListener('blur', validateCustomAmount);
        
        // Format number input
        customInput.addEventListener('input', function(e) {
          let value = e.target.value.replace(/[^0-9]/g, '');
          if (value.length > 6) value = value.slice(0, 6);
          e.target.value = value;
        });
        
        // Global event listeners
        document.addEventListener('keydown', handleKeyboardNavigation);
        document.addEventListener('click', handleModalClose);
        document.addEventListener('change', saveFormData);
        document.addEventListener('input', saveFormData);
        
        // Payment method tooltips
        setupPaymentTooltips();
      }
      
      // ===== AMOUNT SELECTION =====
      function selectAmount(element, amount) {
        document.querySelectorAll('.amount-card').forEach(card => {
          card.classList.remove('selected');
        });
        
        element.classList.add('selected');
        
        const customInput = document.getElementById('customAmount');
        customInput.value = '';
        clearInputError(customInput);
        
        selectedAmount = amount;
        updateSummary();
        saveFormData();
        
        // Visual feedback
        element.style.transform = 'scale(0.95)';
        setTimeout(() => {
          element.style.transform = '';
        }, 150);
      }
      
      function updateCustomAmount() {
        const customInput = document.getElementById('customAmount');
        const customValue = parseInt(customInput.value) || 0;
        
        if (customValue > 0) {
          document.querySelectorAll('.amount-card').forEach(card => {
            card.classList.remove('selected');
          });
          
          selectedAmount = customValue;
          clearInputError(customInput);
        } else {
          selectedAmount = 0;
        }
        
        updateSummary();
        saveFormData();
      }
      
      // ===== PAYMENT SELECTION =====
      function selectPayment(element) {
        document.querySelectorAll('.payment-card').forEach(card => {
          card.classList.remove('selected');
        });
        
        element.classList.add('selected');
        
        selectedPayment = element.getAttribute('data-method');
        updateSummary();
        saveFormData();
        
        // Visual feedback
        element.style.transform = 'scale(0.98)';
        setTimeout(() => {
          element.style.transform = '';
        }, 150);
      }
      
      // ===== CALCULATIONS =====
      function calculateBonus(amount) {
        if (amount >= 10000) return 2000;
        if (amount >= 5000) return 750;
        if (amount >= 2000) return 200;
        if (amount >= 1000) return 75;
        if (amount >= 500) return 25;
        return 0;
      }
      
      function calculateFee(amount, method) {
        if (amount === 0) return 0;
        
        switch (method) {
          case 'promptpay': return 0;
          case 'card': return Math.ceil(amount * 0.025);
          case 'banking': return 10;
          case 'wallet': return Math.ceil(amount * 0.015);
          default: return 0;
        }
      }
      
      // ===== SUMMARY UPDATE =====
      function updateSummary() {
        const bonus = calculateBonus(selectedAmount);
        const fee = calculateFee(selectedAmount, selectedPayment);
        const total = selectedAmount + bonus - fee;
        
        animateValueChange('summaryAmount', '₿' + selectedAmount.toLocaleString());
        animateValueChange('summaryBonus', '₿' + bonus.toLocaleString());
        animateValueChange('summaryFee', '₿' + fee.toLocaleString());
        animateValueChange('summaryTotal', '₿' + total.toLocaleString());
        
        const topupBtn = document.getElementById('confirmTopup');
        if (selectedAmount >= 50) {
          topupBtn.disabled = false;
          topupBtn.style.opacity = '1';
        } else {
          topupBtn.disabled = true;
          topupBtn.style.opacity = '0.5';
        }
      }
      
      function animateValueChange(elementId, newValue) {
        const element = document.getElementById(elementId);
        if (element && element.textContent !== newValue) {
          element.style.transform = 'scale(1.1)';
          element.style.color = '#ff8c42';
          
          setTimeout(() => {
            element.textContent = newValue;
            element.style.transform = 'scale(1)';
            element.style.color = '#ff6b35';
          }, 150);
        }
      }
      
      // ===== TOPUP PROCESS =====
      function processTopup() {
        if (selectedAmount < 50) {
          showNotification('จำนวนเงินขั้นต่ำ ₿50', 'error');
          return;
        }
        
        const bonus = calculateBonus(selectedAmount);
        const fee = calculateFee(selectedAmount, selectedPayment);
        const total = selectedAmount + bonus - fee;
        
        setLoadingState(true);
        
        setTimeout(() => {
          setLoadingState(false);
          
          const newBalance = currentBalance + total;
          currentBalance = newBalance;
          
          const balanceText = newBalance.toLocaleString('th-TH', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          });
          
          animateBalanceUpdate(balanceText);
          
          addTransactionHistory(selectedAmount, selectedPayment);
          showSuccessMessage(total);
          resetForm();
          
        }, 3000);
      }
      
      function setLoadingState(loading) {
        const buttonText = document.getElementById('buttonText');
        const loadingSpinner = document.getElementById('loadingSpinner');
        const topupBtn = document.getElementById('confirmTopup');
        
        if (loading) {
          buttonText.style.display = 'none';
          loadingSpinner.style.display = 'flex';
          topupBtn.disabled = true;
          topupBtn.style.cursor = 'not-allowed';
        } else {
          buttonText.style.display = 'block';
          loadingSpinner.style.display = 'none';
          topupBtn.disabled = false;
          topupBtn.style.cursor = 'pointer';
        }
      }
      
      function animateBalanceUpdate(balanceText) {
        const currentBalanceEl = document.getElementById('currentBalance');
        
        if (currentBalanceEl) {
          currentBalanceEl.style.transform = 'scale(1.1)';
          currentBalanceEl.style.color = '#4ade80';
          
          setTimeout(() => {
            currentBalanceEl.textContent = '₿' + balanceText;
            currentBalanceEl.style.transform = 'scale(1)';
            currentBalanceEl.style.color = '#ff6b35';
          }, 300);
        }
      }
      
      // ===== TRANSACTION HISTORY =====
      function addTransactionHistory(amount, method) {
        const today = new Date();
        const dateString = today.toLocaleDateString('th-TH', {
          day: 'numeric',
          month: 'short',
          year: 'numeric'
        });
        
        const methodNames = {
          'promptpay': 'PromptPay',
          'card': 'บัตรเครดิต',
          'banking': 'Internet Banking',
          'wallet': 'E-Wallet'
        };
        
        let history = JSON.parse(localStorage.getItem('topupHistory') || '[]');
        
        history.unshift({
          date: dateString,
          method: methodNames[method],
          amount: amount,
          bonus: calculateBonus(amount),
          fee: calculateFee(amount, method),
          timestamp: Date.now()
        });
        
        if (history.length > 20) {
          history = history.slice(0, 20);
        }
        
        localStorage.setItem('topupHistory', JSON.stringify(history));
        updateHistoryDisplay(history);
      }
      
      function loadTransactionHistory() {
        const history = JSON.parse(localStorage.getItem('topupHistory') || '[]');
        updateHistoryDisplay(history);
      }
      
      function updateHistoryDisplay(history) {
        const historyContainer = document.querySelector('.history-card');
        if (!historyContainer) return;
        
        const existingItems = historyContainer.querySelectorAll('.history-item');
        existingItems.forEach(item => item.remove());
        
        if (history.length > 0) {
          history.slice(0, 3).forEach((transaction, index) => {
            const historyItem = document.createElement('div');
            historyItem.className = 'history-item';
            historyItem.style.opacity = '0';
            historyItem.style.transform = 'translateY(10px)';
            
            historyItem.innerHTML = `
              <div class="history-info">
                <div class="history-date">${transaction.date}</div>
                <div class="history-method">${transaction.method}</div>
              </div>
              <div class="history-amount">+₿${transaction.amount.toLocaleString()}</div>
            `;
            
            historyContainer.appendChild(historyItem);
            
            setTimeout(() => {
              historyItem.style.opacity = '1';
              historyItem.style.transform = 'translateY(0)';
              historyItem.style.transition = 'all 0.3s ease';
            }, index * 100);
          });
        } else {
          const noHistoryItem = document.createElement('div');
          noHistoryItem.className = 'no-history';
          noHistoryItem.innerHTML = `
            <div style="font-size: 32px; margin-bottom: 10px;">📊</div>
            <div>ยังไม่มีประวัติการเติมเงิน</div>
            <div style="font-size: 12px; margin-top: 5px; opacity: 0.7;">เติมเงินครั้งแรกเพื่อดูประวัติ</div>
          `;
          historyContainer.appendChild(noHistoryItem);
        }
      }
      
      // ===== SUCCESS MODAL =====
      function showSuccessMessage(total) {
        const modal = document.createElement('div');
        modal.className = 'success-modal';
        modal.style.cssText = `
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(0, 0, 0, 0.8);
          display: flex;
          align-items: center;
          justify-content: center;
          z-index: 10000;
          backdrop-filter: blur(10px);
          opacity: 0;
          transition: opacity 0.3s ease;
        `;
        
        const modalContent = document.createElement('div');
        modalContent.className = 'modal-content';
        modalContent.innerHTML = `
          <div style="font-size: 64px; margin-bottom: 20px; animation: bounce 0.6s ease;">✅</div>
          <h2 style="color: #fff; font-size: 24px; margin-bottom: 15px;">เติมเงินสำเร็จ!</h2>
          <p style="color: rgba(255, 255, 255, 0.8); margin-bottom: 20px; line-height: 1.6;">
            เติมเงินจำนวน <span style="color: #ff6b35; font-weight: 600;">₿${total.toLocaleString()}</span> เรียบร้อยแล้ว<br>
            ยอดเงินปัจจุบัน: <span style="color: #4ade80; font-weight: 600;">₿${currentBalance.toLocaleString('th-TH', {minimumFractionDigits: 2})}</span>
          </p>
          <button onclick="closeSuccessModal()" style="
            background: linear-gradient(135deg, #ff6b35, #ff8c42);
            border: none;
            border-radius: 12px;
            color: #fff;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
          " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(255, 107, 53, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(255, 107, 53, 0.3)'">
            ตกลง
          </button>
        `;
        
        modal.appendChild(modalContent);
        document.body.appendChild(modal);
        
        setTimeout(() => {
          modal.style.opacity = '1';
          modalContent.style.transform = 'translateY(0) scale(1)';
        }, 50);
        
        window.successModal = modal;
        
        window.modalAutoCloseTimer = setTimeout(() => {
          if (window.successModal) {
            closeSuccessModal();
          }
        }, 5000);
      }
      
      function closeSuccessModal() {
        if (window.successModal) {
          const modal = window.successModal;
          const modalContent = modal.querySelector('.modal-content');
          
          modal.style.opacity = '0';
          modalContent.style.transform = 'translateY(20px) scale(0.9)';
          
          setTimeout(() => {
            if (document.body.contains(modal)) {
              document.body.removeChild(modal);
            }
          }, 300);
          
          window.successModal = null;
          
          if (window.modalAutoCloseTimer) {
            clearTimeout(window.modalAutoCloseTimer);
            window.modalAutoCloseTimer = null;
          }
        }
      }
      
      // ===== NOTIFICATIONS =====
      function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
          notification.style.transform = 'translateX(0)';
        }, 50);
        
        setTimeout(() => {
          notification.style.transform = 'translateX(100%)';
          setTimeout(() => {
            if (document.body.contains(notification)) {
              document.body.removeChild(notification);
            }
          }, 300);
        }, 3000);
      }
      
      // ===== FORM MANAGEMENT =====
      function resetForm() {
        selectedAmount = 0;
        
        document.querySelectorAll('.amount-card').forEach(card => {
          card.classList.remove('selected');
        });
        
        const customInput = document.getElementById('customAmount');
        customInput.value = '';
        clearInputError(customInput);
        
        document.querySelectorAll('.payment-card').forEach(card => {
          card.classList.remove('selected');
        });
        document.querySelector('[data-method="promptpay"]').classList.add('selected');
        selectedPayment = 'promptpay';
        
        updateSummary();
        sessionStorage.removeItem('topupFormData');
      }
      
      function saveFormData() {
        const formData = {
          selectedAmount: selectedAmount,
          selectedPayment: selectedPayment,
          customAmount: document.getElementById('customAmount').value,
          timestamp: Date.now()
        };
        sessionStorage.setItem('topupFormData', JSON.stringify(formData));
      }
      
      function loadFormData() {
        const savedData = sessionStorage.getItem('topupFormData');
        if (savedData) {
          try {
            const formData = JSON.parse(savedData);
            
            if (Date.now() - formData.timestamp > 3600000) {
              sessionStorage.removeItem('topupFormData');
              return;
            }
            
            if (formData.customAmount) {
              document.getElementById('customAmount').value = formData.customAmount;
              updateCustomAmount();
            } else if (formData.selectedAmount) {
              const amountCard = document.querySelector(`[data-amount="${formData.selectedAmount}"]`);
              if (amountCard) {
                selectAmount(amountCard, formData.selectedAmount);
              }
            }
            
            if (formData.selectedPayment) {
              document.querySelectorAll('.payment-card').forEach(card => {
                card.classList.remove('selected');
              });
              
              const paymentCard = document.querySelector(`[data-method="${formData.selectedPayment}"]`);
              if (paymentCard) {
                paymentCard.classList.add('selected');
                selectedPayment = formData.selectedPayment;
              }
            }
          } catch (e) {
            console.warn('Failed to load form data:', e);
            sessionStorage.removeItem('topupFormData');
          }
        }
      }
      
      // ===== VALIDATION =====
      function validateCustomAmount(e) {
        const value = parseInt(e.target.value);
        if (value && value < 50) {
          showInputError(e.target, 'จำนวนเงินขั้นต่ำ ₿50');
        } else if (value && value > 100000) {
          showInputError(e.target, 'จำนวนเงินสูงสุด ₿100,000');
        } else {
          clearInputError(e.target);
        }
      }
      
      function showInputError(input, message) {
        input.style.borderColor = 'rgba(239, 68, 68, 0.4)';
        input.style.background = 'rgba(239, 68, 68, 0.1)';
        
        let errorMsg = input.parentNode.querySelector('.error-msg');
        if (!errorMsg) {
          errorMsg = document.createElement('div');
          errorMsg.className = 'error-msg';
          input.parentNode.appendChild(errorMsg);
        }
        errorMsg.textContent = message;
        setTimeout(() => errorMsg.style.opacity = '1', 50);
      }
      
      function clearInputError(input) {
        input.style.borderColor = '';
        input.style.background = '';
        
        const errorMsg = input.parentNode.querySelector('.error-msg');
        if (errorMsg) {
          errorMsg.style.opacity = '0';
          setTimeout(() => {
            if (errorMsg.parentNode) {
              errorMsg.parentNode.removeChild(errorMsg);
            }
          }, 300);
        }
      }
      
      // ===== EVENT HANDLERS =====
      function handleKeyboardNavigation(e) {
        if (e.key === 'Escape') {
          if (window.successModal) {
            closeSuccessModal();
          } else {
            closeSidebar();
          }
        }
        
        if (e.key === 'Enter' && selectedAmount >= 50 && !document.getElementById('confirmTopup').disabled) {
          processTopup();
        }
      }
      
      function handleEnterKey(e) {
        if (e.key === 'Enter') {
          e.preventDefault();
          updateCustomAmount();
          e.target.blur();
        }
      }
      
      function handleModalClose(e) {
        if (window.successModal && e.target === window.successModal) {
          closeSuccessModal();
        }
      }
      
      function setupPaymentTooltips() {
        document.querySelectorAll('.payment-card').forEach(card => {
          card.addEventListener('mouseenter', function() {
            const method = this.getAttribute('data-method');
            const feeInfo = {
              'promptpay': 'ไม่มีค่าธรรมเนียม',
              'card': 'ค่าธรรมเนียม 2.5%',
              'banking': 'ค่าธรรมเนียม ₿10',
              'wallet': 'ค่าธรรมเนียม 1.5%'
            };
            
            const desc = this.querySelector('.payment-desc');
            const originalText = desc.textContent;
            desc.textContent = feeInfo[method];
            desc.style.color = '#ff6b35';
            
            this.addEventListener('mouseleave', function() {
              desc.textContent = originalText;
              desc.style.color = 'rgba(255, 255, 255, 0.6)';
            }, { once: true });
          });
        });
      }
      
      // ===== UTILITIES =====
      function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
          const later = () => {
            clearTimeout(timeout);
            func(...args);
          };
          clearTimeout(timeout);
          timeout = setTimeout(later, wait);
        };
      }
      
      // Close sidebar when clicking outside
      document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.querySelector('.hamburger');
        
        if (!sidebar.contains(e.target) && !hamburger.contains(e.target)) {
          closeSidebar();
        }
      });
      
      // ===== CLEANUP =====
      window.addEventListener('beforeunload', function() {
        if (window.modalAutoCloseTimer) {
          clearTimeout(window.modalAutoCloseTimer);
        }
      });
    </script>
  </body>
</html>