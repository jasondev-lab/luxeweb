{{-- Extends layout --}}
@extends('layouts.front')

{{-- Style Section --}}
@section('styles')
<style>
.overlay-section {
    position: fixed;
    inset: 0;
    background-color: {{ $preview_data['background_color'] }};
    z-index: 1000; /* Ensure it appears above other content */
    display: flex;
    justify-content: center;
    align-items: center;
}
.logo-section {
    position: relative;
    width: {{ $preview_data['logo_width'] }}px;
    height: {{ $preview_data['logo_height'] }}px;
}
.logo-section .line, .logo-section .dot {
    position: absolute;
    background-color: {{ $preview_data['line_color'] }};
    opacity: 0;
    transition: opacity 0.3s ease;
}
.logo-section .dot {
    width: {{ $preview_data['line_width']*3 }}px;
    height: {{ $preview_data['line_width']*3 }}px;
    border-radius: 50%;
}
.logo-section .line.visible, .logo-section .dot.visible {
    opacity: 1;
}
.logo-section .logo-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: {{ $preview_data['text_font'] }}, "sans-serif";
    font-size: {{ $preview_data['text_size'] }}px;
    color: {{ $preview_data['text_color'] }};
    text-transform: uppercase;
    opacity: 0;
    transition: opacity 1s ease;
}
.logo-section .logo-text.small {
    display: {{ $preview_data['logo'] == 1 ? 'none' : 'block' }};
    font-size: {{ $preview_data['text_size']*0.6 }}px;
    top: 80%;
    left: 55%;    
}
.logo-section .logo-text.visible {
    opacity: 1;
}
.line.horizontal {
    height: {{ $preview_data['line_width'] }}px;
}
.line.vertical {
    width: {{ $preview_data['line_width'] }}px;
}
@media (max-width: 768px) {
    .logo-section {
        width: {{ $preview_data['logo_width']*0.8 }}px;
        height: {{ $preview_data['logo_height']*0.8 }}px;
    }
    .logo-section .logo-text {
        font-size: {{ $preview_data['text_size']*0.8 }}px;
    }
    .logo-section .logo-text.small {
        font-size: {{ $preview_data['text_size']*0.6*0.8 }}px;
    }
    .logo-section .dot {
        width: {{ $preview_data['line_width']*3*0.8 }}px;
        height: {{ $preview_data['line_width']*3*0.8 }}px;
    }
}
@media (max-width: 576px) {
    .logo-section {
        width: {{ $preview_data['logo_width']*0.6 }}px;
        height: {{ $preview_data['logo_height']*0.6 }}px;
    }
    .logo-section .logo-text {
        font-size: {{ $preview_data['text_size']*0.6 }}px;
    }
    .logo-section .logo-text.small {
        font-size: {{ $preview_data['text_size']*0.6*0.6 }}px;
    }
    .logo-section .dot {
        width: {{ $preview_data['line_width']*3*0.6 }}px;
        height: {{ $preview_data['line_width']*3*0.6 }}px;
    }   
}
</style>
@endsection
{{-- Content --}}
@section('content')
<div class="d-flex flex-column" style="width: 1400px; margin: 0 auto;">
    <div class="overlay-section">
        <div class="logo-section">
            <div class="line w-100 horizontal" id="1" style="top: 0;"></div>
            <div class="line w-100 horizontal" id="2" style="bottom: 0;"></div>
            <div class="line vertical h-100" id="3" style="left: 0;"></div>
            <div class="line vertical h-100" id="4" style="right: 0;"></div>

            <div class="line vertical" id="5" style="top: 0; left: 20%; height: 30%;"></div>
            <div class="line vertical" id="6" style="top: 0; left: 30%; height: 20%;"></div>
            <div class="line vertical" id="7" style="top: 0; left: 40%; height: 10%;"></div>
            <div class="line vertical" id="8" style="top: 10%; left: 80%; height: 20%;"></div>
            <div class="line horizontal" id="9" style="top: 10%; left: 10%; width: 45%;"></div>
            <div class="line vertical" id="10" style="top: 0; left: 50%; height: 20%;"></div>
            <div class="line horizontal" id="11" style="top: 10%; left: 70%; width: 10%;"></div>
            <div class="line vertical" id="12" style="top: 20%; left: 90%; height: 30%;"></div>
            <div class="line horizontal" id="13" style="top: 50%; left: 87.5%; width: 7.5%;"></div>
            <div class="line vertical" id="14" style="top: 30%; left: 82.25%; height: 20%;"></div>
            <div class="line horizontal" id="15" style="bottom: 30%; left: 75%; width: 10%;"></div>
            <div class="line vertical" id="16" style="bottom: 0; left: 30%; height: 20%;"></div>
            <div class="line vertical" id="17" style="bottom: 0; left: 50%; height: 10%;"></div>
            <div class="line vertical" id="18" style="bottom: 0; left: 60%; height: 20%;"></div>
            <div class="line vertical" id="19" style="bottom: 10%; left: 80%; height: 20%;"></div>
            <div class="line vertical" id="20" style="bottom: 30%; left: 85%; height: 30%;"></div>
            <div class="line horizontal" id="21" style="bottom: 30%; left: 87.5%; width: 7.5%;"></div>
            <div class="line vertical" id="22" style="bottom: 15%; left: 90%; height: 15%;"></div>
            <div class="line horizontal" id="23" style="bottom: 10%; left: 30%; width: 40%;"></div>
            <div class="line horizontal" id="24" style="bottom: 20%; left: 35%; width: 35%;"></div>
            <div class="line vertical" id="25" style="bottom: 10%; left: 10%; height: 50%;"></div>
            <div class="line horizontal" id="26" style="bottom: 20%; left: 10%; width: 10%;"></div>
            <div class="line vertical" id="27" style="bottom: 10%; left: 20%; height: 20%;"></div>
            <div class="line horizontal" id="29" style="bottom: 60%; left: 5%; width: 10%;"></div>
            <div class="line horizontal" id="30" style="top: 20%; left: 30%; width: 40%;"></div>
            <div class="line vertical" id="31" style="top: 0%; left: 10%; height: 20%;"></div>
            <div class="line vertical" id="32" style="top: 35%; left: 15%; height: 10%;"></div>            
            <div class="dot" id="33" style="top: 20%; left: 10%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="34" style="top: 30%; left: 20%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="35" style="top: 10%; left: 40%; transform: translate(-38%, -38%);"></div>
            <div class="line vertical" id="36" style="top: 0; left: 60%; height: 20%;"></div>
            <div class="line vertical" id="37" style="top: 0; left: 70%; height: 30%;"></div>
            <div class="dot" id="38" style="top: 10%; left: 55%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="39" style="top: 20%; left: 30%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="40" style="top: 20%; left: 50%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="41" style="top: 20%; left: 60%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="42" style="top: 30%; left: 70%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="43" style="top: 20%; left: 70%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="44" style="top: 10%; left: 80%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="45" style="top: 30%; left: 80%; transform: translate(-38%, -38%);"></div>
            <div class="line horizontal" id="46" style="top: 20%; left: 80%; width: 10%;"></div>
            <div class="dot" id="47" style="top: 50%; left: 95%; transform: translate(-38%, -38%);"></div>
            <div class="line horizontal" id="48" style="top: 30%; left: 85%; width: 10%;"></div>
            <div class="dot" id="49" style="top: 30%; left: 85%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="50" style="top: 50%; left: 90%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="51" style="top: 50%; left: 82.5%; transform: translate(-50%, -38%);"></div>
            <div class="dot" id="52" style="top: 40%; left: 85%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="53" style="bottom: 30%; left: 75%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="54" style="bottom: 10%; left: 80%; transform: translate(-38%, 38%);"></div>
            <div class="line horizontal" id="55" style="bottom: 15%; left: 90%; width: 5%;"></div>
            <div class="dot" id="56" style="bottom: 30%; left: 95%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="57" style="bottom: 15%; left: 95%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="58" style="bottom: 15%; left: 90%; transform: translate(-38%, 38%);"></div>
            <div class="line vertical" id="59" style="bottom: 0; left: 70%; height: 30%;"></div>
            <div class="line vertical" id="60" style="bottom: 0; left: 40%; height: 30%;"></div>
            <div class="dot" id="61" style="bottom: 20%; left: 30%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="62" style="bottom: 10%; left: 30%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="63" style="bottom: 20%; left: 35%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="64" style="bottom: 30%; left: 40%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="65" style="bottom: 10%; left: 50%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="66" style="bottom: 20%; left: 60%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="67" style="bottom: 30%; left: 70%; transform: translate(-38%, 38%);"></div>
            <div class="line horizontal" id="68" style="bottom: 40%; left: 5%; width: 10%;"></div>
            <div class="line vertical" id="69" style="top: 55%; left: 15%; height: 10%;"></div>
            <div class="line horizontal" id="70" style="bottom: 30%; left: 15%; width: 10%;"></div>
            <div class="dot" id="71" style="bottom: 10%; left: 10%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="72" style="bottom: 10%; left: 20%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="73" style="bottom: 20%; left: 20%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="74" style="bottom: 30%; left: 25%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="75" style="bottom: 33.5%; left: 15%; transform: translate(-38%, 38%);"></div>
            <div class="dot" id="76" style="top: 33.5%; left: 15%; transform: translate(-38%, -38%);"></div>
            <div class="dot" id="77" style="top: 40%; left: 5%; transform: translate(-38%, -60%);"></div>
            <div class="dot" id="78" style="top: 60%; left: 5%; transform: translate(-38%, -50%);"></div>
            
            <div class="logo-text">facets</div>
            <div class="logo-text small">vintage</div>
        </div>
    </div>
</div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
$(document).ready(function() {
    var preview=@json($preview_data);
    var home_url="{{ route('home') }}";
    var frameDelay = preview.speed==null ? 100 : preview.speed;
    let orders1 = [1, 4, 2, 3, 31, 33, 5, 34, 6, 39, 7, 35, 10, 40, 9, 38, 36, 41, 37, 42, 30, 43, 11, 44, 8, 45, 14, 51, 48, 49, 13, 47, 46, 12, 50, 21, 56, 22, 58, 55, 57, 20, 52, 15, 53, 19, 54, 59, 67, 18, 66, 17, 65, 60, 64, 16, 61, 23, 62, 24, 63, 25, 71, 29, 77, 32, 76, 68, 78, 69, 75, 70, 74, 27, 72, 26, 73];
    let orders2 = [1, 4, 2, 3, 31, 33, 5, 34, 6, 39, 7, 35, 10, 40, 9, 38, 36, 41, 37, 42, 30, 43, 11, 44, 8, 45, 14, 51, 48, 49, 13, 47, 46, 12, 50, 21, 56, 22, 58, 55, 57, 20, 52, 15, 53, 19, 54, 25, 71, 29, 77, 32, 76, 68, 78, 69, 75, 70, 74, 27, 72, 26, 73];
    let orders = preview.logo == 1 ? orders1 : orders2;
    let idx = 0;
    let lastTime = 0;

    function displayLine(currentTime) {
        if (currentTime - lastTime > frameDelay) { // Only update if enough time has passed
            if (idx < orders.length) {
                $('#' + orders[idx]).addClass('visible');
                idx++;
                lastTime = currentTime;
            }
        }
        if (idx < orders.length) {
            requestAnimationFrame(displayLine);
        } else {
            $('.logo-text').addClass('visible');
            setTimeout(() => {
                window.location.href=home_url;
            }, 2000);
        }
    }
    requestAnimationFrame(displayLine);
});
</script>
@endsection