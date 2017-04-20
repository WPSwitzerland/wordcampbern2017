# WordCamp Bern 2017

## Description
This repository contains a plugin which contains frontend customisation code for the Twenty Seventeen theme. It is intended for use on the 
WordCamp Bern 2017 website (2017.bern.wordcamp.org) and pulled in from GitHub using the *Remote CSS* function in the WordCamp backend.

The code is only wrapped in a plugin so that you can install it in a local development version of WordPress if you need to. Full *Composer* 
dependency isn't included in this repository.

## Usage
The frontend code in this repository uses Zurb's [Foundation](http://foundation.zurb.com/) framework. Load it using the *composer.json* file 
in the project root and compile the code using Gulp. Switch to the *wp-content/plugins/mhm_customize_twentyseventeen/Foundation* folder in Terminal 
and then run `node_modules/.bin/gulp` (as a watcher) or `node_modules/.bin/gulp build` before committing and pushing changes.

The repository also contains a *Vagrantfile* if you need it. ([Reference](https://github.com/markhowellsmead/helpers/wiki/Vagrant).)

### Liability
The contributors to this code accept no responsibility for correct and accurate code. Use the code at your own risk.

## Contributors
* Mark Howells-Mead
* Ulrich Pogson

## License
Use this code freely, widely and for free. Provision of this code provides and implies no guarantee.

Please respect the GPL v3 licence, which is available via http://www.gnu.org/licenses/gpl-3.0.html
