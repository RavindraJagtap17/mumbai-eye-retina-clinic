<?php
/**
 * head.php — renders <head>. Expects $page (current page data) in scope.
 */
$custom = get_custom_code();
$canonical_path = $page['canonical'] ?? ($_SERVER['REQUEST_URI'] ?? '/');
$noindex = !empty($page['noindex']);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google Tag Manager (preserved from original site) -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?= htmlspecialchars(site('gtm_id')) ?>');</script>
<!-- End Google Tag Manager -->

<title><?= htmlspecialchars($page['title'] ?? site('name')) ?></title>
<meta name="description" content="<?= htmlspecialchars($page['desc'] ?? '') ?>">
<?php if ($noindex): ?>
<meta name="robots" content="noindex, nofollow">
<?php else: ?>
<meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<?php endif; ?>
<link rel="canonical" href="https://mumbaieyeretinaclinic.com<?= htmlspecialchars($canonical_path) ?>">

<!-- Open Graph -->
<meta property="og:locale" content="en_US">
<meta property="og:type" content="article">
<meta property="og:site_name" content="Retina Specialist in Mumbai">
<meta property="og:title" content="<?= htmlspecialchars($page['title'] ?? site('name')) ?>">
<meta property="og:description" content="<?= htmlspecialchars($page['desc'] ?? '') ?>">
<meta property="og:url" content="https://mumbaieyeretinaclinic.com<?= htmlspecialchars($canonical_path) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@madhusudan_3">
<meta name="twitter:creator" content="@madhusudan_3">

<!-- Schema.org structured data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "MedicalClinic",
  "name": "Mumbai Eye Retina Clinic",
  "image": "https://mumbaieyeretinaclinic.com/assets/img/logo.png",
  "url": "https://mumbaieyeretinaclinic.com<?= htmlspecialchars($canonical_path) ?>",
  "telephone": "<?= htmlspecialchars(site('phone_intl')) ?>",
  "email": "<?= htmlspecialchars(site('email')) ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Signature Business Park, 506, 5th Floor, Postal Colony Rd, near Fine Arts, opp. Golden Lawn Hotel, Chembur",
    "addressLocality": "Mumbai",
    "addressRegion": "Maharashtra",
    "postalCode": "400071",
    "addressCountry": "IN"
  },
  "medicalSpecialty": "Ophthalmologic",
  "physician": {
    "@type": "Physician",
    "name": "Dr. Madhusudan Davda",
    "medicalSpecialty": "Ophthalmologic"
  },
  "openingHours": "Mo-Sa 09:00-13:00,17:00-20:00"
}
</script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Spectral:wght@400;500;600;700&family=Mulish:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?>">

<!-- ===== Custom header code (managed from Admin panel) ===== -->
<?= $custom['header'] ?>
<!-- ===== End custom header code ===== -->
</head>
