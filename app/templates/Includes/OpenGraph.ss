<%-- https://developers.facebook.com/docs/sharing/webmasters/ --%>
<%-- https://developers.facebook.com/tools/debug/ --%>
<meta property="og:type" content="<% if $OGType %>{$OGType}<% else %>website<% end_if %>">
<meta property="og:url" content="$AbsoluteLink">
<meta property="og:title" content="$Title">
<% if $OGPhoto %>
    <meta property="og:image" content="$OGPhoto.URL">
<% else_if $SiteConfig.OGPhoto %>
    <meta property="og:image" content="$SiteConfig.OGPhoto.URL">
<% end_if %>
<% if $MetaDescription %>
    <meta property="og:description" content="$MetaDescription">
<% end_if %>
<meta property="og:site_name" content="$SiteConfig.Title">
<meta property="og:locale" content="en_US">