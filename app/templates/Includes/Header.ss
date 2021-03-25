<header class="header">
    <% loop $Menu(1) %>
        <div class="header__link<% if $isCurrent %> header__link--active<% end_if %>">
            <a href="$Link">$MenuTitle</a>
        </div>
    <% end_loop %>
</header>