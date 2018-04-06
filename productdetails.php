<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Glamour Craze">
    <meta name="keywords" content="Glamour Craze, Glamour, Sylhet">
    <meta name="author" content="OrbsLab">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GlamourCraze | Our Trend Is Your Attitude</title>
    
    <link rel="icon" href="images/glamour.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src='js/jquery.elevatezoom.js'></script>
</head>

<body>
   <div class="row" style="padding: 20px; text-align: justify;">
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <center>
                <img id="zoom_01" src="images/bag.jpeg" alt="product" height="400" data-zoom-image="images/bag.jpeg">
            </center>
        </div>
        <script>
          $('#zoom_01').elevateZoom({
            easing : true,
            scrollZoom : true
          });
        </script>
        <div class="col-md-3">
            <h1>Product Name</h1>
            <p>Category</p>
            <p class="rating" style="color: orange;">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </p>
            <p>Price: 599 Taka Only</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            <button type="button" class="btn btn-primary btn-block">ADD TO CART</button>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="cart-rec">
        <center>
            <h4>You Might Also Like</h4>
        </center>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="products">
                        <div class="img-box">
                            <img src="images/bag.jpeg">
                        </div>
                        <div class="img-box">
                            <img src="images/bag.jpeg">
                        </div>
                        <div class="img-box">
                            <img src="images/bag.jpeg">
                        </div>
                        <div class="img-box">
                            <img src="images/bag.jpeg">
                        </div>
                        <div class="img-box">
                            <img src="images/bag.jpeg">
                        </div>
                        <div class="img-box">
                            <img src="images/bag.jpeg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <!--Rating-->
    <div class="container" id="rating-comment">
        <div class="row">
            <div class="col-lg-6  col-md-6">
                <div class="container" id="rating">

                    <span class="heading">User Rating</span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <p>4.1 average based on 254 reviews.</p><hr>

                    <div class="row star">
                        <div class="side">
                            <div>5 star</div>
                        </div>
                        <div class="middle">
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width:60%">60%</div>
                            </div>
                        </div>
                        <div class="side right">
                            <div>150</div>
                        </div>
                        <div class="side">
                            <div>4 star</div>
                        </div>
                        <div class="middle">
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width:20%">20%</div>
                            </div>
                        </div>
                        <div class="side right">
                            <div>63</div>
                        </div>
                        <div class="side">
                            <div>3 star</div>
                        </div>
                        <div class="middle">
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width:7%">7%</div>
                            </div>
                        </div>
                        <div class="side right">
                            <div>15</div>
                        </div>
                        <div class="side">
                            <div>2 star</div>
                        </div>
                        <div class="middle">
                            <div class="progress">
                                <div class="progress-bar" style="width:3%">3%</div>
                            </div>
                        </div>
                        <div class="side right">
                            <div>6</div>
                        </div>
                        <div class="side">
                            <div>1 star</div>
                        </div>
                        <div class="middle">
                            <div class="progress">
                                <div class="progress-bar bg-danger" style="width:10%">10%</div>
                            </div>
                        </div>
                        <div class="side right">
                            <div>20</div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Comment-->
            <div class="col-lg-6 col-md-6">
              <div class="contact-form-area">
                <h5>Post Your Comment</h5><br>
                  <form>
                    <div class="row">
                      <div class="form-group col-md-6 col-xs-12">
                          <input class="form-control" type="text" placeholder="Name" id="fname" name="fname">
                      </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <select class="form-control" id="sel1">
                                <option disabled selected>Give Rate</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                          <textarea class="form-control" rows="4" placeholder="Type Your Comment" name="comment"></textarea>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                          <button class="btn btn-primary" name="submit">Post Comment</button>
                        </div>
                    </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
</body>
</html>