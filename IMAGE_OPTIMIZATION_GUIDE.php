<?php
/**
 * IMAGE OPTIMIZATION EXAMPLES
 * These are code examples for further image optimization
 * Implement these to get even better performance
 */

// Example 1: Using the lazy loading helper from functions.php
// In your views, use it like this:
?>

<!-- BEFORE (Regular image) -->
<img src="views/assets/img/slider/slider-3-bg-1.svg" alt="Slider Background">

<!-- AFTER (Optimized with lazy loading) -->
<?php echo optimizedImage('views/assets/img/slider/slider-3-bg-1.svg', 'Slider Background', 'your-css-class'); ?>


<!-- Example 2: Advanced lazy loading with picture element for WebP support -->
<picture>
    <source srcset="views/assets/img/feature/feature-image.webp" type="image/webp" loading="lazy">
    <img src="views/assets/img/feature/feature-image.png" alt="Feature Description" class="img-fluid" loading="lazy">
</picture>


<!-- Example 3: Responsive images with srcset (different sizes for different devices) -->
<img src="views/assets/img/feature/feature-medium.png" srcset="views/assets/img/feature/feature-small.png 640w,
             views/assets/img/feature/feature-medium.png 1024w,
             views/assets/img/feature/feature-large.png 1920w" alt="Responsive Image" sizes="(max-width: 640px) 100vw, 
            (max-width: 1024px) 80vw, 
            70vw" loading="lazy">


<!-- Example 4: Background image optimization with CSS -->
<style>
    /* Use CSS for background images with performance in mind */
    .hero-section {
        background-image: url('views/assets/img/hero-small.webp');
        background-size: cover;
        background-position: center;
    }

    @media (min-width: 768px) {
        .hero-section {
            background-image: url('views/assets/img/hero-medium.webp');
        }
    }

    @media (min-width: 1024px) {
        .hero-section {
            background-image: url('views/assets/img/hero-large.webp');
        }
    }
</style>


<?php
/**
 * SERVER-SIDE OPTIMIZATION
 * Add these functions to functions.php for image optimization
 */

/**
 * Generate WebP version if it exists, fallback to original
 */
function getOptimizedImagePath($imagePath)
{
    $webpPath = str_replace(['.jpg', '.png', '.jpeg'], '.webp', $imagePath);

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $webpPath)) {
        return $webpPath;
    }

    return $imagePath;
}

/**
 * Create responsive image with srcset
 */
function responsiveImage($basePath, $alt = '', $sizes = '', $classes = '')
{
    $sizes = $sizes ?: '(max-width: 640px) 100vw, (max-width: 1024px) 80vw, 70vw';

    return sprintf(
        '<img src="%s" srcset="%s" sizes="%s" alt="%s" class="%s" loading="lazy">',
        htmlspecialchars($basePath),
        htmlspecialchars($basePath . ' 1x, ' . str_replace('.', '-2x.', $basePath) . ' 2x'),
        htmlspecialchars($sizes),
        htmlspecialchars($alt),
        htmlspecialchars($classes)
    );
}

/**
 * Create picture element with WebP support
 */
function pictureElement($webpPath, $fallbackPath, $alt = '', $classes = '')
{
    return sprintf(
        '<picture>
            <source srcset="%s" type="image/webp" loading="lazy">
            <img src="%s" alt="%s" class="%s" loading="lazy">
        </picture>',
        htmlspecialchars($webpPath),
        htmlspecialchars($fallbackPath),
        htmlspecialchars($alt),
        htmlspecialchars($classes)
    );
}

// Usage examples:
// $webpPath = pictureElement('image.webp', 'image.jpg', 'Alt text', 'img-class');
// $responsive = responsiveImage('image.jpg', 'Alt text');

?>


<!-- OPTIONAL: Add lazyload library for better compatibility -->
<script src="https://cdn.jsdelivr.net/npm/lazysizes@5.3.2/lazysizes.min.js" defer></script>

<!-- Then use native lazy loading + library fallback -->
<img src="placeholder.jpg" data-src="actual-image.jpg" alt="Description" class="lazyload" loading="lazy">


<!-- TOOLS FOR IMAGE OPTIMIZATION: -->

<!-- TinyPNG (Web): https://tinypng.com/ -->
<!-- ImageOptim (Mac): https://imageoptim.com/ -->
<!-- PNGQuant: https://pngquant.org/ -->
<!-- WebP Conversion: https://cloudconvert.com/ -->
<!-- Squoosh (Google): https://squoosh.app/ -->


<?php
/**
 * PERFORMANCE MONITORING
 * Add to your footer or monitoring page
 */

// Display performance metrics
if (defined('SHOW_METRICS') && SHOW_METRICS) {
    $metrics = [
        'pageLoadTime' => round((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000, 2),
        'memoryUsage' => round(memory_get_usage() / 1024 / 1024, 2),
        'peakMemory' => round(memory_get_peak_usage() / 1024 / 1024, 2),
    ];

    echo '<!-- Performance Metrics: ' . json_encode($metrics) . ' -->';
}
?>