/**
 * AL-TAQWA INSTITUTE — PRAYER TIMING ENGINE (Adhan.js Astronomical Calculations)
 * Offline calculation without external API dependencies.
 */

(function (global) {
  "use strict";

  // Pre-configured Global Hubs
  const CITIES = {
    parbhani: { name: "Parbhani, IN", lat: 19.2608, lng: 76.7744, tz: 5.5, method: "Karachi" },
    mumbai: { name: "Mumbai, IN", lat: 19.0760, lng: 72.8777, tz: 5.5, method: "Karachi" },
    pune: { name: "Pune, IN", lat: 18.5204, lng: 73.8567, tz: 5.5, method: "Karachi" },
    hyderabad: { name: "Hyderabad, IN", lat: 17.3850, lng: 78.4867, tz: 5.5, method: "Karachi" },
    delhi: { name: "Delhi, IN", lat: 28.7041, lng: 77.1025, tz: 5.5, method: "Karachi" },
    london: { name: "London, UK", lat: 51.5074, lng: -0.1278, tz: 0.0, method: "MWL" },
    dubai: { name: "Dubai, UAE", lat: 25.2048, lng: 55.2708, tz: 4.0, method: "Dubai" },
    riyadh: { name: "Riyadh, KSA", lat: 24.7136, lng: 46.6753, tz: 3.0, method: "UmmAlQura" },
    toronto: { name: "Toronto, CA", lat: 43.6532, lng: -79.3832, tz: -5.0, method: "ISNA" },
    newyork: { name: "New York, USA", lat: 40.7128, lng: -74.0060, tz: -5.0, method: "ISNA" }
  };

  // Astronomical Calculations
  function dtr(d) { return (d * Math.PI) / 180.0; }
  function rtd(r) { return (r * 180.0) / Math.PI; }
  function fixHour(a) { a = a - 24.0 * Math.floor(a / 24.0); return a < 0 ? a + 24.0 : a; }
  function fixAngle(a) { a = a - 360.0 * Math.floor(a / 360.0); return a < 0 ? a + 360.0 : a; }

  function getSunPosition(julianDate) {
    const D = julianDate - 2451545.0;
    const g = fixAngle(357.529 + 0.98560028 * D);
    const q = fixAngle(280.459 + 0.98564736 * D);
    const L = fixAngle(q + 1.915 * Math.sin(dtr(g)) + 0.020 * Math.sin(dtr(2 * g)));
    const e = 23.439 - 0.00000036 * D;
    const d = rtd(Math.asin(Math.sin(dtr(e)) * Math.sin(dtr(L))));
    let RA = rtd(Math.atan2(Math.cos(dtr(e)) * Math.sin(dtr(L)), Math.cos(dtr(L)))) / 15.0;
    RA = fixHour(RA);
    const EqT = q / 15.0 - RA;
    return { declination: d, equationOfTime: EqT };
  }

  function julian(date) {
    let year = date.getFullYear();
    let month = date.getMonth() + 1;
    const day = date.getDate();
    if (month <= 2) {
      year -= 1;
      month += 12;
    }
    const A = Math.floor(year / 100);
    const B = 2 - A + Math.floor(A / 4);
    return Math.floor(365.25 * (year + 4716)) + Math.floor(30.6001 * (month + 1)) + day + B - 1524.5;
  }

  function computePrayerTimes(lat, lng, tz, date, asrFactor = 2, fajrAngle = 18.0, ishaAngle = 18.0) {
    const JD = julian(date);
    const sun = getSunPosition(JD);

    const Dhuhr = fixHour(12 + tz - lng / 15.0 - sun.equationOfTime);

    function hourAngle(angle, isAboveZero = false) {
      const cosH = (Math.sin(dtr(angle)) - Math.sin(dtr(lat)) * Math.sin(dtr(sun.declination))) /
        (Math.cos(dtr(lat)) * Math.cos(dtr(sun.declination)));
      if (cosH > 1 || cosH < -1) return 0;
      const H = rtd(Math.acos(cosH)) / 15.0;
      return isAboveZero ? H : -H;
    }

    const sunriseH = hourAngle(-0.833, false);
    const sunsetH = hourAngle(-0.833, true);
    const fajrH = hourAngle(-fajrAngle, false);
    const ishaH = hourAngle(-ishaAngle, true);

    // Asr angle
    const asrAngleVal = -rtd(Math.atan(1.0 / (asrFactor + Math.tan(dtr(Math.abs(lat - sun.declination))))));
    const asrH = hourAngle(asrAngleVal, true);

    const Fajr = fixHour(Dhuhr + fajrH);
    const Sunrise = fixHour(Dhuhr + sunriseH);
    const Asr = fixHour(Dhuhr + asrH);
    const Maghrib = fixHour(Dhuhr + sunsetH);
    const Isha = fixHour(Dhuhr + ishaH);

    return { Fajr, Sunrise, Dhuhr, Asr, Maghrib, Isha };
  }

  function formatTime(hoursFloat, use24 = false) {
    if (isNaN(hoursFloat)) return "--:--";
    const totalMinutes = Math.round(hoursFloat * 60);
    let h = Math.floor(totalMinutes / 60) % 24;
    let m = totalMinutes % 60;
    if (use24) {
      return `${String(h).padStart(2, "0")}:${String(m).padStart(2, "0")}`;
    }
    const ampm = h >= 12 ? "PM" : "AM";
    h = h % 12;
    h = h ? h : 12;
    return `${h}:${String(m).padStart(2, "0")} ${ampm}`;
  }

  // Prayer Manager Engine
  const AltaqwaPrayer = {
    currentCityKey: localStorage.getItem("altaqwa_city") || "parbhani",
    offsets: JSON.parse(localStorage.getItem("altaqwa_offsets") || '{"Fajr":0,"Dhuhr":0,"Asr":0,"Maghrib":0,"Isha":0}'),

    getCities: function() { return CITIES; },

    setCity: function(key) {
      if (CITIES[key]) {
        this.currentCityKey = key;
        localStorage.setItem("altaqwa_city", key);
        this.render();
      }
    },

    setGpsLocation: function(lat, lng) {
      CITIES.gps = { name: "Current GPS Location", lat, lng, tz: -(new Date().getTimezoneOffset() / 60) };
      this.currentCityKey = "gps";
      localStorage.setItem("altaqwa_city", "gps");
      this.render();
    },

    getTimes: function(date = new Date()) {
      const city = CITIES[this.currentCityKey] || CITIES.parbhani;
      const raw = computePrayerTimes(city.lat, city.lng, city.tz, date);

      // Apply minute offsets
      const applied = {};
      for (const [p, h] of Object.entries(raw)) {
        const offsetMins = (this.offsets[p] || 0) / 60.0;
        applied[p] = h + offsetMins;
      }

      // Calculate Cutoff / End times
      return {
        Fajr: { start: applied.Fajr, end: applied.Sunrise, label: "Fajr" },
        Sunrise: { start: applied.Sunrise, end: applied.Sunrise, label: "Sunrise" },
        Dhuhr: { start: applied.Dhuhr, end: applied.Asr, label: "Dhuhr" },
        Asr: { start: applied.Asr, end: applied.Maghrib, label: "Asr" },
        Maghrib: { start: applied.Maghrib, end: applied.Isha, label: "Maghrib" },
        Isha: { start: applied.Isha, end: applied.Fajr + 24, label: "Isha" },
        cityName: city.name
      };
    },

    getNextPrayer: function() {
      const now = new Date();
      const nowHours = now.getHours() + now.getMinutes() / 60.0 + now.getSeconds() / 3600.0;
      const times = this.getTimes(now);

      const sequence = ["Fajr", "Sunrise", "Dhuhr", "Asr", "Maghrib", "Isha"];
      for (const p of sequence) {
        if (nowHours < times[p].start) {
          const diffSeconds = Math.round((times[p].start - nowHours) * 3600);
          return { name: p, diffSeconds, startTime: times[p].start };
        }
      }

      // Next day Fajr
      const nextFajr = times.Fajr.start + 24;
      const diffSeconds = Math.round((nextFajr - nowHours) * 3600);
      return { name: "Fajr (Tomorrow)", diffSeconds, startTime: times.Fajr.start };
    },

    render: function() {
      const container = document.getElementById("altaqwaPrayerWidget");
      if (!container) return;

      const times = this.getTimes();
      const next = this.getNextPrayer();

      const citySelect = document.getElementById("prayerCitySelect");
      if (citySelect) citySelect.value = this.currentCityKey;

      const cityNameEl = document.getElementById("prayerCityLabel");
      if (cityNameEl) cityNameEl.textContent = times.cityName;

      const prayers = [
        { id: "fajr", key: "Fajr", icon: "🌅" },
        { id: "dhuhr", key: "Dhuhr", icon: "☀️" },
        { id: "asr", key: "Asr", icon: "🌤️" },
        { id: "maghrib", key: "Maghrib", icon: "🌇" },
        { id: "isha", key: "Isha", icon: "🌙" }
      ];

      prayers.forEach(p => {
        const startEl = document.getElementById(`prayer-${p.id}-start`);
        const endEl = document.getElementById(`prayer-${p.id}-end`);
        const cardEl = document.getElementById(`prayer-card-${p.id}`);

        if (startEl) startEl.textContent = formatTime(times[p.key].start);
        if (endEl) endEl.textContent = "Ends: " + formatTime(times[p.key].end);
        if (cardEl) {
          const isNext = next.name.toLowerCase().startsWith(p.id);
          cardEl.classList.toggle("active-prayer", isNext);
        }
      });

      // Sunrise display
      const sunriseEl = document.getElementById("prayer-sunrise-time");
      if (sunriseEl) sunriseEl.textContent = formatTime(times.Sunrise.start);

      this.updateCountdown(next);
    },

    updateCountdown: function(next) {
      const el = document.getElementById("prayerCountdown");
      if (!el) return;

      const s = Math.max(0, next.diffSeconds);
      const hrs = Math.floor(s / 3600);
      const mins = Math.floor((s % 3600) / 60);
      const secs = s % 60;

      el.innerHTML = `<strong>${next.name}</strong> in <span class="countdown-badge">${String(hrs).padStart(2, "0")}:${String(mins).padStart(2, "0")}:${String(secs).padStart(2, "0")}</span>`;
    },

    init: function() {
      this.render();

      // Countdown loop
      setInterval(() => {
        const next = this.getNextPrayer();
        this.updateCountdown(next);
      }, 1000);

      // Event Listeners
      const select = document.getElementById("prayerCitySelect");
      if (select) {
        select.addEventListener("change", (e) => {
          this.setCity(e.target.value);
        });
      }

      const gpsBtn = document.getElementById("prayerGpsBtn");
      if (gpsBtn && navigator.geolocation) {
        gpsBtn.addEventListener("click", () => {
          gpsBtn.textContent = "Detecting...";
          navigator.geolocation.getCurrentPosition(
            (pos) => {
              this.setGpsLocation(pos.coords.latitude, pos.coords.longitude);
              gpsBtn.textContent = "📍 GPS Active";
            },
            (err) => {
              alert("Location access denied or unavailable.");
              gpsBtn.textContent = "📍 Auto Detect";
            }
          );
        });
      }
    }
  };

  global.AltaqwaPrayer = AltaqwaPrayer;

  document.addEventListener("DOMContentLoaded", function() {
    AltaqwaPrayer.init();
  });
})(window);
