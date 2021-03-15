<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>

<% if $Content %>
    <div class="element__content typography">$Content</div>
<% end_if %>

<% if $SponsorsList %>
    <div class="row sponsors-list">
        <% loop $SponsorsList %>
            <div class="col-md-4 sponsors-list__sponsor mb-4">
                <% if $ElementLink.LinkURL %><a href="$ElementLink.LinkURL"<% if $ElementLink.OpenInNewWindow %> target="_blank"<% end_if %> title="Go to $Title.ATT"><% end_if %>
                    <% if $Image %>
                        <img src="$Image.Pad(576,576).URL" class="img-fluid" alt="$Title.ATT">
                    <% else_if $Title %>
                        $Title
                    <% else %>
                        Visit our Sponsor
                    <% end_if %>
                <% if $ElementLink.LinkURL %></a><% end_if %>
            </div>
            <% if $MultipleOf(3,1) && not Last %>
            </div>
            <div class="row sponsors-list">
            <% end_if %>
        <% end_loop %>
    </div>
<% end_if %>
