<header class="header">
    <nav role="navigation">
        <ul>
            <% loop $Menu(1) %>
                <li>
                    <a href="$Link">$MenuTitle</a>
                </li>
            <% end_loop %>
        </ul>
    </nav>
</header>