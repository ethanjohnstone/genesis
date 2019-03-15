<% if $Data.OpenGraphEnabled %>
    <meta property="og:type" content="$Data.OpenGraphType">
    <meta property="og:site_name" content="$SiteConfig.Title">
    <meta property="og:locale" content="en_US">
    <meta property="og:url" content="$AbsoluteLink">
    <meta property="og:title" content="<% if $Data.OpenGraphTitle %>$Data.OpenGraphTitle<% else %>$Title<% end_if %>">
    <% if $Data.OpenGraphImage %>
        <meta property="og:image" content="$Data.OpenGraphImage.URL">
        <meta property="og:image:width" content="$Data.OpenGraphImage.Width">
        <meta property="og:image:height" content="$Data.OpenGraphImage.Height">
    <% end_if %>
    <% if $Data.OpenGraphDescription %>
        <meta property="og:description" content="$Data.OpenGraphDescription">
    <% end_if %>
<% else %>
    <meta property="og:type" content="website">
    <meta property="og:url" content="$AbsoluteLink">
    <meta property="og:site_name" content="$SiteConfig.Title">
    <meta property="og:title" content="$Title">
<% end_if %>