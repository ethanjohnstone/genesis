<header class="header">
    <div class="header__container">
        <a href="/" class="header__logo">
            <img src="$ThemeDir/images/logo.svg" alt="Black Sheep Creative">
        </a>
        <button class="header__hamburger hamburger hamburger--3dxy" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
        </button>
        <ul class="header__links">
            <% loop $Menu(1) %>
                <li class="header__link">
                    <a href="{$Link}" class="{$LinkingMode}">$MenuTitle</a>
                </li>
            <% end_loop %>
        </ul>
    </div>
</header>