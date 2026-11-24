{{-- AL-TAQWA Dynamic Announcement Banner Slider --}}
@php
    $announcementsList = isset($announcements) && $announcements->isNotEmpty() 
        ? $announcements 
        : \App\Models\Announcement::active()->get();
@endphp

@if($announcementsList->isNotEmpty())
<section class="altaqwa-announcement-wrap" aria-label="Official Announcements">
    <div class="announcement-slider" id="announcementSlider" role="region" aria-roledescription="carousel">
        <div class="announcement-track" id="announcementTrack">
            @foreach($announcementsList as $index => $banner)
            <div class="announcement-slide {{ $index === 0 ? 'active' : '' }}" 
                 role="group" 
                 aria-roledescription="slide" 
                 aria-label="Slide {{ $index + 1 }} of {{ $announcementsList->count() }}"
                 data-slide-index="{{ $index }}">
                <div class="wrap announcement-container">
                    <div class="announcement-content">
                        @if($banner->badge_text)
                            <span class="announcement-badge">{{ $banner->badge_text }}</span>
                        @endif
                        <h2 class="announcement-title">{{ $banner->title }}</h2>
                        @if($banner->subtitle)
                            <p class="announcement-subtitle">{{ $banner->subtitle }}</p>
                        @endif
                    </div>
                    @if($banner->cta_link && $banner->cta_text)
                    <div class="announcement-action">
                        <a href="{{ $banner->cta_link }}" class="btn btn-gold btn-sm announcement-cta">
                            {{ $banner->cta_text }}
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @if($announcementsList->count() > 1)
        <!-- Controls -->
        <button class="slider-arrow prev" id="sliderPrevBtn" aria-label="Previous Announcement">‹</button>
        <button class="slider-arrow next" id="sliderNextBtn" aria-label="Next Announcement">›</button>

        <!-- Indicators -->
        <div class="slider-dots" id="sliderDots" role="tablist">
            @foreach($announcementsList as $dotIndex => $banner)
            <button class="slider-dot {{ $dotIndex === 0 ? 'active' : '' }}" 
                    role="tab" 
                    aria-selected="{{ $dotIndex === 0 ? 'true' : 'false' }}"
                    aria-label="Go to slide {{ $dotIndex + 1 }}" 
                    data-dot-index="{{ $dotIndex }}">
            </button>
            @endforeach
        </div>
        @endif
    </div>
</section>

<style>
.altaqwa-announcement-wrap {
  background: linear-gradient(90deg, #03251C 0%, #063D2E 50%, #03251C 100%);
  border-bottom: 2px solid var(--gold);
  color: #FFFFFF;
  position: relative;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}
.altaqwa-announcement-wrap::before {
  content: "تقوى";
  position: absolute;
  right: 5%;
  top: 50%;
  transform: translateY(-50%);
  font-family: var(--font-arabic);
  font-size: 5rem;
  color: rgba(201, 163, 90, 0.08);
  pointer-events: none;
}
.announcement-slider {
  position: relative;
  width: 100%;
}
.announcement-track {
  display: flex;
  transition: transform 0.5s ease-in-out;
  width: 100%;
}
.announcement-slide {
  min-width: 100%;
  padding: 14px 0;
  display: flex;
  align-items: center;
}
.announcement-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  width: min(1200px, 92%);
  margin: 0 auto;
}
.announcement-content {
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: wrap;
}
.announcement-badge {
  background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
  color: var(--primary-dark);
  font-size: 0.68rem;
  font-weight: 800;
  letter-spacing: 0.08em;
  padding: 4px 10px;
  border-radius: var(--radius-pill);
  text-transform: uppercase;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  white-space: nowrap;
}
.announcement-title {
  font-size: 0.95rem;
  font-weight: 700;
  color: #FFFFFF;
  margin: 0;
  line-height: 1.3;
}
.announcement-subtitle {
  font-size: 0.82rem;
  color: #CFE3D9;
  margin: 0;
  display: inline-block;
}
.announcement-action {
  flex-shrink: 0;
}
.announcement-cta {
  font-size: 0.8rem !important;
  padding: 6px 16px !important;
  white-space: nowrap;
}
.slider-arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(0, 0, 0, 0.3);
  border: 1px solid var(--gold);
  color: var(--gold);
  width: 32px;
  height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  cursor: pointer;
  z-index: 10;
  transition: all 0.2s ease;
  line-height: 1;
}
.slider-arrow:hover {
  background: var(--gold);
  color: var(--primary-dark);
}
.slider-arrow.prev { left: 12px; }
.slider-arrow.next { right: 12px; }
.slider-dots {
  position: absolute;
  bottom: 3px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 6px;
  z-index: 10;
}
.slider-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.3);
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  padding: 0;
}
.slider-dot.active {
  background: var(--gold);
  width: 18px;
  border-radius: var(--radius-pill);
}
@media (max-width: 768px) {
  .announcement-container {
    flex-direction: column;
    align-items: flex-start;
    gap: 8px;
    padding: 0 10px;
  }
  .announcement-slide { padding: 12px 0 16px; }
  .slider-arrow { display: none; }
  .announcement-title { font-size: 0.88rem; }
  .announcement-subtitle { font-size: 0.78rem; }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const track = document.getElementById("announcementTrack");
  if (!track) return;
  const slides = track.querySelectorAll(".announcement-slide");
  const dots = document.querySelectorAll("#sliderDots .slider-dot");
  const total = slides.length;
  if (total <= 1) return;

  let current = 0;
  let timer = null;

  function goToSlide(index) {
    current = (index + total) % total;
    track.style.transform = `translateX(-${current * 100}%)`;
    dots.forEach((d, i) => {
      d.classList.toggle("active", i === current);
      d.setAttribute("aria-selected", i === current ? "true" : "false");
    });
  }

  function nextSlide() { goToSlide(current + 1); }
  function prevSlide() { goToSlide(current - 1); }

  function startAutoPlay() {
    stopAutoPlay();
    timer = setInterval(nextSlide, 5000);
  }
  function stopAutoPlay() {
    if (timer) clearInterval(timer);
  }

  document.getElementById("sliderNextBtn")?.addEventListener("click", () => {
    nextSlide();
    startAutoPlay();
  });
  document.getElementById("sliderPrevBtn")?.addEventListener("click", () => {
    prevSlide();
    startAutoPlay();
  });

  dots.forEach((dot, idx) => {
    dot.addEventListener("click", () => {
      goToSlide(idx);
      startAutoPlay();
    });
  });

  const slider = document.getElementById("announcementSlider");
  slider.addEventListener("mouseenter", stopAutoPlay);
  slider.addEventListener("mouseleave", startAutoPlay);

  // Touch Swipe
  let startX = 0;
  slider.addEventListener("touchstart", e => {
    startX = e.touches[0].clientX;
    stopAutoPlay();
  }, { passive: true });
  slider.addEventListener("touchend", e => {
    const endX = e.changedTouches[0].clientX;
    if (startX - endX > 40) nextSlide();
    else if (endX - startX > 40) prevSlide();
    startAutoPlay();
  }, { passive: true });

  startAutoPlay();
});
</script>
@endif
