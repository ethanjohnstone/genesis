<div class="row feature alternating<% if $Last %> last<% end_if %>">
    <% if $Image %>
    <div class="col-sm-5 img-side">
        <img src="$Image.URL" class="img-fluid" alt="<% if $Image.Title %>$Image.Title.ATT<% else %>$Title.ATT<% end_if %>">
    </div>
    <% end_if %>

    <% if $Image %>
    <div class="col-sm-7<% if $Odd %> order-first<% end_if %> text-side">
    <% else %>
    <div class="col-sm-12 text-side">
    <% end_if %>
        <% if $Title %><div class='feature__title'><h3>$Title</h3></div><% end_if %>
        <% if $Content %>
            <div class='feature__content typography'>$Content</div>
        <% end_if %>

        <% if $ElementLink %>$ElementLink<% end_if %>
    </div>
</div>
