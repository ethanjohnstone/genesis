<header class="header">
    <div class="container">
        <nav class="main-navigation" role="navigation">
            <ul>
                <% loop $Menu(1) %>
                    <li>
                        <a href="$Link">$MenuTitle</a>
                    </li>
                <% end_loop %>
            </ul>
        </nav>
    </div>
</header>