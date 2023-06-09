<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.3.1.slim.js"
  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
  crossorigin="anonymous"></script>
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="container">
    <div class="row">

        

        <div class="col-md-3">
            <div id="carousel-pager" class="carousel slide " data-ride="carousel" data-interval="500000000">
                <!-- Carousel items -->
                <div class="carousel-inner vertical">
                    <div class="active item">
                        <img src="http://placehold.it/600/f44336/000000&amp;text=First+Slide" class="img-responsive" data-target="#carousel-main" data-slide-to="0">
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/600/e91e63/000000&amp;text=Second+Slide" class="img-responsive" data-target="#carousel-main" data-slide-to="1">
                    </div>
                    <div class="item">
                        <img src="http://placehold.it/600/9c27b0/000000&amp;text=Third+Slide" class="img-responsive" data-target="#carousel-main" data-slide-to="2">
                    </div>
                    
                </div>
                
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-pager" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-pager" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $('.carousel .vertical .item').each(function(){
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=1;i<2;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        
        next.children(':first-child').clone().appendTo($(this));
    }
    });
</script>
<style>
    .carousel-inner.vertical {
    height: 100%; /*Note: set specific height here if not, there will be some issues with IE browser*/
    }
    .carousel-inner.vertical > .item {
    -webkit-transition: .6s ease-in-out top;
    -o-transition: .6s ease-in-out top;
    transition: .6s ease-in-out top;
    }

    @media all and (transform-3d),
    (-webkit-transform-3d) {
    .carousel-inner.vertical > .item {
        -webkit-transition: -webkit-transform .6s ease-in-out;
        -o-transition: -o-transform .6s ease-in-out;
        transition: transform .6s ease-in-out;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-perspective: 1000;
        perspective: 1000;
    }
    .carousel-inner.vertical > .item.next,
    .carousel-inner.vertical > .item.active.right {
        -webkit-transform: translate3d(0, 33.33%, 0);
        transform: translate3d(0, 33.33%, 0);
        top: 0;
    }
    .carousel-inner.vertical > .item.prev,
    .carousel-inner.vertical > .item.active.left {
        -webkit-transform: translate3d(0, -33.33%, 0);
        transform: translate3d(0, -33.33%, 0);
        top: 0;
    }
    .carousel-inner.vertical > .item.next.left,
    .carousel-inner.vertical > .item.prev.right,
    .carousel-inner.vertical > .item.active {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
        top: 0;
    }
    }

    .carousel-inner.vertical > .active {
    top: 0;
    }
    .carousel-inner.vertical > .next,
    .carousel-inner.vertical > .prev {
    top: 0;
    height: 100%;
    width: auto;
    }
    .carousel-inner.vertical > .next {
    left: 0;
    top: 33.33%;
    right:0;
    }
    .carousel-inner.vertical > .prev {
    left: 0;
    top: -33.33%;
    right:0;
    }
    .carousel-inner.vertical > .next.left,
    .carousel-inner.vertical > .prev.right {
    top: 0;
    }
    .carousel-inner.vertical > .active.left {
    left: 0;
    top: -33.33%;
    right:0;
    }
    .carousel-inner.vertical > .active.right {
    left: 0;
    top: 33.33%;
    right:0;
    }

    #carousel-pager .carousel-control.left {
        bottom: initial;
        width: 100%;
    }
    #carousel-pager .carousel-control.right {
        top: initial;
        width: 100%;
    }
</style>