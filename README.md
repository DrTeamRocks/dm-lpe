![D&M LPE Logo](http://dm.drteam.rocks/engine/files/img/logo-turquoise-200.png)

# D&M Landing Page Engine

OpenSource PHP landing page engine/constructor to create landing pages with dynamic content.

## I want to see a demo

Yes, of course, follow [this link](http://dm.drteam.rocks) you can see a [SB New Age](https://github.com/BlackrockDigital/startbootstrap-new-age) based Landing Page.

Follow [this link](http://dm.drteam.rocks/auth/login) if you want to see the administrative interface, username and password are `admin`.

Do not be afraid to break something, the site in read-only mode, so you can try whatever you want.

## How to install

* Download the latest stable [D&M LPE](https://github.com/DrTeamRocks/dm-lpe/releases) package
* Extract the archive

If you want to get the unstable release:

* Download the [archive](https://github.com/DrTeamRocks/dm-lpe/archive/master.zip) with current repo state
* Or you can clone repo via command line: `git clone https://github.com/DrTeamRocks/dm-lpe.git`

## After install

Next you need to install the `composer`, `npm`, `bower`, `sass` compiler and `make` tool, if you are Debian or Ubuntu user, just run the command `sudo apt-get install make ruby-sass npm composer`

    npm install bower
    cd dm-lpe
    composer update
    bower updates
    make

Then you need to create the database schema, just follow commands from `backups/init.mysql.sql`.

Or if you have the empty database and you know username and password, you can import the dump with demo settings `backups/demo.mysql.sql`.

## Engine configuration

For correct system work you need to create two configuration files:

* `engine/Configs/config.php`
* `engine/Configs/database.php`

You can use example with similar names, but with `example` suffix. Just copy examples and change the variables in configs to what you need.

Don't forget change the default admin password via accounts management page!

## RoadMap

- [x] Minimalist version with basic functionality
- [x] Users separation, something like `admin`, `editor` and `user`
- [ ] Users management functions for Admins (roles/groups/add/delete etc.)
- [ ] Extend the supported databases list (now only mysql, but should be at least: my, pg and lite)
- [x] Virtual hosting (multiple landings via one interface)
- [ ] "Step by step" installer of this project
- [ ] Export the page with all dependencies (js/css etc.)

## Some projects and links

* [Manfies Landing Engine](https://github.com/Manfies/mle) - unfortunately, author only created the repository and nothing else
* [SB New Age](https://github.com/BlackrockDigital/startbootstrap-new-age) - beautiful landing layout
