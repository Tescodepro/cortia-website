<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <?php
    // Get page SEO data
    $pageMap = [
        'Home' => 'home',
        'About' => 'about',
        'Services' => 'services',
        'Contact' => 'contact'
    ];
    $pageName = $pageMap[$name] ?? 'home';
    $seoData = getSEOMetaTags($pageName);

    // Generate canonical URL
    $canonicalUrl = getCanonicalUrl($pageName === 'home' ? '/' : '/' . $pageName);
    ?>

    <title><?php echo htmlspecialchars($seoData['title']); ?></title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo htmlspecialchars($seoData['description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($seoData['keywords']); ?>">
    <meta name="author" content="Cortia Technologies">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <meta http-equiv="content-language" content="en">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">

    <!-- Open Graph (Facebook, LinkedIn) -->
    <meta property="og:title" content="<?php echo htmlspecialchars($seoData['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($seoData['description']); ?>">
    <meta property="og:image" content="https://cortia.com.ng/views/assets/img/logo/og-image.png">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl); ?>">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($seoData['title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($seoData['description']); ?>">
    <meta name="twitter:image" content="https://cortia.com.ng/views/assets/img/logo/og-image.png">

    <!-- Robots Meta Tag -->
    <meta name="robots" content="index, follow">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="views/assets/img/logo/favicon.png">

    <!-- CSS here (preload critical CSS) -->
    <link rel="preload" href="views/assets/css/bootstrap.css" as="style">
    <link rel="preload" href="views/assets/css/main.css" as="style">
    <link rel="stylesheet" href="views/assets/css/bootstrap.css">
    <link rel="stylesheet" href="views/assets/css/animate.css">
    <link rel="stylesheet" href="views/assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="views/assets/css/slick.css">
    <link rel="stylesheet" href="views/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="views/assets/css/font-awesome-pro.css">
    <link rel="stylesheet" href="views/assets/css/flaticon.css">
    <link rel="stylesheet" href="views/assets/css/spacing.css">
    <link rel="stylesheet" href="views/assets/css/main.css">

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Cortia Technologies",
        "url": "https://cortia.com.ng",
        "logo": "https://cortia.com.ng/views/assets/img/logo/logo.png",
        "description": "Cortia Technologies offers innovative tech solutions including <?php echo $name; ?>.",
        "sameAs": [
            "https://www.facebook.com/cortiatechnologies",
            "https://twitter.com/cortiatech",
            "https://www.linkedin.com/company/cortiatechnologies"
        ]
    }
    </script>

    <!-- Additional Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Cortia Technologies",
        "url": "https://cortia.com.ng",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://cortia.com.ng/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <!-- Sitemap Link -->
    <link rel="sitemap" type="application/xml" title="Sitemap" href="https://cortia.com.ng/sitemap.xml">

    <!-- Performance: DNS Prefetch and Preconnect -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>