@extends('layouts.home_master')

@section('home_main')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portolio</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Portolio</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row portfolio-container" data-aos="fade-up">
        @foreach ($images as $image)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ $image->images }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="{{ $image->images }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

@endsection