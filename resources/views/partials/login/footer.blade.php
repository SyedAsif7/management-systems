<footer style="background: #021C15; border-top: 2px solid var(--gold); color: #8CA99D; padding: 22px 0; font-size: 0.82rem; margin-top: auto;">
    <div class="container d-flex justify-content-between align-items-center flex-wrap" style="gap: 12px;">
        <div>
            &copy; {{ date('Y') }} <a href="{{ route('home') }}" style="color: var(--gold); font-weight: 700; text-decoration: none;">AL-TAQWA Institute of Islamic Studies</a>. All Rights Reserved.
        </div>
        <div class="d-flex align-items-center" style="gap: 16px;">
            <a href="{{ route('home') }}" style="color: #CBDCD4; text-decoration: none;">Home</a>
            <a href="{{ route('storefront.courses') }}" style="color: #CBDCD4; text-decoration: none;">Courses</a>
            <a href="{{ route('storefront.verify_certificate') }}" style="color: #CBDCD4; text-decoration: none;">Verify Certificate</a>
            <a href="{{ route('privacy_policy') }}" style="color: #CBDCD4; text-decoration: none;">Privacy Policy</a>
            <a href="{{ route('terms_of_use') }}" style="color: #CBDCD4; text-decoration: none;">Terms of Use</a>
        </div>
    </div>
</footer>
