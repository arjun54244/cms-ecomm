<footer data-background="" class="footer1-bg" style="background-color:#1B1A17; color:#cfcac3;">

   <section class="footer-area footer-area1 pt-5 pb-4" style="border-bottom:1px solid rgba(224,147,46,0.15);">
      <div class="container pt-95">
         <div class="row gy-4">

            {{-- Column 1 --}}
            <div class="col-lg-4 col-md-6">
               <div class="footer-widget mb-4">

                  {{-- LOGO: wrapped in a light padded box so a transparent/white/dark SVG is always visible --}}
                  <a href="{{ url('/') }}" class="d-inline-flex align-items-center justify-content-center mb-3"
                     style="background:#ffffff; border-radius:10px; padding:10px 16px; box-shadow:0 2px 10px rgba(0,0,0,0.25);">
                     <img src="{{ Storage::url($settings->logo) }}" alt="{{ $settings->site_name }}"
                        style="max-height:50px; width:auto; height:auto; display:block;">
                  </a>

                  <p class="mb-3" style="color:#c7c5c1; line-height:1.8; font-size:14.5px;">
                     {{ $settings->footer_description }}
                  </p>

                  {{-- quick social row (kept small here, full one is in copyright bar) --}}
                  <div class="d-flex gap-2">
                     @if($settings->whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->whatsapp) }}" target="_blank"
                           class="d-inline-flex align-items-center justify-content-center"
                           style="width:38px; height:38px; border-radius:50%; background:#8B5E3C; color:#fff; transition:all .25s ease;"
                           onmouseover="this.style.background='#E0932E'" onmouseout="this.style.background='#8B5E3C'">
                           <i class="fab fa-whatsapp"></i>
                        </a>
                     @endif
                  </div>
               </div>
            </div>

            {{-- Column 2 --}}
            <div class="col-lg-2 col-md-6">
               <div class="footer-widget mb-4">

                  <h4 class="footer-widget-title mb-3"
                     style="color:#ffffff; font-size:18px; font-weight:600; position:relative; padding-bottom:10px;">
                     Quick Links
                     <span
                        style="position:absolute; left:0; bottom:0; width:36px; height:2px; background:#E0932E;"></span>
                  </h4>

                  <ul class="list-unstyled m-0 p-0">

                     <li class="mb-2">
                        <a href="{{ url('/') }}" class="text-decoration-none d-inline-flex align-items-center"
                           style="color:#c7c5c1; font-size:14.5px; transition:color .2s ease;"
                           onmouseover="this.style.color='#E0932E'" onmouseout="this.style.color='#c7c5c1'">
                           <i class="fal fa-angle-right me-2" style="color:#8B5E3C;"></i> Home
                        </a>
                     </li>

                     <li class="mb-2">
                        <a href="{{ route('shop') }}" class="text-decoration-none d-inline-flex align-items-center"
                           style="color:#c7c5c1; font-size:14.5px; transition:color .2s ease;"
                           onmouseover="this.style.color='#E0932E'" onmouseout="this.style.color='#c7c5c1'">
                           <i class="fal fa-angle-right me-2" style="color:#8B5E3C;"></i> Shop
                        </a>
                     </li>

                     <li class="mb-2">
                        <a href="{{ route('contact') }}" class="text-decoration-none d-inline-flex align-items-center"
                           style="color:#c7c5c1; font-size:14.5px; transition:color .2s ease;"
                           onmouseover="this.style.color='#E0932E'" onmouseout="this.style.color='#c7c5c1'">
                           <i class="fal fa-angle-right me-2" style="color:#8B5E3C;"></i> Contact Us
                        </a>
                     </li>

                     <li class="mb-2">
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center"
                           style="color:#c7c5c1; font-size:14.5px; transition:color .2s ease;"
                           onmouseover="this.style.color='#E0932E'" onmouseout="this.style.color='#c7c5c1'">
                           <i class="fal fa-angle-right me-2" style="color:#8B5E3C;"></i> Wishlist
                        </a>
                     </li>

                     <li>
                        <a href="#" class="text-decoration-none d-inline-flex align-items-center"
                           style="color:#c7c5c1; font-size:14.5px; transition:color .2s ease;"
                           onmouseover="this.style.color='#E0932E'" onmouseout="this.style.color='#c7c5c1'">
                           <i class="fal fa-angle-right me-2" style="color:#8B5E3C;"></i> Cart
                        </a>
                     </li>

                  </ul>

               </div>
            </div>

            {{-- Column 3 --}}
            <div class="col-lg-3 col-md-6">

               <div class="footer-widget mb-4">

                  <h4 class="footer-widget-title mb-3"
                     style="color:#ffffff; font-size:18px; font-weight:600; position:relative; padding-bottom:10px;">
                     Customer Service
                     <span
                        style="position:absolute; left:0; bottom:0; width:36px; height:2px; background:#E0932E;"></span>
                  </h4>

                  <ul class="list-unstyled m-0 p-0">

                     @foreach($footerPages as $page)

                        <li class="mb-2">
                           <a href="{{ route('page.show', $page->slug) }}"
                              class="text-decoration-none d-inline-flex align-items-center"
                              style="color:#c7c5c1; font-size:14.5px; transition:color .2s ease;"
                              onmouseover="this.style.color='#E0932E'" onmouseout="this.style.color='#c7c5c1'">
                              <i class="fal fa-angle-right me-2" style="color:#8B5E3C;"></i> {{ $page->title }}
                           </a>
                        </li>

                     @endforeach

                  </ul>

               </div>

            </div>

            {{-- Column 4 --}}
            <div class="col-lg-3 col-md-6">

               <div class="footer-widget mb-4">

                  <h4 class="footer-widget-title mb-3"
                     style="color:#ffffff; font-size:18px; font-weight:600; position:relative; padding-bottom:10px;">
                     Contact Info
                     <span
                        style="position:absolute; left:0; bottom:0; width:36px; height:2px; background:#E0932E;"></span>
                  </h4>

                  <ul class="list-unstyled m-0 p-0">

                     @if($settings->address)
                        <li class="mb-3 d-flex align-items-start">
                           <span class="d-inline-flex align-items-center justify-content-center flex-shrink-0 me-2"
                              style="width:30px; height:30px; border-radius:50%; background:rgba(224,147,46,0.12); color:#E0932E;">
                              <i class="fal fa-map-marker-alt"></i>
                           </span>
                           <span style="color:#c7c5c1; font-size:14.5px; line-height:1.6; padding-top:4px;">
                              {{ $settings->address }}
                           </span>
                        </li>
                     @endif

                     @if($settings->phone)
                        <li class="mb-3 d-flex align-items-center">
                           <span class="d-inline-flex align-items-center justify-content-center flex-shrink-0 me-2"
                              style="width:30px; height:30px; border-radius:50%; background:rgba(224,147,46,0.12); color:#E0932E;">
                              <i class="fal fa-phone-alt"></i>
                           </span>
                           <a href="tel:{{ $settings->phone }}" class="text-decoration-none"
                              style="color:#c7c5c1; font-size:14.5px; transition:color .2s ease;"
                              onmouseover="this.style.color='#E0932E'" onmouseout="this.style.color='#c7c5c1'">
                              {{ $settings->phone }}
                           </a>
                        </li>
                     @endif

                     @if($settings->email)
                        <li class="mb-3 d-flex align-items-center">
                           <span class="d-inline-flex align-items-center justify-content-center flex-shrink-0 me-2"
                              style="width:30px; height:30px; border-radius:50%; background:rgba(224,147,46,0.12); color:#E0932E;">
                              <i class="fal fa-envelope"></i>
                           </span>
                           <a href="mailto:{{ $settings->email }}" class="text-decoration-none"
                              style="color:#c7c5c1; font-size:14.5px; transition:color .2s ease;"
                              onmouseover="this.style.color='#E0932E'" onmouseout="this.style.color='#c7c5c1'">
                              {{ $settings->email }}
                           </a>
                        </li>
                     @endif

                     @if($settings->whatsapp)
                        <li class="d-flex align-items-center">
                           <span class="d-inline-flex align-items-center justify-content-center flex-shrink-0 me-2"
                              style="width:30px; height:30px; border-radius:50%; background:rgba(224,147,46,0.12); color:#E0932E;">
                              <i class="fab fa-whatsapp"></i>
                           </span>
                           <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->whatsapp) }}" target="_blank"
                              class="text-decoration-none"
                              style="color:#c7c5c1; font-size:14.5px; transition:color .2s ease;"
                              onmouseover="this.style.color='#E0932E'" onmouseout="this.style.color='#c7c5c1'">
                              WhatsApp Chat
                           </a>
                        </li>
                     @endif

                  </ul>

               </div>

            </div>

         </div>
      </div>
   </section>

   {{-- FEATURES STRIP --}}
   <div class="features-area features-area3 py-4" style="background:#211f1b;">
      <div class="container">
         <div class="features-wrapper">
            <div class="row gy-4">

               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="features-single d-flex align-items-center gap-3">
                     <div class="irc-item-icon d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width:56px; height:56px; border-radius:50%; background:linear-gradient(135deg,#8B5E3C,#E0932E); font-size:22px; color:#fff;">
                        <i class="fal fa-shipping-fast"></i>
                     </div>
                     <div class="irc-item-content">
                        <div class="irc-item-heading" style="color:#fff; font-size:15.5px; font-weight:600;">Free
                           Shipping</div>
                        <p class="m-0" style="color:#c7c5c1; font-size:13.5px;">On All Orders Over ₹750</p>
                     </div>
                  </div>
               </div>

               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="features-single d-flex align-items-center gap-3">
                     <div class="irc-item-icon d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width:56px; height:56px; border-radius:50%; background:linear-gradient(135deg,#8B5E3C,#E0932E); font-size:22px; color:#fff;">
                        <i class="fal fa-undo-alt"></i>
                     </div>
                     <div class="irc-item-content">
                        <div class="irc-item-heading" style="color:#fff; font-size:15.5px; font-weight:600;">Easy
                           Returns</div>
                        <p class="m-0" style="color:#c7c5c1; font-size:13.5px;">30 Day Returns Policy</p>
                     </div>
                  </div>
               </div>

               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="features-single d-flex align-items-center gap-3">
                     <div class="irc-item-icon d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width:56px; height:56px; border-radius:50%; background:linear-gradient(135deg,#8B5E3C,#E0932E); font-size:22px; color:#fff;">
                        <i class="fal fa-shield-check"></i>
                     </div>
                     <div class="irc-item-content">
                        <div class="irc-item-heading" style="color:#fff; font-size:15.5px; font-weight:600;">Secure
                           Payment</div>
                        <p class="m-0" style="color:#c7c5c1; font-size:13.5px;">100% Secure Guarantee</p>
                     </div>
                  </div>
               </div>

               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="features-single d-flex align-items-center gap-3">
                     <div class="irc-item-icon d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width:56px; height:56px; border-radius:50%; background:linear-gradient(135deg,#8B5E3C,#E0932E); font-size:22px; color:#fff;">
                        <i class="fal fa-headset"></i>
                     </div>
                     <div class="irc-item-content">
                        <div class="irc-item-heading" style="color:#fff; font-size:15.5px; font-weight:600;">Special
                           Support</div>
                        <p class="m-0" style="color:#c7c5c1; font-size:13.5px;">24/7 Dedicated Support</p>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>

   {{-- COPYRIGHT BAR --}}
   <div class="copyright-area copyright1-area py-3"
      style="background:#151412; border-top:1px solid rgba(224,147,46,0.2);">
      <div class="container">
         <div class="copyright1-inner d-flex flex-wrap align-items-center justify-content-between gap-3">

            {{-- Copyright --}}
            <div class="copyright-text copyright1-text">
               <p class="m-0" style="color:#8f8a83; font-size:13.5px;">&copy; {{ date('Y') }} {{ config('app.name') }}.
                  All Rights Reserved.</p>
            </div>

            {{-- Social Links --}}
            <div class="social-wrapper d-flex align-items-center gap-2">

               <p class="m-0 me-2" style="color:#8f8a83; font-size:13.5px;">Follow Us:</p>

               <div class="social__links">
                  <ul class="list-unstyled d-flex m-0 p-0 gap-2">

                     @if($settings->facebook)
                        <li>
                           <a href="{{ $settings->facebook }}" target="_blank" rel="noopener"
                              class="d-inline-flex align-items-center justify-content-center"
                              style="width:36px; height:36px; border-radius:50%; background:#211f1b; color:#E0932E; border:1px solid rgba(224,147,46,0.3); transition:all .25s ease;"
                              onmouseover="this.style.background='#E0932E'; this.style.color='#1B1A17'"
                              onmouseout="this.style.background='#211f1b'; this.style.color='#E0932E'">
                              <i class="fab fa-facebook-f"></i>
                           </a>
                        </li>
                     @endif

                     @if($settings->twitter)
                        <li>
                           <a href="{{ $settings->twitter }}" target="_blank" rel="noopener"
                              class="d-inline-flex align-items-center justify-content-center"
                              style="width:36px; height:36px; border-radius:50%; background:#211f1b; color:#E0932E; border:1px solid rgba(224,147,46,0.3); transition:all .25s ease;"
                              onmouseover="this.style.background='#E0932E'; this.style.color='#1B1A17'"
                              onmouseout="this.style.background='#211f1b'; this.style.color='#E0932E'">
                              <i class="fab fa-twitter"></i>
                           </a>
                        </li>
                     @endif

                     @if($settings->instagram)
                        <li>
                           <a href="{{ $settings->instagram }}" target="_blank" rel="noopener"
                              class="d-inline-flex align-items-center justify-content-center"
                              style="width:36px; height:36px; border-radius:50%; background:#211f1b; color:#E0932E; border:1px solid rgba(224,147,46,0.3); transition:all .25s ease;"
                              onmouseover="this.style.background='#E0932E'; this.style.color='#1B1A17'"
                              onmouseout="this.style.background='#211f1b'; this.style.color='#E0932E'">
                              <i class="fab fa-instagram"></i>
                           </a>
                        </li>
                     @endif

                     @if($settings->linkedin)
                        <li>
                           <a href="{{ $settings->linkedin }}" target="_blank" rel="noopener"
                              class="d-inline-flex align-items-center justify-content-center"
                              style="width:36px; height:36px; border-radius:50%; background:#211f1b; color:#E0932E; border:1px solid rgba(224,147,46,0.3); transition:all .25s ease;"
                              onmouseover="this.style.background='#E0932E'; this.style.color='#1B1A17'"
                              onmouseout="this.style.background='#211f1b'; this.style.color='#E0932E'">
                              <i class="fab fa-linkedin-in"></i>
                           </a>
                        </li>
                     @endif

                     @if($settings->youtube)
                        <li>
                           <a href="{{ $settings->youtube }}" target="_blank" rel="noopener"
                              class="d-inline-flex align-items-center justify-content-center"
                              style="width:36px; height:36px; border-radius:50%; background:#211f1b; color:#E0932E; border:1px solid rgba(224,147,46,0.3); transition:all .25s ease;"
                              onmouseover="this.style.background='#E0932E'; this.style.color='#1B1A17'"
                              onmouseout="this.style.background='#211f1b'; this.style.color='#E0932E'">
                              <i class="fab fa-youtube"></i>
                           </a>
                        </li>
                     @endif

                  </ul>
               </div>

            </div>

         </div>
      </div>
   </div>
</footer>