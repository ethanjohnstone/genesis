<% with $OpenGraphInfo %>
    <meta property="og:type" content="$Type">
    <meta property="og:site_name" content="$SiteName">
    <meta property="og:locale" content="en_US">
    <meta property="og:url" content="$Url">
    <meta property="og:title" content="$Title">
    <% if $Description %>
        <meta property="og:description" content="$Description">
    <% end_if %>
    <% if $Image %>
        <meta property="og:image" content="$Image.Url">
        <meta property="og:image:width" content="$Image.Width">
        <meta property="og:image:height" content="$Image.Height">
    <% end_if %>
<% end_with %>