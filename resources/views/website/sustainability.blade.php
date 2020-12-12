<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <link rel="shortcut icon" href="">
        <title>RFL Houseware</title>
        <link rel="stylesheet" href="{{ URL('/assets/frontend/sustainability/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL('/assets/frontend/sustainability/css/style.css') }}">
        <link rel="icon" href="{{ URL('/assets/frontend/sustainability/images/favicon.ico') }}" type="image/x-icon">
    </head>

    <body>
        <div class="overLay"></div>
        <div class="mobMenu">
            <a href="#" class="closeBt" style="display: inline;">X</a>
            <div class="container">
                <ul class="firstpane">
                    <li class="active"><a href="{{ URL('/') }}"><span>HOME</span></a></li>
                    <li><a href="#knowYour"><span>KNOW YOUR PLASTIC</span></a></li>
                    <li><a href="#goodChoice"><span>The Good Choice</span></a></li>
                </ul>
            </div>
        </div>
        <div style="width:99.9%; margin:auto; overflow:hidden">
            <header>
                <div class="container"> <a href="" target="_blank"><img  src="{{ URL('/assets/frontend/sustainability/images/logo.png') }}" alt="RFL" class="logo"></a>
                    <div class="menuBox">menuBox</div>
                    <nav> <a href="{{ URL('/') }}">Home</a> <a href="#knowYour" class="selcted">KNOW YOUR PLASTIC</a> <a href="#goodChoice">The Good Choice</a> </nav>
                </div>
            </header>
            <div class="homeBanner scene2" id="knowYour">
                <div class="container">
                    <div class="layer expand-width" data-depth="0.60" style="z-index:99">
                        <div class="sayBox animateThis fadeInleftSlow slow">
                            <h2><span>KNOW<br>
                                    YOUR</span><br>
                                PLASTICS</h2>
                            <p>If we asked you to differentiate between the good and bad polymers, would you succeed? Well, most of the people can’t tell how is former any different than the latter. That’s where brands must step in.</p>
                            <p>It is the responsibility of the brand to educate the consumers about such safety-related information. </p>
                            <p>All Polymer material manufacturers as well as brand owners must test their products before offering for sale and must ensure that it complies with the national and international safety norms. </p>
                        </div>
                    </div>
                    <div class="mobSize">
                        <div class="layer expand-width" data-depth="0.50">
                            <div class="homeCir animateThis zoomIn slow"> <img src="{{ URL('/assets/frontend/sustainability/images/homebanner1.png') }}" alt="RFL"> </div>
                        </div>
                        <div class="layer expand-width"  data-depth="1.40"><img src="{{ URL('/assets/frontend/sustainability/images/homebanner2.png') }}" alt="RFL" class="homeImg1 animateThis fadeInleftSlow"></div>
                        <div class="layer expand-width" data-depth="1.0"><img src="{{ URL('/assets/frontend/sustainability/images/homebanner3.png') }}" alt="RFL" class="homeImg2 animateThis fadeInRightSlow"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="container">
                <div class="what-plastic FL">
                    <div class="what-plasticBox1 FL">
                        <h2 class="animateThis up"> <span>What is</span><br>
                            Plastic </h2>
                        <p class="animateThis fadeInleftSlow">The word plastic is derived from Greek word ‘plastics’, which means make. Alexander Parkes of England invented plastic in 1862.</p>
                        <p class="animateThis fadeInleftSlow">Plastic is also often referred as Polymer, a group of many organic units. A slight difference is that all plastics are polymers, but not all polymers are plastics</p>
                    </div>
                    <div class="what-plasticBox2 FL animateThis zoomIn slow"><img src="{{ URL('/assets/frontend/sustainability/images/what-plastic.png') }}" alt="RFL"></div>
                    <div class="clear"></div>
                </div>
                <div class="what-plastic FL">
                    <div class="what-plasticBox1 FL">
                        <h2 class="animateThis up"> <span>Origin of</span><br>
                            Plastic </h2>
                        <p class="animateThis fadeInRightSlow">Most of the plastics are made from majorly these three raw materials</p>
                        <ul class="animateThis fadeInRightSlow">
                            <li>Petroleum</li>
                            <li>Coal</li>
                            <li>Cellulose</li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="container">
                <div class="polymers">
                    <h2 class="animateThis up"><span>Categories of Plastic &</span><br>
                        its environmental Effects</h2>
                    <div class="table-responsive">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="animateThis fadeInRightSlow cycleImg">
                            <tbody>
                                <tr>
                                    <th width="100">No.</th>
                                    <th>Type</th>
                                    <th>Chemical Name</th>
                                    <th>Application</th>
                                    <th>Food-Grade<br>
                                        Material availability</th>
                                    <th>Environmental Impact</th>
                                </tr>
                                <tr>
                                    <td><div class="cycleImg1 cyimg">1</div></td>
                                    <td>PET</td>
                                    <td>Polyethylene terephthalate</td>
                                    <td>Containers for liquids, single use bottles,<br>
                                        soft drink bottles, juice cans, fridge bottles.</td>
                                    <td>Yes</td>
                                    <td>Easy to recycle</td>
                                </tr>
                                <tr>
                                    <td><div class="cycleImg2 cyimg">2</div></td>
                                    <td>HDPE</td>
                                    <td>High-density polyethylene</td>
                                    <td>Milk bottles, corrosion-resistant<br>
                                        piping, shampoo &amp; conditioner bottles,<br>
                                        drain pipes.</td>
                                    <td>Yes</td>
                                    <td>Easy to recycle</td>
                                </tr>
                                <tr>
                                    <td><div class="cycleImg3 cyimg">3</div></td>
                                    <td>PVC</td>
                                    <td>Polyvinyl chloride</td>
                                    <td>Vinyl siding, pipes, insulation on electric<br>
                                        wires.</td>
                                    <td>No</td>
                                    <td>Difficult to recycle</td>
                                </tr>
                                <tr>
                                    <td><div class="cycleImg2 cyimg">4</div></td>
                                    <td>LDPE</td>
                                    <td>Low-density polyethylene</td>
                                    <td>Bread bags, sandwich bags, dispensing<br>
                                        bottles, milk packets.</td>
                                    <td>Yes</td>
                                    <td>Difficult to recycle</td>
                                </tr>
                                <tr>
                                    <td><div class="cycleImg2 cyimg">5</div></td>
                                    <td>PP</td>
                                    <td>Polypropylene</td>
                                    <td>Medicine bottles, cereal liners, tiffins,<br>
                                        bottles, food containers.</td>
                                    <td>Yes</td>
                                    <td>Easy to recycle</td>
                                </tr>
                                <tr>
                                    <td><div class="cycleImg3 cyimg">6</div></td>
                                    <td>PS</td>
                                    <td>Polystyrene</td>
                                    <td>Take-away containers, foam packing.</td>
                                    <td>No</td>
                                    <td>Easy to recycle</td>
                                </tr>
                                <tr>
                                    <td><div class="cycleImg1 cyimg">7</div></td>
                                    <td>O</td>
                                    <td>Others</td>
                                    <td>Compact discs, car wheel covers,<br>
                                        plastic door handles, scrub pads.</td>
                                    <td>Use with caution</td>
                                    <td>Difficult to recycle</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul class="cycColr animateThis fadeInleftSlow FR">
                        <li class="cycColr1">
                            <div></div>
                            Safest Choice </li>
                        <li class="cycColr2">
                            <div></div>
                            Use with Caution </li>
                        <li class="cycColr3">
                            <div></div>
                            Avoid </li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
            <div class="humnaHealth">
                <img src="{{ URL('/assets/frontend/sustainability/images/catImg3.png') }}" alt="RFL" class="catImg1 animateThis fadeInleftSlow slow">
                <div class="container">
                    <div class="humanHealthBox"><h2 class="animateThis up"> <span>Significance of</span><br>
                            Plastic </h2>
                        <ul class="signAcc">
                            <li class="animateThis fadeInleftSlow">
                                <h4 class="active">Plastic – MODERN WORLD <span></span></h4>
                                <div class="signCon" style="display:block">
                                    <p>Annually, 600 billion pounds of plastic is consumed and is growing at 5% a year. Owing to its low cost, ease of manufacturing, versatility, and imperviousness of water, plastic is used across industries including spacecraft and household. </p>
                                    <p>Polymers which are bio-compatible and do not leach out chemicals into food and beverages are safe polymers.</p>
                                </div>
                            </li>
                            <li class=" animateThis fadeInleftSlow slow">
                                <h4>Plastic – Medical Sector <span></span></h4>
                                <div class="signCon">
                                    <p>In medicine alone, the diversity of plastics’ uses is incredible. Prosthetics, engineered tissues, and micro-needle patches for drug delivery are all possible with polymers.</p>
                                    <p>Syringes are a good example of how plastics have benefited public health. The problem of easy breakage and the difficulty of cleaning syringes made of metal and glass – have been solved by designing a sterilizable syringe completely made of plastic.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="goodChoice" id="goodChoice">
                <div class="container">
                    <h2 class="animateThis up"> <span>The</span><br>
                        Good Choice </h2>
                    <div class="row"> <ul class="goodList2 FL animateThis up">
                            <li><span>Food Grade</span>
                                <p>No chemical transfer to food / beverage from plastic</p></li>
                            <li><span>Bisphenol – A (BPA) Free</span>
                                <p>No adverse effect on Human Health.</p></li>
                            <li><span>Odour free</span>
                                <p>Pleasant taste</p></li>
                            <li><span>Specially developed colours</span>
                                <p>which do not leach out chemicals to food<br>
                                    & beverages contained</p></li>
                        </ul>

                        <ul class="goodList3 ">
                            <li><h5 class="animateThis fadeIn mobshow">Bottles</h5>
                                <div class="goodBox1 animateThis zoomIn"><span></span></div>
                                <h5 class="animateThis fadeIn mobhide">Bottles</h5></li>

                            <li class="FL"> <div class="goodBox2 animateThis zoomIn"><span></span></div>
                                <h5 class="animateThis fadeIn">Housewares</h5>  </li>

                            <li class="FL"><div class="goodBox3 animateThis zoomIn"><span></span></div>
                                <h5 class="animateThis fadeIn">Other products</h5></li>

                        </ul>

                        <ul class="goodList2 FR animateThis up">
                            <li><span>Atomised granule feeding<br>system</span>
                                <p>to avoid any human touch to plastic granules</p></li>
                            <li><span>Leak Proof</span></li>
                            <li><span>Higher wall thickness </span></li>
                            <li><span>Eco-friendly</span></li>
                        </ul></div>

                    <br><br><br>

                </div>
            </div>
            <div class="saymain">
                <div class="container scene2">
                    <div class="layer expand-width"  data-depth=".60">
                        <div class="sayBox animateThis up slow">
                            <h2><span>Say<br>
                                    Yes to</span><br>
                                RFL</h2>
                            <p>RFL Houseware is committed to offering only the best products to our customers. We adhere to the highest safety standards to conserve our environment and ensure your good health.</p>
                        </div>
                    </div>
                    <div class="mobSize">
                        <div class="layer expand-width" data-depth="1.40"><img src="{{ URL('/assets/frontend/sustainability/images/sayBg.png') }}" alt="RFL" class="sayImg2"></div>
                        <div class="layer expand-width" data-depth=".90"> <img src="{{ URL('/assets/frontend/sustainability/images/sayImg2.png') }}" alt="RFL" class="sayImg3"></div>
                        <div class="layer expand-width" data-depth="1.20"><img src="{{ URL('/assets/frontend/sustainability/images/sayImg.png') }}" alt="RFL" class="sayImg1"></div>
                    </div>
                </div>
                <div class="container" style="padding:0">
                    <div class="goodCircle">
                        <div class="goodCirMain goodCir1 animateThis zoomIn">
                            <div class="goodCir"><b></b></div>
                            <span>Product Performance<br>
                                and Safety</span> </div>
                        <div class="goodCirMain goodCir2 animateThis zoomIn">
                            <div class="goodCir"><b></b></div>
                            <span>Customer Feedback</span> </div>
                        <div class="goodCirMain goodCir3 animateThis zoomIn">
                            <div class="goodCir"><b></b></div>
                            <span>R &amp;D</span> </div>
                        <div class="goodCirMain goodCir4 animateThis zoomIn">
                            <div class="goodCir"><b></b></div>
                            <span>Incoming<br>
                                Inspection</span> </div>
                        <div class="goodCirMain goodCir5 animateThis zoomIn">
                            <div class="goodCir"><b></b></div>
                            <span>In process<br>
                                Inspection</span> </div>
                        <div class="goodCirMain goodCir6 animateThis zoomIn">
                            <div class="goodCir"><b></b></div>
                            <span>FG Inspection</span> </div>
                        <div class="goodCirMain goodCir7 animateThis zoomIn">
                            <div class="goodCir"><b></b></div>
                            <span>Customer Delight</span> </div>
                    </div>
                </div>
            </div>
            <div class="goodPlastic animateThis up">
                <div class="container animateThis zoomIn">
                    <div class="goodText">Take the pledge to choose only</div>
                    <a href="http://rflhouseware.com/" target="_blank">‘Good Plastic’</a> </div>
            </div>
        </div>
        <footer>
            <div class="container" style="color:#fff">
                Copyright &copy; {{ $settings['copyright_info'] }}.
                <div class="clear"></div>
            </div>
        </footer>

        <script type="text/javascript" src="{{ URL('/assets/frontend/sustainability/js/plugins.js') }}"></script> 
        <script type="text/javascript" src="{{ URL('/assets/frontend/sustainability/js/custom.js') }}"></script>

        <script>
            $(document).ready(function (e) {
            if ($(window).width() < 990) {
            //alert('Less than 960');
            } else {
            $('.scene2').parallax({
            limitX: false,
                    limitY: 0,
                    scalarX: 5,
                    scalarY: 8,
            });
            }

            });
        </script>
    </body>
</html>