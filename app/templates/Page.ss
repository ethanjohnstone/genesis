<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="$ContentLocale" dir="ltr">
<!--<![endif]-->
<!--[if IE 6 ]>
<html lang="$ContentLocale" class="ie ie6"><![endif]-->
<!--[if IE 7 ]>
<html lang="$ContentLocale" class="ie ie7"><![endif]-->
<!--[if IE 8 ]>
<html lang="$ContentLocale" class="ie ie8"><![endif]-->
<head>
    <%-- Generates base element that makes all links relative to it --%>
    <% base_tag %>
    <title><% if ClassName == "HomePage" %>$SiteConfig.Title<% else %>$Title – $SiteConfig.Title<% end_if %></title>
    <%-- Set character encoding for the document --%>
    <meta charset="utf-8">
    <%-- Instruct Internet Explorer to use its latest rendering engine --%>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <%-- Upgrade insecure requests to preserve https --%>
    <%--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--%>

    <%-- Generates meta data, setting false stops it generating a title tag --%>
    $MetaTags(false)

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <% require themedCSS('css/app') %>

    <%-- Fav icons, etc --%>
    <% include MetaIcons %>

    <%-- Facebook Open Graph --%>
    <%-- https://developers.facebook.com/docs/sharing/webmasters/ --%>
    <%-- https://developers.facebook.com/tools/debug/ --%>
    <% if $OGType %>
        <meta property="og:type" content="$OGType">
    <% else %>
        <meta property="og:type" content="website">
    <% end_if %>
    <meta property="og:url" content="{$BaseHref}">
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

    <%-- Facebook Open Graph --%>
    <%-- https://developer.twitter.com/en/docs/tweets/optimize-with-cards/guides/getting-started --%>
    <%-- https://cards-dev.twitter.com/validator --%>
    <meta name="twitter:card" content="summary">
    <% if $SiteConfig.TwitterUsername %>
        <meta name="twitter:site" content="@$SiteConfig.TwitterUsername">
        <meta name="twitter:creator" content="@$SiteConfig.TwitterUsername">
    <% end_if %>
    <meta name="twitter:url" content="{$BaseHref}">
    <meta name="twitter:title" content="$Title">
    <% if $MetaDescription %>
        <meta name="twitter:description" content="$MetaDescription">
    <% end_if %>
    <% if $OGPhoto %>
        <meta name="twitter:image" content="$OGPhoto.URL">
    <% else_if $SiteConfig.OGPhoto %>
        <meta name="twitter:image" content="$SiteConfig.OGPhoto.URL">
    <% end_if %>
</head>
<body class="$ClassName" <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %>>
    <% include Header %>
    <div class="main" role="main">
        $Layout
    </div>
    <% include Footer %>
    <% require themedJavascript('javascript/app') %>
</body>
</html>

