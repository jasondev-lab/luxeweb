{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
.home-showcase {
    /* max-width: 980px; */
    width: 100%;
    margin: 0 auto;
}
.showcase-card {
    position: relative;
    overflow: hidden;
    margin-bottom: 22px;
    background: #efefef;
}
.showcase-card img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}
.showcase-card.hero {
    height: 350px;
}
.showcase-split {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    margin-bottom: 22px;
}
.showcase-card.split {
    height: 350px;
    margin-bottom: 0;
}
.showcase-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    margin-bottom: 22px;
}
.showcase-card.half {
    height: 350px;
    margin-bottom: 0;
}
.showcase-card.wide {
    height: 350px;
}
.showcase-btn {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border: 1px solid #ffffff;
    color: #ffffff;
    background: rgba(0, 0, 0, 0.08);
    letter-spacing: 0.14em;
    text-transform: uppercase;
    font-size: 10px;
    line-height: 1;
    padding: 10px 22px;
    text-decoration: none;
    white-space: nowrap;
}
.showcase-btn:hover {
    color: #ffffff;
    text-decoration: none;
    background: rgba(0, 0, 0, 0.2);
}
.newsletter-card {
    position: relative;
    margin-top: 14px;
    height: 230px;
    overflow: hidden;
    background: #e6e6e6;
}
.newsletter-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.newsletter-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: rgba(255, 255, 255, 0.08);
}
.newsletter-box h2 {
    font-size: 42px;
    font-weight: 600;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: #111111;
    margin-bottom: 8px;
}
.newsletter-box p {
    font-size: 12px;
    letter-spacing: 0.1em;
    color: #333333;
    margin-bottom: 18px;
}
.newsletter-form {
    display: flex;
    justify-content: center;
    gap: 10px;
}
.newsletter-form input {
    width: 230px;
    border: 1px solid #ffffff;
    background: rgba(255, 255, 255, 0.85);
    padding: 10px 12px;
    font-size: 12px;
}
.newsletter-form button {
    min-width: 120px;
    border: 0;
    background: #111111;
    color: #ffffff;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.1em;
    padding: 10px 18px;
}
@media (max-width: 992px) {
    .home-showcase {
        max-width: 100%;
    }
    .showcase-card.hero {
        height: 280px;
    }
    .showcase-card.split {
        height: 280px;
    }
    .showcase-card.half,
    .showcase-card.wide {
        height: 210px;
    }
    .newsletter-card {
        height: 350px;
    }
    .newsletter-box h2 {
        font-size: 30px;
    }
}
@media (max-width: 768px) {
    .showcase-row {
        grid-template-columns: 1fr;
        gap: 22px;
    }
    .showcase-split {
        grid-template-columns: 1fr;
        gap: 22px;
    }
    .showcase-card.hero,
    .showcase-card.split,
    .showcase-card.half,
    .showcase-card.wide {
        height: 240px;
    }
    .newsletter-card {
        height: 300px;
    }
    .newsletter-box p {
        padding: 0 18px;
    }
}
</style>
@endsection

{{-- Content --}}
@section('content')
<!-- @php
    $homeSlides = is_array($slide_images ?? null) ? array_values($slide_images) : [];
    $fallback = asset('assets/media/no_image.jpg');

    $potteryImage = isset($homeSlides[0]['name']) ? asset('uploads/home/' . $homeSlides[0]['name']) : $fallback;
    $glassImage = isset($homeSlides[1]['name']) ? asset('uploads/home/' . $homeSlides[1]['name']) : $fallback;
    $metalsImage = isset($homeSlides[2]['name']) ? asset('uploads/home/' . $homeSlides[2]['name']) : $fallback;
    $lightingImage = isset($homeSlides[3]['name']) ? asset('uploads/home/' . $homeSlides[3]['name']) : $fallback;
    $newsletterImage = isset($latest_addition_images[0]['name']) ? asset('uploads/home/' . $latest_addition_images[0]['name']) : $fallback;
@endphp -->

<div class="home-showcase">
    <div class="showcase-split">
        <div class="showcase-card split">
            <img src="{{ asset('uploads/home/thumb/'.$home['pottery_products_images'][0]) }}" alt="Pottery collection">
            <a class="showcase-btn" href="#">Shop Pottery</a>
        </div>
        <div class="showcase-card split">
            <img src="{{ asset('uploads/home/thumb/'.$home['pottery_products_images'][1]) }}" alt="Pottery collection">
            <a class="showcase-btn" href="#">Shop Pottery</a>
        </div>
    </div>

    <div class="showcase-row">
        <div class="showcase-card half">
            <img src="{{ asset('uploads/home/thumb/'.$home['glass_products_images'][0]) }}" alt="Glass collection">
            <a class="showcase-btn" href="#">Shop Glass</a>
        </div>
        <div class="showcase-card half">
            <img src="{{ asset('uploads/home/thumb/'.$home['metals_products_images'][1]) }}" alt="Metals collection">
            <a class="showcase-btn" href="#">Shop Metals</a>
        </div>
    </div>

    <div class="showcase-row">
        <div class="showcase-card half">
            <img src="{{ asset('uploads/home/thumb/'.$home['lighting_products_images'][0]) }}" alt="Lighting collection">
            <a class="showcase-btn" href="#">Shop Lighting</a>
        </div>
        <div class="showcase-card half">
            <img src="{{ asset('uploads/home/thumb/'.$home['lighting_products_images'][1]) }}" alt="Lighting collection">
            <a class="showcase-btn" href="#">Shop Lighting</a>
        </div>
    </div>

    <div class="newsletter-card">
        <!-- <img src="{{ $newsletterImage }}" alt="Newsletter background"> -->
        <div class="newsletter-overlay">
            <div class="newsletter-box">
                <!-- <h2>Stay In Touch.</h2> -->
                <p>Sign up for our email updates to receive arrivals at Facets.</p>
                <form class="newsletter-form" action="#" method="post">
                    <input type="email" name="email" placeholder="Email Address">
                    <button type="button">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
@endsection