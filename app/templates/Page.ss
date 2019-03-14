<!DOCTYPE html>
<head>
    <%-- Generates base element that makes all links relative to it --%>
    <% base_tag %>

    <%-- Set character encoding for the document --%>
    <meta charset="utf-8">

    <%-- Instruct Internet Explorer to use its latest rendering engine --%>
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <%-- Set viewport settings --%>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <%-- Upgrade insecure requests to preserve https --%>
    <%--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--%>

    <%-- Generates meta data, setting false stops it generating a title tag --%>
    $MetaTags(false)

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <%-- Require CSS --%>
    <% require themedCSS('css/dist/app') %>

    <%-- Fav icons, etc --%>
    <% include MetaIcons %>

    <%-- Open Graph --%>
    <% include OpenGraph %>
</head>
<body class="body">
    <% include Header %>
    <div class="main" role="main">
        $Layout
    </div>
    <% include Footer %>
    <% require themedJavascript('javascript/dist/app') %>
</body>
</html>

