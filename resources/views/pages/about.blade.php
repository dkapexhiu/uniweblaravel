@extends('layouts.pages', ['title' => 'About'])

@section('content')
<!-- Page Cover Section -->
<section class="section page-cover">
  <div class="page-title">
    <h1>About</h1>
  </div>

  <canvas class="particles-background"></canvas>
</section>
<!-- end Page Cover Section -->

<!-- About Section -->
<section class="section about">
  <div class="image">
    <img src="{{ asset('spccweb/img/hero.jpg') }}" alt="SPCC Caloocan School Building" />
  </div>
  <div class="content">
    <h2>UniWeb</h2>
    <div class="description">
      <p>
      This is a web software for managing the university and its faculties in a better way.
      </p>
    </div>
  </div>

  <div class="bg">
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-big" />
  </div>
</section>
<!-- end About Section -->

<!-- Info Tab Section -->
<section class="section info-tab">
  <div class="tab-menu">
    <ul class="tab-nav">
      <li>
        <a href="#" data-target="#tab-mission">Mission</a>
      </li>
      <li>
        <a href="#" data-target="#tab-vision">Vision</a>
      </li>
      <li>
        <a href="#" data-target="#tab-values">Core Values</a>
      </li>
    </ul>
  </div>
  <div class="tab-content">
    <div id="tab-mission" class="tab-current">
      <h2>Mission</h2>
      <p>
        Liberal, quality, transformative and relevant education towards the holistic development 
        of all stakeholders through excellence in instruction, research and extension services.
      </p>
    </div>
    <div id="tab-vision">
      <h2>Vision</h2>
      <p>
        A leading and globally competitive institution of learning through service and
        innovation.
      </p>
    </div>
    <div id="tab-values">
      <h2>Core Values</h2>
      <h3>Service</h3>
      <p>
        Engage in school activities, community partnership, outreach endeavors, and social advocacies.
      </p>
      <h3>Professionalism</h3>
      <p>
        Demonstrate and assume responsibility of actions.
      </p>
      <h3>Competence</h3>
      <p>
        Develop and pursue high standards of quality and superior performance.
      </p>
      <h3>Fellowship</h3>
      <p>
        Cooperate, collaborative and communicate effectively, treat each other with respect and fairness, and foster
        camaraderie.
      </p>
    </div>

  </div>
</section>
<!-- end Info Menu Section -->
@endsection