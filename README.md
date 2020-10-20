# Genesis

## Instructions
1. Clone this repository
2. Duplicate the `.env.example`, name it `.env` and enter the deets (db_user, db_pass, db_name)
3. run `npm install` or `yarn`
4. run `composer install`
5. Verify the project integrity and then run `npm run watch` (or `yarn watch`)
6. Update the origin remote to a repository for your project
7. You're all set!

When going live make sure to remove the robots.txt file and remove the robots meta tag


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


