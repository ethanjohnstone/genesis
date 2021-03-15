<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>
<% if $Content %><div class="element__content">$Content</div><% end_if %>

<div class="row">
    <% if $Address || $Address2 || $City || $State || $PostalCode || $Country %>
    <div class="col-md-6">
        $AddressMap(767,767)
    </div>
    <div class="col-md-6">
    <% else %>
    <div class="col-sm-12">
    <% end_if %>

        <% if $LocationName %><h3>$LocationName</h3><% end_if %>
        <% if $Address || $Address2 || $City || $State || $PostalCode || $Country %>
        <p>
            <% if $Address %>$Address<br><% if $Address2 %>$Address2<br><% end_if %><% end_if %>
            <% if $City %>$City<% end_if %><% if $State %><% if $City %>, <% end_if %>$State<% end_if %><% if $PostalCode %> $PostalCode<% end_if %>
            <% if $City || $State || $PostalCode %>
            <br>
            <% end_if %>
            <% if $Country %>$Country<% end_if %>
        </p>
        <% end_if %>
        <% if $Phone || $Email || $Website %>
        <p>
            <% if $Phone %><a href="tel:{$Phone}" title="Call $Phone">$Phone</a><br><% end_if %>
            <% if $Email %><a href="emalto:{$Email}" title="Email $Email">$Email</a><br><% end_if %>
            <% if $Fax %><a href="tel:$Fax" title="Email $Email">$Fax</a><br><% end_if %>
            <% if $Website %><a href="$Website" target="_blank" title="Go to $Website">$Website</a><% end_if %>
        </p>
        <% end_if %>
    </div>
</div>
