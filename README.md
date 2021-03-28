# Genesis

## Instructions
1. Clone this repository
2. Navigate to the project root directory and run `rm -rf .git` to remote the existing repository
3. Run `git init` to create a new repository, then `git commit -a -m "Initial commit"` to commit the initial state
4. Duplicate the file `.env.example`, rename it to `.env` and update the configuration fields
5. run `npm install` (or `yarn`)
6. run `composer install`
7. Verify the project integrity and then run `npm run watch` (or `yarn watch`)
8. You're all set!

When going live, make sure to remove the `robots.txt` file and remove the robots meta tag

## Maintenance Page
Included in this project is a maintenance folder containing a default maintenance page.
 
Replace these things:
- `logo.svg` in `maintenance/`
- phone number, email and page title in `maintenance.html`

with appropriate stuff, and you're away laughing. You can make it even nicer by customising those colours a bit.
You can still run tasks like `dev/build` when you have the maintenance page up, but they have to be invoked through the CLI.

### Enabling the maintenance page
#### IIS servers:

In the file `web.config`, change this line:

```<action type="Rewrite" url="index.php" appendQueryString="true" />```

to 

```<action type="Rewrite" url="maintenance/maintenance.html" appendQueryString="true" />```

#### Apache servers:

In the file `.htaccess`, change this line:

```RewriteRule .* index.php```

to

```RewriteRule .* maintenance/maintenance.html```


