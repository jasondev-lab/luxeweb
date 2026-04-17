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
/* Match #kt_content horizontal padding in layouts/front.blade.php */
.home-page-layout {
    /* --home-content-pad-x: 328px; */
    display: flex;
    align-items: stretch;
    gap: 0;
    /* width: calc(100% + (2 * var(--home-content-pad-x))); */
    width: 100%;
    max-width: none;
    /* margin-left: calc(-1 * var(--home-content-pad-x)); */
    /* margin-right: calc(-1 * var(--home-content-pad-x)); */
    box-sizing: border-box;
}
.home-left-sidebar {
    flex: 0 0 210px;
    width: 210px;
    max-width: 210px;
    box-sizing: border-box;
    padding: 1.5rem 1rem;
    border-right: 1px solid rgba(0, 0, 0, 0.06);
    background-color: #ffffff;
    background-image: repeating-linear-gradient(
        to right,
        #d3d3d3 0px,
        #d3d3d3 10px,
        #ffffff 10px,
        #ffffff 20px
    );
}
.home-main-content {
    /* flex: 1 1 auto; */
    min-width: 0;
    width: 1270px;
    /* Right inset matches other pages; small gap after stripe column */
    /* padding: 20px var(--home-content-pad-x) 0 8.25rem; */
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
    right: 16px;
    bottom: 16px;
    border: 1px solid #ffffff;
    color: #ffffff;
    background: rgb(102, 101, 101);
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
    .home-page-layout {
        width: 100%;
        max-width: 100%;
        margin-left: 0;
        margin-right: 0;
    }
    .home-main-content {
        padding: 20px 0 0 0;
    }
    .home-left-sidebar {
        display: none;
    }
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

<div class="home-page-layout">
    <div style="flex: 1; display: flex; align-items: stretch; box-sizing: border-box;">
        <aside class="home-left-sidebar" role="complementary" aria-label="Sidebar"></aside>
    </div>    
    <div class="home-main-content">
        <div class="home-showcase">
            <div class="showcase-split">
                <div class="showcase-card split">
                    <img src="{{ asset('uploads/home/thumb/'.$home['pottery_images'][0]) }}" alt="Pottery collection">
                    <a class="showcase-btn" href="{{ url('shop-our-store/category/1') }}">Pottery</a>
                </div>
                <div class="showcase-card split">
                    <img src="{{ asset('uploads/home/thumb/'.$home['glass_images'][0]) }}" alt="Glass collection">
                    <a class="showcase-btn" href="{{ url('shop-our-store/category/2') }}">Glass</a>
                </div>
            </div>

            <div class="showcase-row">
                <div class="showcase-card half">
                    <img src="{{ asset('uploads/home/thumb/'.$home['lightings_images'][0]) }}" alt="Lightings collection">
                    <a class="showcase-btn" href="{{ url('shop-our-store/category/3') }}">Lightings</a>
                </div>
                <div class="showcase-card half">
                    <img src="{{ asset('uploads/home/thumb/'.$home['metals_images'][0]) }}" alt="Metals collection">
                    <a class="showcase-btn" href="{{ url('shop-our-store/category/4') }}">Metals</a>
                </div>
            </div>
            <div class="newsletter-card">
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
    </div>
    <div class="home-right-sidebar" role="complementary" aria-label="Sidebar" style="flex: 1"></div>
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
@endsection