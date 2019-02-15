<header class="header-container">
    <div class="header">
        <div class="logo">
            <a href="/">
                <img src="$ThemeDir/images/logo.svg" alt="$SiteConfig.Title">
            </a>
        </div>
        <div class="hamburger-container">
            <button class="hamburger hamburger--collapse" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
        <nav class="navigation" role="navigation">
            <ul>
                <% loop $Menu(1) %>
                    <li class="$LinkingMode">
                        <a href="$Link"><span>$MenuTitle</span></a>
                    </li>
                <% end_loop %>
            </ul>
            <a class="phone" href="tel:$SiteConfig.PhoneNumber">$SiteConfig.PhoneNumber</a>
            <div class="social-media">
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
            <% if $SiteConfig.CallToActionLabel %>
                <div class="call-to-action">
                    <a href="$SiteConfig.getCallToActionLink()" class="button">$SiteConfig.CallToActionLabel</a>
                </div>
            <% end_if %>
        </nav>
    </div>
</header>