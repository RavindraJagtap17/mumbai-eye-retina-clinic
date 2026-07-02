<?php
/**
 * config.php — central site configuration
 * Edit clinic details, navigation and tracking IDs here.
 */

// ---- Clinic contact details (single source of truth) ----
$SITE = [
    'name'        => 'Mumbai Eye Retina Clinic',
    'tagline'     => 'Retina Specialist in Mumbai & Navi Mumbai',
    'phone'       => '09819893135',
    'phone_intl'  => '+919819893135',
    'phone_display' => '+91 98198 93135',
    'email'       => 'retinaopinion@gmail.com',
    'hours'       => 'Monday to Saturday · 9:00 am – 1:00 pm & 5:00 pm – 8:00 pm',
    'hours_note'  => '(By Appointments Only)',
    'address'     => 'Signature Business Park, 506, 5th Floor, Postal Colony Rd, near Fine Arts, opp. Golden Lawn Hotel, Chembur, Mumbai, Maharashtra 400071',
    'base_url' => '/mumbai-eye-retina-clinic-fixed', // Production (domain root): ''  |  Localhost: '/mumbai-eye-retina-clinic'
    'gtm_id'      => 'GTM-KZ9PBMQ', // preserved exactly from original site
    'logo'        => 'assets/img/logo.png',
    'social'      => [
        'facebook' => 'https://www.facebook.com/drmadhusudandavda/',
        'twitter'  => 'https://twitter.com/madhusudan_3',
        'linkedin' => 'https://www.linkedin.com/in/dr-madhusudan-davda-42574419',
        'youtube'  => 'https://www.youtube.com/channel/UC7qnu5ZALtLe-s2YHA2TpkQ',
    ],
    'map_embed'   => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1943286.9029578695!2d72.64207618536828!3d17.956287729746432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c8af65555535%3A0xb245088da5c9931a!2sMumbai+Eye+%26+Retina+Clinic!5e0!3m2!1sen!2sin!4v1539431844855',
    'map_link'    => 'https://www.google.com/maps/dir//Mumbai+Eye+%26+Retina+Clinic/@19.0601973,72.8959343,15z',
];

// ---- Primary navigation (URLs preserved exactly from the live site) ----
$NAV = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'About', 'url' => '/retina-clinic/', 'children' => [
        ['label' => 'Dr. Madhusudan Davda', 'url' => '/retina-doctor/retina-specialist-dr-madhusudan-davda/'],
        ['label' => 'Retina Surgery Cost', 'url' => '/retina-surgery-cost/'],
    ]],
    ['label' => 'Services', 'url' => '/retinal-services/', 'children' => [
        ['label' => 'Uveitis Treatment', 'url' => '/retinal-services/uveitis-treatment/'],
        ['label' => 'Retinal Imaging', 'url' => '/retinal-services/retinal-imaging/'],
        ['label' => 'Surgical Retina', 'url' => '/retinal-services/surgical-retina/'],
        ['label' => 'Medical Retina', 'url' => '/retinal-services/medical-retina/'],
        ['label' => 'Retinal Injections', 'url' => '/retinal-services/retinal-injections/'],
        ['label' => 'Retina Laser Treatment', 'url' => '/retinal-services/retina-laser-treatment/'],
    ]],
    ['label' => 'Retinal Diseases', 'url' => '/retinal-diseases/', 'children' => [
        ['label' => 'Age Related Macular Degeneration (ARMD)', 'url' => '/retinal-diseases/age-related-macular-degeneration/'],
        ['label' => 'Diabetic Retinopathy', 'url' => '/retinal-diseases/diabetic-retinopathy-treatment/'],
        ['label' => 'Retinal Detachment', 'url' => '/retinal-diseases/retinal-detachment-treatment/'],
        ['label' => 'Macular Hole', 'url' => '/retinal-diseases/macular-hole-treatment/'],
        ['label' => 'Epiretinal Membrane', 'url' => '/retinal-diseases/macular-pucker/'],
    ]],
    ['label' => 'Gallery', 'url' => '#', 'children' => [
        ['label' => 'Retina Images', 'url' => '/retina-images/'],
        ['label' => 'Retina Videos', 'url' => '/retina-talks-video-series/'],
    ]],
    ['label' => 'FAQs', 'url' => '/retina-faq/'],
    ['label' => 'Blog', 'url' => '/blog/', 'children' => [
        ['label' => 'Video Blogs', 'url' => '/retina-talks-video/'],
    ]],
    ['label' => 'Insurance', 'url' => '/is-retina-surgery-covered-by-health-insurance/'],
    ['label' => 'Contact Us', 'url' => '/contacts/'],
];

// ---- Service options for the enquiry form (preserved from original) ----
$SERVICE_OPTIONS = [
    'Retinal Imaging', 'Uveitis', 'Surgical Retina', 'Retina Laser',
    'Retina Injections', 'Medical Retina', 'Check Up', 'Appointment',
    'Age Related Macular Degeneration (ARMD)', 'Diabetic Retinopathy',
    'Retinal Detachment', 'Macular Hole', 'Epiretinal Membrane', 'Other',
];

function site($key) { global $SITE; return $SITE[$key] ?? ''; }
function base_url($path = '') { global $SITE; return rtrim($SITE['base_url'], '/') . $path; }
