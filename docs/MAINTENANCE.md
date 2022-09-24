### Maintenance Page
Included in this project is a maintenance folder containing a plain maintenance.html file.`
 
Replace these things:
- logo.svg in `maintenance/`
- phone number, email, page title in `maintenance.html`

with appropriate stuff, and you're away laughing. You can make it even nicer by customising those colours a bit.

You can still run things like dev/build when you have the maintenance page up, you just have to run it through CLI

#### Switching over to maintenance page
##### IIS servers:

In web.config, switch the url in this line:

`<action type="Rewrite" url="index.php" appendQueryString="true" />`

to 

`<action type="Rewrite" url="maintenance/maintenance.html" appendQueryString="true" />`

##### Apache servers:

In .htaccess, change the url in this line:

`RewriteRule .* index.php`

to

`RewriteRule .* maintenance/maintenance.html`