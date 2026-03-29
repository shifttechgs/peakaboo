# Peekaboo SEO Implementation
### Last updated: 25 March 2026 | Status: ✅ Implemented

---

## Table of Contents

1. [Overview](#1-overview)
2. [Competitor Research Summary](#2-competitor-research-summary)
3. [Keyword Strategy](#3-keyword-strategy)
4. [Technical SEO — What Was Built](#4-technical-seo--what-was-built)
5. [Global Layout Schema](#5-global-layout-schema)
6. [Per-Page SEO Reference](#6-per-page-seo-reference)
7. [Sitemap & Robots.txt](#7-sitemap--robotstxt)
8. [File Reference](#8-file-reference)
9. [Google Business Profile Checklist](#9-google-business-profile-checklist)
10. [Next Steps / Phase 2](#10-next-steps--phase-2)

---

## 1. Overview

Full on-site SEO implementation for **Peekaboo Daycare & Preschool**, located at **139B Humewood Drive, Parklands, Cape Town**.

**Business snapshot:**
| Detail | Value |
|---|---|
| Location | Parklands, Cape Town, Western Cape |
| Ages | 3 months → Grade R |
| Established | 2010 |
| Families | 150+ |
| Google Rating | 4.9 ★ |
| Fees | Half-day R3,800/mo · Full-day R4,200/mo |
| USPs | CAPS-aligned · Christian values · Transparent pricing · Parent portal |

**What was implemented in this phase:**
- Global structured data (JSON-LD schema) on every page via the public layout
- Per-page optimised `<title>`, `<meta description>`, `<meta keywords>`
- Canonical URLs on every page
- Full Open Graph + Twitter Card meta on every page
- Geographic meta tags (geo.region, geo.position, ICBM)
- Per-page JSON-LD schema pushed via `@stack('schema')`
- Dynamic XML sitemap at `/sitemap.xml`
- Dynamic robots.txt at `/robots.txt`

---

## 2. Competitor Research Summary

### Direct Competitors (Parklands / Blouberg / Table View)

| Competitor | Location | SEO Threat |
|---|---|---|
| Kidsplace Daycare | Parklands | Medium — reasonable GBP presence |
| Rising Stars Pre-Primary | Parklands North | Low — active Facebook, weak site |
| Kidz Corner Pre-School | Parklands | Low — outdated site, beatable |
| Little Angels Nursery | Parklands / Blouberg | Low |
| Step Ahead Pre-Primary | Table View | Low |
| Sunshine Nursery School | Blouberg Strand | Medium |
| Barnyard Nursery School | Sunningdale | Medium |

### Aggregators That Dominate Google
Gumtree, Yellow Pages SA, SchoolMyKids.com, PrivateSchoolSearch.co.za — these rank via domain authority on generic queries. Beat them via **local specificity** + **Google Business Profile**.

### Key Competitor Gaps Peekaboo Exploits
| Gap | Peekaboo Advantage |
|---|---|
| No schema markup | Full JSON-LD schema implemented ✅ |
| No transparent pricing | `/fees` page with clear 2026 pricing ✅ |
| No Christian values positioning | Keyword targeted, zero competition ✅ |
| No parent portal | Completely unique locally ✅ |
| No sleepover programme content | Unique keyword, zero competition ✅ |
| No blog/content | Phase 2 opportunity |
| No programme-specific pages | 4 individual programme pages ✅ |

---

## 3. Keyword Strategy

### 🔴 Priority 1 — Hyper-Local, High Intent (Target NOW)

| Keyword | Target Page | Monthly Searches (SA est.) |
|---|---|---|
| `daycare Parklands Cape Town` | Homepage | 90–170 |
| `preschool Parklands Cape Town` | Homepage | 70–140 |
| `daycare near me Parklands` | Homepage | 110–200 |
| `nursery school Parklands` | Homepage | 50–100 |
| `childcare Parklands Cape Town` | Homepage | 60–110 |
| `Grade R Parklands Cape Town` | Grade R programme page | 80–150 |
| `baby room daycare Cape Town` | Baby Room programme page | 60–120 |
| `daycare fees Parklands 2026` | Fees page | 40–80 |
| `Christian preschool Parklands` | Homepage / About | near-zero competition |

### 🟠 Priority 2 — Geo-Expanded (Nearby Suburbs)

| Keyword | Target Page |
|---|---|
| `daycare Blouberg` | Homepage |
| `preschool Table View` | Homepage |
| `nursery school Blouberg Strand` | Homepage |
| `childcare Cape Town northside` | Homepage |
| `daycare Sunningdale` | Homepage |

### 🟡 Priority 3 — Programme & Fee Keywords

| Keyword | Target Page |
|---|---|
| `toddler programme Parklands` | Toddlers page |
| `CAPS Grade R preschool Cape Town` | Grade R page |
| `infant care Cape Town` | Baby Room page |
| `full day daycare Parklands` | Fees page |
| `half day preschool Parklands` | Fees page |
| `affordable daycare Cape Town` | Fees page |
| `preschool extra murals Parklands` | Homepage services section |
| `holiday care Parklands Cape Town` | Homepage services section |
| `enrol preschool Parklands 2026` | Enrol page |
| `best daycare Cape Town northside` | Homepage |

### 📝 Phase 2 — Long-Tail Blog Keywords

| Keyword | Blog Post Title |
|---|---|
| `when to start preschool South Africa` | "When Should My Child Start Preschool?" |
| `CAPS curriculum Grade R what to expect` | "CAPS Grade R Explained" |
| `what to look for in a daycare Cape Town` | "5 Things to Look for in a Daycare" |
| `holiday care Cape Town 2026` | "Holiday Care at Peekaboo — What to Expect" |
| `school readiness Cape Town Grade R` | "Is My Child Ready for Grade 1?" |
| `daycare vs preschool South Africa` | "Daycare vs Preschool: What's the Difference?" |

---

## 4. Technical SEO — What Was Built

### 4.1 Layout Head (`resources/views/layouts/public.blade.php`)

Every public page now outputs the following from the shared layout:

```html
<!-- Title — per-page via @yield('title') -->
<title>Page Title Here</title>

<!-- Core meta -->
<meta name="description" content="...">       <!-- @yield('description') -->
<meta name="keywords"    content="...">       <!-- @yield('keywords') -->
<meta name="robots"      content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta name="author"      content="Peekaboo Daycare & Preschool">

<!-- Canonical -->
<link rel="canonical" href="...">             <!-- @yield('canonical', url()->current()) -->

<!-- Open Graph -->
<meta property="og:type"        content="website">
<meta property="og:site_name"   content="Peekaboo Daycare & Preschool">
<meta property="og:title"       content="...">   <!-- @yield('og_title') -->
<meta property="og:description" content="...">   <!-- @yield('og_description') -->
<meta property="og:url"         content="...">
<meta property="og:image"       content="...">   <!-- @yield('og_image', default OG image) -->
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale"      content="en_ZA">

<!-- Twitter / X Card -->
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:title"       content="...">
<meta name="twitter:description" content="...">
<meta name="twitter:image"       content="...">

<!-- Geographic -->
<meta name="geo.region"    content="ZA-WC">
<meta name="geo.placename" content="Parklands, Cape Town">
<meta name="geo.position"  content="-33.8248;18.4968">
<meta name="ICBM"          content="-33.8248, 18.4968">
```

Then the **global JSON-LD schema** (see Section 5), followed by `@stack('schema')` for per-page additions.

### 4.2 Blade Sections Available Per Page

| Section | Purpose | Default if not set |
|---|---|---|
| `@section('title')` | `<title>` tag | `Peekaboo Daycare & Preschool — Parklands, Cape Town` |
| `@section('description')` | Meta description | Generic site description |
| `@section('keywords')` | Meta keywords | 9 core site keywords |
| `@section('canonical')` | Canonical URL | `url()->current()` |
| `@section('og_type')` | OG type | `website` |
| `@section('og_title')` | OG title | Same as site default |
| `@section('og_description')` | OG description | Same as meta description |
| `@section('og_image')` | OG / Twitter image | `assets/img/peekaboo/og-default.jpg` |
| `@push('schema')` | Per-page JSON-LD | _(empty)_ |

### 4.3 How to Add SEO to a New Page

```blade
@extends('layouts.public')

@section('title', 'Your Page Title — Peekaboo Daycare Parklands, Cape Town')
@section('description', 'Your 150–160 character meta description with primary keyword near the front.')
@section('keywords', 'keyword 1, keyword 2, keyword 3')
@section('canonical', route('your.route.name'))
@section('og_title', 'Your OG Title')
@section('og_description', 'Your OG description.')

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "url": "{{ route('your.route.name') }}",
  "name": "Your Page Title",
  "isPartOf": {"@id": "{{ url('/') }}/#website"},
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "{{ route('home') }}"},
      {"@type": "ListItem", "position": 2, "name": "Your Page", "item": "{{ route('your.route.name') }}"}
    ]
  }
}
</script>
@endpush
```

---

## 5. Global Layout Schema

The following JSON-LD is output on **every** public page via `layouts/public.blade.php`:

### 5.1 `EducationalOrganization` + `LocalBusiness` + `ChildCare`

```json
{
  "@type": ["EducationalOrganization", "LocalBusiness", "ChildCare"],
  "@id": "https://yoursite.com/#organization",
  "name": "Peekaboo Daycare & Preschool",
  "alternateName": ["Peekaboo Daycare", "Peekaboo Preschool"],
  "foundingDate": "2010",
  "address": {
    "streetAddress": "139B Humewood Drive",
    "addressLocality": "Parklands",
    "addressRegion": "Western Cape",
    "postalCode": "7441",
    "addressCountry": "ZA"
  },
  "geo": { "latitude": "-33.8248", "longitude": "18.4968" },
  "telephone": ["+27215574999", "+27828989967"],
  "email": "peekaboodaycare@telkomsa.net",
  "openingHoursSpecification": [
    { "dayOfWeek": ["Monday–Friday"], "opens": "06:00", "closes": "18:00" }
  ],
  "priceRange": "R3800–R4200/month",
  "areaServed": ["Parklands", "Blouberg", "Table View", "Sunningdale", "Sunridge"],
  "aggregateRating": {
    "ratingValue": "4.9",
    "reviewCount": "150",
    "bestRating": "5"
  },
  "sameAs": ["https://facebook.com/peekaboodaycare"]
}
```

> **Impact:** Enables Google Knowledge Panel, star ratings in search results, Maps integration, and rich business details.

### 5.2 `WebSite` with `SearchAction`

```json
{
  "@type": "WebSite",
  "url": "https://yoursite.com",
  "name": "Peekaboo Daycare & Preschool",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://yoursite.com/?s={search_term_string}"
  }
}
```

---

## 6. Per-Page SEO Reference

### Homepage `/`

| Field | Value |
|---|---|
| **Title** | `Peekaboo Daycare & Preschool — Parklands, Cape Town \| Childcare 3 Months–Grade R` |
| **Description** | `Trusted daycare & preschool in Parklands, Cape Town. CAPS-aligned curriculum, qualified teachers, Christian values. Ages 3 months to Grade R. Half-day from R3,800/mo. Book a tour today.` |
| **Primary keywords** | `daycare Parklands Cape Town`, `preschool Parklands Cape Town`, `Christian preschool Parklands`, `daycare near me Parklands` |
| **Canonical** | `route('home')` |
| **Schema** | `WebPage` + `FAQPage` (5 Q&As → rich snippet eligible) |

---

### About `/about`

| Field | Value |
|---|---|
| **Title** | `About Peekaboo Daycare — Trusted Preschool Parklands, Cape Town Since 2010` |
| **Description** | `Established in 2010, Peekaboo Daycare in Parklands, Cape Town has been a trusted home away from home for 150+ families. CAPS-aligned, Christian values, qualified teachers. Meet our team.` |
| **Primary keywords** | `trusted preschool Cape Town`, `CAPS daycare Cape Town`, `Christian preschool Parklands Cape Town` |
| **Canonical** | `route('about')` |
| **Schema** | `AboutPage` + `BreadcrumbList` |

---

### Programmes `/programs`

| Field | Value |
|---|---|
| **Title** | `Programmes — Baby Room to Grade R \| Peekaboo Daycare Parklands, Cape Town` |
| **Description** | `From Baby Room (3 months) to Grade R — discover age-appropriate programmes at Peekaboo Daycare in Parklands, Cape Town. CAPS-aligned, qualified teachers, low child-to-teacher ratios.` |
| **Primary keywords** | `preschool programmes Cape Town`, `baby room daycare Parklands`, `Grade R Parklands Cape Town` |
| **Canonical** | `route('programs')` |
| **Schema** | `WebPage` + `ItemList` (all 4 programmes) + `BreadcrumbList` |

---

### Programme Detail `/programs/{slug}`

| Field | Value |
|---|---|
| **Title** | `{Programme Name} Programme — Peekaboo Daycare Parklands, Cape Town` _(dynamic)_ |
| **Description** | Dynamic: includes programme name, age range, description + "CAPS-aligned, qualified teachers." |
| **Primary keywords** | Dynamic: `{programme} Parklands Cape Town`, `{programme} daycare Cape Town` |
| **Canonical** | `route('program.detail', $program['id'])` |
| **Schema** | `WebPage` + `Course` (with provider link to organisation) + `BreadcrumbList` (3 levels) |

**Programme slugs and their keywords:**

| Slug | Title keyword | Age target |
|---|---|---|
| `baby-room` | `baby room daycare Parklands`, `infant care Cape Town` | 3–18 months |
| `toddlers` | `toddler programme Parklands Cape Town` | 18 months–3 years |
| `preschool` | `preschool Parklands Cape Town`, `3 year old daycare Cape Town` | 3–4 years |
| `kindergarten` | `Grade R Parklands Cape Town`, `CAPS Grade R preschool` | 5–6 years |

---

### Fees `/fees`

| Field | Value |
|---|---|
| **Title** | `Daycare Fees & Pricing 2026 — Peekaboo Preschool Parklands, Cape Town` |
| **Description** | `Transparent daycare fees at Peekaboo Parklands, Cape Town. Half-day from R3,800/month, full-day from R4,200/month. Optional snack box R400/month. No hidden costs. Sibling discounts available.` |
| **Primary keywords** | `daycare fees Parklands 2026`, `preschool pricing Cape Town`, `full day daycare cost Cape Town` |
| **Canonical** | `route('fees')` |
| **Schema** | `WebPage` + `PriceSpecification` + `BreadcrumbList` |

---

### FAQ `/faq`

| Field | Value |
|---|---|
| **Title** | `Frequently Asked Questions — Peekaboo Daycare Parklands, Cape Town` |
| **Description** | `Got questions about Peekaboo Daycare in Parklands, Cape Town? Find answers about operating hours, fees, CAPS curriculum, sick policy, teacher ratios, registration, and more.` |
| **Primary keywords** | `daycare FAQ Parklands Cape Town`, `preschool questions Cape Town` |
| **Canonical** | `route('faq')` |
| **Schema** | `FAQPage` with **8 Q&As** → eligible for Google FAQ rich snippets |

**FAQs in schema:**
1. What are your operating hours?
2. What is your sick child policy?
3. Do you provide meals?
4. What is your teacher-to-child ratio?
5. Is there a registration fee?
6. What notice period is required?
7. Do you offer sibling discounts?
8. What curriculum does Peekaboo follow?

---

### Contact `/contact`

| Field | Value |
|---|---|
| **Title** | `Contact Peekaboo Daycare — Parklands, Cape Town \| 021 557 4999` |
| **Description** | `Contact Peekaboo Daycare & Preschool in Parklands, Cape Town. Call 021 557 4999 or 082 898 9967, email us, or visit 139B Humewood Drive, Parklands. Book a tour today.` |
| **Primary keywords** | `contact daycare Parklands`, `Peekaboo Daycare contact`, `preschool Cape Town phone number` |
| **Canonical** | `route('contact')` |
| **Schema** | `ContactPage` + `BreadcrumbList` |

---

### Gallery `/gallery`

| Field | Value |
|---|---|
| **Title** | `Gallery — Peekaboo Daycare & Preschool Parklands, Cape Town` |
| **Description** | `Take a peek inside Peekaboo Daycare in Parklands, Cape Town. See our bright classrooms, safe outdoor play areas, activities, and happy children learning every day.` |
| **Canonical** | `route('gallery')` |
| **Schema** | `ImageGallery` + `BreadcrumbList` |

---

### Book a Tour `/book-tour`

| Field | Value |
|---|---|
| **Title** | `Book a School Tour — Peekaboo Daycare Parklands, Cape Town` |
| **Description** | `Book a free tour at Peekaboo Daycare in Parklands, Cape Town. Visit our facilities, meet our qualified teachers, and see our CAPS-aligned programmes in action. Tours available weekdays.` |
| **Primary keywords** | `book daycare tour Parklands Cape Town`, `visit preschool Cape Town` |
| **Canonical** | `route('book-tour')` |
| **Schema** | `WebPage` + `BreadcrumbList` |

---

### Enrol `/enrol`

| Field | Value |
|---|---|
| **Title** | `Enrol Your Child — Peekaboo Daycare Parklands, Cape Town \| Apply Online` |
| **Description** | `Enrol your child at Peekaboo Daycare & Preschool in Parklands, Cape Town. Simple online application — takes 10 minutes. Accepting applications for 2026. Ages 3 months to Grade R.` |
| **Primary keywords** | `enrol preschool Parklands 2026`, `daycare application Cape Town` |
| **Canonical** | `route('enrol.index')` |
| **Schema** | `WebPage` + `BreadcrumbList` |

> **Note:** `/enrol/form`, `/enrol/thank-you`, and `/enrol/status/{id}` are **excluded** from the sitemap and blocked in robots.txt to prevent indexing of form/transactional pages.

---

## 7. Sitemap & Robots.txt

### Sitemap — `/sitemap.xml`

**Controller:** `app/Http/Controllers/Public/SitemapController.php`
**View:** `resources/views/public/sitemap.blade.php`
**Route:** `GET /sitemap.xml` → `sitemap`

Returns a valid XML sitemap with 13 URLs:

| URL | Priority | Change Frequency |
|---|---|---|
| `/` | 1.0 | weekly |
| `/programs` | 0.9 | monthly |
| `/fees` | 0.9 | monthly |
| `/book-tour` | 0.9 | weekly |
| `/enrol` | 0.9 | weekly |
| `/about` | 0.8 | monthly |
| `/faq` | 0.8 | monthly |
| `/programs/baby-room` | 0.8 | monthly |
| `/programs/toddlers` | 0.8 | monthly |
| `/programs/preschool` | 0.8 | monthly |
| `/programs/kindergarten` | 0.8 | monthly |
| `/contact` | 0.7 | monthly |
| `/gallery` | 0.6 | monthly |

Programme detail pages are **dynamically generated** from `MockData::programs()` — adding a new programme automatically adds it to the sitemap.

### Robots.txt — `/robots.txt`

**Route:** `GET /robots.txt` → `robots` (inline closure in `routes/web.php`)

```
User-agent: *
Allow: /
Disallow: /admin/
Disallow: /parent/
Disallow: /teacher/
Disallow: /child/
Disallow: /login
Disallow: /register/
Disallow: /forgot-password
Disallow: /reset-password
Disallow: /enrol/form
Disallow: /enrol/thank-you
Disallow: /enrol/status/

Sitemap: https://yoursite.com/sitemap.xml
```

> The `Sitemap:` line is dynamically generated via `route('sitemap')` — will always reflect the correct domain.

---

## 8. File Reference

### New Files Created

| File | Purpose |
|---|---|
| `app/Http/Controllers/Public/SitemapController.php` | Generates `/sitemap.xml` with all public URLs + priorities |
| `resources/views/public/sitemap.blade.php` | XML sitemap template |
| `SEO_IMPLEMENTATION.md` | This document |

### Modified Files

| File | What Changed |
|---|---|
| `resources/views/layouts/public.blade.php` | Full `<head>` overhaul — title, desc, keywords, robots, canonical, OG, Twitter, Geo meta, global JSON-LD schema, `@stack('schema')` |
| `resources/views/public/home.blade.php` | New title/desc/keywords/canonical/OG + `WebPage` + `FAQPage` schema |
| `resources/views/public/about.blade.php` | New title/desc/keywords/canonical/OG + `AboutPage` schema |
| `resources/views/public/programs.blade.php` | New title/desc/keywords/canonical/OG + `WebPage` + `ItemList` schema |
| `resources/views/public/program-detail.blade.php` | Dynamic per-slug SEO meta + `WebPage` + `Course` schema |
| `resources/views/public/fees.blade.php` | New title/desc/keywords/canonical/OG + `WebPage` + `PriceSpecification` schema |
| `resources/views/public/faq.blade.php` | New title/desc/keywords/canonical/OG + `FAQPage` schema (8 Q&As) |
| `resources/views/public/contact.blade.php` | New title (with phone)/desc/keywords/canonical/OG + `ContactPage` schema |
| `resources/views/public/gallery.blade.php` | New title/desc/keywords/canonical/OG + `ImageGallery` schema |
| `resources/views/public/book-tour.blade.php` | New title/desc/keywords/canonical/OG + `WebPage` schema |
| `resources/views/public/enrol/index.blade.php` | New title/desc/keywords/canonical/OG + `WebPage` schema |
| `resources/views/public/enrol/form.blade.php` | Added canonical (noindex via robots.txt + sitemap exclusion) |
| `resources/views/public/enrol/thank-you.blade.php` | Added canonical (noindex via robots.txt + sitemap exclusion) |
| `routes/web.php` | Added `SitemapController` import + `/sitemap.xml` + `/robots.txt` routes |

---

## 9. Google Business Profile Checklist

> **This is the #1 SEO priority** — 70%+ of daycare enquiries come from the Google Maps 3-pack, not organic results.

### Action Items (Do These First)

- [ ] **Primary category:** `Preschool`
- [ ] **Add secondary categories:** `Day care center`, `Nursery school`, `Educational institution`, `Child care agency`
- [ ] **Upload 20+ photos:** classrooms, outdoor area, meals, activities, staff, entrance
- [ ] **Post weekly:** enrolment open, events, photos, term dates
- [ ] **Reply to every review** within 24 hours
- [ ] **Add all services:** Holiday Care, Extra Murals, Sleepovers, Snack Box, Grade R, Baby Room
- [ ] **Enable messaging** (direct conversion from Maps)
- [ ] **Add booking link** → `https://yoursite.com/book-tour`
- [ ] **Add website link** → `https://yoursite.com`
- [ ] **Verify NAP is identical** across site, GBP, directories: `Peekaboo Daycare & Preschool`, `139B Humewood Drive, Parklands, 7441, Cape Town`, `021 557 4999`
- [ ] **Add FAQ section on GBP** — copy from the FAQ page
- [ ] **Set holiday hours** for school closures
- [ ] **Submit to Google Search Console** and add sitemap URL: `https://yoursite.com/sitemap.xml`

### Directory Listings to Claim/Update (NAP Consistency)

- [ ] Google Business Profile _(primary)_
- [ ] Gumtree.co.za
- [ ] Yellow Pages SA (yellin.co.za)
- [ ] SchoolMyKids.com
- [ ] PrivateSchoolSearch.co.za
- [ ] Facebook Business Page (already exists — keep NAP identical)
- [ ] Apple Maps (claim via Apple Business Connect)

---

## 10. Next Steps / Phase 2

### Content Pages (Keyword Gaps vs Competitors)
These pages were intentionally **not created** in Phase 1 but represent the biggest remaining keyword opportunities:

| Page | Target Keyword | Priority |
|---|---|---|
| `/holiday-care` | `holiday care Parklands Cape Town 2026` | 🔴 High |
| `/extra-murals` | `extra murals preschool Parklands` | 🟠 Medium |
| `/christian-values` | `Christian preschool Cape Town Parklands` | 🟠 Medium |
| `/school-readiness` | `school readiness Grade R Cape Town` | 🟠 Medium |
| `/blog` | Hub for long-tail content | 🟡 Phase 3 |

### Blog Posts (Long-Tail Authority)
Once a `/blog` section exists:

| Post | Keyword |
|---|---|
| "When Should My Child Start Preschool in South Africa?" | `when to start preschool SA` |
| "CAPS Curriculum Explained: What Grade R Really Means" | `CAPS Grade R Cape Town` |
| "5 Things to Look for in a Daycare (Cape Town Guide)" | `best daycare Cape Town checklist` |
| "Holiday Care at Peekaboo — What to Expect" | `holiday care Cape Town daycare` |
| "How We Keep Children Safe at Peekaboo" | `safe daycare Cape Town` |
| "Extra Murals at Preschool: Benefits for Young Children" | `extra murals preschool benefits` |

### Technical Phase 2

- [ ] Add OG default image (`assets/img/peekaboo/og-default.jpg`) — 1200×630px branded image
- [ ] Add `Event` schema for open days / tour dates (link to `/book-tour`)
- [ ] Add `Review` schema for individual testimonials
- [ ] Core Web Vitals audit — target LCP < 2.5s, CLS < 0.1
- [ ] Submit sitemap to Google Search Console
- [ ] Submit sitemap to Bing Webmaster Tools
- [ ] Monitor Google Search Console for impressions on target keywords (allow 6–8 weeks)

---

*SEO implemented by ShiftTech — 25 March 2026*

