<div class="card-deck">
    <% loop $PromoList %>
            <div class="card">
                <% if $Image %>
                    <img src="$Image.URL" class="img-fluid promo__image card-img-top" alt="<% if $Image.Title %>$Image.Title.ATT<% else %>$Title.ATT<% end_if %>">
                <% end_if %>
                <div class="card-body">
                    <% if $Title && $ShowTitle %><h3 class="card-title">$Title</h3><% end_if %>
                    <% if $Content %><div class='card-text'>$Content</div><% end_if %>
                    <% if $ElementLink.LinkURL %><a href="$ElementLink.LinkURL" title="Go to $Title.ATT" class="btn btn-primary btn-block">$ElementLink.Title</a><% end_if %>
                </div>
            </div>
    <% end_loop %>
</div>
