=== Stax Addons for Elementor ===
Contributors: staxwp, codezz, geowrge, rtynio
Tags: elementor widgets, page builder addons, slider widget, accordion widget, testimonials
Requires at least: 5.8
Requires PHP: 7.4
Tested up to: 6.9
Stable tag: 1.5.1
Requires Plugins: elementor
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

20+ lightweight widgets and enhancements for Elementor. Modular, fast, and zero bloat — assets load only when used.

== Description ==

**Stax Addons for Elementor** adds 20+ professionally designed widgets to your Elementor page builder — without slowing down your site.

= Why Stax? =

* **Lightweight & Fast** — CSS and JavaScript are loaded only for widgets actually used on the page. No unnecessary scripts, no bloat.
* **Modular** — Enable only the widgets you need from the admin panel. Keep your Elementor editor clean.
* **Developer Friendly** — Clean code, well-structured, and easy to extend.

= 20+ Widgets Included =

* **Slider** — Content slider with title, subtitle, description, image, and button
* **Testimonials** — Customer testimonial layouts with multiple styles
* **Testimonials Slider** — Testimonial carousel with navigation and pagination
* **Accordion & Toggle** — Collapsible content sections with smooth animations
* **Counter** — Animated number counter for statistics and milestones
* **Heading** — Advanced heading with highlighted words, subtitle, and separator
* **Section Title** — Styled section title with subtitle, description, and button
* **Info Box** — Information box with icon, title, and description
* **Icon With Text** — Icon paired with descriptive text in multiple layouts
* **Breadcrumbs** — Automatic breadcrumb navigation for posts, pages, and archives
* **Typeout Text** — Animated typing text effect for dynamic headlines
* **Read More / Expand Text** — Expandable content with a toggle button
* **Scroll Top** — Scroll-to-top button that appears on scroll
* **Button** — Enhanced button with box shadow on hover
* **Info Button** — Informational button with extra details
* **Dropdown Button** — Button with dropdown menu functionality
* **Blockquote** — Styled blockquote element
* **Divider** — Custom divider with icon support
* **Image Interval** — Show different images based on date intervals

= Widget Enhancements =

Stax also enhances existing Elementor widgets:

* **Accordion** — Box shadow, item spacing, item border and border radius
* **Counter** — Extended alignment options
* **Text Editor** — Scrollable content with max height setting

= Performance First =

Unlike heavy all-in-one addons that load dozens of scripts on every page, Stax only loads assets for widgets you actually use. Your PageSpeed score stays high.

= Who Is This For? =

* Website owners who want more Elementor widgets without the bloat
* Designers and developers building landing pages, portfolios, or business sites
* Anyone who values page speed and clean code

= More from StaxWP =

* [BuddyBuilder](https://staxwp.com/go/buddybuilder) — BuddyPress builder for Elementor
* [Visibility Logic](https://wordpress.org/plugins/visibility-logic-elementor/) — Show/hide Elementor widgets based on conditions

= Third-Party Services =

This plugin uses [Appsero](https://appsero.com/) SDK to collect optional, anonymized telemetry data upon user confirmation. This helps us troubleshoot issues faster and improve the plugin. See the [Appsero Privacy Policy](https://appsero.com/privacy-policy/).

== Installation ==

1. Make sure **Elementor** is installed and active.
2. Upload the plugin to your `wp-content/plugins` directory, or install it directly from the WordPress plugin directory.
3. Activate the plugin from the Plugins page.
4. Edit any page with Elementor — you'll find the new widgets in the **Stax** category in the widget panel.

== Frequently Asked Questions ==

= Where can I find the Stax widgets in Elementor? =

Open any page with Elementor, and look for the **Stax Elements** category in the widget panel on the left side. All widgets from this plugin are grouped there.

= Will this slow down my site? =

No. The plugin only loads CSS and JavaScript for widgets that are actively used on the page. If a widget isn't placed on the page, its assets are not loaded at all.

= Does this work with the free version of Elementor? =

Yes. Stax Addons works with both the free and Pro versions of Elementor.

= Can I disable widgets I don't use? =

Yes. Go to the Stax Addons settings page in your WordPress admin to enable or disable individual widgets. Only active widgets appear in the Elementor editor.

= Can I use this alongside other Elementor addons? =

Absolutely. The plugin is designed to be lightweight and conflict-free. It works alongside other Elementor addon plugins without issues.

= Is there a Pro version? =

Currently all widgets are free. We focus on keeping the plugin lightweight and reliable.

== Changelog ==

= 1.5.1 =
* Security: Fixed Stored Cross-Site Scripting vulnerability (CVE-2024-3064)
* Security: Added HTML tag whitelist validation for all widgets with custom tag controls
* Security: Hardened 8 widgets against XSS: Heading, Typeout Text, Blockquote, Counter, Accordion, Section Title, Info Box, Icon with Text

= 1.5.0 =
* Renamed plugin for WordPress.org guidelines compliance
* Fixed compatibility with Elementor 3.5+ (updated widget registration API)
* Replaced deprecated Elementor Schemes with Global Colors and Typography
* Added Requires Plugins header for dependency management
* Added ABSPATH security checks to all PHP files
* Deferred Appsero tracker initialization to init hook
* Removed unnecessary load_plugin_textdomain call
* Updated Appsero SDK to v1.4.0
* Updated tested versions (WP 6.9, Elementor 3.25)

= 1.4.4 =
* Add security checks when saving options data

= 1.4.3 =
* Add Appsero integration

= 1.4.2 =
* Fix deprecated functions

= 1.4.1 =
* New elements: Typeout Text, Blockquote, Icon With Text, Info Button, Section Title, Divider, Counter, Testimonials, Testimonials Slider, Info Box, Accordion & Toggle
* Fixed minor bugs
* Admin panel UI update

= 1.4.0 =
* New element: Image interval
* Updated font icons
* Fix slider widget alignment

= 1.3.0 =
* Added header separator styles

= 1.2.0 =
* Refactor the admin dashboard

= 1.1.0 =
* Added Read more (Expand text) widget

= 1.0.0 =
* Initial release

= Be a contributor =
If you want to contribute, go to our [GitHub Repository](https://github.com/StaxWP/stax-addons-elementor).
