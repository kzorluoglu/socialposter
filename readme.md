# Social (Media) Poster

Social Poster is a simple Facebook Page and Twitt poster

  - Text Posting
  - Text with Image-\s Posting

# New Features?

  - Please create new Issue.

### Tech

Social Poster uses a number of open source projects to work properly:

* [facebook/graph-sdk] - Facebook SDK for PHP (v5)
* [dg/twitter-php] - awesome web-based text editor
* [dillinger.io] - Markdown editor for this readme.md creating/editing. Fast and easy to extend.
* [Twitter Bootstrap] - great UI boilerplate for modern web apps
* [jQuery] - duh


### Installation

1. Update **Uploads** Settings.
```
src\Helper\Upload.php
```
```
 */
class Upload {

    protected $allowedTypes = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
    ...
    protected $uploadDirectory = "/var/www/uploads/";
```
2. Write Your Account Informations
```
src\Account\FacebookPage.php
src\Account\Twitter.php
```

for Example for Facebook..
```
class FacebookPage {
......
    public function __construct() {
        // 1. Page and App
        $this->addAccount(new Facebook(
                'yourPageId', 'yourAppId', 'yourAppSecretCode', 'yourGraphVersion', 'yourLongAccessToken'
                )
        );
         // 2. Page and App
        $this->addAccount(new Facebook(
                'yourPageId', 'yourAppId', 'yourAppSecretCode', 'yourGraphVersion', 'yourLongAccessToken'
                )
        );
        // and more accounts.....
    }
```
### Integration

Facebook
 - Create Facebook Developer Account
 - Create Simple App
    -  You not need Facebook Products other anything under Your **App Settings**, I have only **Contact E-mail** filled
    -  Call **https://developers.facebook.com/tools/explorer/**
    -  Select **Your App** under **Application** Select
    -  Select **Page Access Token** under **Get Token** Button
    -  Click **i** icon after Access Token Creating
    -  Click Open in **Access Token Tool** from **opened Internal Popup**
    -  Click **Generate Long Lived Token**

Twitter
 - Create Twitter Developer Account
 - Create Simple App
    - Click App Details 
    -  This Keys will be located under **Keys and tokens** Menu

### Todos

 - Write Tests

License
----

MIT


**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [facebook/graph-sdk]: <https://github.com/facebook/php-graph-sdk>
   [dg/twitter-php]: <https://github.com/dg/twitter-php>
   [dillinger.io]: <https://dillinger.io/>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
  