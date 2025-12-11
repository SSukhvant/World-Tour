<?php
// Generate Static XML Sitemap and save as sitemap-static.xml
// Run this manually or set as a cron job daily

header('Content-Type: application/xml; charset=UTF-8');

include("admin/include/connectDB.php");
$con = connectDB();

$baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Homepage
$xml .= "  <url>\n";
$xml .= "    <loc>$baseUrl/</loc>\n";
$xml .= "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
$xml .= "    <changefreq>weekly</changefreq>\n";
$xml .= "    <priority>1.0</priority>\n";
$xml .= "  </url>\n";

// Static pages
$staticPages = [
    'packages' => ['changefreq' => 'weekly', 'priority' => 0.9],
    'blog' => ['changefreq' => 'weekly', 'priority' => 0.9],
    'about' => ['changefreq' => 'monthly', 'priority' => 0.8],
    'contact' => ['changefreq' => 'monthly', 'priority' => 0.8],
    'faq' => ['changefreq' => 'monthly', 'priority' => 0.7]
];

foreach ($staticPages as $page => $config) {
    $xml .= "  <url>\n";
    $xml .= "    <loc>$baseUrl/$page</loc>\n";
    $xml .= "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    $xml .= "    <changefreq>" . $config['changefreq'] . "</changefreq>\n";
    $xml .= "    <priority>" . $config['priority'] . "</priority>\n";
    $xml .= "  </url>\n";
}

// Dynamic Package Pages
$packages = mysqli_query($con, "SELECT id FROM packages ORDER BY id DESC");
while ($package = mysqli_fetch_assoc($packages)) {
    $xml .= "  <url>\n";
    $xml .= "    <loc>$baseUrl/packages-view/" . $package['id'] . "</loc>\n";
    $xml .= "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    $xml .= "    <changefreq>monthly</changefreq>\n";
    $xml .= "    <priority>0.8</priority>\n";
    $xml .= "  </url>\n";
}

// Dynamic Blog Pages
$blogs = mysqli_query($con, "SELECT slug, created_at FROM blog WHERE status='Published' ORDER BY id DESC");
while ($blog = mysqli_fetch_assoc($blogs)) {
    $lastmod = $blog['created_at'] ?? date('Y-m-d');
    $xml .= "  <url>\n";
    $xml .= "    <loc>$baseUrl/blog-view/" . htmlspecialchars($blog['slug']) . "</loc>\n";
    $xml .= "    <lastmod>" . date('Y-m-d', strtotime($lastmod)) . "</lastmod>\n";
    $xml .= "    <changefreq>monthly</changefreq>\n";
    $xml .= "    <priority>0.7</priority>\n";
    $xml .= "  </url>\n";
}

$xml .= '</urlset>';

// Option: Save to file instead of outputting
file_put_contents(__DIR__ . '/sitemap-static.xml', $xml);

echo $xml;
mysqli_close($con);
?>
