@extends('layout.app')
@section('content')


   <!-- page title area start  -->
   <section class="page-title-area" data-background="assets/img/bg/page-title-bg.jpg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="page-title-wrapper text-center">
                  <h1 class="page-title mb-10">About</h1>
                  <div class="breadcrumb-menu">
                     <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items">
                           <li class="trail-item trail-begin"><a href="/"><span>Home</span></a></li>
                           <li class="trail-item trail-end"><span>About</span></li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- page title area end  -->

   <!-- about-area start  -->
   <section class="about-area py-5 mt-5">
      <div class="container container-medium">

         <div class="row align-items-center g-5">

            <!-- Image -->
            <div class="col-lg-6">
               <div class="position-relative" style="display: flex; justify-content: center; align-items: center;">

                  <img src="assets/img/about/about-thumb.jpg" alt="Jaipur Heritage" class="img-fluid rounded shadow-lg"
                     style="object-fit:cover; min-height:520px;">

               </div>
            </div>

            <!-- Content -->
            <div class="col-lg-6">

               <span class="badge rounded-pill px-3 py-2 mb-3" style="background:#F5E6DA;color:#8B5E3C;font-size:14px;">
                  About Jaipur Heritage
               </span>

               <h2 class="fw-bold mb-4" style="font-size:2.8rem;line-height:1.2;color:#2B2B2B;">
                  Timeless Indian Fashion Inspired by Jaipur's Heritage
               </h2>

               <p class="text-secondary mb-4" style="font-size:17px;line-height:1.9;">
                  Welcome to <strong>Jaipur Heritage</strong>, where traditional craftsmanship meets contemporary
                  fashion. Our thoughtfully curated Women's Kurti and Women's Kurta collections are inspired by
                  Jaipur's vibrant culture, rich textile traditions, and artistic legacy, creating styles that blend
                  timeless elegance with modern comfort.
               </p>

               <p class="text-secondary mb-5" style="font-size:17px;line-height:1.9;">
                  Whether you're dressing for work, festive celebrations, family gatherings, or everyday elegance,
                  our premium ethnic wear is designed to make you feel confident and comfortable. Every piece is
                  crafted with quality fabrics, elegant silhouettes, and fine detailing to celebrate India's heritage
                  while complementing today's lifestyle.
               </p>

               <!-- Highlights -->
               <div class="row g-3 mb-5">

                  <div class="col-sm-6">
                     <div class="d-flex align-items-center border rounded-4 p-3 h-100" style="background:#fff;">

                        <div class="me-3">
                           <i class="fas fa-check-circle" style="font-size:28px;color:#8B5E3C;"></i>
                        </div>

                        <div>
                           <h6 class="fw-bold mb-1">Premium Fabrics</h6>
                           <small class="text-muted">
                              Soft, breathable & comfortable.
                           </small>
                        </div>

                     </div>
                  </div>

                  <div class="col-sm-6">
                     <div class="d-flex align-items-center border rounded-4 p-3 h-100">

                        <div class="me-3">
                           <i class="fas fa-check-circle" style="font-size:28px;color:#8B5E3C;"></i>
                        </div>

                        <div>
                           <h6 class="fw-bold mb-1">Elegant Designs</h6>
                           <small class="text-muted">
                              Traditional craftsmanship with modern style.
                           </small>
                        </div>

                     </div>
                  </div>

                  <div class="col-sm-6">
                     <div class="d-flex align-items-center border rounded-4 p-3 h-100">

                        <div class="me-3">
                           <i class="fas fa-check-circle" style="font-size:28px;color:#8B5E3C;"></i>
                        </div>

                        <div>
                           <h6 class="fw-bold mb-1">Everyday Comfort</h6>
                           <small class="text-muted">
                              Perfect for office & casual wear.
                           </small>
                        </div>

                     </div>
                  </div>

                  <div class="col-sm-6">
                     <div class="d-flex align-items-center border rounded-4 p-3 h-100">

                        <div class="me-3">
                           <i class="fas fa-check-circle" style="font-size:28px;color:#8B5E3C;"></i>
                        </div>

                        <div>
                           <h6 class="fw-bold mb-1">Made with Care</h6>
                           <small class="text-muted">
                              Crafted to celebrate Indian heritage.
                           </small>
                        </div>

                     </div>
                  </div>

               </div>

               <a href="{{ route('shop') }}" class="mt-3 btn btn-lg px-5 py-3 text-white rounded-pill shadow"
                  style="background:#8B5E3C;border:none;">
                  Explore Collection
                  <i class="fas fa-arrow-right ms-2"></i>
               </a>

            </div>

         </div>

      </div>
   </section>
   <!-- about-area end  -->

   <!-- features area start  -->
   <style>
      .irc-card {
         transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      }

      .irc-card:hover {
         transform: translateY(-6px);
         box-shadow: 0 18px 34px rgba(29, 26, 20, 0.10);
      }

      .irc-card:hover .irc-icon-circle {
         transform: scale(1.06);
      }

      .irc-icon-circle {
         transition: transform .25s ease;
      }

      .irc-card:hover .irc-underline {
         width: 34px;
      }

      .irc-underline {
         transition: width .25s ease;
      }
   </style>
   <div class="features-area features-area4" style="padding:64px 0;">
      <div class="container">
         <div class="row g-4">

            <!-- Card 1: Delivery -->
            <div class="col-lg-3 col-md-6 col-6">
               <div class="irc-card h-100"
                  style="background:#FFFFFF; border:1px solid #ECE6D8; border-top:3px solid #E0932E; border-radius:14px; padding:34px 22px; text-align:center;">
                  <div class="irc-icon-circle"
                     style="width:76px; height:76px; margin:0 auto 20px; border-radius:50%; background:#FCEFDA; display:flex; align-items:center; justify-content:center;">
                     <svg xmlns="http://www.w3.org/2000/svg" width="34" height="30" viewBox="0 0 46.699 40.604">
                        <path
                           d="M50.456,29.234h11.6a3.356,3.356,0,0,0,3.352-3.352V14.731a3.427,3.427,0,0,0-3.423-3.424H50.456a3.427,3.427,0,0,0-3.423,3.424V25.81a3.427,3.427,0,0,0,3.423,3.424ZM61.983,12.722a2.011,2.011,0,0,1,2.008,2.009V25.882a1.939,1.939,0,0,1-1.937,1.937h-11.6a2.011,2.011,0,0,1-2.008-2.009V14.731a2.01,2.01,0,0,1,2.008-2.009Z"
                           transform="translate(-47.033 -11.307)" fill="#B5601A" />
                        <path
                           d="M46.526,41.883H59.247a.708.708,0,0,0,.708-.708V37.97a3.33,3.33,0,0,0-3.326-3.325h-10.1A3.33,3.33,0,0,0,43.2,37.97v.587a3.33,3.33,0,0,0,3.326,3.326ZM58.54,40.468H46.526a1.91,1.91,0,0,1-1.91-1.91v-.587a1.91,1.91,0,0,1,1.91-1.91h10.1a1.91,1.91,0,0,1,1.91,1.91Z"
                           transform="translate(-38.869 -18.132)" fill="#B5601A" />
                        <path
                           d="M26.589,55.345H57.783a.708.708,0,1,0,0-1.415H26.589A1.79,1.79,0,0,1,24.8,52.193c1.031-6.683,6.17-7.871,6.389-7.918A.708.708,0,1,0,30.9,42.89c-.064.013-6.344,1.415-7.5,9.149a.747.747,0,0,0-.008.105A3.207,3.207,0,0,0,26.589,55.345Z"
                           transform="translate(-23.386 -20.539)" fill="#B5601A" />
                        <path
                           d="M46.021,55.345a.708.708,0,0,0,.551-1.15,7.567,7.567,0,0,1-.035-10.131A.708.708,0,1,0,45.5,43.1a9.113,9.113,0,0,0-.034,11.983A.708.708,0,0,0,46.021,55.345Z"
                           transform="translate(-25.643 -20.538)" fill="#B5601A" />
                        <path
                           d="M53.272,65.441A6.246,6.246,0,0,0,59.511,59.2a.708.708,0,0,0-1.415,0,4.824,4.824,0,1,1-9.648,0,.708.708,0,0,0-1.415,0A6.246,6.246,0,0,0,53.272,65.441Z"
                           transform="translate(-41.138 -25.107)" fill="#B5601A" />
                        <path d="M55.106,52.1h3.267a.708.708,0,1,0,0-1.415H55.108a.708.708,0,1,0,0,1.415Z"
                           transform="translate(-45.92 -22.824)" fill="#B5601A" />
                        <path
                           d="M13.5,63.317A6.5,6.5,0,1,0,7,56.808,6.5,6.5,0,0,0,13.5,63.317Zm0-11.59a5.088,5.088,0,1,1-5.082,5.082A5.088,5.088,0,0,1,13.5,51.727Z"
                           transform="translate(26.691 -22.714)" fill="#B5601A" />
                        <path
                           d="M8.107,55.337a.708.708,0,0,0,.675-.92,7.783,7.783,0,1,1,15.2-2.36,5.785,5.785,0,0,1-.114,1.216.676.676,0,0,0-.016.146.708.708,0,0,0,1.411.1,7.358,7.358,0,0,0,.134-1.459A9.2,9.2,0,1,0,7.432,54.846.708.708,0,0,0,8.107,55.337Z"
                           transform="translate(21.302 -20.535)" fill="#B5601A" />
                        <path
                           d="M19.709,48.117a.708.708,0,0,0,.708-.708V34.222a5.8,5.8,0,0,1,4.528-5.757l.047-.008,2.519,10.637a.707.707,0,1,0,1.377-.325L26.225,27.511a.7.7,0,0,0-.747-.541,7.877,7.877,0,0,0-.786.1A7.14,7.14,0,0,0,19,34.222V47.409A.708.708,0,0,0,19.709,48.117Z"
                           transform="translate(9.301 -15.887)" fill="#B5601A" />
                        <path
                           d="M19.708,25.984H31.1a.708.708,0,0,0,.708-.708v-5.8a.708.708,0,0,0-.708-.708H28.722A4.029,4.029,0,0,0,24.7,22.792v1.775h-4.99a.708.708,0,1,0,0,1.415ZM30.4,24.569H26.113V22.794a2.612,2.612,0,0,1,2.609-2.609H30.4Z"
                           transform="translate(6.396 -13.489)" fill="#B5601A" />
                        <path d="M47.741,20.915H64.7a.708.708,0,1,0,0-1.415H47.741a.708.708,0,1,0,0,1.415Z"
                           transform="translate(-47.033 -13.703)" fill="#B5601A" />
                        <path
                           d="M14.831,61.427a3.284,3.284,0,1,0-3.284-3.284,3.285,3.285,0,0,0,3.284,3.284Zm0-5.153a1.869,1.869,0,1,1-1.869,1.869A1.869,1.869,0,0,1,14.831,56.274Z"
                           transform="translate(25.366 -24.044)" fill="#B5601A" />
                     </svg>
                  </div>
                  <div style="font-size:17px; font-weight:700; color:#221E19; margin-bottom:6px;">Fast &amp; Reliable
                     Delivery</div>
                  <div class="irc-underline"
                     style="width:18px; height:3px; background:#E0932E; border-radius:2px; margin:0 auto 10px;"></div>
                  <p style="font-size:13.5px; color:#8A8477; margin:0;">Quick shipping across India</p>
               </div>
            </div>

            <!-- Card 2: Returns -->
            <div class="col-lg-3 col-md-6 col-6">
               <div class="irc-card h-100"
                  style="background:#FFFFFF; border:1px solid #ECE6D8; border-top:3px solid #1F6F63; border-radius:14px; padding:34px 22px; text-align:center;">
                  <div class="irc-icon-circle"
                     style="width:76px; height:76px; margin:0 auto 20px; border-radius:50%; background:#DFF0EB; display:flex; align-items:center; justify-content:center;">
                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 41.583 40.603">
                        <path
                           d="M263.129,392.394a.609.609,0,0,0,.609-.609v-1.07a.609.609,0,1,0-1.219,0v1.07A.609.609,0,0,0,263.129,392.394Zm0,0"
                           transform="translate(-241.198 -358.423)" fill="#155C50" />
                        <path
                           d="M408.754,392.394a.609.609,0,0,0,.609-.609v-1.07a.609.609,0,1,0-1.219,0v1.07A.609.609,0,0,0,408.754,392.394Zm0,0"
                           transform="translate(-374.997 -358.423)" fill="#155C50" />
                        <path
                           d="M319.429,404.232a2.54,2.54,0,0,0,1.918-.854.609.609,0,1,0-.917-.8,1.364,1.364,0,0,1-2,0,.609.609,0,0,0-.918.8,2.539,2.539,0,0,0,1.918.854Zm0,0"
                           transform="translate(-291.586 -369.69)" fill="#155C50" />
                        <path
                           d="M101.007,7.387l5.508,4.8a1.492,1.492,0,0,0,2.453-1.116v-.948a10.7,10.7,0,0,1,4.372,1.2,7.814,7.814,0,0,1,3.65,4.446,1.492,1.492,0,0,0,1.427,1.031c.156,0,.312-.013.467-.02a1.508,1.508,0,0,0,1.425-1.569V15.2a11.929,11.929,0,0,0-1.032-4.222,13.808,13.808,0,0,0-5.852-6.143,20.344,20.344,0,0,0-4.458-1.784V1.47A1.5,1.5,0,0,0,106.515.354l-5.508,4.8a1.5,1.5,0,0,0,0,2.232Zm.8-1.313,5.508-4.8a.263.263,0,0,1,.434.2V3.519a.609.609,0,0,0,.471.593c.117.027.248.063.368.1A19.209,19.209,0,0,1,112.8,5.886a12.639,12.639,0,0,1,5.364,5.6,10.7,10.7,0,0,1,.924,3.785v.009a.277.277,0,0,1-.264.287l-.4.018h-.014a.281.281,0,0,1-.268-.187,9.043,9.043,0,0,0-4.229-5.142,12.136,12.136,0,0,0-5.5-1.375.625.625,0,0,0-.673.608v1.584a.264.264,0,0,1-.434.2l-5.508-4.8a.265.265,0,0,1,0-.395Zm0,0"
                           transform="translate(-92.345 -0.001)" fill="#155C50" />
                        <path
                           d="M1.81,228.131H3.284v9.584A2.485,2.485,0,0,0,5.766,240.2H35.817a2.485,2.485,0,0,0,2.482-2.482v-9.584h1.473a1.831,1.831,0,0,0,1.684-2.485l-3.2-8.025a.609.609,0,0,0-.566-.384H34.472a.609.609,0,0,0,0,1.219h2.805l3.048,7.641a.6.6,0,0,1-.552.815H20.689a.6.6,0,0,1-.552-.374l-3.224-8.082H32.035a.609.609,0,1,0,0-1.218H3.893a.609.609,0,0,0-.566.383l-3.2,8.025a1.83,1.83,0,0,0,1.684,2.485Zm14.2,6.444a.609.609,0,0,0,.609-.609V221.019L19,226.99a1.8,1.8,0,0,0,1.684,1.141H37.081v9.584a1.265,1.265,0,0,1-1.264,1.264H16.623V236.4a.609.609,0,1,0-1.219,0v2.576H5.766A1.265,1.265,0,0,1,4.5,237.716v-9.584h6.837a1.824,1.824,0,0,0,1.684-1.141l2.382-5.971v12.948a.609.609,0,0,0,.609.609ZM1.258,226.1l3.048-7.641H15.115l-3.224,8.082a.6.6,0,0,1-.552.374H1.81a.6.6,0,0,1-.552-.815Zm0,0"
                           transform="translate(0 -199.595)" fill="#155C50" />
                     </svg>
                  </div>
                  <div style="font-size:17px; font-weight:700; color:#221E19; margin-bottom:6px;">Easy Returns</div>
                  <div class="irc-underline"
                     style="width:18px; height:3px; background:#1F6F63; border-radius:2px; margin:0 auto 10px;"></div>
                  <p style="font-size:13.5px; color:#8A8477; margin:0;">30-day returns policy</p>
               </div>
            </div>

            <!-- Card 3: Payment Security -->
            <div class="col-lg-3 col-md-6 col-6">
               <div class="irc-card h-100"
                  style="background:#FFFFFF; border:1px solid #ECE6D8; border-top:3px solid #33447A; border-radius:14px; padding:34px 22px; text-align:center;">
                  <div class="irc-icon-circle"
                     style="width:76px; height:76px; margin:0 auto 20px; border-radius:50%; background:#E2E6F2; display:flex; align-items:center; justify-content:center;">
                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 40.603 40.604">
                        <g transform="translate(0 0)">
                           <path
                              d="M33.47,353.747a.6.6,0,0,0-.595.595v9.775a.992.992,0,0,1-.991.991H2.184a.992.992,0,0,1-.991-.991v-7.935a.595.595,0,1,0-1.19,0v7.935A2.183,2.183,0,0,0,2.184,366.3h29.7a2.183,2.183,0,0,0,2.181-2.181v-9.775A.6.6,0,0,0,33.47,353.747Z"
                              transform="translate(-0.003 -325.694)" fill="#28356B" />
                           <path d="M66.156,433.576a.595.595,0,1,0,0-1.19H54.816a.595.595,0,1,0,0,1.19Z"
                              transform="translate(-49.921 -398.097)" fill="#28356B" />
                           <path d="M236.331,433.576a.595.595,0,1,0,0-1.19h-1.8a.595.595,0,1,0,0,1.19Z"
                              transform="translate(-215.386 -398.097)" fill="#28356B" />
                           <path d="M288.17,433.576a.595.595,0,1,0,0-1.19h-1.8a.595.595,0,1,0,0,1.19Z"
                              transform="translate(-263.114 -398.097)" fill="#28356B" />
                           <path d="M340.011,433.576a.595.595,0,1,0,0-1.19h-1.8a.595.595,0,0,0,0,1.19Z"
                              transform="translate(-310.844 -398.097)" fill="#28356B" />
                           <path
                              d="M290.864,196.963a.6.6,0,0,0-.812-.218l-.492.284v-.568a.595.595,0,0,0-1.19,0v.568l-.492-.284a.595.595,0,0,0-.595,1.03l.492.284-.492.284a.595.595,0,1,0,.595,1.03l.492-.284v.568a.595.595,0,0,0,1.19,0v-.568l.492.284a.595.595,0,1,0,.595-1.03l-.492-.284.492-.284A.6.6,0,0,0,290.864,196.963Z"
                              transform="translate(-264.227 -180.334)" fill="#28356B" />
                           <path
                              d="M351.244,196.963a.6.6,0,0,0-.812-.218l-.492.284v-.568a.595.595,0,0,0-1.19,0v.568l-.492-.284a.595.595,0,1,0-.595,1.03l.492.284-.492.284a.595.595,0,1,0,.595,1.03l.492-.284v.568a.595.595,0,0,0,1.19,0v-.568l.492.284a.595.595,0,0,0,.595-1.03l-.492-.284.492-.284A.6.6,0,0,0,351.244,196.963Z"
                              transform="translate(-319.819 -180.334)" fill="#28356B" />
                           <path
                              d="M410.32,196.462a.595.595,0,0,0-1.19,0v.568l-.492-.284a.595.595,0,0,0-.595,1.03l.492.284-.492.284a.595.595,0,1,0,.595,1.03l.492-.284v.568a.595.595,0,1,0,1.19,0v-.568l.492.284a.595.595,0,1,0,.595-1.03l-.492-.284.492-.284a.595.595,0,1,0-.595-1.03l-.492.284Z"
                              transform="translate(-375.411 -180.334)" fill="#28356B" />
                           <path
                              d="M40.011,3.005H35.4a5.768,5.768,0,0,1-4-1.6h0L30.213.275a.99.99,0,0,0-1.369,0L27.67,1.4a5.767,5.767,0,0,1-4,1.607H19.057a.6.6,0,0,0-.595.595V15.592a10.728,10.728,0,0,0,1.165,4.855H1.193V18.874a.992.992,0,0,1,.991-.991H16.527a.595.595,0,0,0,0-1.19H2.184A2.183,2.183,0,0,0,0,18.874v8.646a.595.595,0,0,0,1.19,0V25.39H24.644l4.368,2.746a1,1,0,0,0,1.056,0l5.538-3.485a10.7,10.7,0,0,0,5-9.055V3.6a.6.6,0,0,0-.595-.595ZM1.193,21.636H20.334A10.742,10.742,0,0,0,22.811,24.2H1.193V21.636ZM39.417,15.6a9.459,9.459,0,0,1-4.445,8.049L29.54,27.063,24.1,23.643a9.459,9.459,0,0,1-4.448-8.051V4.2h4.014a6.951,6.951,0,0,0,4.826-1.937l1.037-.992,1.049,1h0A6.952,6.952,0,0,0,35.4,4.195h4.021V15.6Z"
                              transform="translate(-0.003 0)" fill="#28356B" />
                           <path
                              d="M349.634,64.249a.771.771,0,0,1-.77-.77.595.595,0,1,0-1.19,0,1.963,1.963,0,0,0,1.365,1.867v.722a.595.595,0,1,0,1.19,0v-.722a1.96,1.96,0,0,0-.595-3.827l-.043,0a.77.77,0,1,1,.814-.769.595.595,0,0,0,1.19,0,1.963,1.963,0,0,0-1.365-1.867v-.722a.595.595,0,0,0-1.19,0v.722a1.96,1.96,0,0,0,.595,3.827l.043,0a.77.77,0,0,1-.043,1.54Z"
                              transform="translate(-320.103 -53.002)" fill="#28356B" />
                        </g>
                     </svg>
                  </div>
                  <div style="font-size:17px; font-weight:700; color:#221E19; margin-bottom:6px;">Secure Payment</div>
                  <div class="irc-underline"
                     style="width:18px; height:3px; background:#33447A; border-radius:2px; margin:0 auto 10px;"></div>
                  <p style="font-size:13.5px; color:#8A8477; margin:0;">100% secure guarantee</p>
               </div>
            </div>

            <!-- Card 4: Support -->
            <div class="col-lg-3 col-md-6 col-6">
               <div class="irc-card h-100"
                  style="background:#FFFFFF; border:1px solid #ECE6D8; border-top:3px solid #7A2E3A; border-radius:14px; padding:34px 22px; text-align:center;">
                  <div class="irc-icon-circle"
                     style="width:76px; height:76px; margin:0 auto 20px; border-radius:50%; background:#F3DEE1; display:flex; align-items:center; justify-content:center;">
                     <svg xmlns="http://www.w3.org/2000/svg" width="26" height="31" viewBox="0 0 33.672 40.472">
                        <g transform="translate(-43.008)">
                           <g transform="translate(57.528 6.231)">
                              <g>
                                 <path
                                    d="M242.332,79.14a.794.794,0,0,0-1.255.971,15.1,15.1,0,0,1,3.183,9.326v2.327a2.338,2.338,0,0,0-.761-.127h-2.189a1.943,1.943,0,0,0-1.871-1.426h-2.175a1.942,1.942,0,0,0-1.939,1.939v10.408a1.942,1.942,0,0,0,1.939,1.94h2.175a1.947,1.947,0,0,0,.3-.024,6.063,6.063,0,0,1-6.005,5.285h-.419a2.146,2.146,0,0,0-2.1-1.726h-2.378a2.145,2.145,0,0,0-2.143,2.143v.754a2.145,2.145,0,0,0,2.143,2.143h2.378a2.146,2.146,0,0,0,2.1-1.726h.419a7.651,7.651,0,0,0,7.643-7.642.789.789,0,0,0-.134-.441,1.925,1.925,0,0,0,.064-.193H243.5a2.35,2.35,0,0,0,2.348-2.347V89.437A16.675,16.675,0,0,0,242.332,79.14Zm-10.561,31.79h0a.556.556,0,0,1-.555.555h-2.378a.556.556,0,0,1-.555-.555v-.754a.556.556,0,0,1,.555-.555h2.378a.556.556,0,0,1,.555.555Zm8.021-18.5v10.127a.353.353,0,0,1-.353.353h-2.175a.353.353,0,0,1-.352-.353V92.15a.353.353,0,0,1,.352-.352h2.175a.353.353,0,0,1,.353.352Zm4.468,1.989v6.3a.762.762,0,0,1-.761.76h-2.12v-8.26h2.12a.762.762,0,0,1,.761.761Z"
                                    transform="translate(-226.694 -78.832)" fill="#621F29" />
                              </g>
                           </g>
                           <g transform="translate(43.008)">
                              <g transform="translate(0)">
                                 <path
                                    d="M69.648,3.148a16.837,16.837,0,0,0-26.64,13.689V28.123a2.35,2.35,0,0,0,2.348,2.347h2.189A1.943,1.943,0,0,0,49.416,31.9h2.175a1.942,1.942,0,0,0,1.939-1.94V19.549a1.942,1.942,0,0,0-1.939-1.939H49.416a1.943,1.943,0,0,0-1.871,1.426H45.356a2.338,2.338,0,0,0-.761.127V16.836a15.251,15.251,0,0,1,24.128-12.4.794.794,0,1,0,.925-1.289ZM49.063,29.677V19.549a.353.353,0,0,1,.353-.352h2.175a.353.353,0,0,1,.352.352V29.957a.353.353,0,0,1-.352.353H49.416a.353.353,0,0,1-.353-.353Zm-3.707-9.054h2.12v8.26h-2.12a.762.762,0,0,1-.761-.76V21.384A.762.762,0,0,1,45.356,20.623Z"
                                    transform="translate(-43.008 0)" fill="#621F29" />
                              </g>
                           </g>
                           <g transform="translate(70.161 4.444)">
                              <g transform="translate(0)">
                                 <path d="M387.284,56.22a.794.794,0,0,0,0,1.587A.794.794,0,0,0,387.284,56.22Z"
                                    transform="translate(-386.517 -56.22)" fill="#621F29" />
                              </g>
                           </g>
                        </g>
                     </svg>
                  </div>
                  <div style="font-size:17px; font-weight:700; color:#221E19; margin-bottom:6px;">Special Support</div>
                  <div class="irc-underline"
                     style="width:18px; height:3px; background:#7A2E3A; border-radius:2px; margin:0 auto 10px;"></div>
                  <p style="font-size:13.5px; color:#8A8477; margin:0;">24/7 dedicated support</p>
               </div>
            </div>

         </div>
      </div>
   </div>
   <!-- features area end -->


   <!-- speciality area start -->
   <section class="py-5" style="background:#fcfaf8;">
      <div class="container">

         <div class="row align-items-center g-5">

            <!-- Left Content -->
            <div class="col-lg-6">

               <span class="badge rounded-pill px-3 py-2 mb-3" style="background:#F5E6DA;color:#8B5E3C;font-size:14px;">
                  Why Choose Jaipur Heritage
               </span>

               <h2 class="fw-bold mb-4" style="font-size:2.7rem;line-height:1.2;color:#2d2d2d;">
                  Timeless Ethnic Fashion Crafted for the Modern Woman
               </h2>

               <p class="text-muted mb-5" style="font-size:17px;line-height:1.8;">
                  At Jaipur Heritage, we blend the rich traditions of Jaipur with contemporary
                  fashion to create elegant Women's Kurti and Women's Kurta collections.
                  Every outfit is thoughtfully designed to deliver exceptional comfort,
                  premium quality, and timeless style for every occasion.
               </p>

               <!-- Feature Card -->
               <div class="d-flex mb-4 p-4 rounded-4 shadow-sm border bg-white">

                  <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle me-4"
                     style="width:70px;height:70px;background:#8B5E3C;color:#fff;font-size:30px;">
                     <i class="fal fa-palette"></i>
                  </div>

                  <div>
                     <h5 class="fw-bold mb-2">Authentic Jaipur Craftsmanship</h5>
                     <p class="mb-0 text-muted" style="line-height:1.8;">
                        Inspired by Jaipur's rich textile heritage, every design beautifully
                        combines traditional artistry with contemporary elegance.
                     </p>
                  </div>

               </div>

               <!-- Feature Card -->
               <div class="d-flex mb-4 p-4 rounded-4 shadow-sm border bg-white">

                  <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle me-4"
                     style="width:70px;height:70px;background:#8B5E3C;color:#fff;font-size:30px;">
                     <i class="fal fa-tshirt"></i>
                  </div>

                  <div>
                     <h5 class="fw-bold mb-2">Premium Fabrics & Comfort</h5>
                     <p class="mb-0 text-muted" style="line-height:1.8;">
                        Carefully selected breathable fabrics ensure all-day comfort,
                        making every outfit perfect for work, casual wear, and celebrations.
                     </p>
                  </div>

               </div>

               <!-- Feature Card -->
               <div class="d-flex p-4 rounded-4 shadow-sm border bg-white">

                  <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle me-4"
                     style="width:70px;height:70px;background:#8B5E3C;color:#fff;font-size:30px;">
                     <i class="fal fa-gem"></i>
                  </div>

                  <div>
                     <h5 class="fw-bold mb-2">Elegant & Versatile Styles</h5>
                     <p class="mb-0 text-muted" style="line-height:1.8;">
                        From everyday office wear to festive occasions, our timeless
                        collections help you look confident, graceful, and effortlessly stylish.
                     </p>
                  </div>

               </div>

            </div>

            <!-- Right Image -->
            <div class="col-lg-6">

               <div class="position-relative">

                  <img src="assets/img/about/speciality-thumb.jpg" alt="Jaipur Heritage"
                     class="img-fluid rounded-4 shadow-lg w-100" style="object-fit:cover;min-height:650px;">

                  <!-- Floating Experience Card -->
                  <div class="position-absolute bg-white shadow-lg rounded-4 p-4"
                     style="bottom:30px;left:30px;max-width:280px;">

                     <div class="d-flex align-items-center">

                        <div class="me-3 d-flex align-items-center justify-content-center rounded-circle"
                           style="width:65px;height:65px;background:#8B5E3C;color:#fff;font-size:28px;">
                           <i class="fal fa-award"></i>
                        </div>

                        <div>
                           <h4 class="fw-bold mb-0">Premium</h4>
                           <small class="text-muted">
                              Ethnic Wear Collection
                           </small>
                        </div>

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </div>
   </section>
   <!-- speciality area end -->

   <!-- testimonial area start -->
   @if($testimonials->count())
      <section class="py-5" style="background:#f8f9fa;">
         <div class="container">

            <div class="text-center mb-5">
               <span class="badge rounded-pill px-3 py-2 mb-3" style="background:#F5E6DA;color:#8B5E3C;font-size:14px;">
                  Customer Reviews
               </span>

               <h2 class="fw-bold mb-3" style="font-size:2.8rem;">
                  Loved by Women Across India
               </h2>

               <p class="text-muted mx-auto" style="max-width:650px;font-size:17px;">
                  See what our happy customers say about the quality,
                  comfort, and elegance of Jaipur Heritage collections.
               </p>

               <div class="d-inline-flex align-items-center mt-3 px-4 py-2 rounded-pill bg-white shadow-sm">

                  <img src="https://www.gstatic.com/images/branding/product/2x/googleg_48dp.png" width="24" class="me-2">

                  <strong class="me-2">Google Reviews</strong>

                  <span class="text-warning">

                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>

                  </span>

                  <span class="ms-2 fw-bold">
                     4.9/5
                  </span>

               </div>

            </div>


            <div class="swiper testimonial-active overflow-hidden">

               <div class="swiper-wrapper">

                  @foreach($testimonials as $testimonial)

                     <div class="swiper-slide">

                        <div class="card border-0 rounded-4 shadow-sm h-100" style="padding:30px;">

                           <!-- Header -->

                           <div class="d-flex align-items-center mb-4">

                              @if($testimonial->image)

                                 <img src="{{ Storage::url($testimonial->image) }}" class="rounded-circle shadow" width="65"
                                    height="65" style="object-fit:cover;">

                              @else

                                 <img src="{{ asset('assets/img/testimonial/default-author.jpg') }}" class="rounded-circle shadow"
                                    width="65" height="65">

                              @endif

                              <div class="ms-3">

                                 <h5 class="mb-1 fw-bold">
                                    {{ $testimonial->name }}
                                 </h5>

                                 <small class="text-success">
                                    <i class="fas fa-check-circle"></i>
                                    Verified Customer
                                 </small>

                              </div>

                           </div>

                           <!-- Stars -->

                           <div class="mb-3 text-warning">

                              @for($i = 1; $i <= 5; $i++)

                                 @if($i <= $testimonial->rating)

                                    <i class="fas fa-star"></i>

                                 @else

                                    <i class="far fa-star"></i>

                                 @endif

                              @endfor

                           </div>

                           <!-- Review -->

                           <p class="text-muted mb-4" style="line-height:1.9;">

                              "{{ $testimonial->review }}"

                           </p>

                           <!-- Footer -->

                           <div class="mt-auto d-flex justify-content-between align-items-center">

                              <small class="text-muted">

                                 {{ $testimonial->designation }}

                                 @if($testimonial->company)

                                    • {{ $testimonial->company }}

                                 @endif

                              </small>

                              <img src="https://www.gstatic.com/images/branding/product/2x/googleg_48dp.png" width="20">

                           </div>

                        </div>

                     </div>

                  @endforeach

               </div>

               <div class="testimonial-pagination mt-5 text-center"></div>

            </div>

         </div>
      </section>
   @endif
   <!-- testimonial area end -->





@endsection