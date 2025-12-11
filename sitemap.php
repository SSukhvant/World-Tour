<?php
header('Content-Type: application/xml; charset=UTF-8');

include("admin/include/connectDB.php");
$con = connectDB();

$baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// Homepage
echo "  <url>\n";
echo "    <loc>$baseUrl/</loc>\n";
echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
echo "    <changefreq>weekly</changefreq>\n";
echo "    <priority>1.0</priority>\n";
echo "  </url>\n";

// Static pages
$staticPages = ['packages', 'blog', 'about', 'contact', 'faq'];
foreach ($staticPages as $page) {
    echo "  <url>\n";
    echo "    <loc>$baseUrl/$page</loc>\n";
    echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    echo "    <changefreq>weekly</changefreq>\n";
    echo "    <priority>0.8</priority>\n";
    echo "  </url>\n";
}

// Dynamic Package Pages
$packages = mysqli_query($con, "SELECT id FROM packages ORDER BY id DESC");
while ($package = mysqli_fetch_assoc($packages)) {
    echo "  <url>\n";
    echo "    <loc>$baseUrl/packages-view/" . $package['id'] . "</loc>\n";
    echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.7</priority>\n";
    echo "  </url>\n";
}

// Dynamic Blog Pages
$blogs = mysqli_query($con, "SELECT slug, created_at FROM blog WHERE status='Published' ORDER BY id DESC");
while ($blog = mysqli_fetch_assoc($blogs)) {
    $lastmod = $blog['created_at'] ?? date('Y-m-d');
    echo "  <url>\n";
    echo "    <loc>$baseUrl/blog-view/" . htmlspecialchars($blog['slug']) . "</loc>\n";
    echo "    <lastmod>" . date('Y-m-d', strtotime($lastmod)) . "</lastmod>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.7</priority>\n";
    echo "  </url>\n";
}

echo '</urlset>';
mysqli_close($con);
?>
