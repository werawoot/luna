
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ช่วยเหลือและสนับสนุน - Luna Smart Home</title>
    <style>
        /* ===== RESET & BASE STYLES ===== */
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
            line-height: 1.6;
        }
        
        /* ===== MAIN CONTAINER ===== */
        .main-container {
            width: 100vw;
            min-height: 100vh;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            position: relative;
            overflow: hidden;
        }
        
        /* ===== BACKGROUND EFFECTS ===== */
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
        
        /* ===== NAVIGATION BAR ===== */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: rgba(26, 26, 26, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
        }
        
        .nav-logo {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .nav-logo-text {
            color: #fff;
            font-size: 20px;
            font-weight: 300;
            letter-spacing: -1px;
        }
        
        .nav-logo-dots {
            display: flex;
            gap: 3px;
        }
        
        .nav-dot {
            width: 5px;
            height: 5px;
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
        
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .user-name {
            color: #fff;
            font-size: 14px;
            font-weight: 500;
        }
        
        .back-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            color: rgba(255, 255, 255, 0.8);
            padding: 6px 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 12px;
            white-space: nowrap;
        }
        
        .back-btn:hover {
            background: rgba(255, 107, 53, 0.1);
            border-color: rgba(255, 107, 53, 0.3);
            color: #ff6b35;
        }
        
        /* ===== CONTENT WRAPPER ===== */
        .content-wrapper {
            padding-top: 60px;
            min-height: 100vh;
            padding-bottom: 40px;
        }
        
        /* ===== PAGE HEADER ===== */
        .page-header {
            text-align: center;
            padding: 30px 20px;
            position: relative;
            z-index: 10;
        }
        
        .page-title {
            color: #fff;
            font-size: 28px;
            font-weight: 300;
            margin-bottom: 8px;
        }
        
        .page-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
            font-weight: 300;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }
        
        /* ===== SUPPORT CONTAINER ===== */
        .support-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }
        
        /* ===== QUICK ACTIONS ===== */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .action-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .action-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 107, 53, 0.1);
            border-color: rgba(255, 107, 53, 0.3);
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.2);
        }
        
        .action-icon {
            font-size: 48px;
            margin-bottom: 15px;
            display: block;
        }
        
        .action-title {
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 10px;
        }
        
        .action-description {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        
        .action-status {
            color: #4ade80;
            font-size: 12px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        
        .status-indicator {
            width: 8px;
            height: 8px;
            background: #4ade80;
            border-radius: 50%;
            animation: pulse-green 2s ease-in-out infinite;
        }
        
        @keyframes pulse-green {
            0%, 100% { opacity: 0.4; transform: scale(0.8); }
            50% { opacity: 1; transform: scale(1.2); }
        }
        
        /* ===== SUPPORT SECTIONS ===== */
        .support-sections {
            display: grid;
            gap: 30px;
        }
        
        .support-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .section-icon {
            font-size: 28px;
        }
        
        .section-title {
            color: #fff;
            font-size: 22px;
            font-weight: 500;
        }
        
        /* ===== FAQ SECTION ===== */
        .faq-grid {
            display: grid;
            gap: 15px;
        }
        
        .faq-item {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .faq-question {
            padding: 18px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .faq-question:hover {
            background: rgba(255, 107, 53, 0.05);
        }
        
        .faq-question-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            font-weight: 500;
            flex: 1;
        }
        
        .faq-toggle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 20px;
            transition: all 0.3s ease;
        }
        
        .faq-item.active .faq-toggle {
            transform: rotate(180deg);
            color: #ff6b35;
        }
        
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            background: rgba(0, 0, 0, 0.2);
        }
        
        .faq-item.active .faq-answer {
            max-height: 200px;
        }
        
        .faq-answer-content {
            padding: 18px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            line-height: 1.6;
        }
        
        /* ===== CONTACT SECTION ===== */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .contact-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .contact-card:hover {
            background: rgba(255, 107, 53, 0.05);
            border-color: rgba(255, 107, 53, 0.2);
            transform: translateY(-2px);
        }
        
        .contact-icon {
            font-size: 32px;
            margin-bottom: 12px;
            display: block;
        }
        
        .contact-title {
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .contact-info {
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            margin-bottom: 5px;
        }
        
        .contact-availability {
            color: #4ade80;
            font-size: 11px;
            font-weight: 500;
        }
        
        /* ===== CONTACT FORM ===== */
        .contact-form {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 25px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
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
        
        .form-input,
        .form-select {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: #fff;
            padding: 12px 14px;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
        }
        
        .form-input:focus,
        .form-select:focus {
            border-color: rgba(255, 107, 53, 0.4);
            background: rgba(255, 107, 53, 0.1);
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }
        
        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }
        
        .form-textarea {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: #fff;
            padding: 12px 14px;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
            resize: vertical;
            min-height: 120px;
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
        
        /* ===== BUTTON STYLES ===== */
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            min-height: 44px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #ff6b35, #ff8c42);
            color: #fff;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.8);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
        
        .btn-full-width {
            width: 100%;
        }
        
        /* ===== KNOWLEDGE BASE ===== */
        .knowledge-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .knowledge-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .knowledge-card:hover {
            background: rgba(255, 107, 53, 0.05);
            border-color: rgba(255, 107, 53, 0.2);
            transform: translateY(-2px);
        }
        
        .knowledge-category {
            color: #ff6b35;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }
        
        .knowledge-title {
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .knowledge-excerpt {
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 12px;
        }
        
        .knowledge-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.5);
        }
        
        /* ===== SYSTEM STATUS ===== */
        .status-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }
        
        .status-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 16px;
            text-align: center;
        }
        
        .status-icon {
            font-size: 24px;
            margin-bottom: 8px;
            display: block;
        }
        .sidebar{
  top:70px;                       /* เดิม 60px */
  height:calc(100vh - 70px);      /* เดิม 60px */
}
        .status-title {
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 4px;
        }
        
        .status-value {
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-operational {
            color: #4ade80;
        }
        
        .status-warning {
            color: #fbbf24;
        }
        
        .status-error {
            color: #ef4444;
        }
        
        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }
            
            .page-subtitle {
                font-size: 12px;
            }
            
            .nav-actions .user-name {
                display: none;
            }
            
            .support-container {
                padding: 0 16px;
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .action-card {
                padding: 20px;
            }
            
            .action-icon {
                font-size: 40px;
                margin-bottom: 12px;
            }
            
            .action-title {
                font-size: 18px;
            }
            
            .support-section {
                padding: 20px;
                border-radius: 20px;
            }
            
            .section-title {
                font-size: 20px;
            }
            
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .knowledge-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .status-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
            
            .faq-question {
                padding: 15px;
            }
            
            .faq-answer-content {
                padding: 15px;
            }
        }
        
        @media (max-width: 480px) {
            .page-header {
                padding: 20px 16px;
            }
            
            .quick-actions {
                gap: 12px;
            }
            
            .action-card {
                padding: 16px;
            }
            
            .support-section {
                padding: 16px;
            }
            
            .contact-form {
                padding: 20px;
            }
            
            .status-grid {
                grid-template-columns: 1fr;
            }
            
            .form-input,
            .form-select,
            .form-textarea {
                padding: 10px 12px;
            }
        }
        
        /* ===== LOADING ANIMATION ===== */
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
        
        .support-section {
            animation: fadeIn 0.6s ease-out;
        }
        
        .support-section:nth-child(2) { animation-delay: 0.1s; }
        .support-section:nth-child(3) { animation-delay: 0.2s; }
        .support-section:nth-child(4) { animation-delay: 0.3s; }
        
        /* ===== SCROLLBAR STYLING ===== */
        .content-wrapper::-webkit-scrollbar {
            width: 6px;
        }
        
        .content-wrapper::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 3px;
        }
        
        .content-wrapper::-webkit-scrollbar-thumb {
            background: rgba(255, 107, 53, 0.5);
            border-radius: 3px;
        }
        
        .content-wrapper::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 107, 53, 0.7);
        }

        /* ===== MODAL ANIMATIONS ===== */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        /* ─── HAMBURGER ───────────────────── */
.hamburger{display:flex;flex-direction:column;cursor:pointer;padding:10px;transition:.3s}
.hamburger span{width:25px;height:3px;background:#fff;margin:3px 0;border-radius:2px;transition:.3s}
.hamburger.active span:nth-child(1){transform:rotate(45deg) translate(5px,5px)}
.hamburger.active span:nth-child(2){opacity:0}
.hamburger.active span:nth-child(3){transform:rotate(-45deg) translate(7px,-6px)}

/* ─── SIDEBAR ─────────────────────── */
.sidebar{position:fixed;top:60px;  /* 60px = navbar เดิมของหน้า 1 */
        right:-350px;width:350px;height:calc(100vh-60px);
        background:rgba(26,26,26,.98);backdrop-filter:blur(30px);
        border-left:1px solid rgba(255,255,255,.1);
        transition:.4s cubic-bezier(.4,0,.2,1);z-index:999;overflow-y:auto}
.sidebar.open{right:0}
.sidebar-content{padding:30px 20px}
.sidebar-section{margin-bottom:40px}
.sidebar-title{color:#fff;font-size:18px;font-weight:500;margin-bottom:20px;
               padding-bottom:10px;border-bottom:1px solid rgba(255,107,53,.3)}
.menu-item{display:flex;align-items:center;gap:15px;padding:15px 20px;
           color:rgba(255,255,255,.8);text-decoration:none;border-radius:12px;
           margin-bottom:8px;cursor:pointer;transition:.3s}
.menu-item:hover,.menu-item.active{background:rgba(255,107,53,.1);color:#ff6b35;transform:translateX(5px)}
.menu-icon{font-size:20px;width:24px;text-align:center}

/* ─── OVERLAY ─────────────────────── */
.overlay{position:fixed;top:0;left:0;width:100vw;height:100vh;
         background:rgba(0,0,0,.5);opacity:0;visibility:hidden;
         transition:.3s;z-index:998}

.overlay.active{opacity:1;visibility:visible}
.navbar{height:70px}
.content-wrapper{padding-top:70px}

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
<!-- Overlay (คลิกพื้นมืดเพื่อปิด Sidebar) -->
<div class="overlay" onclick="closeSidebar()"></div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div class="sidebar-content">
    <!-- หน้าหลัก -->
    <div class="sidebar-section">
      <div class="sidebar-title">หน้าหลัก</div>
      <div class="menu-item" onclick="window.location.href='index.php'">
        <span class="menu-icon">🏠</span><span>แดชบอร์ด</span>
      </div>
    </div>

    <!-- การจัดการ -->
    <div class="sidebar-section">
      <div class="sidebar-title">การจัดการ</div>
      <div class="menu-item" onclick="window.location.href='devices.php'">
        <span class="menu-icon">⚡</span><span>จัดการอุปกรณ์</span>
      </div>
      <div class="menu-item" onclick="window.location.href='usage.php'">
        <span class="menu-icon">📊</span><span>สถิติการใช้งาน</span>
      </div>
      <div class="menu-item" onclick="window.location.href='billing.php'">
        <span class="menu-icon">💳</span><span>ประวัติการชำระ</span>
      </div>
      <div class="menu-item" onclick="window.location.href='topup.php'">
        <span class="menu-icon">💰</span><span>เติมเงิน</span>
      </div>
    </div>
    <!-- ตั้งค่า -->
    <div class="sidebar-section">
      <div class="sidebar-title">ตั้งค่า</div>
      <div class="menu-item" onclick="window.location.href='profile.php'">
        <span class="menu-icon">👤</span><span>โปรไฟล์</span>
      </div>
      <div class="menu-item" onclick="window.location.href='notifications.php'">
        <span class="menu-icon">🔔</span><span>การแจ้งเตือน</span>
      </div>
      <div class="menu-item" onclick="window.location.href='settings.php'">
        <span class="menu-icon">⚙️</span><span>ตั้งค่าระบบ</span>
      </div>
      <div class="menu-item active" onclick="window.location.href='support.php'">
        <span class="menu-icon">❓</span><span>ศูนย์ช่วยเหลือ</span>
      </div>
    </div>
  </div>
</div>


        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">ช่วยเหลือและสนับสนุน</h1>
                <p class="page-subtitle">HELP & SUPPORT</p>
            </div>

            <div class="support-container">
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <div class="action-card" onclick="startLiveChat()">
                        <span class="action-icon">💬</span>
                        <h3 class="action-title">แชทสด</h3>
                        <p class="action-description">พูดคุยกับทีมสนับสนุนแบบเรียลไทม์</p>
                        <div class="action-status">
                            <div class="status-indicator"></div>
                            ออนไลน์ 24/7
                        </div>
                    </div>
                    
                    <div class="action-card" onclick="callSupport()">
                        <span class="action-icon">📞</span>
                        <h3 class="action-title">โทรศัพท์</h3>
                        <p class="action-description">โทรหาทีมสนับสนุนโดยตรง</p>
                        <div class="action-status">
                            <div class="status-indicator"></div>
                            เปิดให้บริการ 08:00-20:00
                        </div>
                    </div>
                    
                    <div class="action-card" onclick="sendEmail()">
                        <span class="action-icon">📧</span>
                        <h3 class="action-title">อีเมล</h3>
                        <p class="action-description">ส่งคำถามและรับคำตอบภายใน 24 ชั่วโมง</p>
                        <div class="action-status">
                            <div class="status-indicator"></div>
                            ตอบกลับรวดเร็ว
                        </div>
                    </div>
                </div>

                <div class="support-sections">
                    <!-- FAQ Section -->
                    <div class="support-section">
                        <div class="section-header">
                            <span class="section-icon">❓</span>
                            <h2 class="section-title">คำถามที่พบบ่อย</h2>
                        </div>
                        
                        <div class="faq-grid">
                            <div class="faq-item" onclick="toggleFAQ(this)">
                                <div class="faq-question">
                                    <span class="faq-question-text">ทำไมอุปกรณ์ไม่เชื่อมต่อ?</span>
                                    <span class="faq-toggle">▼</span>
                                </div>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        ตรวจสอบการเชื่อมต่อ Wi-Fi, รีสตาร์ทอุปกรณ์ และตรวจสอบว่าอุปกรณ์อยู่ในระยะสัญญาณที่ดี หากยังมีปัญหา โปรดติดต่อทีมสนับสนุน
                                    </div>
                                </div>
                            </div>
                            
                            <div class="faq-item" onclick="toggleFAQ(this)">
                                <div class="faq-question">
                                    <span class="faq-question-text">วิธีดูสถิติการใช้งาน?</span>
                                    <span class="faq-toggle">▼</span>
                                </div>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        เข้าไปที่เมนู "สถิติการใช้งาน" ในแอป คุณจะเห็นข้อมูลการใช้ไฟฟ้าและน้ำรายวัน รายเดือน และสามารถเปรียบเทียบกับเดือนก่อนได้
                                    </div>
                                </div>
                            </div>
                            
                            <div class="faq-item" onclick="toggleFAQ(this)">
                                <div class="faq-question">
                                    <span class="faq-question-text">ค่าไฟฟ้าคำนวณอย่างไร?</span>
                                    <span class="faq-toggle">▼</span>
                                </div>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        ระบบคำนวณตามหน่วยการใช้งานจริง (kWh) คูณกับอัตราค่าไฟฟ้าปัจจุบัน พร้อมส่วนลดสำหรับการใช้งานในช่วงเวลาประหยัดพลังงาน
                                    </div>
                                </div>
                            </div>
                            
                            <div class="faq-item" onclick="toggleFAQ(this)">
                                <div class="faq-question">
                                    <span class="faq-question-text">วิธีตั้งค่าโหมดประหยัดพลังงาน?</span>
                                    <span class="faq-toggle">▼</span>
                                </div>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        ไปที่ "การตั้งค่า" > "จัดการพลังงาน" > เปิด "โหมดประหยัดพลังงาน" ระบบจะปรับการทำงานของอุปกรณ์อัตโนมัติ
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Section -->
                    <div class="support-section">
                        <div class="section-header">
                            <span class="section-icon">📞</span>
                            <h2 class="section-title">ติดต่อเรา</h2>
                        </div>
                        
                        <div class="contact-grid">
                            <div class="contact-card" onclick="openContact('phone')">
                                <span class="contact-icon">📱</span>
                                <h3 class="contact-title">โทรศัพท์</h3>
                                <div class="contact-info">02-555-0123</div>
                                <div class="contact-info">080-123-4567</div>
                                <div class="contact-availability">จันทร์-ศุกร์ 08:00-20:00</div>
                            </div>
                            
                            <div class="contact-card" onclick="openContact('email')">
                                <span class="contact-icon">📧</span>
                                <h3 class="contact-title">อีเมล</h3>
                                <div class="contact-info">support@luna.co.th</div>
                                <div class="contact-info">help@luna.co.th</div>
                                <div class="contact-availability">ตอบกลับภายใน 24 ชม.</div>
                            </div>
                            
                            <div class="contact-card" onclick="openContact('line')">
                                <span class="contact-icon">💚</span>
                                <h3 class="contact-title">LINE Official</h3>
                                <div class="contact-info">@LunaSmartHome</div>
                                <div class="contact-info">ID: luna-support</div>
                                <div class="contact-availability">ออนไลน์ 24/7</div>
                            </div>
                            
                            <div class="contact-card" onclick="openContact('location')">
                                <span class="contact-icon">📍</span>
                                <h3 class="contact-title">สำนักงาน</h3>
                                <div class="contact-info">99/9 ถ.สุขุมวิท</div>
                                <div class="contact-info">กรุงเทพฯ 10110</div>
                                <div class="contact-availability">จันทร์-ศุกร์ 09:00-18:00</div>
                            </div>
                        </div>
                        
                        <div class="contact-form">
                            <h3 style="color: #fff; margin-bottom: 20px; font-size: 18px;">ส่งข้อความถึงเรา</h3>
                            <form id="supportForm" onsubmit="submitSupportForm(event)">
                                <div class="form-grid">
                                    <div class="form-group">
                                        <label class="form-label">ชื่อ-นามสกุล *</label>
                                        <input type="text" class="form-input" name="fullName" placeholder="กรุณากรอกชื่อ-นามสกุล" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">อีเมล *</label>
                                        <input type="email" class="form-input" name="email" placeholder="example@email.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">หมายเลขโทรศัพท์</label>
                                        <input type="tel" class="form-input" name="phone" placeholder="08X-XXX-XXXX">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">หมวดหมู่ปัญหา</label>
                                        <select class="form-select" name="category">
                                            <option value="">เลือกหมวดหมู่</option>
                                            <option value="technical">ปัญหาทางเทคนิค</option>
                                            <option value="billing">การเรียกเก็บเงิน</option>
                                            <option value="device">อุปกรณ์ไม่ทำงาน</option>
                                            <option value="account">บัญชีผู้ใช้</option>
                                            <option value="suggestion">ข้อเสนอแนะ</option>
                                            <option value="other">อื่นๆ</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">รายละเอียดปัญหา *</label>
                                    <textarea class="form-textarea" name="message" placeholder="กรุณาอธิบายปัญหาที่พบอย่างละเอียด..." required></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-full-width">
                                    📤 ส่งข้อความ
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Knowledge Base -->
                    <div class="support-section">
                        <div class="section-header">
                            <span class="section-icon">📚</span>
                            <h2 class="section-title">คู่มือการใช้งาน</h2>
                        </div>
                        
                        <div class="knowledge-grid">
                            <div class="knowledge-card" onclick="openGuide('setup')">
                                <div class="knowledge-category">การติดตั้ง</div>
                                <h3 class="knowledge-title">วิธีติดตั้งระบบ Luna Smart Home</h3>
                                <p class="knowledge-excerpt">คู่มือการติดตั้งอุปกรณ์และตั้งค่าเริ่มต้นใช้งาน...</p>
                                <div class="knowledge-meta">
                                    <span>อัพเดทล่าสุด: 15 ธ.ค. 2024</span>
                                    <span>⭐ 4.8/5</span>
                                </div>
                            </div>
                            
                            <div class="knowledge-card" onclick="openGuide('troubleshooting')">
                                <div class="knowledge-category">แก้ไขปัญหา</div>
                                <h3 class="knowledge-title">การแก้ไขปัญหาเบื้องต้น</h3>
                                <p class="knowledge-excerpt">วิธีแก้ไขปัญหาที่พบบ่อยและการตรวจสอบระบบ...</p>
                                <div class="knowledge-meta">
                                    <span>อัพเดทล่าสุด: 12 ธ.ค. 2024</span>
                                    <span>⭐ 4.6/5</span>
                                </div>
                            </div>
                            
                            <div class="knowledge-card" onclick="openGuide('features')">
                                <div class="knowledge-category">ฟีเจอร์</div>
                                <h3 class="knowledge-title">การใช้งานฟีเจอร์ขั้นสูง</h3>
                                <p class="knowledge-excerpt">เรียนรู้การใช้งานฟีเจอร์อัตโนมัติและการตั้งค่าขั้นสูง...</p>
                                <div class="knowledge-meta">
                                    <span>อัพเดทล่าสุด: 10 ธ.ค. 2024</span>
                                    <span>⭐ 4.7/5</span>
                                </div>
                            </div>
                            
                            <div class="knowledge-card" onclick="openGuide('billing')">
                                <div class="knowledge-category">การเงิน</div>
                                <h3 class="knowledge-title">ระบบการชำระเงินและเติมเงิน</h3>
                                <p class="knowledge-excerpt">วิธีการเติมเงิน ตรวจสอบยอดคงเหลือ และการชำระค่าบริการ...</p>
                                <div class="knowledge-meta">
                                    <span>อัพเดทล่าสุด: 8 ธ.ค. 2024</span>
                                    <span>⭐ 4.9/5</span>
                                </div>
                            </div>
                            
                            <div class="knowledge-card" onclick="openGuide('mobile')">
                                <div class="knowledge-category">แอปมือถือ</div>
                                <h3 class="knowledge-title">การใช้งานแอป Luna บนมือถือ</h3>
                                <p class="knowledge-excerpt">คู่มือการใช้งานแอปพลิเคชันบนโทรศัพท์มือถือ...</p>
                                <div class="knowledge-meta">
                                    <span>อัพเดทล่าสุด: 5 ธ.ค. 2024</span>
                                    <span>⭐ 4.5/5</span>
                                </div>
                            </div>
                            
                            <div class="knowledge-card" onclick="openGuide('security')">
                                <div class="knowledge-category">ความปลอดภัย</div>
                                <h3 class="knowledge-title">การรักษาความปลอดภัยบัญชี</h3>
                                <p class="knowledge-excerpt">วิธีตั้งรหัสผ่านที่แข็งแกร่งและการรักษาความปลอดภัย...</p>
                                <div class="knowledge-meta">
                                    <span>อัพเดทล่าสุด: 3 ธ.ค. 2024</span>
                                    <span>⭐ 4.8/5</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Status -->
                    <div class="support-section">
                        <div class="section-header">
                            <span class="section-icon">🔧</span>
                            <h2 class="section-title">สถานะระบบ</h2>
                        </div>
                        
                        <div class="status-grid">
                            <div class="status-card">
                                <span class="status-icon">🌐</span>
                                <h3 class="status-title">เซิร์ฟเวอร์หลัก</h3>
                                <div class="status-value status-operational">ทำงานปกติ</div>
                            </div>
                            
                            <div class="status-card">
                                <span class="status-icon">📱</span>
                                <h3 class="status-title">แอปมือถือ</h3>
                                <div class="status-value status-operational">ทำงานปกติ</div>
                            </div>
                            
                            <div class="status-card">
                                <span class="status-icon">💳</span>
                                <h3 class="status-title">ระบบชำระเงิน</h3>
                                <div class="status-value status-operational">ทำงานปกติ</div>
                            </div>
                            
                            <div class="status-card">
                                <span class="status-icon">📊</span>
                                <h3 class="status-title">ระบบสถิติ</h3>
                                <div class="status-value status-warning">บำรุงรักษา</div>
                            </div>
                            
                            <div class="status-card">
                                <span class="status-icon">🔔</span>
                                <h3 class="status-title">การแจ้งเตือน</h3>
                                <div class="status-value status-operational">ทำงานปกติ</div>
                            </div>
                            
                            <div class="status-card">
                                <span class="status-icon">☁️</span>
                                <h3 class="status-title">ระบบคลาวด์</h3>
                                <div class="status-value status-operational">ทำงานปกติ</div>
                            </div>
                        </div>
                        
                        <div style="text-align: center; margin-top: 20px;">
                            <button class="btn btn-secondary" onclick="checkSystemStatus()">
                                🔄 ตรวจสอบสถานะล่าสุด
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ===== SUPPORT FUNCTIONS =====
        
        // FAQ Toggle Function
        function toggleFAQ(element) {
            const isActive = element.classList.contains('active');
            
            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Toggle current item
            if (!isActive) {
                element.classList.add('active');
                
                // Add haptic feedback on mobile
                if (navigator.vibrate) {
                    navigator.vibrate(50);
                }
            }
        }
        
        // Live Chat Function
        function startLiveChat() {
            // Show loading state
            showLoadingModal('กำลังเชื่อมต่อแชทสด...');
            
            // Simulate connection delay
            setTimeout(() => {
                hideLoadingModal();
                showChatModal();
            }, 2000);
        }
        
        // Call Support Function
        function callSupport() {
            if (confirm('ต้องการโทรไปที่ 02-555-0123 หรือไม่?')) {
                window.location.href = 'tel:025550123';
            }
        }
        
        // Send Email Function
        function sendEmail() {
            const subject = encodeURIComponent('Luna Smart Home - ขอความช่วยเหลือ');
            const body = encodeURIComponent('เรียนทีมสนับสนุน Luna,\n\nกรุณาระบุปัญหาที่พบ:\n\n\n\nข้อมูลการติดต่อกลับ:\nชื่อ: \nโทร: \n\nขอบคุณครับ/ค่ะ');
            window.location.href = `mailto:support@luna.co.th?subject=${subject}&body=${body}`;
        }
        
        // Contact Functions
        function openContact(type) {
            switch(type) {
                case 'phone':
                    if (confirm('ต้องการโทรไปที่ 02-555-0123 หรือไม่?')) {
                        window.location.href = 'tel:025550123';
                    }
                    break;
                case 'email':
                    sendEmail();
                    break;
                case 'line':
                    window.open('https://line.me/ti/p/@LunaSmartHome', '_blank');
                    break;
                case 'location':
                    window.open('https://maps.google.com/?q=99/9+สุขุมวิท+กรุงเทพฯ', '_blank');
                    break;
            }
        }
        
        // Support Form Submission
        function submitSupportForm(event) {
            event.preventDefault();
            
            const form = event.target;
            const formData = new FormData(form);
            const data = Object.fromEntries(formData);
            
            // Validate required fields
            if (!data.fullName || !data.email || !data.message) {
                showErrorMessage('กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน');
                return;
            }
            
            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '📤 กำลังส่ง...';
            submitBtn.disabled = true;
            
            // Simulate form submission
            setTimeout(() => {
                // Reset form
                form.reset();
                
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Show success message
                showSuccessMessage('ส่งข้อความเรียบร้อยแล้ว! เราจะติดต่อกลับภายใน 24 ชั่วโมง');
                
                // Save to localStorage (in real app, would send to server)
                saveSupportTicket(data);
            }, 2000);
        }
        
        // Knowledge Base Functions
        function openGuide(guideId) {
            const guides = {
                setup: 'https://help.luna.co.th/setup',
                troubleshooting: 'https://help.luna.co.th/troubleshooting',
                features: 'https://help.luna.co.th/features',
                billing: 'https://help.luna.co.th/billing',
                mobile: 'https://help.luna.co.th/mobile-app',
                security: 'https://help.luna.co.th/security'
            };
            
            // In a real app, would open internal guide viewer
            showInfoModal('กำลังเปิดคู่มือการใช้งาน...', `URL: ${guides[guideId] || '#'}`);
        }
        
        // System Status Check
        function checkSystemStatus() {
            const statusCards = document.querySelectorAll('.status-card');
            
            // Show loading state
            statusCards.forEach(card => {
                const statusValue = card.querySelector('.status-value');
                statusValue.textContent = 'ตรวจสอบ...';
                statusValue.className = 'status-value';
            });
            
            // Simulate status check
            setTimeout(() => {
                // Reset status (in real app, would fetch from API)
                const statuses = [
                    { text: 'ทำงานปกติ', class: 'status-operational' },
                    { text: 'ทำงานปกติ', class: 'status-operational' },
                    { text: 'ทำงานปกติ', class: 'status-operational' },
                    { text: 'บำรุงรักษา', class: 'status-warning' },
                    { text: 'ทำงานปกติ', class: 'status-operational' },
                    { text: 'ทำงานปกติ', class: 'status-operational' }
                ];
                
                statusCards.forEach((card, index) => {
                    const statusValue = card.querySelector('.status-value');
                    const status = statuses[index];
                    statusValue.textContent = status.text;
                    statusValue.className = `status-value ${status.class}`;
                });
                
                showSuccessMessage('สถานะระบบอัพเดทแล้ว');
            }, 1500);
        }
        
        // ===== UTILITY FUNCTIONS =====
        
        function showLoadingModal(message) {
            const modal = createModal(`
                <div style="text-align: center; padding: 20px;">
                    <div style="font-size: 32px; margin-bottom: 15px;">⏳</div>
                    <div style="color: #fff; font-size: 16px;">${message}</div>
                </div>
            `);
            document.body.appendChild(modal);
        }
        
        function hideLoadingModal() {
            const modal = document.querySelector('.modal-overlay');
            if (modal) {
                modal.remove();
            }
        }
        
        function showChatModal() {
            const modal = createModal(`
                <div style="padding: 20px;">
                    <h3 style="color: #fff; margin-bottom: 15px; text-align: center;">💬 แชทสด</h3>
                    <div style="background: rgba(255,255,255,0.05); border-radius: 8px; padding: 15px; margin-bottom: 15px; min-height: 200px; border: 1px solid rgba(255,255,255,0.1);">
                        <div style="color: rgba(255,255,255,0.6); font-size: 14px; text-align: center; margin-top: 80px;">
                            💬 ยินดีต้อนรับสู่แชทสด Luna<br>
                            ทีมสนับสนุนจะตอบกลับในไม่ช้า...
                        </div>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <input type="text" placeholder="พิมพ์ข้อความ..." style="flex: 1; padding: 10px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #fff;">
                        <button onclick="sendChatMessage()" style="padding: 10px 15px; background: linear-gradient(135deg, #ff6b35, #ff8c42); border: none; border-radius: 6px; color: #fff; cursor: pointer;">ส่ง</button>
                    </div>
                </div>
            `);
            document.body.appendChild(modal);
        }
        
        function sendChatMessage() {
            showSuccessMessage('ข้อความถูกส่งแล้ว! ทีมสนับสนุนจะตอบกลับเร็วๆ นี้');
            hideLoadingModal();
        }
        
        function showSuccessMessage(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: linear-gradient(135deg, #4ade80, #22c55e);
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 500;
                z-index: 10000;
                box-shadow: 0 4px 12px rgba(74, 222, 128, 0.3);
                max-width: 300px;
                animation: slideIn 0.3s ease-out;
            `;
            notification.innerHTML = `✅ ${message}`;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideIn 0.3s ease-out reverse';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }
        
        function showErrorMessage(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: linear-gradient(135deg, #ef4444, #dc2626);
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 500;
                z-index: 10000;
                box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
                max-width: 300px;
                animation: slideIn 0.3s ease-out;
            `;
            notification.innerHTML = `❌ ${message}`;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideIn 0.3s ease-out reverse';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }
        
        function showInfoModal(title, content) {
            const modal = createModal(`
                <div style="padding: 20px; text-align: center;">
                    <h3 style="color: #fff; margin-bottom: 15px;">${title}</h3>
                    <p style="color: rgba(255,255,255,0.7); margin-bottom: 20px;">${content}</p>
                    <button onclick="hideLoadingModal()" style="padding: 10px 20px; background: linear-gradient(135deg, #ff6b35, #ff8c42); border: none; border-radius: 6px; color: #fff; cursor: pointer;">ตกลง</button>
                </div>
            `);
            document.body.appendChild(modal);
        }
        
        function createModal(content) {
            const overlay = document.createElement('div');
            overlay.className = 'modal-overlay';
            overlay.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0,0,0,0.8);
                backdrop-filter: blur(10px);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10000;
                animation: fadeIn 0.3s ease-out;
            `;
            
            const modal = document.createElement('div');
            modal.style.cssText = `
                background: rgba(26, 26, 26, 0.95);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 16px;
                max-width: 500px;
                width: 90%;
                max-height: 80vh;
                overflow-y: auto;
                position: relative;
            `;
            modal.innerHTML = content;
            
            // Close on overlay click
            overlay.addEventListener('click', (e) => {
                if (e.target === overlay) {
                    overlay.remove();
                }
            });
            
            // Add close button
            const closeBtn = document.createElement('button');
            closeBtn.innerHTML = '✕';
            closeBtn.style.cssText = `
                position: absolute;
                top: 10px;
                right: 10px;
                background: none;
                border: none;
                color: rgba(255,255,255,0.6);
                font-size: 18px;
                cursor: pointer;
                padding: 5px;
                border-radius: 50%;
                transition: all 0.3s ease;
            `;  
            closeBtn.onmouseover = () => {
                closeBtn.style.background = 'rgba(255,255,255,0.1)';
                closeBtn.style.color = '#fff';
            };
            closeBtn.onmouseleave = () => {
                closeBtn.style.background = 'none';
                closeBtn.style.color = 'rgba(255,255,255,0.6)';
            };
            closeBtn.onclick = () => overlay.remove();
            
            modal.appendChild(closeBtn);
            overlay.appendChild(modal);
            
            return overlay;
        }
        
        function saveSupportTicket(data) {
            try {
                const tickets = JSON.parse(localStorage.getItem('supportTickets') || '[]');
                const ticket = {
                    id: Date.now(),
                    ...data,
                    timestamp: new Date().toISOString(),
                    status: 'pending'
                };
                tickets.push(ticket);
                localStorage.setItem('supportTickets', JSON.stringify(tickets));
            } catch (error) {
                console.log('LocalStorage not available - ticket saved to session only');
            }
        }
        
        // ===== INITIALIZATION =====
        
        document.addEventListener('DOMContentLoaded', function() {
            // Set user name if available
     
       const nameHolder = document.getElementById('userName');
if (nameHolder) {
  nameHolder.textContent = localStorage.getItem('userName') || 'ผู้ใช้';
}
            
            // Add keyboard navigation for FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        toggleFAQ(this);
                    }
                });
                
                // Make FAQ items focusable
                item.setAttribute('tabindex', '0');
            });
            
            // Add form validation
            const form = document.getElementById('supportForm');
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (!this.value.trim()) {
                        this.style.borderColor = 'rgba(239, 68, 68, 0.4)';
                    } else {
                        this.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                    }
                });
                
                input.addEventListener('input', function() {
                    if (this.value.trim()) {
                        this.style.borderColor = 'rgba(74, 222, 128, 0.4)';
                    }
                });
            });
            
            // Auto-resize textarea
            const textarea = document.querySelector('.form-textarea');
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = Math.max(120, this.scrollHeight) + 'px';
            });
            
            // Add smooth scrolling to sections
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            console.log('Luna Support Page loaded successfully');
        });
        
        // ===== ERROR HANDLING =====
        
        window.addEventListener('error', function(e) {
            console.error('Page error:', e.error);
            showErrorMessage('เกิดข้อผิดพลาดระหว่างการใช้งาน โปรดรีเฟรชหน้าและลองใหม่');
        });
        
        /* ─── SIDEBAR CONTROL ───────────────── */
function toggleSidebar(){
  const sb = document.getElementById('sidebar');
  const hb = document.querySelector('.hamburger');
  const ov = document.querySelector('.overlay');
  sb.classList.toggle('open');
  hb.classList.toggle('active');
  ov.classList.toggle('active');
}
function closeSidebar(){
  document.getElementById('sidebar').classList.remove('open');
  document.querySelector('.hamburger').classList.remove('active');
  document.querySelector('.overlay').classList.remove('active');
}
/* ปิด sidebar เมื่อกด ESC */
document.addEventListener('keydown',e=>{
  if(e.key==='Escape'){ closeSidebar(); }
});

        // ===== PERFORMANCE MONITORING =====   
        
        window.addEventListener('load', function() {
            if ('performance' in window) {
                const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
                console.log(`Page loaded in ${loadTime}ms`);
            }
        });
    </script>
</body>
</html>