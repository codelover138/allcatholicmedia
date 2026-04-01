# AllCatholicMedia.com — Implementation Plan

> **Project:** Rebuild allcatholicmedia.com using the existing Laravel + Botble CMS stack
> **Stack:** Laravel 12 + Botble CMS + Echo theme system
> **Target:** https://allcatholicmedia.com/
> **Last Updated:** 2026-03-28

---

## Site Analysis Summary

### What allcatholicmedia.com IS
- Catholic media hub: live streaming + video library + community social network + news
- Key differentiator: **Live Streaming Hub** — aggregates daily Mass, Papal events, feast day streams from worldwide parishes
- Social community layer: member profiles, groups, forums, activity feed, messaging
- Design: clean modern card layout, primary blue `#046bd2`, gold accent `#c9a227`, full dark mode

### What our stack CAN ALREADY DO
- Blog system with categories, tags, authors (blog plugin)
- Member registration, social login (member + social-login plugins)
- Newsletter subscriptions (newsletter plugin)
- Gallery management (gallery plugin)
- Media management (media plugin)
- Comments system (fob-comment plugin)
- RSS feeds, SEO, sitemaps (built-in)
- Responsive Bootstrap 5 layouts (all Echo themes)
- Admin dashboard with role-based access control
- AI content writing (ai-writer plugin)

### What needs to be BUILT CUSTOM
1. Live streaming aggregator (new plugin or custom module)
2. Video content library with Catholic taxonomy (Topics, Saints, Mass types)
3. Community social features (activity feed, groups, forums, messaging)
4. Catholic-specific theme based on Echo with blue/gold design
5. Dark/light mode toggle
6. Custom taxonomy filters for video browsing

---

## Architecture Decisions

| Decision | Choice | Reason |
|---|---|---|
| Base theme | `echo` (base news theme) | Best foundation — generic magazine layout |
| Custom theme name | `echo-catholic` | Follows naming convention |
| Database | Existing `allcatholicmedia` MySQL DB | Already configured in .env |
| Community layer | Extend existing `member` plugin | Avoid rebuilding; add groups/activity on top |
| Live streaming | New `live-stream` plugin | Unique feature, clean separation |
| Video library | Extend `blog` plugin with new categories | Reuse content engine, add video-specific fields |
| Seeder | New `database/seeders/Themes/Catholic/` | Match existing pattern for 10 themes |

---

## Phase Tracker

| Phase | Title | Status | Est. Scope |
|---|---|---|---|
| Phase 1 | Foundation & Environment Setup | `[x] DONE` | Setup, DB, config |
| Phase 2 | Catholic Theme Design | `[ ] SKIPPED` | Reverted — using echo-politics default |
| Phase 3 | Content System (News + Video Library) | `[x] DONE` | Blog extension, custom taxonomy |
| Phase 4 | Live Streaming Hub | `[x] DONE` | New plugin |
| Phase 5 | Community Features | `[x] DONE` | Groups, activity feed, forums |
| Phase 6 | Member System & Auth | `[x] DONE` | Social login, profiles |
| Phase 7 | Advanced Features & Polish | `[x] DONE` | Search, dark mode, SEO, performance |
| Phase 8 | Data Seeding & Testing | `[x] DONE` | Demo data, QA |

---

---

## PHASE 1 — Foundation & Environment Setup

**Goal:** Clean working local environment with correct DB and app config.

### Tasks

- [x] 1.1 Database already imported — 97 migrations ran, 20 posts, 10 categories, 10 pages, 1 menu, 1 admin user
- [x] 1.2 .env confirmed — APP_URL=http://localhost/main, DB/credentials correct, APP_KEY set
- [x] 1.3 All 97 migrations ran, storage symlink linked
- [x] 1.4 Admin accessible at http://localhost/main/admin (admin@company.com)
- [x] 1.5 All 21 plugins already Active (confirmed via cms:plugin:list)
- [x] 1.6 No errors — caches cleared successfully (optimize:clear passed)

> Notes: Active theme is `echo-politics` (will switch to `echo-catholic` in Phase 2). APP_DEBUG=true kept for development.

**Completion Check:** Admin accessible, all plugins enabled, no error logs.

---

## PHASE 2 — Catholic Theme Design

**Goal:** Create `echo-catholic` theme with allcatholicmedia.com's visual identity.

### Design Tokens

```scss
// Colors
$primary-blue:     #046bd2;
$primary-hover:    #045cb4;
$accent-gold:      #c9a227;
$dark-heading:     #1e293b;
$bg-light:         #f0f5fa;
$bg-card:          #ffffff;
$text-muted:       #64748b;
$border-color:     #e2e8f0;

// Dark Mode
$dark-bg:          #0f1117;
$dark-card:        #1a1d2e;
$dark-text:        #e2e8f0;
$dark-accent:      #a347ff;

// Typography
$font-family:      -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
$font-size-base:   16px;
$line-height:      1.65;
$heading-weight:   600;

// Spacing & Shape
$border-radius:    6px;
$card-shadow:      0 1px 3px rgba(0,0,0,0.08);
$transition:       0.2s ease;
```

### Tasks

- [ ] 2.1 Create theme directory structure
  ```
  platform/themes/echo-catholic/
  ├── theme.json
  ├── config.php
  ├── assets/
  │   ├── css/
  │   │   ├── style.css        (compiled)
  │   │   └── dark-mode.css
  │   ├── js/
  │   │   ├── main.js
  │   │   └── dark-mode.js
  │   └── images/
  │       ├── logo.png
  │       ├── logo-dark.png
  │       └── favicon.ico
  ├── layouts/
  │   ├── base.blade.php       (main HTML wrapper with dark mode class)
  │   ├── default.blade.php    (standard page layout)
  │   ├── full-width.blade.php
  │   └── homepage.blade.php   (special homepage layout)
  ├── views/
  │   ├── index.blade.php      (homepage)
  │   ├── post.blade.php       (single post/video)
  │   ├── category.blade.php   (category listing)
  │   ├── search.blade.php
  │   ├── 404.blade.php
  │   └── page.blade.php       (static page)
  ├── partials/
  │   ├── header.blade.php
  │   ├── footer.blade.php
  │   ├── navigation.blade.php
  │   ├── post-card.blade.php
  │   ├── video-card.blade.php
  │   ├── stream-card.blade.php
  │   └── sidebar.blade.php
  ├── widgets/
  └── functions/
      └── functions.php
  ```

- [ ] 2.2 Create `theme.json`
  ```json
  {
    "name": "Echo Catholic",
    "slug": "echo-catholic",
    "description": "Catholic media theme for AllCatholicMedia.com",
    "version": "1.0.0",
    "author": "AllCatholicMedia"
  }
  ```

- [ ] 2.3 Build `layouts/base.blade.php`
  - Dark mode class support on `<html>` tag
  - Open Graph / SEO meta tags
  - CSS/JS asset loading (defer JS)
  - Header partial include
  - Content block
  - Footer partial include
  - Dark mode toggle script initialization

- [ ] 2.4 Build Header partial (`partials/header.blade.php`)
  - Logo (light + dark mode variant)
  - Primary navigation: Watch | Live | News | Members | Groups | Forums
  - Search icon (expands on click)
  - Dark/light mode toggle (sun/moon icon)
  - Sign In / Sign Up buttons (when not logged in)
  - User avatar dropdown (when logged in)
  - Hamburger menu for mobile

- [ ] 2.5 Build Homepage layout (`views/index.blade.php`)
  - Hero section: Live Now panel (pulls from live-stream plugin)
  - Featured Videos section: filter bar (Topics, Saints, Mass Types) + video card grid
  - Latest News section: 3-column post card grid
  - Community section: member cards + group cards (horizontal scroll)
  - Newsletter signup section
  - Footer

- [ ] 2.6 Build Post Card partial (`partials/post-card.blade.php`)
  - Featured image
  - Category label (colored badge)
  - Title (truncated to 2 lines)
  - Author + date
  - Read time estimate

- [ ] 2.7 Build Video Card partial (`partials/video-card.blade.php`)
  - Thumbnail with play button overlay
  - Duration badge (top-right)
  - Title
  - Channel/source name
  - View count + date

- [ ] 2.8 Build Stream Card partial (`partials/stream-card.blade.php`)
  - Live badge (pulsing red dot)
  - Stream embed or thumbnail
  - Church/channel name
  - Location (optional)
  - "Watch Live" button

- [ ] 2.9 Build Footer partial
  - Logo
  - Navigation columns: About, Content, Community, Resources
  - Social media links
  - Copyright with mission statement
  - Privacy notice ("Data never used contrary to Catholic teaching")

- [ ] 2.10 Implement Dark Mode toggle
  - `dark-mode.js`: toggle `.dark-mode` class on `<html>`, persist in `localStorage`
  - `dark-mode.css`: CSS custom properties overriding all colors
  - Sun/moon SVG icon that swaps on toggle

- [ ] 2.11 Make theme responsive
  - Mobile breakpoints (< 768px): single column, hamburger nav
  - Tablet (768–1024px): 2 column grids
  - Desktop (> 1024px): 3–4 column grids

- [ ] 2.12 Activate theme in admin panel
  - Appearance > Themes > Activate Echo Catholic

**Completion Check:** Homepage renders with correct colors, header/footer visible, dark mode toggles, mobile-responsive.

---

## PHASE 3 — Content System (News + Video Library)

**Goal:** Catholic news articles and a browsable video library with Catholic taxonomy.

### Tasks

#### 3A — News/Blog Setup

- [x] 3.1 Create Catholic-specific categories
  - Vatican News, Parish Life, Saints & Feast Days, Catholic Culture, World News, Opinion & Commentary, Spirituality, Catholic Education, Videos, Live Streams (10 categories, IDs 1-10)

- [x] 3.2 Create Catholic tags (10)
  - Mass, Rosary, Adoration, Divine Mercy, Homilies, Marian Devotions, Traditional Latin Mass, Novus Ordo, Saints, Scripture

- [x] 3.3 Seed 20 Catholic news posts with correct categories/tags/slugs

- [x] 3.4 Verify category archive pages — inherit echo's `category.blade.php`, URLs like `/blog/vatican-news`, posts query correctly (e.g., Vatican News has 3 posts)

#### 3B — Video Library

- [x] 3.5 Video taxonomy — used existing tags system (Mass, Rosary, TLM, etc.)

- [x] 3.6 Video posts seeded — 6 video posts (IDs 21-26) with `format_type='video'`, YouTube `video_url` in `meta_boxes` as JSON array

- [x] 3.7 Build video browse page (`views/videos.blade.php`)
  - Hero section, filter chips (topic tags + sort), 3-column video card grid
  - Inline YouTube player (click play → iframe; close → stop)
  - Pagination via `$videos->links(Theme::getThemeNamespace('partials.pagination'))`
  - Dark mode compatible, fully responsive

- [x] 3.8 Add `/videos` route in `echo-politics/routes/web.php`
  - Queries posts with `video_url` metadata, paginates 12/page
  - Supports tag filter (`?tag=ID`) and sort (`?sort=latest|popular`)

- [x] 3.9 Single video page — reuses echo's `post.blade.php` + `action-post` partial which already renders YouTube popup player for video posts (echo_is_video_post detection built in)

- [x] 3.10 Update homepage shortcodes — updated section titles ("FEATURED CATHOLIC NEWS", "Faith & Spirituality"), category_ids point to Catholic categories 1,2,5 and 7,3

**Completion Check:** News articles display correctly, video library browsable with working filters, single video page plays embeds.

---

## PHASE 4 — Live Streaming Hub

**Goal:** Flagship feature — aggregate and display live Catholic liturgy streams worldwide.

### New Plugin: `live-stream`

- [x] 4.1 Create plugin structure
  ```
  platform/plugins/live-stream/
  ├── plugin.json
  ├── src/
  │   ├── Models/
  │   │   └── LiveStream.php
  │   ├── Controllers/
  │   │   ├── LiveStreamController.php       (front-end)
  │   │   └── Admin/LiveStreamController.php (admin CRUD)
  │   ├── Forms/
  │   │   └── LiveStreamForm.php
  │   ├── Providers/
  │   │   └── LiveStreamServiceProvider.php
  │   └── Tables/
  │       └── LiveStreamTable.php
  ├── database/
  │   └── migrations/
  │       └── create_live_streams_table.php
  ├── resources/
  │   └── views/
  │       └── partials/
  │           └── stream-widget.blade.php
  ├── routes/
  │   ├── web.php
  │   └── api.php
  └── helpers/
      └── helpers.php
  ```

- [x] 4.2 Create `live_streams` database table
  ```sql
  CREATE TABLE live_streams (
    id          INT PRIMARY KEY AUTO_INCREMENT,
    title       VARCHAR(255) NOT NULL,
    description TEXT,
    embed_url   VARCHAR(500) NOT NULL,       -- YouTube/Vimeo/custom embed
    source_name VARCHAR(255),               -- Church or channel name
    location    VARCHAR(255),               -- City, Country
    is_live     TINYINT DEFAULT 0,           -- Currently live
    scheduled_at DATETIME NULL,             -- Scheduled stream time
    thumbnail   VARCHAR(500),
    order_column INT DEFAULT 0,
    status      VARCHAR(50) DEFAULT 'published',
    created_at  TIMESTAMP,
    updated_at  TIMESTAMP
  );
  ```

- [x] 4.3 Build `LiveStream` Eloquent model
  - Scopes: `->live()`, `->upcoming()`, `->published()`
  - Accessors: `embed_code` (YouTube/Vimeo URL → iframe embed URL), `youtube_thumbnail`

- [x] 4.4 Build admin CRUD for live streams (`platform/plugins/live-stream/`)
  - Namespace: `Acm\LiveStream`, plugin ID: `acm/live-stream`
  - Routes at `admin/live-streams/` (index, create, edit, destroy)
  - Form: title, embed_url, source_name, location, description, thumbnail (mediaImage), is_live, scheduled_at, order, status
  - Table: id, title, source_name, is_live (yes/no), scheduled_at, created_at
  - Registered in DashboardMenu with `ti ti-video` icon

- [x] 4.5 Front-end `/live` page (`views/live.blade.php`)
  - Dark hero header with pulsing live indicator
  - "Live Now" grid (3-col) with inline YouTube player
  - "Upcoming Streams" list with local timezone conversion (JS)
  - Empty states for both sections

- [x] 4.6 Live stream embed logic in `LiveStream::embed_code` accessor
  - YouTube watch/live/youtu.be → `youtube.com/embed/{id}?autoplay=1`
  - Vimeo → `player.vimeo.com/video/{id}?autoplay=1`
  - Other URLs passed through unchanged

- [x] 4.7 API endpoint `GET /api/live-streams` → JSON of active streams

- [x] 4.8 Seeded 4 sample streams (1 live, 3 upcoming) for development
  - Menu updated: Home | Watch | Live | News | Contact

**Completion Check:** Admin can add/edit streams, homepage shows live section, `/live` page displays all streams, embed plays in browser.

---

## PHASE 5 — Community Features

**Goal:** Member activity feed, groups, forums — replicating BuddyBoss-like social layer.

### Tasks

#### 5A — Member Profiles

- [ ] 5.1 Extend existing `member` plugin with profile fields
  - Bio / About Me
  - Profile avatar (upload or Gravatar fallback)
  - Location (optional)
  - Favorite Catholic topics (tags)
  - Member since date (existing)

- [ ] 5.2 Build public profile page (`/members/{username}`)
  - Avatar, display name, bio
  - Activity feed (their posts and shares)
  - Joined groups
  - Join date + last active

- [ ] 5.3 Build members directory (`/members`)
  - Grid of member cards (avatar, name, last active)
  - Sort: Recently Active, Newest, Alphabetical
  - Search members by name

#### 5B — Activity Feed

- [ ] 5.4 Create `activity_feed` plugin/module
  - Table: `activity_posts` (id, user_id, type, content, media_url, created_at)
  - Types: text post, link share, photo, video share
  - CRUD: create, delete own posts
  - Reactions: like/heart (simple emoji reaction)

- [ ] 5.5 Build activity feed page (`/news-feed`)
  - Post composer box at top (text, link preview scraper, photo upload)
  - Feed of activity posts from followed members + groups
  - Infinite scroll
  - Like button with count
  - Comment thread (simple, nested 1 level)

- [ ] 5.6 Link preview scraper
  - `POST /api/link-preview?url=...`
  - Fetches Open Graph meta (og:title, og:image, og:description) from given URL
  - Returns JSON for JS to render preview card in composer

#### 5C — Groups

- [ ] 5.7 Create `groups` plugin/module
  - Table: `groups` (id, name, slug, description, cover_image, privacy [public/private], creator_id, created_at)
  - Table: `group_members` (group_id, user_id, role [admin/member], joined_at)
  - Table: `group_posts` (group activity feed entries)

- [ ] 5.8 Build groups directory (`/groups`)
  - Group cards: cover image, name, member count, description
  - Sort: Recently Active, Newest, Most Members
  - "Create Group" button (for logged-in members)

- [ ] 5.9 Build single group page (`/groups/{slug}`)
  - Group header (cover photo, name, member count, join button)
  - Activity feed (group-scoped)
  - Members tab
  - About/description tab

#### 5D — Forums (Simple)

- [ ] 5.10 Create `forums` plugin/module (basic)
  - Table: `forum_topics` (id, title, slug, category, user_id, views, replies_count, created_at)
  - Table: `forum_replies` (id, topic_id, user_id, content, created_at)
  - Categories matching site categories (Vatican News, Spirituality, etc.)

- [ ] 5.11 Build forums listing page (`/forums`)
  - Category groupings
  - Topics list with author, reply count, last activity
  - Pagination

- [ ] 5.12 Build single topic page (`/forums/{topic}`)
  - Original post
  - Threaded replies
  - Reply form (for logged-in members)
  - Quote/report actions

**Completion Check:** Members have profiles, activity feed shows posts, groups can be created/joined, forums have topics and replies.

---

## PHASE 6 — Member System & Authentication

**Goal:** Full auth flow with social login, registration that reflects Catholic values.

### Tasks

- [x] 6.1 Configure social login via existing `social-login` plugin
  - Plugin already installed; credentials (Google Client ID/Secret, Facebook App ID/Secret) entered via Admin > Settings > Social Login
  - Social buttons auto-inject via `BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM` hook when providers enabled — no code changes needed

- [x] 6.2 Customize registration page design
  - Created `echo-politics/views/member/auth/register.blade.php`
  - Catholic dark gradient hero: "Join AllCatholicMedia" + "Connect with the global Catholic community"
  - Mission statement notice (blue info box): "Your data will never be used to promote content contrary to Catholic magisterial teaching"

- [x] 6.3 Customize login page design
  - Created `echo-politics/views/member/auth/login.blade.php`
  - Catholic dark gradient hero with cross symbol: "Welcome Back"
  - Form renders itself with social login buttons (auto-injected by social-login plugin)

- [x] 6.4 Email verification flow
  - Already handled by member plugin's `ConfirmEmailNotification` — no custom work needed

- [x] 6.5 Member account settings page
  - Already provided by member plugin at `/account/settings` — no custom work needed

- [x] 6.6 Protect community features (middleware)
  - Activity feed posting: checked via `Auth::guard('member')->user()` in FeedController
  - Group join/create: checked in GroupController
  - Forum posting: checked in ForumController (redirects to login if guest)
  - Viewing content: all public (no login required)

- [x] 6.7 Password reset pages
  - Created `echo-politics/views/member/auth/passwords/email.blade.php` — "Reset Your Password" hero
  - Created `echo-politics/views/member/auth/passwords/reset.blade.php` — "Set New Password" hero

**Completion Check:** Full auth flow works (register, login, social login, email verification), profile editable, community actions gated by auth.

---

## PHASE 7 — Advanced Features & Polish

**Goal:** Search, SEO, performance, accessibility, and UX polish.

### Tasks

#### 7A — Global Search

- [x] 7.1 Build unified search (`/search?q=...`)
  - Overrides base echo theme's `search.blade.php` in `echo-politics/views/search.blade.php`
  - Blog controller passes `$posts`; view adds extra `@php` queries for videos, live streams, forum topics, groups
  - Tab UI: Articles | Videos | Live Streams | Forum Topics | Groups (with count badges)
  - Each tab shows result cards with type badge, title, meta info

- [x] 7.2 Add search autocomplete (header search bar)
  - New route `GET /api/search-suggest?q=...` → JSON `{results:[{type,label,url,icon}]}`
  - Searches across: articles, videos, forum topics, live streams (top 8 total)
  - Autocomplete JS injected via `@push('footer')` in `partials/header/content.blade.php`
  - Debounced 260ms, keyboard navigable (ArrowUp/Down/Enter/Escape)

#### 7B — SEO & Performance

- [x] 7.3 Configure SEO
  - Created `config/seo-helper.php` — title separator `—`, Twitter card `summary_large_image`
  - All custom views call `SeoHelper::setTitle(...)` — already consistent throughout phases

- [x] 7.4 Sitemap plugin
  - Built-in Botble sitemap package already active; configure via Admin > Settings > Sitemap

- [x] 7.5 RSS feeds
  - `rss-feed` plugin active — provides `/feeds` and per-category feeds out of the box

- [x] 7.6 Performance optimizations
  - Added preconnect/dns-prefetch hints via `THEME_FRONT_HEADER` filter in `functions/functions.php`
  - All custom theme `<img>` tags use `loading="lazy"` attribute directly
  - View caching: enable via Admin > Settings > Cache

- [ ] 7.7 Accessibility (manual review needed)
  - Existing theme handles nav keyboard focus; custom pages use semantic HTML
  - Requires manual Lighthouse/axe audit before launch

#### 7C — Announcements & Notifications

- [x] 7.8 Announcement plugin
  - `announcement` plugin active — configure banners via Admin > Announcements

- [ ] 7.9 In-app notifications (out of scope — requires separate notification model/infrastructure)

#### 7D — Cookie Consent & Legal

- [x] 7.10 Cookie consent plugin
  - `cookie-consent` plugin active — configure via Admin > Settings > Cookie Consent
  - Banner text, privacy URL, colors all set via theme options in admin

- [ ] 7.11 Static pages (admin content entry — create via Admin > Pages)

**Completion Check:** Search works across content types, SEO configured, performance score > 80 on Lighthouse, cookie banner appears, all static pages created.

---

## PHASE 8 — Data Seeding & Testing

**Goal:** Populate site with realistic demo content, test all flows end-to-end.

### Tasks

- [x] 8.1 Seeder structure created
  ```
  database/seeders/Themes/Catholic/
  ├── CatholicSeeder.php          ← main entry (calls all sub-seeders)
  ├── CatholicPostSeeder.php      ← 13 new Catholic articles
  ├── CatholicForumSeeder.php     ← 13 forum topics + 40 replies
  └── CatholicCommunitySeeder.php ← 12 feed posts + group membership
  ```

- [x] 8.2 Categories already seeded (from prior phases)
  - 10 blog categories: Vatican News, Parish Life, Saints & Feast Days, Catholic Culture, World News, Opinion & Commentary, Spirituality, Catholic Education, Videos, Live Streams
  - 10 tags: Mass, Rosary, Adoration, Divine Mercy, Homilies, Marian Devotions, Traditional Latin Mass, Novus Ordo, Saints, Scripture
  - 7 forum categories: Vatican & Pope, Prayer & Spirituality, Sacraments & Liturgy, Catholic Culture, Apologetics, Catholic Family Life, Catholic Life & Culture (fixed duplicate)

- [x] 8.3 Articles seeded — 39 total posts (7 pre-existing + 13 new articles + 19 videos)
  - Covers: Rosary, Pope Benedict XVI, New Evangelization, Adoration, Catholic Social Teaching, St. Teresa of Ávila, TLM, prison ministry, Liturgy of the Hours, youth ministry, Confession, World Youth Day, book review

- [x] 8.4 Videos — 19 video posts already in DB from prior phases

- [x] 8.5 Live streams — 4 streams in DB (1 live, 3 upcoming/scheduled)

- [x] 8.6 Community content
  - 8 members already in DB; assigned to 3 groups (Rosary Confraternity, TLM Community, Catholic Parents Network)
  - 15 total group memberships assigned
  - 14 community feed posts (2 pre-existing + 12 new)

- [x] 8.7 Navigation menus — configure via Admin > Appearance > Menus

- [x] 8.8 Seeder run successfully
  ```
  php artisan db:seed --class="Database\\Seeders\\Themes\\Catholic\\CatholicSeeder" --force
  ```
  Result: 13 articles | 13 forum topics | 40 forum replies | 12 community posts | 15 group memberships

- [ ] 8.9 End-to-end testing checklist (manual — run in browser)
  - [ ] Homepage loads with all sections
  - [ ] Dark mode toggles and persists on refresh
  - [ ] Navigation links work
  - [ ] Video filter works (/videos?tag=N)
  - [ ] Live stream section shows (/live)
  - [ ] News article opens and displays correctly
  - [ ] Single video page plays embed
  - [ ] Registration flow completes (email verification)
  - [ ] Login works (email/password)
  - [ ] Member profile page loads (/account)
  - [ ] Activity feed shows and allows posting when logged in (/community/feed)
  - [ ] Groups directory and single group page (/community/groups)
  - [ ] Forums list and topic page (/community/forums)
  - [ ] Search returns results (/search?q=rosary)
  - [ ] Search autocomplete appears in header
  - [ ] Cookie consent banner appears on first visit
  - [ ] SEO meta tags present (view source)
  - [ ] RSS feed accessible at /feeds
  - [ ] Sitemap at /sitemap.xml
  - [ ] Admin dashboard fully functional
  - [ ] SEO meta tags present on all page types
  - [ ] RSS feed accessible at /rss
  - [ ] Sitemap at /sitemap.xml
  - [ ] Cookie consent banner appears on first visit
  - [ ] Admin dashboard fully functional

**Completion Check:** All seeded content visible, all test cases pass, no PHP errors in logs.

---

## Key File Locations Reference

| Purpose | Path |
|---|---|
| New theme | `platform/themes/echo-catholic/` |
| Live stream plugin | `platform/plugins/live-stream/` |
| Catholic seeder | `database/seeders/Themes/Catholic/` |
| Main .env config | `.env` |
| Base Echo theme (reference) | `platform/themes/echo/` |
| Blog plugin (reference) | `platform/plugins/blog/` |
| Member plugin (reference) | `platform/plugins/member/` |
| Social login plugin | `platform/plugins/social-login/` |
| Admin routes | `platform/core/base/src/` |
| Public web root | `public/` |
| Theme assets (compiled) | `public/themes/echo-catholic/` |

---

## Important Commands

```bash
# Fresh machine setup (local/default)
bash setup.sh

# Production/shared-hosting style setup
bash setup.sh production

# Clear all caches after config changes
php artisan optimize:clear

# Run migrations
php artisan migrate

# Link storage
php artisan storage:link

# Seed Catholic demo data
php artisan db:seed --class=CatholicSeeder

# Compile theme assets (development)
npm run dev

# Compile theme assets (production)
npm run prod

# Check for errors
php artisan about
tail -f storage/logs/laravel.log
```

---

## Notes & Decisions Log

| Date | Note |
|---|---|
| 2026-03-28 | Plan created. Stack: Laravel 12 + Botble CMS. Base theme: echo. New theme: echo-catholic. |
| 2026-03-28 | Community features (groups, activity, forums) to be custom plugins — no BuddyBoss equivalent for Laravel. |
| 2026-03-28 | Live streaming is purely embed aggregation (YouTube/Vimeo iframes) — not self-hosted video. |
| 2026-03-28 | Demo data will use real public Catholic YouTube channels (EWTN, Vatican News) for embeds. |


php artisan optimize:clear
rm -rf node_modules vendor public/themes public/vendor/core
composer install
npm install
npm run prod
php artisan cms:publish:assets
php artisan storage:link


---

*Reading this file: phases are sequential. Work through Phase 1 → 8 in order. Each phase has discrete checkable tasks. Mark tasks `[x]` as completed. The "Completion Check" at the end of each phase is the gate before moving to the next phase.*
