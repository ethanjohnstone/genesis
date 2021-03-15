<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>

<% if $Image %>
    <img src="$Image.URL" class="img-fluid" alt="<% if $Image.Title %>$Image.Title.ATT<% else %>$Title.ATT<% end_if %>">
<% end_if %>
