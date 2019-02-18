<footer class="footer-container">
    <div class="footer">
        <div class="footer-main">
            <div class="quick-links">
                <p class="footer-title">Quick Links</p>
                <ul>
                    <% loop $SiteConfig.QuickLinks %>
                        <a href="$SiteTree.Link">$Title »</a>
                    <% end_loop %>
                </ul>
            </div>
            <div class="contact-details">
                <p class="footer-title">Contact Us</p>
                <ul>
                    <li><a href="tel:$SiteConfig.PhoneNumber">$SiteConfig.PhoneNumber »</a></li>
                    <li><a href="mailto:$SiteConfig.ContactFormEmail">$SiteConfig.ContactFormEmail »</a></li>
                    <li><a href="$SiteConfig.LocationLink">$SiteConfig.LocationLine1,<br>$SiteConfig.LocationLine2 »</a></li>
                </ul>
            </div>
            <div class="social-media">
                <p class="footer-title">Follow Us</p>
                <div class="social-media-links">
                    <% if $SiteConfig.FacebookURL %>
                        <a href="https://facebook.com/$SiteConfig.FacebookURL"
                           target="_blank"
                           rel="noopener">
                            <img src="$ThemeDir/images/icons/facebook.svg" alt="Facebook">
                        </a>
                    <% end_if %>

                    <% if $SiteConfig.InstagramLink %>
                        <a href="$SiteConfig.InstagramLink"
                           target="_blank"
                           rel="noopener">
                            <img src="$ThemeDir/images/icons/instagram.svg" alt="Instagram">
                        </a>
                    <% end_if %>

                    <% if $SiteConfig.LinkedInLink %>
                        <a href="$SiteConfig.LinkedInLink"
                           target="_blank"
                           rel="noopener">
                            <img src="$ThemeDir/images/icons/linkedin.svg" alt="LinkedIn">
                        </a>
                    <% end_if %>

                    <% if $SiteConfig.YoutubeLink %>
                        <a href="$SiteConfig.YoutubeLink"
                           target="_blank"
                           rel="noopener">
                            <img src="$ThemeDir/images/icons/youtube.svg" alt="Youtube">
                        </a>
                    <% end_if %>

                    <% if $SiteConfig.SnapchatUsername %>
                        <a href="https://www.snapchat.com/add/$SiteConfig.SnapchatUsername"
                           target="_blank"
                           rel="noopener">
                            <img src="$ThemeDir/images/icons/snapchat.svg" alt="Snapchat">
                        </a>
                    <% end_if %>

                    <% if $SiteConfig.TwitterUsername %>
                        <a href="https://twitter.com/$SiteConfig.TwitterUsername"
                           target="_blank"
                           rel="noopener">
                            <img src="$ThemeDir/images/icons/twitter.svg" alt="Twitter">
                        </a>
                    <% end_if %>
                </div>
            </div>
            <div class="logos">
                <% loop $SiteConfig.FooterLogos %>
                    <a href="$Link" target="_blank" rel="noopener"><img src="$Logo.URL" alt="$Title"></a>
                <% end_loop %>
            </div>
        </div>
        <div class="footer-small">
            <ul class="terms">
                <% loop $SiteConfig.FooterLinks %>
                    <a href="$SiteTree.Link">$Title</a>
                <% end_loop %>
            </ul>
            <div class="site-by">
                <a href="https://www.blacksheepcreative.co.nz/" target="_blank" rel="noopener">Site by Black Sheep</a>
            </div>
            <div class="back-to-top">
                <button><svg width="12" height="7" xmlns="http://www.w3.org/2000/svg"><path d="M1 6l5-5 5 5" stroke="#616161" stroke-width="2.016" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"/></svg>Back to top</button>
            </div>
        </div>
    </div>
</footer>