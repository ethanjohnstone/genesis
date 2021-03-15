<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>
<% if $Content %><div class="element__content">$Content</div><% end_if %>

<% if $TestimonialsList %>
    <% loop $TestimonialsList %>
        <% if $Content || $Name || $Affiliation %>
        <div class="testimonial">
            <div class="testimonial__quote">
                <blockquote class="blockquote text-center">
                    <% if $Content %><p>$Content</p><% end_if %>
                    <% if $Name || $Affiliation %>
                    <footer class="blockquote-footer">
                        <% if $Name %>$Name<% end_if %><% if $Affiliation %><% if $Name && $Affiliation %> - <% end_if %>$Affiliation<% end_if %>
                    </footer>
                    <% end_if %>
                </blockquote>
            </div>
        </div>
        <% end_if %>
    <% end_loop %>
<% end_if %>