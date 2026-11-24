{{-- AL-TAQWA Dynamic Astronomical Prayer Timings Widget --}}
<div class="altaqwa-prayer-widget" id="altaqwaPrayerWidget">
  <div class="wrap prayer-wrap">
    
    <!-- Header with City Selector & Live Countdown -->
    <div class="prayer-header">
      <div class="prayer-title-group">
        <span class="prayer-kicker">✦ Daily Salah Schedule</span>
        <h3 class="prayer-heading">
          Prayer Times for <span id="prayerCityLabel" class="text-gold">Parbhani, IN</span>
        </h3>
      </div>

      <div class="prayer-controls">
        <div class="prayer-select-wrap">
          <select id="prayerCitySelect" class="prayer-select" aria-label="Select City for Prayer Times">
            <option value="parbhani">📍 Parbhani (India)</option>
            <option value="mumbai">📍 Mumbai (India)</option>
            <option value="pune">📍 Pune (India)</option>
            <option value="hyderabad">📍 Hyderabad (India)</option>
            <option value="delhi">📍 Delhi (India)</option>
            <option value="london">📍 London (UK)</option>
            <option value="dubai">📍 Dubai (UAE)</option>
            <option value="riyadh">📍 Riyadh (Saudi Arabia)</option>
            <option value="toronto">📍 Toronto (Canada)</option>
            <option value="newyork">📍 New York (USA)</option>
          </select>
          <button id="prayerGpsBtn" class="prayer-gps-btn" title="Use current GPS location">
            📍 Auto Detect
          </button>
        </div>

        <div class="prayer-countdown-box" id="prayerCountdown">
          Calculating next Salah...
        </div>
      </div>
    </div>

    <!-- 5 Prayers Grid + Sunrise -->
    <div class="prayer-grid">
      <!-- Fajr -->
      <div class="prayer-card" id="prayer-card-fajr">
        <div class="prayer-meta">
          <span class="prayer-icon">🌅</span>
          <strong class="prayer-name">Fajr</strong>
        </div>
        <div class="prayer-time-val" id="prayer-fajr-start">--:--</div>
        <small class="prayer-cutoff" id="prayer-fajr-end">Ends: --:--</small>
      </div>

      <!-- Sunrise -->
      <div class="prayer-card sunrise-card" id="prayer-card-sunrise">
        <div class="prayer-meta">
          <span class="prayer-icon">🌄</span>
          <strong class="prayer-name">Sunrise</strong>
        </div>
        <div class="prayer-time-val" id="prayer-sunrise-time">--:--</div>
        <small class="prayer-cutoff">Ishraq begins</small>
      </div>

      <!-- Dhuhr -->
      <div class="prayer-card" id="prayer-card-dhuhr">
        <div class="prayer-meta">
          <span class="prayer-icon">☀️</span>
          <strong class="prayer-name">Dhuhr</strong>
        </div>
        <div class="prayer-time-val" id="prayer-dhuhr-start">--:--</div>
        <small class="prayer-cutoff" id="prayer-dhuhr-end">Ends: --:--</small>
      </div>

      <!-- Asr -->
      <div class="prayer-card" id="prayer-card-asr">
        <div class="prayer-meta">
          <span class="prayer-icon">🌤️</span>
          <strong class="prayer-name">Asr</strong>
        </div>
        <div class="prayer-time-val" id="prayer-asr-start">--:--</div>
        <small class="prayer-cutoff" id="prayer-asr-end">Ends: --:--</small>
      </div>

      <!-- Maghrib -->
      <div class="prayer-card" id="prayer-card-maghrib">
        <div class="prayer-meta">
          <span class="prayer-icon">🌇</span>
          <strong class="prayer-name">Maghrib</strong>
        </div>
        <div class="prayer-time-val" id="prayer-maghrib-start">--:--</div>
        <small class="prayer-cutoff" id="prayer-maghrib-end">Ends: --:--</small>
      </div>

      <!-- Isha -->
      <div class="prayer-card" id="prayer-card-isha">
        <div class="prayer-meta">
          <span class="prayer-icon">🌙</span>
          <strong class="prayer-name">Isha</strong>
        </div>
        <div class="prayer-time-val" id="prayer-isha-start">--:--</div>
        <small class="prayer-cutoff" id="prayer-isha-end">Ends: --:--</small>
      </div>
    </div>

  </div>
</div>

<style>
.altaqwa-prayer-widget {
  background: linear-gradient(180deg, #FAF9F5 0%, #F3EFE6 100%);
  border-bottom: 1px solid var(--border);
  padding: 24px 0;
  position: relative;
}
.prayer-wrap {
  width: min(1200px, 92%);
  margin: 0 auto;
}
.prayer-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 18px;
  flex-wrap: wrap;
  gap: 14px;
}
.prayer-kicker {
  display: block;
  font-size: 0.72rem;
  font-weight: 800;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--primary);
  margin-bottom: 2px;
}
.prayer-heading {
  font-family: var(--font-serif);
  font-size: 1.35rem;
  color: var(--primary-dark);
  margin: 0;
  line-height: 1.2;
}
.text-gold {
  color: var(--gold-dark);
}
.prayer-controls {
  display: flex;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
}
.prayer-select-wrap {
  display: flex;
  align-items: center;
  gap: 6px;
  background: #FFFFFF;
  border: 1.5px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 4px 6px;
  box-shadow: var(--shadow-sm);
}
.prayer-select {
  border: none;
  background: transparent;
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--primary-dark);
  outline: none;
  cursor: pointer;
  padding: 4px 6px;
}
.prayer-gps-btn {
  background: var(--primary-surface);
  border: 1px solid var(--primary-light);
  color: var(--primary-dark);
  font-size: 0.75rem;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: var(--radius-sm);
  cursor: pointer;
  transition: all 0.2s ease;
  white-space: nowrap;
}
.prayer-gps-btn:hover {
  background: var(--primary);
  color: #FFFFFF;
}
.prayer-countdown-box {
  background: var(--primary);
  color: #FFFFFF;
  border: 1.5px solid var(--gold);
  border-radius: var(--radius-sm);
  padding: 6px 14px;
  font-size: 0.85rem;
  box-shadow: 0 2px 8px rgba(6, 61, 46, 0.15);
  white-space: nowrap;
}
.countdown-badge {
  color: var(--gold-light);
  font-family: monospace;
  font-size: 0.95rem;
  font-weight: 700;
  margin-left: 4px;
}
.prayer-grid {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 12px;
}
.prayer-card {
  background: #FFFFFF;
  border: 1.5px solid var(--border);
  border-radius: var(--radius-md);
  padding: 14px 12px;
  text-align: center;
  box-shadow: var(--shadow-sm);
  transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
  position: relative;
  overflow: hidden;
}
.prayer-card:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
  border-color: var(--gold);
}
.prayer-card.active-prayer {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
  border: 2px solid var(--gold);
  box-shadow: 0 6px 20px rgba(6, 61, 46, 0.3);
  transform: translateY(-3px);
}
.prayer-card.active-prayer .prayer-name {
  color: #FFFFFF;
}
.prayer-card.active-prayer .prayer-time-val {
  color: var(--gold-light);
}
.prayer-card.active-prayer .prayer-cutoff {
  color: #BED8CC;
}
.sunrise-card {
  background: #FAF9F5;
  border-style: dashed;
}
.prayer-meta {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  margin-bottom: 6px;
}
.prayer-icon {
  font-size: 1.1rem;
}
.prayer-name {
  font-size: 0.92rem;
  color: var(--primary-dark);
  font-weight: 700;
  letter-spacing: 0.02em;
}
.prayer-time-val {
  font-size: 1.15rem;
  font-weight: 800;
  color: var(--primary);
  margin-bottom: 2px;
  font-family: var(--font-sans);
}
.prayer-cutoff {
  display: block;
  font-size: 0.72rem;
  color: var(--muted);
  font-weight: 500;
}
@media (max-width: 992px) {
  .prayer-grid {
    grid-template-columns: repeat(3, 1fr);
  }
}
@media (max-width: 576px) {
  .prayer-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .prayer-header {
    flex-direction: column;
    align-items: flex-start;
  }
  .prayer-controls {
    width: 100%;
    flex-direction: column;
    align-items: stretch;
  }
  .prayer-select-wrap {
    justify-content: space-between;
  }
}
</style>
<script src="{{ asset('assets/js/altaqwa-prayer.js') }}"></script>
