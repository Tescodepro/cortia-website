<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

require "PHPMailer/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

/**
 * Generate SEO Meta Tags based on page
 */
function getSEOMetaTags($page = 'home')
{
    $metaTags = [
        'home' => [
            'title' => 'Cortia Technologies - Innovative Tech Solutions',
            'description' => 'Cortia Technologies offers innovative solutions including web development, software development, mobile apps, and IT consulting. Empowering businesses through technology.',
            'keywords' => 'Cortia Technologies, Tech Solutions, IT Services, Software Development, Web Development, Mobile App Development, Cloud Solutions'
        ],
        'about' => [
            'title' => 'About Cortia Technologies - Our Mission & Team',
            'description' => 'Learn about Cortia Technologies\' mission, vision, and team of expert developers and consultants dedicated to delivering innovative solutions.',
            'keywords' => 'About Cortia, Technology Company, IT Professionals, Tech Team, Digital Solutions'
        ],
        'services' => [
            'title' => 'Our Services - Web, Mobile & Software Development',
            'description' => 'Explore our comprehensive tech services: web development, mobile app development, software solutions, UI/UX design, and cloud services.',
            'keywords' => 'Web Development, Mobile Development, Software Development, UI/UX Design, Cloud Services, Consulting'
        ],
        'contact' => [
            'title' => 'Contact Cortia Technologies - Get In Touch',
            'description' => 'Contact Cortia Technologies for your tech project needs. Reach out to discuss your requirements and get a free consultation.',
            'keywords' => 'Contact Us, Tech Support, Business Inquiry, Consultation'
        ]
    ];

    return $metaTags[$page] ?? $metaTags['home'];
}

/**
 * Generate canonical URL
 */
function getCanonicalUrl($page = '/')
{
    $baseUrl = 'https://cortia.com.ng';
    return $baseUrl . $page;
}

/**
 * Optimize image with lazy loading and webp support
 */
function optimizedImage($src, $alt = '', $classes = '')
{
    return sprintf(
        '<img src="data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 3 2\'%3E%3C/svg%3E" data-src="%s" alt="%s" class="%s" loading="lazy">',
        htmlspecialchars($src),
        htmlspecialchars($alt),
        htmlspecialchars($classes)
    );
}

function mailingMethod($email, $name, $subject, $msg)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = $_ENV['SMTPAuth'];
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
        $mail->Port = $_ENV['MAIL_PORT'];

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('cortiatechnology@gmail.com', $name);
        $mail->addReplyTo($email, $name);
        $mail->addCC('tesleemolamilekan902@gmail.com');
        // $mail->addBCC('bcc@example.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $msg;

        // Attempt to send the email
        if ($mail->send()) {
            return 1;
        } else {
            return 0;
        }
    } catch (Exception $e) {
        return "Mailer Error: {$mail->ErrorInfo}";
    }
}


