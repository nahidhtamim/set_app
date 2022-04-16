@extends('layouts.frontend')
 @section('title')
 Home | SET - A Premium Laundry Service
 @endsection
@section('contents')

<section class="our-facts">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2>Get To Know Us Better</h2>
          </div>
          <div class="col-lg-6 about-area">
            <div class="row">
              <div class="col--lg12">
                <div class="about-area-content">
                  <div class="count-digit">About-Us</div>
                  <div class="count-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit tenetur tempora illo consequuntur aperiam esse impedit distinctio eius incidunt ratione unde alias, a vitae aspernatur? Exercitationem id beatae corrupti vel!
                    <br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit tenetur tempora illo consequuntur 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
      <div class="col-lg-6 align-self-center">
        <div class="video">
          <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img src="{{asset('frontend/assets/images/play-icon.png')}}" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection