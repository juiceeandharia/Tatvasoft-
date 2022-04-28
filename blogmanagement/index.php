<!doctype html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<?php include('admin/include/cFunction.php'); $cFN=new cFunction(); ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon39d6.png?v=881c770a13">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <title>BLOG</title>
    <link rel="stylesheet" href="assets/css/plugins39d6.css?v=881c770a13">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style39d6.css?v=881c770a13">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive39d6.css?v=881c770a13">
    <meta name="description" content="Thoughts, stories and ideas." />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="canonical" href="index.html" />
    <meta name="referrer" content="no-referrer-when-downgrade" />
    <link rel="next" href="page/2/index.html" />
    
    <meta property="og:site_name" content="GhostX" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="GhostX" />
    <meta property="og:description" content="Thoughts, stories and ideas." />
    <meta property="og:url" content="index.html" />
    <meta property="og:image" content="content/images/2018/02/cover.jpg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="GhostX" />
    <meta name="twitter:description" content="Thoughts, stories and ideas." />
    <meta name="twitter:url" content="index.html" />
    <meta name="twitter:image" content="content/images/2018/02/cover.jpg" />
    <meta property="og:image:width" content="1600" />
    <meta property="og:image:height" content="542" />
    
    <script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "publisher": {
        "@type": "Organization",
        "name": "GhostX",
        "logo": "https://ghostx.themeix.com/content/images/2018/02/logo-1.png"
    },
    "url": "https://ghostx.themeix.com/",
    "image": {
        "@type": "ImageObject",
        "url": "https://ghostx.themeix.com/content/images/2018/02/cover.jpg",
        "width": 1600,
        "height": 542
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://ghostx.themeix.com/"
    },
    "description": "Thoughts, stories and ideas."
}
    </script>

    <meta name="generator" content="Ghost 2.16" />
    <link rel="alternate" type="application/rss+xml" title="GhostX" href="rss/index.html" />
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
</head>
<!-- PRE LOADER -->
<!-- PRE LOADER END -->
<body class="home-template">

   <script>
/*====================================================
  THEME SETTINGS & GLOBAL VARIABLES
====================================================*/

// 01. Site Url
var site_url = 'https://ghostx.themeix.com/';
// 02. Site Content Api Key
var site_content_key  = 'a27e769f0bfa6233d813168f77';

// 03.	Sticky Navbar Settings
var fixed_navbar = true;

// 04.	Instagram Feed Settings
var instagram_feed_image_limit = '9';
var instagram_feed_user_id = 5629972527;
var instagram_feed_user_accessToken = '5629972527.8f4c5bf.c1b363769f2e4b229b92dde548feaca2';
var instagram_feed_user_clientID = 'c56069cddc404e4dbe5e1e2c0c2e39d5';  

// 05.	Facebook Widget Settings
var facebook_page_username = 'themeix';

// 06.	Twitter Widget Settings
var twitter_username = 'themeix';
var twitter_widget_id = '428888163344326656';
var number_of_tweet = 2; 

// 07.	Mailchimp Newsletter Settings
var mailchimp_form_url = 'http://freelancingcare.us3.list-manage.com/subscribe?u=c6622afaf4202d16b891de887&amp;id=6d2e58373b';
var success_message = "Please check your inbox and confirm your email address. Thanks!";

</script>
   
<div class="container-fluid" style=" background:rgba(0, 0, 0, 0) url(https://ghostx.themeix.com/content/images/2018/02/cover.jpg) no-repeat scroll center center / cover; ">
    <div class="row">
            <div class="col-md-12 slider-area mx-auto">
                <div class="slider-text">
                    <h1>BLOG</h1>
                    <p>Thoughts, stories and ideas.</p>
                </div>
            </div>
      </div>
</div>
<!-- End Slider -->    <!-- Start Main Content Area -->
    <div class="main-content-area themeix-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-content">
                      <!-- Post Loop -->
                       <section id="results"></section>
                        
<div class="default-post-format">
    <article class="single-post post tag-getting-started">
       <?php
						$query=$cFN->getAllBlog();
						$result=mysqli_query($cDB,$query);
						
						while($row=mysqli_fetch_array($result))
						{ ?>
        <div class="single-article" style="padding-bottom:80px;">
            <div class="post-image">
               <img src="admin/images/blog/<?php echo $row['image']; ?>" width="600" height="500" alt="<?php echo $row['blog_title']; ?>">
             </div>
            <h2 class="themeix-title"><a href="blog-detail.php?blog_id=<?php echo $row['blog_id']; ?>"><?php echo $row['blog_title']; ?></a></h2>
			
			<b><?php echo date('M d, Y',strtotime($row['date_added'])); ?></b>
			
            <div class="post-text"><br>
               <?php echo $row['blog_description']; ?>
            </div>
            <div class="post-buttons">
                <a href="blog-detail.php?blog_id=<?php echo $row['blog_id']; ?>" class="read-more-btn">Read More</a> <div class="social-share">
   
			</div>
            </div>
        </div>
		<?php } ?>
		
    </article>
</div>
                        
                        <!-- End Pagination -->
                    </div>
                </div>
                <!-- Start Sidebar -->
                 <div class="col-md-4">
				       	<div class="sidebar-wrapper">
	<aside>
	 <!-- Author Info -->
	 
<div class="single-widget">


</div>


	 <!-- Recent Posts -->
	  <div class="single-wiget">
		<h4 class="sidebar-title">recent posts</h4>
		<div class="recent-posts">
		 <?php
						$query=$cFN->getAllBlog();
						$result=mysqli_query($cDB,$query);
						
						while($row=mysqli_fetch_array($result))
						{ ?>
			<div class="single-recent-post">
				<div class="recent-post-img">
					   <a href="blog-detail.php?blog_id=<?php echo $row['blog_id']; ?>"><img src="admin/images/blog/<?php echo $row['image']; ?>" alt="<?php echo $row['blog_title']; ?>"></a>
				</div>
				<div class="recent-post-title">
					<a href="blog-detail.php?blog_id=<?php echo $row['blog_id']; ?>"><?php echo $row['blog_title']; ?></a>
					<div class="post-date"><?php echo date('M d, Y',strtotime($row['date_added'])); ?></div>
				</div>
			</div>
				<?php } ?>
		</div>
	</div>	


 	</aside>
</div>                </div>
                <!-- End Sedebar -->
            </div>
        </div>
    </div>
    <!-- End Main Content Area -->
    <!-- instagrame images -->
   <div class="instagram-slider">
    <div class="container-fluid">
        <div class="row">
            <div id="instafeed" class="owl-carousel instagram-carousel"></div>
        </div>
    </div>
</div>
    
   <!-- Footer -->
  <footer>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-content">
                        <div class="copyright-text">
                            <p> &copy; <?php echo date('Y'); ?> - BLOG Developed by : Juicee Andharia</a></p>
                        </div>
                        <div class="scroll-to-top">
                            <a href="#"> <i class="fa fa-angle-up"></i>  Back to Top </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
       
    <script src="https://ghostx.themeix.com/assets/js/jquery-3.3.1.min.js?v=881c770a13"></script>
    <script src="https://ghostx.themeix.com/assets/js/plugins.js?v=881c770a13"></script>
    <script src="https://unpkg.com/@tryghost/content-api@1.0.0/umd/content-api.min.js"></script>
    <script src="https://ghostx.themeix.com/assets/js/main.js?v=881c770a13"></script>
   <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="0fb3e5b5-1038-45e7-a153-173d144eee90";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"702ec7589a0d6ef2","version":"2021.12.0","r":1,"token":"bbb2e65ab8b84b64a70b8383268d1b5c","si":100}' crossorigin="anonymous"></script>
</body>

</html>

