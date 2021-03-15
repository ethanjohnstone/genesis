<div class="row">
    <% loop $PromoList %>
        <div class="col-md-4">
            <% if $Image %><img src="$Image.URL" class="img-fluid mb-2" alt="<% if $Image.Title %>$Image.Title.ATT<% else %>$Title.ATT<% end_if %>"><% end_if %>
            <% if $Title && $ShowTitle %><h3>$Title</h3><% end_if %>
            <% if $Content %>$Content<% end_if %>
            <% if $ElementLink %><p>$ElementLink</p><% end_if %>
        </div>
    <% end_loop %>
</div>
