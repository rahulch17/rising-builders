@extends('layout.app')

@section('content')
<!--<section class="services" id="services">
  <div class="services-inner">
    <div class="services-header reveal">
      <div>
        <div class="section-tag" style="--red:#5BA3E0"><span style="color:#5BA3E0">What We Do</span></div>
        <h2 class="s-title" style="color:#fff">Our Core <em style="color:var(--red)">Services</em></h2>
      </div>
      <a href="#contact" class="btn-red">Get a Quote</a>
    </div>
    <div class="services-grid">
      <div class="svc-card reveal">
        <span class="svc-num">01</span>
        <svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <div class="svc-name">Architectural Design & Planning</div>
        <p class="svc-desc">Creative architectural designs that blend aesthetics with functionality — from concept to blueprint, tailored to your vision.</p>
        <svg class="svc-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </div>
      <div class="svc-card reveal reveal-delay-1">
        <span class="svc-num">02</span>
        <svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        <div class="svc-name">Design & Construction Services</div>
        <p class="svc-desc">End-to-end design-build delivery — seamlessly integrating design and construction under one expert team.</p>
        <svg class="svc-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </div>
      <div class="svc-card reveal reveal-delay-2">
        <span class="svc-num">03</span>
        <svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 21h18M9 21V7l3-4 3 4v14M9 12h6"/></svg>
        <div class="svc-name">Commercial Construction</div>
        <p class="svc-desc">Large-scale commercial builds with precision engineering, meeting international standards for offices, retail and hospitality.</p>
        <svg class="svc-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </div>
      <div class="svc-card reveal reveal-delay-3">
        <span class="svc-num">04</span>
        <svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 20h20M4 20V10l8-7 8 7v10M10 20v-6h4v6"/></svg>
        <div class="svc-name">Residential Construction</div>
        <p class="svc-desc">Quality homes built with earthquake-resilient structural solutions following Nepal's latest building codes and standards.</p>
        <svg class="svc-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </div>
      <div class="svc-card reveal">
        <span class="svc-num">05</span>
        <svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 8h1a4 4 0 0 1 0 8h-1M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg>
        <div class="svc-name">ELV System & Fire Alarm</div>
        <p class="svc-desc">Extra-Low Voltage systems and fire alarm installations — intelligent building safety and communication infrastructure.</p>
        <svg class="svc-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </div>
      <div class="svc-card reveal reveal-delay-1">
        <span class="svc-num">06</span>
        <svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22V12m0 0V2m0 10H2m10 0h10"/></svg>
        <div class="svc-name">HVAC, Electrical & Plumbing</div>
        <p class="svc-desc">Complete MEP services — heating, ventilation, air conditioning, electrical systems, and professional plumbing solutions.</p>
        <svg class="svc-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </div>
      <div class="svc-card reveal reveal-delay-2">
        <span class="svc-num">07</span>
        <svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        <div class="svc-name">Office Automation & AV System</div>
        <p class="svc-desc">Smart office automation and audio-visual systems for modern, technology-integrated workspaces and meeting environments.</p>
        <svg class="svc-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </div>
      <div class="svc-card reveal reveal-delay-3">
        <span class="svc-num">08</span>
        <svg class="svc-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 17H7A5 5 0 0 1 7 7h2M15 7h2a5 5 0 1 1 0 10h-2M8 12h8"/></svg>
        <div class="svc-name">Project Management & Supervision</div>
        <p class="svc-desc">End-to-end project oversight — scheduling, budgeting, procurement, and quality control throughout every phase.</p>
        <svg class="svc-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </div>
    </div>
  </div>
</section>-->

@include('layout.section.services')
@endsection