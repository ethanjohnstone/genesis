<%-- 
    Use only self-contained styles or scripts & rely on very few variables or features.
--%>

<!DOCTYPE html>
<html>
    <head>
        <% base_tag %>
        <title>Maintenance</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: -system-ui, sans-serif;
            }

            body {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                padding: 0 2rem;
            }

            h1 { color: #444; margin-bottom: 1rem; }
            p { color: #666; }
        </style>
    </head>
    <body>
        <h1>$SiteConfig.MaintenanceTitle</h1>
        <p>$SiteConfig.MaintenanceMessage</p>
    </body>
</html>
