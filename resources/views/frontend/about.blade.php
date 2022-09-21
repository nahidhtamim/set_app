@extends('layouts.frontend')
@section('title')
About | SET - A Premium Laundry Service
@endsection
@section('contents')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
    <a class="close">&times;</a>
</div>
@elseif (session('warning'))
<div class="alert alert-danger" role="alert">
    {{ session('warning') }}
    <a class="close">&times;</a>
</div>
@endif

<section class="our-facts">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Get To Know Us Better</h2>
                    </div>
                    <div class="col-lg-6 about-area">
                        <div class="row">
                            <div class="col-lg-6 align-self-center">
                                <div class="slider text-center" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; border-radius: 5%;">
                                    <div class="">
                                        <img src="{{asset('frontend/assets/images/about-slider/5.png')}}"
                                                class="d-block w-100" alt="..." style="border-radius: 5%;">
                                    </div>
                                    {{-- <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img src="{{asset('frontend/assets/images/play-icon.png')}}"
                                    alt=""></a> --}}
                                    {{-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset('frontend/assets/images/about-slider/G1.png')}}"
                                                    class="d-block w-100" alt="..." style="border-radius: 5%;">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{asset('frontend/assets/images/about-slider/G2.png')}}"
                                                    class="d-block w-100" alt="..." style="border-radius: 5%;">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{asset('frontend/assets/images/about-slider/5.png')}}"
                                                        class="d-block w-100" alt="..." style="border-radius: 5%;">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="visually-hidden">Next</span>
                                        </button>
                                    </div> --}}
                                    {{-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="1" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset('frontend/assets/images/about-slider/1.png')}}"
                                                    class="d-block w-100" alt="..." style="border-radius: 5%;">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{asset('frontend/assets/images/about-slider/2.png')}}"
                                                    class="d-block w-100" alt="..." style="border-radius: 5%;">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{asset('frontend/assets/images/about-slider/3.png')}}"
                                                    class="d-block w-100" alt="..." style="border-radius: 5%;">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-area-content">
                                    <div class="count">About</div>
                                    <div class="">

                                        <p class="text-light text-left" style="font-size: 14px;">Hi ich bin Andreas von der Firma Set, dem Sportbekleidungs-Service.
                                            Wir sind ein junges Unternehmen, welches sich zur Aufgabe gemacht hat,
                                            Sportbekleidung samt Handtücher und Unterwäsche für das anstehende Training
                                            vorzubereiten und Dir als ambitionierten Sportler oder ambitionierter
                                            Sportlerin an Ort und Stelle zu liefern.
                                            Und so geht´s..
                                            <br>
                                            Nach der Registrierung auf unserer Website hast Du Zugriff auf einen unserer
                                            Spindfächer. Vorausgesetzt ist natürlich, dass wir bei deinem Verein oder
                                            Sportstudio vertreten sind.
                                            Das Spindfach ist in zwei Bereiche unterteilt. Einen Bereich, zum
                                            Unterbringen Deiner Sportschuhe und Hygieneartikel. Im anderen Bereich
                                            befinden sich die Sachen, die nach jedem Training zur Reinigung abgeholt
                                            werden.
                                            <br>
                                            Für unseren Service benötigst du zwei Sportoutfits. Diese können nach
                                                belieben in unserem Onlineshop zusammengestellt werden. Du kannst aber
                                                auch die Kleidung verwenden, mit der du bisher immer trainiert hast. Die
                                                Handtücher gibt es inklusive.<span id="dots">...</span>
                                            <span id="more">
                                                <br>
                                                Vor dem Training meldest Du Dich mit der Hilfe unserer App an. Nun kann
                                                die Sportausrüstung für das Training entnommen werden. Nach dem
                                                Training, legst Du die Sachen zurück in den Spind und verschwendest
                                                keinen Gedanken mehr darüber.
                                                Im Laufe des Tages wird die benutzte Ausrüstung gegen das frische zweite
                                                Paar eingetauscht. So können wir sicher gehen, dass Du immer frische
                                                Sachen vorfindest und mit voller Vorfreude loslegen kannst.
                                                <br>
                                                Und das ist unser Versprechen an Dich: Unabhängig davon, ob Du
                                                Profisportler, ambitionierter Freizeitsportler oder einfach jemand bist,
                                                der seine Sporttasche nur ungern richtet, mit Set wirst Du nicht nur im
                                                Sport sondern auch in anderen Bereichen des Lebens besser, einfach
                                                dadurch, dass Du auf dich wichtigen Dinge im Leben fokussieren kannst.
                                                <br>
                                                Wir stehen für diejenigen die beim Sport Leistung erbringen. Wir stehen
                                                für die, die sich gerne auspowern und für jene, die ihren
                                                Verpflichtungen im Beruf, im Verein oder als Eltern nachgehen.
                                                Wenn Du Dich angesprochen fühlst und glaubst, dass unser Service für
                                                dich eine Bereicherung ist, dann registriere dich gerne bei uns! Wir
                                                freuen uns auf Dich!</span> <a onclick="myFunction()" href="#" id="myBtn">Weiterlesen</a>

                                        </p>
                                        {{-- <button onclick="myFunction()" id="myBtn">Read more</button>  --}}
                                        


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
  #more {display: none;}
</style>

<script>
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Weiterlesen";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Lese weniger";
            moreText.style.display = "inline";
        }
    }

</script>

@endsection
