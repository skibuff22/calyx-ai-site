# calyx-ai.net — Lead-Gen Site

Static site for **Calyx AI** (AI automation services for small businesses).
Hosted on Hostinger (existing plan, $0 incremental cost). Replaces the archived
Content Governance SaaS ([skibuff22/Calyx-Ai.net](https://github.com/skibuff22/Calyx-Ai.net)).

## Files

| File | Purpose |
|------|---------|
| `index.html` | Single-page site: hero, services, process, about, contact form |
| `contact.php` | Form handler — emails leads to tdoane@calyx-ai.net (PHP `mail()`, honeypot spam guard) |
| `thanks.html` | Post-submit confirmation (noindex) |
| `robots.txt` / `sitemap.xml` | SEO plumbing |

## Deploy to Hostinger

1. hPanel → Websites → calyx-ai.net → **File Manager** → `public_html/`
2. Upload all files from this repo root (or unzip `calyx-ai-site.zip` there)
3. hPanel → **DNS Zone Editor** for calyx-ai.net:
   - Point `@` (A record) at the Hostinger web server IP (shown in hPanel → Hosting → Details)
   - Change `www` CNAME from `polite-pond-0e15c760f.1.azurestaticapps.net` to `calyx-ai.net`
   - **Do not touch MX records** — email stays as-is
4. Enable free SSL for the domain in hPanel if not already active
5. Test: form submit should land in tdoane@calyx-ai.net inbox

## Money plan (the point of all this)

1. **Now — Services lead-gen (this site).** Sell fixed-price AI automation
   projects. One $500–$1,200 project beats a year of $29/mo SaaS subscriptions.
   Drive traffic: local business groups, Nextdoor/Facebook business pages,
   direct outreach to businesses with obvious automatable pain (form backlogs,
   missed calls, manual invoicing).
2. **Next — Content/SEO.** Add `/blog/` articles targeting "AI automation for
   [niche]" long-tail keywords (searchfit-seo plugin is installed for this).
   Add affiliate links to AI tools reviewed in articles.
3. **Later — Free tool as lead magnet.** Resurrect the brand-voice/document
   analyzer from the archived repo as a simple one-shot free tool that captures
   emails. Only build it once traffic exists.

## History

The original SaaS (Azure serverless, Java + Python + React) is archived at
`skibuff22/Calyx-Ai.net` — public, reusable, MIT-yourself-a-license if wanted.
Azure infrastructure was decommissioned July 2026 (was ~$55/mo, mostly Azure
Monitor, with zero customers).
