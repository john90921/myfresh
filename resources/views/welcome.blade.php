<x-app-layout>


<!-- Carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ asset('images/farm3.png') }}" alt="Fresh Fruits">
            <div class="carousel-caption">
                <h3>Fresh & Healthy Fruits</h3>
                <p>Carefully selected every day</p>
            </div>
        </div>

        <div class="item">
            <img src="{{ asset('images/farm2.png') }}" alt="Local Fruits">
            <div class="carousel-caption">
                <h3>Local & Imported</h3>
                <p>Best quality from trusted suppliers</p>
            </div>
        </div>

        <div class="item">
            <img src="{{ asset('images/farm1.png') }}" alt="Bulk Orders">
            <div class="carousel-caption">
                <h3>Retail & Bulk Orders</h3>
                <p>Perfect for families and businesses</p>
            </div>
        </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<!-- About Us -->
<section id="about" class="about-section">
    <div class="container">
        <div class="row text-center">
            <div class="about-title">About Us</div>
            <div class="about-divider"></div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <p class="about-text">
                    We are a trusted <span class="about-highlight">fruit supplier based in Kluang</span>, dedicated to
                    providing a wide variety of fresh and high-quality fruits. Our range includes both local produce
                    and imported favourites, carefully selected for freshness and taste.
                </p>

                <p class="about-text">
                    We believe that great fruit begins at the source. That’s why we work closely with reliable farmers
                    and suppliers to ensure our fruits are healthy, natural, and consistently fresh.
                </p>

                <p class="about-text">
                    Whether for daily consumption, special events, or bulk purchases, we aim to deliver reliable
                    service, fair pricing, and fruits you can trust. Serving the Kluang community is our pride, and
                    customer satisfaction is always our priority.
                </p>
            </div>
        </div>
    </div>
</section>
</x-app-layout>
