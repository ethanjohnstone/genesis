<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>

<% if $EmbeddedObject %>
    <div class="embed-responsive embed-responsive-16by9">
        $EmbeddedObject
    </div>
    <% if $EmbeddedObject.Title %><h3>$EmbeddedObject.Title</h3><% end_if %>
    <% if $EmbeddedObject.Description %><p>$EmbeddedObject.Description</p><% end_if %>
<% end_if %>
