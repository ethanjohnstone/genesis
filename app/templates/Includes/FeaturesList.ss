<div class="row feature<% if $Last %> last<% end_if %>">
    <% if $Image %>
        <div class="col-md-4">
            <img src="$Image.URL" class="img-fluid" alt="<% if $Image.Title %>$Image.Title.ATT<% else %>$Title.ATT<% end_if %>">
        </div>
    <% end_if %>

    <div class="col-md-<% if $Image %>8<% else %>12<% end_if %>">
        <% if $Title %><div class='feature__title'><h3>$Title</h3></div><% end_if %>
        <% if $Content %>
            <div class='feature__content typography'>$Content</div>
        <% end_if %>

        <% if $ElementLink %>$ElementLink<% end_if %>
    </div>
</div>
