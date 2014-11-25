gallery3Bootstrap3Theme
=======================

A Gallery3 Theme using Bootstrap3, Grunt, and SCSS

Prerequisites for building
======================
- grunt-cli (installed globally)
- node & npm

Install requirements
======================
From the /src directory:

```bash
npm install
./node_modules/.bin/bower install
grunt build
```

Modify Bootstrap
======================
Change scss/config/bootstrap-config/_bootstrap-config.scss to your needs

Modify Paths, Colors, and Variables
======================
Change scss/config/{_colors, _paths, _variables}.scss to your needs

Building
======================
```bash
grunt build
```

or

```bash
grunt watch
```

Once built, the /src directory can be omitted from your production area. It contains a .htaccess to prevent read access

Live Reload
======================
Is configured, but no script is injected. This could be implemented in local.php