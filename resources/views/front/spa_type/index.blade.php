@extends('layouts.front')

@section('content')

    <div class="inn-body-section pad-bot-55">
        <div class="container">
            <div class="row">
                <div class="page-head">
                    <h2>spa Types</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>All available spa service are listed below</p>
                </div>

            @forelse($spa_types as $spa_type)
                <!--spa SECTION-->
                <div class="room">
                    @if($spa_type->cost !== $spa_type->discountedPrice)
                    <div class="ribbon ribbon-top-left"><span>Discount</span>
                    </div>
                    @endif
                    <!--spa IMAGE-->
                    <div class="r1 r-com"><img src="{{'/storage/spa/'.$spa_type->image}}" alt="" />
                    </div>
                    <!--spa RATING-->
                    <div class="r2 r-com">
                        <h4>{{ $spa_type->name }}</h4>

                        {{-- <div class="r2-ratt">
                            @if($spa_type->getAggregatedRating() > 0)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($spa_type->getAggregatedRating() > 1)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($spa_type->getAggregatedRating() > 2)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($spa_type->getAggregatedRating() > 3)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($spa_type->getAggregatedRating() > 4)
                            <i class="fa fa-star"></i>
                            @endif
                            <p>
                                @if($spa_type->getAggregatedRating() == 0)
                                    No Ratings Yet
                                @elseif($spa_type->getAggregatedRating() <= 2)
                                Below Average
                                @elseif($spa_type->getAggregatedRating() <= 3)
                                    Satisfactory
                                @elseif($spa_type->getAggregatedRating() <= 4)
                                    Good
                                @elseif($spa_type->getAggregatedRating() <= 5)
                                    Excellent
                                @endif
                                {{$spa_type->getAggregatedRating()}} / 5
                            </p>
                        </div> --}}
                        {{-- <ul>
                            <li>Max Adult : {{ $spa_type->max_adult }}</li>
                            <li>Max Child : {{ $spa_type->max_child }}</li>
                            <li></li>
                            <li></li>
                        </ul> --}}
                    </div>
                    <!--spa AMINITIES-->
                    {{-- <div class="r3 r-com">
                        <ul>
                            @foreach($spa_type->facilities as $facility)
                                <li>{{ $facility->name }}</li>
                            @endforeach
                        </ul>
                    </div> --}}
                    <!--spa PRICE-->
                    <div class="r4 r-com">
                        <p>Price for {{ $spa_type->duration }} hour</p>

                        <p>
                            {{-- <span class="spa-price-1">{{ config('app.currency').$spa_type->discountedPrice}}</span> --}}
                            @if($spa_type->cost !== $spa_type->discountedPrice)
                            <span class="spa-price">{{ config('app.currency').$spa_type->cost }}</span>
                            @endif
                        </p>
                        <p>Non Refundable</p>
                    </div>
                    <!--spa BOOKING BUTTON-->
                    <div class="r5 r-com"> <a href="{{url('/spa_type/'.$spa_type->id)}}" class="inn-room-book">Book</a> </div>
                </div>
                <!--END spa SECTION-->
                @empty
                <!--spa SECTION-->
                    <div class="spa">
                        </div>
                        <!--spa IMAGE-->
                        {{-- <div class="r1 r-com"><img src="{{ asset("front/images/spa/1.jpg") }}" />
                        </div> --}}
                        <!--spa RATING-->
                        <div class="r2 r-com">
                            <h4>Master Suite</h4>
                            <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  4.5 / 5</span> </div>
                            <ul>
                                <li>Max Adult : 3</li>
                                <li>Max Child : 1</li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <!--spa AMINITIES-->
                        <div class="r3 r-com">
                            <ul>
                                <li>Ironing facilities</li>
                                <li>Tea/Coffee maker</li>
                                <li>Air conditioning</li>
                                <li>Flat-screen TV</li>
                                <li>Wake-up service</li>
                            </ul>
                        </div>
                        <!--spa PRICE-->
                        <div class="r4 r-com">
                            <p>Price for 1 night</p>
                            <p><span class="spa-price-1">5000</span> <span class="spa-price">$: 7000</span>
                            </p>
                            <p>Non Refundable</p>
                        </div>
                        <!--spa BOOKING BUTTON-->
                        <div class="r5 r-com">
                            <div class="r2-available">Available</div>
                            <p>Price for 1 night</p> <a href="spa-details-block.html" class="inn-spa-book">Book</a> </div>
                    </div>
                    <!--END spa SECTION-->
                <!--spa SECTION-->
                <div class="spa">
                    <div class="ribbon ribbon-top-left"><span>Featured</span>
                    </div>
                    <!--spa IMAGE-->
                    <div class="r1 r-com"><img src="images/spa/2.jpg" alt="" />
                    </div>
                    <!--spa RATING-->
                    <div class="r2 r-com">
                        <h4>Mini Suite</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  4.2 / 5</span> </div>
                        <ul>
                            <li>Max Adult : 2</li>
                            <li>Max Child : 2</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--spa AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                            <li>Ironing facilities</li>
                            <li>Tea/Coffee maker</li>
                            <li>Air conditioning</li>
                            <li>Flat-screen TV</li>
                            <li>Wake-up service</li>
                        </ul>
                    </div>
                    <!--spa PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>
                        <p><span class="spa-price-1">4000</span> <span class="spa-price">$: 4500</span>
                        </p>
                        <p>Non Refundable</p>
                    </div>
                    <!--spa BOOKING BUTTON-->
                    <div class="r5 r-com">
                        <div class="r2-available">Available</div>
                        <p>Price for 1 night</p> <a href="spa-details.html" class="inn-spa-book">Book</a> </div>
                </div>
                <!--END spa SECTION-->
                <!--spa SECTION-->
                <div class="spa">
                    <!--<div class="ribbon ribbon-top-left"><span>Featured</span></div>
                    -->
                    <!--spa IMAGE-->
                    <div class="r1 r-com"><img src="images/spa/3.jpg" alt="" />
                    </div>
                    <!--spa RATING-->
                    <div class="r2 r-com">
                        <h4>Ultra Deluxe</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  3.9 / 5</span> </div>
                        <ul>
                            <li>Max Adult : 4</li>
                            <li>Max Child : 2</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--spa AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                            <li>Ironing facilities</li>
                            <li>Tea/Coffee maker</li>
                            <li>Air conditioning</li>
                            <li>Flat-screen TV</li>
                            <li>Wake-up service</li>
                        </ul>
                    </div>
                    <!--spa PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>
                        <p><span class="spa-price-1">3500</span> <span class="spa-price">$: 4000</span>
                        </p>
                        <p>Non Refundable</p>
                    </div>
                    <!--spa BOOKING BUTTON-->
                    <div class="r5 r-com">
                        <div class="r2-available">Available</div>
                        <p>Price for 1 night</p> <a href="spa-details-1.html" class="inn-spa-book">Book</a> </div>
                </div>
                <!--END spa SECTION-->
                <!--spa SECTION-->
                <div class="spa">
                    <!--<div class="ribbon ribbon-top-left"><span>Best spa</span></div>-->
                    <!--spa IMAGE-->
                    <div class="r1 r-com"><img src="images/spa/4.jpg" alt="" />
                    </div>
                    <!--spa RATING-->
                    <div class="r2 r-com">
                        <h4>Luxury spa</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  4.0 / 5</span> </div>
                        <ul>
                            <li>Max Adult : 5</li>
                            <li>Max Child : 2</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--spa AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                            <li>Ironing facilities</li>
                            <li>Tea/Coffee maker</li>
                            <li>Air conditioning</li>
                            <li>Flat-screen TV</li>
                            <li>Wake-up service</li>
                        </ul>
                    </div>
                    <!--spa PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>
                        <p><span class="spa-price-1">3000</span> <span class="spa-price">$: 3500</span>
                        </p>
                        <p>Non Refundable</p>
                    </div>
                    <!--spa BOOKING BUTTON-->
                    <div class="r5 r-com">
                        <div class="r2-available">Available</div>
                        <p>Price for 1 night</p> <a href="spa-details.html" class="inn-spa-book">Book</a> </div>
                </div>
                <!--END spa SECTION-->
                <!--spa SECTION-->
                <div class="spa">
                    <div class="ribbon ribbon-top-left"><span>Special</span>
                    </div>
                    <!--spa IMAGE-->
                    <div class="r1 r-com"><img src="images/spa/5.jpg" alt="" />
                    </div>
                    <!--spa RATING-->
                    <div class="r2 r-com">
                        <h4>Premium spa</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  4.5 / 5</span> </div>
                        <ul>
                            <li>Max Adult : 5</li>
                            <li>Max Child : 2</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--spa AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                            <li>Ironing facilities</li>
                            <li>Tea/Coffee maker</li>
                            <li>Air conditioning</li>
                            <li>Flat-screen TV</li>
                            <li>Wake-up service</li>
                        </ul>
                    </div>
                    <!--spa PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>
                        <p><span class="spa-price-1">4000</span> <span class="spa-price">$: 5000</span>
                        </p>
                        <p>Non Refundable</p>
                    </div>
                    <!--spa BOOKING BUTTON-->
                    <div class="r5 r-com">
                        <div class="r2-available">Available</div>
                        <p>Price for 1 night</p> <a href="spa-details-block.html" class="inn-spa-book">Book</a> </div>
                </div>
                <!--END spa SECTION-->
                <!--spa SECTION-->
                <div class="spa">
                    <!--<div class="ribbon ribbon-top-left"><span>Featured</span></div>-->
                    <!--spa IMAGE-->
                    <div class="r1 r-com"><img src="images/spa/6.jpg" alt="" />
                    </div>
                    <!--spa RATING-->
                    <div class="r2 r-com">
                        <h4>Normal spa</h4>
                        <div class="r2-ratt"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <img src="images/h-trip.png" alt="" /> <span>Excellent  3.5 / 5</span> </div>
                        <ul>
                            <li>Max Adult : 4</li>
                            <li>Max Child : 4</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--spa AMINITIES-->
                    <div class="r3 r-com">
                        <ul>
                            <li>Ironing facilities</li>
                            <li>Tea/Coffee maker</li>
                            <li>Air conditioning</li>
                            <li>Flat-screen TV</li>
                            <li>Wake-up service</li>
                        </ul>
                    </div>
                    <!--spa PRICE-->
                    <div class="r4 r-com">
                        <p>Price for 1 night</p>
                        <p><span class="spa-price-1">2000</span> <span class="spa-price">$: 2500</span>
                        </p>
                        <p>Non Refundable</p>
                    </div>
                    <!--spa BOOKING BUTTON-->
                    <div class="r5 r-com">
                        <div class="r2-available">Available</div>
                        <p>Price for 1 night</p> <a href="spa-details.html" class="inn-spa-book">Book</a> </div>
                </div>
                <!--END spa SECTION-->
                @endforelse
            </div>
        </div>
@endsection
