{{-- Header Including Nav  --}}
  <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 d-flex">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                        

                        
                        <div class="header__top__right col-12">
                            <div class="row  d-flex ">
                           
                            <div class="header__top__right__language col-4">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-dow">
                              <i class="fas fa-angle-down"></i>
                              {{-- <i class="fas fa-sort-down"></i> --}}
                                </span>
                                <ul>
                                    <li><a href="#">Arabic</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth  col-4 d-flex "> 
                                <a href="#" class="m-2"><i class="fa fa-user b-3"></i> Login</a>
                                <a href="/admin/dashboard" class="m-2"><i class="fa fa-user b-3"></i> Admin</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{ url('/imgs/abclogo3.png')}}"  alt="" width="155" height="65"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                         
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>