@extends('themes.default.layouts.default')
@section('content')

        <!--Fullscreen mode-->
        <div class="ts-full-screen ts-has-horizontal-results w-1001 d-flex1 flex-column1">
            <div class="ts-map ts-shadow__sm">
                <div id="ts-map-hero" class="h-100 ts-z-index__1"
                     data-ts-map-leaflet-provider="https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png"
                     data-ts-map-leaflet-attribution="&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a> &copy; <a href='http://cartodb.com/attributions'>CartoDB</a>"
                     data-ts-map-zoom-position="bottomright"
                     data-ts-map-scroll-wheel="2"
                     data-ts-map-zoom="10"
                     data-ts-map-center-latitude="41.1145"
                     data-ts-map-center-longitude="71.4468"
                     data-ts-locale="uz-UZ"
                     data-ts-currency="USD"
                     data-ts-unit="m<sup>2</sup>"
                     data-ts-display-additional-info="area_Area;bedrooms_Bedrooms;bathrooms_Bathrooms">
                </div>

            </div>

            <!-- RESULTS
            =========================================================================================================-->
            <div id="ts-results" class="ts-results__horizontal scrollbar-inner dragscroll">
                <div class="ts-results-wrapper"></div>
            </div>
        </div>
        <!--end full-screen-->
    </section>

@endsection

