<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>
<% if $Content %><div class="element__content">$Content</div><% end_if %>

<% if $Files %>
    <% loop $Files %>
        <p><a href="$File.URL">$File.Title<br /><span>$File.Size $File.Extension.UpperCase</span></a></p>
    <% end_loop %>
<% end_if %>
