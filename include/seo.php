<?php
/**
 * SEO Meta Tags and Schema Markup Generator
 * Use this file to generate consistent SEO meta tags across all pages
 */

/**
 * Generate SEO Meta Tags
 * @param array $data - Contains: title, description, keywords, url, image, type
 */
function generateSEOMeta($data = []) {
    $defaults = [
        'title' => 'WorldTour4u - Your Trusted Travel & Tour Operator',
        'description' => 'Explore amazing travel packages, book tours, and create unforgettable travel experiences with WorldTour4u.',
        'keywords' => 'travel packages, tour operator, vacation, holidays, travel agency',
        'url' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
        'image' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/assets/img/logo.png",
        'type' => 'website',
        'author' => 'WorldTour4u'
    ];
    
    $seo = array_merge($defaults, $data);
    
    // Sanitize output
    $title = htmlspecialchars($seo['title'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($seo['description'], ENT_QUOTES, 'UTF-8');
    $keywords = htmlspecialchars($seo['keywords'], ENT_QUOTES, 'UTF-8');
    $url = htmlspecialchars($seo['url'], ENT_QUOTES, 'UTF-8');
    $image = htmlspecialchars($seo['image'], ENT_QUOTES, 'UTF-8');
    
    $meta = "";
    
    // Basic Meta Tags
    $meta .= "<meta charset=\"UTF-8\">\n";
    $meta .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
    $meta .= "<title>$title</title>\n";
    $meta .= "<meta name=\"description\" content=\"$description\">\n";
    $meta .= "<meta name=\"keywords\" content=\"$keywords\">\n";
    $meta .= "<meta name=\"author\" content=\"{$seo['author']}\">\n";
    $meta .= "<link rel=\"canonical\" href=\"$url\">\n";
    
    // Open Graph Meta Tags (Facebook, LinkedIn)
    $meta .= "<meta property=\"og:title\" content=\"$title\">\n";
    $meta .= "<meta property=\"og:description\" content=\"$description\">\n";
    $meta .= "<meta property=\"og:url\" content=\"$url\">\n";
    $meta .= "<meta property=\"og:image\" content=\"$image\">\n";
    $meta .= "<meta property=\"og:type\" content=\"{$seo['type']}\">\n";
    $meta .= "<meta property=\"og:site_name\" content=\"WorldTour4u\">\n";
    
    // Twitter Card Meta Tags
    $meta .= "<meta name=\"twitter:card\" content=\"summary_large_image\">\n";
    $meta .= "<meta name=\"twitter:title\" content=\"$title\">\n";
    $meta .= "<meta name=\"twitter:description\" content=\"$description\">\n";
    $meta .= "<meta name=\"twitter:image\" content=\"$image\">\n";
    
    // Additional SEO Meta Tags
    $meta .= "<meta name=\"robots\" content=\"index, follow\">\n";
    $meta .= "<meta name=\"language\" content=\"English\">\n";
    $meta .= "<meta name=\"revisit-after\" content=\"7 days\">\n";
    
    return $meta;
}

/**
 * Generate JSON-LD Structured Data
 * @param string $type - Type of schema (LocalBusiness, Product, Article, etc)
 * @param array $data - Schema data
 */
function generateStructuredData($type, $data) {
    $baseSchema = [
        '@context' => 'https://schema.org',
        '@type' => $type
    ];
    
    $schema = array_merge($baseSchema, $data);
    
    echo "<script type=\"application/ld+json\">\n";
    echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}

/**
 * Generate Organization Schema
 */
function generateOrganizationSchema($aboutData) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'TravelAgency',
        'name' => 'WorldTour4u',
        'description' => 'Your Trusted Tour & Travel Operator',
        'url' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]",
        'telephone' => $aboutData['phone'] ?? '+91-XXXXXXXXXX',
        'email' => $aboutData['email'] ?? 'info@worldtour4u.com',
        'address' => [
            '@type' => 'PostalAddress',
            'addressCountry' => 'IN',
            'addressLocality' => 'India',
            'streetAddress' => $aboutData['location'] ?? ''
        ],
        'sameAs' => [
            'https://www.facebook.com/worldtour4u',
            'https://www.instagram.com/worldtour4u',
            'https://www.twitter.com/worldtour4u'
        ]
    ];
    
    echo "<script type=\"application/ld+json\">\n";
    echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}

/**
 * Generate Product Schema for Packages
 */
function generatePackageSchema($package) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $package['title'],
        'description' => substr(strip_tags($package['content']), 0, 160),
        'image' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/admin/image/" . htmlspecialchars($package['image1']),
        'offers' => [
            '@type' => 'Offer',
            'price' => $package['price'],
            'priceCurrency' => 'INR',
            'availability' => 'https://schema.org/InStock'
        ],
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => '4.5',
            'reviewCount' => '100'
        ]
    ];
    
    echo "<script type=\"application/ld+json\">\n";
    echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}

/**
 * Generate Article Schema for Blog Posts
 */
function generateArticleSchema($blog) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $blog['title'],
        'description' => htmlspecialchars($blog['excerpt']),
        'image' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/admin/image/blog/" . htmlspecialchars($blog['featured_image']),
        'datePublished' => $blog['created_at'],
        'dateModified' => $blog['updated_at'] ?? $blog['created_at'],
        'author' => [
            '@type' => 'Organization',
            'name' => 'WorldTour4u'
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'WorldTour4u',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/assets/img/logo.png"
            ]
        ],
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/blog-view/" . htmlspecialchars($blog['slug'])
        ]
    ];
    
    echo "<script type=\"application/ld+json\">\n";
    echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}

/**
 * Generate Breadcrumb Schema
 */
function generateBreadcrumbSchema($breadcrumbs) {
    $items = [];
    $baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    
    foreach ($breadcrumbs as $index => $breadcrumb) {
        $items[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $breadcrumb['name'],
            'item' => $baseUrl . $breadcrumb['url']
        ];
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $items
    ];
    
    echo "<script type=\"application/ld+json\">\n";
    echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}

/**
 * Generate FAQ Schema
 */
function generateFAQSchema($faqs) {
    $faqItems = [];
    
    foreach ($faqs as $faq) {
        $faqItems[] = [
            '@type' => 'Question',
            'name' => $faq['title'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => strip_tags($faq['description'])
            ]
        ];
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $faqItems
    ];
    
    echo "<script type=\"application/ld+json\">\n";
    echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}

/**
 * Generate Local Business Schema
 */
function generateLocalBusinessSchema($about) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => 'WorldTour4u',
        'description' => 'Your Trusted Tour & Travel Operator',
        'url' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]",
        'telephone' => $about['phone'] ?? '+91-XXXXXXXXXX',
        'email' => $about['email'] ?? 'info@worldtour4u.com',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $about['location'] ?? '',
            'addressCountry' => 'IN'
        ],
        'image' => (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/admin/image/" . htmlspecialchars($about['logo']),
        'priceRange' => '₹₹₹',
        'sameAs' => [
            'https://www.facebook.com/worldtour4u',
            'https://www.instagram.com/worldtour4u',
            'https://www.twitter.com/worldtour4u'
        ]
    ];
    
    echo "<script type=\"application/ld+json\">\n";
    echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}

/**
 * Generate Review/Rating Schema for Packages
 */
function generateReviewSchema($reviews) {
    if (empty($reviews)) return;
    
    $reviewItems = [];
    foreach ($reviews as $review) {
        $reviewItems[] = [
            '@type' => 'Review',
            'author' => [
                '@type' => 'Person',
                'name' => $review['author'] ?? 'Anonymous'
            ],
            'reviewRating' => [
                '@type' => 'Rating',
                'ratingValue' => $review['rating'] ?? '5'
            ],
            'reviewBody' => $review['content'] ?? ''
        ];
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'AggregateRating',
        'reviewCount' => count($reviewItems),
        'ratingValue' => '4.5',
        'review' => $reviewItems
    ];
    
    echo "<script type=\"application/ld+json\">\n";
    echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}

/**
 * Generate URL Validation for SEO
 */
function validateSEOUrl($url) {
    // Ensure URL is properly formatted
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    }
    return $url;
}

/**
 * Generate Hreflang Tags for Multi-language (if needed)
 */
function generateHrefLangTags() {
    // Current implementation for English only
    // Can be expanded for multiple languages
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "<link rel=\"alternate\" hreflang=\"en\" href=\"" . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . "\" />\n";
}
?>
