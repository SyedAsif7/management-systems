@extends('layouts.storefront')

@section('title', 'Community Zikr & Durood Sharif Sanctuary — AL-TAQWA Institute')

@section('content')

<!-- Serene Subhero Banner -->
<section class="subhero">
    <div class="wrap text-center">
        <span class="subhero-eyebrow">Tarbiyah & Tazkiyah Sanctuary</span>
        <h1 style="font-family: var(--font-arabic); font-size: 2.8rem; margin-bottom: 8px;">
            ذِكْرٌ وَ صَلَوَاتٌ عَلَى النَّبِيِّ ﷺ
        </h1>
        <p style="max-width: 680px; margin: 0 auto; color: #D3E6DC; font-size: 1.05rem;">
            Unite your heart with thousands of seekers worldwide in sending blessings upon the Beloved Prophet ﷺ and engaging in continual remembrance of Allah SWT.
        </p>
    </div>
</section>

<!-- Main Interactive Sanctuary Container -->
<section style="padding: 40px 0 80px; background: var(--cream);">
    <div class="wrap" style="max-width: 860px; margin: 0 auto;">

        <!-- 1. Global Community Counter Card -->
        <div style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); border: 2px solid var(--gold); border-radius: var(--radius-lg); padding: 32px 28px; box-shadow: var(--shadow-lg); text-align: center; color: #FFFFFF; margin-bottom: 30px; position: relative; overflow: hidden;">
            <div style="position: absolute; right: -20px; bottom: -20px; font-family: var(--font-arabic); font-size: 10rem; color: rgba(255, 255, 255, 0.05); pointer-events: none;">
                صلوات
            </div>

            <span style="display: inline-block; background: rgba(201, 163, 90, 0.2); border: 1px solid var(--gold); color: var(--gold-light); font-size: 0.75rem; font-weight: 800; letter-spacing: 0.12em; text-transform: uppercase; padding: 4px 14px; border-radius: var(--radius-pill); margin-bottom: 12px;">
                ✦ Global Collective Counter
            </span>

            <div style="font-size: 3.2rem; font-weight: 900; color: #FFFFFF; font-family: var(--font-sans); letter-spacing: 0.04em; margin-bottom: 6px; text-shadow: 0 4px 14px rgba(0,0,0,0.3);" id="globalCounterVal">
                {{ number_format($displayGlobalTotal) }}
            </div>
            <p style="color: #D3E6DC; font-size: 0.95rem; margin-bottom: 20px;">
                Total blessings and remembrances recited by the AL-TAQWA global community
            </p>

            <!-- Weekly Community Goal Progress Bar -->
            <div style="background: rgba(0,0,0,0.3); border: 1px solid rgba(201, 163, 90, 0.4); border-radius: var(--radius-pill); height: 16px; padding: 2px; max-width: 540px; margin: 0 auto 10px;">
                <div id="weeklyGoalBar" style="background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 100%); height: 100%; border-radius: var(--radius-pill); width: {{ $weeklyProgress }}%; transition: width 0.5s ease;"></div>
            </div>
            <div style="display: flex; justify-content: space-between; max-width: 540px; margin: 0 auto; font-size: 0.78rem; color: #BED8CC;">
                <span>Weekly Goal: 1,000,000</span>
                <span>{{ $weeklyProgress }}% Achieved</span>
            </div>
        </div>

        <!-- 2. Zikr Selector Pills -->
        <div style="background: #FFFFFF; border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 26px; box-shadow: var(--shadow-sm); margin-bottom: 30px;">
            <label style="display: block; font-weight: 700; color: var(--primary-dark); font-size: 0.88rem; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 14px; text-align: center;">
                Select Sacred Remembrance (Zikr):
            </label>

            <div class="zikr-pills-grid">
                <button class="zikr-pill-btn active" data-zikr="durood_sharif" 
                        data-arabic="اللَّهُمَّ صَلِّ عَلَىٰ مُحَمَّدٍ وَعَلَىٰ آلِ مُحَمَّدٍ"
                        data-trans="Allahumma salli 'ala Muhammadin wa 'ala aali Muhammad"
                        data-meaning="O Allah, send blessings upon Muhammad and upon the family of Muhammad.">
                    <span>🌸 Durood Sharif ﷺ</span>
                </button>

                <button class="zikr-pill-btn" data-zikr="subhanallah"
                        data-arabic="سُبْحَانَ اللَّهِ"
                        data-trans="SubhanAllah"
                        data-meaning="Glory be to Allah.">
                    <span>✨ SubhanAllah</span>
                </button>

                <button class="zikr-pill-btn" data-zikr="alhamdulillah"
                        data-arabic="الْحَمْدُ لِلَّهِ"
                        data-trans="Alhamdulillah"
                        data-meaning="All praise is due to Allah.">
                    <span>🤲 Alhamdulillah</span>
                </button>

                <button class="zikr-pill-btn" data-zikr="allahu_akbar"
                        data-arabic="اللَّهُ أَكْبَرُ"
                        data-trans="Allahu Akbar"
                        data-meaning="Allah is the Greatest.">
                    <span>⭐ Allahu Akbar</span>
                </button>

                <button class="zikr-pill-btn" data-zikr="astaghfirullah"
                        data-arabic="أَسْتَغْفِرُ اللَّهَ"
                        data-trans="Astaghfirullah"
                        data-meaning="I seek forgiveness from Allah.">
                    <span>🕊️ Astaghfirullah</span>
                </button>
            </div>
        </div>

        <!-- 3. One-Tap Interactive Tasbeeh Sanctuary -->
        <div style="background: #FFFFFF; border: 1.5px solid var(--border); border-radius: var(--radius-lg); padding: 40px 30px; box-shadow: var(--shadow-md); text-align: center;">
            
            <!-- Arabic Display Callout -->
            <div style="min-height: 120px; display: flex; flex-direction: column; justify-content: center; align-items: center; margin-bottom: 24px;">
                <div id="zikrArabicDisplay" style="font-family: var(--font-arabic); font-size: 2.3rem; color: var(--primary-dark); line-height: 1.4; margin-bottom: 8px;">
                    اللَّهُمَّ صَلِّ عَلَىٰ مُحَمَّدٍ وَعَلَىٰ آلِ مُحَمَّدٍ
                </div>
                <div id="zikrTransDisplay" style="font-size: 0.95rem; color: var(--muted); font-style: italic; margin-bottom: 4px;">
                    Allahumma salli 'ala Muhammadin wa 'ala aali Muhammad
                </div>
                <div id="zikrMeaningDisplay" style="font-size: 0.85rem; color: var(--gold-dark); font-weight: 600;">
                    O Allah, send blessings upon Muhammad and upon the family of Muhammad.
                </div>
            </div>

            <!-- Interactive Round Tasbeeh Counter Circle -->
            <div style="display: flex; justify-content: center; align-items: center; margin: 30px 0;">
                <div class="tasbeeh-ring-wrap" id="tasbeehTapBtn" role="button" tabindex="0" aria-label="Tap to count Zikr">
                    <svg class="tasbeeh-svg" viewBox="0 0 220 220">
                        <circle class="tasbeeh-circle-bg" cx="110" cy="110" r="95"></circle>
                        <circle class="tasbeeh-circle-progress" id="tasbeehProgressCircle" cx="110" cy="110" r="95"></circle>
                    </svg>

                    <div class="tasbeeh-center-content">
                        <span class="tasbeeh-count" id="sessionCount">0</span>
                        <span class="tasbeeh-target" id="targetLabel">Goal: 33</span>
                        <small style="font-size: 0.72rem; color: var(--gold-light); font-weight: 700; text-transform: uppercase; margin-top: 4px;">TAP HERE</small>
                    </div>
                </div>
            </div>

            <!-- Controls and Rewards Notice -->
            <div style="display: flex; justify-content: center; align-items: center; gap: 14px; margin-bottom: 24px;">
                <button class="btn btn-outline-gold btn-sm" id="resetTasbeehBtn">
                    ↻ Reset Counter
                </button>
                <button class="btn btn-gold btn-sm" id="toggleTargetBtn">
                    Target: <span id="currentTargetDisplay">33</span>
                </button>
            </div>

            <div style="background: var(--cream); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 14px 20px; max-width: 580px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="font-size: 1.3rem;">🪙</span>
                    <span style="font-size: 0.85rem; color: var(--primary-dark); font-weight: 600;">
                        Earn <strong>+10 Taqwa Coins</strong> per 100 recitations
                    </span>
                </div>
                <div style="font-size: 0.82rem; color: var(--gold-dark); font-weight: 700;" id="userCoinStatus">
                    @auth
                        Your Balance: 🪙 {{ Auth::user()->coins_balance }} Coins
                    @else
                        <a href="{{ route('login') }}" style="text-decoration: underline;">Login to save coins ↗</a>
                    @endauth
                </div>
            </div>

        </div>

    </div>
</section>

<style>
.zikr-pills-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  justify-content: center;
}
.zikr-pill-btn {
  background: var(--cream);
  border: 1.5px solid var(--border);
  color: var(--primary-dark);
  font-size: 0.92rem;
  font-weight: 700;
  padding: 10px 18px;
  border-radius: var(--radius-pill);
  cursor: pointer;
  transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
}
.zikr-pill-btn:hover {
  border-color: var(--gold);
  background: #FFFFFF;
  transform: translateY(-2px);
}
.zikr-pill-btn.active {
  background: var(--primary);
  color: #FFFFFF;
  border-color: var(--gold);
  box-shadow: 0 4px 14px rgba(6, 61, 46, 0.25);
}

/* Tasbeeh Tap Ring */
.tasbeeh-ring-wrap {
  width: 220px;
  height: 220px;
  position: relative;
  cursor: pointer;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  outline: none;
}
.tasbeeh-svg {
  width: 100%;
  height: 100%;
  transform: rotate(-90deg);
}
.tasbeeh-circle-bg {
  fill: var(--primary);
  stroke: rgba(201, 163, 90, 0.2);
  stroke-width: 12;
}
.tasbeeh-circle-progress {
  fill: none;
  stroke: var(--gold);
  stroke-width: 12;
  stroke-linecap: round;
  stroke-dasharray: 597; /* 2 * PI * 95 */
  stroke-dashoffset: 597;
  transition: stroke-dashoffset 0.15s ease;
}
.tasbeeh-center-content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  pointer-events: none;
}
.tasbeeh-count {
  font-size: 3.5rem;
  font-weight: 900;
  color: #FFFFFF;
  line-height: 1;
  font-family: var(--font-sans);
}
.tasbeeh-target {
  font-size: 0.85rem;
  color: #D3E6DC;
  font-weight: 600;
  margin-top: 4px;
}
.tasbeeh-ring-wrap:active .tasbeeh-circle-bg {
  fill: var(--primary-light);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
  let count = 0;
  let target = 33;
  let currentZikr = "durood_sharif";
  let unsavedCount = 0;
  let syncTimer = null;
  const radius = 95;
  const circumference = 2 * Math.PI * radius; // 596.9

  const countEl = document.getElementById("sessionCount");
  const targetLabel = document.getElementById("targetLabel");
  const progressCircle = document.getElementById("tasbeehProgressCircle");
  const tapBtn = document.getElementById("tasbeehTapBtn");
  const globalCounterVal = document.getElementById("globalCounterVal");

  function updateCircle() {
    countEl.textContent = count;
    const progress = Math.min(1, (count % target) / target);
    const offset = circumference - (progress * circumference);
    progressCircle.style.strokeDashoffset = offset;
  }

  function handleTap() {
    count++;
    unsavedCount++;
    updateCircle();

    // Subtle audio / haptic feel
    if (navigator.vibrate) {
      navigator.vibrate(20);
    }

    // Debounced background sync
    clearTimeout(syncTimer);
    syncTimer = setTimeout(syncZikrWithServer, 1500);
  }

  function syncZikrWithServer() {
    if (unsavedCount <= 0) return;
    const toSend = unsavedCount;
    unsavedCount = 0;

    fetch("{{ route('storefront.zikr_submit') }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": "{{ csrf_token() }}",
        "Accept": "application/json"
      },
      body: JSON.stringify({
        zikr_type: currentZikr,
        count: toSend
      })
    })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        if (globalCounterVal && data.global_total) {
          globalCounterVal.textContent = Number(data.global_total).toLocaleString();
        }
        if (data.coins_earned > 0) {
          const coinStatus = document.getElementById("userCoinStatus");
          if (coinStatus && data.coins_balance) {
            coinStatus.innerHTML = `🪙 ${data.coins_balance} Coins (+${data.coins_earned} earned!)`;
          }
        }
      }
    })
    .catch(err => console.log("Sync error:", err));
  }

  tapBtn.addEventListener("click", handleTap);
  tapBtn.addEventListener("keydown", (e) => {
    if (e.key === " " || e.key === "Enter") {
      e.preventDefault();
      handleTap();
    }
  });

  document.getElementById("resetTasbeehBtn").addEventListener("click", () => {
    syncZikrWithServer();
    count = 0;
    updateCircle();
  });

  const targetBtn = document.getElementById("toggleTargetBtn");
  const currentTargetDisplay = document.getElementById("currentTargetDisplay");
  targetBtn.addEventListener("click", () => {
    target = target === 33 ? 100 : (target === 100 ? 500 : 33);
    targetLabel.textContent = `Goal: ${target}`;
    currentTargetDisplay.textContent = target;
    updateCircle();
  });

  // Selector Pills
  const pills = document.querySelectorAll(".zikr-pill-btn");
  pills.forEach(p => {
    p.addEventListener("click", function() {
      pills.forEach(btn => btn.classList.remove("active"));
      this.classList.add("active");
      currentZikr = this.dataset.zikr;
      document.getElementById("zikrArabicDisplay").textContent = this.dataset.arabic;
      document.getElementById("zikrTransDisplay").textContent = this.dataset.trans;
      document.getElementById("zikrMeaningDisplay").textContent = this.dataset.meaning;
    });
  });

  updateCircle();
});
</script>
@endsection
