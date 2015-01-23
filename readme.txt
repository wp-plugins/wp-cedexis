=== Cedexis Radar Monitoring for WordPress ===
Contributors: arnesonium
Tags: cedexis, webperf, cdn, performance, monitoring, analytics
Requires at least: 4.0
Tested up to: 4.1
Stable tag: v0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RXC68YPEATPUU

Add Cedexis Radar monitoring to your WordPress blogs.

== Description ==

This plugin adds [Cedexis Radar](http://www.cedexis.com/radar/) monitoring to your WordPress
blog. Cedexis Radar is a community-driven real user monitoring (RUM)
tool used to measure website performance. Radar data can be used to
feed the Cedexis Openmix decision-making engine, and also contributes
to a holistic view of network health. 

This plugin relies on the [wp_footer](http://codex.wordpress.org/Function_Reference/wp_footer) action, which most themes
support. If your theme doesn't support it, please contact the theme's
author.

= Usage =

Once configured, this plugin automatically enables Radar tracking
across your WordPress site.

== Installation ==

To install this plugin, follow these directions:

1. Download the latest zip file.
1. Next, load up your WordPress blog’s dashboard, and go to **Plugins > Add New**.
1. Upload the zip file.
1. Click **Activate**.

You will also need a free Cedexis Portal account.

1. Sign up at https://portal.cedexis.com/public/signup.html
1. In the Cedexis Portal, go to **Configure PLT URLs** and add the
   base URL of your WordPress site.
1. Also in the Cedexis Portal, click on **Radar Tag**.
1. Line 3 of the JavaScript code for the Radar Tag begins with "a.src"
   and contains the tag ID that the plugin needs. For instance, in
   "//radar.cedexis.com/1/11917/radar.js" the tag is "11917".
1. Enter the tag ID from the Radar Tag into the plugin's configuration
   screen.

For advanced use, you will want to configure Cedexis API access.

1. Go to the [Cedexis Portal](https://portal.cedexis.com/)
1. In the Cedexis Portal, go to **Administration > Cedexis API**
1. Click **OAuth 2.0 configuration**, then add a new client.
1. Enter the <code>client_id</code> and <code>client_secret</code> on
   the plugin configuration page.

== Frequently Asked Questions ==

= What is Cedexis Radar? =
Cedexis Radar is a free tool for monitoring website availability and
performance. Data from Cedexis Radar is used to route Internet traffic
intelligently. You can read more about Cedexis at their http://cedexis.com/

== Screenshots ==

== Changelog ==
= 0.1 =
* Development pre-release.

== Upgrade Notice ==


