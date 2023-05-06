
<div class="site-main">
   <noscript>
      <div class="noscript">
         <p><i class="fa fa-exclamation-triangle"></i>Please enable JavaScript in your browser.</p>
      </div>
   </noscript>


   <div id="preloader" class="loader_show">
   <div class="loader-wrap">
      <div class="loader fadeout">
         <div class="loader-inner"></div>
      </div>
   </div>
</div>

   <header class="header_main">
         <div class="d-flex align-items-center justify-content-between">
            <div class="logo_main">
               <a href="index.php" title="Diamond Estate"><img src="{{asset('assets/frontend/images/logo.svg')}}" alt=""></a>
            </div>
            <div class="menu_right">
               <a id="wsnavtoggle" class="wsanimated-arrow menu_close"><span></span><span></span><span></span><span></span></a>
               <nav class="wsmenu">
                  <ul class="wsmenu-list">
                     <li><a href={{route('frontend.home','#aboutus')}} title="About us">About Us</a></li>
                     <li><a href={{route('frontend.home','#products')}} title="Products">Products</a></li>
                     <li><a href={{route('frontend.home','#sustainability')}} title="Sustainability">Sustainability</a></li>
                     <li><a href={{route('frontend.home','#media')}} title="Media">Media</a></li>
                     <li><a href={{route('frontend.contact')}} title="Contact">Contact</a></li>
                  </ul>
               </nav>
            </div>
         </div>
   </header>





