Sounds
======

Demo using the nasa sounds API

# Install
	composer install
	
    npm install

    bower install

# Configuration
This demo uses the [Nasa sound API](https://api.nasa.gov/api.html#sounds), which exposes the sounds via the [Soundcloud API](https://developers.soundcloud.com/) so you'll need both a nasa api key and a soundcloud client id.

Open the app/config/parameters.yml file and add them as 'nasa\_api\_key' and 'soundcloud\_client\_id'

# Run
    grunt

    php app/console server:run

---
A Symfony project created on June 23, 2015, 9:59 am.

