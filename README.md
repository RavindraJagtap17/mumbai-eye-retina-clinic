# Mumbai Eye Retina Clinic — Redesigned Website

A complete, mobile-friendly redesign of **mumbaieyeretinaclinic.com**, built as a small
PHP front-controller site. Every original URL, the GTM container, page meta, heading
tags and schema are preserved, while the layout, styling and structure are entirely new.

---

## 1. What's included

| Area | Feature |
|------|---------|
| **Design** | New responsive layout (clinical-premium teal + gold), Spectral + Mulish fonts, animated reveals, mobile nav, sticky header |
| **Content** | Original copy reused, spelling corrected, image sections + YouTube video section kept |
| **Call widget** | Floating "Call Now" button on **every** page (bottom corner) |
| **Inquiry form** | Contact form with a **math captcha** + hidden honeypot to stop spam |
| **Thank-you page** | Successful submissions redirect to a dedicated `/thank-you/` page |
| **SEO preserved** | URLs, meta tags, `<h1>` tags, GTM (`GTM-KZ9PBMQ`) and JSON-LD schema all kept |
| **Admin panel** | `/admin/` — paste custom header/body code injected site-wide, view inquiries, change password |

---

## 2. Hosting requirements

- **Apache** with **mod_rewrite** enabled (the included `.htaccess` routes every clean
  URL through `index.php`). Most shared cPanel hosts already have this.
- **PHP 7.4+** (PHP 8.x recommended).
- The web root should point at the project folder (where `index.php` lives).

### Deploy
1. Upload the entire folder to your host's web root (e.g. `public_html`).
2. Make the `data/` folder writable so the site can save inquiries, custom code
   and the admin password:
   ```
   chmod 775 data
   ```
3. Visit the site. That's it — no database, no build step, no Composer.

> **Nginx?** There is no `.htaccess` support. Add a try-files rule that sends all
> non-file requests to `index.php`, and block direct access to `*.json`.

---

## 3. Admin panel (custom header/body code)

Open **`https://your-domain/admin/`**

- **Default username:** `admin`
- **Default password:** `changeme123`  ← change this immediately after logging in.

Inside the dashboard you can:

- **Custom Header & Body Code** — three boxes whose contents are injected into
  **every page**:
  - *Header code* → added just before `</head>` (meta tags, verification tags,
    extra schema, `<link>`s).
  - *Body — top* → added right after `<body>` (`<noscript>` pixels, banners).
  - *Body — bottom* → added before `</body>` (chat widgets, deferred scripts).
- **Inquiry Submissions** — every contact-form message, newest first.
- **Change Password** — updates the login (stored hashed in `data/admin-auth.json`).

### Changing the password without logging in
Delete `data/admin-auth.json`, edit the `DEFAULT_PASSWORD` constant near the top of
`admin/auth.php`, then reload the login page — a fresh credential file is regenerated.

---

## 4. Tracking codes (GTM / Google Analytics)

- Your **Google Tag Manager** container `GTM-KZ9PBMQ` is **already hard-coded** into
  `includes/head.php` and `includes/header.php`, exactly as on the original site.
- Google Analytics on the original site fires **through that GTM container**, so it is
  preserved automatically — you do **not** need to re-add it.
- If you ever add *new* tags/verification snippets, paste them in the admin
  **Custom Header/Body** boxes rather than editing the code.

To change the GTM ID itself, edit `gtm_id` in `config.php`.

---

## 5. Adding real images

Image areas show a labelled dashed placeholder (e.g. "🖼 Image: Surgical Retina").
To drop in a real photo, add a **`data-src`** attribute pointing at a file in
`assets/img/` — the script swaps it in automatically, no CSS editing needed:

```html
<div class="img-slot" data-img="Surgical Retina" data-src="assets/img/surgical-retina.jpg"></div>
```

The doctor photo works the same way:
```html
<div class="doctor-photo" data-img="Dr. Madhusudan Davda" data-src="assets/img/dr-davda.jpg"></div>
```

Put your image files in **`assets/img/`**. The placeholder slots live in
`includes/templates.php` (galleries, doctor page) and in the relevant page bodies in
`pages.php`.

The logo at `assets/img/logo.png` is a placeholder — replace it with the clinic's real
logo (same filename) and it updates the header, footer and schema everywhere.

---

## 6. YouTube videos

The video gallery is defined in `includes/templates.php`, function
`tpl_video_gallery()`. The clinic's known video is already embedded; swap or add IDs
in the `$videos` array:

```php
$videos = [
    ['7VkuxjnqPZk', 'Retina Talks with Dr. Madhusudan Davda'],
    ['NEW_ID_HERE', 'Your video title'],
    // add as many as you like
];
```

The ID is the part after `watch?v=` in a YouTube URL.

---

## 7. Project structure

```
.
├── index.php              Front controller — routes every URL
├── submit.php             Inquiry form handler (captcha + honeypot + save + email)
├── config.php             Clinic details, nav, GTM ID, service options
├── pages.php              Page registry: every URL → meta + content/template
├── .htaccess              Clean-URL routing + JSON protection
├── includes/
│   ├── head.php           <head>: GTM, meta, OG/Twitter, schema, custom header
│   ├── header.php         Top bar, nav, GTM noscript, custom body-top
│   ├── footer.php         Footer, floating call widget, custom body-bottom
│   ├── templates.php      Home / services / diseases / gallery / video / FAQ / contact / thank-you
│   └── custom-code.php    Loads admin-saved snippets
├── admin/
│   ├── index.php          Login
│   ├── dashboard.php      Edit custom code, view inquiries, change password
│   ├── auth.php           Auth + password storage
│   ├── logout.php
│   └── admin-style.php    Admin styling
├── assets/
│   ├── css/style.css      Full site stylesheet
│   ├── js/main.js         Nav, FAQ, reveals, image-slot swapping
│   └── img/               logo.png, favicon.png + your photos here
└── data/                  (writable) custom-code.json, inquiries.json, admin-auth.json
```

---

## 8. A note on content

- All original **navigation, URLs, meta titles/descriptions, H1s, GTM and schema** are
  reproduced faithfully.
- The **homepage, about/doctor, contact, services index and diseases index** carry the
  original copy (with spelling fixes such as *Serivces → Services*, *postive → positive*,
  *skillfull → skilful*, *longlasting → long-lasting*).
- A few **deep inner pages** (individual service/disease detail pages, FAQ, blog) use
  rewritten, condensed copy where the original long-form text was not part of the
  captured content. Paste the clinic's exact wording into the matching entry in
  `pages.php` whenever you'd like 100% original copy on those pages.

---

## 9. Local testing

```
php -S localhost:8000
```
Then open `http://localhost:8000/`. (The PHP built-in server honours `index.php`
routing; clean URLs work the same as on Apache.)

For email to actually send, deploy to a mail-enabled host — the `@mail()` call in
`submit.php` is a no-op on most local machines, but inquiries are still saved and
visible in the admin panel.
