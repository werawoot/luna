<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การตั้งค่า - Luna Smart Home</title>
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
        
        /* ===== SIDEBAR ===== */
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
        
        /* ===== CONTENT WRAPPER ===== */
        .content-wrapper {
            padding-top: 70px;
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
        
        /* ===== SETTINGS CONTAINER ===== */
        .settings-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 10;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 30px;
        }
        
        /* ===== MOBILE SETTINGS TABS ===== */
        .mobile-settings-tabs {
            display: none;
            padding: 0 20px 20px;
            position: relative;
            z-index: 10;
        }
        
        .mobile-tabs-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 8px;
        }
        
        .mobile-tabs-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }
        
        .mobile-tab {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            padding: 12px 8px;
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 12px;
            text-align: center;
        }
        
        .mobile-tab:hover,
        .mobile-tab.active {
            background: rgba(255, 107, 53, 0.2);
            color: #ff6b35;
        }
        
        .mobile-tab-icon {
            font-size: 20px;
            margin-bottom: 2px;
        }
        
        .mobile-tab-label {
            font-size: 10px;
            font-weight: 500;
            line-height: 1.2;
        }
        
        /* ===== SETTINGS SIDEBAR ===== */
        .settings-sidebar {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 30px;
            height: fit-content;
            position: sticky;
            top: 90px;
        }
        
        .settings-sidebar-title {
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .settings-nav {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .nav-item:hover {
            background: rgba(255, 107, 53, 0.1);
            color: #ff6b35;
        }
        
        .nav-item.active {
            background: rgba(255, 107, 53, 0.2);
            color: #ff6b35;
            border: 1px solid rgba(255, 107, 53, 0.3);
        }
        
        .nav-icon {
            font-size: 18px;
            width: 20px;
            text-align: center;
        }
        
        .nav-label {
            font-size: 14px;
            font-weight: 500;
        }
        
        /* ===== SETTINGS CONTENT ===== */
        .settings-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        
        .settings-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 25px;
            display: none;
        }
        
        .settings-section.active {
            display: block;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .section-title {
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 5px;
        }
        
        .section-icon {
            font-size: 24px;
        }
        
        .section-description {
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            line-height: 1.4;
        }
        
        /* ===== FORM ELEMENTS ===== */
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
        
        .form-select option {
            background: #1a1a1a;
            color: #fff;
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
            min-height: 80px;
            font-family: inherit;
        }
        
        .form-textarea:focus {
            border-color: rgba(255, 107, 53, 0.4);
            background: rgba(255, 107, 53, 0.1);
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }
        
        /* ===== TOGGLE SWITCH ===== */
        .toggle-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .toggle-group:last-child {
            border-bottom: none;
        }
        
        .toggle-info {
            flex: 1;
            margin-right: 15px;
        }
        
        .toggle-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 4px;
        }
        
        .toggle-desc {
            color: rgba(255, 255, 255, 0.6);
            font-size: 12px;
            line-height: 1.4;
        }
        
        .toggle-switch {
            position: relative;
            width: 52px;
            height: 28px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }
        
        .toggle-switch.active {
            background: linear-gradient(135deg, #ff6b35, #ff8c42);
        }
        
        .toggle-slider {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 24px;
            height: 24px;
            background: #fff;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        
        .toggle-switch.active .toggle-slider {
            left: 26px;
        }
        
        /* ===== RANGE SLIDER ===== */
        .range-group {
            margin: 20px 0;
        }
        
        .range-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .range-value {
            color: #ff6b35;
            font-weight: 600;
            font-size: 14px;
        }
        
        .range-slider {
            width: 100%;
            height: 6px;
            border-radius: 3px;
            background: rgba(255, 255, 255, 0.1);
            outline: none;
            appearance: none;
            cursor: pointer;
        }
        
        .range-slider::-webkit-slider-thumb {
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b35, #ff8c42);
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        
        .range-slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b35, #ff8c42);
            cursor: pointer;
            border: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        
        /* ===== COLOR PICKER ===== */
        .color-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin: 15px 0;
        }
        
        .color-option {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            border: 3px solid transparent;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .color-option.selected {
            border-color: #fff;
            transform: scale(1.1);
        }
        
        .color-option::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-weight: bold;
            opacity: 0;
            transition: all 0.3s ease;
            font-size: 12px;
        }
        
        .color-option.selected::after {
            opacity: 1;
        }
        
        /* ===== BUTTON STYLES ===== */
        .btn {
            padding: 12px 20px;
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
        
        .btn-danger {
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.4);
            color: #ef4444;
        }
        
        .btn-danger:hover {
            background: rgba(239, 68, 68, 0.3);
            transform: translateY(-2px);
        }
        
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 25px;
            flex-wrap: wrap;
        }
        
        /* ===== DEVICE CARDS ===== */
        .device-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
            margin: 20px 0;
        }
        
        .device-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 18px;
            transition: all 0.3s ease;
        }
        
        .device-card:hover {
            background: rgba(255, 107, 53, 0.05);
            border-color: rgba(255, 107, 53, 0.2);
        }
        
        .device-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }
        
        .device-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #ff6b35, #ff8c42);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #fff;
            flex-shrink: 0;
        }
        
        .device-info {
            flex: 1;
            min-width: 0;
        }
        
        .device-name {
            color: #fff;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 3px;
        }
        
        .device-status {
            color: rgba(255, 255, 255, 0.6);
            font-size: 11px;
        }
        
        .device-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .device-value {
            color: #ff6b35;
            font-size: 13px;
            font-weight: 600;
        }
        
        /* ===== STATISTICS CARDS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 16px;
            margin: 20px 0;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 18px;
            text-align: center;
        }
        
        .stat-icon {
            font-size: 28px;
            margin-bottom: 8px;
            display: block;
        }
        
        .stat-value {
            font-size: 20px;
            font-weight: 600;
            color: #ff6b35;
            margin-bottom: 4px;
        }
        
        .stat-label {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 768px) {
            .sidebar {
                width: 100vw;
                right: -100vw;
            }
            
            .page-title {
                font-size: 24px;
            }
            
            .page-subtitle {
                font-size: 12px;
            }
            
            .settings-container {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 0 16px;
            }
            
            .settings-sidebar {
                display: none;
            }
            
            .mobile-settings-tabs {
                display: block;
            }
            
            .settings-section {
                padding: 20px;
                border-radius: 20px;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            
            .section-title {
                font-size: 18px;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .device-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
            
            .button-group {
                flex-direction: column;
                gap: 10px;
            }
            
            .toggle-group {
                padding: 14px 0;
            }
            
            .toggle-info {
                margin-right: 12px;
            }
            
            .toggle-label {
                font-size: 14px;
            }
            
            .toggle-desc {
                font-size: 11px;
            }
            
            .color-group {
                gap: 10px;
            }
            
            .color-option {
                width: 32px;
                height: 32px;
            }
            
            .range-group {
                margin: 16px 0;
            }
        }
        
        @media (max-width: 480px) {
            .page-header {
                padding: 20px 16px;
            }
            
            .mobile-tabs-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 6px;
            }
            
            .mobile-tab {
                padding: 10px 6px;
            }
            
            .mobile-tab-icon {
                font-size: 18px;
            }
            
            .mobile-tab-label {
                font-size: 9px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .device-header {
                gap: 10px;
            }
            
            .device-icon {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }
            
            .device-name {
                font-size: 14px;
            }
            
            .form-input,
            .form-select,
            .form-textarea {
                padding: 10px 12px;
            }
        }
        
        /* ===== LARGE SCREEN OPTIMIZATION ===== */
        @media (min-width: 1200px) {
            .settings-container {
                gap: 40px;
            }
            
            .settings-sidebar {
                width: 320px;
            }
            
            .form-grid {
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            }
            
            .device-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
            
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
        
        .settings-section.active {
            animation: fadeIn 0.3s ease-out;
        }
        
        /* ===== NOTIFICATION ANIMATIONS ===== */
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
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
                    <div class="menu-item active">
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
                <h1 class="page-title">ตั้งค่าระบบ</h1>
                <p class="page-subtitle">SYSTEM SETTINGS</p>
            </div>

            <!-- Mobile Settings Tabs -->
            <div class="mobile-settings-tabs">
                <div class="mobile-tabs-container">
                    <div class="mobile-tabs-grid">
                        <div class="mobile-tab active" onclick="showSection('general')">
                            <div class="mobile-tab-icon">⚙️</div>
                            <div class="mobile-tab-label">ทั่วไป</div>
                        </div>
                        <div class="mobile-tab" onclick="showSection('network')">
                            <div class="mobile-tab-icon">🌐</div>
                            <div class="mobile-tab-label">เครือข่าย</div>
                        </div>
                        <div class="mobile-tab" onclick="showSection('security')">
                            <div class="mobile-tab-icon">🔒</div>
                            <div class="mobile-tab-label">ความปลอดภัย</div>
                        </div>
                        <div class="mobile-tab" onclick="showSection('backup')">
                            <div class="mobile-tab-icon">💾</div>
                            <div class="mobile-tab-label">สำรองข้อมูล</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="settings-container">
                <!-- Settings Sidebar -->
                <div class="settings-sidebar">
                    <h3 class="settings-sidebar-title">
                        <span>⚙️</span>
                        ตั้งค่า
                    </h3>
                    
                    <nav class="settings-nav">
                        <div class="nav-item active" onclick="showSection('general')">
                            <span class="nav-icon">⚙️</span>
                            <span class="nav-label">การตั้งค่าทั่วไป</span>
                        </div>
                        <div class="nav-item" onclick="showSection('network')">
                            <span class="nav-icon">🌐</span>
                            <span class="nav-label">เครือข่าย</span>
                        </div>
                        <div class="nav-item" onclick="showSection('security')">
                            <span class="nav-icon">🔒</span>
                            <span class="nav-label">ความปลอดภัย</span>
                        </div>
                        <div class="nav-item" onclick="showSection('backup')">
                            <span class="nav-icon">💾</span>
                            <span class="nav-label">สำรองข้อมูล</span>
                        </div>
                        <div class="nav-item" onclick="showSection('maintenance')">
                            <span class="nav-icon">🔧</span>
                            <span class="nav-label">บำรุงรักษา</span>
                        </div>
                    </nav>
                </div>

                <!-- Settings Content -->
                <div class="settings-content">
                    <!-- General Settings -->
                    <div class="settings-section active" id="general">
                        <div class="section-header">
                            <div>
                                <h3 class="section-title">
                                    <span class="section-icon">⚙️</span>
                                    การตั้งค่าทั่วไป
                                </h3>
                                <p class="section-description">ปรับแต่งการตั้งค่าพื้นฐานของระบบ</p>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">ชื่อระบบ</label>
                                <input type="text" class="form-input" value="Luna Smart Home" placeholder="ชื่อระบบของคุณ">
                            </div>
                            <div class="form-group">
                                <label class="form-label">ภาษา</label>
                                <select class="form-select">
                                    <option value="th" selected>ภาษาไทย</option>
                                    <option value="en">English</option>
                                    <option value="zh">中文</option>
                                    <option value="ja">日本語</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">เขตเวลา</label>
                                <select class="form-select">
                                    <option value="Asia/Bangkok" selected>กรุงเทพฯ (UTC+7)</option>
                                    <option value="Asia/Tokyo">โตเกียว (UTC+9)</option>
                                    <option value="America/New_York">นิวยอร์ก (UTC-5)</option>
                                    <option value="Europe/London">ลอนดอน (UTC+0)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">รูปแบบวันที่</label>
                                <select class="form-select">
                                    <option value="DD/MM/YYYY" selected>วัน/เดือน/ปี</option>
                                    <option value="MM/DD/YYYY">เดือน/วัน/ปี</option>
                                    <option value="YYYY-MM-DD">ปี-เดือน-วัน</option>
                                </select>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">โหมดมืด</div>
                                <div class="toggle-desc">เปิดใช้งานธีมมืดสำหรับประหยัดแบตเตอรี่</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">การแจ้งเตือนเสียง</div>
                                <div class="toggle-desc">เปิดเสียงแจ้งเตือนสำหรับการกระทำต่างๆ</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">การอัปเดตอัตโนมัติ</div>
                                <div class="toggle-desc">อัปเดตระบบและแอปพลิเคชันโดยอัตโนมัติ</div>
                            </div>
                            <div class="toggle-switch" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="range-group">
                            <div class="range-label">
                                <span class="form-label">ความสว่างหน้าจอ</span>
                                <span class="range-value" id="brightnessValue">75%</span>
                            </div>
                            <input type="range" class="range-slider" min="10" max="100" value="75" 
                                   oninput="updateRangeValue(this, 'brightnessValue', '%')">
                        </div>

                        <div class="form-group" style="margin-top: 20px;">
                            <label class="form-label">ธีมสี</label>
                            <div class="color-group">
                                <div class="color-option selected" style="background: linear-gradient(135deg, #ff6b35, #ff8c42);" onclick="selectColor(this)"></div>
                                <div class="color-option" style="background: linear-gradient(135deg, #667eea, #764ba2);" onclick="selectColor(this)"></div>
                                <div class="color-option" style="background: linear-gradient(135deg, #f093fb, #f5576c);" onclick="selectColor(this)"></div>
                                <div class="color-option" style="background: linear-gradient(135deg, #4facfe, #00f2fe);" onclick="selectColor(this)"></div>
                                <div class="color-option" style="background: linear-gradient(135deg, #43e97b, #38f9d7);" onclick="selectColor(this)"></div>
                                <div class="color-option" style="background: linear-gradient(135deg, #fa709a, #fee140);" onclick="selectColor(this)"></div>
                            </div>
                        </div>

                        <div class="button-group">
                            <button class="btn btn-primary" onclick="saveSettings('general')">
                                💾 บันทึกการตั้งค่า
                            </button>
                            <button class="btn btn-secondary" onclick="resetSettings('general')">
                                🔄 รีเซ็ตเป็นค่าเริ่มต้น
                            </button>
                        </div>
                    </div>

                    <!-- Network Settings -->
                    <div class="settings-section" id="network">
                        <div class="section-header">
                            <div>
                                <h3 class="section-title">
                                    <span class="section-icon">🌐</span>
                                    การตั้งค่าเครือข่าย
                                </h3>
                                <p class="section-description">จัดการการเชื่อมต่อเครือข่ายและอินเทอร์เน็ต</p>
                            </div>
                        </div>

                        <div class="stats-grid">
                            <div class="stat-card">
                                <span class="stat-icon">📶</span>
                                <div class="stat-value">85%</div>
                                <div class="stat-label">สัญญาณ Wi-Fi</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">⚡</span>
                                <div class="stat-value">150</div>
                                <div class="stat-label">ความเร็ว Mbps</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">📡</span>
                                <div class="stat-value">12ms</div>
                                <div class="stat-label">Ping</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">🔌</span>
                                <div class="stat-value">5</div>
                                <div class="stat-label">อุปกรณ์เชื่อมต่อ</div>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">ชื่อเครือข่าย Wi-Fi</label>
                                <input type="text" class="form-input" value="Luna_Home_5G" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label">รหัสผ่าน Wi-Fi</label>
                                <input type="password" class="form-input" value="••••••••••••" placeholder="รหัสผ่านใหม่">
                            </div>
                            <div class="form-group">
                                <label class="form-label">ช่องสัญญาณ</label>
                                <select class="form-select">
                                    <option value="auto" selected>อัตโนมัติ</option>
                                    <option value="1">ช่อง 1 (2.412 GHz)</option>
                                    <option value="6">ช่อง 6 (2.437 GHz)</option>
                                    <option value="11">ช่อง 11 (2.462 GHz)</option>
                                    <option value="36">ช่อง 36 (5.180 GHz)</option>
                                    <option value="149">ช่อง 149 (5.745 GHz)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">ระบบความปลอดภัย</label>
                                <select class="form-select">
                                    <option value="wpa3" selected>WPA3</option>
                                    <option value="wpa2">WPA2</option>
                                    <option value="wep">WEP (ไม่แนะนำ)</option>
                                </select>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">เครือข่าย Guest</div>
                                <div class="toggle-desc">เปิดใช้งานเครือข่ายสำหรับผู้เยี่ยมชม</div>
                            </div>
                            <div class="toggle-switch" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">QoS (Quality of Service)</div>
                                <div class="toggle-desc">จัดลำดับความสำคัญของข้อมูลเครือข่าย</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="device-grid">
                            <div class="device-card">
                                <div class="device-header">
                                    <div class="device-icon">📱</div>
                                    <div class="device-info">
                                        <div class="device-name">iPhone 15 Pro</div>
                                        <div class="device-status">เชื่อมต่อ • 5G</div>
                                    </div>
                                </div>
                                <div class="device-controls">
                                    <div class="device-value">85 Mbps</div>
                                    <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="device-card">
                                <div class="device-header">
                                    <div class="device-icon">💻</div>
                                    <div class="device-info">
                                        <div class="device-name">MacBook Pro</div>
                                        <div class="device-status">เชื่อมต่อ • 5G</div>
                                    </div>
                                </div>
                                <div class="device-controls">
                                    <div class="device-value">150 Mbps</div>
                                    <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="device-card">
                                <div class="device-header">
                                    <div class="device-icon">📺</div>
                                    <div class="device-info">
                                        <div class="device-name">Smart TV</div>
                                        <div class="device-status">เชื่อมต่อ • 2.4G</div>
                                    </div>
                                </div>
                                <div class="device-controls">
                                    <div class="device-value">25 Mbps</div>
                                    <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                        <div class="toggle-slider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="button-group">
                            <button class="btn btn-primary" onclick="saveSettings('network')">
                                💾 บันทึกการตั้งค่า
                            </button>
                            <button class="btn btn-secondary" onclick="runNetworkTest()">
                                🔍 ทดสอบเครือข่าย
                            </button>
                            <button class="btn btn-secondary" onclick="restartRouter()">
                                🔄 รีสตาร์ทเราเตอร์
                            </button>
                        </div>
                    </div>

                    <!-- Security Settings -->
                    <div class="settings-section" id="security">
                        <div class="section-header">
                            <div>
                                <h3 class="section-title">
                                    <span class="section-icon">🔒</span>
                                    ความปลอดภัย
                                </h3>
                                <p class="section-description">ตั้งค่าความปลอดภัยและการเข้าถึงระบบ</p>
                            </div>
                        </div>

                        <div class="stats-grid">
                            <div class="stat-card">
                                <span class="stat-icon">🛡️</span>
                                <div class="stat-value">100%</div>
                                <div class="stat-label">ระดับความปลอดภัย</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">🔐</span>
                                <div class="stat-value">256</div>
                                <div class="stat-label">การเข้ารหัส Bit</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">👥</span>
                                <div class="stat-value">3</div>
                                <div class="stat-label">ผู้ใช้ที่ได้รับอนุญาต</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">⚠️</span>
                                <div class="stat-value">0</div>
                                <div class="stat-label">การเข้าถึงที่น่าสงสัย</div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">การตรวจสอบสองขั้นตอน (2FA)</div>
                                <div class="toggle-desc">เพิ่มความปลอดภัยด้วยการยืนยันตัวตนสองขั้นตอน</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">การเข้าถึงจากระยะไกล</div>
                                <div class="toggle-desc">อนุญาตให้เข้าถึงระบบจากภายนอกเครือข่าย</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">การแจ้งเตือนการเข้าถึง</div>
                                <div class="toggle-desc">ส่งการแจ้งเตือนเมื่อมีการเข้าถึงระบบ</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">ไฟร์วอลล์</div>
                                <div class="toggle-desc">เปิดใช้งานระบบป้องกันการโจมตี</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">ระยะเวลาล็อกอินอัตโนมัติ</label>
                                <select class="form-select">
                                    <option value="15">15 นาที</option>
                                    <option value="30" selected>30 นาที</option>
                                    <option value="60">1 ชั่วโมง</option>
                                    <option value="240">4 ชั่วโมง</option>
                                    <option value="0">ไม่ล็อกออกอัตโนมัติ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">จำนวนครั้งที่ผิดพลาดสูงสุด</label>
                                <select class="form-select">
                                    <option value="3" selected>3 ครั้ง</option>
                                    <option value="5">5 ครั้ง</option>
                                    <option value="10">10 ครั้ง</option>
                                    <option value="0">ไม่จำกัด</option>
                                </select>
                            </div>
                        </div>

                        <div class="button-group">
                            <button class="btn btn-primary" onclick="saveSettings('security')">
                                💾 บันทึกการตั้งค่า
                            </button>
                            <button class="btn btn-secondary" onclick="viewSecurityLog()">
                                📋 ดูบันทึกความปลอดภัย
                            </button>
                            <button class="btn btn-danger" onclick="lockAllDevices()">
                                🔒 ล็อกอุปกรณ์ทั้งหมด
                            </button>
                        </div>
                    </div>

                    <!-- Backup Settings -->
                    <div class="settings-section" id="backup">
                        <div class="section-header">
                            <div>
                                <h3 class="section-title">
                                    <span class="section-icon">💾</span>
                                    สำรองข้อมูล
                                </h3>
                                <p class="section-description">จัดการการสำรองข้อมูลและการกู้คืน</p>
                            </div>
                        </div>

                        <div class="stats-grid">
                            <div class="stat-card">
                                <span class="stat-icon">☁️</span>
                                <div class="stat-value">2.4GB</div>
                                <div class="stat-label">ข้อมูลบนคลาวด์</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">💿</span>
                                <div class="stat-value">856MB</div>
                                <div class="stat-label">ข้อมูลในเครื่อง</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">📅</span>
                                <div class="stat-value">2 วัน</div>
                                <div class="stat-label">สำรองล่าสุด</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">🎯</span>
                                <div class="stat-value">15</div>
                                <div class="stat-label">จุดกู้คืน</div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">การสำรองข้อมูลอัตโนมัติ</div>
                                <div class="toggle-desc">สำรองข้อมูลโดยอัตโนมัติทุกวัน</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">สำรองข้อมูลบนคลาวด์</div>
                                <div class="toggle-desc">อัปโหลดข้อมูลสำรองไปยัง Cloud Storage</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">การเข้ารหัสข้อมูลสำรอง</div>
                                <div class="toggle-desc">เข้ารหัสไฟล์สำรองด้วย AES-256</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">ความถี่การสำรองข้อมูล</label>
                                <select class="form-select">
                                    <option value="daily" selected>ทุกวัน</option>
                                    <option value="weekly">ทุกสัปดาห์</option>
                                    <option value="monthly">ทุกเดือน</option>
                                    <option value="manual">เมื่อต้องการเท่านั้น</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">เวลาสำรองข้อมูล</label>
                                <input type="time" class="form-input" value="02:00">
                            </div>
                            <div class="form-group">
                                <label class="form-label">จำนวนสำรองที่เก็บไว้</label>
                                <select class="form-select">
                                    <option value="7">7 ชุด</option>
                                    <option value="14">14 ชุด</option>
                                    <option value="30" selected>30 ชุด</option>
                                    <option value="0">ไม่จำกัด</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">ตำแหน่งสำรองข้อมูล</label>
                                <select class="form-select">
                                    <option value="local">ในเครื่อง</option>
                                    <option value="cloud" selected>คลาวด์ + ในเครื่อง</option>
                                    <option value="external">อุปกรณ์ภายนอก</option>
                                </select>
                            </div>
                        </div>

                        <div class="button-group">
                            <button class="btn btn-primary" onclick="createBackup()">
                                💾 สำรองข้อมูลทันที
                            </button>
                            <button class="btn btn-secondary" onclick="restoreBackup()">
                                🔄 กู้คืนข้อมูล
                            </button>
                            <button class="btn btn-secondary" onclick="downloadBackup()">
                                📥 ดาวน์โหลดสำรอง
                            </button>
                        </div>
                    </div>

                    <!-- Maintenance Settings -->
                    <div class="settings-section" id="maintenance">
                        <div class="section-header">
                            <div>
                                <h3 class="section-title">
                                    <span class="section-icon">🔧</span>
                                    บำรุงรักษา
                                </h3>
                                <p class="section-description">เครื่องมือสำหรับการบำรุงรักษาและปรับปรุงประสิทธิภาพ</p>
                            </div>
                        </div>

                        <div class="stats-grid">
                            <div class="stat-card">
                                <span class="stat-icon">⚡</span>
                                <div class="stat-value">94%</div>
                                <div class="stat-label">ประสิทธิภาพระบบ</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">💿</span>
                                <div class="stat-value">68%</div>
                                <div class="stat-label">พื้นที่ใช้งาน</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">🌡️</span>
                                <div class="stat-value">42°C</div>
                                <div class="stat-label">อุณหภูมิ CPU</div>
                            </div>
                            <div class="stat-card">
                                <span class="stat-icon">📊</span>
                                <div class="stat-value">15</div>
                                <div class="stat-label">วันทำงานต่อเนื่อง</div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">การบำรุงรักษาอัตโนมัติ</div>
                                <div class="toggle-desc">ทำความสะอาดและปรับปรุงประสิทธิภาพโดยอัตโนมัติ</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">การรายงานประสิทธิภาพ</div>
                                <div class="toggle-desc">ส่งรายงานสถานะระบบรายสัปดาห์</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="toggle-group">
                            <div class="toggle-info">
                                <div class="toggle-label">การลบไฟล์ชั่วคราวอัตโนมัติ</div>
                                <div class="toggle-desc">ลบไฟล์ที่ไม่จำเป็นเพื่อประหยัดพื้นที่</div>
                            </div>
                            <div class="toggle-switch active" onclick="toggleSwitch(this)">
                                <div class="toggle-slider"></div>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">เวลาบำรุงรักษาอัตโนมัติ</label>
                                <input type="time" class="form-input" value="03:00">
                            </div>
                            <div class="form-group">
                                <label class="form-label">ความถี่การตรวจสอบ</label>
                                <select class="form-select">
                                    <option value="daily">ทุกวัน</option>
                                    <option value="weekly" selected>ทุกสัปดาห์</option>
                                    <option value="monthly">ทุกเดือน</option>
                                </select>
                            </div>
                        </div>

                        <div class="button-group">
                            <button class="btn btn-primary" onclick="runMaintenance()">
                                🔧 ทำการบำรุงรักษาทันที
                            </button>
                            <button class="btn btn-secondary" onclick="cleanTemporaryFiles()">
                                🗑️ ลบไฟล์ชั่วคราว
                            </button>
                            <button class="btn btn-secondary" onclick="optimizeDatabase()">
                                📊 ปรับปรุงฐานข้อมูล
                            </button>
                            <button class="btn btn-danger" onclick="factoryReset()">
                                ⚠️ รีเซ็ตเป็นค่าเริ่มต้น
                            </button>
                        </div>

                        <div class="form-group" style="margin-top: 30px;">
                            <label class="form-label">ข้อมูลระบบ</label>
                            <textarea class="form-textarea" readonly style="min-height: 120px;">
เวอร์ชันระบบ: Luna Smart Home v2.5.1
วันที่อัปเดตล่าสุด: 15 มีนาคม 2024
เวลาทำงานระบบ: 15 วัน 8 ชั่วโมง 23 นาที
หน่วยความจำใช้งาน: 2.1GB / 8GB
พื้นที่จัดเก็บ: 68GB / 128GB
อุณหภูมิ CPU: 42°C (ปกติ)
จำนวนอุปกรณ์เชื่อมต่อ: 12 อุปกรณ์
การใช้งานเครือข่าย: 145MB ↓ / 23MB ↑
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentSection = 'general';
        let settingsChanged = false;

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

        // Settings navigation
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.settings-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Remove active class from all nav items
            document.querySelectorAll('.nav-item, .mobile-tab').forEach(item => {
                item.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(sectionId).classList.add('active');
            
            // Add active class to corresponding nav items
            document.querySelectorAll(`[onclick="showSection('${sectionId}')"]`).forEach(item => {
                item.classList.add('active');
            });
            
            currentSection = sectionId;
            
            // Trigger section-specific actions
            if (sectionId === 'network') {
                updateNetworkStats();
            } else if (sectionId === 'maintenance') {
                updateSystemStats();
            }
        }

        // Toggle switch functionality
        function toggleSwitch(element) {
            element.classList.toggle('active');
            settingsChanged = true;
            
            const isActive = element.classList.contains('active');
            const label = element.parentElement.querySelector('.toggle-label').textContent;
            
            showNotification(`${isActive ? 'เปิด' : 'ปิด'}${label}`, isActive ? 'success' : 'info');
        }

        // Range slider updates
        function updateRangeValue(slider, targetId, unit = '') {
            const value = slider.value;
            document.getElementById(targetId).textContent = value + unit;
            settingsChanged = true;
        }

        // Color selection
        function selectColor(element) {
            document.querySelectorAll('.color-option').forEach(option => {
                option.classList.remove('selected');
            });
            element.classList.add('selected');
            settingsChanged = true;
            showNotification('เปลี่ยนธีมสีแล้ว', 'success');
        }

        // Settings actions
        function saveSettings(section) {
            showNotification('กำลังบันทึกการตั้งค่า...', 'info');
            
            setTimeout(() => {
                settingsChanged = false;
                showNotification('บันทึกการตั้งค่าสำเร็จ!', 'success');
                
                // Save to localStorage (simulated)
                const settingsData = gatherSettingsData(section);
                console.log('Settings saved:', settingsData);
            }, 1500);
        }

        function resetSettings(section) {
            if (confirm('คุณต้องการรีเซ็ตการตั้งค่าเป็นค่าเริ่มต้นหรือไม่?')) {
                showNotification('กำลังรีเซ็ตการตั้งค่า...', 'info');
                
                setTimeout(() => {
                    resetSectionDefaults(section);
                    showNotification('รีเซ็ตการตั้งค่าเรียบร้อย', 'success');
                }, 1000);
            }
        }

        function gatherSettingsData(section) {
            const data = {};
            const sectionElement = document.getElementById(section);
            
            // Gather form inputs
            sectionElement.querySelectorAll('input, select, textarea').forEach(input => {
                if (input.id || input.name) {
                    data[input.id || input.name] = input.value;
                }
            });
            
            // Gather toggle states
            sectionElement.querySelectorAll('.toggle-switch').forEach((toggle, index) => {
                data[`toggle_${index}`] = toggle.classList.contains('active');
            });
            
            return data;
        }

        function resetSectionDefaults(section) {
            const sectionElement = document.getElementById(section);
            
            if (section === 'general') {
                // Reset general settings
                const systemNameInput = sectionElement.querySelector('input[value="Luna Smart Home"]');
                if (systemNameInput) systemNameInput.value = 'Luna Smart Home';
                
                const brightnessSlider = sectionElement.querySelector('.range-slider');
                if (brightnessSlider) {
                    brightnessSlider.value = 75;
                    document.getElementById('brightnessValue').textContent = '75%';
                }
            }
            
            settingsChanged = false;
        }

        // Network functions
        function updateNetworkStats() {
            // Simulate real-time updates
            setInterval(() => {
                const signalStrength = 80 + Math.random() * 20;
                const speed = 140 + Math.random() * 20;
                const ping = 10 + Math.random() * 5;
                
                const statValues = document.querySelectorAll('#network .stat-value');
                if (statValues.length >= 3) {
                    statValues[0].textContent = Math.round(signalStrength) + '%';
                    statValues[1].textContent = Math.round(speed);
                    statValues[2].textContent = Math.round(ping) + 'ms';
                }
            }, 5000);
        }

        function runNetworkTest() {
            showNotification('กำลังทดสอบเครือข่าย...', 'info');
            
            setTimeout(() => {
                const results = {
                    download: Math.round(140 + Math.random() * 20),
                    upload: Math.round(15 + Math.random() * 10),
                    ping: Math.round(10 + Math.random() * 5)
                };
                
                showNotification(
                    `ผลการทดสอบ: ดาวน์โหลด ${results.download} Mbps, อัปโหลด ${results.upload} Mbps, Ping ${results.ping}ms`, 
                    'success'
                );
            }, 3000);
        }

        function restartRouter() {
            if (confirm('คุณต้องการรีสตาร์ทเราเตอร์หรือไม่? การเชื่อมต่อจะหยุดชั่วคราว')) {
                showNotification('กำลังรีสตาร์ทเราเตอร์...', 'info');
                
                setTimeout(() => {
                    showNotification('รีสตาร์ทเราเตอร์สำเร็จ', 'success');
                }, 5000);
            }
        }

        // Security functions
        function viewSecurityLog() {
            showNotification('เปิดบันทึกความปลอดภัย...', 'info');
        }

        function lockAllDevices() {
            if (confirm('คุณต้องการล็อกอุปกรณ์ทั้งหมดหรือไม่?')) {
                showNotification('กำลังล็อกอุปกรณ์ทั้งหมด...', 'info');
                
                setTimeout(() => {
                    showNotification('ล็อกอุปกรณ์ทั้งหมดเรียบร้อย', 'success');
                }, 2000);
            }
        }

        // Backup functions
        function createBackup() {
            showNotification('กำลังสำรองข้อมูล...', 'info');
            
            setTimeout(() => {
                const backupSize = (2.1 + Math.random() * 0.5).toFixed(1);
                showNotification(`สำรองข้อมูลสำเร็จ (${backupSize}GB)`, 'success');
            }, 3000);
        }

        function restoreBackup() {
            if (confirm('คุณต้องการกู้คืนข้อมูลจากการสำรองล่าสุดหรือไม่?')) {
                showNotification('กำลังกู้คืนข้อมูล...', 'info');
                
                setTimeout(() => {
                    showNotification('กู้คืนข้อมูลสำเร็จ', 'success');
                }, 4000);
            }
        }

        function downloadBackup() {
            showNotification('กำลังเตรียมไฟล์สำรอง...', 'info');
            
            setTimeout(() => {
                showNotification('ดาวน์โหลดไฟล์สำรองสำเร็จ', 'success');
            }, 2000);
        }

        // Maintenance functions
        function updateSystemStats() {
            setInterval(() => {
                const performance = 90 + Math.random() * 10;
                const temperature = 40 + Math.random() * 8;
                
                const statValues = document.querySelectorAll('#maintenance .stat-value');
                if (statValues.length >= 3) {
                    statValues[0].textContent = Math.round(performance) + '%';
                    statValues[2].textContent = Math.round(temperature) + '°C';
                }
            }, 10000);
        }

        function runMaintenance() {
            showNotification('กำลังทำการบำรุงรักษาระบบ...', 'info');
            
            setTimeout(() => {
                showNotification('บำรุงรักษาระบบเสร็จสิ้น - ประสิทธิภาพเพิ่มขึ้น 5%', 'success');
            }, 5000);
        }

        function cleanTemporaryFiles() {
            showNotification('กำลังลบไฟล์ชั่วคราว...', 'info');
            
            setTimeout(() => {
                const freedSpace = (Math.random() * 2 + 0.5).toFixed(1);
                showNotification(`ลบไฟล์ชั่วคราวเรียบร้อย - เพิ่มพื้นที่ว่าง ${freedSpace}GB`, 'success');
            }, 2000);
        }

        function optimizeDatabase() {
            showNotification('กำลังปรับปรุงฐานข้อมูล...', 'info');
            
            setTimeout(() => {
                showNotification('ปรับปรุงฐานข้อมูลเรียบร้อย - เพิ่มความเร็ว 12%', 'success');
            }, 3000);
        }

        function factoryReset() {
            const confirmText = 'รีเซ็ตระบบ';
            const userInput = prompt(`การรีเซ็ตจะลบข้อมูลทั้งหมด!\nพิมพ์ "${confirmText}" เพื่อยืนยัน:`);
            
            if (userInput === confirmText) {
                showNotification('กำลังรีเซ็ตระบบ...', 'warning');
                
                setTimeout(() => {
                    showNotification('รีเซ็ตระบบเรียบร้อย - กำลังรีสตาร์ท...', 'success');
                }, 3000);
            } else if (userInput !== null) {
                showNotification('ยกเลิกการรีเซ็ต', 'info');
            }
        }

        // Notification system
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            const colors = {
                success: 'rgba(34, 197, 94, 0.9)',
                error: 'rgba(239, 68, 68, 0.9)',
                warning: 'rgba(245, 158, 11, 0.9)',
                info: 'rgba(59, 130, 246, 0.9)'
            };
            
            notification.style.cssText = `
                position: fixed;
                top: 90px;
                right: 20px;
                background: ${colors[type] || colors.success};
                color: white;
                padding: 15px 20px;
                border-radius: 8px;
                z-index: 10000;
                font-size: 14px;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                animation: slideIn 0.3s ease-out;
                max-width: 350px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            `;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-in forwards';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }

        // Initialize on page load
        window.addEventListener('load', function() {
            // Set up event listeners
            setupEventListeners();
            
            // Welcome message
            setTimeout(() => {
                showNotification('ยินดีต้อนรับสู่หน้าตั้งค่าระบบ Luna Smart Home', 'success');
            }, 1000);
        });

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

            // Track changes
            document.addEventListener('input', function(e) {
                if (e.target.matches('.form-input, .form-select, .form-textarea, .range-slider')) {
                    settingsChanged = true;
                }
            });

            // Warn before leaving if changes are unsaved
            window.addEventListener('beforeunload', function(e) {
                if (settingsChanged) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });
        }
    </script>
</body>
</html>