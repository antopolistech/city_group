<!-- SLIDER START -->
<section class="slider_area">
    <div class="container-fluid">
        <div class="row slider_wrapper">
            <div class="main_slider">

                @foreach($sliders as $key => $slider)
                <figure class="item">
                    @if($key == 0 || $key == 5)
                     
                    @elseif($key == 1)
                     <figcaption class="caption">
                        <h1 class="fadeInUp_slide animated" style="animation-delay: .2s">{{$slider->sliderText1}}</h1>
                        <h2 class="fadeInUp_slide animated" style="animation-delay: .2s">{{$slider->sliderText2}}</h2>
                    </figcaption> 
                    @elseif($key == 2)
                     <figcaption class="caption">
                        <h1 class="fadeInRight_slide animated" style="animation-delay: .2s">{{$slider->sliderText1}}</h1>
                        <h2 class="fadeInRight_slide animated" style="animation-delay: .2s">{{$slider->sliderText2}}</h2>
                    </figcaption>
                    @elseif($key == 3)
                     <figcaption class="caption">
                        <h1 class="fadeInLeft_slide animated" style="animation-delay: .2s">{{$slider->sliderText1}}</h1>
                        <h2 class="fadeInLeft_slide animated" style="animation-delay: .2s">{{$slider->sliderText2}}</h2>
                    </figcaption>
                     @elseif($key == 4)
                     <figcaption class="caption">
                        <h1 class="fadeInLeft_slide animated" style="animation-delay: .2s">{{$slider->sliderText1}}</h1>
                        <h2 class="fadeInLeft_slide animated" style="animation-delay: .2s">{{$slider->sliderText2}}</h2>
                    </figcaption>
                   
                    @else
                    <figcaption class="caption">
                        <h1 class="fadeInDown_slide animated" style="animation-delay: .2s">{{$slider->sliderText1}}</h1>
                        <h2 class="fadeInDown_slide animated" style="animation-delay: .2s">{{$slider->sliderText2}}</h2>
                    </figcaption>
                    @endif
                    
                    @if($key == 5)
                        <a href="https://www.facebook.com/bengalteabd" target="__blank" ><img src="{{asset($slider->sliderImage)}}" alt="{{$slider->sliderImage}}"></a>
                    @else
                        <img src="{{asset($slider->sliderImage)}}" alt="{{$slider->sliderImage}}">
                    @endif
                    
                </figure>
                @endforeach

            </div>
            <div class="mainslider_nav">
                <i class="fa fa-angle-left testi_prev"></i>
                <i class="fa fa-angle-right testi_next"></i>
            </div>
        </div>
    </div>
</section>
<!-- SLIDER END -->