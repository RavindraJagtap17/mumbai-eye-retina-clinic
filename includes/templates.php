<?php
/**
 * templates.php — rendering helpers for special page types.
 */

function render_breadcrumb($page) {
    echo '<ul class="breadcrumb"><li><a href="' . base_url('/') . '">Home</a></li>';
    $crumb = $page['crumb'] ?? '';
    if ($crumb) echo '<li>' . htmlspecialchars($crumb) . '</li>';
    echo '</ul>';
}

function page_hero($page) {
    echo '<section class="page-hero"><div class="wrap">';
    render_breadcrumb($page);
    echo '<h1>' . htmlspecialchars($page['h1'] ?? ($page['title'] ?? '')) . '</h1>';
    echo '</div></section>';
}

function expand_placeholders($html) {
    $base = rtrim(site('base_url'), '/');
    if ($base !== '') {
        $html = preg_replace_callback(
            '/(href|action)="(\/[^"]*)"/',
            function($m) use ($base) {
                return $m[1] . '="' . $base . $m[2] . '"';
            },
            $html
        );
    }
    return strtr($html, [
        '%PHONE_INTL%'    => site('phone_intl'),
        '%PHONE_DISPLAY%' => site('phone_display'),
        '%EMAIL%'         => site('email'),
    ]);
}

function services_data() {
    return [
        ['Retinal Imaging', '/retinal-services/retinal-imaging/', 'Includes Optical Coherence Tomography (OCT), Fundus Fluorescein Angiography (FFA) and ICG Angiography.', 'M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z|M12 9a3 3 0 100 6 3 3 0 000-6z'],
        ['Surgical Retina', '/retinal-services/surgical-retina/', 'Vitreoretinal surgery for diseases of the vitreous and/or retina, with modern micro-incisional techniques.', 'M14.5 3l6 6L9 20.5 3 21l.5-6L14.5 3z'],
        ['Medical Retina', '/retinal-services/medical-retina/', 'Retinal conditions managed effectively with medications or lasers, without surgery.', 'M19 14a7 7 0 11-7-7|M12 7v10|M7 12h10'],
        ['Retinal Injections', '/retinal-services/retinal-injections/', 'Painless intravitreal injection of medicine into the gel (vitreous) of the eye under topical anaesthesia.', 'M3 21l6-6|M9 15l9-9 3 3-9 9-3-3z'],
        ['Uveitis Treatment', '/retinal-services/uveitis-treatment/', 'Expert management of uveitis — inflammation of the uvea, the middle layer of the eye.', 'M12 3a9 9 0 100 18 9 9 0 000-18z|M12 8v4l3 2'],
        ['Retina Laser Treatment', '/retinal-services/retina-laser-treatment/', 'One of the latest green laser machines for precise treatment of retinal vascular disorders.', 'M12 2v6|M12 16v6|M2 12h6|M16 12h6'],
    ];
}
function diseases_data() {
    return [
        ['Age Related Macular Degeneration (ARMD)', '/retinal-diseases/age-related-macular-degeneration/', 'A degenerative condition of the macula and a leading cause of central vision loss after 50.'],
        ['Diabetic Retinopathy', '/retinal-diseases/diabetic-retinopathy-treatment/', 'Damage to retinal blood vessels from diabetes — a common cause of preventable blindness.'],
        ['Retinal Detachment', '/retinal-diseases/retinal-detachment-treatment/', 'A medical emergency where the retina separates from its supporting tissue. Needs prompt surgery.'],
        ['Macular Hole', '/retinal-diseases/macular-hole-treatment/', 'A small break in the macula causing blurred, distorted central vision; treated surgically.'],
        ['Epiretinal Membrane', '/retinal-diseases/macular-pucker/', 'Scar-like tissue on the macula (macular pucker) that wrinkles the retina and distorts vision.'],
    ];
}
function testimonials_data() {
    return [
        ['Sameer Ghate', 'August 2020', 'Dr. Madhusudan\'s treatment is a long-lasting experience and a positive feeling. He is very skilful and candid, transparent about symptoms and suggests successful treatment with zero errors. He carries a lot of wisdom — no wonder he is the best retina specialist in town. Thank you, Doctor.'],
        ['Neelu Vasudev', 'July 2020', 'I have been going to Dr. Madhusudan for the past two years for a chronic eye disease and have had a very reassuring experience. His dedication, honesty, compassion and humanity can be felt the moment you meet him. Even during the pandemic, every safety protocol was followed by the doctor and his efficient staff.'],
        ['Vandana Panchal', 'July 2020', 'I would like to thank Dr. Madhusudan Davda for operating on me and considering all my check-ups during this pandemic situation. He has a very pleasant attitude, listens and gives explanations to all your questions. I recommend him as the best doctor for eye issues.'],
        ['Avishek Banerjee', 'September 2020', 'Great human being and excellent as a doctor.'],
        ['Leon Dsouza', 'January 2020', 'Honesty in advice, humanity at large, saving life\'s earnings — the poor live happily with trusted surgery given by MERC, without a Mercedes!'],
        ['Amay Jaiswal', 'September 2020', 'A wonderful, caring experience from start to finish. Highly recommended for anyone with retina concerns.'],
    ];
}

function svg_icon($paths) {
    $out = '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">';
    foreach (explode('|', $paths) as $p) $out .= '<path d="' . $p . '"/>';
    return $out . '</svg>';
}

function new_captcha() {
    $a = random_int(2, 9); $b = random_int(2, 9);
    $_SESSION['captcha_sum'] = $a + $b;
    return "$a + $b";
}

/* =================== HOME =================== */
function tpl_home() {
    $services = services_data();
    $testi = testimonials_data();
    ?>
    <section class="hero">
      <div class="wrap hero-inner">
        <div class="reveal">
          <span class="hero-eyebrow">★ Super Speciality Retina Care</span>
          <h1>Clear Vision, <span class="accent">Expert Retina Care</span> in Mumbai &amp; Navi Mumbai</h1>
          <p class="lede">Affordable retina treatment &amp; surgery with the latest technology, led by Dr. Madhusudan Davda.</p>
          <div class="hero-actions">
            <a class="btn btn-accent" href="<?= base_url('/contacts/') ?>">Book an Appointment</a>
            <a class="btn btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.6)" href="tel:<?= site('phone_intl') ?>">Call <?= htmlspecialchars(site('phone_display')) ?></a>
          </div>
        </div>
        <div class="hero-card reveal">
          <h3>A decade of exclusive retina practice</h3>
          <p style="color:#dcefed;margin-bottom:6px">Dedicated exclusively to posterior segment eye disorders.</p>
          <div class="hero-stats">
            <div class="hero-stat"><b>10+</b><span>Years of exclusive retina practice</span></div>
            <div class="hero-stat"><b>3000+</b><span>Laser procedures performed</span></div>
            <div class="hero-stat"><b>1000+</b><span>Pain-free intravitreal injections</span></div>
            <div class="hero-stat"><b>AIIMS</b><span>MD · Sankara Nethralaya fellow</span></div>
          </div>
        </div>
      </div>
    </section>

    <section class="reach">
      <div class="wrap reach-inner">
        <div><h3>We are closer than you think!</h3><p>Quality matters, distance doesn't.</p></div>
        <div class="reach-list">
          <span class="reach-pill"><b>BKC / Wadala</b></span>
          <span class="reach-pill"><b>Navi Mumbai</b></span>
          <span class="reach-pill"><b>Thane</b></span>
          <span class="reach-pill"><b>South Mumbai</b></span>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="wrap">
        <div class="section-head reveal">
          <span class="kicker">What We Treat</span>
          <h2>Retina Services</h2>
          <p>"Mumbai Eye Retina Clinic" is a super speciality retina care centre dedicated exclusively to the management of posterior segment eye disorders — uveitis, medical &amp; surgical retinal diseases and ocular imaging.</p>
        </div>
        <div class="cards">
          <?php foreach ($services as $s): ?>
          <article class="card reveal">
            <div class="card-ico"><?= svg_icon($s[3]) ?></div>
            <h3><?= htmlspecialchars($s[0]) ?></h3>
            <p><?= htmlspecialchars($s[2]) ?></p>
            <a class="more" href="<?= base_url($s[1]) ?>">Read more</a>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section tint">
      <div class="wrap">
        <div class="doctor-layout">
          <aside class="doctor-card reveal">
            <div class="doctor-photo" data-img="Dr. Madhusudan Davda"></div>
            <h2 style="margin:.2em 0">Dr. Madhusudan Davda</h2>
            <p class="creds">MD (AIIMS), FMRF (Sankara Nethralaya)<br>Consultant Vitreo Retinal Surgeon</p>
            <a class="btn btn-teal" href="<?= base_url('/retina-doctor/retina-specialist-dr-madhusudan-davda/') ?>">Full Profile</a>
          </aside>
          <div class="prose reveal">
            <span class="kicker" style="color:var(--gold-dark);font-weight:800;letter-spacing:.12em;text-transform:uppercase;font-size:.78rem">Retina Specialist in Mumbai</span>
            <h2>Meet Dr. Madhusudan Davda</h2>
            <p>"Mumbai Eye Retina Clinic" was conceptualised as a super speciality retina clinic by Dr. Madhusudan Davda — Retina Specialist (a vitreoretinal surgeon) — with more than a <strong>decade</strong> of exclusive retina practice.</p>
            <p>Dr. Madhusudan Davda is a post graduate in ophthalmology and specialises in diseases of the posterior segment of the eye. He is a graduate (MBBS, 2003) from Seth GS Medical College and KEM Hospital, Parel, Mumbai, and completed his post graduation in Ophthalmology (MD, 2006) from the prestigious All India Institute of Medical Sciences (AIIMS, New Delhi), the apex institute for ophthalmic training in India. He was one of the youngest in his batch to complete post graduation.</p>
            <a class="btn btn-ghost" href="<?= base_url('/retina-doctor/retina-specialist-dr-madhusudan-davda/') ?>">Read More</a>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="wrap">
        <div class="section-head reveal">
          <span class="kicker">Patient Stories</span>
          <h2>What People Say About Us</h2>
          <p>Verified reviews from our patients on Google.</p>
        </div>
        <div class="testi-grid">
          <?php foreach ($testi as $t): ?>
          <article class="testi reveal">
            <div class="stars">★★★★★</div>
            <p><?= htmlspecialchars($t[2]) ?></p>
            <div class="who">
              <span class="avatar"><?= htmlspecialchars(mb_substr($t[0],0,1)) ?></span>
              <span><b><?= htmlspecialchars($t[0]) ?></b><span><?= htmlspecialchars($t[1]) ?> · Google Review</span></span>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section tint">
      <div class="wrap">
        <div class="cta-band" style="margin:0">
          <div><h3>Worried about your vision? Don't wait.</h3><p>Early diagnosis saves sight. Book your retina consultation today.</p></div>
          <a class="btn btn-accent" href="<?= base_url('/contacts/') ?>">Request an Appointment</a>
        </div>
      </div>
    </section>
    <?php
}

/* =============== SERVICES INDEX =============== */
function tpl_services_index($page) {
    page_hero($page);
    echo '<section class="section"><div class="wrap">';
    echo '<div class="prose reveal" style="max-width:820px;margin-bottom:40px"><p>"Mumbai Eye Retina Clinic" is a super speciality retina care centre dedicated exclusively to the management of posterior segment eye disorders. We specialise in the management of uveitis (ocular inflammation), medical and surgical retinal diseases and ocular imaging techniques.</p></div>';
    echo '<div class="cards">';
    foreach (services_data() as $s) {
        echo '<article class="card reveal"><div class="card-ico">' . svg_icon($s[3]) . '</div>';
        echo '<h3>' . htmlspecialchars($s[0]) . '</h3><p>' . htmlspecialchars($s[2]) . '</p>';
        echo '<a class="more" href="' . base_url($s[1]) . '">Read more</a></article>';
    }
    echo '</div></div></section>';
}

/* =============== DISEASES INDEX =============== */
function tpl_diseases_index($page) {
    page_hero($page);
    echo '<section class="section"><div class="wrap">';
    echo '<div class="prose reveal" style="max-width:820px;margin-bottom:40px"><p>We diagnose and treat the full range of retinal diseases using the latest technology. Explore the conditions we manage below.</p></div>';
    echo '<div class="cards">';
    foreach (diseases_data() as $d) {
        echo '<article class="card reveal"><div class="card-ico">' . svg_icon('M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z|M12 9a3 3 0 100 6 3 3 0 000-6z') . '</div>';
        echo '<h3>' . htmlspecialchars($d[0]) . '</h3><p>' . htmlspecialchars($d[2]) . '</p>';
        echo '<a class="more" href="' . base_url($d[1]) . '">Read more</a></article>';
    }
    echo '</div></div></section>';
}

/* =============== IMAGE GALLERY =============== */
function tpl_image_gallery($page) {
    page_hero($page);
    echo '<section class="section"><div class="wrap">';
    echo '<div class="section-head reveal"><span class="kicker">Gallery</span><h2>Clinical Retina Images</h2><p>Drop your clinical photographs and fundus images into the slots below (managed via the media folder).</p></div>';
    echo '<div class="gallery-grid">';
    $labels = ['Fundus image 1','OCT scan','Retinal angiography','Laser treatment','Surgery — MIVS','Clinic / equipment','Before treatment','After treatment','Diagnostic imaging'];
    foreach ($labels as $l) echo '<div class="img-slot reveal" data-img="' . htmlspecialchars($l) . '"></div>';
    echo '</div></div></section>';
}

/* =============== VIDEO GALLERY =============== */
function tpl_video_gallery($page) {
    page_hero($page);
    $videos = [
        ['7VkuxjnqPZk', 'Retina Talks with Dr. Madhusudan Davda'],
        ['', 'Add a YouTube video ID here'],
        ['', 'Add a YouTube video ID here'],
        ['', 'Add a YouTube video ID here'],
    ];
    echo '<section class="section"><div class="wrap">';
    echo '<div class="section-head reveal"><span class="kicker">Retina Videos</span><h2>' . htmlspecialchars($page['h1']) . '</h2><p>Watch our Retina Talks video series. Subscribe on <a href="' . site('social')['youtube'] . '" target="_blank" rel="noopener">YouTube</a>.</p></div>';
    echo '<div class="video-grid">';
    foreach ($videos as $v) {
        echo '<div class="video-card reveal"><div class="video-embed">';
        if ($v[0]) echo '<iframe src="https://www.youtube.com/embed/' . htmlspecialchars($v[0]) . '" title="' . htmlspecialchars($v[1]) . '" loading="lazy" allowfullscreen></iframe>';
        else echo '<div style="position:absolute;inset:0;display:grid;place-items:center;background:var(--mist);color:var(--muted);text-align:center;padding:16px">▶ ' . htmlspecialchars($v[1]) . '</div>';
        echo '</div><div class="vc-body"><h3>' . htmlspecialchars($v[1]) . '</h3></div></div>';
    }
    echo '</div></div></section>';
}

/* =============== FAQ =============== */
function tpl_faq($page) {
    page_hero($page);
    $faqs = [
        ['What is a retina specialist?', 'A retina specialist is an ophthalmologist who has completed additional fellowship training in diseases and surgery of the retina and vitreous — the posterior (back) segment of the eye. Dr. Madhusudan Davda is a vitreoretinal surgeon with a fellowship from Sankara Nethralaya, Chennai.'],
        ['Are intravitreal injections painful?', 'No. At our clinic all injections are performed under topical anaesthesia and are absolutely pain-free. The procedure is quick and done in the clinic.'],
        ['When is retinal surgery considered an emergency?', 'Conditions such as retinal detachment, intraocular infection (endophthalmitis) and a dropped/dislocated lens may be emergencies where time is critical. Prompt surgery is often the only way to save vision, so please seek care immediately if advised.'],
        ['Is retina surgery covered by health insurance?', 'Many retina procedures may be covered, depending on your policy and diagnosis. Please carry your insurance documents to your consultation. See our Insurance Policy page for more details.'],
        ['How do I prepare for my appointment?', 'Carry your previous prescriptions, reports and any imaging (OCT/FFA) you may have, along with a list of current medications. Your pupils may be dilated for examination, so it is advisable to have someone accompany you or avoid driving immediately afterwards.'],
        ['Which areas do you serve?', 'Our clinic in Chembur is easily reachable from BKC/Wadala, Navi Mumbai, Thane and South Mumbai, as well as Vashi, Ghatkopar, Dadar and Bandra.'],
    ];
    echo '<section class="section"><div class="wrap"><div class="faq-list">';
    foreach ($faqs as $f) {
        echo '<div class="faq-item reveal"><button class="faq-q" type="button"><span>' . htmlspecialchars($f[0]) . '</span><span class="pm">+</span></button>';
        echo '<div class="faq-a"><div class="faq-a-inner">' . htmlspecialchars($f[1]) . '</div></div></div>';
    }
    echo '</div></div></section>';
}

/* =============== BLOG =============== */
function tpl_blog($page) {
    page_hero($page);
    $posts = [
        ['Retinal Detachment — a complex case', 'October 1, 2018', 'A 30-year-old lady presented with decreased vision in the left eye and a congenital optic pit with serous inferior retinal detachment. A sutureless MIVS was performed at Mumbai Eye Retina Clinic with triamcinolone-assisted PVD induction and pre-placed encirclage to reduce recurrence.'],
        ['Mumbai Musings', 'October 1, 2018', 'A light-hearted reflection on the rhythm of a surgeon\'s day in Mumbai — the small signs of a good day, positivity, and the drive over the freeway between consultations and surgeries.'],
    ];
    echo '<section class="section"><div class="wrap"><div class="cards">';
    foreach ($posts as $p) {
        echo '<article class="card reveal"><div class="card-ico">' . svg_icon('M4 4h16v16H4z|M8 8h8|M8 12h8|M8 16h5') . '</div>';
        echo '<h3>' . htmlspecialchars($p[0]) . '</h3>';
        echo '<p style="font-size:.8rem;color:var(--gold-dark);font-weight:700;margin-bottom:8px">' . htmlspecialchars($p[1]) . '</p>';
        echo '<p>' . htmlspecialchars($p[2]) . '</p></article>';
    }
    echo '</div></div></section>';
}

/* =============== CONTACT =============== */
function tpl_contact($page) {
    page_hero($page);
    global $SERVICE_OPTIONS;
    $captcha = new_captcha();
    $err = $_SESSION['form_error'] ?? '';
    $old = $_SESSION['form_old'] ?? [];
    unset($_SESSION['form_error'], $_SESSION['form_old']);
    ?>
    <section class="section"><div class="wrap">
      <div class="contact-layout">
        <div class="contact-info reveal">
          <h2>Locate Mumbai Eye Retina Clinic</h2>
          <div class="info-item"><div class="info-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
            <div><h4>Dr. Madhusudan Davda</h4><p><?= htmlspecialchars(site('address')) ?></p></div></div>
          <div class="info-item"><div class="info-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 16.92z"/></svg></div>
            <div><h4>For Appointments Only</h4><p><a href="tel:<?= site('phone_intl') ?>"><?= htmlspecialchars(site('phone_display')) ?></a></p></div></div>
          <div class="info-item"><div class="info-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/></svg></div>
            <div><h4>Email Us</h4><p><a href="mailto:<?= site('email') ?>"><?= htmlspecialchars(site('email')) ?></a></p></div></div>
          <div class="info-item"><div class="info-ico"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></div>
            <div><h4>Opening Hours</h4><p><?= htmlspecialchars(site('hours')) ?><br><em><?= htmlspecialchars(site('hours_note')) ?></em></p></div></div>
          <div class="map-embed"><iframe src="<?= site('map_embed') ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Map to Mumbai Eye Retina Clinic"></iframe></div>
        </div>

        <div class="form-card reveal">
          <h2>Send an Enquiry</h2>
          <p style="color:var(--muted);margin-top:-6px">Fill the form and we'll get back to you shortly.</p>
          <?php if ($err): ?><div class="form-msg error"><?= htmlspecialchars($err) ?></div><?php endif; ?>
          <form action="<?= base_url('/submit.php') ?>" method="post" novalidate>
            <div class="field"><label>Full Name <span class="req">*</span></label>
              <input type="text" name="name" required value="<?= htmlspecialchars($old['name'] ?? '') ?>"></div>
            <div class="field-row">
              <div class="field"><label>Email <span class="req">*</span></label>
                <input type="email" name="email" required value="<?= htmlspecialchars($old['email'] ?? '') ?>"></div>
              <div class="field"><label>Phone Number <span class="req">*</span></label>
                <input type="tel" name="phone" required value="<?= htmlspecialchars($old['phone'] ?? '') ?>"></div>
            </div>
            <div class="field"><label>Select Service <span class="req">*</span></label>
              <select name="service" required>
                <option value="">— Options —</option>
                <?php foreach ($SERVICE_OPTIONS as $o): ?>
                  <option value="<?= htmlspecialchars($o) ?>" <?= (($old['service'] ?? '')===$o)?'selected':'' ?>><?= htmlspecialchars(strtoupper($o)) ?></option>
                <?php endforeach; ?>
              </select></div>
            <div class="field"><label>Your Message <span class="req">*</span></label>
              <textarea name="message" required><?= htmlspecialchars($old['message'] ?? '') ?></textarea></div>
            <!-- honeypot -->
            <div class="hp" aria-hidden="true"><label>Leave this empty</label><input type="text" name="website" tabindex="-1" autocomplete="off"></div>
            <div class="field"><label>Spam check <span class="req">*</span></label>
              <div class="captcha-box">
                <span class="q">What is <?= $captcha ?> ?</span>
                <input type="text" id="captcha_answer" name="captcha" inputmode="numeric" required <?= $err?'data-error="1"':'' ?>>
              </div>
            </div>
            <button class="btn btn-accent" type="submit" style="width:100%;justify-content:center">Submit Enquiry</button>
            <p class="form-note">Your details are used only to respond to your enquiry. We never share them.</p>
          </form>
        </div>
      </div>
    </div></section>
    <?php
}

/* =============== THANK YOU =============== */
function tpl_thankyou($page) {
    ?>
    <section class="section"><div class="wrap"><div class="thankyou reveal">
      <div class="check"><svg width="48" height="48" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg></div>
      <h1>Thank You!</h1>
      <p style="font-size:1.12rem;color:var(--muted)">Your enquiry has been received successfully. Our team at Mumbai Eye Retina Clinic will get back to you shortly. For urgent appointments, please call us directly.</p>
      <div class="hero-actions" style="justify-content:center;margin-top:8px">
        <a class="btn btn-accent" href="tel:<?= site('phone_intl') ?>">Call <?= htmlspecialchars(site('phone_display')) ?></a>
        <a class="btn btn-ghost" href="<?= base_url('/') ?>">Back to Home</a>
      </div>
    </div></div></section>
    <?php
}
