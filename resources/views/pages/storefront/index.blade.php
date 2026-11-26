<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<meta name="theme-color" content="#063D2E">
<link rel="icon" type="image/jpeg" href="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}">
<title>AL-TAQWA Institute of Islamic Studies — Global Online Islamic Academy</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/altaqwa-theme.css') }}">

<style>
/* ==========================================================================
   AL-TAQWA INSTITUTE — MODERN ISLAMIC ACADEMY DESIGN SYSTEM
   ========================================================================== */
:root {
  --primary: #063D2E;
  --primary-dark: #03251C;
  --primary-light: #0B5742;
  --primary-surface: #F0F6F3;
  --gold: #C9A35A;
  --gold-light: #DFBA6B;
  --gold-dark: #9F7E3A;
  --cream: #FAF9F5;
  --cream-alt: #F3EFE6;
  --white: #FFFFFF;
  --ink: #14261F;
  --ink-soft: #2D433A;
  --muted: #5F7369;
  --border: #E5E0D5;
  --border-light: #EEEAE1;
  --shadow-sm: 0 2px 8px rgba(6, 61, 46, 0.05);
  --shadow-md: 0 8px 24px rgba(6, 61, 46, 0.08);
  --shadow-lg: 0 16px 40px rgba(6, 61, 46, 0.12);
  --radius-sm: 8px;
  --radius-md: 14px;
  --radius-lg: 20px;
  --radius-pill: 9999px;
  --font-serif: "Playfair Display", Georgia, serif;
  --font-arabic: "Amiri", "Traditional Arabic", serif;
  --font-sans: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; font-size: 16px; }
body {
  background-color: var(--cream);
  color: var(--ink);
  font-family: var(--font-sans);
  line-height: 1.6;
  overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
}

a { color: inherit; text-decoration: none; transition: all 0.2s ease; }
button, input, select, textarea { font-family: inherit; font-size: inherit; }
button { cursor: pointer; border: none; background: none; }
img { max-width: 100%; height: auto; display: block; }

.wrap { width: min(1200px, 92%); margin: 0 auto; }

/* ----------------- Header / Navigation ----------------- */
.nav-header {
  background: var(--primary);
  position: sticky;
  top: 0;
  z-index: 1000;
  border-bottom: 2px solid var(--gold);
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
  backdrop-filter: blur(8px);
}
.navin {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 72px;
  gap: 16px;
}
.brand {
  display: flex;
  align-items: center;
  gap: 12px;
  flex-shrink: 0;
  text-decoration: none;
}
.brandmark {
  width: 44px;
  height: 44px;
  border-radius: var(--radius-sm);
  overflow: hidden;
  border: 1.5px solid var(--gold);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
  flex-shrink: 0;
  background: var(--primary-dark);
  display: flex;
  align-items: center;
  justify-content: center;
}
.brandmark img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.brand-titles {
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.brand-name, .brand-titles strong {
  display: block;
  font-family: var(--font-serif), 'Playfair Display', Georgia, serif;
  font-size: 1.12rem;
  font-weight: 800;
  letter-spacing: 0.06em;
  color: #FFFFFF;
  line-height: 1.15;
  white-space: nowrap;
}
.brand-name span, .brand-titles strong span {
  color: var(--gold);
}
.brand-motto, .brand-titles small {
  display: block;
  font-size: 0.63rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: #BED8CC;
  font-weight: 600;
  margin-top: 2px;
  white-space: nowrap;
  font-family: var(--font-sans);
}

.nav-menu {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 4px;
  flex: 1 1 auto;
}
.navlink-item {
  color: #E2EEE8;
  font-family: var(--font-sans), 'Inter', sans-serif;
  font-size: 0.84rem;
  font-weight: 600;
  padding: 7px 12px;
  border-radius: var(--radius-pill);
  transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
  white-space: nowrap;
  display: inline-flex;
  align-items: center;
  line-height: 1.2;
  text-decoration: none;
}
.navlink-item:hover {
  background: rgba(255, 255, 255, 0.09);
  color: #FFFFFF;
  transform: translateY(-1px);
}
.navlink-item.active {
  background: var(--gold);
  color: var(--primary-dark) !important;
  font-weight: 700;
  box-shadow: 0 2px 8px rgba(201, 163, 90, 0.3);
}

.nav-actions {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
}
.nav-actions .taqwa-coin-badge {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  background: rgba(201, 163, 90, 0.12);
  border: 1px solid rgba(201, 163, 90, 0.45);
  color: #F7E7B4;
  padding: 6px 12px;
  border-radius: var(--radius-pill);
  font-size: 0.8rem;
  font-weight: 700;
  white-space: nowrap;
  line-height: 1;
}
.nav-btn {
  padding: 8px 18px !important;
  font-size: 0.82rem !important;
  font-weight: 700 !important;
  white-space: nowrap !important;
  height: 38px !important;
  line-height: 1 !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  text-decoration: none !important;
}

.nav-toggle-btn {
  display: none;
  width: 40px;
  height: 40px;
  border-radius: var(--radius-sm);
  border: 1.5px solid var(--gold);
  background: rgba(201, 163, 90, 0.1);
  cursor: pointer;
  padding: 0;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 5px;
  transition: all 0.2s ease;
}
.nav-toggle-btn:hover {
  background: rgba(201, 163, 90, 0.2);
}
.toggle-bar {
  width: 20px;
  height: 2px;
  background: var(--gold);
  border-radius: 2px;
  transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}
.nav-toggle-btn.open .toggle-bar:nth-child(1) {
  transform: translateY(7px) rotate(45deg);
}
.nav-toggle-btn.open .toggle-bar:nth-child(2) {
  opacity: 0;
  transform: scaleX(0);
}
.nav-toggle-btn.open .toggle-bar:nth-child(3) {
  transform: translateY(-7px) rotate(-45deg);
}

.nav-mobile-drawer {
  display: none;
  background: var(--primary-dark);
  border-bottom: 2px solid var(--gold);
  box-shadow: 0 16px 36px rgba(0, 0, 0, 0.45);
  overflow: hidden;
  max-height: 0;
  transition: max-height 0.35s ease-out;
}
.nav-mobile-drawer.open {
  display: block;
  max-height: 520px;
}
.mobile-drawer-inner {
  width: min(1200px, 92%);
  margin: 0 auto;
  padding: 18px 0 24px;
}
.mobile-nav-links {
  display: flex;
  flex-direction: column;
  gap: 6px;
  margin-bottom: 18px;
}
.mobile-navlink {
  display: flex;
  align-items: center;
  gap: 10px;
  color: #E2EEE8;
  font-size: 0.94rem;
  font-weight: 600;
  padding: 10px 14px;
  border-radius: var(--radius-sm);
  background: rgba(255, 255, 255, 0.03);
  border-left: 2px solid transparent;
  transition: all 0.2s ease;
  text-decoration: none;
}
.mobile-navlink:hover, .mobile-navlink:active {
  background: rgba(255, 255, 255, 0.08);
  color: #FFFFFF;
  border-left-color: var(--gold);
}
.mobile-navlink.active {
  background: rgba(201, 163, 90, 0.15);
  color: var(--gold-light);
  border-left-color: var(--gold);
  font-weight: 700;
}
.mobile-navlink .nav-bullet {
  color: var(--gold);
  font-size: 0.8rem;
}
.mobile-drawer-footer {
  padding-top: 16px;
  border-top: 1px solid rgba(201, 163, 90, 0.2);
}
.mobile-coin-box {
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(201, 163, 90, 0.12);
  border: 1px solid rgba(201, 163, 90, 0.3);
  padding: 8px 14px;
  border-radius: var(--radius-pill);
  color: #F7E7B4;
  font-size: 0.85rem;
  margin-bottom: 12px;
}
.mobile-btn-grid {
  display: flex;
  gap: 10px;
}

.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 10px 22px;
  border-radius: var(--radius-pill);
  font-size: 0.88rem;
  font-weight: 700;
  transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}
.btn-gold {
  background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
  color: var(--primary-dark) !important;
  box-shadow: 0 4px 14px rgba(201, 163, 90, 0.35);
}
.btn-gold:hover {
  background: linear-gradient(135deg, var(--gold-light) 0%, #EBD08C 100%);
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(201, 163, 90, 0.45);
}
.btn-green {
  background: var(--primary);
  color: #FFFFFF !important;
  box-shadow: 0 4px 14px rgba(6, 61, 46, 0.25);
}
.btn-green:hover {
  background: var(--primary-light);
  transform: translateY(-2px);
  box-shadow: 0 6px 18px rgba(6, 61, 46, 0.35);
}
.btn-outline-gold {
  border: 1.5px solid var(--gold);
  color: var(--gold) !important;
  background: transparent;
}
.btn-outline-gold:hover {
  background: var(--gold);
  color: var(--primary-dark) !important;
  transform: translateY(-2px);
}
.btn-outline-green {
  border: 1.5px solid var(--primary);
  color: var(--primary) !important;
  background: transparent;
}
.btn-outline-green:hover {
  background: var(--primary);
  color: #FFFFFF !important;
  transform: translateY(-2px);
}

/* ----------------- Subheroes & Pageviews ----------------- */
.pageview { display: none; }
.pageview.active { display: block; animation: fadeIn 0.3s ease-out; }
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(6px); }
  to { opacity: 1; transform: translateY(0); }
}

.subhero {
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 65%, var(--primary-light) 100%);
  color: #FFFFFF;
  padding: 60px 0 54px;
  position: relative;
  border-bottom: 3px solid var(--gold);
  overflow: hidden;
}
.subhero::after {
  content: "";
  position: absolute;
  inset: 0;
  background-image: radial-gradient(rgba(201, 163, 90, 0.15) 1px, transparent 1px);
  background-size: 24px 24px;
  pointer-events: none;
}
.subhero-eyebrow {
  display: inline-block;
  font-size: 0.75rem;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: var(--gold);
  font-weight: 800;
  margin-bottom: 8px;
}
.subhero h1 {
  font-family: var(--font-serif);
  font-size: clamp(2rem, 3.5vw, 3rem);
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 12px;
  color: #FFFFFF;
}
.subhero p {
  color: #D3E6DC;
  font-size: 1.05rem;
  max-width: 720px;
  line-height: 1.6;
}
.page-content {
  padding: 56px 0 80px;
}

/* ----------------- Home Hero ----------------- */
.hero {
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 55%, #0B4F3B 100%);
  color: #FFFFFF;
  position: relative;
  overflow: hidden;
  padding: 80px 0 90px;
  border-bottom: 3px solid var(--gold);
}
.hero::after {
  content: "";
  position: absolute;
  inset: 0;
  background-image: radial-gradient(rgba(201, 163, 90, 0.18) 1px, transparent 1px);
  background-size: 26px 26px;
  pointer-events: none;
}
.hero-grid {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  align-items: center;
  gap: 48px;
  position: relative;
  z-index: 2;
}
.bismillah-watermark {
  font-family: var(--font-arabic);
  font-size: 2.2rem;
  color: var(--gold);
  line-height: 1;
  margin-bottom: 14px;
  text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}
.hero-tag {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(201, 163, 90, 0.15);
  border: 1px solid rgba(201, 163, 90, 0.35);
  color: #F8E8C9;
  padding: 5px 14px;
  border-radius: var(--radius-pill);
  font-size: 0.72rem;
  font-weight: 800;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  margin-bottom: 16px;
}
.hero h1 {
  font-family: var(--font-serif);
  font-size: clamp(2.3rem, 4.4vw, 3.8rem);
  line-height: 1.12;
  font-weight: 700;
  margin-bottom: 18px;
  letter-spacing: -0.01em;
}
.hero h1 em {
  font-style: normal;
  color: var(--gold);
}
.hero p {
  color: #D7ECE3;
  font-size: 1.12rem;
  line-height: 1.65;
  max-width: 600px;
  margin-bottom: 30px;
}
.hero-actions {
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: wrap;
  margin-bottom: 36px;
}
.hero-trust {
  display: flex;
  gap: 22px;
  flex-wrap: wrap;
  color: #BDDDD0;
  font-size: 0.82rem;
  font-weight: 600;
}
.hero-trust span {
  display: inline-flex;
  align-items: center;
  gap: 6px;
}
.hero-trust span::before {
  content: "✦";
  color: var(--gold);
}

.hero-visual {
  position: relative;
  display: flex;
  justify-content: center;
}
.hero-arch-card {
  width: min(420px, 100%);
  background: linear-gradient(160deg, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.02) 100%);
  border: 2px solid rgba(201, 163, 90, 0.45);
  border-radius: 210px 210px var(--radius-lg) var(--radius-lg);
  padding: 40px 28px 32px;
  text-align: center;
  box-shadow: inset 0 0 0 8px rgba(201, 163, 90, 0.08), 0 20px 50px rgba(0, 0, 0, 0.35);
  backdrop-filter: blur(8px);
  position: relative;
}
.hero-arch-card img {
  width: 140px;
  height: 140px;
  border-radius: 28px;
  margin: 0 auto 16px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
  border: 2px solid var(--gold);
}
.hero-arch-card h3 {
  font-family: var(--font-serif);
  font-size: 1.7rem;
  color: #FFFFFF;
  margin-bottom: 6px;
}
.hero-arch-card p {
  font-size: 0.75rem;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: var(--gold);
  font-weight: 700;
  margin-bottom: 20px;
}
.hero-floating-badge {
  position: absolute;
  background: #FFFFFF;
  color: var(--primary-dark);
  padding: 10px 16px;
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-lg);
  font-size: 0.78rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 8px;
  border: 1px solid var(--border);
}
.hero-floating-badge b {
  display: block;
  font-size: 0.95rem;
  color: var(--primary);
  line-height: 1.1;
}
.badge-top-left { top: 28px; left: -20px; }
.badge-bottom-right { bottom: 18px; right: -15px; }

/* ----------------- Stats Banner ----------------- */
.stats-banner {
  background: #FFFFFF;
  border-bottom: 1px solid var(--border);
  box-shadow: var(--shadow-sm);
}
.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
}
.stat-box {
  padding: 24px 18px;
  text-align: center;
  border-right: 1px solid var(--border);
}
.stat-box:last-child { border-right: none; }
.stat-box strong {
  display: block;
  font-family: var(--font-serif);
  font-size: 2.1rem;
  font-weight: 700;
  color: var(--primary);
  line-height: 1.1;
  margin-bottom: 4px;
}
.stat-box span {
  font-size: 0.8rem;
  color: var(--muted);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

/* ----------------- Section Header ----------------- */
.section { padding: 76px 0; }
.section-head {
  text-align: center;
  max-width: 680px;
  margin: 0 auto 44px;
}
.section-head .eyebrow {
  color: var(--gold-dark);
  font-size: 0.75rem;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  font-weight: 800;
  margin-bottom: 8px;
}
.section-head h2 {
  font-family: var(--font-serif);
  font-size: clamp(1.9rem, 3.2vw, 2.7rem);
  font-weight: 700;
  color: var(--primary-dark);
  line-height: 1.22;
  margin-bottom: 12px;
}
.section-head p {
  color: var(--muted);
  font-size: 1rem;
  line-height: 1.6;
}

/* ----------------- Category Quick Pathways ----------------- */
.pathway-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-bottom: 48px;
}
.pathway-card {
  background: #FFFFFF;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 24px 20px;
  box-shadow: var(--shadow-sm);
  transition: all 0.25s ease;
  display: flex;
  flex-direction: column;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.pathway-card:hover {
  transform: translateY(-4px);
  border-color: var(--gold);
  box-shadow: var(--shadow-md);
}
.pathway-icon {
  width: 52px;
  height: 52px;
  border-radius: var(--radius-md);
  background: var(--primary-surface);
  color: var(--primary);
  display: grid;
  place-items: center;
  font-size: 1.6rem;
  margin-bottom: 16px;
}
.pathway-card h3 {
  font-family: var(--font-serif);
  font-size: 1.25rem;
  color: var(--primary-dark);
  margin-bottom: 6px;
}
.pathway-card p {
  font-size: 0.84rem;
  color: var(--muted);
  line-height: 1.5;
  margin-bottom: 14px;
  flex: 1;
}
.pathway-meta {
  font-size: 0.75rem;
  font-weight: 700;
  color: var(--gold-dark);
  display: flex;
  align-items: center;
  gap: 4px;
}

/* ----------------- Course Cards ----------------- */
.cards {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
.course-card {
  background: #FFFFFF;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  display: flex;
  flex-direction: column;
  transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
  position: relative;
}
.course-card:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-lg);
  border-color: rgba(201, 163, 90, 0.6);
}
.course-top-banner {
  height: 195px;
  background-size: cover;
  background-position: center;
  position: relative;
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  padding: 14px;
  border-bottom: 2px solid rgba(201, 163, 90, 0.35);
}
.course-top-banner::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(3, 37, 28, 0.4) 0%, rgba(3, 37, 28, 0.05) 45%, rgba(3, 37, 28, 0.85) 100%);
  pointer-events: none;
}
.course-icon-badge {
  position: relative;
  z-index: 2;
  font-size: 1.6rem;
  filter: drop-shadow(0 2px 5px rgba(0,0,0,0.7));
}
.course-badges-wrap {
  position: relative;
  z-index: 2;
  display: flex;
  gap: 6px;
  flex-wrap: wrap;
  justify-content: flex-end;
}
.course-pill {
  font-size: 0.68rem;
  font-weight: 800;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  padding: 4px 10px;
  border-radius: var(--radius-pill);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}
.pill-cat {
  background: rgba(6, 61, 46, 0.88);
  color: #FFFFFF;
  backdrop-filter: blur(4px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}
.pill-free {
  background: #14644A;
  color: #FFFFFF;
}
.pill-sub {
  background: #063D2E;
  color: #FFFFFF;
  border: 1px solid rgba(255, 255, 255, 0.3);
}
.pill-refundable {
  background: var(--gold);
  color: var(--primary-dark);
}

.course-body {
  padding: 22px;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.course-track-label {
  font-size: 0.72rem;
  font-weight: 800;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--gold-dark);
  margin-bottom: 4px;
}
.course-title {
  font-family: var(--font-serif);
  font-size: 1.25rem;
  line-height: 1.3;
  color: var(--primary-dark);
  margin-bottom: 8px;
  min-height: 50px;
}
.course-desc {
  font-size: 0.86rem;
  color: var(--muted);
  line-height: 1.55;
  margin-bottom: 18px;
  flex: 1;
}

.course-specs {
  background: var(--cream-alt);
  border-radius: var(--radius-sm);
  padding: 10px 14px;
  margin-bottom: 18px;
  font-size: 0.78rem;
  display: flex;
  flex-direction: column;
  gap: 6px;
  border: 1px solid rgba(0,0,0,0.04);
}
.specs-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.specs-row b {
  color: var(--ink);
  font-weight: 600;
}
.course-price-highlight {
  font-size: 0.95rem;
  font-weight: 800;
  color: var(--primary);
}
.sisters-badge {
  color: #B3261E;
  font-weight: 700;
  font-size: 0.76rem;
}

.course-foot {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 14px;
  border-top: 1px solid var(--border);
  gap: 10px;
}
.btn-details {
  font-size: 0.84rem;
  font-weight: 700;
  color: var(--primary);
  display: inline-flex;
  align-items: center;
  gap: 4px;
}
.btn-details:hover {
  color: var(--gold-dark);
}

/* ----------------- Sliders (Home) ----------------- */
.slider-container {
  position: relative;
  padding: 0 32px;
}
.slider-track {
  display: flex;
  gap: 24px;
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
  padding: 12px 4px 28px;
  scrollbar-width: none;
}
.slider-track::-webkit-scrollbar { display: none; }
.slider-track > * {
  flex: 0 0 calc((100% - 48px) / 3);
  scroll-snap-align: start;
  min-width: 0;
}
.slider-btn {
  position: absolute;
  top: calc(50% - 24px);
  width: 48px;
  height: 48px;
  border-radius: 50%;
  border: 2px solid var(--gold);
  background: var(--primary);
  color: var(--gold);
  font-size: 1.6rem;
  display: grid;
  place-items: center;
  box-shadow: 0 8px 24px rgba(6, 61, 46, 0.3);
  z-index: 10;
  cursor: pointer;
  transition: all 0.2s ease;
}
.slider-btn.prev { left: -8px; }
.slider-btn.next { right: -8px; }
.slider-btn:hover { background: var(--primary-light); color: #FFFFFF; transform: scale(1.05); }
.slider-btn[disabled] { opacity: 0.3; cursor: default; }
.slider-dots {
  display: flex;
  justify-content: center;
  gap: 8px;
  margin-top: 6px;
}
.slider-dots button {
  width: 10px;
  height: 10px;
  border-radius: 99px;
  background: rgba(6, 61, 46, 0.2);
  transition: all 0.25s ease;
  cursor: pointer;
}
.slider-dots button.on {
  width: 28px;
  background: var(--gold);
}

/* ----------------- Filter Chips ----------------- */
.filter-tabs {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 28px;
}
.filter-chip {
  border: 1.5px solid var(--border);
  background: #FFFFFF;
  color: var(--ink-soft);
  border-radius: var(--radius-pill);
  padding: 8px 18px;
  font-weight: 700;
  font-size: 0.85rem;
  transition: all 0.2s ease;
}
.filter-chip:hover {
  border-color: var(--primary);
  color: var(--primary);
}
.filter-chip.on {
  background: var(--primary);
  color: #FFFFFF;
  border-color: var(--primary);
}

.search-field {
  max-width: 480px;
  position: relative;
  margin-bottom: 28px;
}
.search-field input {
  width: 100%;
  padding: 13px 18px;
  border-radius: var(--radius-pill);
  border: 1.5px solid var(--border);
  background: #FFFFFF;
  color: var(--ink);
  font-size: 0.92rem;
  outline: none;
  transition: all 0.2s ease;
}
.search-field input:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(6, 61, 46, 0.1);
}

/* ----------------- Faculty / Scholars Cards ----------------- */
.teachers-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 28px;
}
.teacher-card {
  background: #FFFFFF;
  border: 1px solid rgba(201, 163, 90, 0.28);
  border-radius: 18px;
  overflow: hidden;
  box-shadow: 0 8px 24px rgba(6, 61, 46, 0.05);
  display: flex;
  flex-direction: column;
  transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
  position: relative;
}
.teacher-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 40px rgba(6, 61, 46, 0.12);
  border-color: var(--gold);
}
.teacher-card-accent-bar {
  height: 5px;
  background: linear-gradient(90deg, #063D2E 0%, #C9A35A 50%, #063D2E 100%);
  width: 100%;
}
.teacher-card-content {
  padding: 24px 22px;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.teacher-header {
  display: flex;
  gap: 16px;
  align-items: flex-start;
  margin-bottom: 16px;
}
.teacher-avatar-wrapper {
  position: relative;
  flex-shrink: 0;
}
.teacher-avatar-medallion {
  width: 72px;
  height: 72px;
  border-radius: 50%;
  background: linear-gradient(135deg, #021C15 0%, #063D2E 50%, #0B5742 100%);
  border: 2.5px solid var(--gold);
  color: #FFFFFF;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: 0 6px 16px rgba(6, 61, 46, 0.25);
  position: relative;
}
.teacher-avatar-initials {
  font-family: var(--font-serif);
  font-size: 1.45rem;
  font-weight: 700;
  color: var(--gold);
  line-height: 1;
  letter-spacing: 0.5px;
}
.teacher-avatar-symbol {
  font-size: 0.7rem;
  color: #C9A35A;
  opacity: 0.85;
  margin-top: 2px;
}
.teacher-badge-verified {
  position: absolute;
  bottom: -2px;
  right: -2px;
  width: 22px;
  height: 22px;
  background: var(--gold);
  color: var(--primary-dark);
  border-radius: 50%;
  display: grid;
  place-items: center;
  font-size: 11px;
  font-weight: 900;
  border: 2px solid #FFFFFF;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}
.teacher-header-info {
  flex: 1;
  min-width: 0;
}
.teacher-tag-row {
  display: flex;
  align-items: center;
  gap: 6px;
  margin-bottom: 6px;
  flex-wrap: wrap;
}
.teacher-specialty-pill {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  padding: 3px 9px;
  border-radius: 9999px;
  font-size: 0.68rem;
  font-weight: 700;
  letter-spacing: 0.4px;
  text-transform: uppercase;
  background: rgba(201, 163, 90, 0.12);
  color: #8C6A23;
  border: 1px solid rgba(201, 163, 90, 0.35);
}
.teacher-specialty-pill.sisters {
  background: #FDF2F8;
  color: #9D174D;
  border-color: #FBCFE8;
}
.teacher-card h3 {
  font-family: var(--font-serif);
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--primary-dark);
  line-height: 1.25;
  margin-bottom: 4px;
}
.teacher-role-title {
  font-size: 0.82rem;
  font-weight: 600;
  color: var(--primary);
  display: block;
  letter-spacing: 0.2px;
}

/* Metadata Stats Panel */
.teacher-stats-box {
  background: #FAF9F5;
  border: 1px solid #ECE7DE;
  border-radius: 12px;
  padding: 10px 14px;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 8px 12px;
  margin-bottom: 14px;
}
.teacher-stat-item {
  display: flex;
  flex-direction: column;
  overflow: hidden;
}
.teacher-stat-label {
  font-size: 0.66rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  color: var(--muted);
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 4px;
}
.teacher-stat-val {
  font-size: 0.78rem;
  font-weight: 700;
  color: var(--primary-dark);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Bio Box */
.teacher-bio-box {
  position: relative;
  border-left: 3px solid var(--gold);
  padding: 4px 0 4px 12px;
  margin-bottom: 14px;
  flex: 1;
}
.teacher-bio-text {
  font-size: 0.84rem;
  color: #4A5568;
  line-height: 1.55;
  margin: 0;
  font-style: italic;
}

/* Courses Assigned */
.teacher-courses-section {
  margin-bottom: 18px;
}
.teacher-courses-heading {
  font-size: 0.7rem;
  font-weight: 800;
  letter-spacing: 0.6px;
  text-transform: uppercase;
  color: var(--primary);
  margin-bottom: 6px;
  display: flex;
  align-items: center;
  gap: 5px;
}
.teacher-courses-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
}
.teacher-course-pill {
  background: #F0FDF4;
  color: #166534;
  border: 1px solid #BBF7D0;
  font-size: 0.72rem;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 6px;
  transition: all 0.2s ease;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 3px;
}
.teacher-course-pill:hover {
  background: var(--primary);
  color: #FFFFFF;
  border-color: var(--primary);
}

/* Card Action Footer */
.teacher-card-footer {
  margin-top: auto;
  padding-top: 14px;
  border-top: 1px solid #ECE7DE;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
}
.teacher-card-footer .btn-enquire {
  flex: 1;
  background: var(--primary);
  color: #FFFFFF;
  border: 1.5px solid var(--primary);
  padding: 9px 14px;
  border-radius: 8px;
  font-size: 0.82rem;
  font-weight: 700;
  text-align: center;
  cursor: pointer;
  transition: all 0.2s ease;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
}
.teacher-card-footer .btn-enquire:hover {
  background: var(--primary-light);
  border-color: var(--primary-light);
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(6, 61, 46, 0.25);
}
.teacher-card-footer .btn-detail-link {
  font-size: 0.78rem;
  font-weight: 700;
  color: var(--gold-dark);
  text-decoration: none;
  padding: 9px 12px;
  border-radius: 8px;
  background: rgba(201, 163, 90, 0.1);
  border: 1px solid rgba(201, 163, 90, 0.3);
  cursor: pointer;
  white-space: nowrap;
  transition: all 0.2s ease;
}
.teacher-card-footer .btn-detail-link:hover {
  background: var(--gold);
  color: #FFFFFF;
}

/* ----------------- The 3 Pillars / Ethos Section ----------------- */
.pillars-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
.pillar-card {
  background: #FFFFFF;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 34px 26px;
  text-align: center;
  box-shadow: var(--shadow-sm);
  transition: all 0.25s ease;
  position: relative;
}
.pillar-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
  border-color: var(--gold);
}
.pillar-arabic {
  font-family: var(--font-arabic);
  font-size: 2.8rem;
  color: var(--primary);
  line-height: 1;
  margin-bottom: 10px;
}
.pillar-card h3 {
  font-family: var(--font-serif);
  font-size: 1.5rem;
  color: var(--primary-dark);
  margin-bottom: 4px;
}
.pillar-subtitle {
  font-size: 0.8rem;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--gold-dark);
  font-weight: 800;
  margin-bottom: 14px;
}
.pillar-card p {
  font-size: 0.88rem;
  color: var(--muted);
  line-height: 1.6;
}

/* ----------------- How It Works (Steps) ----------------- */
.steps-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
.step-card {
  background: #FFFFFF;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 32px 24px;
  box-shadow: var(--shadow-sm);
  position: relative;
}
.step-number {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: var(--primary-surface);
  color: var(--primary);
  font-weight: 800;
  font-size: 1.1rem;
  display: grid;
  place-items: center;
  margin-bottom: 20px;
  border: 1px solid rgba(6, 61, 46, 0.15);
}
.step-card h3 {
  font-family: var(--font-serif);
  font-size: 1.35rem;
  color: var(--primary-dark);
  margin-bottom: 8px;
}
.step-card p {
  font-size: 0.88rem;
  color: var(--muted);
  line-height: 1.6;
}

/* ----------------- FAQ Accordion ----------------- */
.faq-wrap {
  max-width: 820px;
  margin: 0 auto;
}
.faq-item {
  border-bottom: 1px solid var(--border);
  background: #FFFFFF;
  border-radius: var(--radius-md);
  margin-bottom: 12px;
  border: 1px solid var(--border);
  overflow: hidden;
}
.faq-q {
  width: 100%;
  padding: 20px 24px;
  text-align: left;
  font-weight: 700;
  font-size: 1.05rem;
  color: var(--primary-dark);
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.faq-q span {
  font-size: 1.4rem;
  color: var(--gold-dark);
}
.faq-a {
  display: none;
  padding: 0 24px 22px;
  color: var(--muted);
  font-size: 0.92rem;
  line-height: 1.65;
}
.faq-item.open .faq-a { display: block; }
.faq-item.open { border-color: var(--gold); }

/* ----------------- Forms & Boxes ----------------- */
.split-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 48px;
  align-items: start;
}
.contact-grid {
  display: grid;
  grid-template-columns: 0.8fr 1.2fr;
  gap: 40px;
}
.form-box {
  background: #FFFFFF;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 36px 30px;
  box-shadow: var(--shadow-md);
}
.form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
}
.form-field {
  display: flex;
  flex-direction: column;
  gap: 6px;
  margin-bottom: 14px;
}
.form-field.full {
  grid-column: 1 / -1;
}
.form-field label {
  font-size: 0.8rem;
  font-weight: 700;
  color: var(--primary-dark);
  text-transform: uppercase;
  letter-spacing: 0.04em;
}
.form-field input, .form-field select, .form-field textarea {
  width: 100%;
  border: 1.5px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 12px 14px;
  background: #FFFFFF;
  color: var(--ink);
  font-size: 0.92rem;
  outline: none;
  transition: all 0.2s ease;
}
.form-field input:focus, .form-field select:focus, .form-field textarea:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(6, 61, 46, 0.1);
}

.info-card {
  background: linear-gradient(145deg, var(--primary) 0%, var(--primary-dark) 100%);
  color: #FFFFFF;
  border-radius: var(--radius-lg);
  padding: 34px 28px;
  box-shadow: var(--shadow-md);
  border: 1px solid rgba(201, 163, 90, 0.3);
}
.info-card h3 {
  font-family: var(--font-serif);
  font-size: 1.6rem;
  color: #FFFFFF;
  margin-bottom: 12px;
}
.info-card p {
  color: #D3E6DC;
  font-size: 0.9rem;
  line-height: 1.6;
  margin-bottom: 22px;
}
.info-list-item {
  display: flex;
  gap: 12px;
  align-items: flex-start;
  padding: 12px 0;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  font-size: 0.86rem;
}
.info-list-item:last-child { border-bottom: none; }
.info-list-item i {
  color: var(--gold);
  font-size: 1.1rem;
  margin-top: 2px;
}

/* ----------------- Course Detail Modal / Page ----------------- */
.course-detail-container {
  max-width: 980px;
  margin: 0 auto;
  background: #FFFFFF;
  border: 1px solid var(--border);
  border-radius: var(--radius-lg);
  padding: 36px 32px;
  box-shadow: var(--shadow-lg);
}
.detail-banner-wrap {
  position: relative;
  border-radius: var(--radius-md);
  overflow: hidden;
  margin-bottom: 24px;
  box-shadow: var(--shadow-md);
  border: 1px solid var(--border);
}
.detail-banner-wrap img {
  width: 100%;
  aspect-ratio: 16 / 9;
  object-fit: cover;
}

/* ----------------- Footer ----------------- */
.footer {
  background: var(--primary-dark);
  color: #CBDCD4;
  padding: 60px 0 24px;
  border-top: 3px solid var(--gold);
}
.footer-grid {
  display: grid;
  grid-template-columns: 1.4fr 1fr 1fr 1fr;
  gap: 36px;
  margin-bottom: 40px;
}
.footer-col h4 {
  color: #FFFFFF;
  font-size: 0.88rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin-bottom: 18px;
  border-left: 3px solid var(--gold);
  padding-left: 8px;
}
.footer-col a {
  display: block;
  font-size: 0.84rem;
  color: #A9C2B7;
  margin-bottom: 10px;
}
.footer-col a:hover {
  color: var(--gold);
  transform: translateX(3px);
}
.footer-bottom {
  border-top: 1px solid rgba(255, 255, 255, 0.12);
  padding-top: 22px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 12px;
  font-size: 0.78rem;
  color: #8CA99D;
}

/* ----------------- Toast Notification ----------------- */
.toast-msg {
  position: fixed;
  bottom: 24px;
  left: 50%;
  transform: translate(-50%, 40px);
  opacity: 0;
  pointer-events: none;
  background: var(--primary-dark);
  color: #FFFFFF;
  border: 1px solid var(--gold);
  padding: 14px 22px;
  border-radius: var(--radius-pill);
  box-shadow: var(--shadow-lg);
  font-size: 0.88rem;
  font-weight: 600;
  z-index: 1000;
  transition: all 0.28s ease;
}
.toast-msg.show {
  transform: translate(-50%, 0);
  opacity: 1;
}

/* ----------------- Responsive Breakpoints ----------------- */
@media (max-width: 992px) {
  .hero-grid { grid-template-columns: 1fr; text-align: center; }
  .hero p { margin-inline: auto; }
  .hero-actions { justify-content: center; }
  .hero-trust { justify-content: center; }
  .cards, .teachers-grid, .pillars-grid { grid-template-columns: repeat(2, 1fr); }
  .pathway-grid { grid-template-columns: repeat(2, 1fr); }
  .footer-grid { grid-template-columns: 1fr 1fr; }
  .split-layout, .contact-grid { grid-template-columns: 1fr; }
  .slider-track > * { flex-basis: calc((100% - 24px) / 2); }
}

@media (max-width: 1240px) and (min-width: 1121px) {
  .navlink-item {
    font-size: 0.8rem !important;
    padding: 6px 10px !important;
  }
  .nav-btn {
    font-size: 0.8rem !important;
    padding: 6px 14px !important;
    height: 36px !important;
  }
  .brand-name {
    font-size: 1.05rem !important;
  }
  .brand-motto {
    font-size: 0.6rem !important;
  }
  .nav-menu {
    gap: 3px !important;
  }
}

@media (max-width: 1120px) {
  .nav-menu {
    display: none !important;
  }
  .nav-actions .nav-btn,
  .nav-actions .taqwa-coin-badge {
    display: none !important;
  }
  .nav-toggle-btn {
    display: flex !important;
  }
}

@media (max-width: 768px) {
  .cards, .teachers-grid, .steps-grid, .pillars-grid, .pathway-grid { grid-template-columns: 1fr; }
  .stats-grid { grid-template-columns: 1fr 1fr; }
  .stat-box:nth-child(2) { border-right: none; }
  .stat-box { border-bottom: 1px solid var(--border); }
  .form-grid { grid-template-columns: 1fr; }
  .footer-grid { grid-template-columns: 1fr; }
  .slider-track > * { flex-basis: 90%; }
  .slider-container { padding: 0; }
  .slider-btn { display: none; }
}

@media (max-width: 480px) {
  .navin {
    height: 66px !important;
  }
  .brandmark {
    width: 38px !important;
    height: 38px !important;
  }
  .brand-name {
    font-size: 0.94rem !important;
  }
  .brand-motto {
    font-size: 0.54rem !important;
    letter-spacing: 0.08em !important;
  }
}
</style>
</head>
<body>

<!-- ==========================================
     PRIMARY 3-ZONE NAVIGATION HEADER
     ========================================== -->
<header class="nav-header">
  <div class="wrap navin">
    <!-- ZONE 1: BRAND IDENTITY -->
    <a class="brand" href="#home" data-page="home" title="AL-TAQWA Institute Home">
      <div class="brandmark">
        <img src="{{ asset('assets/images/altaqwa-logo.png') }}" onerror="this.src='{{ asset('global_assets/images/altaqwa_emblem.jpg') }}'" alt="AL-TAQWA Emblem">
      </div>
      <div class="brand-titles">
        <strong class="brand-name">AL-TAQWA <span>INSTITUTE</span></strong>
        <small class="brand-motto">Taleem • Tarbiyah • Tazkiyah</small>
      </div>
    </a>

    <!-- ZONE 2: PRIMARY NAVIGATION LINKS -->
    <nav class="nav-menu" id="navMenu" aria-label="Main Navigation">
      <a href="#home" class="navlink-item active" data-page="home">Home</a>
      <a href="#courses" class="navlink-item" data-page="courses">Courses</a>
      <a href="{{ route('storefront.zikr_durood') }}" class="navlink-item">Zikr &amp; Durood</a>
      <a href="{{ route('storefront.verify_certificate') }}" class="navlink-item">Verify Sanad&nbsp;↗</a>
      <a href="#teachers" class="navlink-item" data-page="teachers">Scholars</a>
      <a href="#about" class="navlink-item" data-page="about">About &amp; Admissions</a>
    </nav>

    <!-- ZONE 3: ACTIONS & UTILITIES -->
    <div class="nav-actions">
      @auth
        @if(\App\Helpers\Qs::userIsStudent())
        <span class="taqwa-coin-badge" title="Taqwa Coins Balance">🪙 {{ Auth::user()->coins_balance }} Coins</span>
        @endif
        <a class="btn btn-gold nav-btn" href="{{ route('dashboard') }}">
          {{ \App\Helpers\Qs::userIsStudent() ? 'Student Hub' : 'Academic Dashboard' }}&nbsp;↗
        </a>
      @else
        <a class="btn btn-outline-gold nav-btn" href="#about" data-page="admissions">Apply Now</a>
        <a class="btn btn-gold nav-btn" href="{{ route('login') }}">Sign In&nbsp;↗</a>
      @endauth

      <!-- Mobile Hamburger Toggle Button -->
      <button class="nav-toggle-btn" id="navToggleBtn" aria-label="Toggle Navigation Menu" aria-expanded="false">
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
      </button>
    </div>
  </div>

  <!-- RESPONSIVE MOBILE DRAWER (Below 1024px) -->
  <div class="nav-mobile-drawer" id="navMobileDrawer">
    <div class="mobile-drawer-inner">
      <div class="mobile-nav-links">
        <a href="#home" class="mobile-navlink active" data-page="home">
          <span class="nav-bullet">✦</span> Home
        </a>
        <a href="#courses" class="mobile-navlink" data-page="courses">
          <span class="nav-bullet">✦</span> Courses &amp; Programs
        </a>
        <a href="{{ route('storefront.zikr_durood') }}" class="mobile-navlink">
          <span class="nav-bullet">✦</span> Zikr &amp; Durood Sanctuary
        </a>
        <a href="{{ route('storefront.verify_certificate') }}" class="mobile-navlink">
          <span class="nav-bullet">✦</span> Verify Sanad Certificate&nbsp;↗
        </a>
        <a href="#teachers" class="mobile-navlink" data-page="teachers">
          <span class="nav-bullet">✦</span> Meet Our Scholars
        </a>
        <a href="#about" class="mobile-navlink" data-page="about">
          <span class="nav-bullet">✦</span> About &amp; Admissions
        </a>
      </div>
      <div class="mobile-drawer-footer">
        @auth
          @if(\App\Helpers\Qs::userIsStudent())
          <div class="mobile-coin-box">
            <span>🪙 <strong>{{ Auth::user()->coins_balance }}</strong> Taqwa Coins Balance</span>
          </div>
          @endif
          <a class="btn btn-gold" href="{{ route('dashboard') }}" style="width: 100%; justify-content: center;">
            {{ \App\Helpers\Qs::userIsStudent() ? 'Student Hub' : 'Academic Dashboard' }}&nbsp;↗
          </a>
        @else
          <div class="mobile-btn-grid">
            <a class="btn btn-outline-gold" href="#about" data-page="admissions" style="flex: 1; justify-content: center; text-align: center;">Apply Now</a>
            <a class="btn btn-gold" href="{{ route('login') }}" style="flex: 1; justify-content: center; text-align: center;">Sign In&nbsp;↗</a>
          </div>
        @endauth
      </div>
    </div>
  </div>
</header>

@include('partials.announcement_slider')
@include('partials.prayer_widget')

<main>
  <!-- ==========================================
       PAGEVIEW 1: HOME
       ========================================== -->
  <div id="home" class="pageview active">
    <!-- Hero Section -->
    <section class="hero">
      <div class="wrap hero-grid">
        <div>
          <div class="bismillah-watermark">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div>
          <div class="hero-tag">TALEEM • TARBIYAH • TAZKIYAH</div>
          <h1>Cultivate Sacred Knowledge.<br><em>Rooted in Sunnah, Designed for Life.</em></h1>
          <p>Connect your heart with the Noble Qur’an, Islamic jurisprudence, classical Arabic, and Prophetic character through structured live online programs under qualified scholars.</p>
          <div class="hero-actions">
            <a class="btn btn-gold" href="#courses" data-page="courses">Explore All 12 Courses ↗</a>
            <a class="btn btn-outline-gold" href="#admissions" data-page="admissions">Apply for Admission ↗</a>
          </div>
          <div class="hero-trust">
            <span>Live Interactive Sessions</span>
            <span>Brothers & Sisters Batches</span>
            <span>Worldwide Online Access</span>
            <span>Verified Sanad & Certificates</span>
          </div>
        </div>

        <div class="hero-visual">
          <div class="hero-arch-card">
            <img src="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}" alt="AL-TAQWA">
            <h3>AL-TAQWA</h3>
            <p>Institute of Islamic Studies</p>
            <div style="font-size: 0.85rem; color: #D6EDE3; line-height: 1.6;">
              Online Islamic Education worldwide with structured progress tracking, teacher mentorship, and recognized certificates.
            </div>
            <div class="hero-floating-badge badge-top-left">
              <span>📖</span>
              <div><b>12 Programs</b>Official Curriculum</div>
            </div>
            <div class="hero-floating-badge badge-bottom-right">
              <span>✦</span>
              <div><b>Global Live</b>Any Time Zone</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Metrics Ribbon -->
    <section class="stats-banner">
      <div class="wrap stats-grid">
        <div class="stat-box">
          <strong>12</strong>
          <span>Certified Courses</span>
        </div>
        <div class="stat-box">
          <strong>4</strong>
          <span>Academic Disciplines</span>
        </div>
        <div class="stat-box">
          <strong>Live Online</strong>
          <span>Interactive Classrooms</span>
        </div>
        <div class="stat-box">
          <strong>All Learners</strong>
          <span>Brothers & Sisters</span>
        </div>
      </div>
    </section>

    <!-- Core Academic Pathways -->
    <section class="section" style="background: #FFFFFF;">
      <div class="wrap">
        <div class="section-head">
          <div class="eyebrow">Academic Curriculum</div>
          <h2>Structured Learning Pathways</h2>
          <p>Discover our 4 core academic departments designed to provide balanced, traditional Islamic education.</p>
        </div>

        <div class="pathway-grid">
          <div class="pathway-card" data-cat-nav="Qur'an & Tajweed">
            <div class="pathway-icon">📖</div>
            <h3>Qur'an & Tajweed</h3>
            <p>Master verse-by-verse Tafseer, precise pronunciation rules (Makharij & Sifaat), and intensive 4-year Hifz memorization.</p>
            <div class="pathway-meta">3 Certified Programs →</div>
          </div>

          <div class="pathway-card" data-cat-nav="Islamic Studies">
            <div class="pathway-icon">🕌</div>
            <h3>Islamic Studies</h3>
            <p>From the sublime Seerah of Prophet Muhammad ﷺ to Tawheed, Fiqh of Salah, and the comprehensive 4-Year Alima Course.</p>
            <div class="pathway-meta">4 Certified Programs →</div>
          </div>

          <div class="pathway-card" data-cat-nav="Arabic & Urdu">
            <div class="pathway-icon">📜</div>
            <h3>Arabic & Urdu</h3>
            <p>Direct Quranic Arabic grammar (Nahw & Sarf), conversational Arabic, Noorani Qaida phonetics, and Urdu reading & writing.</p>
            <div class="pathway-meta">3 Certified Programs →</div>
          </div>

          <div class="pathway-card" data-cat-nav="Workshops & Short Courses">
            <div class="pathway-icon">🎙️</div>
            <h3>Workshops & Short Courses</h3>
            <p>Practical intensive workshops including word-by-word Namaz translation for Khushoo and Islamic Public Speaking & Content Creation.</p>
            <div class="pathway-meta">2 Certified Programs →</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Courses Slider -->
    <section class="section" id="featuredSection" style="background: var(--cream);">
      <div class="wrap">
        <div class="section-head">
          <div class="eyebrow">Official Programs</div>
          <h2>Featured Academic Courses</h2>
          <p>Every course features the official AL-TAQWA syllabus, dedicated scholars, live classes, and digital certification.</p>
        </div>

        <div class="slider-container" data-slider>
          <button class="slider-btn prev" aria-label="Previous Courses">‹</button>
          <div class="slider-track" id="homeCourses"></div>
          <button class="slider-btn next" aria-label="Next Courses">›</button>
          <div class="slider-dots"></div>
        </div>

        <div style="text-align: center; margin-top: 36px;">
          <a class="btn btn-green" href="#courses" data-page="courses">Browse All 12 Courses & Schedules ↗</a>
        </div>
      </div>
    </section>

    <!-- The 3 Pillars Section -->
    <section class="section" style="background: #FFFFFF;">
      <div class="wrap">
        <div class="section-head">
          <div class="eyebrow">Our Guiding Ethos</div>
          <h2>The Three Pillars of AL-TAQWA</h2>
          <p>Sacred Islamic knowledge is not merely academic data — it transforms intellect, character, and spirit.</p>
        </div>

        <div class="pillars-grid">
          <div class="pillar-card">
            <div class="pillar-arabic">تَعْلِيم</div>
            <h3>Taleem</h3>
            <div class="pillar-subtitle">Sacred Knowledge</div>
            <p>Systematic, authentic Islamic scholarship grounded in the Holy Qur’an and authentic Sunnah according to the understanding of Ahlus Sunnah Wal Jama’ah.</p>
          </div>

          <div class="pillar-card">
            <div class="pillar-arabic">تَرْبِيَة</div>
            <h3>Tarbiyah</h3>
            <div class="pillar-subtitle">Moral Cultivation</div>
            <p>Nurturing sublime character, etiquette (Adab), and practical application of the Sunnah in everyday family, social, and professional life.</p>
          </div>

          <div class="pillar-card">
            <div class="pillar-arabic">تَزْكِيَة</div>
            <h3>Tazkiyah</h3>
            <div class="pillar-subtitle">Spiritual Purity</div>
            <p>Cleansing the heart from spiritual ailments, cultivating sincere devotion (Ikhlas), deep prayer Khushu, and living in constant remembrance of Allah.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Faculty Preview Section -->
    <section class="section" style="background: var(--primary-surface);">
      <div class="wrap">
        <div class="section-head">
          <div class="eyebrow">✦ Traditional Sanad & Authentic Pedagogy</div>
          <h2>Meet Our Scholars & Ustadhs</h2>
          <p>Learn directly from formally certified Qaris, Huffaz, Mufassireen, and Alimaat who combine traditional Islamic mastery with patient, student-centered online instruction.</p>
        </div>

        <div class="slider-container" data-slider>
          <button class="slider-btn prev" aria-label="Previous Teachers">‹</button>
          <div class="slider-track" id="homeTeachers"></div>
          <button class="slider-btn next" aria-label="Next Teachers">›</button>
          <div class="slider-dots"></div>
        </div>

        <div style="text-align: center; margin-top: 36px;">
          <a class="btn btn-green" href="#teachers" data-page="teachers">View All Faculty Profiles ↗</a>
        </div>
      </div>
    </section>

    <!-- Enrollment Steps -->
    <section class="section" style="background: #FFFFFF;">
      <div class="wrap">
        <div class="section-head">
          <div class="eyebrow">Simple & Clear</div>
          <h2>Your 3-Step Enrollment Path</h2>
          <p>Joining AL-TAQWA Institute is straightforward and supported by our admissions advisors at every step.</p>
        </div>

        <div class="steps-grid">
          <div class="step-card">
            <div class="step-number">01</div>
            <h3>Select Your Course</h3>
            <p>Browse our 12 certified courses. Review syllabus details, schedules, and batch options to find your ideal fit.</p>
          </div>

          <div class="step-card">
            <div class="step-number">02</div>
            <h3>Submit Enquiry</h3>
            <p>Send your admission request with your preferred timing. Our academic team will confirm your placement and ustadh.</p>
          </div>

          <div class="step-card">
            <div class="step-number">03</div>
            <h3>Begin Your Classes</h3>
            <p>Receive your official student credentials and live classroom link to start your journey of sacred knowledge.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Frequently Asked Questions -->
    <section class="section" style="background: var(--cream);">
      <div class="wrap">
        <div class="section-head">
          <div class="eyebrow">Clear Answers</div>
          <h2>Frequently Asked Questions</h2>
          <p>Everything you need to know about class timings, global accessibility, and student certification.</p>
        </div>

        <div class="faq-wrap" id="homeFaq"></div>
      </div>
    </section>

    <!-- Call to Action Banner -->
    <section style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%); color: #FFFFFF; padding: 60px 0; border-top: 3px solid var(--gold);">
      <div class="wrap" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 24px;">
        <div>
          <h2 style="font-family: var(--font-serif); font-size: 2.2rem; color: #FFFFFF; margin-bottom: 8px;">Begin Your Sacred Knowledge Journey</h2>
          <p style="color: #D3E6DC; font-size: 1.05rem; margin: 0;">Speak with our admissions team to find the best course batch for your schedule.</p>
        </div>
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
          <a class="btn btn-gold" href="#admissions" data-page="admissions">Apply for Admission ↗</a>
          <a class="btn btn-outline-gold" href="#contact" data-page="contact">Speak to an Advisor ↗</a>
        </div>
      </div>
    </section>
  </div>

  <!-- ==========================================
       PAGEVIEW 2: ALL COURSES CATALOG
       ========================================== -->
  <div id="courses" class="pageview">
    <section class="subhero">
      <div class="wrap">
        <span class="subhero-eyebrow">Academic Curriculum</span>
        <h1>Official Courses & Programs</h1>
        <p>Explore all 12 authentic Islamic courses designed for spiritual growth and academic depth. Learn live online with dedicated scholars and structured progress tracking.</p>
      </div>
    </section>

    <section class="page-content">
      <div class="wrap">
        <!-- Category Filter Tabs -->
        <div class="filter-tabs" id="courseCatFilters"></div>

        <!-- Search Field -->
        <div class="search-field">
          <input id="courseFilter" placeholder="Search by course name, topic, or keyword (e.g. Tafseer, Tajweed, Alima)...">
        </div>

        <!-- Course Cards Grid -->
        <div class="cards" id="allCourses"></div>

        <p style="margin-top: 36px; font-size: 0.86rem; color: var(--muted); text-align: center;">
          ✦ All 12 programs include live interactive lectures, study notes, online progress tracking, and authenticated digital certification upon completion.
        </p>
      </div>
    </section>
  </div>

  <!-- ==========================================
       PAGEVIEW 3: COURSE DETAIL VIEW
       ========================================== -->
  <div id="courseDetail" class="pageview">
    <section class="subhero">
      <div class="wrap">
        <span class="subhero-eyebrow" id="detailCatBadge">Course Overview</span>
        <h1 id="detailTitle">Course Title</h1>
        <p id="detailDesc"></p>
      </div>
    </section>

    <section class="page-content">
      <div class="wrap">
        <div class="course-detail-container">
          <div id="detailLong"></div>
          <div style="display: flex; gap: 14px; flex-wrap: wrap; margin-top: 28px; padding-top: 22px; border-top: 1px solid var(--border);">
            <button class="btn btn-green" id="detailEnquire">Apply / Enquire for this Course ↗</button>
            <button class="btn btn-outline-green" data-page="courses">Back to All Courses</button>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- ==========================================
       PAGEVIEW 4: FACULTY / TEACHERS
       ========================================== -->
  <div id="teachers" class="pageview">
    <section class="subhero">
      <div class="wrap">
        <span class="subhero-eyebrow">✦ Academic Faculty & Scholars</span>
        <h1>Distinguished Instructors & Mentors</h1>
        <p>Every instructor at AL-TAQWA Institute is formally qualified with authenticated Sanad, Ijazah, or specialized Islamic scholarship degrees. Experience patient mentorship, interactive live halqas, and direct teacher guidance.</p>
      </div>
    </section>

    <section class="page-content">
      <div class="wrap">
        <div class="filter-tabs" id="tFilters"></div>
        <div class="teachers-grid" id="tGrid"></div>
        <p style="margin-top: 36px; font-size: 0.86rem; color: var(--muted); text-align: center;">
          Teacher availability and individual batch assignments are finalized during the admissions placement process.
        </p>
      </div>
    </section>
  </div>

  <!-- ==========================================
       PAGEVIEW 5: ABOUT US, ADMISSIONS & CONTACT (UNIFIED)
       ========================================== -->
  <div id="about" class="pageview">
    <div id="admissions" style="position: relative; top: -80px; visibility: hidden;"></div>
    <div id="contact" style="position: relative; top: -80px; visibility: hidden;"></div>

    <section class="subhero">
      <div class="wrap">
        <span class="subhero-eyebrow">Institutional Sanctuary & Admissions</span>
        <h1>About AL-TAQWA Institute & Global Admissions</h1>
        <p>An international online sanctuary for traditional Islamic scholarship, dedicated sisters' education, and global student admissions.</p>
      </div>
    </section>

    <!-- SECTION A: Institutional Profile & Commitments -->
    <section class="page-content" style="padding-bottom: 24px;">
      <div class="wrap split-layout">
        <div>
          <div class="subhero-eyebrow" style="color: var(--primary);">Our Purpose & Vision</div>
          <h2 style="font-family: var(--font-serif); font-size: 2.2rem; color: var(--primary-dark); margin-bottom: 16px;">
            Making Sacred Knowledge Accessible, Meaningful & Consistent.
          </h2>
          <p style="color: var(--muted); line-height: 1.7; margin-bottom: 16px;">
            Modern life often prevents sincere seekers from traveling to residential seminaries or attending in-person madrasas. AL-TAQWA Institute was founded to bridge this gap, bringing authentic Islamic scholarship directly into homes across India, the UK, the United States, the Gulf, and worldwide.
          </p>
          <p style="color: var(--muted); line-height: 1.7; margin-bottom: 24px;">
            We maintain the authentic rigor of traditional Islamic education (Dars-e-Nizami, Sanad-based Tajweed, and Hadith transmission) while using modern online classrooms, live interactive video sessions, and individual student progress tracking.
          </p>

          <div style="background: var(--cream-alt); border-left: 4px solid var(--gold); padding: 18px 22px; border-radius: 0 var(--radius-sm) var(--radius-sm) 0; margin-bottom: 24px;">
            <strong style="color: var(--primary-dark); display: block; font-size: 1.1rem; margin-bottom: 4px;">Our Core Motto</strong>
            <span style="color: var(--gold-dark); font-weight: 700; font-size: 1.05rem;">Taleem • Tarbiyah • Tazkiyah</span>
            <p style="font-size: 0.86rem; color: var(--muted); margin-top: 6px;">Knowledge without character is empty; learning without spiritual purification cannot guide the soul.</p>
          </div>
        </div>

        <div class="info-card">
          <h3>Our Commitments to Every Student</h3>
          <p>We are dedicated to providing a transparent, nurturing, and spiritually uplifting educational sanctuary.</p>

          <div class="info-list-item">
            <i>✓</i>
            <div>
              <strong style="color:#FFFFFF; display:block; margin-bottom:2px;">Authentic Ahlus Sunnah Curriculum</strong>
              <span style="color:#D3E6DC; font-size:0.84rem;">Rooted in recognized classical texts, authenticated Tafseer, and verified Hadith collections.</span>
            </div>
          </div>

          <div class="info-list-item">
            <i>✓</i>
            <div>
              <strong style="color:#FFFFFF; display:block; margin-bottom:2px;">Dedicated Sisters’ Faculty</strong>
              <span style="color:#D3E6DC; font-size:0.84rem;">Complete 4-Year Alima Course and private sister cohorts taught exclusively by qualified female scholars (Alimaat).</span>
            </div>
          </div>

          <div class="info-list-item">
            <i>✓</i>
            <div>
              <strong style="color:#FFFFFF; display:block; margin-bottom:2px;">Live Interactive Classrooms</strong>
              <span style="color:#D3E6DC; font-size:0.84rem;">Small batch sizes allowing live recitation correction, interactive Q&A, and direct ustadh feedback.</span>
            </div>
          </div>

          <div class="info-list-item">
            <i>✓</i>
            <div>
              <strong style="color:#FFFFFF; display:block; margin-bottom:2px;">Student Hub & Digital Sanad</strong>
              <span style="color:#D3E6DC; font-size:0.84rem;">Track attendance, listen to session recordings, complete weekly assessments, and receive verifiable certificates.</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION B: Admissions Overview & Pillars -->
    <section style="background: var(--cream-alt); padding: 50px 0; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); margin: 30px 0 50px;">
      <div class="wrap">
        <div style="text-align: center; max-width: 680px; margin: 0 auto 36px;">
          <span class="subhero-eyebrow" style="color: var(--primary);">Global Admissions Pathway</span>
          <h2 style="font-family: var(--font-serif); font-size: 2rem; color: var(--primary-dark); margin-bottom: 10px;">
            How Our Academy Welcomes Students Worldwide
          </h2>
          <p style="color: var(--muted); font-size: 0.95rem;">
            Whether you are beginning foundational Tajweed or pursuing an advanced Alimiyyah degree, our academic admissions process is simple, structured, and personal.
          </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
          <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-md); padding: 24px; box-shadow: var(--shadow-sm); border-top: 3px solid var(--gold);">
            <div style="font-size: 1.8rem; margin-bottom: 10px;">🌐</div>
            <strong style="display: block; font-size: 1.05rem; color: var(--primary-dark); margin-bottom: 6px;">Global Flexibility</strong>
            <p style="font-size: 0.85rem; color: var(--muted); line-height: 1.6; margin: 0;">Morning, evening, and weekend batches synchronized across IST, BST/GMT, GST, and EST/CST.</p>
          </div>

          <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-md); padding: 24px; box-shadow: var(--shadow-sm); border-top: 3px solid var(--gold);">
            <div style="font-size: 1.8rem; margin-bottom: 10px;">👥</div>
            <strong style="display: block; font-size: 1.05rem; color: var(--primary-dark); margin-bottom: 6px;">Separate Classrooms</strong>
            <p style="font-size: 0.85rem; color: var(--muted); line-height: 1.6; margin: 0;">Brothers & Sisters study in independent, respectful online environments with dedicated female faculty for sisters.</p>
          </div>

          <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-md); padding: 24px; box-shadow: var(--shadow-sm); border-top: 3px solid var(--gold);">
            <div style="font-size: 1.8rem; margin-bottom: 10px;">🎓</div>
            <strong style="display: block; font-size: 1.05rem; color: var(--primary-dark); margin-bottom: 6px;">Need-Based Aid</strong>
            <p style="font-size: 0.85rem; color: var(--muted); line-height: 1.6; margin: 0;">Dedicated scholarship fund available for sincere seekers of knowledge enrolling in the 4-Year Alima Course.</p>
          </div>

          <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-md); padding: 24px; box-shadow: var(--shadow-sm); border-top: 3px solid var(--gold);">
            <div style="font-size: 1.8rem; margin-bottom: 10px;">💯</div>
            <strong style="display: block; font-size: 1.05rem; color: var(--primary-dark); margin-bottom: 6px;">100% Refundable</strong>
            <p style="font-size: 0.85rem; color: var(--muted); line-height: 1.6; margin: 0;">Foundational workshops (like the Namaz Translation Workshop) refund 100% of the deposit upon passing evaluation.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION C: Academic Directory & Unified Application / Contact Form -->
    <section class="page-content" id="enquiry-section" style="padding-top: 0; padding-bottom: 80px;">
      <div class="wrap contact-grid">
        <!-- Directory Card -->
        <div>
          <div class="info-card" style="margin-bottom: 24px;">
            <h3>Academic Directory & Helpdesk</h3>
            <p>Connect directly with our administration and admissions counselors for any program, teacher consultation, or student verification support.</p>

            <div class="info-list-item">
              <i>✉</i>
              <div>
                <strong style="color:#FFFFFF; display:block;">Official Admissions Email</strong>
                <a href="mailto:officialaltaqwa@gmail.com" style="color:var(--gold); font-weight: 600;">officialaltaqwa@gmail.com</a>
              </div>
            </div>

            <div class="info-list-item">
              <i>🌐</i>
              <div>
                <strong style="color:#FFFFFF; display:block;">Official Academy Website</strong>
                <span style="color:#D3E6DC;">www.altaqwauniversity.com</span>
              </div>
            </div>

            <div class="info-list-item">
              <i>⏰</i>
              <div>
                <strong style="color:#FFFFFF; display:block;">Admissions Support Hours</strong>
                <span style="color:#D3E6DC;">Monday – Saturday · Support across IST, BST, EST, and GST</span>
              </div>
            </div>

            <div class="info-list-item">
              <i>🎓</i>
              <div>
                <strong style="color:#FFFFFF; display:block;">Certificate Verification</strong>
                <a href="{{ route('storefront.verify_certificate') }}" style="color:var(--gold); font-weight: 600;">Verify Online Sanad ↗</a>
              </div>
            </div>
          </div>

          <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-md); padding: 22px; box-shadow: var(--shadow-sm);">
            <strong style="color: var(--primary-dark); display: block; font-size: 1.05rem; margin-bottom: 6px;">Need Placement Guidance?</strong>
            <p style="font-size: 0.86rem; color: var(--muted); line-height: 1.6; margin-bottom: 12px;">
              Not sure which level of Arabic or Tajweed is right for you? Submit your enquiry, and an academic advisor will schedule a brief placement assessment or trial halqa.
            </p>
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
              <span style="font-size: 0.78rem; background: var(--primary-surface); color: var(--primary-dark); padding: 4px 10px; border-radius: var(--radius-pill); font-weight: 600;">✓ Free Trial Halqas</span>
              <span style="font-size: 0.78rem; background: var(--primary-surface); color: var(--primary-dark); padding: 4px 10px; border-radius: var(--radius-pill); font-weight: 600;">✓ 1-on-1 Guidance</span>
            </div>
          </div>
        </div>

        <!-- Form Box -->
        <div class="form-box">
          <div style="margin-bottom: 20px;">
            <span class="subhero-eyebrow" style="color: var(--gold-dark); margin-bottom: 4px;">Fast Application & Enquiry</span>
            <h3 style="font-family: var(--font-serif); font-size: 1.7rem; color: var(--primary-dark); margin-bottom: 6px;">Admissions Application & Enquiry</h3>
            <p style="font-size: 0.88rem; color: var(--muted);">Fill out the form below to apply for admission, request batch schedules, or send an enquiry to our academic office.</p>
          </div>

          <form id="admissionForm">
            <div class="form-grid">
              <div class="form-field">
                <label for="adName">Full Name *</label>
                <input id="adName" name="name" required placeholder="e.g. Abdullah Khan / Fatima Zahra">
              </div>

              <div class="form-field">
                <label for="adEmail">Email Address *</label>
                <input id="adEmail" name="email" type="email" required placeholder="you@example.com">
              </div>

              <div class="form-field">
                <label for="adPhone">WhatsApp / Phone *</label>
                <input id="adPhone" name="phone" required placeholder="e.g. +91 98765 43210">
              </div>

              <div class="form-field">
                <label for="adCountry">Country of Residence *</label>
                <input id="adCountry" name="country" required placeholder="e.g. India, UK, USA, UAE">
              </div>

              <div class="form-field">
                <label for="adSubject">Purpose of Enquiry *</label>
                <select id="adSubject" name="subject" required>
                  <option value="Course Admission Application">Course Admission Application</option>
                  <option value="Batch Timings & Schedule Inquiry">Batch Timings & Schedule Inquiry</option>
                  <option value="Scholarship & Fee Support Request">Scholarship & Fee Support Request</option>
                  <option value="Sister's Cohort / Alima Course Details">Sister's Cohort / Alima Course Details</option>
                  <option value="Student Records & Certificate Support">Student Records & Certificate Support</option>
                  <option value="General Academic Enquiry">General Academic Enquiry</option>
                </select>
              </div>

              <div class="form-field">
                <label for="adTime">Preferred Timing / Time Zone</label>
                <input id="adTime" name="time" placeholder="e.g. Weekend morning (IST) / Evening (GMT)">
              </div>

              <div class="form-field full">
                <label for="adCourse">Select Course of Interest *</label>
                <select id="adCourse" name="course" required>
                  <option value="">-- Choose from our 12 certified programs --</option>
                  <optgroup label="Qur'an & Tajweed">
                    <option value="Tafseer-ul-Qur’an — Weekend Program">Tafseer-ul-Qur’an — Weekend Program</option>
                    <option value="Diploma in Tajweed-e-Quran">Diploma in Tajweed-e-Quran</option>
                    <option value="Hifz-ul-Qur’an Program (Advanced Diploma)">Hifz-ul-Qur’an Program (Advanced Diploma)</option>
                  </optgroup>
                  <optgroup label="Islamic Studies">
                    <option value="Seerat-un-Nabi ﷺ Program">Seerat-un-Nabi ﷺ Program</option>
                    <option value="Certificate in Basic Islamic Beliefs (Tawheed & Aqeedah)">Certificate in Basic Islamic Beliefs (Tawheed & Aqeedah)</option>
                    <option value="Certificate in Salah, Duas & Sunnah Lifestyle">Certificate in Salah, Duas & Sunnah Lifestyle</option>
                    <option value="Alima Course (Advanced Diploma in Islamic Studies)">Alima Course (Advanced Diploma in Islamic Studies)</option>
                  </optgroup>
                  <optgroup label="Arabic & Urdu">
                    <option value="Diploma in Arabic Language">Diploma in Arabic Language</option>
                    <option value="Certificate in Basic Arabic Reading (Noorani Qaida)">Certificate in Basic Arabic Reading (Noorani Qaida)</option>
                    <option value="Certificate in Urdu Reading & Writing">Certificate in Urdu Reading & Writing</option>
                  </optgroup>
                  <optgroup label="Workshops & Short Courses">
                    <option value="Free Namaz Translation Workshop">Free Namaz Translation Workshop</option>
                    <option value="Certificate in Islamic Public Speaking & Content Creation">Certificate in Islamic Public Speaking & Content Creation</option>
                  </optgroup>
                  <optgroup label="Other">
                    <option value="General Academic Inquiry (Multiple Courses)">General Academic Inquiry (Multiple Courses)</option>
                  </optgroup>
                </select>
              </div>

              <div class="form-field full">
                <label for="adMessage">Questions or Notes for Academic Advisors</label>
                <textarea id="adMessage" name="message" rows="3" placeholder="Tell us about your learning background, previous Islamic studies, or specific questions."></textarea>
              </div>
            </div>

            <button class="btn btn-green" type="submit" style="width: 100%; padding: 14px; font-size: 0.96rem; margin-top: 10px;">
              Submit Application & Enquiry ↗
            </button>
            <p style="font-size: 0.78rem; color: var(--muted); text-align: center; margin-top: 12px; line-height: 1.4;">
              Submitting opens an official email draft to <strong>officialaltaqwa@gmail.com</strong> with your details formatted.
            </p>
          </form>
        </div>
      </div>
    </section>
  </div>
</main>

<!-- ==========================================
     FOOTER
     ========================================== -->
<footer class="footer">
  <div class="wrap">
    <div class="footer-grid">
      <div class="footer-col">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 14px;">
          <img src="{{ asset('global_assets/images/altaqwa_emblem.jpg') }}" alt="AL-TAQWA" style="width: 44px; height: 44px; border-radius: 8px; border: 1.5px solid var(--gold);">
          <div>
            <strong style="color: #FFFFFF; font-size: 1.15rem; display: block; line-height: 1.1;">AL-TAQWA</strong>
            <small style="color: #BED8CC; font-size: 0.68rem; letter-spacing: 0.12em; text-transform: uppercase;">Institute of Islamic Studies</small>
          </div>
        </div>
        <p style="font-size: 0.84rem; line-height: 1.6; color: #A9C2B7; margin-bottom: 16px;">
          Dedicated to cultivating authentic, balanced Islamic scholarship and moral refinement (Taleem, Tarbiyah, and Tazkiyah) across the globe through structured online live classrooms.
        </p>
        <p style="font-size: 0.84rem; color: var(--gold);">
          Email: officialaltaqwa@gmail.com<br>
          Website: altaqwauniversity.com
        </p>
      </div>

      <div class="footer-col">
        <h4>Explore</h4>
        <a href="#home" data-page="home">Home</a>
        <a href="#courses" data-page="courses">All 12 Programs</a>
        <a href="#teachers" data-page="teachers">Faculty & Scholars</a>
        <a href="#about" data-page="about">About & Admissions</a>
        <a href="{{ route('storefront.verify_certificate') }}">Verify Certificate Online ↗</a>
      </div>

      <div class="footer-col">
        <h4>Academic Pathways</h4>
        <a href="#courses" data-page="courses" data-course="Tafseer-ul-Qur’an — Weekend Program">Tafseer-ul-Qur’an (₹99/mo)</a>
        <a href="#courses" data-page="courses" data-course="Alima Course (Advanced Diploma in Islamic Studies)">Alima Course — 4 Yrs</a>
        <a href="#courses" data-page="courses" data-course="Hifz-ul-Qur’an Program (Advanced Diploma)">Hifz-ul-Qur’an Diploma</a>
        <a href="#courses" data-page="courses" data-course="Diploma in Tajweed-e-Quran">Diploma in Tajweed</a>
        <a href="#courses" data-page="courses" data-course="Diploma in Arabic Language">Diploma in Arabic</a>
        <a href="#courses" data-page="courses" data-course="Seerat-un-Nabi ﷺ Program">Seerat-un-Nabi ﷺ (Free)</a>
      </div>

      <div class="footer-col">
        <h4>Account & Legal</h4>
        <a href="{{ route('login') }}" style="color: var(--gold); font-weight: 700;">Student / Teacher Login ↗</a>
        <a href="{{ route('storefront.verify_certificate') }}" style="color: var(--gold); font-weight: 700;">Verify Certificate Online ↗</a>
        <a href="{{ route('privacy_policy') }}">Privacy Policy</a>
        <a href="{{ route('terms_of_use') }}">Terms of Service</a>
      </div>
    </div>

    <div class="footer-bottom">
      <span>© <span id="year"></span> AL-TAQWA Institute of Islamic Studies. All Rights Reserved.</span>
      <span>Centered around Taleem · Tarbiyah · Tazkiyah</span>
    </div>
  </div>
</footer>

<div class="toast-msg" id="toastMsg" role="status" aria-live="polite"></div>

<!-- ==========================================
     CORE JAVASCRIPT & DATA CONTROLLER
     ========================================== -->
<script>
/* 1. Official 12 Courses Database */
const courses = [
  {
    id: 1,
    name: "Tafseer-ul-Qur’an — Weekend Program",
    category: "Qur'an & Tajweed",
    catCode: "QT",
    fee: "₹99 / month",
    feeFull: "₹99 / month (Monthly Subscription)",
    feeBadge: "₹99 / mo",
    feeBadgeColor: "#063D2E",
    duration: "2 Years",
    schedule: "Saturday & Sunday",
    eligibility: "Brothers & Sisters",
    icon: "📖",
    image: "{{ asset('assets/images/courses/tafseer-ul-quran.jpg') }}",
    short: "Verse-by-verse Qur’anic explanation, context of revelation (Asbab al-Nuzul), and practical daily lessons.",
    long: "Connect your heart with the divine words of Allah SWT. This 2-year weekend program provides deep verse-by-verse commentary, historical context, linguistic nuances, and actionable life lessons based on authentic classical Tafseer (Ibn Kathir, Ma'ariful Qur'an, and Jalalayn). Open to brothers and sisters globally with flexible weekend timings.",
    slug: "tafseer-ul-quran-weekend-program"
  },
  {
    id: 2,
    name: "Seerat-un-Nabi ﷺ Program",
    category: "Islamic Studies",
    catCode: "IS",
    fee: "₹0 (Free)",
    feeFull: "₹0 (Completely Free — Community Initiative)",
    feeBadge: "100% FREE",
    feeBadgeColor: "#14644A",
    duration: "6 Months",
    schedule: "Saturday & Sunday",
    eligibility: "Brothers & Sisters",
    icon: "🕌",
    image: "{{ asset('assets/images/courses/seerat-un-nabi.jpg') }}",
    short: "Complete biography of Prophet Muhammad ﷺ from Makkah to Madinah with life lessons and contemporary relevance.",
    long: "A blessed 100% free community initiative walking through the sublime character, prophetic leadership, and milestones of the Beloved Messenger of Allah ﷺ. Covers the Meccan era, persecution, Hijrah, Madinan state-building, treaties, family life, and universal moral teachings for youth and adults.",
    slug: "seerat-un-nabi-program"
  },
  {
    id: 3,
    name: "Free Namaz Translation Workshop",
    category: "Workshops & Short Courses",
    catCode: "WS",
    fee: "₹99 (Refundable)",
    feeFull: "₹99 (100% Refundable on ≥ 75% exam score)",
    feeBadge: "100% Refundable",
    feeBadgeColor: "#C9A35A",
    duration: "3 Days",
    schedule: "Weekend Workshop",
    eligibility: "Brothers & Sisters",
    icon: "🤲",
    image: "{{ asset('assets/images/courses/namaz-workshop.jpg') }}",
    short: "Word-for-word translation of Surah Al-Fatihah, Surahs, Tashahhud, and Salah Duas to attain true Khushu.",
    long: "Transform your daily Salah from physical motions into an intimate conversation with your Creator. In 3 intensive weekend sessions, master the word-by-word meaning of every recitation in Salah: Sana, Fatihah, Ruku/Sujud Adhkar, Tashahhud, Durood Ibrahim, and Qunoot. Registration fee is 100% refunded upon completing the final assessment with ≥75% score.",
    slug: "free-namaz-translation-workshop"
  },
  {
    id: 4,
    name: "Diploma in Tajweed-e-Quran",
    category: "Qur'an & Tajweed",
    catCode: "QT",
    fee: "₹499 / month",
    feeFull: "₹499 / month (Monthly Subscription)",
    feeBadge: "₹499 / mo",
    feeBadgeColor: "#063D2E",
    duration: "12 Months",
    schedule: "Saturday to Thursday",
    eligibility: "Brothers & Sisters",
    icon: "◉",
    image: "{{ asset('assets/images/courses/tajweed-e-quran.jpg') }}",
    short: "Makharij (articulation points), Sifaat, Noon/Meem Sakinah, Madd rules, and live recitation correction.",
    long: "Attain excellence in Quranic recitation according to the narration of Hafs 'an 'Asim. Learn the exact anatomical points of articulation (Makharij), essential and conditional characteristics (Sifaat al-Huroof), rules of Noon Sakinah & Tanween, Meem Sakinah, Mudood (prolongations), Waqf and Ibtida with daily live correction from certified Qaris.",
    slug: "diploma-in-tajweed-e-quran"
  },
  {
    id: 5,
    name: "Certificate in Urdu Reading & Writing",
    category: "Arabic & Urdu",
    catCode: "AU",
    fee: "₹499 / month",
    feeFull: "₹499 / month (Monthly Subscription)",
    feeBadge: "₹499 / mo",
    feeBadgeColor: "#063D2E",
    duration: "5 Months",
    schedule: "Saturday & Sunday",
    eligibility: "Brothers & Sisters",
    icon: "✍️",
    image: "{{ asset('assets/images/courses/urdu-reading-writing.jpg') }}",
    short: "Urdu alphabet (Huroof-e-Tahajji), letter joining, reading fluency, and writing practice for Islamic books.",
    long: "Specially structured for diaspora learners, beginners, and students of Islamic knowledge seeking direct access to classical Urdu Islamic texts, Tafseer commentaries, and Seerah collections. Progress from Huroof-e-Tahajji and ligature joining rules to fluid paragraph comprehension and graceful Nastaliq handwriting.",
    slug: "certificate-in-urdu-reading-and-writing"
  },
  {
    id: 6,
    name: "Certificate in Basic Arabic Reading (Noorani Qaida)",
    category: "Arabic & Urdu",
    catCode: "AU",
    fee: "₹499 / month",
    feeFull: "₹499 / month (Monthly Subscription)",
    feeBadge: "₹499 / mo",
    feeBadgeColor: "#063D2E",
    duration: "6 Months",
    schedule: "Saturday to Thursday",
    eligibility: "Brothers & Sisters",
    icon: "📖",
    image: "{{ asset('assets/images/courses/noorani-qaida.jpg') }}",
    short: "Beginner Qur’anic reading from Arabic letters and Harakat to Tanween, Sukoon, and Tashdeed.",
    long: "A proven, phonetics-based curriculum designed to take zero-level beginners to independent, accurate Qur'anic reading. Covers Arabic letters, short vowels (Harakat), Madd letters, Tanween, Sukoon, Tashdeed (Shaddah), and compound words with individual attention and gentle pacing for children, youth, and adult learners.",
    slug: "certificate-in-basic-arabic-reading-noorani-qaida"
  },
  {
    id: 7,
    name: "Certificate in Islamic Public Speaking & Content Creation",
    category: "Workshops & Short Courses",
    catCode: "WS",
    fee: "₹999 (One-Time)",
    feeFull: "₹999 (One-Time Payment)",
    feeBadge: "₹999 Once",
    feeBadgeColor: "#C9A35A",
    duration: "3 Months",
    schedule: "Saturday & Sunday",
    eligibility: "Brothers & Sisters",
    icon: "🎙️",
    image: "{{ asset('assets/images/courses/public-speaking.jpg') }}",
    short: "Stage/camera confidence, Islamic storytelling, Dawah Reels/short-form videos, and vocal delivery.",
    long: "Empowering the next generation of Muslim creators and communicators. Learn how to craft inspiring talks, deliver impactful Jummah or community speeches, speak confidently on camera, script ethical Dawah Reels and podcasts, and use social media tools to present Islam with wisdom and beautiful preachings (Hikmah).",
    slug: "certificate-in-islamic-public-speaking-and-content-creation"
  },
  {
    id: 8,
    name: "Certificate in Basic Islamic Beliefs (Tawheed & Aqeedah)",
    category: "Islamic Studies",
    catCode: "IS",
    fee: "₹499 (Refundable)",
    feeFull: "₹499 (100% Refundable on ≥ 80% exam score)",
    feeBadge: "100% Refundable",
    feeBadgeColor: "#C9A35A",
    duration: "3 Months",
    schedule: "Saturday & Sunday",
    eligibility: "Brothers & Sisters",
    icon: "⚖️",
    image: "{{ asset('assets/images/courses/tawheed-aqeedah.jpg') }}",
    short: "Core foundations of Tawheed, Risalat, Akhirah, Imaan, and clearing common modern misconceptions.",
    long: "Anchor your faith upon unshakeable rational and scriptural foundations. Explore the categories of Tawheed (Rububiyyah, Uluhiyyah, Asma wa Sifaat), belief in Angels, Revealed Books, Messengers, Day of Judgement, and Divine Decree (Qadr). Clears doubts, atheist arguments, and ideological confusions facing contemporary Muslims. 100% refundable upon scoring ≥80% on the final exam.",
    slug: "certificate-in-basic-islamic-beliefs-tawheed-and-aqeedah"
  },
  {
    id: 9,
    name: "Certificate in Salah, Duas & Sunnah Lifestyle",
    category: "Islamic Studies",
    catCode: "IS",
    fee: "₹499 (One-Time)",
    feeFull: "₹499 (One-Time Payment)",
    feeBadge: "₹499 Once",
    feeBadgeColor: "#063D2E",
    duration: "3 Months",
    schedule: "Saturday & Sunday",
    eligibility: "Brothers & Sisters",
    icon: "✨",
    image: "{{ asset('assets/images/courses/salah-sunnah-lifestyle.jpg') }}",
    short: "Step-by-step Wudu & Salah purification rules, common prayer mistakes, daily Masnoon Duas, and Sunnah habits.",
    long: "A practical guide to living the Sunnah from waking to sleeping. Covers the Fiqh of Taharah (Wudu, Ghusl, Tayammum, impure substances), detailed prayer postures and conditions, Sajdah Sahw, travelers' prayer (Qasr), and memorization of daily Masnoon morning/evening Duas for spiritual protection and peace of mind.",
    slug: "certificate-in-salah-duas-and-sunnah-lifestyle"
  },
  {
    id: 10,
    name: "Diploma in Arabic Language",
    category: "Arabic & Urdu",
    catCode: "AU",
    fee: "₹699 / month",
    feeFull: "₹699 / month (Monthly Subscription)",
    feeBadge: "₹699 / mo",
    feeBadgeColor: "#063D2E",
    duration: "12 Months",
    schedule: "Saturday to Thursday",
    eligibility: "Brothers & Sisters",
    icon: "📜",
    image: "{{ asset('assets/images/courses/arabic-language.jpg') }}",
    short: "Arabic grammar (Nahw), morphology (Sarf), vocabulary building, and direct Qur’anic text comprehension.",
    long: "Unlock the language of the Noble Qur'an and Islamic tradition. Based on the renowned Madinah Arabic and classical Dars-e-Nizami introductory texts. Master grammatical rules (Nahw), verb roots and conjugation patterns (Sarf), Quranic idioms, and conversational drills to understand the Quran directly without relying on translations.",
    slug: "diploma-in-arabic-language"
  },
  {
    id: 11,
    name: "Hifz-ul-Qur’an Program (Advanced Diploma)",
    category: "Qur'an & Tajweed",
    catCode: "QT",
    fee: "₹1,500 / month",
    feeFull: "₹1,500 / month (Monthly Subscription)",
    feeBadge: "₹1,500 / mo",
    feeBadgeColor: "#063D2E",
    duration: "4 Years",
    schedule: "Saturday to Thursday",
    eligibility: "Brothers & Sisters",
    icon: "۞",
    image: "{{ asset('assets/images/courses/hifz-ul-quran.jpg') }}",
    short: "Complete Qur’an memorization following the structured Sabaq, Sabqi & Manzil daily listening system.",
    long: "An intensive online memorization sanctuary for dedicated seekers of the Qur'an. Students memorize under full-time certified Huffaz following the traditional three-tier discipline: Sabaq (new daily memorization), Sabqi (recent revision), and Manzil (continuous retention of old Juz). Includes individualized pacing, regular retention exams, and Sanad upon completion.",
    slug: "hifz-ul-quran-program-advanced-diploma"
  },
  {
    id: 12,
    name: "Alima Course (Advanced Diploma in Islamic Studies)",
    category: "Islamic Studies",
    catCode: "IS",
    fee: "₹599 / month",
    feeFull: "₹599 / month (Monthly Subscription)",
    feeBadge: "₹599 / mo",
    feeBadgeColor: "#063D2E",
    duration: "4 Years",
    schedule: "Saturday to Thursday",
    eligibility: "Sisters Only (Scholarships Available)",
    icon: "✧",
    image: "{{ asset('assets/images/courses/alima-course.jpg') }}",
    short: "Comprehensive 4-year curriculum covering Qur’an, Tafseer, Hadith, Fiqh, Usul, Arabic, Seerah, and Dawah training.",
    long: "A premier 4-year traditional Islamic scholarship journey exclusively for sisters delivered online by qualified female scholars (Alimat). The rigorous syllabus covers Tafseer (Jalalayn & Baydawi), Hadith (Mishkat & Sihah Sittah selections), Hanafi Fiqh (Quduri & Hidayah), Usul-ul-Fiqh, Arabic Nahw & Sarf, Mantiq, Balaghah, Seerah, and contemporary Dawah. Includes Half-Yearly & Yearly formal examinations with authenticated Alimiyyah certification upon graduation.",
    slug: "alima-course-advanced-diploma-in-islamic-studies"
  }
];

/* 2. Faculty / Teachers Database */
const teachers = [
  {
    name: "Ustadha Maryam Al-Azhari",
    initials: "MA",
    role: "Senior Alima Course Faculty",
    quals: "Alimiyyah Degree · Darul Uloom",
    exp: "8+ Years Teaching",
    lang: "Urdu · English",
    cohort: "Sisters Only",
    highlight: "✦ Sisters Faculty Lead",
    category: "Islamic Studies",
    courses: ["Alima Course (Advanced Diploma in Islamic Studies)", "Certificate in Salah, Duas & Sunnah Lifestyle"],
    bio: "Specializes in Hanafi Fiqh, Hadith methodology, and moral Tazkiyah. Guides sisters worldwide with patient, nurturing mentorship and deep scholarly grounding."
  },
  {
    name: "Qari Hafiz Muhammad Bilal",
    initials: "MB",
    role: "Head of Hifz & Memorization",
    quals: "Hafiz-ul-Qur’an · Sanad & Ijazah",
    exp: "10+ Years Teaching",
    lang: "Urdu · Hindi · English",
    cohort: "Brothers & Sisters",
    highlight: "✦ Head of Hifz Sanad",
    category: "Qur'an & Tajweed",
    courses: ["Hifz-ul-Qur’an Program (Advanced Diploma)", "Diploma in Tajweed-e-Quran"],
    bio: "Directs the structured Sabaq, Sabqi, and Manzil retention cycles. Motivates students with vocal modulation, correct breath control, and rigorous revision tracking."
  },
  {
    name: "Sheikh Ahmad Al-Husary",
    initials: "AH",
    role: "Tajweed & Classical Arabic Specialist",
    quals: "Mutqin Ijazah in Hafs 'an 'Asim",
    exp: "7+ Years Teaching",
    lang: "Arabic · English · Urdu",
    cohort: "Brothers & Sisters",
    highlight: "✦ Certified Muqri",
    category: "Arabic & Urdu",
    courses: ["Diploma in Tajweed-e-Quran", "Diploma in Arabic Language"],
    bio: "Focuses on articulation points (Makharij), intrinsic letter characteristics (Sifaat), and Sarf-Nahw syntax with patient 1-on-1 phonetic correction."
  },
  {
    name: "Dr. Maulana Zaid Rahman",
    initials: "ZR",
    role: "Tafseer & Aqeedah Lecturer",
    quals: "Ph.D. Islamic Studies · Fazil Dars-e-Nizami",
    exp: "12+ Years Teaching",
    lang: "Urdu · English",
    cohort: "Brothers & Sisters",
    highlight: "✦ Senior Resident Scholar",
    category: "Islamic Studies",
    courses: ["Tafseer-ul-Qur’an — Weekend Program", "Certificate in Basic Islamic Beliefs (Tawheed & Aqeedah)"],
    bio: "Specializes in contextual Quranic commentary, thematic Surah hermeneutics, and resolving modern intellectual doubts facing Muslim youth and professionals."
  },
  {
    name: "Ustadh Tariq Masood",
    initials: "TM",
    role: "Seerah & Youth Dawah Educator",
    quals: "Graduate in Islamic Sciences",
    exp: "6+ Years Teaching",
    lang: "English · Hindi · Urdu",
    cohort: "Brothers & Sisters",
    highlight: "✦ Youth Mentor & Speaker",
    category: "Workshops & Short Courses",
    courses: ["Seerat-un-Nabi ﷺ Program", "Certificate in Islamic Public Speaking & Content Creation", "Free Namaz Translation Workshop"],
    bio: "Dynamic teacher dedicated to practical Sunnah revival, prayer Khushu, and empowering youth with eloquent, ethical public speaking and modern digital Dawah."
  },
  {
    name: "Ustadha Ayesha Siddiqua",
    initials: "AS",
    role: "Tajweed & Foundation Muallimah",
    quals: "Ijazah in Tajweed-ul-Qur'an",
    exp: "6+ Years Teaching",
    lang: "Urdu · English",
    cohort: "Sisters & Children",
    highlight: "✦ Foundation Specialist",
    category: "Qur'an & Tajweed",
    courses: ["Certificate in Basic Arabic Reading (Noorani Qaida)", "Certificate in Urdu Reading & Writing"],
    bio: "Nurturing educator specializing in foundational Arabic phonetics, letter recognition, and beginner tajweed for young children and sisters starting their journey."
  }
];

/* 3. Frequently Asked Questions */
const faqs = [
  ["Are classes available for students outside India?", "Yes! AL-TAQWA Institute offers structured online live learning for students worldwide across UK, USA, Gulf/Middle East, and Asia with flexible timing."],
  ["How do I enrol in a course?", "Send an admission enquiry with your preferred course. Our admissions team will confirm available batch timings, fee structures, and ustadh placement."],
  ["Can I ask about course fees and schedules first?", "Yes. Use the admissions form to ask about fees, batch timings, course duration, teacher profiles, and trial sessions."],
  ["Are class recordings or study notes provided?", "Yes! All live interactive classes are recorded so students can review past sessions and download authentic study notes from their student dashboard."],
  ["Is there a separate batch for sisters?", "Yes, absolutely! The 4-year Alima Course and sister batches are taught exclusively by qualified female scholars (Alimaat) in a dedicated, respectful environment."],
  ["How does the 100% refundable deposit work?", "For subsidized courses such as the Free Namaz Workshop and Aqeedah certificate, the deposit confirms genuine commitment. Upon attending classes and scoring ≥75% on the assessment, 100% of your deposit is credited back!"]
];

/* 4. Render Components */
function courseCard(c) {
  const isSisters = c.eligibility.toLowerCase().includes("sisters only");
  const isFree = c.fee.includes("0") || c.fee.toLowerCase().includes("free");
  const isRefundable = c.fee.toLowerCase().includes("refundable");
  const feePillClass = isFree ? "pill-free" : (isRefundable ? "pill-refundable" : "pill-sub");

  return `
    <article class="course-card">
      <div class="course-top-banner" style="background-image: url('${c.image}');">
        <span class="course-icon-badge">${c.icon}</span>
        <div class="course-badges-wrap">
          <span class="course-pill pill-cat">${c.category}</span>
          <span class="course-pill ${feePillClass}">${c.feeBadge}</span>
        </div>
      </div>
      <div class="course-body">
        <span class="course-track-label">${c.category}</span>
        <h3 class="course-title">${c.name}</h3>
        <p class="course-desc">${c.short}</p>

        <div class="course-specs">
          <div class="specs-row">
            <span>◷ Duration: <b>${c.duration}</b></span>
            <span class="course-price-highlight">${c.fee}</span>
          </div>
          <div class="specs-row">
            <span>🗓 ${c.schedule}</span>
            <span class="${isSisters ? 'sisters-badge' : ''}">${isSisters ? '🧕 Sisters Only' : '👥 Brothers & Sisters'}</span>
          </div>
        </div>

        <div class="course-foot">
          <button class="btn-details" data-detail="${c.name}">Details ↗</button>
          <button class="btn btn-green" style="padding: 7px 16px; font-size: 0.8rem;" data-enquire="${c.name}">Enquire / Enroll</button>
        </div>
      </div>
    </article>
  `;
}

function teacherCard(t) {
  const isSisters = t.cohort && t.cohort.toLowerCase().includes("sisters");
  const cohortPillClass = isSisters ? "teacher-specialty-pill sisters" : "teacher-specialty-pill";
  const firstCourse = t.courses && t.courses.length > 0 ? t.courses[0] : "";

  return `
    <article class="teacher-card" data-category="${t.category}">
      <div class="teacher-card-accent-bar"></div>
      <div class="teacher-card-content">
        <!-- Top Profile Row -->
        <div class="teacher-header">
          <div class="teacher-avatar-wrapper">
            <div class="teacher-avatar-medallion">
              <span class="teacher-avatar-initials">${t.initials}</span>
              <span class="teacher-avatar-symbol">۞</span>
            </div>
            <div class="teacher-badge-verified" title="Certified & Formally Verified Scholar">✓</div>
          </div>
          <div class="teacher-header-info">
            <div class="teacher-tag-row">
              <span class="${cohortPillClass}">${t.highlight || t.category}</span>
            </div>
            <h3>${t.name}</h3>
            <span class="teacher-role-title">${t.role}</span>
          </div>
        </div>

        <!-- Academic Credentials Panel -->
        <div class="teacher-stats-box">
          <div class="teacher-stat-item">
            <span class="teacher-stat-label">🎓 Credentials</span>
            <span class="teacher-stat-val" title="${t.quals}">${t.quals}</span>
          </div>
          <div class="teacher-stat-item">
            <span class="teacher-stat-label">⏳ Experience</span>
            <span class="teacher-stat-val">${t.exp}</span>
          </div>
          <div class="teacher-stat-item">
            <span class="teacher-stat-label">🗣 Languages</span>
            <span class="teacher-stat-val">${t.lang}</span>
          </div>
          <div class="teacher-stat-item">
            <span class="teacher-stat-label">👥 Cohort</span>
            <span class="teacher-stat-val">${t.cohort || 'Brothers & Sisters'}</span>
          </div>
        </div>

        <!-- Bio / Pedagogy Quote -->
        <div class="teacher-bio-box">
          <p class="teacher-bio-text">"${t.bio}"</p>
        </div>

        <!-- Courses Assigned -->
        <div class="teacher-courses-section">
          <div class="teacher-courses-heading">
            <span>📚 Assigned Programs</span>
          </div>
          <div class="teacher-courses-pills">
            ${t.courses.map(c => {
              const shortName = c.split("—")[0].split("(")[0].trim();
              return `<span class="teacher-course-pill" data-detail="${c}" title="Click to view syllabus for ${c}">📖 ${shortName}</span>`;
            }).join("")}
          </div>
        </div>

        <!-- Card Action Footer -->
        <div class="teacher-card-footer">
          <button class="btn-enquire" data-enquire="${firstCourse}">
            <span>Enquire for Batch</span> ↗
          </button>
          <button class="btn-detail-link" data-detail="${firstCourse}">
            <span>Syllabus</span> ↗
          </button>
        </div>
      </div>
    </article>
  `;
}

/* 5. Render Filters & Catalogs */
let courseCatFilter = "All";
function renderCatFilters() {
  const cats = ["All", "Qur'an & Tajweed", "Islamic Studies", "Arabic & Urdu", "Workshops & Short Courses"];
  document.getElementById("courseCatFilters").innerHTML = cats.map(cat => {
    const count = cat === "All" ? courses.length : courses.filter(c => c.category === cat).length;
    return `<button class="filter-chip${cat === courseCatFilter ? ' on' : ''}" data-ccat="${cat}">${cat} (${count})</button>`;
  }).join("");
}

function renderAllCourses() {
  const q = (document.getElementById("courseFilter")?.value || "").toLowerCase();
  const list = courses.filter(c => {
    const matchCat = (courseCatFilter === "All" || c.category === courseCatFilter);
    const matchQuery = (c.name + " " + c.short + " " + c.category + " " + c.eligibility + " " + c.fee).toLowerCase().includes(q);
    return matchCat && matchQuery;
  });

  document.getElementById("allCourses").innerHTML = list.length
    ? list.map(courseCard).join("")
    : '<p style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--muted);">No matching courses found in this category. Try another keyword or filter.</p>';
}

function renderCourses() {
  document.getElementById("homeCourses").innerHTML = courses.map(courseCard).join("");
  renderCatFilters();
  renderAllCourses();
}

let tFilter = "All";
function renderTeachers() {
  const tCats = ["All", "Qur'an & Tajweed", "Islamic Studies", "Arabic & Urdu", "Workshops & Short Courses"];
  document.getElementById("tFilters").innerHTML = tCats.map(n => {
    const count = n === "All" ? teachers.length : teachers.filter(t => t.category === n || t.courses.some(c => c.toLowerCase().includes(n.toLowerCase()))).length;
    return `<button class="filter-chip${n === tFilter ? " on" : ""}" data-tf="${n}">${n} (${count})</button>`;
  }).join("");
  const list = teachers.filter(t => tFilter === "All" || t.category === tFilter || t.courses.some(c => c.toLowerCase().includes(tFilter.toLowerCase())));
  document.getElementById("tGrid").innerHTML = list.length
    ? list.map(teacherCard).join("")
    : '<p style="grid-column: 1 / -1; text-align: center; padding: 30px; color: var(--muted);">No faculty members listed for this category yet.</p>';
}

/* 6. Course Detail Modal View */
function detail(name) {
  const c = courses.find(x => x.name === name);
  if (!c) return;
  const isSisters = c.eligibility.toLowerCase().includes("sisters only");

  document.getElementById("detailTitle").textContent = c.name;
  document.getElementById("detailDesc").textContent = `${c.category} · ${c.feeFull} · ${c.duration} (${c.schedule})`;
  document.getElementById("detailCatBadge").textContent = c.category;

  let html = `
    <div class="detail-banner-wrap">
      <img src="${c.image}" alt="${c.name}">
    </div>

    <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 22px;">
      <span class="course-pill pill-cat" style="font-size: 0.78rem; padding: 6px 14px;">${c.category}</span>
      <span class="course-pill pill-sub" style="font-size: 0.78rem; padding: 6px 14px; background: var(--primary);">${c.feeFull}</span>
      <span class="course-pill" style="font-size: 0.78rem; padding: 6px 14px; background: ${isSisters ? '#FDE8E8' : '#E8F5E9'}; color: ${isSisters ? '#9B1C1C' : '#1E4620'};">
        ${c.eligibility}
      </span>
    </div>

    <div style="background: var(--cream-alt); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 22px; margin-bottom: 26px;">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; font-size: 0.88rem;">
        <div><b>◷ Program Duration:</b> ${c.duration}</div>
        <div><b>🗓 Class Schedule:</b> ${c.schedule}</div>
        <div><b>💳 Fee Structure:</b> ${c.feeFull}</div>
        <div><b>👥 Eligibility:</b> ${c.eligibility}</div>
      </div>
    </div>

    <h3 style="font-family: var(--font-serif); font-size: 1.45rem; color: var(--primary-dark); margin-bottom: 10px;">
      Course Overview & Learning Outcomes
    </h3>
    <p style="font-size: 0.98rem; line-height: 1.75; color: var(--ink-soft); margin-bottom: 20px;">
      ${c.long}
    </p>

    <div style="background: #EBF5F0; border-left: 4px solid var(--primary); padding: 16px 20px; border-radius: 0 var(--radius-sm) var(--radius-sm) 0; font-size: 0.88rem; color: var(--primary-dark); line-height: 1.6;">
      <b>Class Delivery & Certification:</b> Live interactive lectures with certified Ustadhs/Alimaat, recording archives, authenticated study notes, and verifiable digital certificate upon successful completion.
    </div>
  `;

  document.getElementById("detailLong").innerHTML = html;
  document.getElementById("detailEnquire").onclick = () => {
    showPage("admissions");
    document.getElementById("adCourse").value = c.name;
  };

  showPage("courseDetail");
}

/* 7. Sliders Controller */
function initSlider(root) {
  const track = root.querySelector(".slider-track");
  const prev = root.querySelector(".prev");
  const next = root.querySelector(".next");
  const dots = root.querySelector(".slider-dots");
  let timer = null;

  const step = () => {
    const f = track.children[0];
    return f ? f.getBoundingClientRect().width + 24 : 1;
  };
  const pages = () => {
    const per = Math.max(1, Math.round(track.clientWidth / step()));
    return Math.max(1, track.children.length - per + 1);
  };

  function buildDots() {
    dots.innerHTML = "";
    for (let i = 0; i < pages(); i++) {
      const b = document.createElement("button");
      b.setAttribute("aria-label", "Go to slide " + (i + 1));
      b.onclick = () => {
        track.scrollTo({ left: i * step() });
        restart();
      };
      dots.appendChild(b);
    }
    update();
  }

  function update() {
    const i = Math.min(pages() - 1, Math.round(track.scrollLeft / step()));
    [...dots.children].forEach((d, k) => d.classList.toggle("on", k === i));
    prev.disabled = track.scrollLeft < 4;
    next.disabled = track.scrollLeft + track.clientWidth >= track.scrollWidth - 4;
  }

  function go(d) {
    const end = track.scrollLeft + track.clientWidth >= track.scrollWidth - 4;
    if (d > 0 && end) track.scrollTo({ left: 0 });
    else track.scrollBy({ left: d * step() });
  }

  prev.onclick = () => { go(-1); restart(); };
  next.onclick = () => { go(1); restart(); };
  track.addEventListener("scroll", () => requestAnimationFrame(update), { passive: true });

  function start() {
    if (matchMedia("(prefers-reduced-motion: reduce)").matches) return;
    stop();
    timer = setInterval(() => {
      if (document.getElementById("home").classList.contains("active")) go(1);
    }, 6000);
  }

  function stop() { clearInterval(timer); }
  function restart() { stop(); start(); }

  root.addEventListener("mouseenter", stop);
  root.addEventListener("mouseleave", start);
  window.addEventListener("resize", buildDots);
  buildDots();
  start();
}

/* 8. Toast Notification */
let toastTimer;
function toast(msg) {
  const el = document.getElementById("toastMsg");
  el.textContent = msg;
  el.classList.add("show");
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => el.classList.remove("show"), 3600);
}

/* 9. Pageview Navigation System */
function showPage(id) {
  let targetId = id;
  const isEnquiryJump = (id === "admissions" || id === "contact");
  if (isEnquiryJump) {
    targetId = "about";
  }

  document.querySelectorAll(".pageview").forEach(p => p.classList.remove("active"));
  const page = document.getElementById(targetId) || document.getElementById("home");
  page.classList.add("active");
  const mobileDrawer = document.getElementById("navMobileDrawer");
  if (mobileDrawer) mobileDrawer.classList.remove("open");
  const navToggleBtn = document.getElementById("navToggleBtn");
  if (navToggleBtn) {
    navToggleBtn.classList.remove("open");
    navToggleBtn.setAttribute("aria-expanded", "false");
  }

  if (isEnquiryJump) {
    const formSection = document.getElementById("enquiry-section");
    if (formSection) {
      setTimeout(() => {
        formSection.scrollIntoView({ behavior: "smooth" });
      }, 80);
    }
  } else {
    window.scrollTo({ top: 0, behavior: "smooth" });
  }

  document.querySelectorAll(".navlink-item[data-page], .mobile-navlink[data-page]").forEach(a => {
    const pageVal = a.dataset.page;
    const isActive = pageVal === targetId || (targetId === "courses" && id === "courseDetail");
    a.classList.toggle("active", isActive);
  });
}

/* 10. Global Event Handlers */
document.addEventListener("click", e => {
  // Category nav card click on home
  const pway = e.target.closest("[data-cat-nav]");
  if (pway) {
    courseCatFilter = pway.dataset.catNav;
    renderCatFilters();
    renderAllCourses();
    showPage("courses");
    return;
  }

  // Category filter click
  const ccat = e.target.closest("[data-ccat]");
  if (ccat) {
    courseCatFilter = ccat.dataset.ccat;
    renderCatFilters();
    renderAllCourses();
    return;
  }

  // Teacher filter click
  const tf = e.target.closest("[data-tf]");
  if (tf) {
    tFilter = tf.dataset.tf;
    renderTeachers();
    return;
  }

  // Pageview navigation link
  const p = e.target.closest("[data-page]");
  if (p) {
    e.preventDefault();
    showPage(p.dataset.page);
    if (p.dataset.course) {
      document.getElementById("courseFilter").value = p.dataset.course;
      renderAllCourses();
    }
    return;
  }

  // Course details click
  const d = e.target.closest("[data-detail]");
  if (d) {
    detail(d.dataset.detail);
    return;
  }

  // Enquire button click
  const en = e.target.closest("[data-enquire]");
  if (en) {
    showPage("admissions");
    const courseSel = document.getElementById("adCourse");
    if (courseSel) {
      courseSel.value = en.dataset.enquire;
    }
    const subjSel = document.getElementById("adSubject");
    if (subjSel) {
      subjSel.value = "Course Admission Application";
    }
    return;
  }

  // FAQ accordion toggle
  const fq = e.target.closest(".faq-q");
  if (fq) {
    const item = fq.parentElement;
    item.classList.toggle("open");
    fq.querySelector("span").textContent = item.classList.contains("open") ? "−" : "＋";
  }
});

// Mobile menu toggle & drawer
const navToggleBtn = document.getElementById("navToggleBtn");
const navDrawer = document.getElementById("navMobileDrawer");
if (navToggleBtn && navDrawer) {
  navToggleBtn.addEventListener("click", () => {
    const isOpen = navDrawer.classList.toggle("open");
    navToggleBtn.classList.toggle("open", isOpen);
    navToggleBtn.setAttribute("aria-expanded", isOpen ? "true" : "false");
  });

  navDrawer.querySelectorAll("a").forEach(link => {
    link.addEventListener("click", () => {
      navDrawer.classList.remove("open");
      navToggleBtn.classList.remove("open");
      navToggleBtn.setAttribute("aria-expanded", "false");
    });
  });
}

// Course search filter input
document.getElementById("courseFilter")?.addEventListener("input", renderAllCourses);

// Admission & Enquiry Form Submit
document.getElementById("admissionForm")?.addEventListener("submit", e => {
  e.preventDefault();
  const f = new FormData(e.target);
  const subject = f.get("subject") || "Admission Enquiry";
  const course = f.get("course") || "General Program";
  const msg = `Assalamu Alaikum,\n\nI would like to submit an enquiry / admission application to AL-TAQWA Institute.\n\nFull Name: ${f.get("name")}\nEmail: ${f.get("email")}\nWhatsApp/Phone: ${f.get("phone")}\nCountry: ${f.get("country")}\nEnquiry Type: ${subject}\nSelected Course: ${course}\nPreferred Timing: ${f.get("time") || "Flexible"}\nQuestions/Notes:\n${f.get("message") || "Please share batch schedule and ustadh details."}\n\nJazakAllah Khair.`;

  location.href = "mailto:officialaltaqwa@gmail.com?subject=" + encodeURIComponent(`${subject}: ${course}`) + "&body=" + encodeURIComponent(msg);
  toast("Opening email draft. Press send to deliver your application / enquiry!");
});

/* 11. Initial Startup */
document.getElementById("year").textContent = new Date().getFullYear();
document.getElementById("homeFaq").innerHTML = faqs.map(f => `
  <div class="faq-item">
    <button class="faq-q">${f[0]} <span>＋</span></button>
    <div class="faq-a">${f[1]}</div>
  </div>
`).join("");

document.getElementById("homeTeachers").innerHTML = teachers.map(teacherCard).join("");
renderCourses();
renderTeachers();
document.querySelectorAll("[data-slider]").forEach(initSlider);

// Deep linking hash support
if (location.hash && ["#courses", "#teachers", "#about", "#admissions", "#contact"].includes(location.hash)) {
  showPage(location.hash.slice(1));
} else {
  showPage("home");
}
</script>
</body>
</html>
