<header class="header">
    <img src="$ThemeDir/images/logo.svg" alt="Black Sheep Creative" class="header__logo">
    <ul class="header__links">
        <% loop $Menu(1) %>
            <li class="header__link<% if $isCurrent %> header__link--active<% end_if %>">
                <a href="$Link">$MenuTitle</a>
            </li>
        <% end_loop %>
    </ul>
</header>