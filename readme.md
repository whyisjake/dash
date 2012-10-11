h1. Dash Widget

By Jake Spurlock

This function serves as an easy front end for accessing Parsely Dash Analytics via PHP. 

h2. Getting Started

* Add this plugin either to your WordPress theme directory, or include it via php methods.

h2. Diving In

* The function has six parameters that can be used.
* $type is the first, currently three options are available: realtime, analytics, and shares.
* $hits is the string that prefaces the hit counter. If `null`, the hit counter isn't added.
* $limit is an integer that limits that amount of posts returned. Default is five.
* $size is an integer to return the width of the image. This is added as a style element on the image, and will not resize the image.
* $api is the sitename/url of the site that you want to get stats for. ie. `makezine.com`.
* $secret is the secret api key. This is not required unless you have this turned on in your account
* make_the_dash_shares_widget( $type, $hits = null, $limit = 5, $size = 80, $api = null, $secret = null )

h2. License

See LICENSE.