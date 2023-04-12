<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://shaqeeb.com
 * @since      1.0.0
 *
 * @package    Wsdm_Post_Mailer
 * @subpackage Wsdm_Post_Mailer/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php

$headers = array(
    'From:  example@mydomainname.com',
    'Content-Type: text/html'
);
$admin_email = get_option('admin_email');
$to = "shaqeebakhtar01@gmail.com";
$subject = 'All Posts Published Today';

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'date_query' => array(
        array(
            'after' => '1 day ago',
            'inclusive' => true,
        ),
    ),
);
$query = new WP_Query($args);

$message = 'The following posts have been published in the last day:' . "\n";
while ($query->have_posts()) {
    $query->the_post();
    $message .= '----------' . "\n";
    $message .= 'Title: ' . get_the_title() . "\n";
    $message .= 'URL: ' . get_permalink() . "\n";
    $message .= 'Meta Title: ' . get_post_meta(get_the_ID(), '_yoast_wpseo_title', true) . "\n";
    $message .= 'Meta Description: ' . get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true) . "\n";
    $message .= 'Meta Keywords: ' . get_post_meta(get_the_ID(), '_yoast_wpseo_focuskw', true) . "\n";
}

echo "<pre>" . $message . "</pre>";

// send email
$sent = wp_mail($to, $subject, $message, $headers);

if ($sent) {
    echo $sent;
}