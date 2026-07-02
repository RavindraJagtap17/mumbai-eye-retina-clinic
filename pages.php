<?php
/**
 * pages.php — route registry.
 * Each key is the EXACT original URL path. Titles, meta descriptions, canonical
 * URLs and H1 tags are preserved from the live site so SEO is unaffected.
 *
 * 'tpl'  => special template (home | contact | thankyou) handled by the router
 * 'body' => HTML content rendered inside the standard page shell
 */

$PAGES = [

/* ============================ HOME ============================ */
'/' => [
    'title' => 'Retina Specialist in Mumbai | Dr Madhusudan Davda',
    'desc'  => 'Searching for a Retina Specialist in Mumbai? Consult Dr Madhusudan Davda at Mumbai Eye Retina Clinic. Retina Doctor from Sankara Nethralaya.',
    'canonical' => '/',
    'tpl'   => 'home',
],

/* ======================= ABOUT — CLINIC ======================= */
'/retina-clinic/' => [
    'title' => 'Mumbai Eye Retina Clinic | Super Speciality Retina Care Centre',
    'desc'  => 'Mumbai Eye Retina Clinic is a super speciality retina care centre dedicated exclusively to the management of posterior segment eye disorders.',
    'canonical' => '/retina-clinic/',
    'h1'    => 'About Mumbai Eye Retina Clinic',
    'crumb' => 'About',
    'body'  => <<<HTML
<div class="prose">
  <p><strong>"Mumbai Eye Retina Clinic"</strong> is a super speciality retina care centre dedicated <em>exclusively</em> to the management of posterior segment eye disorders. We specialise in the management of uveitis (ocular inflammation), medical and surgical retinal diseases and ocular imaging techniques.</p>
  <p>The clinic was conceptualised as a super speciality retina care centre by retina specialist <strong>Dr. Madhusudan Davda</strong>, a vitreoretinal surgeon with more than a <strong>decade</strong> of exclusive retina practice. Our focus on a single specialty allows us to bring depth, precision and the latest technology to every diagnosis and procedure.</p>
  <h2>Why choose us</h2>
  <ul class="ticks">
    <li>Exclusive focus on retina &amp; posterior segment eye care</li>
    <li>Latest diagnostic imaging — OCT, FFA &amp; ICG Angiography</li>
    <li>Painless intravitreal injections under topical anaesthesia</li>
    <li>Micro Incisional Vitreous Surgery (MIVS)</li>
    <li>Affordable, transparent &amp; honest treatment advice</li>
  </ul>
</div>
<div class="cta-band">
  <div>
    <h3>We are closer than you think!</h3>
    <p>Quality matters, distance doesn't. Easily reachable from BKC/Wadala, Navi Mumbai, Thane &amp; South Mumbai.</p>
  </div>
  <a class="btn btn-accent" href="/contacts/">Book an Appointment</a>
</div>
HTML,
],

/* ====================== ABOUT — DOCTOR ======================== */
'/retina-doctor/retina-specialist-dr-madhusudan-davda/' => [
    'title' => 'Retina Specialist from Sankara Nethralaya - Dr Madhusudan Davda',
    'desc'  => 'Retina Specialist Dr Madhusudan Davda is a Vitreo Retinal Surgeon from Sankara Nethralaya Chennai Practing at Mumbai Eye Retina Clinic, Mumbai, India.',
    'canonical' => '/retina-doctor/retina-specialist-dr-madhusudan-davda/',
    'h1'    => 'Best Retina Specialist in Mumbai',
    'crumb' => 'Dr. Madhusudan Davda',
    'body'  => <<<HTML
<div class="doctor-layout">
  <aside class="doctor-card">
    <div class="doctor-photo" data-img="Doctor photo — dr-madhusudan-davda-retina-talks.jpg"></div>
    <h2>Dr. Madhusudan Davda</h2>
    <p class="creds">MD (AIIMS), FMRF (Sankara Nethralaya)<br>Consultant Vitreo Retinal Surgeon</p>
    <div class="video-embed">
      <iframe src="https://www.youtube.com/embed/7VkuxjnqPZk" title="Dr Madhusudan Davda" loading="lazy" allowfullscreen></iframe>
    </div>
  </aside>
  <div class="prose">
    <p><strong>Mumbai Eye &amp; Retina Clinic</strong> was conceptualised as a super speciality retina care centre by retina specialist Dr. Madhusudan Davda, a vitreoretinal surgeon with more than a <strong>decade</strong> of exclusive retina practice.</p>
    <p>Dr. Madhusudan Davda is a <strong>post graduate in ophthalmology</strong> and specialises in diseases of the posterior segment of the eye. He is a <strong>graduate (MBBS, 2003)</strong> from Seth GS Medical College and KEM Hospital, Parel, Mumbai, and completed his <strong>post graduation in Ophthalmology (MD, 2006)</strong> from the prestigious All India Institute of Medical Sciences <strong>(AIIMS, New Delhi)</strong> — the apex institute for ophthalmic training in India. He was one of the youngest in his batch to complete post graduation.</p>
    <p>Fascinated by posterior segment eye diseases, he pursued a full-time fellowship in Clinical Retina from <strong>Sankara Nethralaya, Chennai (2008)</strong>. He simultaneously passed the Diplomate of National Board <strong>(DNB)</strong> examinations and the basic and clinical science courses of the International Council of Ophthalmology <strong>(FICO)</strong>.</p>
    <p>He has been in clinical practice for over 10 years with a keen interest in the diagnosis and management of <a href="/retinal-diseases/diabetic-retinopathy-treatment/">diabetic eye diseases</a> and <a href="/retinal-diseases/age-related-macular-degeneration/">Age-Related Macular Degeneration (ARMD)</a>. He has performed over <strong>3000+ laser procedures</strong> and over <strong>1000+ intravitreal injections</strong>, all done under topical anaesthesia and absolutely pain-free.</p>
    <p>He is also proficient in surgical retinal conditions such as <a href="/retinal-diseases/retinal-detachment-treatment/">retinal detachment</a>, vitreous haemorrhage and <a href="/retinal-diseases/macular-hole-treatment/">macular surgeries</a>, with a keen interest in Micro Incisional Vitreous Surgery (MIVS).</p>
    <p>A firm believer that medicine is an ever-evolving branch, Dr. Madhusudan stays constantly updated with current knowledge and management protocols. He is a member of leading ophthalmic societies including the All India Ophthalmological Society and the Bombay Ophthalmic Association, and has attended international conferences such as the World Ophthalmology Congress. He is actively involved in ophthalmic research with many publications in peer-reviewed journals.</p>
  </div>
</div>
HTML,
],

/* ===================== RETINA SURGERY COST ==================== */
'/retina-surgery-cost/' => [
    'title' => 'Retina Surgery Cost in Mumbai | Mumbai Eye Retina Clinic',
    'desc'  => 'Affordable retina treatment & surgery with the latest technology at Mumbai Eye Retina Clinic. Transparent, honest advice from Dr Madhusudan Davda.',
    'canonical' => '/retina-surgery-cost/',
    'h1'    => 'Retina Surgery Cost',
    'crumb' => 'Retina Surgery Cost',
    'body'  => <<<HTML
<div class="prose">
  <p>At Mumbai Eye Retina Clinic we believe quality retina care should be <strong>affordable</strong> and <strong>transparent</strong>. The cost of retina treatment and surgery varies with the diagnosis, the procedure advised, the consumables required (such as gas, silicone oil or intravitreal medication) and the technology used.</p>
  <p>During your consultation, Dr. Madhusudan Davda will explain your condition, the recommended procedure and the associated costs clearly, so you can make an informed decision without any pressure.</p>
  <h2>Factors that influence cost</h2>
  <ul class="ticks">
    <li>Type of procedure — laser, intravitreal injection or vitreoretinal surgery</li>
    <li>Medication / consumables used during the procedure</li>
    <li>Single or both eyes</li>
    <li>Number of sittings advised</li>
  </ul>
  <p>Many retina surgeries may also be covered by health insurance. Please see our <a href="/is-retina-surgery-covered-by-health-insurance/">Insurance Policy</a> page for details.</p>
</div>
<div class="cta-band">
  <div><h3>Get a clear, written estimate</h3><p>Call us for transparent pricing before any procedure.</p></div>
  <a class="btn btn-accent" href="tel:%PHONE_INTL%">Call %PHONE_DISPLAY%</a>
</div>
HTML,
],

/* ====================== SERVICES INDEX ======================= */
'/retinal-services/' => [
    'title' => 'Retina Services in Mumbai | Mumbai Eye Retina Clinic',
    'desc'  => 'Retina services at Mumbai Eye Retina Clinic include retinal imaging, surgical retina, medical retina, retinal injections, uveitis treatment and retina laser.',
    'canonical' => '/retinal-services/',
    'h1'    => 'Retina Services',
    'crumb' => 'Services',
    'tpl'   => 'services_index',
],

'/retinal-services/retinal-imaging/' => [
    'title' => 'Retinal Imaging — OCT, FFA, ICG | Mumbai Eye Retina Clinic',
    'desc'  => 'Retinal Imaging includes Optical Coherence Tomography (OCT), Fundus Fluorescein Angiography (FFA) and ICG Angiography at Mumbai Eye Retina Clinic.',
    'canonical' => '/retinal-services/retinal-imaging/',
    'h1'    => 'Retinal Imaging',
    'crumb' => 'Retinal Imaging',
    'body'  => <<<HTML
<div class="prose">
  <p>Retinal imaging is central to accurate diagnosis and monitoring of retinal disease. Our clinic is equipped with the latest imaging technology, including:</p>
  <ul class="ticks">
    <li><strong>Optical Coherence Tomography (OCT)</strong> — high-resolution cross-sectional scans of the retina</li>
    <li><strong>Fundus Fluorescein Angiography (FFA)</strong> — imaging of the retinal blood circulation</li>
    <li><strong>ICG Angiography</strong> — imaging of the deeper choroidal circulation</li>
  </ul>
  <div class="img-slot" data-img="OCT / retinal imaging machine"></div>
</div>
HTML,
],

'/retinal-services/surgical-retina/' => [
    'title' => 'Surgical Retina - Mumbai Eye Retina Clinic - Dr Madhusudan Davda',
    'desc'  => 'Mumbai Eye Retina Clinic offers surgical retina services like vitreoretinal surgery, led by Dr Madhusudan Davda in Mumbai. Contact us today!',
    'canonical' => '/retinal-services/surgical-retina/',
    'h1'    => 'Surgical Retina',
    'crumb' => 'Surgical Retina',
    'body'  => <<<HTML
<div class="prose">
  <p>The surgical retina is a broad term for diseases of the vitreous and/or retina for which the primary management is <strong>vitreoretinal surgery</strong>. In addition, some medical retinal conditions may eventually need surgery.</p>
  <p>Many surgical retinal conditions are emergencies and the doctor may advise surgery at the earliest. However, there is no need to panic — a majority of them can be managed well with modern-day vitreoretinal surgical techniques. For conditions like retinal detachment, intraocular infection (endophthalmitis) and posteriorly dislocated / dropped nucleus or retained lens matter, <strong>time is of the essence</strong>. Prompt surgical intervention is often the only way to save vision in these patients.</p>
  <p>It is natural for patients to feel anxious when they hear they need retinal surgery. Our team takes time to explain the procedure and reassure you at every step. A good and reliable vitrectomy machine is key to success in many surgeries — it performs procedures such as cutting the vitreous and injecting or removing substances like oil, gas or air from the eye.</p>
  <div class="img-slot" data-img="Vitrectomy / retina surgery"></div>
</div>
HTML,
],

'/retinal-services/medical-retina/' => [
    'title' => 'Medical Retina Treatment | Mumbai Eye Retina Clinic',
    'desc'  => 'Medical retina covers many retinal conditions that can be treated with medications or lasers at Mumbai Eye Retina Clinic, Mumbai.',
    'canonical' => '/retinal-services/medical-retina/',
    'h1'    => 'Medical Retina',
    'crumb' => 'Medical Retina',
    'body'  => <<<HTML
<div class="prose">
  <p>Medical retina is a broad term that covers the many retinal conditions which can be treated with <strong>medications or lasers</strong>, without the need for surgery.</p>
  <p>Conditions managed under medical retina include diabetic retinopathy, age-related macular degeneration, retinal vein occlusions and various forms of macular oedema. Early diagnosis and timely treatment are key to preserving vision.</p>
  <div class="img-slot" data-img="Medical retina conditions"></div>
</div>
HTML,
],

'/retinal-services/retinal-injections/' => [
    'title' => 'Retinal / Intravitreal Injections | Mumbai Eye Retina Clinic',
    'desc'  => 'Intravitreal injection is a procedure of injecting the required medicine into the gel (vitreous) of the eye. Painless injections at Mumbai Eye Retina Clinic.',
    'canonical' => '/retinal-services/retinal-injections/',
    'h1'    => 'Retinal Injections',
    'crumb' => 'Retinal Injections',
    'body'  => <<<HTML
<div class="prose">
  <p>A retinal (intravitreal) injection is a procedure of injecting the required medicine directly into the <strong>gel (vitreous)</strong> of the eye. It is one of the most common and effective treatments for several retinal conditions.</p>
  <p>At our clinic, all injections are performed under <strong>topical anaesthesia</strong> and are <strong>absolutely pain-free</strong>. Dr. Madhusudan Davda has performed over <strong>1000+ intravitreal injections</strong>.</p>
  <div class="img-slot" data-img="Intravitreal injection procedure"></div>
</div>
HTML,
],

'/retinal-services/uveitis-treatment/' => [
    'title' => 'Uveitis Treatment in Mumbai | Mumbai Eye Retina Clinic',
    'desc'  => 'Uveitis is inflammation of the uvea, the middle layer of the eye. Expert uveitis (ocular inflammation) treatment at Mumbai Eye Retina Clinic.',
    'canonical' => '/retinal-services/uveitis-treatment/',
    'h1'    => 'Uveitis Treatment',
    'crumb' => 'Uveitis Treatment',
    'body'  => <<<HTML
<div class="prose">
  <p><strong>Uveitis</strong> (u-ve-I-tis) is inflammation of the uvea, the middle layer of the eye. The uvea consists of the iris, choroid and ciliary body.</p>
  <p>Uveitis can affect one or both eyes and, if left untreated, may threaten vision. Our clinic specialises in the diagnosis and management of ocular inflammation, working to identify the underlying cause and control the inflammation effectively.</p>
  <div class="img-slot" data-img="Uveitis — ocular inflammation"></div>
</div>
HTML,
],

'/retinal-services/retina-laser-treatment/' => [
    'title' => 'Retina Laser Treatment in Mumbai | Mumbai Eye Retina Clinic',
    'desc'  => 'Our clinic is equipped with one of the latest green laser machines for retina laser treatment in Mumbai.',
    'canonical' => '/retinal-services/retina-laser-treatment/',
    'h1'    => 'Retina Laser Treatment',
    'crumb' => 'Retina Laser Treatment',
    'body'  => <<<HTML
<div class="prose">
  <p>Our clinic is equipped with one of the <strong>latest green laser machines</strong> marketed in India by Appasamy Associates. Retina laser treatment is used to manage conditions such as diabetic retinopathy, retinal tears and certain vascular disorders.</p>
  <p>Dr. Madhusudan Davda has performed over <strong>3000+ laser procedures</strong>, applying lasers precisely to seal leaking vessels, treat retinal tears and reduce the risk of vision loss.</p>
  <div class="img-slot" data-img="Green laser machine"></div>
</div>
HTML,
],

/* ===================== DISEASES INDEX ======================== */
'/retinal-diseases/' => [
    'title' => 'Retinal Diseases We Treat | Mumbai Eye Retina Clinic',
    'desc'  => 'Retinal diseases treated at Mumbai Eye Retina Clinic include ARMD, diabetic retinopathy, retinal detachment, macular hole and epiretinal membrane.',
    'canonical' => '/retinal-diseases/',
    'h1'    => 'Retinal Diseases',
    'crumb' => 'Retinal Diseases',
    'tpl'   => 'diseases_index',
],

'/retinal-diseases/age-related-macular-degeneration/' => [
    'title' => 'Age Related Macular Degeneration (ARMD) Treatment | Mumbai',
    'desc'  => 'Age-Related Macular Degeneration (ARMD) treatment in Mumbai by Dr Madhusudan Davda at Mumbai Eye Retina Clinic.',
    'canonical' => '/retinal-diseases/age-related-macular-degeneration/',
    'h1'    => 'Age Related Macular Degeneration (ARMD)',
    'crumb' => 'ARMD',
    'body'  => <<<HTML
<div class="prose">
  <p><strong>Age-Related Macular Degeneration (ARMD)</strong> is a degenerative condition affecting the macula — the central part of the retina responsible for sharp, detailed vision. It is one of the leading causes of vision loss in people over 50.</p>
  <p>ARMD broadly exists in two forms: <strong>dry (atrophic)</strong> and <strong>wet (neovascular)</strong>. Wet ARMD often responds to intravitreal anti-VEGF injections. Early detection and regular monitoring are essential to preserve central vision.</p>
  <div class="img-slot" data-img="ARMD — macular degeneration"></div>
</div>
HTML,
],

'/retinal-diseases/diabetic-retinopathy-treatment/' => [
    'title' => 'Diabetic Retinopathy Treatment in Mumbai | Mumbai Eye Retina Clinic',
    'desc'  => 'Diabetic retinopathy treatment in Mumbai by retina specialist Dr Madhusudan Davda. Laser, injections and surgery at Mumbai Eye Retina Clinic.',
    'canonical' => '/retinal-diseases/diabetic-retinopathy-treatment/',
    'h1'    => 'Diabetic Retinopathy',
    'crumb' => 'Diabetic Retinopathy',
    'body'  => <<<HTML
<div class="prose">
  <p><strong>Diabetic retinopathy</strong> is a complication of diabetes that damages the blood vessels of the retina. It is one of the most common causes of preventable blindness, and often has no early symptoms — which is why regular retina screening is vital for everyone with diabetes.</p>
  <p>Depending on the stage, treatment may include laser photocoagulation, intravitreal injections or vitreoretinal surgery. Good control of blood sugar, blood pressure and cholesterol remains the foundation of management.</p>
  <div class="img-slot" data-img="Diabetic retinopathy"></div>
</div>
HTML,
],

'/retinal-diseases/retinal-detachment-treatment/' => [
    'title' => 'Retinal Detachment Treatment in Mumbai | Mumbai Eye Retina Clinic',
    'desc'  => 'Retinal detachment is an emergency. Prompt surgical treatment in Mumbai by Dr Madhusudan Davda at Mumbai Eye Retina Clinic.',
    'canonical' => '/retinal-diseases/retinal-detachment-treatment/',
    'h1'    => 'Retinal Detachment',
    'crumb' => 'Retinal Detachment',
    'body'  => <<<HTML
<div class="prose">
  <p><strong>Retinal detachment</strong> occurs when the retina separates from the underlying tissue that supplies it with oxygen and nutrients. It is a <strong>medical emergency</strong> — prompt surgical intervention is often the only way to save vision.</p>
  <p>Warning signs include a sudden increase in floaters, flashes of light and a curtain-like shadow over the field of vision. If you notice these symptoms, seek care immediately. Treatment is surgical and may involve vitrectomy, scleral buckling or pneumatic retinopexy.</p>
  <div class="img-slot" data-img="Retinal detachment"></div>
</div>
HTML,
],

'/retinal-diseases/macular-hole-treatment/' => [
    'title' => 'Macular Hole Treatment in Mumbai | Mumbai Eye Retina Clinic',
    'desc'  => 'Macular hole treatment and macular surgery in Mumbai by Dr Madhusudan Davda at Mumbai Eye Retina Clinic.',
    'canonical' => '/retinal-diseases/macular-hole-treatment/',
    'h1'    => 'Macular Hole',
    'crumb' => 'Macular Hole',
    'body'  => <<<HTML
<div class="prose">
  <p>A <strong>macular hole</strong> is a small break in the macula, the central part of the retina. It typically causes blurred and distorted central vision and most commonly affects people over the age of 60.</p>
  <p>Most macular holes are treated with vitreoretinal surgery (vitrectomy with membrane peeling and gas tamponade), which can restore a significant portion of central vision when performed in good time.</p>
  <div class="img-slot" data-img="Macular hole"></div>
</div>
HTML,
],

'/retinal-diseases/macular-pucker/' => [
    'title' => 'Epiretinal Membrane (Macular Pucker) Treatment | Mumbai',
    'desc'  => 'Epiretinal membrane (macular pucker) treatment in Mumbai by Dr Madhusudan Davda at Mumbai Eye Retina Clinic.',
    'canonical' => '/retinal-diseases/macular-pucker/',
    'h1'    => 'Epiretinal Membrane',
    'crumb' => 'Epiretinal Membrane',
    'body'  => <<<HTML
<div class="prose">
  <p>An <strong>epiretinal membrane (macular pucker)</strong> is a thin layer of scar-like tissue that forms on the surface of the macula. As it contracts, it can wrinkle the retina and cause blurred or distorted central vision.</p>
  <p>When symptoms affect daily activities, the membrane can be removed with vitreoretinal surgery to improve and stabilise vision.</p>
  <div class="img-slot" data-img="Epiretinal membrane / macular pucker"></div>
</div>
HTML,
],

/* ========================= GALLERY =========================== */
'/retina-images/' => [
    'title' => 'Retina Images Gallery | Mumbai Eye Retina Clinic',
    'desc'  => 'A gallery of retina images and clinical photographs from Mumbai Eye Retina Clinic, Dr Madhusudan Davda.',
    'canonical' => '/retina-images/',
    'h1'    => 'Retina Images',
    'crumb' => 'Retina Images',
    'tpl'   => 'image_gallery',
],

'/retina-talks-video-series/' => [
    'title' => 'Retina Videos | Mumbai Eye Retina Clinic',
    'desc'  => 'Watch the Retina Talks video series by Dr Madhusudan Davda, Mumbai Eye Retina Clinic.',
    'canonical' => '/retina-talks-video-series/',
    'h1'    => 'Retina Videos',
    'crumb' => 'Retina Videos',
    'tpl'   => 'video_gallery',
],

/* =========================== FAQ ============================= */
'/retina-faq/' => [
    'title' => 'Retina FAQs | Mumbai Eye Retina Clinic',
    'desc'  => 'Frequently asked questions about retina diseases, treatment and surgery answered by Dr Madhusudan Davda, Mumbai Eye Retina Clinic.',
    'canonical' => '/retina-faq/',
    'h1'    => 'Frequently Asked Questions',
    'crumb' => 'FAQs',
    'tpl'   => 'faq',
],

/* =========================== BLOG ============================ */
'/blog/' => [
    'title' => 'Blog | Mumbai Eye Retina Clinic',
    'desc'  => 'Articles, case studies and musings on retina care by Dr Madhusudan Davda, Mumbai Eye Retina Clinic.',
    'canonical' => '/blog/',
    'h1'    => 'Blog',
    'crumb' => 'Blog',
    'tpl'   => 'blog',
],

'/retina-talks-video/' => [
    'title' => 'Video Blogs | Mumbai Eye Retina Clinic',
    'desc'  => 'Video blogs and Retina Talks by Dr Madhusudan Davda, Mumbai Eye Retina Clinic.',
    'canonical' => '/retina-talks-video/',
    'h1'    => 'Video Blogs',
    'crumb' => 'Video Blogs',
    'tpl'   => 'video_gallery',
],

/* ========================= INSURANCE ========================= */
'/is-retina-surgery-covered-by-health-insurance/' => [
    'title' => 'Is Retina Surgery Covered by Health Insurance? | Mumbai Eye Retina Clinic',
    'desc'  => 'Is retina surgery covered by health insurance? Learn about insurance for retina treatment and surgery at Mumbai Eye Retina Clinic.',
    'canonical' => '/is-retina-surgery-covered-by-health-insurance/',
    'h1'    => 'Is Retina Surgery Covered by Health Insurance?',
    'crumb' => 'Insurance Policy',
    'body'  => <<<HTML
<div class="prose">
  <p>Many retina surgeries and procedures <strong>may be covered by health insurance</strong>, depending on your policy, the diagnosis and whether the procedure is performed as day-care or with admission. Coverage and the cashless / reimbursement process vary between insurers and TPAs.</p>
  <p>Our team can help you understand the documentation required and guide you through the process. Please carry your insurance details and policy documents to your consultation, and feel free to call us with any questions.</p>
  <ul class="ticks">
    <li>Pre-authorisation support for eligible procedures</li>
    <li>Guidance on documentation and medical records</li>
    <li>Transparent estimates before treatment</li>
  </ul>
</div>
<div class="cta-band">
  <div><h3>Questions about insurance?</h3><p>Talk to our team for help with your policy.</p></div>
  <a class="btn btn-accent" href="tel:%PHONE_INTL%">Call %PHONE_DISPLAY%</a>
</div>
HTML,
],

/* ========================= CONTACT =========================== */
'/contacts/' => [
    'title' => 'Mumbai Eye Retina Clinic | Dr. Madhusudan | Best Retina Clinic Near you',
    'desc'  => 'Get Contact Details of Mumbai Eye Retina Clinic. Locate Best Retina Clinic Near Me on Google Map. You can easily reach us from Thane, Vashi, Ghatkopar, Dadar, Bandra, Navi Mumbai, Mumbai, south Mumbai. Get Treatment by top Eye Retina Specialist Dr Madhusudan Davda from Sankara Nethralaya Chennai, India.',
    'canonical' => '/contacts/',
    'h1'    => 'Contact Us',
    'crumb' => 'Contact Us',
    'tpl'   => 'contact',
],

/* ======================== THANK YOU ========================== */
'/thank-you/' => [
    'title' => 'Thank You | Mumbai Eye Retina Clinic',
    'desc'  => 'Thank you for contacting Mumbai Eye Retina Clinic. We will get back to you shortly.',
    'canonical' => '/thank-you/',
    'h1'    => 'Thank You',
    'crumb' => 'Thank You',
    'noindex' => true,
    'tpl'   => 'thankyou',
],

];
