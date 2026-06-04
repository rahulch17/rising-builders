<!-- NAV -->
<nav id="navbar">
  <div class="nav-inner">
    <a class="nav-logo" href="#">
      <img id="nav-logo" src="" alt="Rising Builders & Engineers Pvt. Ltd."/>
      <div class="nav-divider"></div>
      <div class="nav-tagline">A-Class<br/>Design·Build</div>
    </a>

    <ul class="nav-links">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('about') }}">About</a></li>
      <li><a href="{{ route('services') }}">Services</a></li>
      <li><a href="{{ route('clients') }}">Clients</a></li>
      <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>

    <div class="hamburger" onclick="toggleMobile()" id="burger">
      <span></span><span></span><span></span>
    </div>
  </div>
</nav>



