# D&M Landing Page Engine

OpenSource PHP landing page engine/constructor to create landing pages with dynamic content.

## I want to see a demo

Yes, of course, follow [this link](http://dm.drteam.rocks) you can see a [SB New Age](https://github.com/BlackrockDigital/startbootstrap-new-age) based Landing Page.

Follow [this link](http://dm.drteam.rocks/auth/login) if you want to see the administrative interface, username and password are `admin`.

Do not be afraid to break something, the site in read-only mode, so you can try whatever you want.

## How to install

    git clone https://github.com/DrTeamRocks/dm-lpe.git
    cd dm-lpe
    composer update
    bower update

Then you need create the database schema, just follow commands from `backups/init.mysql.sql`.

Or if you have the empty database and you know username and password, you can import the dump with demo settings `backups/demo.mysql.sql`.

Don't forget change the default admin password!

## RoadMap

- [x] Minimalist version with basic functionality
- [ ] Users separation, something like `expert` and `stupid`
- [ ] Users management functions for Admins (roles/groups/add/delete etc.)
- [ ] "Step by step" installer of this project
- [ ] Virtual hosting (multiple landings via one interface)

## Some projects and links

* [Manfies Landing Engine](https://github.com/Manfies/mle)
* [SB New Age](https://github.com/BlackrockDigital/startbootstrap-new-age)
